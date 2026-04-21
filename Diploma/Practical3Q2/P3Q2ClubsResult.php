<!DOCTYPE html>
<!--
Author :TAN ZIN WEI
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
        $ErrorMessageNumber=0;
        $ErrorMessage=array();
        $validName="/^[A-Za-z @,'.-\/]+$/";
        $digitphone="/[0][1][0-9]-[0-9]{7,8}/";
        $ArrayInterestClub=$_POST['InterestClub'];
        $ArrayClub=$_POST['Club'];
        
        //Invalid Gender
        if(empty($_POST['gender'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Please choose your gender.";
        }

        //Invalid Name
        if(empty($_POST['name'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Please enter your name.";
        }
        else if(strlen($_POST['name'])>30){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Name cannot more than 30 characters.";
        }
        else if(!preg_match($validName, $_POST['name'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Name can contain only uppercase and lowercase alphabet, space,alias [@], comma [,], single-quote [‘], dot [.], dash [-] and slash[/].";
        }
        
        //Invalid Mobile Phone
        if(empty($_POST['mobilePhone'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Please enter your mobile phone number.";
        }
        else if(!preg_match($digitphone, $_POST['mobilePhone'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="The Phone Number must follow format :[999-9999999] and start with '01';.";
        }
        
        //Invalid Interest Clubs
        if(empty($_POST['ChooseInterestClub'])){
            $ErrorMessageNumber++;
            $ErrorMessage[]="Please choose at least 1 clubs";
        }
        else{
            $number=0;
            foreach ($_POST['ChooseInterestClub'] as $value) {
                $number++;
                if(isset($_POST['gender'])){
                    if($_POST['gender']=='M'&&$value==0){
                    $ErrorMessageNumber++;
                    $ErrorMessage[]="Male (M) cannot join Ladies Club (LD).";
                }
                    else if ($_POST['gender']=='F'&&$value==1) {
                        $ErrorMessageNumber++;
                        $ErrorMessage[]="Female (F) cannot join Gentlemen Club (GT).";
                    }
                }
            }
            if($number>3){
                $ErrorMessageNumber++;
                $ErrorMessage[]="Cannot select more than 3 clubs.";
            }
        }
        
         //Display the Error Message using the foreach
        if($ErrorMessageNumber>0){
            echo "<h1>OOPS ... There are input errors</h1>";
            echo "<table><tr><td style='font-size:20px;color:red'><ul>";
            foreach ($ErrorMessage as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul></td></tr><table>";
        }
            
        //display output
        if($ErrorMessageNumber==0){
            echo "<h1>Thanks for joining</h1>";
            if($_POST['gender']=='M'){
                echo "<h2>Mr. ".$_POST['name']."</h2>";
            }
            else if($_POST['gender']=='F'){
                echo "<h2>Ms. ".$_POST['name']."</h2>";
            }
            echo "You have joined the following clubs :";
            foreach ($_POST['ChooseInterestClub'] as $value){
                echo "<ul><li>".$ArrayInterestClub[$value]."(".$ArrayClub[$value].")</li></ul>";
            }
        }
        ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
</html>
