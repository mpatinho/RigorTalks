<?php
/**
 * Created by PhpStorm.
 * User: Belfa
 * Date: 31/5/17
 * Time: 23:59
 */

namespace RigorTalks;


interface ColdThresholdSource
{
    public function getThreshold():int;

}