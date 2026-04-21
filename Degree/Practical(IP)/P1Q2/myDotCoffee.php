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
            input[type=submit], input[type=reset] {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
            }
            input[type=submit]:hover, input[type=reset]:hover{
                background-color: #555;
            }
        </style>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            ﻿function calculateTime() {
                let timerInterval
                Swal.fire({
                    title: 'Calculate Time!!!',
                    html: 'I will close in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            }

        </script>
    </head>
    <?php

    function calculateDiscount($bags) {
        if ($bags >= 300)
            return ($bags * 5.50) * 0.30;
        else if ($bags >= 200)
            return ($bags * 5.50) * 0.25;
        else if ($bags >= 150)
            return ($bags * 5.50) * 0.20;
        else if ($bags >= 100)
            return ($bags * 5.50) * 0.15;
        else if ($bags >= 50)
            return ($bags * 5.50) * 0.10;
        else if ($bags >= 25)
            return ($bags * 5.50) * 0.5;
        else
            return 0;
    }

    //Example 2
    function calculateDiscount2($bags) {
        $arrayDiscount = array(25 => 5, 50 => 10, 100 => 15, 150 => 20, 200 => 25, 300 => 30);
        krsort($arrayDiscount);
        foreach ($arrayDiscount as $key => $value) {
            if ($bags >= $key) {
                return ($bags * 5.50) * $value / 100;
            }
        }
    }
    ?>
    <body>
        <div style="margin-left: 10%;">
            <h1>MyDot Coffee</h1>
            <form action="" method="POST">
                <p>Number of bags : <input type="number" name="bag"/></p>
                <p>
                    <input type="submit" value="Calculate" name="submit" />
                    <input type="reset" value="Reset" />
                </p>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["bag"])) {
                    echo "<h3 style:'color=red'>The number of bags is empty!!!</h3>";
                } else {
                    echo "<script type='text/javascript'>calculateTime()</script>";
                    $bag = (int) $_POST["bag"];
                    $totalPrice = $bag * 5.50;
                    $discount = calculateDiscount2($bag);
                    $totalCharge = $totalPrice - $discount;
                    echo "<h3>Price for $bag bags = RM " . number_format($totalPrice, 2) . "</h3>";
                    echo "<h3>Discount = RM " . number_format($discount, 2) . "</h3>";
                    echo "<h3>Your total charge = RM " . number_format($totalCharge, 2) . "</h3>";
                    if ($totalPrice > 1000) {
                        echo "<h3>You will get 1 free movie ticket :)</h3>";
                    }
                }
            }
            ?>
            <br/>
            <a class="link" href="../index.php">Home Page</a>
        </div>
    </body>
</html>
