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
        define("ROW", 10);
        define("COL",15);
        echo '<table border="1">';
        for($row=1;$row<=ROW;$row++){
            echo "<tr>";
            for($col=1;$col<=COL;$col++){
                if(($row+$col)%2==0){
                    echo '<td style="height:20px; width:20px; background-color:pink"></td>';
                }
                else{
                    echo '<td style="height:20px; width:20px; background-color:white"></td>';
                }
            }
            echo "</tr>";
        }
        echo '</table>';
        echo"The table is having  ".ROW. " rows and ".COL." columns.";
        ?>
    </body>
</html>
