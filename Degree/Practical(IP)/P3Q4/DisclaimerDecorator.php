<?php

/**
 * Description of DisclaimerDecorator
 *
 * @author tanzw
 */
require_once './AbstractDecorator.php';

class DisclaimerDecorator extends AbstractDecorator {

    private $disclaimerMsg = "The content of this email is confidential and intended for the recipient specified in message only.";

    public function __construct($Email) {
        parent::__construct($Email);
    }

    public function getContent() {
        return $this->Email->getContent() . "<br/><br/>" . $this->disclaimerMsg;
    }

}
