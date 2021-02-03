<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021 | Delegado</title>
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
                <h4 class="text-light font-weight-bold">Pukllay 2021 | Delegado</h4>
            </div>
            <div class="menu">
                <a href="delegado.php" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i>Inicio</a>
                <a href="dregistrarparticipantes.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar participantes</a>
                <a href="dvpuntaje.php" class="d-block p-3 text-light"><i class="icon ion-md-eye mr-2 lead"></i>Visualizar puntaje</a>
                <a href="dvcomentarios.php" class="d-block p-3 text-light"><i class="icon ion-md-eye mr-2 lead"></i>Visualizar comentarios</a>
                <a href="dvranking.php" class="d-block p-3 text-light"><i class="icon ion-md-eye mr-2 lead"></i>Visualizar ranking</a>
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
                                    Delegado
                                </a>
                                <div class="dropdown-menu">
                                    <a href="delegado.php" class="dropdown-item">Inicio</a>
                                    <a href="delegadocuenta.php" class="dropdown-item">Cuenta</a>
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
                        <h1 class="font-weight-bold mb-0 py-2">Registrar participantes</h1>
                        <div class="pb-3">
                            <button id="btnNuevo" type="button" class="btn btn-success">Nuevo participante</button>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <td>dni</td>
                                                <td>Nombre</td>
                                                <td>Apellido</td>
                                                <td>Celular</td>
                                                <td>Correo</td>
                                                <td>acciones</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'bd/conexiondatos.php';
                                            $conexion=new mysqli($host,$user,$password,$database,$port);
                                            if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

                                            $dniDelegado=$_SESSION['usuario'];    
                                            $query = "SELECT * FROM comparsa where delegado_dniDele='$dniDelegado'";
                                            $result = $conexion->query($query);
                                            if (!$result) die ("Falló el acceso a la base de datos");
                                            
                                            $row = $result->fetch_array(MYSQLI_NUM);
                                            $idComparsa = $row[0];

                                            $query = "SELECT * FROM participante where comparsa_idComparsa='$idComparsa'";
                                            $result = $conexion->query($query);
                                            if (!$result) die ("Falló el acceso a la base de datos");
                                            
                                            while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['dniPart'] ?></td>
                                                <td><?php echo $data['nombPart'] ?></td>
                                                <td><?php echo $data['apelPart'] ?></td>
                                                <td><?php echo $data['celuPart'] ?></td>
                                                <td><?php echo $data['corePart'] ?></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            }
                                            $result->close();
                                            $conexion->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!--Modal-->
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tituloModal"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formModal" method="post">
                                <div class="modal-body">
                                    <div class="form-group dniH">
                                        <label for="dni" class="col-form-label">Dni:</label>
                                        <input type="text" class="form-control" id="dni">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido" class="col-form-label">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido">
                                    </div>
                                    <div class="form-group">
                                        <label for="celular" class="col-form-label">Celular:</label>
                                        <input type="text" class="form-control" id="celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="correo" class="col-form-label">Correo:</label>
                                        <input type="text" class="form-control" id="correo">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnBorrar" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar</button>
                                </div>
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
    <script src="js/jsdregistrarparticipantes.js"></script>
</body>

</html>
