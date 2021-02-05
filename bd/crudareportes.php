<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$pukllay = (isset($_POST['pukllay'])) ? $_POST['pukllay'] : '';

switch($usuario){
    case "administrador": 
        if($pukllay==""){
            $consulta = "SELECT * FROM administrador";
        } else {
            $consulta = "SELECT * FROM administrador where usuario_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case "jurado": 
        if($pukllay==""){
            $consulta = "SELECT * FROM jurado";
        } else {
            $consulta = "SELECT * FROM jurado where usuario_idPukllay='$pukllay'";    
        }     
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case "delegado":
        if($pukllay==""){
            $consulta = "SELECT * FROM delegado";
        } else {
            $consulta = "SELECT * FROM delegado where usuario_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case "operario": 
        if($pukllay==""){
            $consulta = "SELECT * FROM operario";
        } else {
            $consulta = "SELECT * FROM operario where usuario_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;    
    case "FinalIndirecto": 
        if($pukllay==""){
            $consulta = "SELECT * FROM FinalIndirecto";
        } else {
            $consulta = "SELECT * FROM FinalIndirecto where usuario_idPukllay='$pukllay'";    
        }
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;            
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>