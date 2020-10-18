<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\ProjectDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property ProjectDao $projectDao
 */
class GetProjectList extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('projectDao', 'App\Models\User\Dao\ProjectDao');
    }

    protected function process($requestValue)
    {
        $itemList = $this->projectDao->getProjectList();
        foreach ($itemList as &$item) {
            $item->descriptionList = $this->projectDao->getProjectDescriptionList($item->id);
            $item->skillList = $this->projectDao->getProjectSkillList($item->id);
        }

        $this->responseValue->itemList = $itemList;
    }
}