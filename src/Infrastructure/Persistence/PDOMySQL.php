<?php

namespace SRC\Infrastructure\Persistence;

class PDOMySQL extends Database
{
    public function __construct()
    {
        $this->driver = 'mysql';
        $this->host = '127.0.0.1';
        $this->dbname = 'facilita_compra';
        $this->user = 'root';
        $this->password = '';
    }
}
