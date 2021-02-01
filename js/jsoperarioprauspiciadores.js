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
    $(".modal-title").text("Nuevo auspiciador");  
    // $(".dniH").css("display", "block");          
    $("#modal").modal("show");     
    idAuspiciador=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    idAuspiciador = fila.find('td:eq(0)').text();
    nombreAuspiciador = fila.find('td:eq(1)').text();
    rucAuspiciador = fila.find('td:eq(2)').text();
    telefonoAuspiciador = fila.find('td:eq(3)').text();
    correoAuspiciador = fila.find('td:eq(4)').text();
    montoAuspiciador = fila.find('td:eq(5)').text();
    descripcionAuspiciador = fila.find('td:eq(6)').text();
    
    $("#nombreAuspiciador").val(nombreAuspiciador);
    $("#rucAuspiciador").val(rucAuspiciador);
    $("#telefonoAuspiciador").val(telefonoAuspiciador);
    $("#correoAuspiciador").val(correoAuspiciador);
    $("#montoAuspiciador").val(montoAuspiciador);
    $("#descripcionAuspiciador").val(descripcionAuspiciador);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar auspiciador");   
    // $(".dniH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idAuspiciador = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+idAuspiciador+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperarioprauspiciadores.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idAuspiciador:idAuspiciador},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    // idAuspiciador = $.trim($("#idAuspiciador").val());
    nombreAuspiciador = $.trim($("#nombreAuspiciador").val());
    rucAuspiciador = $.trim($("#rucAuspiciador").val());
    telefonoAuspiciador = $.trim($("#telefonoAuspiciador").val());
    correoAuspiciador = $.trim($("#correoAuspiciador").val());
    montoAuspiciador = $.trim($("#montoAuspiciador").val());
    descripcionAuspiciador = $.trim($("#descripcionAuspiciador").val());
    $.ajax({
        url: "bd/crudoperarioprauspiciadores.php",
        type: "POST",
        dataType: "json",
        data: {idAuspiciador:idAuspiciador,nombreAuspiciador:nombreAuspiciador,rucAuspiciador:rucAuspiciador,telefonoAuspiciador:telefonoAuspiciador,correoAuspiciador:correoAuspiciador,montoAuspiciador:montoAuspiciador,descripcionAuspiciador:descripcionAuspiciador,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            idAuspiciador = data[0].idAuspiciador;            
            nombreAuspiciador = data[0].nombreAuspiciador;
            rucAuspiciador = data[0].rucAuspiciador;
            telefonoAuspiciador = data[0].telefonoAuspiciador;
            correoAuspiciador = data[0].correoAuspiciador;
            montoAuspiciador = data[0].montoAuspiciador;
            descripcionAuspiciador = data[0].descripcionAuspiciador;
            if(opcion == 1){
                tabla.row.add([idAuspiciador,nombreAuspiciador,rucAuspiciador,telefonoAuspiciador,correoAuspiciador,montoAuspiciador,descripcionAuspiciador]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([idAuspiciador,nombreAuspiciador,rucAuspiciador,telefonoAuspiciador,correoAuspiciador,montoAuspiciador,descripcionAuspiciador]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});