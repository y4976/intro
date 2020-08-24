<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

use Phalcon\Db\Exception;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlConnection;

try {
    $connection = new MysqlConnection(
        [
            "host"     => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname"   => $config->database->dbname,
            "port"     => $config->database->port,
        ]
    );

    $di->setShared('db', $connection);

} catch (Exception $e) {
    throw $e;
}

try {
    $logger = new Logger('Application');
    $logger->pushHandler(new StreamHandler(
        $config->application->logDir . date('Y-m-d', time()) . '.log',
        $config->application->logLevel
    ));

    $di->setShared('log', $logger);
} catch (Exception $e) {
    throw $e;
}

$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new Url();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.phtml' => PhpEngine::class
    ]);

    return $view;
});