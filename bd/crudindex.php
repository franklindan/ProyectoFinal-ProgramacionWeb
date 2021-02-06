<?php
include_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

if (isset($_POST['usuarioUsuario']) &&
    isset($_POST['nombDele']) &&
    isset($_POST['apelDele']) &&
    isset($_POST['coreDele']) &&
    isset($_POST['pswUsuario']) &&
    isset($_POST['idPukllay']))
{
    $usuarioUsuario = get_post($conexion, 'usuarioUsuario');
    $nombDele = get_post($conexion, 'nombDele');
    $apelDele = get_post($conexion, 'apelDele');
    $coreDele = get_post($conexion, 'coreDele');
    $pswUsuario = get_post($conexion, 'pswUsuario');
    // $pass = get_post($conexion, 'dnid');//password_hash(get_post($conexion,'dnid'), PASSWORD_DEFAULT);
    $idPukllay = get_post($conexion, 'idPukllay');
    $query = "INSERT INTO usuario (idPukllay,usuarioUsuario, paswUsuario,tipoUsuario,estadoUsuario) VALUES ('$idPukllay', '$usuarioUsuario', '$pswUsuario', 'delegado','activo')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";
    $query = "INSERT INTO delegado (dniDele,nombDele, apelDele,coreDele,usuario_idPukllay,usuario_usuarioUsuario) VALUES ('$usuarioUsuario', '$nombDele', '$apelDele','$coreDele','$idPukllay','$usuarioUsuario')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";

    print json_encode($result, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
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
    $query = "INSERT INTO comparsa (nombreComp,Procedencia, Categoria,CantidadPart,delegado_dniDele) VALUES ('$nombrec', '$procedencia', '$categoria', '$cantidad','$dnic')";
    $result = $conexion->query($query);
    if (!$result) echo "INSERT falló <br><br>";

    print json_encode($result, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
}

function get_post($con, $var)
{
    return $con->real_escape_string($_POST[$var]);
}


if (isset($_POST['dni']) &&
    isset($_POST['contraseña']))
{ 
    $user = get_post($conexion, 'dni');
    $password = get_post($conexion, 'contraseña');
    $query = "SELECT * FROM usuario WHERE usuarioUsuario='$user' and paswUsuario='$password'";
    $result = $conexion->query($query);
    if (!$result) die ("Usurio no encontrado");
    else if ($result->num_rows)
    {
        $row = $result->fetch_array(MYSQLI_NUM);
        //if (password_verify($password, $row[2])){
        if ($password==$row[2]){    
            session_start();
            $_SESSION['usuario']=$_POST['dni'];
            $_SESSION['contraseña']=$_POST['contraseña'];
            $_SESSION['idPukllay']=$row[0];
            $_SESSION['tipo']=$row[3];
            $_SESSION['estado']=$row[4];
            if("administrador"==$row[3] and "activo"==$row[4]){
                print json_encode($row, JSON_UNESCAPED_UNICODE);
                // header('location:administrador.php');
            }
            if("delegado"==$row[3] and "activo"==$row[4]){
                print json_encode($row, JSON_UNESCAPED_UNICODE);
                // header('location:../delegado.php');
            }
            if("final indirecto"==$row[3] and "activo"==$row[4]){
                print json_encode($row, JSON_UNESCAPED_UNICODE);
                // header('location:finalindirecto.php');
            }
            if("jurado"==$row[3] and "activo"==$row[4]){
                print json_encode($row, JSON_UNESCAPED_UNICODE);
                // header('location:jurado.php');
            }
            if("operario"==$row[3] and "activo"==$row[4]){
                print json_encode($row, JSON_UNESCAPED_UNICODE);
                // header('location:operario.php');
            }
        }
        $result->close();
        // else die("Usuario/password incorrecto");
    }
    // else die("Usuario/password incorrecto");
}

$conexion->close();

?>