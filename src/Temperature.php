<?php
namespace RigorTalks;

class Temperature{
    private $measure;

    public function __construct(int $measure)
    {
        $this->setMeasure($measure);
    }

    private function setMeasure(int $measure): void
    {
        $this->checkMeasureIsPositive($measure);

        $this->measure = $measure;
    }

    /**
     * @param int $measure
     * @throws TemperatureNegativeException
     */
    private function checkMeasureIsPositive(int $measure)
    {
        if ($measure < 0) {
            throw new TemperatureNegativeException("Measure should be positive");
        }
    }
    
    public function measure(): int
    {
        return $this->measure;
    }


}

?>
