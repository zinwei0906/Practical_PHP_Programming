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
        echo '<form action="P3Q2ClubsResult.php" method="post" style="margin-left:100px">';
        echo "<h1>Join TARUC's interest clubs</h1>";
        $arrayInterestClub=array('Ladies Club','Gentlemen Club','DOTA and Gaming Club',
                            'Manga and Comic Club','Pet Society Club','Farmville Club');
        $arrayClub=array('LD','GT','DT','MG','PS','FV');
        
        echo "Gender : <input type='radio' name='gender' value='M' style='margin-left:55px'>Male</input>";
        echo "<input type='radio' name='gender' value='F' style='margin-left:10px'>Female</input></br></br>";
        echo "Name : <input type='text' name='name' style='margin-left:61px' maxlength='50'></input></br></br>";
        echo "Mobile Phone : <input type='text' name='mobilePhone' maxlength='20'></input></br></br>";
        echo "Interest Clubs : (Select 1 to 3 clubs)</br>";

        for($number=0;$number<6;$number++){
            echo "<input type='checkbox' name='ChooseInterestClub[]' style='margin-left:122px' value='$number'>\t$arrayInterestClub[$number]($arrayClub[$number])</input></br>";
            echo "<input type='hidden' name='InterestClub[]' value= '$arrayInterestClub[$number]'</input>";
            echo "<input type='hidden' name='Club[]' value= '$arrayClub[$number]'</input>";
        }
        echo "<input type='submit' name='submit' value='Submit'>\t</buttom>";
        echo "<input type='reset' name='reset' value='Reset'></buttom>";
        echo "</form>";
        ?>
        <footer><?php include './../Practical3Q5/P3Q5Footer.php';?></footer>
    </body>
</html>
