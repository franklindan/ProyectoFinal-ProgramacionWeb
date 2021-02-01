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
$dniJurado = (isset($_POST['dniJurado'])) ? $_POST['dniJurado'] : '';
$nombJurado = (isset($_POST['nombJurado'])) ? $_POST['nombJurado'] : '';
$apelJurado = (isset($_POST['apelJurado'])) ? $_POST['apelJurado'] : '';
$coreJurado = (isset($_POST['coreJurado'])) ? $_POST['coreJurado'] : '';
$estadoUsuario = (isset($_POST['estadoUsuario'])) ? $_POST['estadoUsuario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO usuario (usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario,idPukllay) VALUES('$dniJurado','$dniJurado','jurado','activo','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "INSERT INTO jurado (dniJurado,nombJurado,apelJurado,coreJurado,usuario_usuarioUsuario,usuario_idPukllay) VALUES('$dniJurado','$nombJurado','$apelJurado','$coreJurado','$dniJurado','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniJurado,nombJurado,apelJurado,coreJurado,estadoUsuario FROM jurado INNER JOIN usuario on usuario_usuarioUsuario=usuarioUsuario where usuario_idPukllay='$idPukllay' and dniJurado='$dniJurado'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE jurado SET nombJurado='$nombJurado', apelJurado='$apelJurado', coreJurado='$coreJurado' WHERE dniJurado='$dniJurado' and usuario_idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniJurado,nombJurado,apelJurado,coreJurado,estadoUsuario FROM jurado INNER JOIN usuario on usuario_usuarioUsuario=usuarioUsuario where usuario_idPukllay='$idPukllay' and dniJurado='$dniJurado'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM jurado WHERE dniJurado='$dniJurado' and usuario_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>