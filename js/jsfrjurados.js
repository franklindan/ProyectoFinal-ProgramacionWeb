$(document).ready(function(){
    
        $('#listaPuk').on('change', function(){
    
            $('#tabla tbody td').remove();
            pukllay = $('#listaPuk').val();
            $.ajax({
                url: "bd/crudfrjurados.php",
                type: "POST",
                dataType: "json",
                data: {pukllay:pukllay},
                success: function(data){ 
                    //var datos=JSON.parse(data); 
                    console.log(data);
                    data.forEach(dat => {
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
                    
                        
                    });                 
                }  
    
            });
    
        });    
    
    
    
    
  
        
    });