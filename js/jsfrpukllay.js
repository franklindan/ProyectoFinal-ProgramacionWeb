$(document).ready(function(){   
    
$('#listaReporte').on('change', function(){
    $('#tabla thead td').remove();
    $('#tabla tbody td').remove();
    $('#tabla2 thead td').remove();
    $('#tabla2 tbody td').remove();
    $("#listaPuk").val('0');
    reporte = $('#listaReporte').val();
    $.ajax({
        url: "bd/crudfrpukllay.php",
        type: "POST",
        dataType: "json",
        data: {reporte:reporte},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {       

                if(reporte=="organizador"){

                    dniOrg = dat['dniOrg'];      
                    nombreOrg = dat['nombreOrg'];
                    apellidoOrg = dat['apellidoOrg'];
                    ocupacionorg = dat['ocupacionorg'];
                    telefonoOrg = dat['telefonoOrg'];
                    direccionOrg = dat['direccionOrg'];
                    correoOrg = dat['correoOrg'];
                    idPukllay = dat['idPukllay'];

                    var filas = 
                            '<td>Dni organizador</td>'+
                            '<td>Nombre</td>'+
                            '<td>Apellido</td>'+
                            '<td>Ocupación</td>'+
                            '<td>Telefono</td>'+
                            '<td>Dirección</td>'+
                            '<td>Correo</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + dniOrg + '</td>'+
                            '<td>' + nombreOrg + '</td>'+
                            '<td>' + apellidoOrg + '</td>'+
                            '<td>' + ocupacionorg + '</td>'+
                            '<td>' + telefonoOrg + '</td>'+
                            '<td>' + direccionOrg + '</td>'+
                            '<td>' + correoOrg + '</td>'+
                            '<td>' + idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                }
                if(reporte=="auspiciador"){
                    idAuspiciador = dat['idAuspiciador'];      
                    nombreAuspiciador = dat['nombreAuspiciador'];
                    rucAuspiciador = dat['rucAuspiciador'];
                    telefonoAuspiciador = dat['telefonoAuspiciador'];
                    descripcionAuspiciador = dat['descripcionAuspiciador'];
                    correoAuspiciador = dat['correoAuspiciador'];
                    montoAuspiciador = dat['montoAuspiciador'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Id</td>'+
                            '<td>Nombre</td>'+
                            '<td>Ruc</td>'+
                            '<td>Telefono</td>'+
                            '<td>Descripcion</td>'+
                            '<td>Correo</td>'+
                            '<td>Monto</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + idAuspiciador + '</td>'+
                            '<td>' + nombreAuspiciador + '</td>'+
                            '<td>' + rucAuspiciador + '</td>'+
                            '<td>' + telefonoAuspiciador + '</td>'+
                            '<td>' + descripcionAuspiciador + '</td>'+
                            '<td>' + correoAuspiciador + '</td>'+
                            '<td>' + montoAuspiciador + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                }
                if(reporte=="ingresopukllay"){
                    nombreAuspiciador = dat['nombreAuspiciador'];      
                    montoAuspiciador = dat['montoAuspiciador'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Nombre de ingreso</td>'+
                            '<td>Monto</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + nombreAuspiciador + '</td>'+
                            '<td>' + montoAuspiciador + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);

                    opcion=1;
                    $.ajax({
                        url: "bd/crudfrpukllay1.php",
                        type: "POST",
                        dataType: "json",
                        data: {opcion:opcion},
                        success: function(data1){
                            console.log(data1);
                            suma = data1[0].suma;

                            var filas = 
                                    '<td>Ingreso total</td>';
                                
                            $('#headRow2').html(filas);
                            
                            var filas = '<tr>'+
                                    '<td>' + suma + '</td>'+
                                '</tr>';
                                
                            $('#r').html(filas);

                        }
                    });    
                }
                if(reporte=="gastopukllay"){
                    idGasto = dat['idGasto'];      
                    fechaGasto = dat['fechaGasto'];
                    nombreGasto = dat['nombreGasto'];
                    cantidadGasto = dat['cantidadGasto'];
                    descripcionGasto = dat['descripcionGasto'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Id</td>'+
                            '<td>Fecha</td>'+
                            '<td>Nombre</td>'+
                            '<td>Cantidad</td>'+
                            '<td>Descripcion</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + idGasto + '</td>'+
                            '<td>' + fechaGasto + '</td>'+
                            '<td>' + nombreGasto + '</td>'+
                            '<td>' + cantidadGasto + '</td>'+
                            '<td>' + descripcionGasto + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);

                    opcion=2;
                    $.ajax({
                        url: "bd/crudfrpukllay1.php",
                        type: "POST",
                        dataType: "json",
                        data: {opcion:opcion},
                        success: function(data1){
                            console.log(data1);
                            suma = data1[0].suma;

                            var filas = 
                                    '<td>Gasto total</td>';
                                
                            $('#headRow2').html(filas);
                            
                            var filas = '<tr>'+
                                    '<td>' + suma + '</td>'+
                                '</tr>';
                                
                            $('#r').html(filas);

                        }
                    });
                }
                if(reporte=="excedente"){

                    excedente = dat['excedente'];

                    var filas = 
                            '<td>Excedente (Ingreso total - Gasto total)</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + excedente + '</td>'+
                        '</tr>';
                        
                    $('#r1').html(filas);
                }
            });                 
        }  

    });
});



$('#listaPuk').on('change', function(){

    $('#tabla thead td').remove();
    $('#tabla tbody td').remove();
    $('#tabla2 thead td').remove();
    $('#tabla2 tbody td').remove();
    reporte = $('#listaReporte').val();
    pukllay = $('#listaPuk').val();
    $.ajax({
        url: "bd/crudfrpukllay.php",
        type: "POST",
        dataType: "json",
        data: {reporte:reporte,pukllay:pukllay},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {       

                if(reporte=="organizador"){

                    dniOrg = dat['dniOrg'];      
                    nombreOrg = dat['nombreOrg'];
                    apellidoOrg = dat['apellidoOrg'];
                    ocupacionorg = dat['ocupacionorg'];
                    telefonoOrg = dat['telefonoOrg'];
                    direccionOrg = dat['direccionOrg'];
                    correoOrg = dat['correoOrg'];
                    idPukllay = dat['idPukllay'];

                    var filas = 
                            '<td>Dni organizador</td>'+
                            '<td>Nombre</td>'+
                            '<td>Apellido</td>'+
                            '<td>Ocupación</td>'+
                            '<td>Telefono</td>'+
                            '<td>Dirección</td>'+
                            '<td>Correo</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + dniOrg + '</td>'+
                            '<td>' + nombreOrg + '</td>'+
                            '<td>' + apellidoOrg + '</td>'+
                            '<td>' + ocupacionorg + '</td>'+
                            '<td>' + telefonoOrg + '</td>'+
                            '<td>' + direccionOrg + '</td>'+
                            '<td>' + correoOrg + '</td>'+
                            '<td>' + idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                }
                if(reporte=="auspiciador"){
                    idAuspiciador = dat['idAuspiciador'];      
                    nombreAuspiciador = dat['nombreAuspiciador'];
                    rucAuspiciador = dat['rucAuspiciador'];
                    telefonoAuspiciador = dat['telefonoAuspiciador'];
                    descripcionAuspiciador = dat['descripcionAuspiciador'];
                    correoAuspiciador = dat['correoAuspiciador'];
                    montoAuspiciador = dat['montoAuspiciador'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Id</td>'+
                            '<td>Nombre</td>'+
                            '<td>Ruc</td>'+
                            '<td>Telefono</td>'+
                            '<td>Descripcion</td>'+
                            '<td>Correo</td>'+
                            '<td>Monto</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + idAuspiciador + '</td>'+
                            '<td>' + nombreAuspiciador + '</td>'+
                            '<td>' + rucAuspiciador + '</td>'+
                            '<td>' + telefonoAuspiciador + '</td>'+
                            '<td>' + descripcionAuspiciador + '</td>'+
                            '<td>' + correoAuspiciador + '</td>'+
                            '<td>' + montoAuspiciador + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                }
                if(reporte=="ingresopukllay"){
                    nombreAuspiciador = dat['nombreAuspiciador'];      
                    montoAuspiciador = dat['montoAuspiciador'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Nombre de ingreso</td>'+
                            '<td>Monto</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + nombreAuspiciador + '</td>'+
                            '<td>' + montoAuspiciador + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);

                    opcion=1;
                    $.ajax({
                        url: "bd/crudfrpukllay1.php",
                        type: "POST",
                        dataType: "json",
                        data: {opcion:opcion,pukllay:pukllay},
                        success: function(data1){
                            console.log(data1);
                            suma = data1[0].suma;

                            var filas = 
                                    '<td>Ingreso total</td>';
                                
                            $('#headRow2').html(filas);
                            
                            var filas = '<tr>'+
                                    '<td>' + suma + '</td>'+
                                '</tr>';
                                
                            $('#r').html(filas);

                        }
                    });
                }
                if(reporte=="gastopukllay"){
                    idGasto = dat['idGasto'];      
                    fechaGasto = dat['fechaGasto'];
                    nombreGasto = dat['nombreGasto'];
                    cantidadGasto = dat['cantidadGasto'];
                    descripcionGasto = dat['descripcionGasto'];
                    pukllay_idPukllay = dat['pukllay_idPukllay'];

                    var filas = 
                            '<td>Id</td>'+
                            '<td>Fecha</td>'+
                            '<td>Nombre</td>'+
                            '<td>Cantidad</td>'+
                            '<td>Descripcion</td>'+
                            '<td>Pukllay</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + idGasto + '</td>'+
                            '<td>' + fechaGasto + '</td>'+
                            '<td>' + nombreGasto + '</td>'+
                            '<td>' + cantidadGasto + '</td>'+
                            '<td>' + descripcionGasto + '</td>'+
                            '<td>' + pukllay_idPukllay + '</td>'+
                        '</tr>';
                        
                    $('#tabla tbody').append(filas);
                    opcion=2;
                    $.ajax({
                        url: "bd/crudfrpukllay1.php",
                        type: "POST",
                        dataType: "json",
                        data: {opcion:opcion,pukllay:pukllay},
                        success: function(data1){
                            console.log(data1);
                            suma = data1[0].suma;

                            var filas = 
                                    '<td>Gasto total</td>';
                                
                            $('#headRow2').html(filas);
                            
                            var filas = '<tr>'+
                                    '<td>' + suma + '</td>'+
                                '</tr>';
                                
                            $('#r').html(filas);

                        }
                    });
                }
                if(reporte=="excedente"){

                    excedente = dat['excedente'];

                    var filas = 
                            '<td>Excedente (Ingreso total - Gasto total)</td>';
                        
                    $('#headRow').html(filas);
                    
                    var filas = '<tr>'+
                            '<td>' + excedente + '</td>'+
                        '</tr>';
                        
                    $('#r1').html(filas);
                }
            });                 
        }  

    });

    });

    
});