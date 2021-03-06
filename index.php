<?php
// require_once 'bd/conexiondatos.php';
// $conexion=new mysqli($host,$user,$password,$database,$port);
// if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

// $data;
// if (isset($_POST['dni'])&&
//     isset($_POST['contraseña']))
// { 
//     $user=mysql_entities_fix_string($conexion,get_post($conexion, 'dni'));
//     $password=mysql_entities_fix_string($conexion,get_post($conexion, 'contraseña'));
//     $query = "SELECT * FROM usuario WHERE usuarioUsuario='$user' and paswUsuario='$password'";
//     $result = $conexion->query($query);
//     if (!$result) die ("Usurio no encontrado");
//     elseif ($result->num_rows)
//     {
//         $row = $result->fetch_array(MYSQLI_NUM);
//         $data=$row;
//         //if (password_verify($password, $row[2])){
//         if ($password==$row[2]){    
//             session_start();
//             $_SESSION['usuario']=$_POST['dni'];
//             $_SESSION['contraseña']=$_POST['contraseña'];
//             $_SESSION['idPukllay']=$row[0];
//             $_SESSION['tipo']=$row[3];
//             $_SESSION['estado']=$row[4];
//             if("administrador"==$row[3] and "activo"==$row[4]){
//                 header('location:administrador.php');
//                 print json_encode($data, JSON_UNESCAPED_UNICODE);
//             }
//             if("delegado"==$row[3] and "activo"==$row[4]){
//                 header('location:delegado.php');
//                 print json_encode($data, JSON_UNESCAPED_UNICODE);
//             }
//             if("final indirecto"==$row[3] and "activo"==$row[4]){
//                 header('location:finalindirecto.php');
//                 print json_encode($data, JSON_UNESCAPED_UNICODE);
//             }
//             if("jurado"==$row[3] and "activo"==$row[4]){
//                 header('location:jurado.php');
//                 print json_encode($data, JSON_UNESCAPED_UNICODE);
//             }
//             if("operario"==$row[3] and "activo"==$row[4]){
//                 header('location:operario.php');
//                 print json_encode($data, JSON_UNESCAPED_UNICODE);
//             }
//         }
//         $result->close();
//         // else die("Usuario/password incorrecto");
//     }
//     // else die("Usuario/password incorrecto");
// }

// $conexion->close();
// function mysql_entities_fix_string($conexion, $string)
// {
//     return htmlentities(mysql_fix_string($conexion, $string));
// }
// function mysql_fix_string($conexion, $string)
// {
//     if (get_magic_quotes_gpc()) $string = stripslashes($string);
//     return $conexion->real_escape_string($string);
// }
// function get_post($con, $var)
// {
//     return $con->real_escape_string($_POST[$var]);
// }


?>

<!DOCTYPE html>
<html lang="es">
    
<head>

    <meta charset="UTF-8">
    <title>Pukllay 2021</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font.css">

</head>

<body>

    <!-- NAVEGACIÓN -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top ">
        <div class="container">
            <a href="index.php" class="navbar-brand font-weight-bold">
                PUKLLAY <?php $idPukllay=2021;echo $idPukllay;?> 
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="#inicio" class="nav-link badge-dark text-light">Inicio</a></li>
                    <li class="nav-item"><a href="#historia" class="nav-link badge-dark text-light">Historia</a></li>
                    <li class="nav-item"><a href="#eventos" class="nav-link badge-dark text-light">Eventos</a></li>
                    <li class="nav-item"><a href="#jurados" class="nav-link badge-dark text-light">Jurados</a></li>
                    <li class="nav-item"><a href="#registrar" class="nav-link badge-dark text-light">Registrar</a></li>
                    <li class="nav-item"><a href="#ranking" class="nav-link badge-dark text-light">Ranking</a></li>
                    <li class="nav-item dropdown">
                        <a href="login.php" class="nav-link dropdown-toggle badge-dark text-light" data-toggle="dropdown">Accesos</a>
                            <div class="dropdown-menu badge-success">
                                <a href="login.php" class="dropdown-item badge-dark text-light">Administrador</a>
                                <a href="login.php" class="dropdown-item badge-dark text-light">Usuario final indirecto</a>
                                <a href="login.php" class="dropdown-item badge-dark text-light">Operario</a>
                                <a href="login.php" class="dropdown-item badge-dark text-light">Jurado</a>
                                <a href="login.php" class="dropdown-item badge-dark text-light">Delegado</a>
                            </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- INICIO -->
    <header id="inicio">
        <div class="dark-overlay">
            <div class="home-inner">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-md-8 col-lg-8">
                            <h1 class="display-4 letraT text-capitalize font-weight-bold">XX Encuentro nacional del carnaval originario del Perú: Pukllay 2021</h1>
                            <ul>
                            <div class="d-none d-md-flex flex-row">
                               
                                <div class="p-2 mt-4 letra">
                                    
                                        <li>
                                            <h5>Visitanos a andahuaylas y vive la magia del carnaval los dias 27 , 28 y 29 de marzo.</h5>
                                        </li>
                                    
                                </div>
                            </div>
                            <div class="d-none d-md-flex flex-row">
                                <div class="p-2 letra">
                                    
                                        <li>
                                            <h5>Inscribe a tu comparsa en un click y visualiza tus calificaciones y horarios online.</h5>
                                        </li>
                                   
                                </div>
                            </div>
                            <div class="d-none d-md-flex flex-row">
                                <div class="p-2 letra">
                                    
                                        <li>
                                            <h5>La plataforma brinda la calificación de los jurados en tiempo real.</h5>
                                        </li>
                                  
                                </div>
                            </div>
                            </ul>
                        </div>

                        <div class="col-12 col-md-4 col-lg-4">
                            <div class="card text-center bg-success">
                                <div class="card-body">
                                    <h3>Inicia sesión:</h3>
                                    <p class="d-none d-md-flex flex-row">Si eres delegado de comparsa puedes iniciar sesión y ver tus calificaciones</p>
                                    <form id="form1">
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="number" min="10000000" max="99999999" placeholder="DNI" required id="form1d">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-lg" type="password" placeholder="Contraseña" required id="form1c">
                                        </div>
                                        <button class="btn btn-outline-light btn-block" type="submit" id="form1b">Iniciar sesión</button> 
                                        <!-- <input id="form1b" type="submit" class="btn btn-outline-light btn-block" value="Iniciar sesión"> -->
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- HISTORIA -->
    <section>
        <div class="container">
            
                <div class="text-center p-5">
                    <h2 class="display-4 text-center">¿QUE ES PUKLLAY?</h2>
                    <p class="lead text-justify">Es un evento que representa la diversidad de danzas y músicas, así como las típicas costumbres de las comunidades campesinas del territorio apurimeño y del todo el Perú. Por su traducción del quechua significa "juega" ,donde participan y se divierten comparsas de los ámbitos rural y urbano de Andahuaylas, delegaciones regionales y delegaciones internacionales.</p>
                    <button type="button" class="btn btn-outline-secondary text-white btnRe">Inscribir comparsa</button>
                </div>
            
        </div>
    </section>

    <section class="bg-light text-muted py-5" id="historia">
        <div class="container">
            <div class="row">
               
                <div class="col-md-6">


                    <div class="carousel slide" data-ride="carousel" id="slider">

                        <!-- CAROUSEL INDICADORES-->
                        <ul class="carousel-indicators">
                            <li data-target="slider" data-slide-to="0"></li>
                            <li data-target="slider" data-slide-to="1"></li>
                            <li data-target="slider" data-slide-to="2"></li>
                        </ul>


                        <!-- IMAGENES -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img src="img/banner.jpg" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>Pukllay</h3>
                                    <p>Imagen 1</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="img/banner00.jpg" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>Pukllay</h3>
                                    <p>Imagen 2</p>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="img/banner000.jpg" class="img-fluid">
                                <div class="carousel-caption">
                                    <h3>Pukllay</h3>
                                    <p>Imagen 3</p>
                                </div>
                            </div>
                        </div>

                        <!-- CONTROLES -->
                        <a href="#slider" class="carousel-control-prev" data-slide="prev"> <span class="carousel-control-prev-icon"></span> Previus</a>

                        <a href="#slider" class="carousel-control-next" data-slide="next"> <span class="carousel-control-next-icon"></span> Next</a>
                    </div>
                    <!--
                    <div class="card">
                        <img src="img/historia.jpg" alt="">
                    </div> -->

                </div>
                <div class="col-md-6">
                    <h3 class="text-center">HISTORIA DEL PUKLLAY</h3>
                    <p class="text-justify">Se inicia en el año 2003, en mérito al proyecto presentado por el escritor, músico y folklorista Isaac Vivanco Tarco, con el fin promover la identidad cultural Chanka.</p>
                    <p class="text-justify">El Pukllay, es un carnaval originario y considerado el más grande del sur del Perú celebrado para expresar a la cultura ancestral que ha perdurado en el tiempo cada año. El Pukllay se lleva a cabo a inicios del mes de marzo, en la ciudad de Andahuaylas y es conocida también como el carnaval originario del Perú y reúne a un promedio de más de 50 comunidades campesinas, distritos, provincias de toda la región de Apurímac; además, de los departamentos del Perú y otros países invitados a participar en el Pukllay. Para el Carnaval Pukllay se organiza un colosal pasacalle, donde desfilan las delegaciones regionales y también las comparsas de los ámbitos rural y urbano de Andahuaylas.</p>
                    <h5>Etapas del pukllay:</h5>
                    <ul>
                        <li>ATIPANACUY</li>
                        <li>PASACALLE</li>
                        <li>TINKUY “ENCUENTRO DE COMPARSAS”</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- EVENTOS -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="text-center p-5">
                    <h2 class="display-4">Participa en los enventos del Pukllay</h2>
                    <p class="lead text-justify">No te pierdas de la gran presentación y concurso en el estadio de andahuaylas "Los Chankas" Tinkuy "Encuentro de comparsas" el dia 29 de marzo. Compra tu ticket de ingreso al estadio en un solo click y disfruta con nosotros!!!</p>
                    <button type="button" class="btn btn-outline-secondary text-white btnCom">Comprar ticket de ingreso al estadio</button>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light text-muted py-5" id="eventos">
        <div class="container">
            <h3 class="text-center">Entérate de nuestras actividades y eventos</h3>
            <div class="card text-center">
                <img src="img/crono2.jpg" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- JURADOS -->
    <section class="bg-secondary py-5" id="jurados">
        <div class="container">
            <h2 class="text-center">Iniciar sesión como jurado</h2>
            <div class="row">
                <div class="col-6 d-none d-md-flex flex-row">
                    <ul>
                        <li>Todos los jurados tienen acceso a la plataforma de calificaciones de comparzas por este medio.</li>
                        <li>El usuario y contraseña se les envio a su correro personal cuando se les nomino como jurados del evento.</li>
                        <li>El uso del usuario y contraseña es exclusivo solo de los jurados, esta estrictamente prohibido compartir o difundir el uso de dichos usuarios.</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <form id="form2">
                        <label for="form2d">Usuario:</label>
                        <input type="number" min="10000000" max="99999999" id="form2d" class="form-control" required><br>
                        <label for="form2c">Contraseña:</label>
                        <input type="password" id="form2c" class="form-control" required><br>
                        <div class="text-center"><button id="form2b" type="submit" class="btn btn-primary text-center">Iniciar sesión</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- REGISTRARSE -->
    <section class="py-5">
        <div class="container">
            <h3 class="text-center">Registra tu comparsa en un solo click!</h3>
        </div>
    </section>

    <section class="bg-light py-5" id="registrar">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="text-muted">REGISTRO DE COMPARSAS ONLINE</h2>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-success">Delegado de la comparsa:</h4>
                            <form id="formDelegado">
                                <input id="dnid" type="number" min="10000000" max="99999999" class="form-group form-control" placeholder="DNI del delegado de comparsa" required>
                                <input id="nombred" type="text" class="form-group form-control" placeholder="Nombres" required>
                                <input id="apellidod" type="text" class="form-group form-control" placeholder="Apellidos" required>
                                <input id="correod" type="email" class="form-group form-control" placeholder="Correo electrónico" required>
                                <input id="contraseñad" type="password" class="form-group form-control" placeholder="Contraseña" required>
                                <input id="idPukllay" type="hidden" value="<?php echo $idPukllay;?>">
                                <button class="btn btn-primary btnDelegado" type="submit">Registrar delegado</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <h4 class="text-success">Registrar comparsa:</h4>
                            <form id="formComparsa">
                                <input id="nombrec" type="text" class="form-control form-group" placeholder="Nombre de comparsa" required>
                                <input id="procedencia" type="text" class="form-control form-group" placeholder="Procedencia" required>
                                <input id="cantidad" type="number" class="form-control form-group" placeholder="Cantidad de participantes" required>
                                <input id="categoria" type="text" class="form-control form-group" placeholder="Categoría" required>
                                <input id="dnic" type="number" min="10000000" max="99999999" class="form-group form-control" placeholder="DNI delegado" required>
                                <input id="idPukllayc" type="hidden" value="<?php echo $idPukllay;?>">
                                <button class="btn btn-primary btnComparsa" type="submit">Registrar comparsa</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                // $conexion=new mysqli($host,$user,$password,$database,$port);
                // if($conexion->connect_error) die("No se ha podido conectar a la base de datos");
                
                // if (isset($_POST['dnid']) &&
                //     isset($_POST['nombred']) &&
                //     isset($_POST['apellidod']) &&
                //     isset($_POST['correod']) &&
                //     isset($_POST['celulard']))
                // {
                //     $dnid = get_post($conexion, 'dnid');
                //     $nombred = get_post($conexion, 'nombred');
                //     $apellidod = get_post($conexion, 'apellidod');
                //     $correod = get_post($conexion, 'correod');
                //     $celulard = get_post($conexion, 'celulard');
                //     $pass = get_post($conexion, 'dnid');//password_hash(get_post($conexion,'dnid'), PASSWORD_DEFAULT);
                //     $query = "INSERT INTO usuario (idPukllay,usuarioUsuario, paswUsuario,tipoUsuario,estadoUsuario) VALUES ('$idPukllay', '$dnid', '$pass', 'delegado','activo')";
                //     $result = $conexion->query($query);
                //     if (!$result) echo "INSERT falló <br><br>";
                //     $query = "INSERT INTO delegado (dniDele,nombDele, apelDele,celuDele,coreDele,usuario_idPukllay,usuario_usuarioUsuario) VALUES ('$dnid', '$nombred', '$apellidod','$celulard','$correod','$idPukllay','$dnid')";
                //     $result = $conexion->query($query);
                //     if (!$result) echo "INSERT falló <br><br>";
                // }

                // if (isset($_POST['nombrec']) &&
                //     isset($_POST['procedencia']) &&
                //     isset($_POST['cantidad']) &&
                //     isset($_POST['categoria']) &&
                //     isset($_POST['dnic']))
                // {
                //     $nombrec = get_post($conexion, 'nombrec');
                //     $procedencia = get_post($conexion, 'procedencia');
                //     $cantidad = get_post($conexion, 'cantidad');
                //     $categoria = get_post($conexion, 'categoria');
                //     $dnic = get_post($conexion, 'dnic');
                //     $query = "INSERT INTO comparsa (nombreComp,Procedencia, Categoría,CantidadPart,delegado_dniDele) VALUES ('$nombrec', '$procedencia', '$categoria', '$cantidad','$dnic')";
                //     $result = $conexion->query($query);
                //     if (!$result) echo "INSERT falló <br><br>";
                // }
                
            
                // $conexion->close();
               
             
                
                
                ?>

                <div class="col-md-4 d-none d-md-block">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h5 class="text-center">Inicia sesión</h5>
                            <p class="text-center">Si no proporciono una contraseña, ingrese su dni como contraseña</p>
                            <form id="form3">
                                <input id="form3d" type="number" min="10000000" max="99999999" class="form-group form-control" placeholder="DNI" required>
                                <input id="form3c" type="password" class="form-control form-group" placeholder="Contraseña" required>
                                <div class="text-center">
                                    <button id="form3b" type="submit" class="btn btn-primary text-center">Iniciar sesión</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RANKING -->
    <section class="py-5">
        <div class="container">
            <h3 class="text-center">Visualiza el ranking de todas las comparsas en tiempo real!</h3>
        </div>
    </section>

    <section class="bg-light py-5" id="ranking">
        <div class="container">
            <h3 class="font-weight-bold py-3 text-center text-muted">RANKING DE TODAS LAS COMPARSAS</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped table-bordered table-condensed text-muted text-center" style="width:100%">
                            <thead class="text-center font-weight-bold">
                                <tr>
                                    <td>PUESTO</td>
                                    <td>NOMBRE DE LA COMPARSA</td>
                                    <td>PUNTAJE HASTA EL MOMENTO</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'bd/conexiondatos.php';
                                $conexion=new mysqli($host,$user,$password,$database,$port);
                                if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

                                // $query = "CREATE temporary table ranking (
                                //     puesto int primary key AUTO_INCREMENT,
                                //     nombre varchar(80),
                                //     puntaje int(11))";
                                // $result = $conexion->query($query);
                                // // if (!$result) die ("Falló el acceso a la base de datos1 no crea la tabla temporal en el servidor");

                                // $query = "INSERT into ranking (nombre,puntaje) SELECT nombreComp,sum(puntajeCalificacion) Puntaje_total from calificacion inner join comparsa on 
                                // comparsa_idComparsa=idComparsa group by comparsa_idComparsa order by Puntaje_total desc";
                                // $result = $conexion->query($query);
                                // // if (!$result) die ("Falló el acceso a la base de datos2");

                                // $query = "SELECT * from ranking";
                                // $result = $conexion->query($query);
                                // // if (!$result) die ("Falló el acceso a la base de datos3");

                                $pukllay=$idPukllay;        
                                $query = "SELECT nombreComp,sum(puntajeCalificacion) Puntaje_total from calificacion right join comparsa 
                                on comparsa_idComparsa=idComparsa and etapa_idPukllay='$pukllay' group by idComparsa order by Puntaje_total desc";
                                $result = $conexion->query($query);

                                $i=1;
                                while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $data['nombreComp'] ?></td>
                                    <td><?php echo $data['Puntaje_total'] ?></td>
                                </tr>

                                <?php
                                $i++;
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

    <!-- FOOTER -->
    <footer class="container">
       <div class="row">
           <div class="col-md-4 pt-5 d-none d-md-block">
               <h5>Pukllay 2021</h5>
               <p class="text-justify">XX Encuentro nacional del carnaval originario del Perú: Pukllay 2021</p>
               <a href="#eventos" class="text-light">Participa de nuestros eventos</a><br>
               <a href="#jurados" class="text-light">Inicia sesión como jurado</a><br>
               <a href="#registrar" class="text-light">Registra tu comparsa</a>
           </div>
           <div class="col-7 col-md-4 pt-5">
               <h5>Contactanos</h5>
               <p><i class="icon ion-md-pin"></i> Av. Perú 304 Andahuaylas</p>
               <p><i class="icon ion-md-call"></i> Telefono 421208</p>
               <p><i class="icon ion-md-call"></i>
               celular 982076766</p>
               <p><i class="icon ion-md-mail"></i> danielcco.12@gmail.com</p>
           </div>
           <div class="col-5 col-md-4 pt-5">
               <h5>Visita nuestras redes sociales</h5>
               <a href="" class="text-light"><i class="icon ion-logo-facebook"></i> Facebook</a><br>
               <a href="" class="text-light"><i class="icon ion-logo-instagram"></i> Instagram</a><br>
               <a href="" class="text-light"><i class="icon ion-logo-youtube"></i> Youtube</a>
           </div>
       </div>
       
       
        <div class="row">
            <div class="col-md-12 p-5">
                <p class="text-center">&copy; Copyright 2021 - Pukllay 2021 Andahuaylas </p>
            </div>
        </div>
    </footer>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>