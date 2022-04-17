<?php
if (isset ($_POST["nombre"]) && isset ($_POST["nota"])){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'INSERT INTO nota VALUES ("'.$_POST["nombre"].'" , "'.$_POST["asignatura"].'" , '.$_POST["nota"].') ';
    $bien = $bd->query($sql);
    if($bien){
        echo "Nota puesta correctamente";
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
      <form action="poner_nota.php" method="POST">
      <select name="nombre">
          <?php
            $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
            $usuario = 'root';
            $clave = '';
            try{
            $bd = new PDO($cadena_conexion, $usuario, $clave);
            $sql = 'SELECT * FROM usuario WHERE tipo_usuario LIKE 1';
            $alumnos = $bd->query($sql);
            foreach ($alumnos as $alu){
            print "<option value=".$alu["dni"]."> ". $alu["nombre_alu"] . " " . $alu["apellido"] ."</option>";
            }
            }catch (PDOException $e) {
            echo 'Error de la base de datos: ' . $e->getMessage();
            }
          ?>
      </select>
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
    
          <input type="text" name="nota" placeholder="Pon la nota">
          
        <p><input type="submit" name="enviar" value="Enviar"/></p>
    </form>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>
  </body>
</html>