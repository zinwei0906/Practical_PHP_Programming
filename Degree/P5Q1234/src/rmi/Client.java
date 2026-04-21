/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package rmi;

import java.rmi.Naming;
import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import javax.swing.JOptionPane;
import rmi.LoanInterface;
import java.util.Scanner;

/**
 *
 * @author tanzw
 */
public class Client {

    public static void main(String[] args) {
        Scanner sacnner = new Scanner(System.in);
        System.out.print("Enter the Rate : ");
        double rate = sacnner.nextDouble();
        System.out.print("Enter the Year : ");
        int year = sacnner.nextInt();
        System.out.print("Enter the Amount : ");
        double amount = sacnner.nextDouble();

        try {
            LoanInterface obj = (LoanInterface) Naming.lookup("rmi://localhost:1700" + "/Loan");
            double monthly = obj.calMonthlyPayment(rate, year, amount);
            double total = obj.calTotalPayment(rate, year, amount);
            System.out.println("Total Monthly Payment : RM " + monthly);
            System.out.println("Total Payment : RM " + total);
        } catch (Exception e) {
            System.err.println("Client exception: " + e.toString());
            e.printStackTrace();
        }
    }
}
