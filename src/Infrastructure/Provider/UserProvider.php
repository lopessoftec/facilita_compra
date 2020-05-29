<?php

namespace SRC\Infrastructure\Provider;

use SRC\Domain\User\UserService;
use SRC\Infrastructure\Persistence\PDOMySQL;
use SRC\Infrastructure\Repository\UserRepository;

class UserProvider
{
    public function getInstance()
    {
        $pdo = new PDOMySQL();
        $repository = new UserRepository($pdo);

        return new UserService($repository);
    }
}
