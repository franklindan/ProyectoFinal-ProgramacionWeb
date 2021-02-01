$(document).ready(function(){
    tabla = $("#tabla").DataTable({
        //Idioma
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
            },
            "sProcessing":"Procesando...",
        }
    });

$('#listaPuk').on('change', function(){
    tabla.clear();
    etapa_fechaDia = $('#listaPuk').val();
    opcion = 5; //mostrar general
    $.ajax({
        url: "bd/crudjuradorcalificaciones.php",
        type: "POST",
        dataType: "json",
        data: {opcion:opcion,etapa_fechaDia:etapa_fechaDia},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {
                dniJurado = dat['dniJurado'];            
                nombreComp = dat['nombreComp'];
                puntajeCalificacion = dat['puntajeCalificacion'];
                descripcionCalificacion = dat['descripcionCalificacion'];
                lugarCalificacion = dat['lugarCalificacion'];
                if(opcion == 5){
                    tabla.row.add([dniJurado,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();
                }    
            });                 
        }        
    });
       
});  

});