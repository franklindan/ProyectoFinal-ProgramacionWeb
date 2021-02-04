<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021 | Jurado</title>
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
                <h4 class="text-light font-weight-bold">Pukllay 2021 | Jurado</h4>
            </div>
            <div class="menu">
                <a href="jurado.php" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i>Inicio</a>
                <a href="juradorcalificaciones.php" class="d-block p-3 text-light"><i class="icon ion-md-checkbox-outline mr-2 lead"></i>Registrar calificaciones</a>
                <a href="juradovcalificaciones.php" class="d-block p-3 text-light"><i class="icon ion-md-eye mr-2 lead"></i>Visualizar calificaciones</a>
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
                            Jurado
                        </a>
                            <div class="dropdown-menu">
                                <a href="jurado.php" class="dropdown-item">Inicio</a>
                                <a href="juradocuenta.php" class="dropdown-item">Cuenta</a>
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
                        <h1 class="font-weight-bold mb-0 py-2">Registrar calificaciones</h1>
                        <div class="row pb-2">
                           <div class="col-lg-4">
                                <select id="listaPuk" class="form-control" name="listaPuk">
                                    <option value="0">Seleccionar etapa</option>
                                    <?php
                                    include_once 'bd/conexion.php';
                                    $objeto = new Conexion();
                                    $conexion = $objeto->Conectar();

                                    $idPukllay=$_SESSION['idPukllay'];

                                    $consulta = "SELECT * FROM etapa where idPukllay='$idPukllay'";
                                    $resultado = $conexion->prepare($consulta);
                                    $resultado->execute();
                                    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($data as $dat) {
                                    ?>    
                                    <option value="<?php echo $dat['fechaDia'] ?>"><?php echo $dat['nombreDia'] ?></option>
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
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <td>idComparsa</td>
                                                <td>Comparsa</td>
                                                <td>Calificación</td>
                                                <td>Comentario</td>
                                                <td>Lugar</td>
                                                <td>acciones</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                            
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
                                <div class="form-group">
                                    <label for="calificacion" class="col-form-label">Calificación:</label>
                                    <input type="text" class="form-control" id="calificacion">
                                    </div>            
                                    <div class="form-group">
                                    <label for="comentario" class="col-form-label">Comentario:</label>
                                    <input type="text" class="form-control" id="comentario">
                                    </div>
                                    <div class="form-group lugar-c">
                                    <label for="lugar" class="col-form-label">Lugar de calificación:</label>
                                    <input type="text" class="form-control" id="lugar">
                                </div>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnBorrar"class="btn btn-dark" data-dismiss="modal">Cancelar</button>
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
    <script src="js/jsjuradorcalificaciones.js"></script>
</body>
</html>