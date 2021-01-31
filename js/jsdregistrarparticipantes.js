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
    $(".modal-title").text("Nuevo participante");            
    $("#modal").modal("show");        
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    dni = fila.find('td:eq(0)').text();
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    celular = fila.find('td:eq(3)').text();
    correo = fila.find('td:eq(4)').text();
    
    $("#dni").val(dni);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#celular").val(celular);
    $("#correo").val(correo);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar participante");            
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    dni = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+dni+"?");
    if(respuesta){
        $.ajax({
            url: "bd/cruddregistrarparticipantes.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniPart:dni},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dni = $.trim($("#dni").val());
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    celular = $.trim($("#celular").val());
    correo = $.trim($("#correo").val());
    $.ajax({
        url: "bd/cruddregistrarparticipantes.php",
        type: "POST",
        dataType: "json",
        data: {dniPart:dni,nombPart:nombre,apelPart:apellido,celuPart:celular,corePart:correo,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            dni = data[0].dniPart;            
            nombre = data[0].nombPart;
            apellido = data[0].apelPart;
            celular = data[0].celuPart;
            correo = data[0].corePart;
            if(opcion == 1){
                tabla.row.add([dni,nombre,apellido,celular,correo]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dni,nombre,apellido,celular,correo]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});