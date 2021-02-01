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
$idGasto = (isset($_POST['idGasto'])) ? $_POST['idGasto'] : '';
$nombreGasto = (isset($_POST['nombreGasto'])) ? $_POST['nombreGasto'] : '';
$cantidadGasto = (isset($_POST['cantidadGasto'])) ? $_POST['cantidadGasto'] : '';
$descripcionGasto = (isset($_POST['descripcionGasto'])) ? $_POST['descripcionGasto'] : '';
$fechaGasto = (isset($_POST['fechaGasto'])) ? $_POST['fechaGasto'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO gastopukllay (nombreGasto,cantidadGasto,descripcionGasto,fechaGasto,pukllay_idPukllay) VALUES('$nombreGasto','$cantidadGasto','$descripcionGasto','$fechaGasto','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idGasto,nombreGasto,cantidadGasto,descripcionGasto,fechaGasto FROM gastopukllay where pukllay_idPukllay='$idPukllay' ORDER BY idGasto DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE gastopukllay SET nombreGasto='$nombreGasto', cantidadGasto='$cantidadGasto', descripcionGasto='$descripcionGasto', fechaGasto='$fechaGasto' WHERE idGasto='$idGasto' and pukllay_idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idGasto,nombreGasto,cantidadGasto,descripcionGasto,fechaGasto FROM gastopukllay where idGasto='$idGasto'and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM gastopukllay WHERE idGasto='$idGasto' and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>