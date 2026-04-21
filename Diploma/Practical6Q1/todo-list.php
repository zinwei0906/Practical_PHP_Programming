<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
-->
<html>
    <body>
        <?php
        if(isset($_COOKIE['Task'])){
            $task= array_filter(explode('|', $_COOKIE['Task']));
        }
        if(isset($_POST['Add'])){
            if(!empty($_POST['NewTask'])){
                $task[ ]=($_POST['NewTask']);
                setcookie("Task", implode("|", $task), time()+60*60*24*365);
            }
        }
        if(isset($_POST['Delete'])){
            if(isset($_POST['DeleteTask'])){
                echo $_POST['DeleteTask'];
                unset($task[$_POST['DeleteTask']]);
                $task= array_values($task);
                setcookie("Task", implode("|", $task), time()+60*60*24*365);
            }
        }
        ?> 
        <h1>My To-do List</h1>
        <?php
        if(empty($task)){
            echo "<h4>You do not have any pending task.</h4>";
        }
        else{
            $numberTask= count($task);
            echo "<h4>You have $numberTask pending task(s) :</h4>";
            foreach ($task as $key => $value) {
                echo "<form action='' method='post' >";
                echo "<input type='submit' name='Delete' value=' X '/>";
                echo "<input type='hidden' name='DeleteTask' value='$key'/>";
                echo $key+1 .". ".$value . "<br/>";
                echo "</form>";
            }
        }
        ?>
        <br/>
        <form action="" method="post">
            <input type="text" name="NewTask"/>
            <input type="submit" name="Add" value="Add"/>
        </form>
    </body>
</html>