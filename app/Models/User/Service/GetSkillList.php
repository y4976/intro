<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\SkillDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property SkillDao $skillDao
 */
class GetSkillList extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('skillDao', 'App\Models\User\Dao\SkillDao');
    }

    protected function process($requestValue)
    {
        $itemList = $this->skillDao->getSkillList();

        $extraData = new \stdClass();
        $extraData->frontEndList = $this->getList($itemList, 1);
        $extraData->backEndList = $this->getList($itemList, 2);
        $extraData->databaseList = $this->getList($itemList, 5);
        $extraData->delphiList = $this->getList($itemList, 3);
        $extraData->etcList = $this->getList($itemList, 9);

        $this->responseValue->itemList = $itemList;
        $this->responseValue->extraData = $extraData;
    }

    private function getList($itemList, $category)
    {
        $list = [];

        foreach ($itemList as $item) {
            if ($item->category == $category) {
                array_push($list, $item->skill);
            }
        }
        return $list;
    }
}