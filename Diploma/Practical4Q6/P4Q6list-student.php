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
        $arrayGender=array('M'=>'Male','F'=>'Female');
        $arrayProgram=array('IA'=>'Information System Engineering','IB'=>'Business Information Systems','IT'=>'Internet Technology');
        define('DB_localhost','localhost');
        define('DB_user', 'root');
        define('DB_password','');
        define('DB_name','practical_3');
        $DB_Student = new mysqli(DB_localhost,DB_user,DB_password,DB_name) OR die('Cant connect to MySQL: ' . mysqli_connect_error());
        $count=0;
        
        global $sort;
        global $order;
        global $program; 
        //Filtter
        echo "Filter : <a href='?Order=$order&Sort=$sort'> All Programs</a>\t|\t";
        echo "<a href='?Program=IA&Order=$order&Sort=$sort'>IA</a>\t|\t";
        echo "<a href='?Program=IB&Order=$order&Sort=$sort'>IB</a>\t|\t";
        echo "<a href='?Program=IT&Order=$order&Sort=$sort'>IT</a></br></br>";
        if(!empty($_GET["Sort"]))
            $sort = $_GET["Sort"];
        if(!empty($_GET["Order"]))
            $order = $_GET["Order"];
        if(!empty($_GET["Program"]))
            $program = $_GET["Program"];
        echo "<table>";
        echo "<tr><th><a href='?Program=$program&Order=StudentID&Sort=";
        echo $sort === "ASC" ? "DESC" : "ASC";
        echo " '>Student ID</a>";
        if(isset($_GET["Sort"])&&$order=="StudentID"){
            echo "<img src='Image/$sort.png'>";
        }
        echo "</th><th><a href='?Program=$program&Order=StudentName&Sort=";
        echo $sort === "ASC" ? "DESC" : "ASC";
        echo "'>Student Name</a>";
        if(isset($_GET["Sort"])&&$order=="StudentName"){
            echo "<img src='Image/$sort.png'>";
        }
        echo "</th><th><a href='?Program=$program&Order=Gender&Sort=";
        echo $sort === "ASC" ? "DESC" : "ASC";
        echo "'>Gender</a>";
        if(isset($_GET["Sort"])&&$order=="Gender"){
            echo "<img src='Image/$sort.png'>";
        }
        echo "</th><th><a href='?Program=$program&Order=Program&Sort=";
        echo $sort === "ASC" ? "DESC" : "ASC";
        echo "'>Program</a>";
        if(isset($_GET["Sort"])&&$order=="Program"){
            echo "<img src='Image/$sort.png'>";
        }
        echo "</th></tr>";
        //Set the condition
        if(isset($order))
            $orderCondition ="ORDER BY $order";
        else
            $orderCondition ="";
        if(isset($program))
            $programCondition ="WHERE Program LIKE '$program'";
        else
            $programCondition ="";
        //Display Table
        $SQL_Student = "SELECT * FROM student  $programCondition  $orderCondition $sort";
        if($SQL_Query= mysqli_query($DB_Student, $SQL_Student)){
            if(mysqli_num_rows($SQL_Query)>0){
                while ($row = mysqli_fetch_array($SQL_Query)) {
                    echo "<tr><td>".$row['StudentID']."</td><td>".$row['StudentName']."</td>";
                    echo "<td>".$arrayGender[$row['Gender']]."</td><td>".$row['Program']."\t-\t".$arrayProgram[$row['Program']]."</td></tr>";
                    $count++;
                }
                echo "<tr><td colspan='4'>$count record(s) returned.\t[\t<a href='P4Q6insert-student.php'>Insert Student</a>\t]</td></tr>";
                echo "</table>";
            }
            else{
                echo "Not Records";
            }
        }
        else{
            echo "ERROR: Could not able to execute $SQL_Student. " . mysqli_error($DB_Student);
        }
        mysqli_close($DB_Student);
        ?>
    </body>
</html>