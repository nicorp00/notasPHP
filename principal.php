<?php
session_start();
session_destroy();
?>
<html>
<head>
<title>Iniciar sesion</title>
<meta charset="UTF-8">
<script>
            function loadDoc(){
                var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementById("hora").innerHTML = "Hora del servidor: " + this.response;
                    }
                    
                };
                xhttp.open("GET", "hora_actual.php", true);
                xhttp.send();
                return false;
            }
            setInterval(loadDoc, 500);
        </script>
</head>
<body>
<h1>Iniciar sesion</h1>
<form action="control.php" method="POST">
<p>DNI: <input type="text" name="dni"/></p>
<p><input type="submit" name="enviar" value="Enviar"/></p>
</form>
    <h1>Hora del servidor:</h1>
    <section id="hora"></section>
</html>