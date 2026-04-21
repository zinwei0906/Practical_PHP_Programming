<?php

/**
 * Description of SecureEmailDecorator
 *
 * @author tanzw
 */
require_once './AbstractDecorator.php';

class SecureEmailDecorator extends AbstractDecorator {

    public function __construct($Email) {
        parent::__construct($Email);
    }

    public function getContent() {
        return $this->encryption();
    }

    public function encryption() {
        $msg = $this->Email->getContent();
        return strrev($msg);
    }

}
