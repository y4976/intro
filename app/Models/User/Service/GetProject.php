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
class GetProject extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('projectDao', 'App\Models\User\Dao\ProjectDao');
    }

    protected function process($requestValue)
    {
        $project = $this->projectDao->getProject($requestValue->id);
        $project->skillList = $this->projectDao->getProjectSkillList($requestValue->id);
        $project->description = str_replace("\r\n", "<br>", $project->description);

        $this->responseValue->item = $project;
    }
}