<?php
include_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

if (isset($_POST['usuarioUsuario']) &&
    isset($_POST['nombDele']) &&
    isset($_POST['apelDele']) &&
    isset($_POST['coreDele']) &&
    isset($_POST['celuDele']) &&
    isset($_POST['idPukllay']))
{
    $usuarioUsuario = get_post($conexion, 'usuarioUsuario');
    $nombDele = get_post($conexion, 'nombDele');
    $apelDele = get_post($conexion, 'apelDele');
    $coreDele = get_post($conexion, 'coreDele');
    $celuDele = get_post($conexion, 'celuDele');
    // $pass = get_post($conexion, 'dnid');//password_hash(get_post($conexion,'dnid'), PASSWORD_DEFAULT);
    $idPukllay = get_post($conexion, 'idPukllay');
    $query = "INSERT INTO usuario (idPukllay,usuarioUsuario, paswUsuario,tipoUsuario,estadoUsuario) VALUES ('$idPukllay', '$usuarioUsuario', '$usuarioUsuario', 'delegado','activo')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";
    $query = "INSERT INTO delegado (dniDele,nombDele, apelDele,celuDele,coreDele,usuario_idPukllay,usuario_usuarioUsuario) VALUES ('$usuarioUsuario', '$nombDele', '$apelDele','$celuDele','$coreDele','$idPukllay','$usuarioUsuario')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";
}

if (isset($_POST['nombrec']) &&
    isset($_POST['procedencia']) &&
    isset($_POST['cantidad']) &&
    isset($_POST['categoria']) &&
    isset($_POST['dnic']))
{
    $nombrec = get_post($conexion, 'nombrec');
    $procedencia = get_post($conexion, 'procedencia');
    $cantidad = get_post($conexion, 'cantidad');
    $categoria = get_post($conexion, 'categoria');
    $dnic = get_post($conexion, 'dnic');
    $query = "INSERT INTO comparsa (nombreComp,Procedencia, Categoría,CantidadPart,delegado_dniDele) VALUES ('$nombrec', '$procedencia', '$categoria', '$cantidad','$dnic')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";
}

function get_post($con, $var)
{
    return $con->real_escape_string($_POST[$var]);
}

print json_encode($result, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion->close();

?>