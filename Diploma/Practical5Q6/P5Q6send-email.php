<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        if (isset($_POST['submit'])) {
            $to = $_POST['email']; 
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $from = "krtloveasn@gmail.com";
            $headers = "From:" . $from;

            if (mail($to, $subject, $message, $headers)) {
                echo "<br/><br/><table style='height:60px; width:600px;background-color:skyblue'><tr><td style='font-size:20px'>";
                echo "Message successfully sent!";
                echo "</table><br/><br/>";
            }
            else {
                echo "<br/><br/><table style='height:60px; width:600px;background-color:red'><tr><td style='font-size:20px'>";
                echo "Failed sent!";
                echo "</table><br/><br/>";
            }
        }
        ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>To : </td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Subject : </td>
                <td><input type="text" name="subject">
            </tr>
            <tr>
                <td>Message: </td>
                <td><textarea rows="10" name="message" cols="50"></textarea>
            </tr>
        </table>
        <input type="submit" name="submit" value="Send Email">
    </form>
</body>
</html>
