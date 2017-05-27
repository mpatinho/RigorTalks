<?php

namespace RigorTalks;

class TemperatureTestClass extends Temperature
{


    public function getThreshold(): int
    {
        return 50;
    }
}