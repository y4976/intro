<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-07
 * Time: 10:10
 */

namespace App\Models\User\Dao;

use Phalcon\Db;
use ShCommon\Base\BaseDao;

class UserDao extends BaseDao
{
    public function getUser()
    {
        return $this->db->fetchOne(
            "
                SELECT * FROM `user`
            ",
            Db::FETCH_OBJ,
        );
    }
}