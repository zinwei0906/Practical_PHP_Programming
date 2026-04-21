<?php
require_once './WeatherData.php';
require_once './CurrentCondition.php';
require_once './WeatherStatistic.php';
require_once './SimpleForecast.php';
?>

<html>
    <head>
        <title>Weather Monitoring Application</title>
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
        <h1>Real-time Weather Data from weather station ...</h1>
        <?php
        $w = new WeatherData(25, 76, 0);
        $c = new CurrentCondition($w);

        $w->attachObserver($c);

        $s = new WeatherStatistic($w);
        $w->attachObserver($s);

        $f = new SimpleForecast($w);
        $w->attachObserver($f);

        //$w->setTemperature(12);
        //$w->setTemperature(10);
        //$w->setTemperature(43);

        $w->setPressure(333);
        $w->setPressure(222);
        $w->setPressure(111);
        ?>
    </body>
</html>

