<?php

namespace SRC\Application\Pointers;

use PlugRoute\Http\Request;
use PlugRoute\Http\Response;
use SRC\Infrastructure\Provider\UserProvider;

class User
{
    private $request;
    private $response;
    private $service;
    private $twig;

    public function __construct(Request $request, Response $response, UserProvider $userProvider)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $userProvider->getInstance();

        $loader = new \Twig\Loader\FilesystemLoader('../src/View');
        $this->twig = new \Twig\Environment($loader);
    }

    public function index()
    {

        echo $this->twig->render('app.php', ['rota-form' => '/autenticar', 'view' => 'Access/login.php']);
    }

    public function autenticar()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($email == false) {
            $this->request->redirect('/');
        }
        if ($password == false) {
            $this->request->redirect('/');
        }

        //verificar se tem usuario com esse email e se tiver verificar se senha é igual
        $checksAuthentication = $this->service->checksAuthentication($email, $password);

        if (password_verify($password, $checksAuthentication->getPassword())) {

            session_start();
            $_SESSION["autentication"] = true;

            $this->request->redirect('/home');
            exit();
        }

        $this->request->redirect('/');
    }

    public function register()
    {
        $password = password_hash('123456', PASSWORD_ARGON2I);

        echo $this->twig->render('app.php', ['rota-form' => '/login', 'view' => 'Access/login.php']);
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["autentication"]);

        $this->request->redirect('/');
    }

    public function home()
    {
        $this->verificaPermissao();
        echo $this->twig->render('app.php', ['rota-form' => '/login', 'view' => 'Extra/dashboard.php', 'autetication' => $_SESSION["autentication"]]);
    }

    // public function index()
    // {
    //     $data = $this->service->findAll();

    //     $this->response($data, 200);
    // }

    public function createView()
    {
        $this->verificaPermissao();
        echo $this->twig->render('app.php', ['rota-form' => '/add-user', 'view' => 'User/user-create.php']);
    }

    public function create()
    {
        $name = $this->request->input('name');
        $email = $this->request->input('email');

        return $this->service->create($name, $email);
    }

    public function update()
    {
        $name = $this->request->input('name');
        $email = $this->request->input('email');
        $id = $this->request->parameter('id');

        return $this->service->update($name, $email, $id);
    }

    public function delete()
    {
        $id = $this->request->parameter('id');

        return $this->service->delete($id);
    }

    public function find()
    {
        $id = $this->request->parameter('id');

        return var_dump($this->service->find($id));
    }

    private function response($data, $code)
    {
        echo $this->response
            ->setStatusCode($code)
            ->response()
            ->json($data);
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
