$(document).ready(function(){   
    
$(document).on("click", ".btnUsuario", function(){
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    celular = $.trim($("#celular").val());
    Correo = $.trim($("#Correo").val());
    dirrecion = $.trim($("#dirrecion").val());
    $.ajax({
        url: "bd/crudadministradorcuenta.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre,apellido:apellido,celular:celular,Correo:Correo,dirrecion:dirrecion},
        success: function(data){ 
            console.log(data);
            nombre = data[0].nombreAdmi;            
            apellido = data[0].apelAdmi;
            celular = data[0].celuAdmi;
            Correo = data[0].coreAdmi;
            dirrecion = data[0].direAdmi;
             
            $("#nombre").val(nombre);
            $("#apellido").val(apellido);
            $("#celular").val(celular);
            $("#Correo").val(Correo);
            $("#dirrecion").val(dirrecion);

            alert(nombre+": Se actualizaron sus datos correctamente"); 
           
        }        
    });
    $(location).attr('href','#content');
    // $("#formUsuario").trigger("reset");
});

$(document).on("click", ".btnContraseña", function(){
    contraseña = $.trim($("#contraseña").val());
    nuevaContraseña = $.trim($("#nuevaContraseña").val());
    $.ajax({
        url: "bd/crudadministradorcuenta.php",
        type: "POST",
        dataType: "json",
        data: {contraseña:contraseña,nuevaContraseña:nuevaContraseña},
        success: function(data){ 
            console.log(data);
            dni = data[0].usuarioUsuario;
            alert("Usuario:"+dni+". Se actualizó su contraseña correctamente");             
        }        
    }); 
    $(location).attr('href','#content');
    $("#formContraseña").trigger("reset"); 
}); 
       
        
});