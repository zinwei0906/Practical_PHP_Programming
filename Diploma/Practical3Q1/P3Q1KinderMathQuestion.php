<!DOCAas    sTYPE html>
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
        $questionNumber=1;
        echo "<h1>Kindergarten Math</h1>";
        echo '<form action="P3Q1KinderMathResult.php" method="post">';
        
        for($number=0;$number<5;$number++){
            $arrayRandomNumber1[ ]= rand(1, 9);
            $arrayRandomNumber2[ ]= rand(1, 9);
            echo "<table style='height:60px; width:150px; background-color:skyblue'><tr><td>"
            . "Q$questionNumber.   $arrayRandomNumber1[$number] + $arrayRandomNumber2[$number] = ";
            
            echo "<input name='arrayRandomNumber1[ ]' value='$arrayRandomNumber1[$number]' type='hidden';></input>";
            echo "<input name='arrayRandomNumber2[ ]' value='$arrayRandomNumber2[$number]' type='hidden';></input>";
            echo "<input type='text' name='inputAnswer[ ]' size=1;></input>";
            echo "</td></tr></table></br>";
            $questionNumber++;
        }
        echo "<input type='submit' value='Submit'>\t<input type='reset' value='Reset'>\t"
        . "<input type='button' value='Re-Generate' onclick=location='P3Q1KinderMathQuestion.php'>";
        echo '</form>'
        ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
</html>
