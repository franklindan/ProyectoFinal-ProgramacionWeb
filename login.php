<?php
    // require_once 'bd/conexiondatos.php';
    // $conexion=new mysqli($host,$user,$password,$database,$port);
    // if($conexion->connect_error) die("No se ha podido conectar a la base de datos");

    // if (isset($_POST['dni'])&&
    //     isset($_POST['contraseña']))
    // { 
    //     $user=mysql_entities_fix_string($conexion,get_post($conexion, 'dni'));
    //     $password=mysql_entities_fix_string($conexion,get_post($conexion, 'contraseña'));
    //     $query = "SELECT * FROM usuario WHERE usuarioUsuario='$user'";
    //     $result = $conexion->query($query);
    //     if (!$result) die ("Usurio no encontrado");
    //     elseif ($result->num_rows)
    //     {
    //         $row = $result->fetch_array(MYSQLI_NUM);
    //         $result->close();
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
    //             }
    //             if("delegado"==$row[3] and "activo"==$row[4]){
    //                 header('location:delegado.php');
    //             }
    //             if("final indirecto"==$row[3] and "activo"==$row[4]){
    //                 header('location:finalindirecto.php');
    //             }
    //             if("jurado"==$row[3] and "activo"==$row[4]){
    //                 header('location:jurado.php');
    //             }
    //             if("operario"==$row[3] and "activo"==$row[4]){
    //                 header('location:operario.php');
    //             }
    //         }
    //         else die("Usuario/password incorrecto");
    //     }
    //     else die("Usuario/password incorrecto");
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
    <title>Pukllay 2021 | Login</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font.css">
</head>
 
<body>
   <section>
       <div class="row no-gutters">
           <div class="col-lg-7 d-none d-lg-block">
               
               
               <div class="carousel slide" data-ride="carousel" id="slider">

                    <!-- CAROUSEL INDICADORES-->
                    <ul class="carousel-indicators">
                        <li data-target="slider" data-slide-to="0"></li>
                        <li data-target="slider" data-slide-to="1"></li>
                        <li data-target="slider" data-slide-to="2"></li>
                    </ul>


                    <!-- IMAGENES -->
                    <div class="carousel-inner">

                        <div class="carousel-item img-1 min-vh-100 active">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Pukllay</h3>
                                <p>Imagen 1</p>
                            </div>
                        </div>

                        <div class="carousel-item img-2 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Pukllay</h3>
                                <p>Imagen 2</p>
                            </div>
                        </div>

                        <div class="carousel-item img-3 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>Pukllay</h3>
                                <p>Imagen 3</p>
                            </div>
                        </div>
                    </div>

                    <!-- CONTROLES -->
                    <a href="#slider" class="carousel-control-prev" data-slide="prev"> <span class="carousel-control-prev-icon"></span> Previus</a>

                    <a href="#slider" class="carousel-control-next" data-slide="next"> <span class="carousel-control-next-icon"></span> Next</a>
                </div>
                
           </div>
           <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
               <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
               
               </div>
               <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                   <div id="loginF" class="loginF">
                   <h1 class="font-weight-bold mb-4">Bienvenido de vuelta</h1>
                   <form id='formC'>
                     <div class="mb-4">
                        <label for="selectU" class="form-label font-weight-bold">Perfil</label>
                        <select id="selectU" class="form-control">
				            <option>Delegado</option>
                            <option>Jurado</option>	
                            <option>Operario</option>
				            <option>Usuario final indirecto</option>
				            <option>Administrador</option>
				        </select>	
                      </div>
                      <div class="mb-4">
                        <label for="dni" class="form-label font-weight-bold">DNI usuario</label>
                        <input type="number" min="10000000" max="99999999" class="form-control" id="dni" placeholder="Ingrese su dni" required>
                      </div>
                      <div class="mb-4">
                        <label for="contraseña" class="form-label font-weight-bold">Contraseña</label>
                        <input type="password" class="form-control mb-2" id="contraseña" placeholder="Ingrese su contraseña" required>
                        <a href="#" id="recuperar" class="form-text text-light text-decoration-none">¿Olvidaste tu contraseña?</a>
                      </div>
                      <button id="formb" type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                      <!-- <input id="formb" type="submit" class="btn btn-primary w-100" value="Iniciar sesión"> -->
                    </form>

                    </div>
               </div>
               <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                   <a href="index.php" class="text-decoration-none text-light font-weight-bold">Regresar a la página principal</a>
               </div>
           </div>
       </div>
   </section>
    
   
   
<!--
   <footer class="">
        <p class="">&copy; 2021 Titulo | Todos los derechos reservados</p>  
   </footer>
-->

    
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="DataTables/datatables.min.js"></script>
    <script src="js/jslogin.js"></script>
</body>
</html>