<?php

require_once './Account.php';

class SAXparser {

    private $accounts;
    private $filename;
    private $accoutTmp;
    private $tmpValue;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->accounts = array();
        $this->parseDocument();
        $this->printData();
    }

    public function startElement($parser, $name, $attr) {
        if (!empty($name)) {
            if ($name == 'ACCOUNT') {
                $this->accountTmp = new Account();
            }
        }
    }

    public function endElement($parser, $name) {
        if ($name == 'ACCOUNT') {
            $this->accounts[] = $this->accountTmp;
        } elseif ($name == 'NUMBER') {
            $this->accountTmp->setNumber($this->tmpValue);
        } elseif ($name == 'BALANCE') {
            $this->accountTmp->setBalance($this->tmpValue);
        }
    }

    public function characters($parser, $data) {
        if (!empty($data)) {
            $this->tmpValue = trim($data);
        }
    }

    private function parseDocument() {
        $parser = xml_parser_create();
        xml_set_element_handler($parser,
                array($this, "startElement"),
                array($this, "endElement"));

        xml_set_character_data_handler($parser, array($this, "characters"));

        if (!($handle = fopen($this->filename, "r"))) {
            die("could not open XML input");
        }

        while ($data = fread($handle, 4096)) {
            xml_parse($parser, $data);
        }
    }

    public function printData() {
        $totalAmount = 0;
        echo "<br/><h1 style='color:red'>Account Listing</h1>";
        foreach ($this->accounts as $acc) {
            print $acc . "<br />";
            $totalAmount += $acc->getBalance();
        }

        print("<br/><h1 style='color:blue'>Total Amount : " . $totalAmount."</h1>");
    }

}

$worker = new SAXparser("account.xml");
?>

