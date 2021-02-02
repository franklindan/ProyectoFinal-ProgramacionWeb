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
    $(".modal-title").text("Nuevo delegado");  
    $(".dniH").css("display", "block");          
    $("#modal").modal("show");     
    //idPremio=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    dniDele = fila.find('td:eq(0)').text();
    nombDele = fila.find('td:eq(1)').text();
    apelDele = fila.find('td:eq(2)').text();
    coreDele = fila.find('td:eq(3)').text();
    estadoUsuario = fila.find('td:eq(4)').text();

    $("#dniDele").val(dniDele);
    $("#nombDele").val(nombDele);
    $("#apelDele").val(apelDele);
    $("#coreDele").val(coreDele);
    $("#estadoUsuario").val(estadoUsuario);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar delegado");   
    $(".dniH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    dniDele = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3; //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de dni: "+dniDele+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperariordelegados.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniDele:dniDele},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniDele = $.trim($("#dniDele").val());
    nombDele = $.trim($("#nombDele").val());
    apelDele = $.trim($("#apelDele").val());
    coreDele = $.trim($("#coreDele").val());
    estadoUsuario = $.trim($("#estadoUsuario").val());
    $.ajax({
        url: "bd/crudoperariordelegados.php",
        type: "POST",
        dataType: "json",
        data: {dniDele:dniDele,nombDele:nombDele,apelDele:apelDele,coreDele:coreDele,estadoUsuario:estadoUsuario,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            dniDele = data[0].dniDele;            
            nombDele = data[0].nombDele;
            apelDele = data[0].apelDele;
            estadoUsuario = data[0].estadoUsuario;
            coreDele = data[0].coreDele;
            if(opcion == 1){
                tabla.row.add([dniDele,nombDele,apelDele,coreDele,estadoUsuario]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniDele,nombDele,apelDele,coreDele,estadoUsuario]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});