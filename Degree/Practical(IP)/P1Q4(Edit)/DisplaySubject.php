<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .link {
                margin-left: 15%;
                background-color: skyblue;
                color: white;
                padding: 1em 1.5em;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link:hover {
                cursor: pointer;
                color: white;
                background-color: #555;
            }
        </style>
        <script>
            $(document).ready(function () {
                $('#FormTable').DataTable();
            });
        </script>
    </head>
    <body>

        <div class="container py-5">
            <?php
            echo "<table id='FormTable' class='table table-striped table-bordered'>";
            echo "<thead><tr><th>Code</th><th>Title</th><th>Credit</th><th>Year of Study</th></tr></thead><tbody>";
            require_once './ConnectDatabase.php';
            $db = ConnectDatabase::getInstance();
            $result = $db->displaySubject("SELECT * FROM subjects");
            foreach ($result as $row) {
                echo "<tr><td>" . $row['code'];
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['credit'] . "</td>";
                echo "<td>" . $row['yearOfStudy'] . "</td></tr>";
            }
            echo "</tbody></table>";
            ?>
        </div>
        <a class="link" href="../index.php">Home Page</a>
        <br/><br/><br/><br/><br/>

    </body>
</html>
