<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$pukllay = (isset($_POST['pukllay'])) ? $_POST['pukllay'] : '';

if($pukllay==""){
    $consulta = "SELECT * FROM jurado";
} else {
    $consulta = "SELECT * FROM jurado where usuario_idPukllay='$pukllay'";    
}
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);          



print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>