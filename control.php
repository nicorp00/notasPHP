<?php
session_start();
$cadena_conexion = 'mysql:dbname=notas;host=127.0.0.1';
$usuario = 'root';
$clave = '';
try{
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    echo 'Conexión establecida<br><br>';
    $sql = 'SELECT * FROM usuario where dni like "'.$_POST["dni"].'"';
    $usuarios = $bd->query($sql);
    foreach ($usuarios as $usu){
        $_SESSION["tipo"] = $usu["tipo_usuario"];
        $_SESSION["dni"] = $usu["dni"];
    }
    if (isset($_SESSION["dni"]) && $_SESSION["tipo"] == 0){
        header("Location: admin.php");
    }else if(isset($_SESSION["dni"]) && $_SESSION["tipo"] == 1){
        header("Location: normal.php");
    }else{
        header("Location: principal.php");
    }
    

    }catch (PDOException $e) {
        echo 'Error de la base de datos: ' . $e->getMessage();
    }

  

?>