<?php
require_once './LoanCalculate.php';

$options = array("uri" => "http://localhost");
$server = new SoapServer(null, $options);
$server->setClass('LoanCalculate');
$server->handle();

