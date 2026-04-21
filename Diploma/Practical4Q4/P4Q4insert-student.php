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
        <title>Insert Student</title>
    </head>
    <body>
        <?php
        include 'header.php';
        include_once 'function.php';
        echo "<h1>Insert Student</h1>";
        $arrayProgram=array('--Select One--'=>' ','Information System Engineering'=>'IA',
        'Business Information Systems'=>'IB','Internet Technology'=>'IT');
        $clear=0;
        //Check insert the data or not
        if(isset($_POST['insert'])){
            if(empty($_POST['Gender'])){
                $_POST['Gender']=" ";
            }
            echo "<table style='background-color:pink'><tr><td>";
            //Invalid using the function to doing
            $ErrorMessage=array(invalidID($_POST['StudentID']),invalidName($_POST['StudentName']),
                invalidGender($_POST['Gender']),invalidChooseProgram($_POST['ChooseProgram']));
            echo "</td></tr></table>";
            
            //Store the value to SQL and display succeful message
            if(!in_array(0,$ErrorMessage)){
                //establish DB connection
                define('DB_localhost','localhost');
                define('DB_user', 'root');
                define('DB_password','');
                define('DB_name','practical_3');
                $DB_Student = new mysqli(DB_localhost,DB_user,DB_password,DB_name) OR 
                        die('Cant connect to MySQL: ' . mysqli_connect_error());
                $SQL_Insert = "INSERT INTO student (StudentID, StudentName, Gender, Program) "
                        . "VALUES ('".$_POST['StudentID']."', '".$_POST['StudentName']."', '".$_POST['Gender']."','".$_POST['ChooseProgram']."')";
                if(mysqli_query($DB_Student, $SQL_Insert)){
                    echo "<table style='height:60px; width:600px;background-color:skyblue'><tr><td style='font-size:20px'>";
                    echo "Student ".$_POST['StudentName']."\thas been inserted.";
                    echo "[<a href='P4Q4list-student.php'>Back to list</a>]";
                    echo "</table>";
                    $clear=1;
                } 
                else{
                    echo "ERROR: Could not able to execute $SQL_Insert. " . mysqli_error($DB_Student);
                }
                mysqli_close($DB_Student);
                }
        }
        if(empty($_POST['insert'])||$clear==1){
            $_POST['StudentID']=$_POST['StudentName']=$_POST['Gender']=$_POST['ChooseProgram']=NULL;
        }
        //Display Form
        echo "<form action=' ' method='post'>";
        echo "</br>Student ID : <input type='text' name='StudentID' style='margin-left:42px' maxlength='20' value='".$_POST['StudentID']."'></input>";
        echo "</br></br>Student Name : <input type='text' name='StudentName' style='margin-left:13px' maxlength='50' value='".$_POST['StudentName']."'></input>";
        echo "</br></br>Gender : <input type='radio' name='Gender' style='margin-left:68px' value='F' ";
        if(isset($_POST['Gender'])&&$_POST['Gender']=='F'){
            echo "checked>Female</input>";
        }
        else{
            echo ">Female</input>";
        }
        echo "<input type='radio' name='Gender' style='margin-left:10px' value='M'";
        if(isset($_POST['Gender'])&&$_POST['Gender']=='M'){
            echo "checked>Male</input>";
        }
        else{
            echo ">Male</input>";
        }
        echo "</br></br>Program : <select name='ChooseProgram' style='margin-left:55px'>";
        foreach ($arrayProgram as $key => $value) {
            echo "<option value='$value'";
            if(isset($_POST['ChooseProgram'])&&$_POST['ChooseProgram']===$value){
                echo "selected>$key</option>";
            }
            else{
                echo ">$key</option>";
            }
        }
        echo "</select>";
        echo "</br></br><input type='submit' name='insert' value='Insert'></input>";
        echo "\t<input type='reset' value='Cancel 'onclick=location='P4Q4list-student.php'></input>";
        echo "</form>";
        ?>
    </body>
</html>
