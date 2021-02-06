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
            <div class="" id="content">
                <section>
                    <div class="container">
                        <h1 class="font-weight-bold mb-0 py-3">Reportes de comparsas y participantes</h1>
                        <div class="row">
                        <div class="col-3">
                        <select id="listaReporte" class="form-control" name="listaUsuario">
                            <option value="0">Seleccionar reporte</option>
                            <option value="comparsa">Comparsas</option>
                            <option value="participante">Participantes</option>
                            <option value="ranking">Ranking</option>
                        </select>
                        </div>
                        <div class="col-3">
                        <select id="listaPuk" class="form-control" name="listaPuk">
                            <option value="0">Seleccionar Pukllay</option>
                            <?php
                            include_once 'bd/conexion.php';
                            $objeto = new Conexion();
                            $conexion = $objeto->Conectar();

                            $consulta = "SELECT idPukllay FROM pukllay";
                            $resultado = $conexion->prepare($consulta);
                            $resultado->execute();
                            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                            foreach($data as $dat) {
                            ?>    
                            <option value="<?php echo $dat['idPukllay'] ?>"><?php echo $dat['idPukllay'] ?></option>
                            <?php
                            }
                            $resultado = NULL;
                            $conexion = NULL;    
                            ?>
                        </select>
                        </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive pt-3">
                                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr id="headRow">

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
    <script src="js/jsfrcomparsas.js"></script>
</body>
</html>