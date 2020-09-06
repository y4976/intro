<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-07
 * Time: 10:10
 */

namespace App\Models\User\Dao;

use ShCommon\Base\BaseDao;

class MessageDao extends BaseDao
{
    public function addMessage($item)
    {
        return $this->db->insert(
            'message',
            [$item->name, $item->email, $item->message],
            ['name','email','message']
        );
    }

    /**
     * @return int
     */
    public function getTotalMessageCount()
    {
        return $this->db->fetchColumn(
            "
                SELECT COUNT(*)
                FROM message 
            "
        );
    }

}