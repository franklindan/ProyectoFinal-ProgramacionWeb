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
    
$('#listaPuk').on('change', function(){
    tabla.clear();
    id = $('#listaPuk').val();
    opcion = 4; //editar
    $.ajax({
        url: "bd/crudaregistrarusuariofinal.php",
        type: "POST",
        dataType: "json",
        data: {usuario_idPukllay:id,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {
                id = dat['usuario_idPukllay'];            
                dniFinal = dat['dniFinal'];
                nombreFinal = dat['nombreFinal'];
                apelFinal = dat['apelFinal'];
                usuario_usuarioUsuario = dat['usuario_usuarioUsuario'];
                if(opcion == 4){
                    tabla.row.add([dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,id]).draw();
                }    
            });                 
        }        
    });
       
});

$("#btnNuevo").click(function(){
    $("#formModal").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo operario");            
    $("#modal").modal("show");        
    id=$('#listaPuk').val();
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id=$('#listaPuk').val();
    dniFinal = fila.find('td:eq(0)').text();
    nombreFinal = fila.find('td:eq(1)').text();
    apelFinal = fila.find('td:eq(2)').text();
    usuario_usuarioUsuario = fila.find('td:eq(3)').text();
    
    $("#dni").val(dniFinal);
    $("#nombre").val(nombreFinal);
    $("#apellido").val(apelFinal);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar operario");            
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id=$('#listaPuk').val();
    dniFinal = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+dniFinal+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudaregistrarusuariofinal.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniFinal:dniFinal},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniFinal = $.trim($("#dni").val());
    nombreFinal = $.trim($("#nombre").val());
    apelFinal = $.trim($("#apellido").val());
    usuario_usuarioUsuario = $.trim($("#dni").val());
    $.ajax({
        url: "bd/crudaregistrarusuariofinal.php",
        type: "POST",
        dataType: "json",
        data: {usuario_idPukllay:id,dniFinal:dniFinal,nombreFinal:nombreFinal,apelFinal:apelFinal,usuario_usuarioUsuario:usuario_usuarioUsuario,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            id = data[0].usuario_idPukllay;            
            dniFinal = data[0].dniFinal;
            nombreFinal = data[0].nombreFinal;
            apelFinal = data[0].apelFinal;
            usuario_usuarioUsuario = data[0].usuario_usuarioUsuario;
            if(opcion == 1){
                tabla.row.add([dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,id]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniFinal,nombreFinal,apelFinal,usuario_usuarioUsuario,id]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});