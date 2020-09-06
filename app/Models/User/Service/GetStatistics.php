<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\MessageDao;
use App\Models\User\Dao\VisitDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property VisitDao $visitDao
 * @property MessageDao $messageDao
 */
class GetStatistics extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('visitDao', 'App\Models\User\Dao\VisitDao');
        $this->setSingleton('messageDao', 'App\Models\User\Dao\MessageDao');
    }

    protected function process($requestValue)
    {
        $item = new stdClass();
        $item->todayVisitCount = $this->visitDao->getTodayVisitCount();
        $item->totalVisitCount = $this->visitDao->getTotalVisitCount();
        $item->messageLeftCount = $this->messageDao->getTotalMessageCount();
        $item->totalProjectCount = 17;

        $this->responseValue->item = $item;
    }
}