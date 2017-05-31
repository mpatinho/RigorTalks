<?php



namespace RigorTalks\Tests;

use RigorTalks\ColdThresholdSource;
use RigorTalks\Temperature;
use RigorTalks\TemperatureTestClass;

class TemperatureTest extends \PHPUnit\Framework\TestCase implements ColdThresholdSource
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

    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperCold()
    {

        $this->assertTrue(
            Temperature::taken(10)->isSuperCold(
                new class implements ColdThresholdSource{
                    public function getThreshold():int
                    {
                        return 50;
                    }
                }
            )
        );
    }
    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperColdWithAnonimousClass()
    {

        $this->assertTrue(
            Temperature::taken(10)->isSuperCold(
                $this
            )
        );
    }

    public function getThreshold():int
    {
        return 50;
    }
}
?>
