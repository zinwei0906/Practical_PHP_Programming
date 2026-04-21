package tcp;

import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class Client extends JFrame {

  private JTextField jtfAmount = new JTextField(15);
  private JTextField jtfRate = new JTextField(15);
  private JTextField jtfDuration = new JTextField(15);
  private JTextArea displayArea = new JTextArea(8, 10);
  private JButton jbtSubmit = new JButton("Submit");

  public Client(String host) {
    super("Client");
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

      }
    }
    );

  }

}
