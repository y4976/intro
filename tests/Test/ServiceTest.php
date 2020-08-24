<?php

namespace Test;

use App\Models\Auth\Service\CheckSession;
use Exception;

/**
 * Class UnitTest
 */
class ServiceTest extends \UnitTestCase
{
    /**
     * @throws Exception
     */
    public function testCheckSession()
    {
        $requestValue = json_decode('{"service":"CheckSession"}');
        $service = new CheckSession();

        $responseValue = $service->processService($requestValue);

        $this->assertEquals(
            json_encode($responseValue),
            '{"status":"ok"}',
            "success"
        );
    }
}