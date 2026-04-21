<?php

/**
 * Description of WeatherData
 *
 * @author tanzw
 */
class WeatherData implements SplSubject {

    //put your code here
    private $temperature;
    private $humidity;
    private $pressure;
    private $Observer;

    public function __construct($temperature, $humidity, $pressure) {
        $this->Observer = new SplObjectStorage();
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    public function attach(\SplObserver $observer): void {
        $this->Observer->attach($observer);
    }

    public function detach(\SplObserver $observer): void {
        $this->Observer->detach($observer);
    }

    public function notify(): void {
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
        $this->notify();
    }

    public function setHumidity($humidity): void {
        $this->humidity = $humidity;
        $this->notify();
    }

    public function setPressure($pressure): void {
        $this->pressure = $pressure;
        $this->notify();
    }

}
