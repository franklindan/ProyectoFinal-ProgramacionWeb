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
    $(".modal-title").text("Nuevo organizador");  
    $(".dniH").css("display", "block");          
    $("#modal").modal("show");        
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    dniOrg = fila.find('td:eq(0)').text();
    nombreOrg = fila.find('td:eq(1)').text();
    ApellidoOrg = fila.find('td:eq(2)').text();
    ocupacionorg = fila.find('td:eq(3)').text();
    telefonoOrg = fila.find('td:eq(4)').text();
    correoOrg = fila.find('td:eq(5)').text();
    
    $("#dni").val(dniOrg);
    $("#nombre").val(nombreOrg);
    $("#apellido").val(ApellidoOrg);
    $("#ocupacion").val(ocupacionorg);
    $("#celular").val(telefonoOrg);
    $("#correo").val(correoOrg);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar organizador");   
    $(".dniH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    dniOrg = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de dni: "+dniOrg+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperarioprorganizadores.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniOrg:dniOrg},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniOrg = $.trim($("#dni").val());
    nombreOrg = $.trim($("#nombre").val());
    ApellidoOrg = $.trim($("#apellido").val());
    ocupacionorg = $.trim($("#ocupacion").val());
    telefonoOrg = $.trim($("#celular").val());
    correoOrg = $.trim($("#correo").val());
    $.ajax({
        url: "bd/crudoperarioprorganizadores.php",
        type: "POST",
        dataType: "json",
        data: {dniOrg:dniOrg,nombreOrg:nombreOrg,ApellidoOrg:ApellidoOrg,ocupacionorg:ocupacionorg,telefonoOrg:telefonoOrg,correoOrg:correoOrg,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            dniOrg = data[0].dniOrg;            
            nombreOrg = data[0].nombreOrg;
            ApellidoOrg = data[0].ApellidoOrg;
            ocupacionorg = data[0].ocupacionorg;
            telefonoOrg = data[0].telefonoOrg;
            correoOrg = data[0].correoOrg;
            if(opcion == 1){
                tabla.row.add([dniOrg,nombreOrg,ApellidoOrg,ocupacionorg,telefonoOrg,correoOrg]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniOrg,nombreOrg,ApellidoOrg,ocupacionorg,telefonoOrg,correoOrg]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});