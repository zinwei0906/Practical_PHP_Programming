<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
-->
<html>
    <style>
        body{
            background-image: url('image/large/image<?php echo $_COOKIE['backgroundImage']; ?>.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100vh;
        }
        .select{
            background-color: white;
            padding-top: 20px;
            padding-bottom: 30px;
            padding-left: 20px;
        }
    </style>
    <body>
        <div class="select">
            <h1>My Homepage</h1>
            <a href="select-background.php">Select Background Image</a>
        </div>
    </body>
</html>