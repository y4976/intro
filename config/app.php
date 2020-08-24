<?php
/*
 * Modified: prepend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
use Phalcon\Config;

date_default_timezone_set('Asia/Seoul');
//date_default_timezone_set('UTC');
setlocale(LC_ALL, 'en_US');
$isCommunicateEncrypted = true;

if (!(bool)getenv('IS_COMMUNICATE_ENCRYPTED') && (bool)(getenv('SERVER_ENV') == 'local')) {
    $isCommunicateEncrypted = false;
}

return new Config([
    'database' => [
        'driver'      => getenv('DB_DRIVER'),
        'dbname'      => getenv('DB_NAME'),
        'host'        => getenv('DB_HOST'),
        'dsn'         => getenv('DB_DSN'),
        'username'    => getenv('DB_USERNAME'),
        'password'    => getenv('DB_PASSWORD'),
        'port'        => getenv('DB_PORT'),
        'options'     => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ)
    ],
    'application' => [
        //DEBUG (100) INFO (200) NOTICE (250) WARNING (300) ERROR (400)
        'logLevel'       => (int)getenv('LOG_LEVEL'),

        'isCommunicateEncrypted' => $isCommunicateEncrypted,

        'systemDir'      => BASE_PATH . '/system/',
        'storageDir'     => BASE_PATH . '/storage/',
        'cacheDir'       => BASE_PATH . '/storage/cache/',
        'logDir'         => BASE_PATH . '/storage/logs/',

        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/Controllers/',
        'modelsDir'      => APP_PATH . '/Models/',
        'middlewareDir'  => APP_PATH . '/Middleware/',
        'helperDir'      => APP_PATH . '/Helper/',
        'exceptionsDir'  => APP_PATH . '/Exceptions/',
        'viewsDir'       => APP_PATH . '/Views/',
        'libraryDir'     => APP_PATH . '/Library/',

        // This allows the baseUri to be understand project paths that are not in the root directory
        // of the webpspace.  This will break if the public/index.php entry point is moved or
        // possibly if the web server rewrite rules are changed. This can also be set to a static path.
        'baseUri' => preg_replace('/public([\/\\\\])api.php$/', '', $_SERVER["PHP_SELF"]),
    ]
]);
