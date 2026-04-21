<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Email
 *
 * @author tanzw
 */
require_once './IEmail.php';

class Email implements IEmail {

    private $to;
    private $from;
    private $message;

    public function __construct($to, $from, $message) {
        $this->to = $to;
        $this->from = $from;
        $this->message = $message;
    }

    public function getTo() {
        return $this->to;
    }

    public function getFrom() {
        return $this->from;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getContent() {
        return $this->message;
    }

}
