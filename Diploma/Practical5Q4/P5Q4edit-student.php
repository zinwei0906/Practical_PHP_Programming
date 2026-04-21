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
        <title>Edit Student</title>
    </head>
    <body>
        <?php
        include 'header.php';
        include_once 'function.php';
        include 'connectSQL.php';
        $arrayProgram=array('--Select One--'=>' ','Information System Engineering'=>'IA',
        'Business Information Systems'=>'IB','Internet Technology'=>'IT');
        $arrayGender=array('M'=>'Male','F'=>'Female');
        
        //Display Form
        if(!empty($_GET['EditID'])){
            $ID=$_GET['EditID'];
            $selectSQL = "SELECT * FROM student WHERE StudentID = '$ID'";
            $result = $DB_Student->query($selectSQL);
            $row = mysqli_fetch_array($result);
            if (!empty($row["StudentName"]) && !empty($row["Gender"]) && !empty($row["Program"])) {
                $Name = $row["StudentName"];
                $Gender = $row["Gender"];
                $Program = $row["Program"];
            }
            else{
                echo "ERROR: Could not have the records";
            }
            
            if(isset($_POST['update'])){
                include_once 'function.php';
                $Name = $_POST["StudentName"];
                $Gender = $_POST["Gender"];
                $Program = $_POST["ChooseProgram"];
                echo "<table style='background-color:pink'><tr><td>";
                //Invalid using the function to doing
                $ErrorMessage=array(invalidName($_POST['StudentName']),invalidGender($_POST['Gender']),invalidChooseProgram($_POST['ChooseProgram']));
                echo "</td></tr></table>";
                 if(!in_array(0,$ErrorMessage)){
                    $SQL_update = 'UPDATE Student SET StudentName = ?, Gender = ?, Program = ? WHERE StudentID = ?';
                    $stm = $DB_Student->prepare($SQL_update);
                    $stm->bind_param('ssss', $Name, $Gender, $Program, $ID);
                    if($stm->execute()){
                        echo "<table style='height:60px; width:600px;background-color:skyblue'><tr><td style='font-size:20px'>";
                        echo "Student ".$_POST['StudentName']."\thas been updated successfully.";
                        echo "[<a href='P5Q4list-student.php'>Back to list</a>]";
                        echo "</table>";
                    } 
                    else{
                        echo "ERROR: Could not able to execute $SQL_update. " . mysqli_error($DB_Student);
                    }
                 }
            }
            echo "<h1>Edit Student</h1>";
            echo "<form action=' ' method='post'>";
            echo "</br>Student ID : <input type='text' name='StudentID' style='margin-left:42px' maxlength='20' value='$ID' readonly></input>";
            echo "</br></br>Student Name : <input type='text' name='StudentName' style='margin-left:13px' maxlength='50' value='$Name'></input>";
            echo "</br></br>Gender : ";
            foreach ($arrayGender as $key => $value) {
                if(isset($Gender)&&$Gender===$key){
                    echo "<input type='radio' name='Gender' style='margin-left:68px' value='$key' checked>$value</input>";
                }
                else{           
                    echo "<input type='radio' name='Gender' style='margin-left:68px' value='$key'>$value</input>";          
                }
            }
            echo "</br></br>Program : <select name='ChooseProgram' style='margin-left:55px'>";
            foreach ($arrayProgram as $key => $value) {
                echo "<option value='$value'";
                if(isset($Program)&&$Program===$value){
                    echo "selected>$key</option>";
                }
                else{
                    echo ">$key</option>";
                }
            }
            echo "</select>";
            echo "</br></br><input type='submit' name='update' value='Update'></input>";
            echo "\t<input type='reset' value='Cancel 'onclick=location='P5Q4list-student.php'></input>";
            echo "</form>"; 
        }
        else{
            echo "<h1>You didn't choose the student to Edit!</h1>";
        }
        ?>
    </body>
</html>