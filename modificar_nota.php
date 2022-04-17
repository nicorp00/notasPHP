<?php
    session_start();
    if (empty($_POST["nota"])!=true) {
    $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $ins = "UPDATE nota SET nota = '".$_POST["nota"]."' WHERE alumno LIKE '".$_SESSION["dnicambiar"]."' and asignatura LIKE '".$_SESSION["idcambiar"]."';";
    $resul = $bd->query($ins);
    if($resul) {
    }else {print_r( $bd -> errorinfo());
    echo "Ese usuario no cursa esa asignatura";
    header("refresh:3; url=modificar.php ");
    }
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
<h1>Modificar nota</h1>
<form action="modificar_nota.php" method="POST">
<p>Nota: <input type="text" name="nota"/></p>
<p><input type="submit" name="modificar" value="Modificar"/></p>
</form>
</html>