<?php
namespace RigorTalks;

use Doctrine\DBAL\DriverManager;

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

    public function isSuperHot(): bool
    {
        $threshold = $this->getThreshold();


        return $this->measure() > $threshold;
    }

    protected function getThreshold(): int
    {
        // It could also be
        // global $conn
        $conn = \Doctrine\DBAL\DriverManager::getConnection(array(
            'dbname' => 'mydb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'dirver' => 'pdo_mysql',
        ), new \Doctrine\DBAL\Configuration());

        return $conn->fetchColumn("SELECT hot_threshold FROM configuration");
    }
}

?>
