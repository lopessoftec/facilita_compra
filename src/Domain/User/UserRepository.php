<?php

namespace SRC\Domain\User;

interface UserRepository
{
    public function findAll();

    public function find($id);

    public function create($name, $email);

    public function delete($id);

    public function update($name, $email, $id);
}
