<?php

require_once './DisplayElements.php';

class WeatherStatistic implements SplObserver, DisplayElements {

    private $averageTemperature;
    private $maxTemperature;
    private $minTemperature;

    public function __construct(WeatherData $wd) {
        $this->averageTemperature = $wd->getTemperature();
        $this->maxTemperature = -99; //PHP_FLOAT_MAX
        $this->minTemperature = 99;  //PHP_FLOAT_MIN
    }

    public function update(SplSubject $subject) {
        $currentTemperature = $subject->getTemperature();
        if ($currentTemperature < $this->minTemperature) {
            $this->minTemperature = $currentTemperature;
        }
        if ($currentTemperature > $this->maxTemperature) {
            $this->maxTemperature = $currentTemperature;
        }
        $this->averageTemperature = ($this->maxTemperature + $this->minTemperature) / 2;
        $this->display();
    }

    public function display() {
        $msgStr = "<h1>Weather Statistic </h1>";
        $msgStr .= "<h2>Average Temperature : " . $this->averageTemperature . "&#8451; <br/>";
        $msgStr .= "<h2>Max Temperature : " . $this->maxTemperature . "&#8451; <br/>";
        $msgStr .= "<h2>Min Temperature : " . $this->minTemperature . "&#8451; <br/><br/>";
        echo $msgStr;
    }

}
