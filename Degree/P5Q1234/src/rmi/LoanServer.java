/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package rmi;

/**
 *
 * @author tanzw
 */
import java.rmi.RemoteException;
import java.rmi.server.UnicastRemoteObject;
import rmi.LoanInterface;

public class LoanServer extends UnicastRemoteObject implements LoanInterface {

    public LoanServer() throws RemoteException {
        super();
    }

    public double calMonthlyPayment(double rate, int duration, double amount) throws RemoteException {
        Loan loan = new Loan(rate, duration, amount);
        return loan.getMonthlyPayment();
    }

    public double calTotalPayment(double rate, int duration, double amount) throws RemoteException {
        Loan loan = new Loan(rate, duration, amount);
        return loan.getTotalPayment();
    }
}
