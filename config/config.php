<?php

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
const UPLOADS = WWW . '/uploads';
define("CORE", ROOT . '/vendor/myfrm/core');
define("APP", ROOT . '/app');
define("CONFIG", ROOT .'/config');
define("CONTROLLERS", APP . '/controllers');
define("VIEWS", APP  . '/views');
define("PATH",  'https://php-kudlay');
const LOGIN_PAGE = PATH . '/login';
define("ERRORS_LOG_FILE", ROOT . '/errors.log');
