<?php
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');

//AutoLoad
require_once BASE_PATH . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Phalcon\Cli\Console as ConsoleApp;
use Phalcon\Di\FactoryDefault\Cli as CliDI;

// Using the CLI factory default services container
$di = new CliDI();

//set Config
$di->setShared('config', function () {
    return include CONFIG_PATH . "/app.php";
});

//get Config
$config = $di->get('config');

//Load DefaultModule
include_once CONFIG_PATH . '/bootstrap.php';

// Set Default Namespace
$di->setShared('dispatcher', function () {
    $dispatcher = new Phalcon\CLI\Dispatcher();
    $dispatcher->setDefaultNamespace('App\\Tasks\\');
    return $dispatcher;
});

// Create a console application
$console = new ConsoleApp();
$console->setDI($di);

//Process the console arguments
$arguments = [];
foreach ($argv as $k => $arg) {
    if ($k == 1) {
        $arguments["task"] = $arg;
    } elseif ($k == 2) {
        $arguments["action"] = $arg;
    } elseif ($k >= 3) {
        $arguments["params"][] = $arg;
    }
}

try {
    // Handle incoming arguments
    $console->handle($arguments);
} catch (Exception $e) {
    echo $e->getMessage();
    exit(255);
}
