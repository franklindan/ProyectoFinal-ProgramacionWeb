<?php

require_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

// Recepción de los datos enviados mediante POST desde el JS 


if (isset($_POST['dni'])&&
        isset($_POST['contraseña']))
    { 
        $user=mysql_entities_fix_string($conexion,get_post($conexion, 'dni'));
        $password=mysql_entities_fix_string($conexion,get_post($conexion, 'contraseña'));
        $query = "SELECT * FROM usuario WHERE usuarioUsuario='$user'";
        $result = $conexion->query($query);
        if (!$result) die ("Usurio no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();
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
                }
                if("delegado"==$row[3] and "activo"==$row[4]){
                    print json_encode($row, JSON_UNESCAPED_UNICODE);
                }
                if("final indirecto"==$row[3] and "activo"==$row[4]){
                    print json_encode($row, JSON_UNESCAPED_UNICODE);
                }
                if("jurado"==$row[3] and "activo"==$row[4]){
                    print json_encode($row, JSON_UNESCAPED_UNICODE);
                }
                if("operario"==$row[3] and "activo"==$row[4]){
                    print json_encode($row, JSON_UNESCAPED_UNICODE);
                }
            }
            else die("Usuario/password incorrecto");
        }
        else die("Usuario/password incorrecto");
        $conexion->close();
    }


    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
    }
    function mysql_fix_string($conexion, $string)
    {
        if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
    }
    function get_post($con, $var)
    {
        return $con->real_escape_string($_POST[$var]);
    }




if ( isset($_POST['dnir']) &&
    isset($_POST['correor'])) 
{

$dnir = $_POST['dnir'];
$correor = $_POST['correor'];

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

if("administrador"==$tipo){
    $consulta="SELECT * from administrador where coreAdmi='$correor' and dniAdministrador='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    if (!$resultado) die ("Falló el acceso a la base de datos");
    // if (!$resultado) die ($conexion->error);
    // if (!$resultado) {
    //     exit(1);
    // }
    // if (!$resultado) {
    //     die;
    // }
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña."";
        $header = "From: noreply@example.com" . "\r\n";
		$header.= "Reply-to: noreply@example.com" . "\r\n";
		$header.= "X-Mailer: PHP/" . phpversion();
        mail($correor,"Recuperación de contraseña",$contenido,$header);
    }
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    
    

    }
if("operario"==$tipo){
    $consulta="SELECT * from operario where coreOper='$correor' and dniOper='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if (!$resultado) die ("Falló el acceso a la base de datos");
    // if (!$resultado) die ($conexion->error);
    // if (!$resultado) {
    //     exit(1);
    // }
    // if (!$resultado) {
    //     die;
    // }
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        $header = "From: noreply@example.com" . "\r\n";
		$header.= "Reply-to: noreply@example.com" . "\r\n";
		$header.= "X-Mailer: PHP/" . phpversion();
        mail($correor,"Recuperación de contraseña",$contenido,$header);
    }
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    

}
if("jurado"==$tipo){
    $consulta="SELECT * from jurado where coreJurado='$correor' and dniJurado='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if (!$resultado) die ("Falló el acceso a la base de datos");
    // if (!$resultado) die ($conexion->error);
    // if (!$resultado) {
    //     exit(1);
    // }
    // if (!$resultado) {
    //     die;
    // }
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        $header = "From: noreply@example.com" . "\r\n";
		$header.= "Reply-to: noreply@example.com" . "\r\n";
		$header.= "X-Mailer: PHP/" . phpversion();
        mail($correor,"Recuperación de contraseña",$contenido,$header);    
    }
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    

}
if("delegado"==$tipo){
    $consulta="SELECT * from delegado where coreDele='$correor' and dniDele='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if (!$resultado) die ("Falló el acceso a la base de datos");
    // if (!$resultado) die ($conexion->error);
    // if (!$resultado) {
    //     exit(1);
    // }
    // if (!$resultado) {
    //     die;
    // }
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        $header = "From: noreply@example.com" . "\r\n";
		$header.= "Reply-to: noreply@example.com" . "\r\n";
		$header.= "X-Mailer: PHP/" . phpversion();
        mail($correor,"Recuperación de contraseña",$contenido,$header);    
    }
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    
}
if("final indirecto"==$tipo){
    $consulta="SELECT * from finalindirecto where coreFinal='$correor' and dniFinal='$dnir'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    if (!$resultado) die ("Falló el acceso a la base de datos");
    // if (!$resultado) die ($conexion->error);
    // if (!$resultado) {
    //     exit(1);
    // }
    // if (!$resultado) {
    //     die;
    // }
    if ($resultado){
        $contenido="Estimado usuario ".$dnir." su contraseña es:".$contraseña;
        $header = "From: noreply@example.com" . "\r\n";
		$header.= "Reply-to: noreply@example.com" . "\r\n";
		$header.= "X-Mailer: PHP/" . phpversion();
        mail($correor,"Recuperación de contraseña",$contenido,$header);    
    }
    print json_encode($data, JSON_UNESCAPED_UNICODE);
    

}

}

$conexion = NULL;
?>