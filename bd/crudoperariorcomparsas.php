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
$idComparsa = (isset($_POST['idComparsa'])) ? $_POST['idComparsa'] : '';
$nombreComp = (isset($_POST['nombreComp'])) ? $_POST['nombreComp'] : '';
$Procedencia = (isset($_POST['Procedencia'])) ? $_POST['Procedencia'] : '';
$Categoría = (isset($_POST['Categoría'])) ? $_POST['Categoría'] : '';
$CantidadPart = (isset($_POST['CantidadPart'])) ? $_POST['CantidadPart'] : '';
$Financiamiento = (isset($_POST['Financiamiento'])) ? $_POST['Financiamiento'] : '';
$delegado_dniDele = (isset($_POST['delegado_dniDele'])) ? $_POST['delegado_dniDele'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO comparsa (nombreComp,Procedencia,Categoría,CantidadPart,Financiamiento,delegado_dniDele) VALUES('$nombreComp','$Procedencia','$Categoría','$CantidadPart','$Financiamiento','$delegado_dniDele')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idComparsa,nombreComp,Procedencia,Categoría,CantidadPart,Financiamiento,delegado_dniDele FROM comparsa INNER JOIN delegado on delegado_dniDele=dniDele where usuario_idPukllay='$idPukllay' ORDER BY idComparsa DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE comparsa SET nombreComp='$nombreComp', Procedencia='$Procedencia', Categoría='$Categoría', CantidadPart='$CantidadPart', Financiamiento='$Financiamiento' WHERE idComparsa='$idComparsa'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idComparsa,nombreComp,Procedencia,Categoría,CantidadPart,Financiamiento,delegado_dniDele FROM comparsa where idComparsa='$idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM comparsa WHERE idComparsa='$idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>