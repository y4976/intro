<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\UserDao;
use App\Models\User\Dao\VisitDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property UserDao $userDao
 * @property VisitDao $visitDao
 */
class Initialize extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('userDao', 'App\Models\User\Dao\UserDao');
        $this->setSingleton('visitDao', 'App\Models\User\Dao\VisitDao');
    }

    protected function process($requestValue)
    {
        $item = $this->userDao->getUser();
        $item->brief = str_replace("\r\n", "<br>", $item->brief);

        $ip = getRealClientIp();
        $this->log->info($ip);

        if (!$this->visitDao->isVisited3MinuteAgo($ip)) {
            $this->visitDao->addVisit($ip);
        }

        $this->responseValue->item = $item;
    }
}