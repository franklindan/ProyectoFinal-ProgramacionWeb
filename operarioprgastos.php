<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021 | Operario</title>
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
                <h4 class="text-light font-weight-bold">Pukllay 2021 | Operario</h4>
            </div>
            <div class="menu">
                <ul class="navbar navbar-inverse">
                    <li><a href="operario.php" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i>Inicio</a></li>
                    <li class="dropdown">
                        <a href="#a" class="d-block p-3 text-light dropdown-toggle" data-toggle="dropdown">
                            <i class="icon ion-md-add mr-2 lead"></i>Registrar pukllay
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft" role="menu">
                            <li><a href="operarioprpukllay.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar nuevo pukllay</a></li>
                            <li><a href="operarioprorganizadores.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar organizadores</a></li>
                            <li><a href="operarioprauspiciadores.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar auspiciadores</a></li>
                            <li><a href="operariopretapas.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar etapas</a></li>
                            <li><a href="operarioprgastos.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar gastos</a></li>
                            <li><a href="operarioprpremios.php" class="d-block p-3 text-dark dropdown-item"><i class="icon ion-md-add-circle mr-2 lead"></i>Registrar premios</a></li>
                        </ul>  
                    </li>    
                    <li><a href="operariorjurados.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar jurados</a></li>
                    <li><a href="operariordelegados.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar delegados</a></li>
                    <li><a href="operariorcomparsas.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar comparsas</a></li>
                    <li><a href="operariorparticipantes.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar participantes</a></li> 
                </ul>
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
                            Operario
                        </a>
                            <div class="dropdown-menu">
                                <a href="operario.php" class="dropdown-item">Inicio</a>
                                <a href="operariocuenta.php" class="dropdown-item">Cuenta</a>
                                <a href="bd/cerrarsesion.php" class="dropdown-item">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            
            <!--Contenido-->
            <div class="" id="content">
                
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
    <script src="js/jsadministrarusuarios.js"></script>
    
</body>
</html>