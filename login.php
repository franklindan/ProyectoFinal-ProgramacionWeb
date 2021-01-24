<!DOCTYPE html>
<html lang="es">
    
<head>
    
    <meta charset="UTF-8">
    <title></title>
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
                   <h1 class="font-weight-bold mb-4">Bienvenido de vuelta</h1>
                   <form>
                     <div class="mb-4">
                        <label for="perfil" class="form-label font-weight-bold">Perfil</label>
                        <select class="form-control" name="cboNivel">
				            <option selected>Delegado</option>
				            <option>Jurado</option>	<option value="S" >Operario</option>
				            <option>Usuario final indirecto</option>
				            <option>Administrador</option>
				        </select>	
                      </div>
                      <div class="mb-4">
                        <label for="dni" class="form-label font-weight-bold">DNI usuario</label>
                        <input type="email" class="form-control" id="dni" placeholder="Ingrese su dni">
                      </div>
                      <div class="mb-4">
                        <label for="contraseña" class="form-label font-weight-bold">Contraseña</label>
                        <input type="password" class="form-control mb-2" id="contraseña" placeholder="Ingrese su contraseña">
                        <a href="" class="form-text text-light text-decoration-none">¿Olvidaste tu contraseña?</a>
                      </div>
                      <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                    </form>
               </div>
               <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                   <a href="index.html" class="text-decoration-none text-light font-weight-bold">Regresar a la página principal</a>
               </div>
           </div>
       </div>
   </section>
    
   
   
<!--
   <footer class="">
        <p class="">&copy; 2021 Titulo | Todos los derechos reservados</p>  
   </footer>
-->
    
   <script src="js/menu.js"></script>
   <script src="js/jquery-3.5.1.min.js"></script>
   <script src="js/jquery-3.5.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>