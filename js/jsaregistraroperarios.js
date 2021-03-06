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
        url: "bd/crudaregistraroperarios.php",
        type: "POST",
        dataType: "json",
        data: {usuario_idPukllay:id,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {
                id = dat['usuario_idPukllay'];            
                dniOper = dat['dniOper'];
                nombOper = dat['nombOper'];
                apelOper = dat['apelOper'];
                usuario_usuarioUsuario = dat['usuario_usuarioUsuario'];
                if(opcion == 4){
                    tabla.row.add([dniOper,nombOper,apelOper,usuario_usuarioUsuario,id]).draw();
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
    dniOper = fila.find('td:eq(0)').text();
    nombOper = fila.find('td:eq(1)').text();
    apelOper = fila.find('td:eq(2)').text();
    usuario_usuarioUsuario = fila.find('td:eq(3)').text();
    
    $("#dni").val(dniOper);
    $("#nombre").val(nombOper);
    $("#apellido").val(apelOper);
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
    dniOper = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+dniOper+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudaregistraroperarios.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniOper:dniOper},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniOper = $.trim($("#dni").val());
    nombOper = $.trim($("#nombre").val());
    apelOper = $.trim($("#apellido").val());
    usuario_usuarioUsuario = $.trim($("#dni").val());
    $.ajax({
        url: "bd/crudaregistraroperarios.php",
        type: "POST",
        dataType: "json",
        data: {usuario_idPukllay:id,dniOper:dniOper,nombOper:nombOper,apelOper:apelOper,usuario_usuarioUsuario:usuario_usuarioUsuario,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            id = data[0].usuario_idPukllay;            
            dniOper = data[0].dniOper;
            nombOper = data[0].nombOper;
            apelOper = data[0].apelOper;
            usuario_usuarioUsuario = data[0].usuario_usuarioUsuario;
            if(opcion == 1){
                tabla.row.add([dniOper,nombOper,apelOper,usuario_usuarioUsuario,id]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniOper,nombOper,apelOper,usuario_usuarioUsuario,id]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});