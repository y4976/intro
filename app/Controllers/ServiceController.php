<?php
namespace App\Controllers;

use ShCommon\Base\BaseServiceController;

class ServiceController extends BaseServiceController
{
    protected $serviceNamespacesList = [
        'App\Models\Auth\Service\\',
        'App\Models\User\Service\\',
        'App\Models\File\Service\\',
        'App\Models\Mail\Service\\',
    ];

    protected $propertyList = [
        'int' => ['id', 'totalProjectCount'],
        'boolean' => [],
        'float' => [],
        'intArray' => [],
    ];
}