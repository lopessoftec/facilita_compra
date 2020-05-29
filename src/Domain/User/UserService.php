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

    public function create($name, $email)
    {
        return $this->repository->create($name, $email);
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
