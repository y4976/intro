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
        $this->responseValue->itemList = $this->skillDao->getSkillList();
    }
}