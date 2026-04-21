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
        $num=array();
        for($count=0;$count<5;$count++){
            $num[$count]= rand(0,9999);
        }
        
        //Orginal Number
        echo "Orginal :";
        foreach ($num as $randomNumber) {
            echo printList($randomNumber);
        }

        //Ascending Number
        sort($num);
        echo "Ascending :";
        foreach ($num as $randomNumber) {
            echo printList($randomNumber);
        }
        
        //Descending Number
        rsort($num);
        echo "Descending :";
        foreach ($num as $randomNumber) {
            echo printList($randomNumber);
        }

        
        function printList($number){
            if($number%2==0){
                echo "<font color=red>";
            }
            printf ("<ul><li>%04d</li></ul>",$number);
            echo "</font>";
        }

        ?>
    </body>
</html>
