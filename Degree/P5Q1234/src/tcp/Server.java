package tcp;

import java.awt.BorderLayout;
import java.awt.event.*;
import java.io.EOFException;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.*;
import javax.swing.*;

public class Server extends JFrame {

    private JTextField enterField;
    private JTextArea displayArea;
    private ObjectOutputStream output;  // output stream to client
    private ObjectInputStream input;    // input stream from client
    private ServerSocket server;        // server socket
    private Socket connection;          // connection to client
    private int counter = 1;            // to count the number of connections

    public Server() {
        super("Server");
        displayArea = new JTextArea();
        add(new JScrollPane(displayArea), BorderLayout.CENTER);

        setSize(450, 180);
        setVisible(true);
    }

    public void runServer() {
        try {
            server = new ServerSocket(12345, 100);
            while (true) {
                try {
                    waitForConnection();
                    getStreams();
                    processConnection();
                } catch (EOFException ex) {
                    displayMessage("\nServer terminated connection");
                } finally {
                    //closeConnection();
                    counter++;
                }
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }

    private void waitForConnection() throws IOException {
        displayMessage("Waiting for connection\n");
        connection = server.accept();
        displayMessage("Connection " + counter + " received from: "
                + connection.getInetAddress().getHostName());
    }

    private void getStreams() throws IOException {
        // set up output stream for objects
        output = new ObjectOutputStream(connection.getOutputStream());
        output.flush();
        // set up input stream for objects
        try {
            input = new ObjectInputStream(connection.getInputStream());
            Loan loan = (Loan) input.readObject();
            displayMessage(loan.toString());
        } catch (Exception ex) {
            displayArea.append("\n\n" + ex.toString());
        }
//        double rate = input.readDouble();
//        int duration = input.readInt();
//        double amount = input.readDouble();
//        Loan loan = new Loan(rate, duration, amount);
    }

    private void processConnection() throws IOException {
        String message = "Connection successful";
        sendData(message);
        do {
            try {
                message = (String) input.readObject();
                displayMessage("\n" + message);
            } catch (ClassNotFoundException ex) {
                displayMessage("\nUnknown object type received");
            }
        } while (!message.equals("CLIENT>>> TERMINATE"));
    }

    private void closeConnection() {
        displayMessage("\nTerminating connection\n");

        try {
            output.close();
            input.close();
            connection.close();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }

    private void sendData(String message) {
        try {
            output.writeObject("SERVER>>> " + message);
            output.flush();
            displayMessage("\nSERVER>>> " + message);
        } catch (IOException ioException) {
            displayArea.append("\nError writing object");
        }
    }

    private void displayMessage(final String messageToDisplay) {
        SwingUtilities.invokeLater(
                new Runnable() {

            @Override
            public void run() {
                displayArea.append(messageToDisplay);
            }

        }
        );
    }

    private void setTextFieldEditable(final boolean editable) {
        SwingUtilities.invokeLater(
                new Runnable() {

            @Override
            public void run() {
                enterField.setEditable(editable);
            }

        }
        );
    }

    // Returns a string representation of the current date and time
    private String now() {
        Calendar now = new GregorianCalendar();
        String date = now.getDisplayName(Calendar.DAY_OF_WEEK, Calendar.SHORT, Locale.ENGLISH) + ", ";
        date += now.get(Calendar.DATE) + " " + now.getDisplayName(Calendar.MONTH, Calendar.SHORT, Locale.ENGLISH)
                + " " + now.get(Calendar.YEAR) + " " + now.get(Calendar.HOUR) + ":" + now.get(Calendar.MINUTE)
                + now.getDisplayName(Calendar.AM_PM, Calendar.SHORT, Locale.ENGLISH);
        return date;
    }

}
