<?php
if (isset ($_POST["nombre"])){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'DELETE FROM usuario WHERE dni = "'.$_POST["nombre"].'"';
    $bien = $bd->query($sql);
    if($bien){
        echo "Alumno eliminado correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Eliminar alumno</title>
  </head>
  <body>
      <h1>Eliminar alumno</h1>
      <form action="eliminar_alumno.php" method="POST">
      <select name="nombre">
          <?php
            $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM usuario';
            $alumnos = $bd->query($sql);
            foreach ($alumnos as $alu){
            print "<option value=".$alu["dni"]."> ". $alu["nombre_alu"] . " " . $alu["apellido"] ."</option>";
            }
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }
          ?>
      </select>
          
        <p><input type="submit" name="enviar" value="Eliminar"/></p>
    </form>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>