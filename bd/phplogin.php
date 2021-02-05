<?php

require_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

// Recepción de los datos enviados mediante POST desde el JS 
$dnir = (isset($_POST['dnir'])) ? $_POST['dnir'] : '';
$correor = (isset($_POST['correor'])) ? $_POST['correor'] : '';

$query = "SELECT * from usuario where usuarioUsuario='$dnir'";
$result = $conexion->query($query);
if (!$result) die ("Falló el acceso a la base de datos");

$row = $result->fetch_array(MYSQLI_NUM);
$tipo = $row[3];
$contraseña = $row[2];

$result->close();
$conexion->close();


include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if($tipo=="administrador"){
    $consulta="SELECT * from $tipo where coreAdmi='$correor' and dniAdministrador='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$result) die ("Falló el acceso a la base de datos");
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        mail($correor,"Recuperación de contraseña",$contenido);
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}
if($tipo=="operario"){
    $consulta="SELECT * from $tipo where coreOper='$correor' and dniOper='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$result) die ("Falló el acceso a la base de datos");
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        mail($correor,"Recuperación de contraseña",$contenido);
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}
if($tipo=="jurado"){
    $consulta="SELECT * from $tipo where coreJurado='$correor' and dniJurado='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$result) die ("Falló el acceso a la base de datos");
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        mail($correor,"Recuperación de contraseña",$contenido);    
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}
if($tipo=="delegado"){
    $consulta="SELECT * from $tipo where coreDele='$correor' and dniDele='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$result) die ("Falló el acceso a la base de datos");
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        mail($correor,"Recuperación de contraseña",$contenido);    
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
}
if($tipo=="FinalIndirecto"){
    $consulta="SELECT * from $tipo where coreFinal='$correor' and dniFinal='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$result) die ("Falló el acceso a la base de datos");
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        mail($correor,"Recuperación de contraseña",$contenido);    
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>