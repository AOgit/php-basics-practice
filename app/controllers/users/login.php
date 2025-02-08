<?php

$title = "My Blog :: Login";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /**
    *
    * @var Db $db
    */

    $db = \myfrm\App::get(\myfrm\Db::class); // $db = db(); еще проще

    $fillable = ['email', 'password'];
    $data = load($fillable);

    $errors = [];

    // validation
    $validator = new myfrm\Validator();

    $validation = $validator->validate(
        $data,
        // [
        //     'name'=>'so',
        //     'email'=>'solo@slolc.o',
        //     'password'=> '234',

        // ],
        $rules = [
            'email' => [
                'required' => true,
            ],
            'password' => [
                'required' => true,
            ],
        ]);

        if(!$validation->hasErrors())
        {
            if(!$user = $db->query("SELECT * FROM users WHERE email = ?", [$data['email']])->find())
            {
                $_SESSION['error'] = 'Wrong email or password';
                redirect();
            }
            // dump($data['password']);
            // $hash = password_hash($data['password'], PASSWORD_DEFAULT);
            // dump($hash);
            // dump(password_verify($data['password'], $hash));
            // dump($user['password']);
            // dump(password_verify($data['password'], $user['password']));

            if(!password_verify($data['password'], $user['password']))
            {
                $_SESSION['error'] = 'pass ver Wrong email or password';
               redirect();
            }

               foreach ($user as $key => $value){
                if($key != 'password') $_SESSION['user'][$key] = $value;
               }

                $_SESSION['success'] = 'Вы успешно авторизировались';
                redirect(PATH);
        }

}
require_once VIEWS . '/users/login.tpl.php';
