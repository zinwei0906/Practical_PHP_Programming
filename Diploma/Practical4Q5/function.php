<?php
    //Check the Invalid ID
    function invalidID($id){
        if(empty($id)){
            echo "<li>Student ID Cannot empty.</li>";
            return 0;
        }
        else if(!preg_match("/^\d{2}[A-Z]{3}\d{5}/", $id)){
            echo "<li>Student ID Must follow format: [99XXX99999].</li>";
            return 0;
        }
        else{
            return 1;
        }
    }
    
    //Check the Invalid Name
    function invalidName($name){
        if(empty($name)){
            echo "<li>Student Name Cannot empty.</li>";
            return 0;
        }
        else if(strlen($name)>30){
            echo "<li>Student Name Cannot more than 30 characters.</li>";
            return 0;
        }
        else if(!preg_match("/^[A-Za-z @,'.-\/]+$/", $name)){
            echo "<li>Student Name Can contain only uppercase and lowercase alphabet, space, alias [@], comma [,], single-quote [‘], dot [.], dash [-] and slash [/].</li>";
            return 0;
        }
        else
            return 1;
    }
    
    function invalidGender($gender){
        if($gender==" "){
            echo "<li>Gender Cannot empty.</li>";
            return 0;
            }
        else
            return 1;
    }

    function invalidChooseProgram($program){
        if($program==" "){
            echo "<li>Program Cannot empty.</li>";
            return 0;
        }
        else
            return 1;
    }
?>
