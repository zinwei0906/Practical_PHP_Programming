<!DOCTYPE html>
<!--
AUTHOR:TANZINWEI
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
        $s1='INVALID-ID';
        $s2='1234567890';
        $s3='00XXX12345';
        $s4='00WAD12345';
        $arrayID=array($s1,$s2,$s3,$s4);
        
        //$studentID="/[0-9]{2}[A-Z]{3}[0-9]{5}/";
        //$studentID="/\d{2}[A-Z]{3}\d{5}/";
        $studentID="/\d{2}[A,C,J,P,S,W][A,B,H,P,T][A,B,C,D,P]\d{5}/";
        
        echo '<pre>';
        foreach ($arrayID as $value) {
            if(preg_match($studentID, $value)){
                echo $value.  " = Matched";
            }
            else{
                echo $value.  " = Not Matched";
            }
            echo '</br>';
        }
        echo '</pre>';
        ?>
    </body>
</html>
