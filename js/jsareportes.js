$(document).ready(function(){   
    
$('#listaUsuario').on('change', function(){
    $('#tabla tbody td').remove();
    usuario = $('#listaUsuario').val();
    $.ajax({
        url: "bd/crudareportes.php",
        type: "POST",
        dataType: "json",
        data: {usuario:usuario},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {       

                if(usuario=="administrador"){

                    dni = dat['dniAdministrador'];      
                    nombre = dat['nombreAdmi'];
                    apellido = dat['apelAdmi'];
                    celular = dat['celuAdmi'];
                    correo = dat['coreAdmi'];
                    direccion = dat['direAdmi'];
                    pukllay = dat['usuario_idPukllay'];
                    
                    var filas = '<tr>'+
                            '<td>' + dni + '</td>'+
                            '<td>' + nombre + '</td>'+
                            '<td>' + apellido + '</td>'+
                            '<td>' + celular + '</td>'+
                            '<td>' + correo + '</td>'+
                            '<td>' + direccion + '</td>'+
                            '<td>' + pukllay + '</td>'
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                }
                if(usuario=="jurado"){
                    dni = dat['dniJurado'];            
                    nombre = dat['nombJurado'];
                    apellido = dat['apelJurado'];
                    celular = dat['celuJurado'];
                    correo = dat['coreJurado'];
                    direccion = dat['direJurado'];
                    pukllay = dat['usuario_idPukllay'];
                    
                    var filas = '<tr>'+
                            '<td>' + dni + '</td>'+
                            '<td>' + nombre + '</td>'+
                            '<td>' + apellido + '</td>'+
                            '<td>' + celular + '</td>'+
                            '<td>' + correo + '</td>'+
                            '<td>' + direccion + '</td>'+
                            '<td>' + pukllay + '</td>'
                        '</tr>';
                    $('#tabla tbody').append(filas);
                }
                if(usuario=="delegado"){
                    dni = dat['dniDele'];            
                    nombre = dat['nombDele'];
                    apellido = dat['apelDele'];
                    celular = dat['celuDele'];
                    correo = dat['coreDele'];
                    direccion = "";
                    pukllay = dat['usuario_idPukllay'];
                    
                    var filas = '<tr>'+
                            '<td>' + dni + '</td>'+
                            '<td>' + nombre + '</td>'+
                            '<td>' + apellido + '</td>'+
                            '<td>' + celular + '</td>'+
                            '<td>' + correo + '</td>'+
                            '<td>' + direccion + '</td>'+
                            '<td>' + pukllay + '</td>'
                        '</tr>';
                    $('#tabla tbody').append(filas);
                }
                if(usuario=="operario"){
                    dni = dat['dniOper'];            
                    nombre = dat['nombOper'];
                    apellido = dat['apelOper'];
                    celular = dat['celuOper'];
                    correo = dat['coreOper'];
                    direccion = dat['direOper'];
                    pukllay = dat['usuario_idPukllay'];
                    
                    var filas = '<tr>'+
                            '<td>' + dni + '</td>'+
                            '<td>' + nombre + '</td>'+
                            '<td>' + apellido + '</td>'+
                            '<td>' + celular + '</td>'+
                            '<td>' + correo + '</td>'+
                            '<td>' + direccion + '</td>'+
                            '<td>' + pukllay + '</td>'
                        '</tr>';
                    $('#tabla tbody').append(filas);
                }
                if(usuario=="FinalIndirecto"){
                    dni = dat['dniFinal'];            
                    nombre = dat['nombreFinal'];
                    apellido = dat['apelFinal'];
                    celular = dat['celuFinal'];
                    correo = dat['coreFinal'];
                    direccion = dat['direFinal'];
                    pukllay = dat['usuario_idPukllay'];
                   
                    var filas = '<tr>'+
                            '<td>' + dni + '</td>'+
                            '<td>' + nombre + '</td>'+
                            '<td>' + apellido + '</td>'+
                            '<td>' + celular + '</td>'+
                            '<td>' + correo + '</td>'+
                            '<td>' + direccion + '</td>'+
                            '<td>' + pukllay + '</td>'
                        '</tr>';
                    $('#tabla tbody').append(filas);
                }
            });                 
        }  

    });

    $('#listaPuk').on('change', function(){

        $('#tabla tbody td').remove();
        pukllay = $('#listaPuk').val();
        $.ajax({
            url: "bd/crudareportes.php",
            type: "POST",
            dataType: "json",
            data: {usuario:usuario,pukllay:pukllay},
            success: function(data){ 
                //var datos=JSON.parse(data); 
                console.log(data);
                data.forEach(dat => {       

                    if(usuario=="administrador"){

                        dni = dat['dniAdministrador'];      
                        nombre = dat['nombreAdmi'];
                        apellido = dat['apelAdmi'];
                        celular = dat['celuAdmi'];
                        correo = dat['coreAdmi'];
                        direccion = dat['direAdmi'];
                        pukllay = dat['usuario_idPukllay'];
                        
                        var filas = '<tr>'+
                                '<td>' + dni + '</td>'+
                                '<td>' + nombre + '</td>'+
                                '<td>' + apellido + '</td>'+
                                '<td>' + celular + '</td>'+
                                '<td>' + correo + '</td>'+
                                '<td>' + direccion + '</td>'+
                                '<td>' + pukllay + '</td>'
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                    }
                    if(usuario=="jurado"){
                        dni = dat['dniJurado'];            
                        nombre = dat['nombJurado'];
                        apellido = dat['apelJurado'];
                        celular = dat['celuJurado'];
                        correo = dat['coreJurado'];
                        direccion = dat['direJurado'];
                        pukllay = dat['usuario_idPukllay'];
                        
                        var filas = '<tr>'+
                                '<td>' + dni + '</td>'+
                                '<td>' + nombre + '</td>'+
                                '<td>' + apellido + '</td>'+
                                '<td>' + celular + '</td>'+
                                '<td>' + correo + '</td>'+
                                '<td>' + direccion + '</td>'+
                                '<td>' + pukllay + '</td>'
                            '</tr>';
                        $('#tabla tbody').append(filas);
                    }
                    if(usuario=="delegado"){
                        dni = dat['dniDele'];            
                        nombre = dat['nombDele'];
                        apellido = dat['apelDele'];
                        celular = dat['celuDele'];
                        correo = dat['coreDele'];
                        direccion = "";
                        pukllay = dat['usuario_idPukllay'];
                        
                        var filas = '<tr>'+
                                '<td>' + dni + '</td>'+
                                '<td>' + nombre + '</td>'+
                                '<td>' + apellido + '</td>'+
                                '<td>' + celular + '</td>'+
                                '<td>' + correo + '</td>'+
                                '<td>' + direccion + '</td>'+
                                '<td>' + pukllay + '</td>'
                            '</tr>';
                        $('#tabla tbody').append(filas);
                    }
                    if(usuario=="operario"){
                        dni = dat['dniOper'];            
                        nombre = dat['nombOper'];
                        apellido = dat['apelOper'];
                        celular = dat['celuOper'];
                        correo = dat['coreOper'];
                        direccion = dat['direOper'];
                        pukllay = dat['usuario_idPukllay'];
                        
                        var filas = '<tr>'+
                                '<td>' + dni + '</td>'+
                                '<td>' + nombre + '</td>'+
                                '<td>' + apellido + '</td>'+
                                '<td>' + celular + '</td>'+
                                '<td>' + correo + '</td>'+
                                '<td>' + direccion + '</td>'+
                                '<td>' + pukllay + '</td>'
                            '</tr>';
                        $('#tabla tbody').append(filas);
                    }
                    if(usuario=="FinalIndirecto"){
                        dni = dat['dniFinal'];            
                        nombre = dat['nombreFinal'];
                        apellido = dat['apelFinal'];
                        celular = dat['celuFinal'];
                        correo = dat['coreFinal'];
                        direccion = dat['direFinal'];
                        pukllay = dat['usuario_idPukllay'];
                    
                        var filas = '<tr>'+
                                '<td>' + dni + '</td>'+
                                '<td>' + nombre + '</td>'+
                                '<td>' + apellido + '</td>'+
                                '<td>' + celular + '</td>'+
                                '<td>' + correo + '</td>'+
                                '<td>' + direccion + '</td>'+
                                '<td>' + pukllay + '</td>'
                            '</tr>';
                        $('#tabla tbody').append(filas);
                    }
                });                 
            }  

        });

    });    




});  
    
});