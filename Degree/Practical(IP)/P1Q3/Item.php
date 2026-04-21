<?php

/**
 * Description of Item
 *
 * @author RSD2G6TanZinWei <tanzw-wm19@student.tarc.edu.my>
 */
abstract class Item {

    //put your code here
    private string $itemCode;
    private string $description;
    private float $price;

    public function __construct($itemCode, $description, $price) {
        $this->itemCode = $itemCode;
        $this->description = $description;
        $this->price = $price;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function getItemCode() {
        return $this->itemCode;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setItemCode($itemCode): void {
        $this->itemCode = $itemCode;
    }

    public function setDescription($description): void {
        $this->description = $description;
    }

    public function setPrice($price): void {
        $this->price = $price;
    }

    public function __toString() {
        return "Code : $this->itemCode<br/>Description : $this->description<br/>Price : $this->price";
    }

}
