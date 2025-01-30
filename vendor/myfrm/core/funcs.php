<?php

//defined("MYAPP") or die('Forbidden');
//echo "Hello";

function dump ($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data){
    dump($data);
    die;
}

function print_arr($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function abort($code = 404)
{
    http_response_code($code);
    require VIEWS . "/errors/{$code}.tpl.php";
}

function load($fillable = [])
{
    $data = [];
    foreach ($_POST as $k => $v)
    {
        if (in_array($k, $fillable))
        {
            $data[$k] = trim($v);
        }
    }
    return $data;
}

function old($fieldname)
{
    return isset($_POST[$fieldname]) ? h($_POST[$fieldname]) : '';
}

function h($str)
{
    return htmlspecialchars($str,ENT_QUOTES);
}

function redirect($url = '')
{
    if ($url)
    {
        $redirect = $url;
    }
    else
    {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("location: {$redirect}");
    die;
}

function get_alerts()
{
    if(!empty($_SESSION['success']))
    {
        require_once VIEWS . '/incs/alert_success.php';
        unset($_SESSION['success']);
    }

    if(!empty($_SESSION['error']))
        {
            require_once VIEWS . '/incs/alert_error.php';
            unset($_SESSION['error']);
        }
}

function db(): \myfrm\Db
{
    return \myfrm\App::get(\myfrm\Db::class);
}

function check_auth()
{
    return isset($_SESSION['user']);
}
