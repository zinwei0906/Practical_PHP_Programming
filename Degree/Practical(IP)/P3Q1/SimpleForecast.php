<?php

require_once './DisplayElements.php';
require_once './Observer.php';
require_once './Subject.php';

/**
 * Description of SimpleForecast
 *
 * @author tanzw
 */
class SimpleForecast implements Observer, DisplayElements {

    private $currentPresure;
    private $lastPresure;

    public function __construct(WeatherData $w) {
        $this->currentPresure = $this->lastPresure = $lastPresure = $w->getPressure();
    }

    public function update(Subject $subject) {
        $this->lastPresure = $this->currentPresure;
        $this->currentPresure = $subject->getPressure();
        $this->display();
    }

    public function display() {
        $msgStr = "<h1>Simple Forecast </h1>";
        $msgStr .= "<h2>Current Presure : " . $this->currentPresure . "&#8451; <br/>";
        $msgStr .= "<h2>Last Presure : " . $this->lastPresure . "&#8451; <br/>";
        if ($this->currentPresure > $this->lastPresure) {
            $msgStr .= "<h2>Improving weather on the way!</h2><br/><br/>";
        } else if ($this->currentPresure < $this->lastPresure) {
            $msgStr .= "<h2>Watch out for cooler, rainy weather</h2><br/><br/>";
        } else {
            $msgStr .= "<h2>More of the same</h2><br/><br/>";
        }
        echo $msgStr;
    }

}
