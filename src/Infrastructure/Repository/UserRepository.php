<?php

namespace SRC\Infrastructure\Repository;

use SRC\Infrastructure\Persistence\Database;
use SRC\Domain\User\User;

class UserRepository implements \SRC\Domain\User\UserRepository
{
    private $connection;

    public function __construct(Database $PDOMySQL)
    {
        $this->connection = $PDOMySQL->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->connection->query("SELECT * FROM user WHERE deleted_at IS NULL");
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->connection->prepare("SELECT id, name, email, deleted_at as deletedAt, updated_at as updatedAt, created_at as createdAt 
                                            FROM user 
                                            WHERE deleted_at IS NULL AND id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        // var_dump($stmt->fetchAll(\PDO::FETCH_ASSOC));
        // var_dump($stmt->fetchObject(User::class));
        // die();
        return $stmt->fetchObject(User::class);
    }

    public function create($name, $email)
    {
        $stmt = $this->connection->prepare("INSERT INTO user (name, email) VALUES (?, ?)");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);

        $stmt->execute();

        //var_dump($this->connection->lastInsertId());
        //var_dump($stmt->debugDumpParams());

        if ($stmt->rowCount() > 0) {
            return 'success';
        }

        return 'error';
    }

    public function delete($id)
    {
        $stmt = $this->connection->prepare("UPDATE user SET deleted_at = NOW() WHERE id = ?");
        $stmt->bindValue(1, $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'success';
        }

        return 'error';
    }

    public function update($name, $email, $id)
    {
        $stmt = $this->connection->query("UPDATE user SET updated_at = NOW(), name =?, email = ? WHERE id = ?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return 'success';
        }

        return 'error';
    }
}
