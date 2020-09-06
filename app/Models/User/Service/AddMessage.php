<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\Mail\Service;

use App\Models\User\Dao\MessageDao;
use ShCommon\Base\BaseService;

/**
 * @property MessageDao $messageDao
 */
class AddMessage extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('messageDao', 'App\Models\User\Dao\MessageDao');
    }

    protected function process($requestValue)
    {
        $this->messageDao->addMessage($requestValue->item);
    }
}