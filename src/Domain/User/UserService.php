<?php

namespace SRC\Domain\User;

class UserService
{
    private $repository;

    public function __construct(UserRepository $useRepository)
    {
        $this->repository = $useRepository;
    }
    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function checksAuthentication($email)
    {
        return $this->repository->checksAuthentication($email);
    }

    public function create($name, $email, $password)
    {
        return $this->repository->create($name, $email, $password);
    }

    public function update($name, $email, $id)
    {
        return $this->repository->update($name, $email, $id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
