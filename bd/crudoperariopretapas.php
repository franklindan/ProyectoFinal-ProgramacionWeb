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
$fechaDia = (isset($_POST['fechaDia'])) ? $_POST['fechaDia'] : '';
$nombreDia = (isset($_POST['nombreDia'])) ? $_POST['nombreDia'] : '';
$descripcionDia = (isset($_POST['descripcionDia'])) ? $_POST['descripcionDia'] : '';
$lugarDia = (isset($_POST['lugarDia'])) ? $_POST['lugarDia'] : '';
$horaIniDia = (isset($_POST['horaIniDia'])) ? $_POST['horaIniDia'] : '';
$horaFinDia = (isset($_POST['horaFinDia'])) ? $_POST['horaFinDia'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO etapa (fechaDia,nombreDia,descripcionDia,lugarDia,horaIniDia,horaFinDia,idPukllay) VALUES('$fechaDia','$nombreDia','$descripcionDia','$lugarDia','$horaIniDia','$horaFinDia','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT fechaDia,nombreDia,descripcionDia,lugarDia,horaIniDia,horaFinDia FROM etapa where fechaDia='$fechaDia' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE etapa SET nombreDia='$nombreDia', descripcionDia='$descripcionDia', lugarDia='$lugarDia', horaIniDia='$horaIniDia',horaFinDia='$horaFinDia' WHERE fechaDia='$fechaDia' and idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT fechaDia,nombreDia,descripcionDia,lugarDia,horaIniDia,horaFinDia FROM etapa where fechaDia='$fechaDia' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM etapa WHERE fechaDia='$fechaDia' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>