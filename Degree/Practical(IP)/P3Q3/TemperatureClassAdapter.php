<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of TemperatureClassAdapter
 *
 * @author tanzw
 */
require_once './CelciusTemperature.php';
require_once './ITemperature.php';

class TemperatureClassAdapter extends CelciusTemperature implements ITemperature {

    public function getTemperatureInF() {
        $celcius = $this->getTemperatureInC();
        return $celcius * (9 / 5) + 32;
        //Celcius = (Fahrenheit – 32) x (5 / 9)
        //Fahrenheit = Celcius x (9 / 5) + 32
    }

    public function setTemperatureInF($temperatureInF) {
        $celcius = ($temperatureInF - 32) * (5 / 9);
        $this->setTemperatureInC($celcius);
    }

}
