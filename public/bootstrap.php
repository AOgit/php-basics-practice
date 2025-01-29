<?php

$container = new \myfrm\ServiceContainer();

$container->setService(\myfrm\Db::class, function(){
    $db_config = require CONFIG . '/db.php';
    return (\myfrm\Db::getInstance())->getConnection($db_config);
});

// $conteainer->setService(\myfrm\Test::class, function() {
//     return new \myfrm\Test();
// });


\myfrm\App::setContainer($container);
