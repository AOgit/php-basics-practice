<?php
namespace myfrm;

final class Router
{
    public $routes = [];
    protected $uri;
    protected $method;
    public static array $route_params = [];

    public function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $this->method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    }

    public function match()
    {
        $matches = false;
        foreach ($this->routes as $route)
        {
            if((preg_match("#^{$route['uri']}$#", $this->uri, $matches)) && in_array(strtoupper($this->method), $route['method']))
            {
                // var_dump($this->uri);
                // var_dump($route['method']);
                // dd($matches);

                if ($route['middleware']) {
                    $middleware = MIDDLEWARE[$route['middleware']] ?? false;
                    // dump($middleware);
                    if (!$middleware) {
                        throw new \Exception("Incorrect middleware {$route['middleware']}");
                    }
                    (new $middleware)->handle();
                }
                foreach ($matches as $k=>$v)
                {
                    if (is_string($k)) {
                        self::$route_params[$k] = $v;
                    }
                }

                require CONTROLLERS . "/{$route['controller']}";
                $matches = true;
                break;
            }
        }
        if (!$matches){
            abort();
        }
    }


    public function only($middleware)
    {
        // dump($this->routes);
        // dump($middleware);
        // dump(array_key_last($this->routes));
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;
        return $this;
    }

    public function add($uri, $controller, $method)
    {
        if (is_array($method)) {
            $method = array_map('strtoupper', $method);
        } else {
            $method = [$method];
        }

       $this->routes[] = [
        'uri' => $uri,
        'controller' => $controller,
        'method' => $method,
        'middleware' => null,
       ];
       return $this;
    }

    public function get($uri, $controller)
    {
       return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
       return $this->add($uri, $controller, 'POST');
    }
    public function delete($uri, $controller)
    {
       return $this->add($uri, $controller, 'DELETE');
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }


}
