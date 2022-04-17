<?php
if (isset ($_POST["nombre"])){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'INSERT INTO asignatura (nombre_asig) VALUES ("'.$_POST["nombre"].'")';
    $bien = $bd->query($sql);
    if($bien){
        echo "Asignatura insertada correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Dar de alta asignaturas</title>
  </head>
  <body>
      <h1>Dar de alta asignaturas</h1>
    <form action="alta_asignaturas.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre">
        <p><input type="submit" name="enviar" value="Añadir"/></p>
    </form>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>