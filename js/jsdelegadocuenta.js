$(document).ready(function(){   
    
    $(document).on("click", ".btnUsuario", function(){
        nombre = $.trim($("#nombre").val());
        apellido = $.trim($("#apellido").val());
        celular = $.trim($("#celular").val());
        Correo = $.trim($("#Correo").val());
        $.ajax({
            url: "bd/cruddelegadocuenta.php",
            type: "POST",
            dataType: "json",
            data: {nombre:nombre,apellido:apellido,celular:celular,Correo:Correo},
            success: function(data){ 
                console.log(data);
                nombre = data[0].nombDele;            
                apellido = data[0].apelDele;
                celular = data[0].celuDele;
                Correo = data[0].coreDele;
                 
                $("#nombre").val(nombre);
                $("#apellido").val(apellido);
                $("#celular").val(celular);
                $("#Correo").val(Correo);
    
                alert(nombre+": Se actualizaron sus datos correctamente"); 
               
            }        
        });
        $(location).attr('href','#contenido');
        // $("#formUsuario").trigger("reset");
    });
    
    $(document).on("click", ".btnContraseña", function(){
        contraseña = $.trim($("#contraseña").val());
        nuevaContraseña = $.trim($("#nuevaContraseña").val());
        $.ajax({
            url: "bd/cruddelegadocuenta.php",
            type: "POST",
            dataType: "json",
            data: {contraseña:contraseña,nuevaContraseña:nuevaContraseña},
            success: function(data){ 
                console.log(data);
                dni = data[0].usuarioUsuario;
                alert("Usuario:"+dni+". Se actualizó su contraseña correctamente");             
            }        
        }); 
        $(location).attr('href','#contenido');
        $("#formContraseña").trigger("reset"); 
    }); 
           
            
    });