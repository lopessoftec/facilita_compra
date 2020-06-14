<?php

namespace SRC\Domain\Supplier;

class SupplierService
{
    private $repository;

    public function __construct(SupplierRepository $SupplierRepository)
    {
        $this->repository = $SupplierRepository;
    }
    public function findAll()
    {
        return $this->repository->findAll();
    }
}
