<?php

/**
 * Description of CurrentCondition
 *
 * @author tanzw
 */
require_once './DisplayElements.php';

class CurrentCondition implements SplObserver, DisplayElements {

    private $temperature;
    private $humidity;

    public function __construct(WeatherData $wd) {
        $this->temperature = $wd->getTemperature();
        $this->humidity = $wd->getHumidity();
    }

    public function update(SplSubject $subject) {
        $this->temperature = $subject->getTemperature();
        $this->humidity = $subject->getHumidity();
        $this->display();
    }

    public function display() {
        $msgStr = "<h1>Current Condition </h1>";
        $msgStr .= "<h2>Temperature : " . $this->temperature . "&#8451; <br/>";
        $msgStr .= "Humidity    : " . $this->humidity . "% <br/><br/></h2>";
        echo $msgStr;
    }

}
