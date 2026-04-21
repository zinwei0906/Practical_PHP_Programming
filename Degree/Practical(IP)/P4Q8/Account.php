<?php

class Account {

    private $number;
    private $balance;

    public function __construct($number = "", $balance = 0.00) {
        $this->number = $number;
        $this->balance = $balance;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setNumber($number): void {
        $this->number = $number;
    }

    public function setBalance($balance): void {
        $this->balance = $balance;
    }

    public function __toString() {
        return "<h2>Account Number : ".$this->number . "<br/>Account Balance : " . $this->balance;
    }

}
