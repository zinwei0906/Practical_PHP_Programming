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
        <header><?php include './../Practical3Q5/P3Q5Header.php';?></header>
        <?php
        $arrayGender=array('Female'=>'F','Male'=>'M');
        $arrayState=array('-- Selection One --'=>' ','Johor'=>'JH','Kedah'=>'KD','Kelantan'=>'KT','Kuala Lumpur'=>'KL',
            'Labuan'=>'LB','Melaka'=>'MK','Negeri Sembilan'=>'NS','Pahang'=>'PH','Perak'=>'PR','Penang'=>'PG',
            'Perlis'=>'PL','Putrajaya'=>'PJ','Selangor'=>'SL','Sabah'=>'SB','Sarawak'=>'SW','Terengganu'=>'TR');
        $ErrorMessageNumber=0;
        $clearNumber=0;
        echo '<form action="P3Q4RegisterStudent.php" method="post" style="margin-left:100px">';
        echo "<h1>Register Student Account</h1>";
        
        if(isset($_POST['submit'])){
            $studentID=$_POST['StudentID'];
            $password=$_POST['Password'];
            $confirmPassword=$_POST['ConfirmPassword'];
            $studentName=$_POST['StudentName'];
            $chooseState=$_POST['ChooseState'];
            $emailAddress=$_POST['EmailAddress'];
            
            //Invalid StudentID
            if(empty($_POST['StudentID'])){
                $ErrorMessageNumber++;
                $ErrorStudentID="Student ID Cannot empty.";
            }
            else if(!preg_match("/^\d{2}[A-Z]{3}\d{5}/", $_POST['StudentID'])){
                $ErrorMessageNumber++;
                $ErrorStudentID="Student ID Must follow format: [99XXX99999].";
            }
            else
                $ErrorStudentID=NULL;
            
            //Invalid Password
            if(empty($_POST['Password'])){
                $ErrorMessageNumber++;
                $ErrorPassword="Password Cannot empty.";
            }
            else if(strlen($_POST['Password'])<8||strlen($_POST['Password'])>15){
                $ErrorMessageNumber++;
                $ErrorPassword="Password Must range from 8 to 15 characters.";
            }
            else if(!preg_match("/^\w+$/", $_POST['Password'])){
                $ErrorMessageNumber++;
                $ErrorPassword="Can contain only uppercase and lowercase alphabet, digit and underscore.";
            }
            else
                $ErrorPassword=NULL;
            
            //Invalid Confirm Password
            if(empty($_POST['ConfirmPassword'])){
                $ErrorMessageNumber++;
                $ErrorConfirmPassword="Confirm Password Cannot empty.";
            }
            else if($_POST['Password']!=$_POST['ConfirmPassword']){
                $ErrorMessageNumber++;
                $ErrorConfirmPassword="Confirm Password Must match the value of password.";
            }
            else
                $ErrorConfirmPassword=NULL;
            
            //Invalid Student Name
            if(empty($_POST['StudentName'])){
                $ErrorMessageNumber++;
                $ErrorStudentName="Student Name Cannot empty.";
            }
            else if(strlen($_POST['StudentName'])>30){
                $ErrorMessageNumber++;
                $ErrorStudentName="Student Name Cannot more than 30 characters.";
            }
            else if(!preg_match("/^[A-Za-z @,'.-\/]+$/", $_POST['StudentName'])){
                $ErrorMessageNumber++;
                $ErrorStudentName="Student Name Can contain only uppercase and lowercase alphabet, space, alias [@], comma [,], single-quote [‘], dot [.], dash [-] and slash [/].";
            }
            else
                $ErrorStudentName=NULL;
            
            //Invalid Gender
            if(empty($_POST['Gender'])){
                $ErrorMessageNumber++;
                $ErrorGender="Gender Cannot empty.";
            }
            else
                $ErrorGender=NULL;
            
            //Invalid State
            if($_POST['ChooseState']==" "){
                $ErrorMessageNumber++;
               $ErrorState="State Cannot empty.";
            }
            else
                $ErrorState=NULL;
            
            //Invalid Email Address
            if(empty($_POST['EmailAddress'])){
                $ErrorMessageNumber++;
                $ErrorEmailAddress="Email Address Cannot empty.";
            }
            else if(strlen($_POST['EmailAddress'])>30){
                $ErrorMessageNumber++;
                $ErrorEmailAddress="Email Address Cannot more than 30 characters.";
            }
            else if(!filter_var($_POST['EmailAddress'], FILTER_VALIDATE_EMAIL)){
                $ErrorMessageNumber++;
                $ErrorEmailAddress="Email Address Must follow the correct format.";
            }
            else
                $ErrorEmailAddress=NULL;
            
            //Display Error Message
            if($ErrorMessageNumber>0){
                $ErrorMessage=array($ErrorStudentID,$ErrorPassword,$ErrorConfirmPassword,$ErrorStudentName,$ErrorGender,$ErrorState,$ErrorEmailAddress);
                echo "<table style='background-color:pink;width:600px'><tr><td style='font-size:16px;color:red'><ul>";
                foreach ($ErrorMessage as $error) {
                    if($error!=NULL){
                        echo "<li>$error</li>";
                    }
            }
                echo "</ul></td></tr><table><br>";
            }
            
            //display Correct output
            if($ErrorMessageNumber==0){
                echo "<table style='height:60px; width:400px; background-color:skyblue'><tr><td style='font-size:20px'>";
                echo "Hi,$studentName,your account has been created.";
                echo "<script>alert('Student ID : $studentID \\nStudent Name : $studentName \\nPassword : $password "
                        . "\\nConfirmPassword : $confirmPassword \\nEmail Address : $emailAddress \\nStatus : $chooseState \\nGender : ".$_POST['Gender']."')</script>";
                echo "</td></tr></table></br>";
                $clearNumber=1;
            }
        }

        if(empty($_POST['submit'])||$clearNumber==1){
            $studentID=NULL;
            $password=NULL;
            $confirmPassword=NULL;
            $studentName=NULL;
            $chooseState=NULL;
            $emailAddress=NULL;
        }
        
        //Form
        echo "Student ID : <input type='text' name='StudentID' style='margin-left:62px' maxlength='20' value='$studentID'></input>";
        if(isset($ErrorMessage[0])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[0])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
        }
        echo "</br></br>Password : <input type='password' name='Password' style='margin-left:71px' maxlength='20' value='$password'></input>";
        if(isset($ErrorMessage[1])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[1])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
        }
        echo "</br></br>Confirm Password : <input type='password' name='ConfirmPassword' style='margin-left:5px' maxlength='20' value='$confirmPassword'></input>";
        if(isset($ErrorMessage[2])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[2])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
        }
        echo "</br></br>Student Name : <input type='text' name='StudentName' style='margin-left:33px' maxlength='50' value='$studentName'></input>";
        if(isset($ErrorMessage[3])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[3])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
        }
        echo "</br></br>Gender : <input type='radio' name='Gender' style='margin-left:88px' value='F'";
        if(isset($_POST['Gender'])&&$_POST['Gender']=='F'&&$clearNumber==0){
            echo "checked";
        }
        echo ">Female</input>";
        echo "<input type='radio' name='Gender' style='margin-left:10px' value='M'";
        if(isset($_POST['Gender'])&&$_POST['Gender']=='M'&&$clearNumber==0){
            echo "checked";
        }
        echo ">Male</input>";
        if(isset($ErrorMessage[4])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:56px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[4])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:56px;'>&#9989</span>";
        }
        echo "</br></br>State : <select name='ChooseState' style='margin-left:105px' value='$chooseState'";
        foreach ($arrayState as $key => $value) {
            echo "<option value='$key_$value'";
            if(isset($_POST['ChooseState'])&&$_POST['ChooseState']==$value&&$clearNumber==0){
                echo "selected";
            }
            echo ">$key</option>";
        }
        echo "</select>";
        if(isset($ErrorMessage[5])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:55px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[5])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:55px;'>&#9989</span>";
        }
        echo "</br></br>Email Address : <input type='text' name='EmailAddress' style='margin-left:36px' maxlength='40' value='$emailAddress'></input>";
        if(isset($ErrorMessage[6])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
        }
        else if(empty($ErrorMessage[6])&&isset($_POST['submit'])&&$clearNumber==0){
            echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
        }
        echo "</br></br><input type='submit' name='submit' value='Submit'>\t</input>";
        echo "<input type='reset' name='reset' value='Reset' onclick=location='P3Q4RegisterStudent.php'></input>";
        echo "</form>";
      ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
<!--    function dipslay($num){
                    if(isset($ErrorMessage[$num])){
                        echo "<span style='font-size:20px;margin-left:20px;'>&#10060</span>";
                    }
                else if(empty($ErrorMessage[$num])&&isset($_POST['submit'])){
                        echo "<span style='font-size:20px;margin-left:20px;'>&#9989</span>";
                        }
                 }-->
</html>
