<?php



namespace RigorTalks\Tests;

use RigorTalks\Temperature;

class TemperatureTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Undocumented function
     * @test
     * @expectedException \RigorTalks\TemperatureNegativeException 
     * @return void
     */
    public function testToCreateANonValidTemperature()
    {
        new Temperature(-1);
    }

    /**
     * Undocumented function
     * @test
     * @return void
     */
    public function testToCreateAValidTemperature()
    {
        $measure = 10;
        $this->assertSame(
            $measure,
            (new Temperature($measure))->measure()
        );
    }
}
?>
