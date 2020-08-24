<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-08
 * Time: 16:45
 */

namespace App\Controllers;

use Exception;
use ShCommon\Base\BaseServiceController;
use stdClass;

class UploadController extends BaseServiceController
{
    protected $serviceNamespacesList = [
        'App\Models\File\Service\\',
    ];

    /**
     * @return stdClass
     * @throws Exception
     */
    protected function receiveRequest()
    {
        $fileList = $this->request->getUploadedFiles();
        $data = json_decode($this->request->getPost('data'));
        $data->file = $fileList[0];

        $request = new stdClass();
        $request->service = $this->request->getPost('service');
        $request->value = $data;

        return $request;
    }
}