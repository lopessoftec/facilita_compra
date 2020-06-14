<?php

namespace SRC\Application;

use PlugRoute\Http\Request;
use PlugRoute\Http\Response;
use SRC\Infrastructure\Provider\SupplierProvider;

class Supplier
{
    private $request;
    private $response;
    private $service;
    private $twig;

    public function __construct(Request $request, Response $response, SupplierProvider $supplierProvider)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $supplierProvider->getInstance();

        $loader = new \Twig\Loader\FilesystemLoader('../src/View');
        $this->twig = new \Twig\Environment($loader);
    }

    public function index()
    {
        $this->verificaPermissao();
        echo $this->twig->render('app.php', ['view' => 'Supplier/list.php', 'autetication' => $_SESSION["autentication"]]);
    }

    public function create()
    {
        $this->verificaPermissao();
        echo $this->twig->render('app.php', ['rota-form' => '/supplier-create', 'view' => 'Supplier/create.php', 'autetication' => $_SESSION["autentication"]]);
    }

    public function verificaPermissao()
    {
        session_start();

        if ($_SESSION["autentication"]) {
            return true;
        }

        $this->request->redirect('/');
    }
}
