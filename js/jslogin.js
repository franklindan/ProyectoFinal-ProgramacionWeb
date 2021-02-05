$(document).ready(function(){
    
$("#recuperar").click(function(){
    var recuperar ="<h1 class='font-weight-bold mb-4'>Recuperar contraseña</h1>"+
    "<form id='formC' action='login.php' method='post'>"+
       "<div class='mb-4'>"+
         "<label for='dnir' class='form-label font-weight-bold'>Ingrese su dni:</label>"+
         "<input type='text' class='form-control' id='dnir' placeholder='Ingrese su dni' name='dni'>"+
       "</div>"+
       "<div class='mb-4'>"+
         "<label for='correor' class='form-label font-weight-bold'>Ingrese su correo con el que se registro:</label>"+
         "<input type='text' class='form-control mb-2' id='correor' placeholder='Ingrese su correo' name='correor'>"+
         "<a href='login.php' id='recuperar' class='form-text text-light text-decoration-none'>Volver a login</a>"+
       "</div>"+
       "<input type='submit' class='btn btn-primary w-100 enviarC' value='Enviar'>"+
     "</form>";
    $("#loginF").html(recuperar);

    $(location).attr('href','#log');
    $("#formC").trigger("reset");
    
    

});    
    

     
$(document).on("click", ".enviarC", function(){
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
    
});


    
   
    
});