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
        $data=array("AACS3013"=>70,"AACS3073"=>95,"AAMS3683"=>55,"AACS3034"=>75,"AHLA3413"=>65);

        echo '<table><thead><tr style="background-color: #cccccc;"><th >COURSE</th><th >PASSING RATE</th></tr></thead><tbody>';

        foreach ($data as $coursesCodes => $passingRates) {
            echo "<tr><td>$coursesCodes</td><td>";
            $ratewidth=250*$passingRates/100;
            if($passingRates>=70){
                echo '<span style="display: inline-block;background-color: lightblue;width: '. $ratewidth.'px">&nbsp;</span>';
            }
            else{
                echo '<span style="display: inline-block;background-color: pink;width:'. $ratewidth.'px">&nbsp;</span>';
            }
            echo "$passingRates%</td></tr>";
        }
        echo '</tbody></table>';
        ?>
    </body>
</html>
