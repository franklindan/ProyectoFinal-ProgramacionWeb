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
    $(".modal-title").text("Nueva etapa");  
    $(".etapaH").css("display", "block");          
    $("#modal").modal("show");     
    // idAuspiciador=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    fechaDia = fila.find('td:eq(0)').text();
    nombreDia = fila.find('td:eq(1)').text();
    descripcionDia = fila.find('td:eq(2)').text();
    lugarDia = fila.find('td:eq(3)').text();
    horaIniDia = fila.find('td:eq(4)').text();
    horaFinDia = fila.find('td:eq(5)').text();
    
    $("#fechaDia").val(fechaDia);
    $("#nombreDia").val(nombreDia);
    $("#descripcionDia").val(descripcionDia);
    $("#lugarDia").val(lugarDia);
    $("#horaIniDia").val(horaIniDia);
    $("#horaFinDia").val(horaFinDia);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar etapa");   
    $(".etapaH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    fechaDia = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de fecha etapa: "+fechaDia+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperariopretapas.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, fechaDia:fechaDia},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    // idAuspiciador = $.trim($("#idAuspiciador").val());
    fechaDia = $.trim($("#fechaDia").val());
    nombreDia = $.trim($("#nombreDia").val());
    descripcionDia = $.trim($("#descripcionDia").val());
    lugarDia = $.trim($("#lugarDia").val());
    horaIniDia = $.trim($("#horaIniDia").val());
    horaFinDia = $.trim($("#horaFinDia").val());
    $.ajax({
        url: "bd/crudoperariopretapas.php",
        type: "POST",
        dataType: "json",
        data: {fechaDia:fechaDia,nombreDia:nombreDia,descripcionDia:descripcionDia,lugarDia:lugarDia,horaIniDia:horaIniDia,horaFinDia:horaFinDia,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            fechaDia = data[0].fechaDia;            
            nombreDia = data[0].nombreDia;
            descripcionDia = data[0].descripcionDia;
            lugarDia = data[0].lugarDia;
            horaIniDia = data[0].horaIniDia;
            horaFinDia = data[0].horaFinDia;
            if(opcion == 1){
                tabla.row.add([fechaDia,nombreDia,descripcionDia,lugarDia,horaIniDia,horaFinDia]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([fechaDia,nombreDia,descripcionDia,lugarDia,horaIniDia,horaFinDia]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});