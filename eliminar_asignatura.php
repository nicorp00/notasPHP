<?php
if (isset ($_POST["asignatura"])){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'DELETE FROM asignatura WHERE id = '.$_POST["asignatura"].'';
    $bien = $bd->query($sql);
    if($bien){
        echo "Asignatura eliminada correctamente";
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>

<html>
  <head>
    <title>Eliminar asignatura</title>
  </head>
  <body>
      <h1>Eliminar asignatura</h1>
      <form action="eliminar_asignatura.php" method="POST">
      <select name="asignatura">
          <?php
            $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM asignatura';
            $asignaturas = $bd->query($sql);
            foreach ($asignaturas as $asig){
            print "<option value=".$asig["id"]."> ". $asig["nombre_asig"] ."</option>";
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