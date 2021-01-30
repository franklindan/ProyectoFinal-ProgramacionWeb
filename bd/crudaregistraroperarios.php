<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$dniOper = (isset($_POST['dniOper'])) ? $_POST['dniOper'] : '';
$nombOper = (isset($_POST['nombOper'])) ? $_POST['nombOper'] : '';
$apelOper = (isset($_POST['apelOper'])) ? $_POST['apelOper'] : '';
$usuario_usuarioUsuario = (isset($_POST['usuario_usuarioUsuario'])) ? $_POST['usuario_usuarioUsuario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$usuario_idPukllay = (isset($_POST['usuario_idPukllay'])) ? $_POST['usuario_idPukllay'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO operario (dniOper,nombOper,apelOper,usuario_usuarioUsuario,usuario_idPukllay) VALUES('$dniOper','$nombOper','$apelOper','$usuario_usuarioUsuario','$usuario_idPukllay')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniOper,nombOper,apelOper,usuario_usuarioUsuario,usuario_idPukllay FROM operario where dniOper='$dniOper'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "update operario SET nombOper='$nombOper', apelOper='$apelOper' WHERE dniOper='$dniOper'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniOper,nombOper,apelOper,usuario_usuarioUsuario,usuario_idPukllay FROM operario where dniOper='$dniOper'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM operario WHERE dniOper='$dniOper'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;  
    case 4: 
        $consulta = "SELECT * FROM operario where usuario_idPukllay='$usuario_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;          
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>