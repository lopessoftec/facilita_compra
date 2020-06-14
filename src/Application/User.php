<?php

namespace SRC\Application;

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

        if ($checksAuthentication != false && password_verify($password, $checksAuthentication->getPassword())) {

            session_start();
            $_SESSION["autentication"] = true;
            $_SESSION["id"] = $checksAuthentication->getId();

            $this->request->redirect('/home');
            exit();
        }

        $this->request->redirect('/');
    }

    public function registerView()
    {
        echo $this->twig->render('app.php', ['rota-form' => '/login', 'view' => 'User/create.php']);
    }

    public function register()
    {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($name == false) {
            $this->request->redirect('/registerView');
        }
        if ($email == false) {
            $this->request->redirect('/registerView');
        }
        if ($password == false) {
            $this->request->redirect('/registerView');
        }

        $password = password_hash($password, PASSWORD_ARGON2I);

        //insere no banco as informações
        $create = $this->service->create($name, $email, $password);

        session_start();
        $_SESSION["autentication"] = true;
        $_SESSION["id"] = $create['id'];

        $this->request->redirect('/home');
        exit();
    }

    public function changePasswordView()
    {
        $this->verificaPermissao();
        echo $this->twig->render('app.php', ['rota-form' => '/add-user', 'view' => 'User/edit-password.php', 'autetication' => $_SESSION["autentication"]]);
    }

    public function changePassword()
    {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

        if ($password == false) {
            $this->request->redirect('/registerView');
        }

        if ($confirm_password == false) {
            $this->request->redirect('/registerView');
        }

        if ($password != $confirm_password) {
            $this->request->redirect('/registerView');
        }

        $password = password_hash($password, PASSWORD_ARGON2I);

        //insere no banco as informações
        session_start();
        $id = $_SESSION["id"];

        $this->service->changePassword($password, $id);

        $this->request->redirect('/home');
        exit();
    }

    public function logout()
    {
        session_start();
        session_destroy();

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

    // public function create()
    // {
    //     $name = $this->request->input('name');
    //     $email = $this->request->input('email');

    //     return $this->service->create($name, $email);
    // }

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
