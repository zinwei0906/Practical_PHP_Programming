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
    </head>
    <script>
        function ajaxFunction() {
            var xmlhttp;
            if (window.XMLHttpRequest)
                xmlhttp = new XMLHttpRequest();
            else if (ActiveXObject("Microsoft.XMLHTTP"))
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            else {
                alert("Problem with your browser!");
                return false;
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4) {
                    document.Question1.time.value = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "serverTime.php", true);
            xmlhttp.send();
        }
    </script>
    <body>
        <form name="Question1">
            <h1>Question 1 : Get Time</h1>
            Name : <input type="text" name="name" onchange="ajaxFunction();"/><br/>
            Time   : <input type="text" name="time"/>
        </form>
    </body>
</html>
