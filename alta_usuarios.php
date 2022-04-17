<?php
if (isset ($_POST["dni"]) && isset ($_POST["nombre"]) && isset ($_POST["apellido"]) && isset ($_POST["tipo"]) ){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'INSERT INTO usuario VALUES ("'.$_POST["dni"].'" , "'.$_POST["nombre"].'" , "'.$_POST["apellido"].'" , '.$_POST["tipo"].')';
    $bien = $bd->query($sql);
    if($bien){
        echo "Usuario insertado correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Dar de alta usuarios</title>
  </head>
  <body>
      <h1>Dar de alta alumnos</h1>
    <form action="alta_usuarios.php" method="POST">
        <input type="text" name="dni" placeholder="DNI">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <select name="tipo">
            <option value="0">Admin</option>
            <option value="1">Normal</option>
        </select>
        <p><input type="submit" name="enviar" value="Añadir"/></p>
    </form>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>