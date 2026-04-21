<?php

require_once 'lib/nusoap.php';
require_once './Loan.php';

function calMonthlyPayment($rate, $duration, $amount) {
    $loan = new Loan($rate, $duration, $amount);
    return $loan->getMonthlyPayment();
}

function calTotalPayment($rate, $duration, $amount) {
    $loan = new Loan($rate, $duration, $amount);
    return $loan->getTotalPayment();
}

$server = new nusoap_server(); // Create a instance for nusoap server
$server->configureWSDL("Loanservice", "urn:loanApplication"); // Configure WSDL file

$server->register(
        "calMonthlyPayment", //name function
        array("rate" => "xsd:double", "duration" => "xsd:integer", "amount" => "xsd:double"), //input
        array("return" => "xsd:double")); //output

$server->register(
        "calTotalPayment", //name function
        array("rate" => "xsd:double", "duration" => "xsd:integer", "amount" => "xsd:double"), //input
        array("return" => "xsd:double")); //output

$server->service(file_get_contents("php://input"));

