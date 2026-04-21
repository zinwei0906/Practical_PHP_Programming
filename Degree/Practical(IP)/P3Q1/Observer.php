<?php

/**
 *
 * @author tanzw
 */
require_once './Subject.php';

interface Observer {

    //put your code here
    public function update(Subject $subject);
}
