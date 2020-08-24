<?php

use Phalcon\Mvc\Router;

//set RouteRule
$router = new Router(false);

/**
 * url https://forum.phalconphp.com/discussion/11335/pass-url-parameters-to-the-url
 */
$router->setUriSource($router::URI_SOURCE_SERVER_REQUEST_URI);
$router->removeExtraSlashes(true);


$router->setDefaultNamespace('App\Controllers');

$router->notFound(['controller' => 'error', 'action' => 'notFoundAction']);

//Route Rule Here
$router->add('/api.php/service', [
    'controller' => 'Service',
    'action' => 'index'
]);

$router->add('/api.php/index', [
    'controller' => 'Index',
    'action' => 'index'
]);

$router->add('/api.php/download/:action', [
    'controller' => 'Download',
    'action' => 1
]);

$router->add('/api.php/upload', [
    'controller' => 'Upload',
    'action' => 'index'
]);

$router->handle();

$di->set('router', $router);

//Route Rule End
