<?php

namespace App\Tasks;

use App\Models\Service;
use Phalcon\Cli\Task;

class TestTask extends Task
{
    public function MainAction()
    {
        $test = new Service\Test2();
        $data = ['test' => 1111, 'name' => $test->getA()];

        echo json_encode($data);
    }

    public function OtherAction()
    {
        echo "This is other action\r\n";
    }
}
