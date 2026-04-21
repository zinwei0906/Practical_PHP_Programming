package rmi;

import java.rmi.Remote;
import java.rmi.RemoteException;

/**
 *
 * @author tanzw
 */
public interface LoanInterface extends Remote {

    double calMonthlyPayment(double rate, int duration, double amount) throws RemoteException;

    double calTotalPayment(double rate, int duration, double amount) throws RemoteException;
}
