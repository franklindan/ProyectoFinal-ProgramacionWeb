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
    $(".modal-title").text("Nuevo jurado");  
    $(".dniH").css("display", "block");          
    $("#modal").modal("show");     
    //idPremio=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    dniJurado = fila.find('td:eq(0)').text();
    nombJurado = fila.find('td:eq(1)').text();
    apelJurado = fila.find('td:eq(2)').text();
    coreJurado = fila.find('td:eq(3)').text();
    estadoUsuario = fila.find('td:eq(4)').text();
    
    $("#nombJurado").val(nombJurado);
    $("#apelJurado").val(apelJurado);
    $("#coreJurado").val(coreJurado);
    $("#estadoUsuario").val(estadoUsuario);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar jurado");   
    $(".dniH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    dniJurado = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de dni: "+dniJurado+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperariorjurados.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniJurado:dniJurado},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniJurado = $.trim($("#dniJurado").val());
    nombJurado = $.trim($("#nombJurado").val());
    apelJurado = $.trim($("#apelJurado").val());
    coreJurado = $.trim($("#coreJurado").val());
    estadoUsuario = $.trim($("#estadoUsuario").val());
    $.ajax({
        url: "bd/crudoperariorjurados.php",
        type: "POST",
        dataType: "json",
        data: {dniJurado:dniJurado,nombJurado:nombJurado,apelJurado:apelJurado,coreJurado:coreJurado,estadoUsuario:estadoUsuario,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            dniJurado = data[0].dniJurado;            
            nombJurado = data[0].nombJurado;
            coreJurado = data[0].coreJurado;
            estadoUsuario = data[0].estadoUsuario;
            apelJurado = data[0].apelJurado;
            if(opcion == 1){
                tabla.row.add([dniJurado,nombJurado,apelJurado,coreJurado,estadoUsuario]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniJurado,nombJurado,apelJurado,coreJurado,estadoUsuario]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});