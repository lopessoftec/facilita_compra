<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->get('/', 'SRC\\Application\\Pointers\\User@index');

$route->post('/autenticar', 'SRC\\Application\\Pointers\\User@autenticar');

$route->get('/home', 'SRC\\Application\\Pointers\\User@home');

$route->get('/register-view', 'SRC\\Application\\Pointers\\User@registerView');
$route->post('/register', 'SRC\\Application\\Pointers\\User@register');

$route->get('/change-password-view', 'SRC\\Application\\Pointers\\User@changePasswordView');
$route->post('/change-password', 'SRC\\Application\\Pointers\\User@changePassword');


$route->get('/close', 'SRC\\Application\\Pointers\\User@logout');

// $route->get('/', 'SRC\\Application\\Pointers\\User@index');

$route->get('/{id:\d+}', 'SRC\\Application\\Pointers\\User@find');

$route->get('/add-user', 'SRC\\Application\\Pointers\\User@createView');

$route->post('/add-user', 'SRC\\Application\\Pointers\\User@create');

$route->put('/{id:\d+}', 'SRC\\Application\\Pointers\\User@update');

$route->delete('/{id:\d+}', 'SRC\\Application\\Pointers\\User@delete');

// $route->get('/', function () {
//     echo 'basic route';
// });

$route->on();
