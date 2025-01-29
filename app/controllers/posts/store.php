<?php
/**
 *
 * @var Db $db
 */

use myfrm\Validator;

global $db;

// var_dump(strlen("привет"), mb_strlen("привет"));

$fillable = ['title', 'content', 'excerpt'];
$data = load($fillable);

$errors = [];

// validation
$validator = new Validator();

$validation = $validator->validate(
    $data,
    // [
    //     'title'=>'so',
    //     'excerpt'=>'solo slol cs os',
    //     'content'=>'solo slol cs os',
    //     'email'=>'solo@slolc.o',
    //     'password'=> '234',
    //     'repassword'=> '1',

    // ],
    $rules = [
        'title' => [
            'required' => true,
            'min' => 5,
            'max' => 190,
        ],
        'excerpt' => [
            'required' => true,
            'min' => 10,
            'max' => 190,
        ],
        'content' => [
            'required' => true,
            'min' => 10,
        ],
        'email' => [
            'email' => true,
        ],

        'password' => [
            'required' => true,
            'min' => 6,
        ],
        'repassword' => [
            'match' => 'password',
        ],
    ]);

// print_arr($validation->getErrors());
// die();

if(!$validation->hasErrors())
{
    if ($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data))
    {
        $_SESSION['success'] = 'OK';
    }
    else
    {
        $_SESSION['error'] = 'DB Error';
    }
    redirect('/');
}

$title = "My Blog :: New post";

require_once VIEWS . "/posts/create.tpl.php";
