<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$pukllay = (isset($_POST['pukllay'])) ? $_POST['pukllay'] : '';

switch($opcion){
    case 1: 
        if($pukllay==""){
            $consulta = "SELECT sum(contribucion) suma from (select sum(montoAuspiciador) contribucion from auspiciador union 
            select inversionPukllay from pukllay) as a";
        } else {
            $consulta = "SELECT sum(contribucion) suma from (select sum(montoAuspiciador) contribucion from auspiciador 
            where pukllay_idPukllay='$pukllay'
            union 
            select inversionPukllay from pukllay where idPukllay='$pukllay') as a";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        if($pukllay==""){
            $consulta = "SELECT sum(cantidadGasto) suma from gastopukllay";
        } else {
            $consulta = "SELECT sum(cantidadGasto) suma from gastopukllay where pukllay_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data1=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;          
}


print json_encode($data1, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>