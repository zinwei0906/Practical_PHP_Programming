<?php

require_once './Loan.php';

class LoanCalculate {

    public function calMonthlyPayment($rate, $duration, $amount) {
        $loan = new Loan($rate, $duration, $amount);
        return $loan->getMonthlyPayment();
    }

    public function calTotalPayment($rate, $duration, $amount) {
        $loan = new Loan($rate, $duration, $amount);
        return $loan->getTotalPayment();
    }

}
