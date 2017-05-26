<?php
namespace RigorTalks;

class Temperature{
    private $measure;

    private function __construct(int $measure)
    {
        $this->setMeasure($measure);
    }

    private function setMeasure(int $measure)
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
            throw TemperatureNegativeException::fromMeasure($measure);
        }
    }

    public static function taken($measure):self {

        return new static($measure);
    }

    public function measure(): int
    {
        return $this->measure;
    }


}

?>
