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
    $(".modal-title").text("Nuevo gasto");  
    // $(".etapaH").css("display", "block");          
    $("#modal").modal("show");     
    idGasto=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    idGasto = fila.find('td:eq(0)').text();
    nombreGasto = fila.find('td:eq(1)').text();
    cantidadGasto = fila.find('td:eq(2)').text();
    descripcionGasto = fila.find('td:eq(3)').text();
    fechaGasto = fila.find('td:eq(4)').text();
    
    $("#nombreGasto").val(nombreGasto);
    $("#cantidadGasto").val(cantidadGasto);
    $("#descripcionGasto").val(descripcionGasto);
    $("#fechaGasto").val(fechaGasto);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar gasto");   
    // $(".etapaH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idGasto = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de id: "+idGasto+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperarioprgastos.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idGasto:idGasto},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    nombreGasto = $.trim($("#nombreGasto").val());
    cantidadGasto = $.trim($("#cantidadGasto").val());
    descripcionGasto = $.trim($("#descripcionGasto").val());
    fechaGasto = $.trim($("#fechaGasto").val());
    $.ajax({
        url: "bd/crudoperarioprgastos.php",
        type: "POST",
        dataType: "json",
        data: {idGasto:idGasto,nombreGasto:nombreGasto,cantidadGasto:cantidadGasto,descripcionGasto:descripcionGasto,fechaGasto:fechaGasto,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            idGasto = data[0].idGasto;            
            nombreGasto = data[0].nombreGasto;
            cantidadGasto = data[0].cantidadGasto;
            descripcionGasto = data[0].descripcionGasto;
            fechaGasto = data[0].fechaGasto;
            if(opcion == 1){
                tabla.row.add([idGasto,nombreGasto,cantidadGasto,descripcionGasto,fechaGasto]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([idGasto,nombreGasto,cantidadGasto,descripcionGasto,fechaGasto]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});