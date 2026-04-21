<?php
    define('DB_localhost','localhost');
    define('DB_user', 'root');
    define('DB_password','');
    define('DB_name','practical_3');
    $DB_Student = new mysqli(DB_localhost,DB_user,DB_password,DB_name) OR 
            die('Cant connect to MySQL: ' . mysqli_connect_error());
?>