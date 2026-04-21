package tcp;

import java.awt.BorderLayout;
import java.awt.event.*;
import java.util.*;
import javax.swing.*;

public class Server extends JFrame {

  private JTextArea displayArea;

  public Server() {
    super("Server");
    displayArea = new JTextArea();
    add(new JScrollPane(displayArea), BorderLayout.CENTER);

    setSize(450, 180);
    setVisible(true);
  }
 
  // Returns a string representation of the current date and time
  private String now() {
    Calendar now = new GregorianCalendar();
    String date = now.getDisplayName(Calendar.DAY_OF_WEEK, Calendar.SHORT, Locale.ENGLISH) + ", " ;
    date += now.get(Calendar.DATE) + " " + now.getDisplayName(Calendar.MONTH, Calendar.SHORT, Locale.ENGLISH) 
            + " " + now.get(Calendar.YEAR) + " " + now.get(Calendar.HOUR) + ":" + now.get(Calendar.MINUTE) + 
            now.getDisplayName(Calendar.AM_PM, Calendar.SHORT, Locale.ENGLISH);
    return date; 
  }

  

}
