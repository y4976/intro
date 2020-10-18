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

class SkillDao extends BaseDao
{
    public function getSkillList()
    {
        return $this->db->fetchAll(
            "
                SELECT * FROM skill
            ",
            Db::FETCH_OBJ,

        );
    }
}