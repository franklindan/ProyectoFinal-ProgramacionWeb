$(document).ready(function(){
    tabla = $("#tabla").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
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
    
$("#btnNuevo").click(function(){
    $("#formModal").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Pukllay");
    $(".idC").css("display", "block");            
    $("#modal").modal("show");        
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();
    organizador = fila.find('td:eq(2)').text();
    
    $("#id").val(id);
    $("#nombre").val(nombre);
    $("#organizador").val(organizador);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Pukllay");   
    $(".idC").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el pukllay de: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudaregistrarpukllay.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idPukllay:id},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    id = $.trim($("#id").val());
    nombre = $.trim($("#nombre").val());
    organizador = $.trim($("#organizador").val());
    $.ajax({
        url: "bd/crudaregistrarpukllay.php",
        type: "POST",
        dataType: "json",
        data: {idPukllay:id,nombrePukllay:nombre,representantePukllay:organizador,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            id = data[0].idPukllay;            
            nombre = data[0].nombrePukllay;
            organizador = data[0].representantePukllay;
            if(opcion == 1){
                tabla.row.add([id,nombre,organizador]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([id,nombre,organizador]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});