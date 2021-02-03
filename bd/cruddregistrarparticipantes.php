<?php
   
session_start();
if (!isset($_SESSION['usuario']))
{
    header("location:login.php");   
}

require_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

$dniDelegado=$_SESSION['usuario'];    
$query = "SELECT * FROM comparsa where delegado_dniDele='$dniDelegado'";
$result = $conexion->query($query);
if (!$result) die ("Falló el acceso a la base de datos");

$row = $result->fetch_array(MYSQLI_NUM);
$comparsa_idComparsa = $row[0];

$result->close();
$conexion->close();


include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$dniPart = (isset($_POST['dniPart'])) ? $_POST['dniPart'] : '';
$nombPart = (isset($_POST['nombPart'])) ? $_POST['nombPart'] : '';
$apelPart = (isset($_POST['apelPart'])) ? $_POST['apelPart'] : '';
$celuPart = (isset($_POST['celuPart'])) ? $_POST['celuPart'] : '';
$corePart = (isset($_POST['corePart'])) ? $_POST['corePart'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO participante (dniPart,nombPart,apelPart,celuPart,corePart,comparsa_idComparsa) VALUES('$dniPart','$nombPart','$apelPart','$celuPart','$corePart','$comparsa_idComparsa')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT dniPart,nombPart,apelPart,celuPart,corePart,comparsa_idComparsa FROM participante where dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE participante SET nombPart='$nombPart', apelPart='$apelPart', celuPart='$celuPart', corePart='$corePart' WHERE dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT dniPart,nombPart,apelPart,celuPart,corePart,comparsa_idComparsa FROM participante where dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM participante WHERE dniPart='$dniPart' and comparsa_idComparsa='$comparsa_idComparsa'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;           
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>