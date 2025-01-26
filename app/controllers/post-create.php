<?php
/**
 *
 * @var Db $db
 */
require CORE .  '/classes/Validator.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    // var_dump(strlen("привет"), mb_strlen("привет"));

    $fillable = ['title', 'content', 'excerpt'];
    $data = load($fillable);

    $errors = [];

    // validation
    $validator = new Validator();

    $validation = $validator->validate(
        $data,
        // [
        //     'title'=>'solo slol cs os',
        //     'excerpt'=>'solo slol cs os',
        //     'content'=>'solo slol cs os',
        //     'email'=>'solo@slolc.os',
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
        ]);

    if($validation->hasErrors())
    {
        print_arr($validation->getErrors());
    }else{
        echo "SUCCESS!";
    }

    die();

/*     if(empty($data['title'])) {
        $errors['title'] = 'Title is required';
    }
    if(empty($data['excerpt'])) {
    }

    if(empty($data['title'])) {
        $errors['title'] = 'Title is required';
    }
    if(empty($data['excerpt'])) {
        $errors['excerpt'] = 'Excerpt is required';
    }
    if(empty($data['content'])) {
        $errors['content'] = 'Content is required';
    }  */

    //  dump($data);
    //  dd($_POST);
    if(empty($errors))
    {
        if ($db->query("INSERT INTO posts (`title`, `content`, `excerpt`) VALUES (:title, :content, :excerpt)", $data))
        {
            echo "Ok";
        }
        else
        {
            echo "DB Error";
        }

        // redirect('/posts/create');
    }
}

$title = "My Blog :: New post}";

require_once VIEWS . "/post-create.tpl.php";
