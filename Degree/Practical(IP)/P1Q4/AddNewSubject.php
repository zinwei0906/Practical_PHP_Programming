<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .link {
                background-color: skyblue;
                color: white;
                padding: 1em 1.5em;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link:hover {
                cursor: pointer;
                background-color: #555;
            }
        </style>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            ﻿function addSuccess() {
                Swal.fire(
                        'Added Successfully !!!',
                        'You have completed the added!',
                        'success'
                        )
            }
            function error() {
                Swal.fire(
                        'Oops...',
                        'Something went wrong!',
                        'error'
                        )
            }
        </script>
    </head>
    <body style="margin-left: 10%;">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Validate the code
            if (empty($_POST["code"])) {
                $errorMessage[] = "Code must not be empty!";
            }
            //Validate the title
            if (empty($_POST["title"])) {
                $errorMessage[] = "Title must not be empty!";
            }
            //Validate the credit
            if (empty($_POST["credit"])) {
                $errorMessage[] = "Credit must not be empty!";
            }
            //Validate the year
            if (empty($_POST["year"])) {
                $errorMessage[] = "Year must not be empty!";
            }
            if (empty($errorMessage)) {
                echo '<script type="text/javascript">addSuccess();</script>';
                echo "<h1>Added Successful</h1>";
                echo "<h3>Code : " . $_POST["code"] . "</h3>";
                echo "<h3>Title : " . $_POST["title"] . "</h3>";
                echo "<h3>Credit : " . $_POST["credit"] . "</h3>";
                echo "<h3>Year : " . $_POST["year"] . "</h3>";
                $host = '127.0.0.1';
                $db = 'collegedb';
                $user = 'root';
                $pass = '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                try {
                    $pdo = new PDO($dsn, $user, $pass, $options);
                    $sql = "INSERT INTO subjects (code, title, credit, yearOfStudy) VALUES (?,?,?,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$_POST["code"], $_POST["title"], $_POST["credit"], $_POST["year"]]);
                    require './DisplaySubject.php';
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int) $e->getCode());
                }
            } else {
                echo '<script type="text/javascript">error();</script>';
                echo "<h1>Added Fail</h1>";
                foreach ($errorMessage as $error) {
                    echo "<h3 style='color:red'>$error</h3>";
                }
                echo '<br/><br/><br/><a class="link" href = "javascript:history.back()">Back to previous page</a>';
            }
        }
        ?>
    </body>
</html>
