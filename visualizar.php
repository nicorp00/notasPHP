
<html>
  <head>
    <title>Pagina de usuario admin</title>
  </head>
  <body>
      
      <form action="visualizar.php" method="POST">
        <p>DNI: <input type="text" name="dni"/></p>
        <p><input type="submit" name="enviar" value="Enviar"/></p>
      </form>
      
<?php
if (isset($_POST["dni"])){
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión establecida<br><br>';
    $nota = 'SELECT * FROM nota INNER JOIN usuario ON nota.alumno = usuario.dni INNER JOIN asignatura ON nota.asignatura = asignatura.id where alumno like"'.$_POST["dni"].'"';
    $usuarios = $bd->query($nota);
    
    $comprobar = false;
    foreach ($usuarios as $usu){
        if ($comprobar == false){
            echo "<table border='1'>
          <tr>
            <td>Alumno</td>
            <td>Asignatura</td>
            <td>Nota</td>
          </tr>";
            $comprobar = true;
            
        }
        echo "<tr>
                <td>".$usu["nombre_alu"]."</td>
                <td>".$usu["nombre_asig"]."</td>
                <td>".$usu["nota"]."</td>
              </tr>"
        ;
    }echo "</table>";
    if ($comprobar == false){echo "Usuario no encontrado";}
    echo"<br>";

    
    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }
}
?>
      <a href="admin.php">Volver a las opciones de administrador</a>
      <br>
      <a href="principal.php">Cerrar sesion</a>

  </body>
</html>