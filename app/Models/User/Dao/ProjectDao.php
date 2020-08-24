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

class ProjectDao extends BaseDao
{
    public function getProjectList()
    {
        return $this->db->fetchAll(
            "
                SELECT * FROM project
            "
        );
    }

    public function getProject($id)
    {
        return $this->db->fetchOne(
            "
                SELECT * FROM project WHERE id = :id
            ",
            Db::FETCH_OBJ,
            [
                'id' => $id,
            ]
        );
    }

    public function getProjectSkillList($id)
    {
        return $this->db->fetchAll(
            "
                SELECT skill FROM project_skill LEFT JOIN skill ON project_skill.skillId = skill.id WHERE projectId = :id
            ",
            Db::FETCH_OBJ,
            [
                'id' => $id,
            ]
        );
    }
}