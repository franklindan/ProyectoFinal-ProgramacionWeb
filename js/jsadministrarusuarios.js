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
        url: "bd/crudadministrarusuarios.php",
        type: "POST",
        dataType: "json",
        data: {idPukllay:id,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data); 
            console.log(data);
            data.forEach(dat => {
                id = dat['idPukllay'];            
                usuario = dat['usuarioUsuario'];
                password = dat['paswUsuario'];
                tipo = dat['tipoUsuario'];
                estado = dat['estadoUsuario'];
                if(opcion == 4){
                    tabla.row.add([id,usuario,password,tipo,estado]).draw();
                }    
            });                 
        }        
    });
       
});

$("#btnNuevo").click(function(){
    $("#formModal").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo usuario");            
    $("#modal").modal("show");        
    id=$('#listaPuk').val();
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id=$('#listaPuk').val();
    usuario = fila.find('td:eq(1)').text();
    password = fila.find('td:eq(2)').text();
    tipo = fila.find('td:eq(3)').text();
    estado = fila.find('td:eq(4)').text();
    
    $("#usuario").val(usuario);
    $("#password").val(password);
    $("#tipo").val(tipo);
    $("#estado").val(estado);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar usuario");            
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id=$('#listaPuk').val();
    usuario = $(this).closest("tr").find('td:eq(1)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+usuario+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudadministrarusuarios.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, usuarioUsuario:usuario},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    usuario = $.trim($("#usuario").val());
    password = $.trim($("#password").val());
    tipo = $.trim($("#tipo").val());
    estado = $.trim($("#estado").val());
    $.ajax({
        url: "bd/crudadministrarusuarios.php",
        type: "POST",
        dataType: "json",
        data: {idPukllay:id,usuarioUsuario:usuario,paswUsuario:password,tipoUsuario:tipo,estadoUsuario:estado,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            id = data[0].idPukllay;            
            usuario = data[0].usuarioUsuario;
            password = data[0].paswUsuario;
            tipo = data[0].tipoUsuario;
            estado = data[0].estadoUsuario;
            if(opcion == 1){
                tabla.row.add([id,usuario,password,tipo,estado]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([id,usuario,password,tipo,estado]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});