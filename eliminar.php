
<?php

    if (isset($_POST["borrar"])){
    if ($_POST["borrar"] == "alumno"){
        header("Location: eliminar_alumno.php");
    }else{
        header("Location: eliminar_asignatura.php");
    }
    } 

?>


<html>
<head>
<title>Borrar alumnos/asignaturas</title>
<meta charset="UTF-8">
</head>
<body>
<h1>Selecciona qué quieres borrar</h1>
<form action="eliminar.php" method="POST">
    <select name="borrar">
        <option value="asignatura">Asignatura</option>
        <option value="alumno">Alumno</option>
    </select>
<p><input type="submit" name="enviar" value="Enviar"/></p>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
</form>
</html>