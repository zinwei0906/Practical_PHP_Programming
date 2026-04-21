<?php

/**
 *
 * @author tanzw
 */
require_once './Observer.php';

interface Subject {

    //put your code here
    public function attachObserver(Observer $observer);

    public function detachObserver(Observer $observer);

    public function notifyObserver();
}
