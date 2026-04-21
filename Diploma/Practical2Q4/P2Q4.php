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
        function getGrade($mark){
            if($mark>=80)
                return 'A';
            else if($mark>=70)
                return 'B';
            else if($mark>=60)
                return 'C';
            else if($mark>=50)
                return 'D';
            else
                return 'F';
        }
        function getComment($grade){
            switch ($grade) {
                case 'A': 
                    return "Passed with distinction";
                    break;
                case 'B':
                case 'C':
                    return "Passed";
                    break;
                case 'D':
                    return "Passed with condition";
                    break;
                default:
                    return "Failed";
            }
        }

        $marks=array("Alex"=>90,"Barbie"=>65,"Christine"=>45,"Danny"=>55,"Elaine"=>75);

        echo '<table border="1"><thead><tr><th>Name</th><th>Mark</th><th>Grade</th><th>Comment</th></tr></thead><tbody>';
        
        foreach ($marks as $studentName => $marksObtained) {
            echo "<tr><td>$studentName</td><td>$marksObtained</td>";
            echo "<td>".getGrade($marksObtained)."</td><td>".getComment(getGrade($marksObtained))."</td></tr>";
        }
        
        echo '</tbody></table>';
        
        ?>
    </body>
</html>
