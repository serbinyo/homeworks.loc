<?php
declare(strict_types=1);

namespace Tests\Evaluating;

use App\Http\Controllers\User\Homework\PassController;
use PHPUnit\Framework\TestCase;

class PassControllerTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testSetMarkPercent($enter, $etalon)
    {
        $pc = new PassController();
        $result = $pc->setMarkPercent($enter[0], $enter[1], $enter[2], $enter[3], $etalon);
        $this->assertSame($result, $etalon);
    }

    public function dataProvider()
    {
        return [
            [[6, 6, 10, 10], 60.00],
            [[5, 7, 6, 12], 66.67],
            [[2, 3, 2, 3], 100.00],
            [[12, 16, 20, 20], 70.00],
            [[10, 10, 10, 10], 100.00],
        ];
    }
}
