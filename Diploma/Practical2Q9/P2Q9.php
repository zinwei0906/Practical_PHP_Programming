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
        $s1='INVALID-IC-NUM';
        $s2='12345678901234';
        $s3='123456-12-1234';
        $s4='900214-01-1234';
        
        $arrayIC=array($s1,$s2,$s3,$s4);
        //$malaysiaIC="/\d{6}-\d{2}-\d{4}/";
        $malaysiaIC="/\d{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])-\d{2}-\d{4}/";
        
        echo '<pre>';
        foreach ($arrayIC as $value) {
            if(preg_match($malaysiaIC, $value)){
                echo "$value  = Matched";
            }
            else{
                echo "$value  = Not Matched";
            }
            echo '</br>';
        }
        echo '</pre>';
        ?>
    </body>
</html>
