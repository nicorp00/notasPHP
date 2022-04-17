<?php
session_start();
if (empty($_POST["nombre"])!=true && empty($_POST["apellido"])!=true && isset($_POST["tipo"])) {
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try {
$bd = new PDO($cadena_conexion, $usuario, $clave);
$ins = "UPDATE usuario SET nombre_alu = '".$_POST["nombre"]."', apellido = '".$_POST["apellido"]."', tipo_usuario = ".$_POST["tipo"]." WHERE dni LIKE '".$_SESSION["dnicambiar"]."' WHERE tipo_usuario LIKE 1;";
$resul = $bd->query($ins);
if($resul) {
}else print_r( $bd -> errorinfo());
} catch (PDOException $e) {
echo 'Error con la base de datos: ' . $e->getMessage();
}
header("Location: modificar.php");
} elseif (isset($_POST["enviar"])) {
echo 'Introduce todos los datos correctamente';
}
?>
<html>
<head>
<title>Modificar</title>
<meta charset="UTF-8">
</head>
<body>
<h1>Modificar alumno</h1>
<form action="modificar_alumno.php" method="POST">
<p>Nombre: <input type="text" name="nombre"/></p>
<p>Apellido: <input type="text" name="apellido"/></p>
<p>Tipo:
<input type="radio" name="tipo" value="0"> Admin
<input type="radio" name="tipo" value="1"> Alumno
</p>
<p><input type="submit" name="modificar" value="Modificar"/></p>
</form>
</html>