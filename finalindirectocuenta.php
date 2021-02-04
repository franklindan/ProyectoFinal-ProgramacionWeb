<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021 | Final indirecto</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="DataTables/datatables.min.css">
    <link rel="stylesheet" href="DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/font.css">
</head>

<body>

    <?php
    
    session_start();
    if (!isset($_SESSION['usuario']))
    {
        header("location:login.php");   
    }

    ?>

    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold">Pukllay 2021 | Final indirecto</h4>
            </div>
            <div class="menu">
                <a href="finalindirecto.php" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i>Inicio</a>
                <a href="frpukllay.php" class="d-block p-3 text-light"><i class="icon ion-md-clipboard mr-2 lead"></i>Reportes del pukllay</a>
                <a href="frjurados.php" class="d-block p-3 text-light"><i class="icon ion-md-clipboard mr-2 lead"></i>Reportes de jurados</a>
                <a href="frcomparsas.php" class="d-block p-3 text-light"><i class="icon ion-md-clipboard mr-2 lead"></i>Reportes de comparsas y participantes</a>
            </div>
        </div>
        <div class="w-100">
            <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
                <div class="container">
                <button class="btn-group-toggle" type="button" data-toggle="collapse" data-target="#sidebar-container">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div>
                    <ul class="navbar-nav ml-auto">
                       <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="img/user.png" alt="" class="img-fluid rounded-circle mr-2 avatar">
                            Final indirecto
                        </a>
                            <div class="dropdown-menu">
                                <a href="finalindirecto.php" class="dropdown-item">Inicio</a>
                                <a href="finalindirectocuenta.php" class="dropdown-item">Cuenta</a>
                                <a href="bd/cerrarsesion.php" class="dropdown-item">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            
            <!--Contenido-->
            <div class="container" id="content">
                <div class="container">
                    <h2 class="p-3 text-center font-weight-bold mb-0">Configuración de cuenta de usuario</h2>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="p-2 text-mute">Datos de usuario</h4>
                            <form id="formUsuario">
                            <?php
                            require_once 'bd/conexiondatos.php';
                            $conexion=new mysqli($host,$user,$password,$database,$port);
                            if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

                            $dniUsuario=$_SESSION['usuario'];   

                            $query = "SELECT * FROM FinalIndirecto where dniFinal='$dniUsuario'";
                            $result = $conexion->query($query);
                            if (!$result) die ("Falló el acceso a la base de datos");

                            $row = $result->fetch_array(MYSQLI_NUM);
                            $result->close();
                            
                            ?>
                                <input id="nombre" type="text" class="form-group form-control" placeholder="Nombre" value="<?php echo $row[1]; ?>">
                                <input id="apellido" type="text" class="form-group form-control" placeholder="Apellido" value="<?php echo $row[2]; ?>">
                                <input id="celular" type="text" class="form-group form-control" placeholder="Celuar" value="<?php echo $row[3]; ?>">
                                <input id="Correo" type="text" class="form-group form-control" placeholder="Correo electrónico" value="<?php echo $row[4]; ?>">
                                <input id="dirrecion" type="text" class="form-group form-control" placeholder="Domicilio" value="<?php echo $row[5]; ?>">
                                <button class="btn btn-primary btnUsuario">Guardar</button>
                            <?php
                            $conexion->close();
                            ?>    
                            </form>
                        </div>
                        <div class="col-6">
                            <h4 class="p-2 text-mute">Actualizar contraseña</h4>
                            <form id="formContraseña">
                                <input id="contraseña" type="password" class="form-control form-group" placeholder="Contraseña">
                                <input id="nuevaContraseña" type="password" class="form-control form-group" placeholder="Nueva contraseña">
                                <button class="btn btn-primary btnContraseña">Actualizar contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>




    
<!--
   <footer class="">
        <p class="">&copy; 2021 Titulo | Todos los derechos reservados</p>  
   </footer>
-->


    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/jsfinalindirectocuenta.js"></script>
</body>
</html>