

<html>
  <head>
    <title>Pagina de usuario normal</title>
  </head>
  <body>
      
<?php
session_start();

$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    echo "<table border='1'>
          <tr>
            <td>Alumno</td>
            <td>Asignatura</td>
            <td>Nota</td>
          </tr>
    ";
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión establecida<br><br>';
    $nota = 'SELECT * FROM nota INNER JOIN usuario ON nota.alumno = usuario.dni INNER JOIN asignatura ON nota.asignatura = asignatura.id where alumno like"'.$_SESSION["dni"].'"';
    
    $usuarios = $bd->query($nota);    
    foreach ($usuarios as $usu){
        echo "<tr>
                <td>".$usu["nombre_alu"]."</td>
                <td>".$usu["nombre_asig"]."</td>
                <td>".$usu["nota"]."</td>
              </tr>"
        ;
    }
    

    echo "</table>";
    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }

?>
      
      <a href="principal.php">Cerrar sesion</a>

  </body>
</html>