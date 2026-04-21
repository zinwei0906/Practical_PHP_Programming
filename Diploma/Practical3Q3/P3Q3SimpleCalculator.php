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
        echo "<h1>Simple Calculator</h1>";
        $TotalErrorMessage=0;
        $ErrorMessage=array();

        if(isset($_POST['mathOperations'])){
            //CHECK NUMBER 1
            //check number 1 is empty or no
            if(empty($_POST['number1'])){
                $ErrorMessage[]="Please Enter Number 1.";
                $TotalErrorMessage++;
            }
            //check number 1 is integer or no
            else if(!is_numeric ($_POST['number1'])){
                $ErrorMessage[]="Number 1 must be an integer";
                $TotalErrorMessage++;
            }
            //check number 1 cant less than -2147483648 and more than 2147483647
            else if($_POST['number1']>PHP_INT_MAX||$_POST['number1']<PHP_INT_MIN){
                $ErrorMessage[]="Number 1 must in the range -2147483648 to 2147483647.";
                $TotalErrorMessage++;
            }
            
            //CEHCK NUMBER 2
            //check number 2 is empty or no
            if(empty($_POST['number2'])){
                if($_POST['mathOperations']=="Divide"){
                    $ErrorMessage[]="Number 2 Cannot be 0 (zero) when it is a divide math operation.";
                    $TotalErrorMessage++;
                }
                else{
                    $ErrorMessage[]="Please Enter Number 2.";
                    $TotalErrorMessage++;
                }
            }
            //check number 2 is integer or no
            else if(!is_numeric ($_POST['number2'])){
                $ErrorMessage[]="Number 2 must be an integer";
                $TotalErrorMessage++;
            }
            //check number 2 cant less than -2147483648 and more than 2147483647
            else if($_POST['number2']>PHP_INT_MAX||$_POST['number2']<PHP_INT_MIN){
                $ErrorMessage[]="Number 2 must in the range -2147483648 to 2147483647.";
                $TotalErrorMessage++;
            }
            
            
            //Display the Error Message using the foreach
            if($TotalErrorMessage>0){
                echo "<table style='width:500px; background-color:LightCoral;'><tr><td style='font-size:20px;'><ul>";
                foreach ($ErrorMessage as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul></td></tr><table>";
            }
        }
        
        //Display the calculation when error message is 0
        if($TotalErrorMessage==0){
            if(isset($_POST['mathOperations'])){
                switch ($_POST['mathOperations']) {
                    case 'Add':
                        $Total=$_POST['number1']+$_POST['number2'];
                        $OperationWord='Add';
                        $OperationSimbol='+';
                        break;
                    case 'Minus':
                        $Total=$_POST['number1']-$_POST['number2'];
                        $OperationWord='Minus';
                        $OperationSimbol='-';
                        break;
                    case 'Multiply':
                        $Total=$_POST['number1']*$_POST['number2'];
                        $OperationWord='Multiply';
                        $OperationSimbol='X';
                        break;
                    case 'Divide':
                        $Total=$_POST['number1']/$_POST['number2'];
                        $OperationWord='Divide';
                        $OperationSimbol='/';
                        break;
                }
            echo "<table style='height:60px; width:500px; background-color:skyblue; color:blue;font-size:20px'><tr><td>"
                . "$OperationWord .:. ".$_POST['number1']. "$OperationSimbol" .$_POST['number2']. "= $Total</td></tr></table></br>";
            }
        }
        
        $number1=NULL;
        $number2=NULL;
        
        if(isset($_POST['mathOperations'])){
            $number1=$_POST['number1'];
            $number2=$_POST['number2'];
        }
        echo '<form action="P3Q3SimpleCalculator.php" method="post">';
        echo "<p>Number 1 : <input type='text' name='number1' size=20 value='$number1'></p>";
        echo "<p>Number 2 : <input type='text' name='number2' size=20 value='$number2'></p>";
        echo "<input type='submit'  name='mathOperations' value='Add'>\t<input type='submit' name='mathOperations' value='Minus'>\t";
        echo "<input type='submit' name='mathOperations' value='Multiply'>\t<input type='submit' name='mathOperations' value='Divide'>\t";
        echo "<input type='button' value='Reset' onclick=location='P3Q3SimpleCalculator.php'>";
        echo '</form>';
        ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
</html>
