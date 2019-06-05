<?php

namespace Tests\Evaluating;

use App\Homework;
use PHPUnit\Framework\TestCase;

class HomeworkTest extends TestCase
{

    public function testEdit_mark()
    {

    }

    public function testClear_marks()
    {

    }

    public function testEvaluate()
    {


    }

    /**
     * @dataProvider dataProvider
     */
    public function testPercent_per_character($enter, $etalon)
    {
        $hw = new Homework();
        $result = $hw->percent_per_character($enter);
        $this->assertSame($result, $etalon);

    }

    public function dataProvider()
    {
        return [
            [60.00, '3'],
            [66., '4-'],
            [100.00, '5+'],
            [70.00, '4'],
            [0.00, '1'],
        ];
    }


    public function testValidate_mark()
    {

    }
}
