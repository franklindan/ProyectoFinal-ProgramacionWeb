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
    $(".dniH").css("display", "block");       
    $(".idH").css("display", "block");          
    $("#modal").modal("show");     
    // idComparsa=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    dniPart = fila.find('td:eq(0)').text();
    nombPart = fila.find('td:eq(1)').text();
    apelPart = fila.find('td:eq(2)').text();
    comparsa_idComparsa = fila.find('td:eq(3)').text();

    $("#dniPart").val(dniPart);
    $("#nombPart").val(nombPart);
    $("#apelPart").val(apelPart);
    $("#comparsa_idComparsa").val(comparsa_idComparsa);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar participante");   
    $(".dniH").css("display", "none");      
    $(".idH").css("display", "none");        
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    dniPart = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3; //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de dni: "+dniPart+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperariorparticipantes.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, dniPart:dniPart},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    dniPart = $.trim($("#dniPart").val());
    nombPart = $.trim($("#nombPart").val());
    apelPart = $.trim($("#apelPart").val());
    comparsa_idComparsa = $.trim($("#comparsa_idComparsa").val());
    // alert(dniPart);
    $.ajax({
        url: "bd/crudoperariorparticipantes.php",
        type: "POST",
        dataType: "json",
        data: {dniPart:dniPart,nombPart:nombPart,apelPart:apelPart,comparsa_idComparsa:comparsa_idComparsa,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            dniPart = data[0].dniPart;   
            nombPart = data[0].nombPart;         
            apelPart = data[0].apelPart;
            comparsa_idComparsa = data[0].comparsa_idComparsa;
            if(opcion == 1){
                tabla.row.add([dniPart,nombPart,apelPart,comparsa_idComparsa]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([dniPart,nombPart,apelPart,comparsa_idComparsa]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});