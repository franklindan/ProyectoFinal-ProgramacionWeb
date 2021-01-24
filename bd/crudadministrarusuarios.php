<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO usuario (idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario) VALUES('2021','$usuario','$password','$tipo','$estado')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario FROM usuario where usuarioUsuario='$usuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "update usuario SET paswUsuario='$password', tipoUsuario='$tipo', estadoUsuario='$estado' WHERE usuarioUsuario='$usuario'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario FROM usuario where usuarioUsuario='$usuario'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM usuario WHERE usuarioUsuario='$usuario' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;