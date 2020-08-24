<?php

namespace App\Controllers;

use ShCommon\Base\BaseController;

class ErrorController extends BaseController
{
    public function indexAction()
    {
        echo 500;
    }

    public function notFoundAction()
    {
        echo 404;
    }
}
