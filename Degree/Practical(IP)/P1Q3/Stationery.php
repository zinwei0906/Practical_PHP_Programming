<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Stationery
 *
 * @author RSD2G6TanZinWei <tanzw-wm19@student.tarc.edu.my>
 */
require_once './Item.php';
require_once './InterfaceItem.php';

class Stationery extends Item implements InterfaceItem {

    //put your code here
    private $weight;

    public function __construct($itemCode, $description, $price, $weight) {
        parent::__construct($itemCode, $description, $price);
        $this->weight = $weight;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name))
            $this->$name = $value;
        else
            parent::__set($name, $value);
    }

    public function __get($name) {
        if (property_exists($this, $name))
            return $this->$name;
        else
            return parent::__get($name);
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight): void {
        $this->weight = $weight;
    }

    function displayItem() {
        echo "<h3 style='color:blue'>Stationery<br/>" . parent::__toString() . "<br/>Weight : $this->weight</h3>";
    }

}
