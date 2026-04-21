<!DOCTYPE html>
<!--
Author : TAN ZIN WEI
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>List Student</title>
    </head>
    <body>
        <?php
        include 'header.php';
        echo "<link rel='stylesheet' href='student.css'>";
        echo "<h1>List Student</h1>";
        //$arrayGender=array('M'=>'Male','F'=>'Female');
        //$arrayProgram=array('IA'=>'Information System Engineering','IB'=>'Business Information Systems','IT'=>'Internet Technology');
        define('DB_localhost','localhost');
        define('DB_user', 'root');
        define('DB_password','');
        define('DB_name','practical_3');
        $DB_Student = @mysqli_connect(DB_localhost,DB_user,DB_password,DB_name) OR die('Cant connect to MySQL: ' . mysqli_connect_error());
        $SQL_Student = "SELECT * FROM student ";
        $count=0;
        
        if($SQL_Query= mysqli_query($DB_Student, $SQL_Student)){
            if(mysqli_num_rows($SQL_Query)>0){
                echo "<table>";
                echo "<tr><th>Student ID</th><th>Student Name</th><th>Gender</th><th>Program</th></tr>";
                while ($row = mysqli_fetch_array($SQL_Query)) {
                    echo "<tr><td>".$row['StudentID']."</td><td>".$row['StudentName']."</td>";
                    echo "<td>".$row['Gender']."</td><td>".$row['Program']."</td></tr>";
                    $count++;
                }
                echo "<tr><td colspan='4'>$count record(s) returned.\t[\t<a href='P4Q2insert-student.php'>Insert Student</a>\t]</td></tr>";
                echo "</table>";
            }
            else{
                echo "Not Records";
            }
        }
        else{
            echo "Error";
        }
        ?>
    </body>
</html>
