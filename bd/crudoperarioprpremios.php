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
$idPremio = (isset($_POST['idPremio'])) ? $_POST['idPremio'] : '';
$nombrePremio = (isset($_POST['nombrePremio'])) ? $_POST['nombrePremio'] : '';
$tipoPremio = (isset($_POST['tipoPremio'])) ? $_POST['tipoPremio'] : '';
$puestoPremio = (isset($_POST['puestoPremio'])) ? $_POST['puestoPremio'] : '';
$descripcionPremio = (isset($_POST['descripcionPremio'])) ? $_POST['descripcionPremio'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO premio (nombrePremio,tipoPremio,puestoPremio,descripcionPremio,pukllay_idPukllay) VALUES('$nombrePremio','$tipoPremio','$puestoPremio','$descripcionPremio','$idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idPremio,nombrePremio,tipoPremio,puestoPremio,descripcionPremio FROM premio where pukllay_idPukllay='$idPukllay' ORDER BY idPremio DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE premio SET nombrePremio='$nombrePremio', tipoPremio='$tipoPremio', puestoPremio='$puestoPremio', descripcionPremio='$descripcionPremio' WHERE idPremio='$idPremio' and pukllay_idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idPremio,nombrePremio,tipoPremio,puestoPremio,descripcionPremio FROM premio where idPremio='$idPremio'and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM premio WHERE idPremio='$idPremio' and pukllay_idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>