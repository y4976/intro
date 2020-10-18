<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\User\Service;

use App\Models\User\Dao\DescriptionDao;
use ShCommon\Base\BaseService;
use stdClass;

/**
 * @property DescriptionDao $descriptionDao
 */
class GetAboutMeList extends BaseService
{
    public function __construct()
    {
        parent::__construct();

        $this->setSingleton('descriptionDao', 'App\Models\User\Dao\DescriptionDao');
    }

    protected function process($requestValue)
    {
        $this->responseValue->itemList = $this->descriptionDao->getDescriptionList(1);
        foreach ($this->responseValue->itemList as &$item) {
            $item->description = str_replace("\r\n", "<br>", $item->description);
            $item->description = "<small>{$item->description}</small>";
        }
    }
}