package ws;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;

public class LoanFrame extends JFrame {
  private JTextField jtfAmount = new JTextField(20);
  private JTextField jtfRate = new JTextField(20);
  private JTextField jtfDuration = new JTextField(20);
  private JButton jbtReset = new JButton("Reset");
  private JButton jbtCalculate = new JButton("Calculate");
  private JTextArea jtaResult= new JTextArea(5, 5);

  public LoanFrame() {
    JPanel p1 = new JPanel(new GridLayout(4, 2));
    p1.add(new JLabel("Loan Amount"));
    p1.add(jtfAmount);
    p1.add(new JLabel("Annual Interest Rate (%)"));
    p1.add(jtfRate);
    p1.add(new JLabel("Duration (years)"));
    p1.add(jtfDuration);
    p1.add(jbtReset);
    p1.add(jbtCalculate);
    add(p1);
    
    jbtReset.addActionListener(new ResetButtonListener());
    jbtCalculate.addActionListener(new CalculateButtonListener());
    
    add(jtaResult, BorderLayout.SOUTH);
    setLocationRelativeTo(null);
    setSize(400, 350);
    setVisible(true);
    setTitle("Loan Calculator");
    setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
  }
  
  private class CalculateButtonListener implements ActionListener {

    @Override
    public void actionPerformed(ActionEvent e) {
      throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
  }
  
  private class ResetButtonListener implements ActionListener {

    @Override
    public void actionPerformed(ActionEvent e) {
      jtfAmount.setText("");
      jtfRate.setText("");
      jtfDuration.setText("");
    }
    
  }
  
  public static void main(String[] args) {
    new LoanFrame();
  }
          
  
  
  
  
  
  
  
}
