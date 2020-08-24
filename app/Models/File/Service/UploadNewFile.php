<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-12
 * Time: 13:42
 */

namespace App\Models\File\Service;

use Exception;
use Phalcon\Http\Request\File;
use ShCommon\Base\BaseService;

class UploadNewFile extends BaseService
{
    protected function process($requestValue)
    {
        $this->responseValue->url = $this->uploadFile($requestValue->file);
    }

    /**
     * @param File $file
     * @return string
     * @throws Exception
     */
    private function uploadFile($file)
    {
        $path = 'assets/img/uploads/';
        $fileName = $file->getName();
        $fileName = date("Y-m-d").'_'.rand(999,99999999).$fileName;
        try {
            if (!is_dir($path)) {
                mkdir($path, 0777);
            }

            $newPath = $path.urlencode($fileName);

            if(!file_exists($newPath)){
                $file->moveTo($newPath);
                if (file_exists($newPath)) {
                    return $newPath;
                } else {
                    throw new Exception('file error');
                }
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
