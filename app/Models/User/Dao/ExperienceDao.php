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

class ExperienceDao extends BaseDao
{
    public function getExperienceList()
    {
        return $this->db->fetchAll(
            "
                SELECT * FROM experience
            ",
            Db::FETCH_OBJ,
        );
    }

    public function getExperienceProjectIdList($id)
    {
        return $this->db->fetchAll(
            "
                SELECT project.id, title
                FROM experience_project INNER JOIN project ON experience_project.projectId = project.id
                WHERE experienceId = :experienceId
            ",
            Db::FETCH_OBJ,
            [
                'experienceId' => $id,
            ]
        );
    }
}