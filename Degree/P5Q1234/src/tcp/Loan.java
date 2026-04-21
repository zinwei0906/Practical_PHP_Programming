package tcp;

import java.io.Serializable;

public class Loan implements Serializable {

    private double annualInterestRate;
    private int numberOfYears;
    private double loanAmount;

    public Loan() {
    }

    public Loan(double annualInterestRate, int numberOfYears, double loanAmount) {
        this.annualInterestRate = annualInterestRate;
        this.numberOfYears = numberOfYears;
        this.loanAmount = loanAmount;
    }

    public double getAnnualInterestRate() {
        return annualInterestRate;
    }

    public void setAnnualInterestRate(double annualInterestRate) {
        this.annualInterestRate = annualInterestRate;
    }

    public int getNumberOfYears() {
        return numberOfYears;
    }

    public void setNumberOfYears(int numberOfYears) {
        this.numberOfYears = numberOfYears;
    }

    public double getLoanAmount() {
        return loanAmount;
    }

    public void setLoanAmount(double loanAmount) {
        this.loanAmount = loanAmount;
    }

    public double getMonthlyPayment() {
        double monthlyInterestRate = annualInterestRate / 1200;
        double monthlyPayment = loanAmount * monthlyInterestRate / (1
                - (Math.pow(1 / (1 + monthlyInterestRate), numberOfYears * 12)));
        return monthlyPayment;
    }

    public double getTotalPayment() {
        double totalPayment = getMonthlyPayment() * numberOfYears * 12;
        return totalPayment;
    }

    @Override
    public String toString() {
        return "\n\nLoan Amount : RM "+this.getLoanAmount()+
                "\nAnnual Interest Rate : "+this.getAnnualInterestRate()+"%"+
                "\nNumber Of Years : "+this.getNumberOfYears()+
                "\nMonthly Payment : RM "+this.getMonthlyPayment()+
                "\nTotal Payment : RM "+this.getTotalPayment();
    }

}
