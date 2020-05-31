<?php

namespace SRC\Domain\User;

interface UserRepository
{
    public function findAll();

    public function find($id);

    public function checksAuthentication($email);

    public function changePassword($password, $id);

    public function create($name, $email, $password);

    public function delete($id);

    public function update($name, $email, $id);
}
