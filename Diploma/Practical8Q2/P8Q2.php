<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            function showCarModel(manufacturer)
            {
                if (window.XMLHttpRequest)
                {
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    xmlhttp = new ActiveXObject("Microft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("model").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "Car.php?q=" + manufacturer, true);
                xmlhttp.send();
            }
        </script>
    </head>

    <body>
        <h1>Choose Your Car</h1>
        <form id="carForm" name="carForm">
            <fieldset>
                <legend>Choose Your Car</legend>
                Make : <select id="make" onchange="showCarModel(this.value)">
                    <option value="">Select Make</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Mazda">Mazda</option>
                </select>
                <br/><br/>
                Model : <select id="model">
                    <option value="">Select Model</option>
                </select>
            </fieldset>
        </form>
    </body>
</html>
