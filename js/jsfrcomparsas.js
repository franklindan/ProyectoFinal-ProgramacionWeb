$(document).ready(function(){   
    
    $('#listaReporte').on('change', function(){
        $('#tabla thead td').remove();
        $('#tabla tbody td').remove();
        $("#listaPuk").val('0');
        reporte = $('#listaReporte').val();
        $.ajax({
            url: "bd/crudfrcomparsas.php",
            type: "POST",
            dataType: "json",
            data: {reporte:reporte},
            success: function(data){ 
                //var datos=JSON.parse(data); 
                console.log(data);
                i=1;
                data.forEach(dat => {       
    
                    if(reporte=="comparsa"){
    
                        idComparsa = dat['idComparsa'];      
                        nombreComp = dat['nombreComp'];
                        Procedencia = dat['Procedencia'];
                        Categoría = dat['Categoria'];
                        CantidadPart = dat['CantidadPart'];
                        Financiamiento = dat['Financiamiento'];
                        delegado_dniDele = dat['delegado_dniDele'];
                        idPukllay = dat['usuario_idPukllay'];
    
                        var filas = 
                                '<td>Id</td>'+
                                '<td>Comparsa</td>'+
                                '<td>Procedencia</td>'+
                                '<td>Caegoría</td>'+
                                '<td>Participantes</td>'+
                                '<td>Financiamiento</td>'+
                                '<td>Delegado</td>'+
                                '<td>Pukllay</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + idComparsa + '</td>'+
                                '<td>' + nombreComp + '</td>'+
                                '<td>' + Procedencia + '</td>'+
                                '<td>' + Categoría + '</td>'+
                                '<td>' + CantidadPart + '</td>'+
                                '<td>' + Financiamiento + '</td>'+
                                '<td>' + delegado_dniDele + '</td>'+
                                '<td>' + idPukllay + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                    }
                    if(reporte=="participante"){
                        dniPart = dat['dniPart'];      
                        nombPart = dat['nombPart'];
                        apelPart = dat['apelPart'];
                        celuPart = dat['celuPart'];
                        corePart = dat['corePart'];
                        tipoPart = dat['tipoPart'];
                        comparsa_idComparsa = dat['comparsa_nombreComp'];
                        idPukllay = dat['usuario_idPukllay'];
    
                        var filas = 
                                '<td>Dni</td>'+
                                '<td>Nombre</td>'+
                                '<td>Apellido</td>'+
                                '<td>Celular</td>'+
                                '<td>Correo</td>'+
                                '<td>Tipo</td>'+
                                '<td>Comparsa</td>'+
                                '<td>Pukllay</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + dniPart + '</td>'+
                                '<td>' + nombPart + '</td>'+
                                '<td>' + apelPart + '</td>'+
                                '<td>' + celuPart + '</td>'+
                                '<td>' + corePart + '</td>'+
                                '<td>' + tipoPart + '</td>'+
                                '<td>' + comparsa_idComparsa + '</td>'+
                                '<td>' + idPukllay + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                    }
                    if(reporte=="ranking"){
                        nombreComp = dat['nombreComp'];      
                        Puntaje_total = dat['Puntaje_total'];
    
                        var filas = 
                                '<td>Puesto</td>'+
                                '<td>Nombre comparsa</td>'+
                                '<td>Puntaje total</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + i + '</td>'+
                                '<td>' + nombreComp + '</td>'+
                                '<td>' + Puntaje_total + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                        i++;
                    }
                });                 
            }  
    
        });
        
          
    
    
    
    
    }); 
    
    $('#listaPuk').on('change', function(){
    
        $('#tabla thead td').remove();
        $('#tabla tbody td').remove();
        reporte = $('#listaReporte').val();
        pukllay = $('#listaPuk').val();
        $.ajax({
            url: "bd/crudfrcomparsas.php",
            type: "POST",
            dataType: "json",
            data: {reporte:reporte,pukllay:pukllay},
            success: function(data){ 
                //var datos=JSON.parse(data); 
                console.log(data);
                i=1;
                data.forEach(dat => {       
    
                    if(reporte=="comparsa"){
    
                        idComparsa = dat['idComparsa'];      
                        nombreComp = dat['nombreComp'];
                        Procedencia = dat['Procedencia'];
                        Categoría = dat['Categoria'];
                        CantidadPart = dat['CantidadPart'];
                        Financiamiento = dat['Financiamiento'];
                        delegado_dniDele = dat['delegado_dniDele'];
                        idPukllay = dat['usuario_idPukllay'];
    
                        var filas = 
                                '<td>Id</td>'+
                                '<td>Comparsa</td>'+
                                '<td>Procedencia</td>'+
                                '<td>Caegoría</td>'+
                                '<td>Participantes</td>'+
                                '<td>Financiamiento</td>'+
                                '<td>Delegado</td>'+
                                '<td>Pukllay</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + idComparsa + '</td>'+
                                '<td>' + nombreComp + '</td>'+
                                '<td>' + Procedencia + '</td>'+
                                '<td>' + Categoría + '</td>'+
                                '<td>' + CantidadPart + '</td>'+
                                '<td>' + Financiamiento + '</td>'+
                                '<td>' + delegado_dniDele + '</td>'+
                                '<td>' + idPukllay + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                    }
                    if(reporte=="participante"){
                        dniPart = dat['dniPart'];      
                        nombPart = dat['nombPart'];
                        apelPart = dat['apelPart'];
                        celuPart = dat['celuPart'];
                        corePart = dat['corePart'];
                        tipoPart = dat['tipoPart'];
                        comparsa_idComparsa = dat['comparsa_nombreComp'];
                        idPukllay = dat['usuario_idPukllay'];
    
                        var filas = 
                                '<td>Dni</td>'+
                                '<td>Nombre</td>'+
                                '<td>Apellido</td>'+
                                '<td>Celular</td>'+
                                '<td>Correo</td>'+
                                '<td>Tipo</td>'+
                                '<td>Comparsa</td>'+
                                '<td>Pukllay</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + dniPart + '</td>'+
                                '<td>' + nombPart + '</td>'+
                                '<td>' + apelPart + '</td>'+
                                '<td>' + celuPart + '</td>'+
                                '<td>' + corePart + '</td>'+
                                '<td>' + tipoPart + '</td>'+
                                '<td>' + comparsa_idComparsa + '</td>'+
                                '<td>' + idPukllay + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                    }
                    if(reporte=="ranking"){
                        nombreComp = dat['nombreComp'];      
                        Puntaje_total = dat['Puntaje_total'];
    
                        var filas = 
                                '<td>Puesto</td>'+
                                '<td>Nombre comparsa</td>'+
                                '<td>Puntaje total</td>';
                            
                        $('#headRow').html(filas);
                        
                        var filas = '<tr>'+
                                '<td>' + i + '</td>'+
                                '<td>' + nombreComp + '</td>'+
                                '<td>' + Puntaje_total + '</td>'+
                            '</tr>';
                            
                        $('#tabla tbody').append(filas);
                        i++;
                    }
                });                 
            }  
    
        });
    
        });  
        
    });