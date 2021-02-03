<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$usuarioUsuario = (isset($_POST['usuarioUsuario'])) ? $_POST['usuarioUsuario'] : '';
$paswUsuario = (isset($_POST['paswUsuario'])) ? $_POST['paswUsuario'] : '';
$tipoUsuario = (isset($_POST['tipoUsuario'])) ? $_POST['tipoUsuario'] : '';
$estadoUsuario = (isset($_POST['estadoUsuario'])) ? $_POST['estadoUsuario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$idPukllay = (isset($_POST['idPukllay'])) ? $_POST['idPukllay'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO usuario (idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario) VALUES('$idPukllay','$usuarioUsuario','$paswUsuario','$tipoUsuario','$estadoUsuario')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        if($tipoUsuario=="administrador"){
        $consulta = "INSERT INTO administrador (dniAdministrador,usuario_idPukllay,usuario_usuarioUsuario) VALUES('$usuarioUsuario','$idPukllay','$usuarioUsuario')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        }

        $consulta = "SELECT idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario FROM usuario where usuarioUsuario='$usuarioUsuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "update usuario SET paswUsuario='$paswUsuario', tipoUsuario='$tipoUsuario', estadoUsuario='$estadoUsuario' WHERE usuarioUsuario='$usuarioUsuario'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT idPukllay,usuarioUsuario,paswUsuario,tipoUsuario,estadoUsuario FROM usuario where usuarioUsuario='$usuarioUsuario'";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM usuario WHERE usuarioUsuario='$usuarioUsuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case 4: 
        $consulta = "SELECT * FROM usuario where idPukllay='$idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;          
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>