<?php
   
session_start();
if (!isset($_SESSION['usuario']))
{
    header("location:login.php");   
}

require_once 'conexiondatos.php';
$conexion=new mysqli($host,$user,$password,$database,$port);
if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

$dniJurado=$_SESSION['usuario'];    
$query = "SELECT * FROM jurado where dniJurado='$dniJurado'";
$result = $conexion->query($query);
if (!$result) die ("Falló el acceso a la base de datos");

$row = $result->fetch_array(MYSQLI_NUM);
$etapa_idPukllay = $row[6];

$result->close();
$conexion->close();


include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS 
$etapa_fechaDia = (isset($_POST['etapa_fechaDia'])) ? $_POST['etapa_fechaDia'] : '';
$comparsa_idComparsa = (isset($_POST['comparsa_idComparsa'])) ? $_POST['comparsa_idComparsa'] : '';
$puntajeCalificacion = (isset($_POST['puntajeCalificacion'])) ? $_POST['puntajeCalificacion'] : '';
$descripcionCalificacion = (isset($_POST['descripcionCalificacion'])) ? $_POST['descripcionCalificacion'] : '';
$lugarCalificacion = (isset($_POST['lugarCalificacion'])) ? $_POST['lugarCalificacion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

switch($opcion){
    case 1: 
        $consulta = "INSERT INTO calificacion (dniJurado,puntajeCalificacion,descripcionCalificacion,lugarCalificacion,etapa_idPukllay,etapa_fechaDia,comparsa_idComparsa) VALUES('$dniJurado','$puntajeCalificacion','$descripcionCalificacion','$lugarCalificacion','$etapa_idPukllay','$etapa_fechaDia','$comparsa_idComparsa')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT puntajeCalificacion,descripcionCalificacion,lugarCalificacion,idComparsa,nombreComp FROM calificacion INNER JOIN comparsa on comparsa_idComparsa=idComparsa where dniJurado='$dniJurado' and comparsa_idComparsa='$comparsa_idComparsa' and lugarCalificacion='$lugarCalificacion' and etapa_fechaDia='$etapa_fechaDia' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: 
        $consulta = "UPDATE calificacion SET puntajeCalificacion='$puntajeCalificacion', descripcionCalificacion='$descripcionCalificacion' WHERE dniJurado='$dniJurado' and comparsa_idComparsa='$comparsa_idComparsa' and lugarCalificacion='$lugarCalificacion' and etapa_fechaDia='$etapa_fechaDia' and etapa_idPukllay='$etapa_idPukllay'";	
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT puntajeCalificacion,descripcionCalificacion,lugarCalificacion,idComparsa,nombreComp FROM calificacion INNER JOIN comparsa on comparsa_idComparsa=idComparsa where dniJurado='$dniJurado' and comparsa_idComparsa='$comparsa_idComparsa' and lugarCalificacion='$lugarCalificacion' and etapa_fechaDia='$etapa_fechaDia' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3:
        $consulta = "DELETE FROM calificacion WHERE dniJurado='$dniJurado' and comparsa_idComparsa='$comparsa_idComparsa' and lugarCalificacion='$lugarCalificacion' and etapa_fechaDia='$etapa_fechaDia' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "select idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,
        lugarCalificacion from comparsa left join calificacion on idComparsa=comparsa_idComparsa and etapa_fechaDia='$etapa_fechaDia' where idComparsa='$comparsa_idComparsa' and dniJurado='$dniJurado' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   
    case 4: 
        $consulta = "select idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,
        lugarCalificacion from comparsa left join calificacion on idComparsa=comparsa_idComparsa and etapa_fechaDia='$etapa_fechaDia' and dniJurado='$dniJurado' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;   
    case 5: 
        $consulta = "select nombreComp,dniJurado,puntajeCalificacion,descripcionCalificacion,
        lugarCalificacion from comparsa inner join calificacion on idComparsa=comparsa_idComparsa and etapa_fechaDia='$etapa_fechaDia' and etapa_idPukllay='$etapa_idPukllay'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;                
}
print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
?>