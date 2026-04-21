<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TZW</title>
        <style>
            a {
                background-color: skyblue;
                color: white;
                padding: 1em 1.5em;
                text-decoration: none;
                text-transform: uppercase;
            }

            a:hover {
                cursor: pointer;
                background-color: #555;
            }
        </style>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            ﻿function addSuccess() {
                Swal.fire(
                        'Register Successfully !!!',
                        'You have completed the register!',
                        'success'
                        )
            }

        </script>
    </head>
    <body style="margin-left: 10%;">
        <?php

        function prepareInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Validate the name
            if (empty($_POST["name"])) {
                $errorMessage[] = "Name must not be empty!";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
                $errorMessage[] = "The name can contain only uppercase and lowercase letters of the alphabet.";
            }
            //Validate the mobile phone
            if (empty($_POST["mobile"])) {
                $errorMessage[] = "Mobile Phone must not be empty!";
            } else if (!preg_match("/^[0-9]{11,13}$/", $_POST["mobile"])) {
                $errorMessage[] = "The mobile phone number can only consist of digits.(11 to 13 digit)";
            }
//             else if (filter_var($_POST["mobile"], FILTER_VALIDATE_INT) === false) {
//                $errorMessage[] = "The mobile phone number can only consist of digits.";
//            }
            //Validate the gender
            if (empty($_POST["gender"])) {
                $errorMessage[] = "Gender must not be empty!";
            }
            if (empty($errorMessage)) {
                echo '<script type="text/javascript">addSuccess();</script>';
                echo "<h1>Registration Successful</h1>";
                if ($_POST["gender"] == 'm') {
                    echo "<h3>Mr " . prepareInput($_POST["name"]) . "</h3>";
                } else if ($_POST["gender"] == 'f') {
                    echo "<h3>Ms " . prepareInput($_POST["name"]) . "</h3>";
                }
                echo "<h3>Mobile Number : " . prepareInput($_POST["mobile"]) . "</h3>";
            } else {
                echo "<h1>Registration Fail</h1>";
                foreach ($errorMessage as $error) {
                    echo "<h3 style='color:red'>$error</h3>";
                }
            }
        }
        ?>
        <br/>
        <a class="link" href = "javascript:history.back()">Back to previous page</a>
        <a href="../index.php">Home Page</a>
    </body>
</html>
