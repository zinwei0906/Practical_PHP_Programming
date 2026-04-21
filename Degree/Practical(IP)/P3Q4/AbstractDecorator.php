<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AbstractDecorator
 *
 * @author tanzw
 */
require_once './IEmail.php';

abstract class AbstractDecorator implements IEmail {

    protected $Email;

    public function __construct($Email) {
        $this->Email = $Email;
    }

    public abstract function getContent();
}
