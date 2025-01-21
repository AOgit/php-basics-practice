<?php

return [
    "host" => "MariaDB-10.4",
    "dbname" => "test",
    "user" => "root",
    "password" => "",
    "charset" => "utf8", //utf8mb4
    "options" => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];