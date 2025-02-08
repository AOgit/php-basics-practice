<?php

$title = "My Blog :: Register";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    /**
    *
    * @var Db $db
    */

    $db = \myfrm\App::get(\myfrm\Db::class); // $db = db(); еще проще

    $fillable = ['name', 'email', 'password', 'avatar'];
    $data = load($fillable);

    // dump($_POST);
    // dump($_FILES);
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $data['avatar'] = $_FILES['avatar'];
    } else {
        $data['avatar'] = [];
    }
    // dd($data);

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
            'name' => [
                'required' => true,
                'min' => 5,
                'max' => 100,
            ],
            'email' => [
                'email' => true,
                'max' => 100,
                'unique' => 'users:email'
            ],
            'password' => [
                'required' => true,
                'min' => 6,
            ],
            'repassword' => [
                'match' => 'password',
            ],
            'avatar' => [
                'required' => true,
                'ext' => 'jpg|gif',
                'size' => 1_048_576,
            ]

        ]);


    print_arr($validation->getErrors());
    die();

    if(!$validation->hasErrors())
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($db->query("INSERT INTO `users` (`name`, `email`, `password`) VALUES (:name, :email, :password)", $data))
        {
            $_SESSION['success'] = 'Вы успешно зарегистрировались';
        }
        else
        {
            $_SESSION['error'] = 'DB Error';
        }
        redirect('/');
    }
}
require_once VIEWS . '/users/register.tpl.php';
