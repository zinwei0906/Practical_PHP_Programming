<?php

require_once './ITemperature.php';
require_once './CelciusTemperature.php';

/**
 * Description of TemperatureObjectAdapter
 *
 * @author tanzw
 */
class TemperatureObjectAdapter implements ITemperature {

    private $CelciusTemperature;

    public function __construct() {
        $this->CelciusTemperature = new CelcuisTemperature();
    }

    public function getTemperatureInC() {
        return $this->CelciusTemperature->getTemperatureInC();
    }

    public function getTemperatureInF() {
        $celcius = $this->CelciusTemperature->getTemperatureInC();
        return $celcius * (9 / 5) + 32;
    }

    public function setTemperatureInC($temperatureInC) {
        $this->CelciusTemperature->setTemperatureInC($temperatureInC);
    }

    public function setTemperatureInF($temperatureInF) {
        $celcius = ($temperatureInF - 32) * (5 / 9);
        $this->CelciusTemperature->setTemperatureInC($celcius);
    }

}
