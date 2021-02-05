$(document).ready(function(){   
    
// $("#idPukllay").css("display", "none");

$(document).on("click", ".btnDelegado", function(){
    $(location).attr('href','#registrar');
    idPukllay = $.trim($("#idPukllay").val());
    dnid = $.trim($("#dnid").val());
    nombred = $.trim($("#nombred").val());
    apellidod = $.trim($("#apellidod").val());
    correod = $.trim($("#correod").val());
    contraseñad = $.trim($("#contraseñad").val());
    $.ajax({
        url: "bd/crudindex.php",
        type: "POST",
        dataType: "json",
        data: {usuarioUsuario:dnid,nombDele:nombred,apelDele:apellidod,coreDele:correod,pswUsuario:contraseñad,idPukllay:idPukllay},
        success: function(){ 
            alert("Se registro el delegado exitosamente");             
        }      
    }).fail( function() {
        alert("Datos incorrectos.");    
    })  ;
    $(location).attr('href','#registrar');
    $("#formDelegado").trigger("reset");
});

$(document).on("click", ".btnComparsa", function(){
    $("#formComparsa").trigger("reset");
    nombrec = $.trim($("#nombrec").val());
    procedencia = $.trim($("#procedencia").val());
    cantidad = $.trim($("#cantidad").val());
    categoria = $.trim($("#categoria").val());
    dnic = $.trim($("#dnic").val());
    $.ajax({
        url: "bd/crudindex.php",
        type: "POST",
        dataType: "json",
        data: {nombrec:nombrec,procedencia:procedencia,cantidad:cantidad,categoria:categoria,dnic:dnic},
        success: function(){ 
            alert("Se registro la comparsa exitosamente");             
        }        
    }).fail( function() {
        alert("Datos incorrectos.");    
    }); 
    $(location).attr('href','#registrar');
    $("#formComparsa").trigger("reset"); 
}); 

$(document).on("click", ".btnRe", function(){
    $(location).attr('href','#registrar'); 
}); 
$(document).on("click", ".btnCom", function(){
    alert("Se habilitará esta opción mas adelante"); 
}); 

$(document).on("click", "#form1b", function(){ 
    $(location).attr('href','#inicio');
    usuario = $.trim($("#form1d").val());
    password = $.trim($("#form1c").val());
    $.ajax({
        url: "bd/crudindex.php",
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
    $(location).attr('href','#inicio');
    $("#form1").trigger("reset");    
});
$(document).on("click", "#form2b", function(){    
    $(location).attr('href','#jurados');
    usuario = $.trim($("#form2d").val());
    password = $.trim($("#form2c").val());
    $.ajax({
        url: "bd/crudindex.php",
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
    $(location).attr('href','#jurados');
    $("#form2").trigger("reset");    
});
$(document).on("click", "#form3b", function(){      
    $(location).attr('href','#registrar');
    usuario = $.trim($("#form3d").val());
    password = $.trim($("#form3c").val());
    $.ajax({
        url: "bd/crudindex.php",
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
    $(location).attr('href','#registrar');
    $("#form3").trigger("reset");   
});
   
    
});