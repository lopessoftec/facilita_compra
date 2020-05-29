<?php

namespace SRC\Infrastructure\Persistence;

abstract class Database
{
    protected $driver;

    protected $host;

    protected $dbname;

    protected $user;

    protected $password;

    public function getConnection()
    {
        try {
            $pdo = new \PDO("{$this->driver}:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
