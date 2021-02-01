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
$dniOrg = (isset($_POST['dniOrg'])) ? $_POST['dniOrg'] : '';
$nombreOrg = (isset($_POST['nombreOrg'])) ? $_POST['nombreOrg'] : '';
$ApellidoOrg = (isset($_POST['ApellidoOrg'])) ? $_POST['ApellidoOrg'] : '';
$ocupacionorg = (isset($_POST['ocupacionorg'])) ? $_POST['ocupacionorg'] : '';
$telefonoOrg = (isset($_POST['telefonoOrg'])) ? $_POST['telefonoOrg'] : '';
$correoOrg = (isset($_POST['correoOrg'])) ? $_POST['correoOrg'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO organizador (dniOrg,nombreOrg,ApellidoOrg,ocupacionorg,telefonoOrg,correoOrg,idPukllay) VALUES('$dniOrg','$nombreOrg','$ApellidoOrg','$ocupacionorg','$telefonoOrg','$correoOrg','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniOrg,nombreOrg,ApellidoOrg,ocupacionorg,telefonoOrg,correoOrg FROM organizador where dniOrg='$dniOrg' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE organizador SET nombreOrg='$nombreOrg', ApellidoOrg='$ApellidoOrg', ocupacionorg='$ocupacionorg', telefonoOrg='$telefonoOrg',correoOrg='$correoOrg' WHERE dniOrg='$dniOrg' and idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniOrg,nombreOrg,ApellidoOrg,ocupacionorg,telefonoOrg,correoOrg FROM organizador where dniOrg='$dniOrg' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM organizador WHERE dniOrg='$dniOrg' and idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>