<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$reporte = (isset($_POST['reporte'])) ? $_POST['reporte'] : '';
$pukllay = (isset($_POST['pukllay'])) ? $_POST['pukllay'] : '';

switch($reporte){
    case "comparsa": 
        if($pukllay==""){
            $consulta = "SELECT * FROM comparsa inner join delegado on delegado_dniDele=dniDele";
        } else {
            $consulta = "SELECT * FROM comparsa inner join delegado on delegado_dniDele=dniDele where usuario_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case "participante": 
        if($pukllay==""){
            $consulta = "SELECT * FROM participante inner join comparsa on comparsa_idComparsa=idComparsa inner join delegado on delegado_dniDele=dniDele";
        } else {
            $consulta = "SELECT * FROM participante inner join comparsa on comparsa_idComparsa=idComparsa inner join delegado on delegado_dniDele=dniDele where usuario_idPukllay='$pukllay'";    
        }     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;               
}


print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>