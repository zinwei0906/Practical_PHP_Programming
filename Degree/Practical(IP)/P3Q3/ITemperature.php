<?php

/**
 *
 * @author tanzw
 */
interface ITemperature {

    public function getTemperatureInF();

    public function setTemperatureInF($temperatureInF);

    public function getTemperatureInC();

    public function setTemperatureInC($temperatureInC);
}
