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
        
        function isValid($numberIC){
            $malaysiaIC="/\d{6}-\d{2}-\d{4}/";
            if(preg_match($malaysiaIC, $numberIC)){
                
                $day=substr($numberIC, 4,2);
                $month=substr($numberIC,2,2);
                $year=substr($numberIC,0,2);
                
                if(checkdate($month, $day, $year)){
                    return 'true';
                }
                else{
                    return 'false';
                }
            }
            else{
                return 'false';
            }
        }
        
        $s1='INVALID-IC-NUM';
        $s2='999999-01-1234';
        $s3='900231-01-1234';
        $s4='900214-01-1234';
        
        $arrayIC=array($s1,$s2,$s3,$s4);
        
        echo '<pre>';
        foreach ($arrayIC as $value) {
            if(isValid($value)=='true'){
                echo "$value  = Valid</br>";
            }
            else{
                echo "$value  = Invalid</br>";
            }
        }
        echo '</pre>';
        ?>
    </body>
</html>
