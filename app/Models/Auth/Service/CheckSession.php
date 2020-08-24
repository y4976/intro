<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\Auth\Service;

use ShCommon\Base\BaseService;

class CheckSession extends BaseService
{
    protected function process($requestValue)
    {
        $this->responseValue->status = 'ok';
    }
}