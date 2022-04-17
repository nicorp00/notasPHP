<?php
    session_start();
    if (empty($_POST["nombre"])!=true) {
    $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $ins = "UPDATE asignatura SET nombre_asig = '".$_POST["nombre"]."' WHERE id LIKE '".$_SESSION["idcambiar"]."';";
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
<h1>Modificar asignatura</h1>
<form action="modificar_asignatura.php" method="POST">
<p>Nombre: <input type="text" name="nombre"/></p>
<p><input type="submit" name="modificar" value="Modificar"/></p>
</form>
</html>