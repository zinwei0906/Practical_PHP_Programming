<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of FoodItem
 *
 * @author RSD2G6TanZinWei <tanzw-wm19@student.tarc.edu.my>
 */
require_once './Item.php';
require_once './InterfaceItem.php';

class FoodItem extends Item implements InterfaceItem {

    //put your code here
    private $unit;

    public function __construct($itemCode, $description, $price, $unit) {
        parent::__construct($itemCode, $description, $price);
        $this->unit = $unit;
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

    public function getUnit() {
        return $this->unit;
    }

    public function setUnit($unit): void {
        $this->unit = $unit;
    }

    public function calculateTotalPrice() {
        return $this->unit * $this->getPrice();
    }

    function displayItem() {
        echo "<h3 style='color:red'>Food Item<br/>" . parent::__toString() . "<br/>Total Price : " . number_format($this->calculateTotalPrice(), 2) . "</h3>";
    }

}
