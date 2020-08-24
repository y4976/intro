<?php

use Phalcon\Events\Manager;

$eventsManager = new Manager();


// Listen all the database events
$eventsManager->attach(
    'application',
    new \App\Middleware\Test()
);


$application->setEventsManager($eventsManager);
