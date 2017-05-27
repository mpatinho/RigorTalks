<?php



namespace RigorTalks\Tests;

use RigorTalks\Temperature;
use RigorTalks\TemperatureTestClass;

class TemperatureTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     * @expectedException \RigorTalks\TemperatureNegativeException 
     * @return void
     */
    public function testToCreateANonValidTemperature()
    {
        Temperature::taken(-1);
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
            (Temperature::taken($measure))->measure()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfAColdTemperatureIsSuperHot()
    {
        $this->assertFalse(
            TemperatureTestClass::taken(10)->isSuperHot()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperHotTemperatureIsSuperHot()
    {
        $this->assertTrue(
            TemperatureTestClass::taken(100)->isSuperHot()
        );
    }
}
?>
