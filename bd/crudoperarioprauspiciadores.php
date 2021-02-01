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
$idAuspiciador = (isset($_POST['idAuspiciador'])) ? $_POST['idAuspiciador'] : '';
$nombreAuspiciador = (isset($_POST['nombreAuspiciador'])) ? $_POST['nombreAuspiciador'] : '';
$rucAuspiciador = (isset($_POST['rucAuspiciador'])) ? $_POST['rucAuspiciador'] : '';
$telefonoAuspiciador = (isset($_POST['telefonoAuspiciador'])) ? $_POST['telefonoAuspiciador'] : '';
$correoAuspiciador = (isset($_POST['correoAuspiciador'])) ? $_POST['correoAuspiciador'] : '';
$montoAuspiciador = (isset($_POST['montoAuspiciador'])) ? $_POST['montoAuspiciador'] : '';
$descripcionAuspiciador = (isset($_POST['descripcionAuspiciador'])) ? $_POST['descripcionAuspiciador'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO auspiciador (nombreAuspiciador,rucAuspiciador,telefonoAuspiciador,correoAuspiciador,montoAuspiciador,descripcionAuspiciador,pukllay_idPukllay) VALUES('$nombreAuspiciador','$rucAuspiciador','$telefonoAuspiciador','$correoAuspiciador','$montoAuspiciador','$descripcionAuspiciador','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idAuspiciador,nombreAuspiciador,rucAuspiciador,telefonoAuspiciador,correoAuspiciador,montoAuspiciador,descripcionAuspiciador FROM auspiciador where pukllay_idPukllay='$idPukllay' ORDER BY idAuspiciador DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE auspiciador SET nombreAuspiciador='$nombreAuspiciador', rucAuspiciador='$rucAuspiciador', telefonoAuspiciador='$telefonoAuspiciador', correoAuspiciador='$correoAuspiciador',montoAuspiciador='$montoAuspiciador',descripcionAuspiciador='$descripcionAuspiciador' WHERE idAuspiciador='$idAuspiciador' and pukllay_idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idAuspiciador,nombreAuspiciador,rucAuspiciador,telefonoAuspiciador,correoAuspiciador,montoAuspiciador,descripcionAuspiciador FROM auspiciador where idAuspiciador='$idAuspiciador' and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM auspiciador WHERE idAuspiciador='$idAuspiciador' and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>