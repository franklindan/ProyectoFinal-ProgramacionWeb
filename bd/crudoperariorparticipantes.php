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
$dniPart = (isset($_POST['dniPart'])) ? $_POST['dniPart'] : '';
$nombPart = (isset($_POST['nombPart'])) ? $_POST['nombPart'] : '';
$apelPart = (isset($_POST['apelPart'])) ? $_POST['apelPart'] : '';
$comparsa_idComparsa = (isset($_POST['comparsa_idComparsa'])) ? $_POST['comparsa_idComparsa'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO participante (dniPart,nombPart,apelPart,comparsa_idComparsa) VALUES('$dniPart','$nombPart','$apelPart','$comparsa_idComparsa')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniPart,nombPart,apelPart,comparsa_idComparsa FROM participante inner join comparsa on comparsa_idComparsa=idComparsa inner join delegado on delegado_dniDele=dniDele where usuario_idPukllay='$idPukllay' and dniPart='$dniPart'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE participante SET nombPart='$nombPart', apelPart='$apelPart' WHERE dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniPart,nombPart,apelPart,comparsa_idComparsa FROM participante inner join comparsa on comparsa_idComparsa=idComparsa inner join delegado on delegado_dniDele=dniDele where usuario_idPukllay='$idPukllay' and dniPart='$dniPart'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM participante WHERE dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>