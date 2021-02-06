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
    $(".modal-title").text("Nueva comparsa");  
    $(".dniH").css("display", "block");          
    $("#modal").modal("show");     
    idComparsa=null;   
    opcion = 1; //insertar
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    idComparsa = fila.find('td:eq(0)').text();
    nombreComp = fila.find('td:eq(1)').text();
    Procedencia = fila.find('td:eq(2)').text();
    Categoría = fila.find('td:eq(3)').text();
    CantidadPart = fila.find('td:eq(4)').text();
    Financiamiento = fila.find('td:eq(5)').text();
    delegado_dniDele = fila.find('td:eq(6)').text();

    $("#nombreComp").val(nombreComp);
    $("#Procedencia").val(Procedencia);
    $("#Categoría").val(Categoría);
    $("#CantidadPart").val(CantidadPart);
    $("#Financiamiento").val(Financiamiento);
    $("#delegado_dniDele").val(delegado_dniDele);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar comparsa");   
    $(".dniH").css("display", "none");         
    $("#modal").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    idComparsa = $(this).closest("tr").find('td:eq(0)').text();
    opcion = 3; //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro de id: "+idComparsa+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudoperariorcomparsas.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, idComparsa:idComparsa},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formModal").submit(function(e){
    e.preventDefault();    
    nombreComp = $.trim($("#nombreComp").val());
    Procedencia = $.trim($("#Procedencia").val());
    Categoría = $.trim($("#Categoría").val());
    CantidadPart = $.trim($("#CantidadPart").val());
    Financiamiento = $.trim($("#Financiamiento").val());
    delegado_dniDele = $.trim($("#delegado_dniDele").val());
    $.ajax({
        url: "bd/crudoperariorcomparsas.php",
        type: "POST",
        dataType: "json",
        data: {idComparsa:idComparsa,nombreComp:nombreComp,Procedencia:Procedencia,Categoria:Categoría,CantidadPart:CantidadPart,Financiamiento:Financiamiento,delegado_dniDele:delegado_dniDele,opcion:opcion},
        success: function(data){ 
            //var datos=JSON.parse(data);
            console.log(data);
            idComparsa = data[0].idComparsa;   
            nombreComp = data[0].nombreComp;         
            Procedencia = data[0].Procedencia;
            Categoría = data[0].Categoria;
            CantidadPart = data[0].CantidadPart;
            Financiamiento = data[0].Financiamiento;
            delegado_dniDele = data[0].delegado_dniDele;
            if(opcion == 1){
                tabla.row.add([idComparsa,nombreComp,Procedencia,Categoría,CantidadPart,Financiamiento,delegado_dniDele]).draw();}
            if(opcion == 2){
                tabla.row(fila).data([idComparsa,nombreComp,Procedencia,Categoría,CantidadPart,Financiamiento,delegado_dniDele]).draw();}               
        }        
    });
    $("#modal").modal("hide");    
    
});    
    
});