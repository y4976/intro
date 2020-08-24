<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-07
 * Time: 10:10
 */

namespace App\Models\User\Dao;

use ShCommon\Base\BaseDao;
use Phalcon\Db;

class DescriptionDao extends BaseDao
{
    public function getDescriptionList($userId)
    {
        return $this->db->fetchAll(
            "
                SELECT * FROM user_description WHERE userId = :userId
            ",
            Db::FETCH_OBJ,
            [
                'userId' => $userId,
            ]
        );
    }
}