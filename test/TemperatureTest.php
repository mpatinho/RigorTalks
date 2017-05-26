<?php



namespace RigorTalks\Tests;

use RigorTalks\Temperature;

class TemperatureTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     * @expectedException \RigorTalks\TemperatureNegativeException 
     * @return void
     */
    public function testToCreateANonValidTemperature()
    {
        new Temperature(-1);
    }

    /**
     * @test
     */
    public function testToCreateAValidTemperatureWithNamedConstructor()
    {
        $measure = 10;
        $this->assertSame(
            $measure,
            (Temperature::taken($measure))->measure()
        );
    }

    /**
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
