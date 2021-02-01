$(document).ready(function(){
    tabla = $("#tabla").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button></div></div>"  
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
        
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    idPukllay = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();
    fechai = fila.find('td:eq(2)').text();
    fechaf = fila.find('td:eq(3)').text();
    edicion = fila.find('td:eq(4)').text();
    descripcion = fila.find('td:eq(5)').text();
    inversion = fila.find('td:eq(6)').text();
    organizador = fila.find('td:eq(7)').text();
    
    $("#nombre").val(nombre);
    $("#fechai").val(fechai);
    $("#fechaf").val(fechaf);
    $("#edicion").val(edicion);
    $("#descripcion").val(descripcion);
    $("#inversion").val(inversion);
    $("#organizador").val(organizador);
    opcion = 4; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar datos Pukllay");           
    $("#modal").modal("show");  
    
});

    
$("#formModal").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    fechai = $.trim($("#fechai").val());
    fechaf = $.trim($("#fechaf").val());
    edicion = $.trim($("#edicion").val());
    descripcion = $.trim($("#descripcion").val());
    inversion = $.trim($("#inversion").val());
    organizador = $.trim($("#organizador").val());
    $.ajax({
        url: "bd/crudaregistrarpukllay.php",
        type: "POST",
        dataType: "json",
        data: {idPukllay:idPukllay,fechaInicioPukllay:fechai,fechaFinPukllay:fechaf,edicionPukllay:edicion,descripcionPukllay:descripcion,inversionPukllay:inversion,nombrePukllay:nombre,representantePukllay:organizador,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            idPukllay = data[0].idPukllay;            
            fechai = data[0].fechaInicioPukllay;
            fechaf = data[0].fechaFinPukllay;
            edicion = data[0].edicionPukllay;
            descripcion = data[0].descripcionPukllay;
            inversion = data[0].inversionPukllay;
            nombre = data[0].nombrePukllay;
            organizador = data[0].representantePukllay;
            if(opcion == 4){
                tabla.row(fila).data([idPukllay,nombre,fechai,fechaf,edicion,descripcion,inversion,organizador]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});