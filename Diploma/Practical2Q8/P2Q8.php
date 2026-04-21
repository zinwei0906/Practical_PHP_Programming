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
       
        
        GenerateDatePicker();
        function GenerateDatePicker(){
            
            $month=array(0,"January", "February", "March", "April", "May", "June", 
                            "July", "August", "September", "October", "November", "December");
            
            //day
            $currentDay=date("d");
            echo "<select>";
            for($day=1;$day<=31;$day++){
                if($currentDay==$day){
                    echo "<option value=$day selected>$day</option>";
                }
                else{
                    echo "<option value=$day>$day</option>";
                }
            }
            echo "</select>";
            
            //month
            $currentMonth=date("m");
            echo "<select>";
            for($monthNumber=1;$monthNumber<=12;$monthNumber++){
                if($currentMonth==$monthNumber){
                    echo "<option value=$monthNumber selected>$month[$monthNumber]</option>";
                }
                else{
                    echo "<option value=$monthNumber>$month[$monthNumber]</option>";
                }
            }
            echo "</select>";
            
            //year
            $currentYear=date("Y");
            $Year=$currentYear-20;
            echo "<select>";
            for($year=$Year;$year<=$currentYear;$year++){
                if($currentYear==$year){
                     echo "<option value=$year selected>$year</option>";
                }
                else{
                     echo "<option value=$year>$year</option>";
                }
            }
            echo "</select>";
        }
        ?>
    </body>
</html>
