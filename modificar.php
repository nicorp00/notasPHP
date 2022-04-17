<?php
    session_start();
    if (isset($_POST["usua"])) {
    $_SESSION["dnicambiar"]=$_POST["usuario"];
    header("Location: modificar_alumno.php");
    }
    if (isset($_POST["modif"])) {
    $_SESSION["idcambiar"]=$_POST["asignatura"];
    header("Location: modificar_asignatura.php");
    }
    if (isset($_POST["not"])) {
    $_SESSION["dnicambiar"]=$_POST["usuario"];
    $_SESSION["idcambiar"]=$_POST["asignatura"];
    $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $ins = "select * from nota WHERE alumno LIKE '".$_SESSION["dnicambiar"]."' and asignatura LIKE '".$_SESSION["idcambiar"]."';";
    $resul = $bd->query($ins);
    foreach ($resul as $usu) {
    if (isset($usu['nota'])) {
    echo "Existe";
    header("refresh:3; url=modificar_nota.php ");
    }
    }
    if($resul) {
    }else print_r( $bd -> errorinfo());
    } catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
    }
    if (isset($usu['nota'])!=true) {
    echo "Ese usuario no cursa esa asignatura";
    header("refresh:3; url=modificar.php");
    }
    }
?>
<html>
    <head>
    <title>Modificar</title>
    <meta charset="UTF-8">
    </head>
    <body>
    <h1>Seleccionar alumno</h1>
    <form action="modificar.php" method="POST">
    <p>Alumnos: <select name="usuario">
    <?php
    $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'SELECT * FROM usuario WHERE tipo_usuario LIKE 1';
    $usuarios = $bd->query($sql);
    foreach ($usuarios as $usu) {
    print "<option value='".$usu['dni']."'>".$usu['nombre_alu']." ".$usu['apellido']."</option>";
    }
    } catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
    }
    ?>
    </select></p>
    <p><input type="submit" name="usua" value="Modificar"/></p>

    <br>

    <p>Asignaturas: <select name="asignatura">
    <?php
    $cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $sql = 'SELECT * FROM asignatura';
    $usuarios = $bd->query($sql);
    foreach ($usuarios as $usu) {
    print "<option value='".$usu['id']."'>".$usu['nombre_asig']."</option>";
    }
    } catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
    }
    ?>
    </select></p>
    <p><input type="submit" name="modif" value="Modificar"/></p>

    <br><br>

    Notas (selecione un alumno y asignatura):
    <input type="submit" name="not" value="Modificar nota"/>
    </form>
    
    <a href="admin.php">Volver a las opciones de administrador</a>
    <br>
    <a href="principal.php">Cerrar sesion</a>
      
</html>