<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>P3(TZW)</title>
        <style>
            .link {
                margin-left: 0%;
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
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script>
            $(document).ready(function () {
                $('#FormTable').DataTable();
            });
            $(document).ready(function () {
                $('#FormTable2').DataTable();
            });
        </script>

    </head>
    <body style="margin-left: 10%;margin-right: 10%;">
        <h1>Testing </h1>
        <?php
        require_once './FoodItem.php';
        require_once './Stationery.php';

        $foodItem1 = new FoodItem("ABC", "ABC123", 123, 23);
        $Stationery1 = new Stationery("qwe", "qwe123", 123, 12);
        $item1 = array(new FoodItem("food1", "food1", 111, 111), new Stationery("stationery1", "stationery1", 222, 222));

        echo $foodItem1->displayItem();
        echo $Stationery1->displayItem();
        echo $item1[0]->displayItem();
        echo $item1[1]->displayItem();

        $itemTesting1 = [new FoodItem("Polymorphism", "Polymorphism1", 11, 11),
            new Stationery("Polymorphism2", "Polymorphism1", 22, 22)
        ];
        echo "<h1>Polymorphism Array : </h1>";
        foreach ($itemTesting1 as $item) {
            echo $item->displayItem() . '<br>';
        }


        $itemArray[] = new FoodItem("Food 1", "Food1", 111, 111);
        $itemArray[] = new Stationery("Stationery 1", "Stationery1", 11, 11);
        $itemArray[] = new Stationery("Stationery 2", "Stationery2", 22, 22);
        $itemArray[] = new Stationery("Stationery 3", "Stationery3", 33, 33);
        $itemArray[] = new FoodItem("Food 2", "Food2", 222, 222);
        $itemArray[] = new FoodItem("Food 3", "Food3", 333, 333);
        echo "<h1 style='text-align:center'>Food Item</h1>";
        echo "<table id='FormTable' class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Code</th><th>Description</th><th>Price</th><th>Unit</th><th>Total Price</th></tr></thead><tbody>";

        foreach ($itemArray as $item123) {
            if ($item123 instanceof FoodItem) {
                echo "<tr><td>" . $item123->itemCode . "</td>";
                echo "<td>" . $item123->description . "</td>";
                echo "<td>RM " . $item123->price . "</td>";
                echo "<td>" . $item123->unit . "</td>";
                echo "<td>RM " . number_format($item123->calculateTotalPrice(), 2) . "</td></tr>";
            }
        }
        echo "</tbody></table>";
        echo "<h1 style='text-align:center'>Stationery</h1>";
        echo "<table id='FormTable2' class='table table-striped table-bordered'>";
        echo "<thead><tr><th>Code</th><th>Description</th><th>Price</th><th>Weight</th></tr></thead><tbody>";

        foreach ($itemArray as $item123) {
            if ($item123 instanceof Stationery) {
                echo "<tr><td>" . $item123->itemCode . "</td>";
                echo "<td>" . $item123->description . "</td>";
                echo "<td>RM " . $item123->price . "</td>";
                echo "<td>" . $item123->weight . "</td></tr>";
            }
        }
        echo "</tbody></table>";
        ?>
        <br/><br/><br/><br/><br/>
        <a class="link" href="../index.php">Home Page</a>
        <br/><br/><br/><br/><br/>
    </body>
</html>
