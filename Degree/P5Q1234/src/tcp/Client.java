package tcp;

import java.awt.*;
import java.awt.event.*;
import java.io.EOFException;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.InetAddress;
import java.net.Socket;
import javax.swing.*;

public class Client extends JFrame {

    private JTextField jtfAmount = new JTextField(15);
    private JTextField jtfRate = new JTextField(15);
    private JTextField jtfDuration = new JTextField(15);
    private JTextArea displayArea = new JTextArea(8, 10);
    private JButton jbtSubmit = new JButton("Submit");
    private ObjectOutputStream output;
    private ObjectInputStream input;
    private String message = "";
    private String chatServer;      // host server for this application
    private Socket client;

    public Client(String host) {
        super("Client");
        chatServer = host;    // set server to which this client connects

        JPanel panelCenter = new JPanel(new GridLayout(3, 2));
        panelCenter.add(new JLabel("Loan Amount"));
        panelCenter.add(jtfAmount);
        panelCenter.add(new JLabel("Annual Interest Rate"));
        panelCenter.add(jtfRate);
        panelCenter.add(new JLabel("Number of Years"));
        panelCenter.add(jtfDuration);
        add(panelCenter);

        JPanel panelEast = new JPanel(new GridLayout(3, 1));
        panelEast.add(new JLabel());
        panelEast.add(jbtSubmit);
        add(panelEast, BorderLayout.EAST);
        add(new JScrollPane(displayArea), BorderLayout.SOUTH);
        setSize(400, 250);
        this.setLocation(500, 0);
        setVisible(true);

        jbtSubmit.addActionListener(
                new ActionListener() {
            // send message to server
            @Override
            public void actionPerformed(ActionEvent e) {
                double amount = Double.parseDouble(jtfAmount.getText());
                double rate = Double.parseDouble(jtfRate.getText());
                int duration = Integer.parseInt(jtfDuration.getText());
                Loan loan = new Loan(rate, duration, amount);
                displayArea.append(loan.toString());
                try {
                    output.writeObject(loan);
//                    output.writeDouble(rate);
//                    output.writeInt(duration);
//                    output.writeDouble(amount);
                    output.flush();
                } catch (Exception ex) {
                    displayArea.append("\n\n" + ex.toString());
                }
            }
        }
        );

    }

    public void runClient() {
        try {
            connectToServer();
            getStreams();
            processConnection();
        } catch (EOFException ex) {
            displayMessage("\nClient terminated connection");
        } catch (IOException ex) {
            ex.printStackTrace();
        } finally {
            //closeConnection();
        }
    }

    private void connectToServer() throws IOException {
        displayMessage("Attempting connection\n");

        // create Socket to make connection to server
        client = new Socket(InetAddress.getByName(chatServer), 12345);

        // display connection information
        displayMessage("Connected to: " + client.getInetAddress().getHostName());
    }

    private void getStreams() throws IOException {
        // set up output stream for objects
        output = new ObjectOutputStream(client.getOutputStream());
        output.flush();

        // set up input stream for objects
        input = new ObjectInputStream(client.getInputStream());

        displayMessage("\nGot I/O streams\n");
    }

    private void processConnection() throws IOException {

        do {
            try {
                message = (String) input.readObject();
                displayMessage("\n" + message);
            } catch (ClassNotFoundException ex) {
                displayMessage("\nUnknown object type received");
            }
        } while (!message.equals("SERVER>>> TERMINATE"));
    }

    private void closeConnection() {
        displayMessage("\nTerminating connection\n");

        try {
            output.close();
            input.close();
            client.close();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }

    private void sendData(String message) {
        try {
            output.writeObject("CLIENT>>> " + message);
            output.flush();
            displayMessage("\nCLIENT>>> " + message);
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

}
