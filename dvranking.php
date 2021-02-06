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
                <a href="dvcomentarios.php" class="d-block p-3 text-light"><i class="icon ion-md-eye mr-2 lead"></i>Visualizar puntaje acumulado</a>
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
                        <h1 class="font-weight-bold mb-0 py-3">Visualizar ranking de todas las comparsas</h1>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped table-bordered table-condensed" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <td>Puesto</td>
                                                <td>Nombre de la comparsa</td>
                                                <td>Puntaje total hasta el momento</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once 'bd/conexiondatos.php';
                                            $conexion=new mysqli($host,$user,$password,$database,$port);
                                            if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

                                            $query = "CREATE temporary table ranking (
                                                puesto int primary key AUTO_INCREMENT,
                                                nombre varchar(80),
                                                puntaje int(11));";
                                            $result = $conexion->query($query);
                                            // if (!$result) die ("Falló el acceso a la base de datos1 no crea la tabla temporal en el servidor");

                                            $query = "INSERT into ranking (nombre,puntaje) SELECT nombreComp,sum(puntajeCalificacion) Puntaje_total from calificacion inner join comparsa on 
                                            comparsa_idComparsa=idComparsa group by comparsa_idComparsa order by Puntaje_total desc;";
                                            $result = $conexion->query($query);
                                            // if (!$result) die ("Falló el acceso a la base de datos2");

                                            $query = "SELECT * from ranking;";
                                            $result = $conexion->query($query);
                                            // if (!$result) die ("Falló el acceso a la base de datos3");
                                            

                                            
                                            while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $data['puesto'] ?></td>
                                                <td><?php echo $data['nombre'] ?></td>
                                                <td><?php echo $data['puntaje'] ?></td>
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
</body>
</html>