<?php

namespace SRC\Infrastructure\Provider;

use SRC\Domain\Supplier\SupplierService;
use SRC\Infrastructure\Persistence\PDOMySQL;
use SRC\Infrastructure\Repository\SupplierRepository;

class SupplierProvider
{
    public function getInstance()
    {
        $pdo = new PDOMySQL();
        $repository = new SupplierRepository($pdo);

        return new SupplierService($repository);
    }
}
