$(document).ready(function(){

alert("Solo se puede crear usuarios para los delegados en la página principal, los demas usuarios son registrados por el administrador y el operario, ya que así fue planificado el funcionamiento del sistema. Por esa razon, se habilitaron los siguientes usuarios para facilitar la visualización del sistema (El usuario y contraseña son los mismos): administrador: 72680370, operario:72680371, jurado:72680372, final Indirecto:72680373.");  
    
$("#recuperar").click(function(){
    var recuperar ="<h1 class='font-weight-bold mb-4'>Recuperar contraseña</h1>"+
    "<form id='formD'>"+
       "<div class='mb-4'>"+
         "<label for='dnir' class='form-label font-weight-bold'>Ingrese su dni:</label>"+
         "<input type='text' class='form-control' id='dnir' placeholder='Ingrese su dni'>"+
       "</div>"+
       "<div class='mb-4'>"+
         "<label for='correor' class='form-label font-weight-bold'>Ingrese su correo con el que se registro:</label>"+
         "<input type='text' class='form-control mb-2' id='correor' placeholder='Ingrese su correo'>"+
         "<a href='login.php' id='recuperar' class='form-text text-light text-decoration-none'>Volver a login</a>"+
       "</div>"+
       "<input id='formb1' type='submit' class='btn btn-primary w-100 enviarC' value='Enviar'>"+
     "</form>";
    $("#loginF").html(recuperar);

    $(location).attr('href','#loginF');
    $("#formC").trigger("reset");
    
    

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
  $(location).attr('href','#loginF');
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

         url="./"+data[3]+".php";
         $(location).attr('href',url);
      }        
  }).fail( function() {
      alert("Datos incorrectos.");
  });  
  $(location).attr('href','#loginF');
  $("#formC").trigger("reset");   
});

$(document).on("click", "#formb1", function(){      
  $(location).attr('href','#loginF');
  dnir = $.trim($("#dnir").val());
  correor = $.trim($("#correor").val());
  $.ajax({
      url: "bd/phplogin.php",
      type: "POST",
      dataType: "json",
      data: {dnir:dnir,correor:correor},
      success: function(){ 
         //var datos=JSON.parse(data);
         alert("Se le ha enviado un mensaje a su correo. Revise su correo porfavor."); 
      }        
  }).fail( function() {
      alert("Datos incorrectos.");
  });  
  $(location).attr('href','#loginF');
  $("#formD").trigger("reset");   
});


    
   
    
});