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
    $(".modal-title").text("Nuevo premio");  
    // $(".etapaH").css("display", "block");          
    $("#modal").modal("show");     
    idPremio=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    idPremio = fila.find('td:eq(0)').text();
    nombrePremio = fila.find('td:eq(1)').text();
    tipoPremio = fila.find('td:eq(2)').text();
    puestoPremio = fila.find('td:eq(3)').text();
    descripcionPremio = fila.find('td:eq(4)').text();
    
    $("#nombrePremio").val(nombrePremio);
    $("#tipoPremio").val(tipoPremio);
    $("#puestoPremio").val(puestoPremio);
    $("#descripcionPremio").val(descripcionPremio);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar premio");   
    // $(".etapaH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idPremio = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3; //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de id: "+idPremio+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperarioprpremios.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idPremio:idPremio},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    nombrePremio = $.trim($("#nombrePremio").val());
    tipoPremio = $.trim($("#tipoPremio").val());
    puestoPremio = $.trim($("#puestoPremio").val());
    descripcionPremio = $.trim($("#descripcionPremio").val());
    $.ajax({
        url: "bd/crudoperarioprpremios.php",
        type: "POST",
        dataType: "json",
        data: {idPremio:idPremio,nombrePremio:nombrePremio,tipoPremio:tipoPremio,puestoPremio:puestoPremio,descripcionPremio:descripcionPremio,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            idPremio = data[0].idPremio;            
            nombrePremio = data[0].nombrePremio;
            tipoPremio = data[0].tipoPremio;
            puestoPremio = data[0].puestoPremio;
            descripcionPremio = data[0].descripcionPremio;
            if(opcion == 1){
                tabla.row.add([idPremio,nombrePremio,tipoPremio,puestoPremio,descripcionPremio]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([idPremio,nombrePremio,tipoPremio,puestoPremio,descripcionPremio]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});