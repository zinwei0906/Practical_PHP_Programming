<?php

require_once './Account.php';

class DOMparser {

    private $accounts;

    public function __construct($filename) {
        $this->accounts = new SplObjectStorage();
        $this->readFromXML($filename);
        $this->display();
    }

    public function readFromXML($filename) {
        $xml = simplexml_load_file($filename);
        $accList = $xml->account;

        foreach ($accList as $acc) {
            $attr = $acc->attributes();
            $accTemp = new Account($acc->number, $acc->balance);
            $this->accounts->attach($accTemp);
        }
    }

    public function display() {
        $totalAmount = 0;
        echo "<br/><h1 style='color:red'>Account Listing</h1>";
        foreach ($this->accounts as $acc) {
            print $acc . "<br />";
            $totalAmount += $acc->getBalance();
        }
        print("<br/><h1 style='color:blue'>Total Amount : " . $totalAmount."</h1>");
    }

}

$worker = new DOMparser("Account.xml");
