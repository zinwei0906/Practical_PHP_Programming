<!DOCTYPE html>
<?php
require_once './TemperatureClassAdapter.php';
require_once './TemperatureObjectAdapter.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Temperature Monitoring Application</title>
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
    </head>
    <body>
        <br/><br/><br/>
        <a class="link" href="../index.php">Home Page</a>
        <br/><br/><br/>
        <?php
        $fahrenheit = 34;
        $classAdapter = new TemperatureClassAdapter();
        $classAdapter->setTemperatureInF($fahrenheit);
        echo "<br/>Temperature (Fahrenheit) : " . number_format($classAdapter->getTemperatureInF(), 2) . "&#8451";
        echo "<br/>Temperature (Celcius)    : " . number_format($classAdapter->getTemperatureInC(), 2) . "&#8451";

        $celcius = 33;
        $classAdapter->setTemperatureInC($celcius);
        echo "<br/>Temperature (Celcius)    : " . number_format($classAdapter->getTemperatureInC(), 2) . "&#8451";
        echo "<br/>Temperature (Fahrenheit) : " . number_format($classAdapter->getTemperatureInF(), 2) . "&#8451";
        ?>
    </body>
</html>
