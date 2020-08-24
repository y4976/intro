<?php
/** @noinspection ALL */
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', BASE_PATH . '/config');

require_once BASE_PATH . '/vendor/autoload.php';

if ((bool)(getenv('SERVER_ENV') == 'local')) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
} else {
    ini_set("display_errors", 0);
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
}

try {
    $dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
    $dotenv->load();

    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new Phalcon\Di\FactoryDefault();

    if ((bool)(getenv('SERVER_ENV') == 'local') && class_exists(Whoops\Run::class)) {
        new Whoops\Provider\Phalcon\WhoopsServiceProvider($di);
    }

    /**
     * Add Shared configuration
     */
    $di->setShared('config', function () {
        return include CONFIG_PATH . "/app.php";
    });

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->get('config');


    /**
     * Handle routes
     */
    include CONFIG_PATH . '/router.php';

    /**
     * Read services
     */
    include CONFIG_PATH . '/bootstrap.php';

    /**
     * Handle the request
     */
    $application = new Phalcon\Mvc\Application($di);

    /**
     * middleware Register
     */
    include CONFIG_PATH . '/middleware.php';

    /**
     *
     */
    $application->useImplicitView(false);

    $handle = $application->handle();

    if (!$handle) {
        return ;
    }

    if (!$handle->isSent()) {
        $handle->send();
    }
} catch (Exception $e) {
    if ((bool)(getenv('SERVER_ENV') == 'local')) {
        throw $e;
    }

    echo 'initialize error : '.$e->getMessage();
}
