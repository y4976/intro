<?php

namespace App\Middleware;

use Phalcon\Events\Event;
use Phalcon\Mvc\Application;

class Test
{
    public function afterHandleRequest(Event $event, Application $application)
    {
        /**
         *
         */

        return true;
    }


    public function beforeHandleRequest(Event $event, Application $application)
    {
        /**
         *
         */


        return true;
    }

    public function beforeSendResponse(Event $event, Application $application)
    {
        /**
         *
         */

        return true;
    }
}
