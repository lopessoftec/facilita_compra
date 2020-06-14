<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->get('/', 'SRC\\Application\\User@index');

$route->post('/autenticar', 'SRC\\Application\\User@autenticar');

$route->get('/home', 'SRC\\Application\\User@home');

$route->get('/register-view', 'SRC\\Application\\User@registerView');
$route->post('/register', 'SRC\\Application\\User@register');

$route->get('/change-password-view', 'SRC\\Application\\User@changePasswordView');
$route->post('/change-password', 'SRC\\Application\\User@changePassword');

//supplier
$route->get('/supplier-list-view', 'SRC\\Application\\Supplier@index');
$route->get('/supplier-create-view', 'SRC\\Application\\Supplier@create');
$route->get('/supplier-create', 'SRC\\Application\\Supplier@store');


$route->get('/close', 'SRC\\Application\\User@logout');

// $route->get('/', 'SRC\\Application\\User@index');

$route->get('/{id:\d+}', 'SRC\\Application\\User@find');

$route->get('/add-user', 'SRC\\Application\\User@createView');

$route->post('/add-user', 'SRC\\Application\\User@create');

$route->put('/{id:\d+}', 'SRC\\Application\\User@update');

$route->delete('/{id:\d+}', 'SRC\\Application\\User@delete');

// $route->get('/', function () {
//     echo 'basic route';
// });

$route->on();
