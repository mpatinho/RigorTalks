<?php
namespace RigorTalks;

class Temperature{
    private $measure;

    public function __construct(int $measure)
    {
        if ($measure < 0) {
            throw new TemperatureNegativeException("Measure should be positive");
        }

        $this->measure = $measure;
    }

    public function measure(): int
    {
        return $this->measure;
    }
}

?>
