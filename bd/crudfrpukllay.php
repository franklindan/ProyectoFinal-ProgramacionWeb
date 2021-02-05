<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$reporte = (isset($_POST['reporte'])) ? $_POST['reporte'] : '';
$pukllay = (isset($_POST['pukllay'])) ? $_POST['pukllay'] : '';

switch($reporte){
    case "organizador": 
        if($pukllay==""){
            $consulta = "SELECT * FROM organizador";
        } else {
            $consulta = "SELECT * FROM organizador where idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case "auspiciador": 
        if($pukllay==""){
            $consulta = "SELECT * FROM auspiciador";
        } else {
            $consulta = "SELECT * FROM auspiciador where pukllay_idPukllay='$pukllay'";    
        }     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case "gastopukllay":
        if($pukllay==""){
            $consulta = "SELECT * FROM gastopukllay";
        } else {
            $consulta = "SELECT * FROM gastopukllay where pukllay_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case "ingresopukllay": 
        if($pukllay==""){
            $consulta = "SELECT nombreAuspiciador,montoAuspiciador,pukllay_idPukllay from auspiciador
            union 
            select nombrePukllay,inversionPukllay,idPukllay from pukllay;";
        } else {
            $consulta = "SELECT nombreAuspiciador,montoAuspiciador,pukllay_idPukllay from auspiciador 
            where pukllay_idPukllay='$pukllay'
            union 
            select nombrePukllay,inversionPukllay,idPukllay from pukllay where idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case "excedente": 
        if($pukllay==""){
            $consulta = "SELECT (a-b) excedente from (select sum(contribucion) a from (select sum(montoAuspiciador) contribucion from auspiciador
            union 
            select inversionPukllay from pukllay) as x) as q 
            join
            (select sum(cantidadGasto) b from gastopukllay) as w";
        } else {
            $consulta = "SELECT (a-b) excedente from (select sum(contribucion) a from (select sum(montoAuspiciador) contribucion from auspiciador 
            where pukllay_idPukllay='$pukllay'
            union 
            select inversionPukllay from pukllay where idPukllay='$pukllay') as x) as q 
            join
            (select sum(cantidadGasto) b from gastopukllay where pukllay_idPukllay='$pukllay') as w";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;               
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>