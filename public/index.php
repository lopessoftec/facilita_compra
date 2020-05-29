<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->get('/', 'SRC\\Application\\Pointers\\User@index');

$route->get('/{id:\d+}', 'SRC\\Application\\Pointers\\User@find');

$route->post('/', 'SRC\\Application\\Pointers\\User@create');

$route->put('/{id:\d+}', 'SRC\\Application\\Pointers\\User@update');

$route->delete('/{id:\d+}', 'SRC\\Application\\Pointers\\User@delete');

// $route->get('/', function () {
//     echo 'basic route';
// });

$route->on();
