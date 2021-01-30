<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$dniFinal = (isset($_POST['dniFinal'])) ? $_POST['dniFinal'] : '';
$nombreFinal = (isset($_POST['nombreFinal'])) ? $_POST['nombreFinal'] : '';
$apelFinal = (isset($_POST['apelFinal'])) ? $_POST['apelFinal'] : '';
$usuario_usuarioUsuario = (isset($_POST['usuario_usuarioUsuario'])) ? $_POST['usuario_usuarioUsuario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$usuario_idPukllay = (isset($_POST['usuario_idPukllay'])) ? $_POST['usuario_idPukllay'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO FinalIndirecto (dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,usuario_idPukllay) VALUES('$dniFinal','$nombreFinal','$apelFinal','$usuario_usuarioUsuario','$usuario_idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,usuario_idPukllay FROM FinalIndirecto where dniFinal='$dniFinal'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "update FinalIndirecto SET nombreFinal='$nombreFinal', apelFinal='$apelFinal' WHERE dniFinal='$dniFinal'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,usuario_idPukllay FROM FinalIndirecto where dniFinal='$dniFinal'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM FinalIndirecto WHERE dniFinal='$dniFinal'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case 4: 
        $consulta = "SELECT * FROM FinalIndirecto where usuario_idPukllay='$usuario_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;          
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>