<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021 | Administrador</title>
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
                <h4 class="text-light font-weight-bold">Pukllay 2021 | Administrador</h4>
            </div>
            <div class="menu">
                <a href="administrador.php" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i>Inicio</a>
                <a href="aregistrarpukllay.php" class="d-block p-3 text-light"><i class="icon ion-md-add mr-2 lead"></i>Registrar nuevo Pukllay</a>
                <a href="administrarusuarios.php" class="d-block p-3 text-light"><i class="icon ion-md-settings mr-2 lead"></i>Administrar usuarios</a>
                <a href="aregistraroperarios.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar operarios</a>
                <a href="aregistrarusuariofinal.php" class="d-block p-3 text-light"><i class="icon ion-md-person-add mr-2 lead"></i>Registrar usuario final indirecto</a>
                <a href="areportes.php" class="d-block p-3 text-light"><i class="icon ion-md-clipboard mr-2 lead"></i>Reportes</a>
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
                            Administrador
                        </a>
                            <div class="dropdown-menu">
                                <a href="administrador.php" class="dropdown-item">Inicio</a>
                                <a href="administradorcuenta.php" class="dropdown-item">Cuenta</a>
                                <a href="bd/cerrarsesion.php" class="dropdown-item">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
            
            <!--Contenido-->
            <div class="container" id="content">
                <section>
                    <div class="container">
                        <h1 class="font-weight-bold mb-0">Bienvenido al Sistema de gestión del evento Pukllay</h1>
                        <p class="lead text-muted">Administrador:</p>
                        <p class="text-justify">Se le da la bienvenida al sistema esperando que pueda realizar su labor exitosamente. Recuerde haber leido y revizado el correo que se lenvio a su correo que brindo para obtener el acceso al sistema. Se le vuelve a recalcalcar que el uso del usuario y contraseña es de uso personal e intransferrible. Comunicarse con los administradores ante cualquier inconveniente o escribir al correo que se le envio para su acceso al sistema.</p>
                        <p class="lead text-muted">Acerca del sistema:</p>
                        <p class="text-justify">El sistema de gestión del evento Pukllay consiste en facilitar el funcionamiento y gestión del evento carnavalesco electrónicamente mediante un aplicativo web. El Pukllay, es un carnaval originario y considerado el más grande del sur del Perú celebrado para expresar la cultura ancestral que ha perdurado desde el 2003 hasta el presente año. Se lleva a cabo a inicios del mes de marzo, en la ciudad de Andahuaylas y es conocida también como el carnaval originario del Perú que reúne a un promedio de más de 50 comunidades campesinas, distritos, provincias de toda la región de Apurímac; además, de los departamentos del Perú y otros países invitados a participar en este evento. La necesidad de automatizar los procesos de dicho evento surge cuando dicho evento comienza a crecer y evolucionar. En donde el registro de las comparsas y participantes aún se realiza manualmente en hojas de papel para luego ser almacenadas en una base de datos, donde muchos participantes que escucharon del evento y desean participar no tienen la facilidad de informarse más y registrarse en dicho evento, la demora en saber los puntajes de las comparsas en cada etapa. Problemas que podrían ser solucionados perfectamente con un aplicativo web. Por ello se propone la automatización de los procesos de registro de comparsas, calificación de los jurados en un aplicativo web, visualización de las calificaciones y puntajes de las comparsas en tiempo real, administración y gestión del evento Pukllay. La automatización de dichos procesos facilitara el correcto funcionamiento del evento y solucionara los diversos problemas.</p> 
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
    <script src="DataTables/datatables.min.js"></script>
</body>
</html>