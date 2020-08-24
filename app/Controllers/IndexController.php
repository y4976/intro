<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2018-11-20
 * Time: 오전 10:22
 */

namespace App\Controllers;

use ShCommon\Base\BaseController;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $this->log->info('test');
        phpinfo();
    }
}