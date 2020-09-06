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

class VisitDao extends BaseDao
{
    public function addVisit($ip)
    {
        return $this->db->insert(
            'visit',
            [$ip, now()],
            ['ip','created']
        );
    }

    /**
     * @param $ip
     * @return boolean
     */
    public function isVisited3MinuteAgo($ip)
    {
        return $this->db->fetchColumn(
            "
                SELECT EXISTS(
                    SELECT ip
                    FROM visit 
                    WHERE ip = :ip AND created > NOW() - INTERVAL 3 MINUTE
                )
            ",
            [
                'ip' => $ip,
            ]
        );
    }

    /**
     * @return int
     */
    public function getTotalVisitCount()
    {
        return $this->db->fetchColumn(
            "
                SELECT COUNT(*)
                FROM visit 
            "
        );
    }

    /**
     * @return int
     */
    public function getTodayVisitCount()
    {
        return $this->db->fetchColumn(
            "
                SELECT COUNT(*)
                FROM visit 
                WHERE DATE(created) = CURDATE()
            "
        );
    }
}