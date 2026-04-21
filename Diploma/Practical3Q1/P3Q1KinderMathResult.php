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
        $randomNumber1=$_POST['arrayRandomNumber1'];
        $randomNumber2=$_POST['arrayRandomNumber2'];
        $userAnswer=$_POST['inputAnswer'];
        $arrayNumber=0;
        $questionNumber=0;
        $totalCorrect=0;

        foreach ($userAnswer as $answer) {
            $questionNumber++;
            $CorrectAnswer=$randomNumber1[$arrayNumber]+$randomNumber2[$arrayNumber];
            if($CorrectAnswer==$answer){
                echo "<table style='height:60px; width:400px; background-color:springgreen'><tr><td style='font-size:20px'>"
                . "Q$questionNumber.  $randomNumber1[$arrayNumber] + $randomNumber2[$arrayNumber] = $answer";
                echo "<span style='font-size:20px;margin-left:20px;'>&#9989 Correct!</span>";
                echo "</td></tr></table></br>";
                $totalCorrect++;
            }
            else{
                echo "<table style='height:60px; width:400px; background-color:LightCoral'><tr><td style='font-size:20px'>"
                . "Q$questionNumber.  $randomNumber1[$arrayNumber] + $randomNumber2[$arrayNumber] = $answer";
                echo "<span style='font-size:20px ;margin-left:20px;'>&#10060; It should be ".$CorrectAnswer.".</span>";
                echo "</td></tr></table></br>";
            }
            $arrayNumber++;
        }
        echo "You get ".$totalCorrect." correct out of ".$questionNumber." question."."\t";
        echo "<a href='P3Q1KinderMathQuestion.php'>Try again.</a>";
        ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
</html>
