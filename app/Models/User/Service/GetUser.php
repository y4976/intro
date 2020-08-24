<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\UserDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property UserDao $userDao
 */
class GetUser extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('userDao', 'App\Models\User\Dao\UserDao');
    }

    protected function process($requestValue)
    {
        $this->responseValue->item = $this->userDao->getUser();
    }
}