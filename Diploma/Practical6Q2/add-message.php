<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
-->
<html>
    <body>
        <h1>Add Message</h1>
        <?php
        session_start();
        if(!empty($_POST['AddMessage'])&&!empty($_POST['Message'])){
            $_SESSION['message'] [ ]=htmlspecialchars($_POST['Message']);
            echo "<h3>Message added to session.</h3>";
        }
        ?>
        <form action="" method="post">
            <input type="text" name="Message" />
            <input type="submit" name="AddMessage" value="Add" />
            <input type="button" name="ViewMessage" value="View" onclick=location="view-message.php" />
        </form>
    </body>
</html>