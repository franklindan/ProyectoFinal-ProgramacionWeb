<?php

session_start();
if (!isset($_SESSION['usuario']))
{
    header("location:login.php");   
}

$dniUsuario=$_SESSION['usuario'];

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if (isset($_POST['nombre']) &&
    isset($_POST['apellido']) &&
    isset($_POST['celular']) &&
    isset($_POST['Correo']))
{
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $Correo = $_POST['Correo'];
    // $pass = get_post($conexion, 'dnid');//password_hash(get_post($conexion,'dnid'), PASSWORD_DEFAULT);
    $consulta = "UPDATE delegado set nombDele='$nombre',apelDele='$apellido',celuDele='$celular',coreDele='$Correo' where dniDele='$dniUsuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 

    $consulta = "SELECT * FROM delegado where dniDele='$dniUsuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['contraseña']) &&
    isset($_POST['nuevaContraseña']))
{
    $contraseña = $_POST['contraseña'];
    $nuevaContraseña = $_POST['nuevaContraseña'];

    $consulta = "UPDATE usuario set paswUsuario='$nuevaContraseña' where usuarioUsuario='$dniUsuario' and paswUsuario='$contraseña'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

    $consulta = "SELECT * from usuario where paswUsuario='$nuevaContraseña' and usuarioUsuario='$dniUsuario'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;

?>