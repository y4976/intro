<?php
/**
 * Created by PhpStorm.
 * User: shchoi
 * Date: 2019-08-09
 * Time: 11:07
 */

namespace App\Models\Mail\Service;

use ShCommon\Base\BaseService;

class SendMail extends BaseService
{
    protected function process($requestValue)
    {
        $phpVersion = phpversion();
        $mailInfo = $requestValue->mailInfo;
        $mailTo = 'y497627@gmail.com';
        $subject = 'Contact message';
//        $headers[] = 'MIME-Version: 1.0';
//        $headers[] = 'Content-type: text/html; charset=UTF-8';
        $headers[] = "From: {$mailInfo->name} <{$mailInfo->mailFrom}>";
        $headers[] = "X-Mailer: PHP/{$phpVersion}";

        mail($mailTo, $subject, $mailInfo->content, implode("\r\n", $headers));
    }
}