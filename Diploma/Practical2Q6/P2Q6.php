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
        $states=array('JH'=>'Johor','KD'=>'Kedah','KT'=>'Kelatan','KL'=>'Kuala Lumpur','LB'=>'Labuan','MK'=>'Melaka',
            'NS'=>'Negeri Sembilan','PH'=>'Pahang','PN'=>'Penang','PR'=>'Perak','PL'=>'Perlis','PJ'=>'Putrajaya',
            'SB'=>'Sabah','SW'=>'Sarawak','SG'=>'Selangor','TR'=>'Trengganu');
        
        echo "<ul>";
        foreach ($states as $stateAbbreviations => $stateNames) {
            echo "<li>$stateNames ($stateAbbreviations)</li>";
        }
        echo "</ul>";
        ?>
    </body>
</html>
