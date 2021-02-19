$(document).ready(function(){
  alert("Solo se puede crear usuarios para los delegados en la página principal. Los demás usuarios son registrados por el administrador y el operario, ya que así fue planificado el funcionamiento del sistema. Por esa razon, se habilitaron los siguientes usuarios para facilitar la visualización del sistema (El usuario y contraseña son los mismos): administrador: 72680370, operario:72680371, jurado:72680372, final Indirecto:72680373.");
  
  $(document).on("click", "#recuperar", function(){
      // $(location).attr('href','#loginF');
      var recuperar ="<div id='loginF' class='loginF'><h1 class='font-weight-bold mb-4'>Recuperar contraseña</h1>"+
      "<form id='formD'>"+
         "<div class='mb-4'>"+
           "<label for='dnir' class='form-label font-weight-bold'>Ingrese su dni:</label>"+
           "<input type='number' min='00000000' max='99999999' class='form-control' id='dnir' placeholder='Ingrese su dni' required>"+
         "</div>"+
         "<div class='mb-4'>"+
           "<label for='correor' class='form-label font-weight-bold'>Ingrese su correo con el que se registro:</label>"+
           "<input type='email' class='form-control mb-2' id='correor' placeholder='Ingrese su correo' required>"+
           "<a href='#' id='recuperar1' class='form-text text-light text-decoration-none'>Volver a login</a>"+
         "</div>"+
         "<button id='formb1' type='submit' class='btn btn-primary w-100'>Enviar</button>"+
       "</form></div>";
      $("#loginF").html(recuperar);
  
      $("#formC").trigger("reset");
      $("#formD").trigger("reset");
      // $(location).attr('href','#loginF');  
  });   
  
  $(document).on("click", "#recuperar1", function(){
      // $(location).attr('href','#loginF');
      var recuperar ="<div id='loginF' class='loginF'>"+
      "<h1 class='font-weight-bold mb-4'>Bienvenido de vuelta</h1>"+
      "<form id='formC'>"+
          "<div class='mb-4'>"+
          "<label for='selectU' class='form-label font-weight-bold'>Perfil</label>"+
          "<select id='selectU' class='form-control'>"+
              "<option>Delegado</option>"+
              "<option>Jurado</option>"+	
              "<option>Operario</option>"+
              "<option>Usuario final indirecto</option>"+
              "<option>Administrador</option>"+
          "</select>"+	
          "</div>"+
          "<div class='mb-4'>"+
          "<label for='dni' class='form-label font-weight-bold'>DNI usuario</label>"+
          "<input type='number' min='00000000' max='99999999' class='form-control' id='dni' placeholder='Ingrese su dni' required>"+
          "</div>"+
          "<div class='mb-4'>"+
          "<label for='contraseña' class='form-label font-weight-bold'>Contraseña</label>"+
          "<input type='password' class='form-control mb-2' id='contraseña' placeholder='Ingrese su contraseña' required>"+
          "<a href='#' id='recuperar' class='form-text text-light text-decoration-none'>¿Olvidaste tu contraseña?</a>"+
          "</div>"+
          "<button id='formb' type='submit' class='btn btn-primary w-100'>Iniciar sesión</button>"+
      "</form>"+
      "</div>";
      $("#loginF").html(recuperar);
  
      $("#formC").trigger("reset");
      $("#formD").trigger("reset");
      // $(location).attr('href','#loginF');  
  });
  
  
          
  // $(document).on("click", ".enviarC", function(){
  //     dnir = $.trim($("#dnir").val());
  //     correor = $.trim($("#correor").val());
  //     $.ajax({
  //         url: "bd/phplogin.php",
  //         type: "POST",
  //         dataType: "json",
  //         data: {dnir:dnir,correor:correor},
  //         success: function(){ 
  //             //var datos=JSON.parse(data);
  //             alert("Se le ha enviado un mensaje a su correo. Revise su correo porfavor.");              
  //         }       
  //     }).fail( function() {
  //       alert("Datos incorrectos.");    
  //   });   
  // });
  
  
  $(document).on("click", "#formb", function(){      
  //   $(location).attr('href','#loginF');
    usuario = $.trim($("#dni").val());
    password = $.trim($("#contraseña").val());
    $.ajax({
        url: "bd/phplogin.php",
        type: "POST",
        dataType: "json",
        data: {dni:usuario,contraseña:password},
        success: function(data){ 
           //var datos=JSON.parse(data);
           console.log(data);
           alert("Bienvenido:"+data[3]);
           if("final indirecto"==data[3]){ 
            url="./finalindirecto.php";
           } else {
            url="./"+data[3]+".php";
           }
           $(location).attr('href',url);
        }        
    }).fail( function() {
        alert("Datos incorrectos.");
    });  
    // $("#formC").trigger("reset");
  //   $(location).attr('href','#loginF');   
  });
  
  $(document).on("click", "#formb1", function(){      
  //   $(location).attr('href','#loginF');
    dnir = $.trim($("#dnir").val());
    correor = $.trim($("#correor").val());
    $.ajax({
        url: "bd/phplogin.php",
        type: "POST",
        dataType: "json",
        data: {dnir:dnir,correor:correor},
        success: function(data){ 
          console.log(data);
          //var datos=JSON.parse(data);
          if(data[0]){
          alert("Se le ha enviado un mensaje a su correo. Revise su correo porfavor.");
          } else {
              alert("Datos incorrectos.");
          } 
        }        
    }).fail( function() {
        alert("Datos incorrectos.");
    });  
    // $("#formD").trigger("reset");
  //   $(location).attr('href','#loginF');   
  });
  
  
      
     
      
  });