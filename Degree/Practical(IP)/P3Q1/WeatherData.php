<?php

/**
 * Description of WeatherData
 *
 * @author tanzw
 */
require_once './Subject.php';

class WeatherData implements Subject {

    //put your code here
    private $temperature;
    private $humidity;
    private $pressure;
    private $Observer = array();

    public function __construct($temperature, $humidity, $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    public function attachObserver(Observer $observer) {
        array_push($this->Observer, $observer);
    }

    public function detachObserver(Observer $observer) {
        if (!empty($this->Observer)) {
            $index = array_search($observer, $this->Observer);
            if ($index != false) {
                //unset($this->Observer[$index]);
                array_splice($this->Observer, $index);
            }
        }
    }

    public function notifyObserver() {
        foreach ($this->Observer as $obs) {
            $obs->update($this);
        }
    }

    //Getter
    public function getTemperature() {
        return $this->temperature;
    }

    public function getHumidity() {
        return $this->humidity;
    }

    public function getPressure() {
        return $this->pressure;
    }

    //Setter
    public function setTemperature($temperature): void {
        $this->temperature = $temperature;
        $this->notifyObserver();
    }

    public function setHumidity($humidity): void {
        $this->humidity = $humidity;
        $this->notifyObserver();
    }

    public function setPressure($pressure): void {
        $this->pressure = $pressure;
        $this->notifyObserver();
    }

}
