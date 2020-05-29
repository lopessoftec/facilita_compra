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

    public function __construct(Request $request, Response $response, UserProvider $userProvider)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $userProvider->getInstance();
    }

    public function index()
    {
        $data = $this->service->findAll();

        $this->response($data, 200);
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
}
