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
        include 'header.php';
        include 'connectSQL.php';
        echo "<link rel='stylesheet' href='student.css'>";
        $arrayGender=array('M'=>'Male','F'=>'Female');
        $arrayProgram=array('--Select One--'=>' ','Information System Engineering'=>'IA',
        'Business Information Systems'=>'IB','Internet Technology'=>'IT');
        if(!empty($_GET['DeleteID'])){
            $ID=$_GET['DeleteID'];
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
        }
        if(empty($ID)){
            echo "<h1>You didn't select the student to delete</h1>";
        }
        if(isset($_POST['delete'])){
            if(!empty($ID)){
                $SQL_Delete="DELETE FROM student WHERE StudentID = '$ID'";
                if($DB_Student->query($SQL_Delete)==TRUE){
                    echo "<br/><br/><table style='height:60px; width:600px;background-color:skyblue'><tr><td style='font-size:20px'>";
                    echo "Student has been deleted successfully.";
                    echo "[<a href='P5Q4list-student.php'>Back to list</a>]";
                    echo "</table>";
                }
                else{
                    echo "Error deleting record: " . $DB_Student->error;
                }
                $DB_Student->close();
                $ID=$Name=$Gender=$Program=NULL;
            }
        }
        if(!empty($ID)){
        ?>
        <h1>Delete Student</h1>
        <p>Are you sure you want to delete the following student?</p>
        <form action="" method="post">
            <table class="deleteTable">
                <tr>
                    <td>Student ID : </td>
                    <td>
                        <?php if(isset($ID)) echo "$ID"?></td>
                </tr>
                <tr>
                    <td>Student Name : </td>
                    <td><?php if(isset($Name))echo "$Name"?></td>
                </tr>
                <tr>
                    <td>Gender : </td>
                    <td>
                        <?php 
                        if(isset($Gender))foreach ($arrayGender as $key => $value)if ($key == $Gender)echo "$value" ;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Program : </td>
                    <td>
                        <?php 
                        if(isset($Program))foreach ($arrayProgram as $key => $value)if ($value == $Program)echo "$value - $key" ;
                        ?>
                    </td>
                </tr>
            </table>
            <br/><input type="submit" name="delete" value="Yes"/>
            <input type="reset" value="Cancel" onclick="location='P5Q4list-student.php'"/>
        </form>
        <?php
        }
        ?>
    </body>
</html>