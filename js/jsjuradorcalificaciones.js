$(document).ready(function(){
    tabla = $("#tabla").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnNuevo'>Calificar</button><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
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

    

    // tabla.clear();
    // etapa_fechaDia = $('#listaPuk').val();
    // opcion = 5; //filtrar
    // $.ajax({
    //     url: "bd/crudjuradorcalificaciones.php",
    //     type: "POST",
    //     dataType: "json",
    //     data: {opcion:opcion,etapa_fechaDia:etapa_fechaDia},
    //     success: function(data){ 
    //         //var datos=JSON.parse(data); 
    //         console.log(data);
    //         data.forEach(dat => {
    //             comparsa_idComparsa = dat['comparsa_idComparsa'];            
    //             nombreComp = dat['nombreComp'];
    //             puntajeCalificacion = "";
    //             descripcionCalificacion = "";
    //             lugarCalificacion = "";
    //             if(opcion == 4){
    //                 tabla.row.add([comparsa_idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();
    //             }    
    //         });                 
    //     }        
    // });


$('#listaPuk').on('change', function(){
    tabla.clear();
    etapa_fechaDia = $('#listaPuk').val();
    opcion = 4; //mostrar
    $.ajax({
        url: "bd/crudjuradorcalificaciones.php",
        type: "POST",
        dataType: "json",
        data: {opcion:opcion,etapa_fechaDia:etapa_fechaDia},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {
                comparsa_idComparsa = dat['idComparsa'];            
                nombreComp = dat['nombreComp'];
                puntajeCalificacion = dat['puntajeCalificacion'];
                descripcionCalificacion = dat['descripcionCalificacion'];
                lugarCalificacion = dat['lugarCalificacion'];
                if(opcion == 4){
                    tabla.row.add([comparsa_idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();
                }    
            });                 
        }        
    });
       
});

$(document).on("click", ".btnNuevo", function(){
    $("#formModal").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Calificar comparsa"); 
    $(".lugar-c").css("display", "block");            
    $("#modal").modal("show");        
    opcion = 1; //insertar
    fila = $(this).closest("tr");
    etapa_fechaDia=$('#listaPuk').val();
    comparsa_idComparsa = fila.find('td:eq(0)').text();
    nombreComp = fila.find('td:eq(1)').text();
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    etapa_fechaDia=$('#listaPuk').val();
    comparsa_idComparsa = fila.find('td:eq(0)').text();
    nombreComp = fila.find('td:eq(1)').text();
    puntajeCalificacion = fila.find('td:eq(2)').text();
    descripcionCalificacion = fila.find('td:eq(3)').text();
    lugarCalificacion = fila.find('td:eq(4)').text();

    $("#calificacion").val(puntajeCalificacion);
    $("#comentario").val(descripcionCalificacion);
    $("#lugar").val(lugarCalificacion);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar calificación de comparsa");
    $(".lugar-c").css("display", "none");            
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this).closest("tr");
    etapa_fechaDia=$('#listaPuk').val();
    comparsa_idComparsa = fila.find('td:eq(0)').text();
    lugarCalificacion = fila.find('td:eq(4)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar la calificación de la comparsa: "+comparsa_idComparsa+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudjuradorcalificaciones.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, etapa_fechaDia:etapa_fechaDia, comparsa_idComparsa:comparsa_idComparsa,lugarCalificacion:lugarCalificacion},
            success: function(data){
                console.log(data);
                comparsa_idComparsa = data[0].idComparsa;            
                nombreComp = data[0].nombreComp;
                puntajeCalificacion = "";
                descripcionCalificacion = "";
                lugarCalificacion = "";
                tabla.row(fila).data([comparsa_idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    comparsa_idComparsa = fila.find('td:eq(0)').text();
    nombreComp = fila.find('td:eq(1)').text();
    puntajeCalificacion = $.trim($("#calificacion").val());
    descripcionCalificacion = $.trim($("#comentario").val());
    lugarCalificacion = $.trim($("#lugar").val());
    $.ajax({
        url: "bd/crudjuradorcalificaciones.php",
        type: "POST",
        dataType: "json",
        data: {etapa_fechaDia:etapa_fechaDia,comparsa_idComparsa:comparsa_idComparsa,puntajeCalificacion:puntajeCalificacion,descripcionCalificacion:descripcionCalificacion,lugarCalificacion:lugarCalificacion,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            comparsa_idComparsa = data[0].idComparsa;            
            nombreComp = data[0].nombreComp;
            puntajeCalificacion = data[0].puntajeCalificacion;
            descripcionCalificacion = data[0].descripcionCalificacion;
            lugarCalificacion = data[0].lugarCalificacion;
            if(opcion == 1){
                tabla.row(fila).data([comparsa_idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([comparsa_idComparsa,nombreComp,puntajeCalificacion,descripcionCalificacion,lugarCalificacion]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});