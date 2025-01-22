<?php

final class Db
{
    private $conn;
    private PDOStatement $stmt;
    private static $instance = null;

    private function __construct()
    {
    }
    private function __clone()
    {
    }
    public function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }
        return self::$instance;

    }

    public function getconnection(array $db_config)
    {

        $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']};}";
        try {
            $this->conn = new PDO ($dsn, $db_config['user'], $db_config['password'], $db_config['options']);
            return $this;
        } catch (PDOException $e) {
            // echo "DB error: {$e->getMessage()}";
            abort(500);
        }

    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->conn->prepare($query);
        // dump($this->stmt);
        $this->stmt->execute($params);
        return $this;
    }

    public function findAll() {
        return $this->stmt->fetchAll();
    }

    public function find() {
        return $this->stmt->fetch();
    }

    public function findOrFail() {
        $res = $this->find();
        if(!$res)
        {
            abort(404);
        }
        return $res;
    }

}
