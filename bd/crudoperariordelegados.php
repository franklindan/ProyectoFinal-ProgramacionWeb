<?php

session_start();
if (!isset($_SESSION['usuario']))
{
    header("location:login.php");   
}

$idPukllay=$_SESSION['idPukllay'];

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$dniDele = (isset($_POST['dniDele'])) ? $_POST['dniDele'] : '';
$nombDele = (isset($_POST['nombDele'])) ? $_POST['nombDele'] : '';
$apelDele = (isset($_POST['apelDele'])) ? $_POST['apelDele'] : '';
$coreDele = (isset($_POST['coreDele'])) ? $_POST['coreDele'] : '';
$estadoUsuario = (isset($_POST['estadoUsuario'])) ? $_POST['estadoUsuario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO usuario (usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario,idPukllay) VALUES('$dniDele','$dniDele','delegado','activo','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "INSERT INTO delegado (dniDele,nombDele,apelDele,coreDele,usuario_usuarioUsuario,usuario_idPukllay) VALUES('$dniDele','$nombDele','$apelDele','$coreDele','$dniDele','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniDele,nombDele,apelDele,coreDele,estadoUsuario FROM delegado INNER JOIN usuario on usuario_usuarioUsuario=usuarioUsuario where usuario_idPukllay='$idPukllay' and dniDele='$dniDele'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE delegado SET nombDele='$nombDele', apelDele='$apelDele', coreDele='$coreDele' WHERE dniDele='$dniDele' and usuario_idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniDele,nombDele,apelDele,coreDele,estadoUsuario FROM delegado INNER JOIN usuario on usuario_usuarioUsuario=usuarioUsuario where usuario_idPukllay='$idPukllay' and dniDele='$dniDele'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM delegado WHERE dniDele='$dniDele' and usuario_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>