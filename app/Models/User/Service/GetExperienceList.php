<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\ExperienceDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property ExperienceDao $experienceDao
 */
class GetExperienceList extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('experienceDao', 'App\Models\User\Dao\ExperienceDao');
    }

    protected function process($requestValue)
    {
        $this->responseValue->itemList = $this->experienceDao->getExperienceList();
        foreach ($this->responseValue->itemList as &$item) {
            $item->projectList = $this->experienceDao->getExperienceProjectIdList($item->id);
        }
    }
}