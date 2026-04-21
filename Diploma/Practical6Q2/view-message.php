<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
-->
<html>
    <body>
        <h1>View Message</h1>
        <?php
        session_start();
        if(isset($_SESSION['message'])){
            echo "<ul>";
            foreach ($_SESSION['message'] as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";
        }
        else{
            echo "<h3>No message in the session</h3>";
        }
        
        if(isset($_POST['DeleteMessage'])){
            session_destroy();
            header("Refresh:0");
        }
        ?>
        <form action="" method="post">
            <input type="submit" name="DeleteMessage" value="Delete All" />
            <input type="button" name="AddMessage" value="Add Mesaage" onclick=location="add-message.php" />
        </form>
    </body>
</html>