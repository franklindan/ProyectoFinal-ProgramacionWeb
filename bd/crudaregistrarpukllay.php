<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$idPukllay = (isset($_POST['idPukllay'])) ? $_POST['idPukllay'] : '';
$fechaInicioPukllay = (isset($_POST['fechaInicioPukllay'])) ? $_POST['fechaInicioPukllay'] : '';
$fechaFinPukllay = (isset($_POST['fechaFinPukllay'])) ? $_POST['fechaFinPukllay'] : '';
$edicionPukllay = (isset($_POST['edicionPukllay'])) ? $_POST['edicionPukllay'] : '';
$descripcionPukllay = (isset($_POST['descripcionPukllay'])) ? $_POST['descripcionPukllay'] : '';
$inversionPukllay = (isset($_POST['inversionPukllay'])) ? $_POST['inversionPukllay'] : '';
$nombrePukllay = (isset($_POST['nombrePukllay'])) ? $_POST['nombrePukllay'] : '';
$representantePukllay = (isset($_POST['representantePukllay'])) ? $_POST['representantePukllay'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO pukllay (idPukllay,nombrePukllay,representantePukllay) VALUES('$idPukllay','$nombrePukllay','$representantePukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idPukllay,nombrePukllay,representantePukllay FROM pukllay where idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE pukllay SET nombrePukllay='$nombrePukllay', representantePukllay='$representantePukllay' WHERE idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idPukllay,nombrePukllay,representantePukllay FROM pukllay where idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM pukllay WHERE idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 4: 
        $consulta = "UPDATE pukllay SET fechaInicioPukllay='$fechaInicioPukllay',fechaFinPukllay='$fechaFinPukllay',edicionPukllay='$edicionPukllay',descripcionPukllay='$descripcionPukllay',inversionPukllay='$inversionPukllay',nombrePukllay='$nombrePukllay', representantePukllay='$representantePukllay' WHERE idPukllay='$idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM pukllay where idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;                
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>