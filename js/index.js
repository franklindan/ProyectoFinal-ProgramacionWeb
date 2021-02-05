$(document).ready(function(){   
    
// $("#idPukllay").css("display", "none");

$(document).on("click", ".btnDelegado", function(){
    idPukllay = $.trim($("#idPukllay").val());
    dnid = $.trim($("#dnid").val());
    nombred = $.trim($("#nombred").val());
    apellidod = $.trim($("#apellidod").val());
    correod = $.trim($("#correod").val());
    celulard = $.trim($("#celulard").val());
    $.ajax({
        url: "bd/crudindex.php",
        type: "POST",
        dataType: "json",
        data: {usuarioUsuario:dnid,nombDele:nombred,apelDele:apellidod,coreDele:correod,celuDele:celulard,idPukllay:idPukllay},
        success: function(){ 
            alert("Se registro el delegado exitosamente");             
        }      
    }).fail( function() {
        alert("Datos incorrectos.");    
    })  ;
    $(location).attr('href','#registrar');
    $("#formDelegado").trigger("reset");
});

$(document).on("click", ".btnComparsa", function(){
    nombrec = $.trim($("#nombrec").val());
    procedencia = $.trim($("#procedencia").val());
    cantidad = $.trim($("#cantidad").val());
    categoria = $.trim($("#categoria").val());
    dnic = $.trim($("#dnic").val());
    $.ajax({
        url: "bd/crudindex.php",
        type: "POST",
        dataType: "json",
        data: {nombrec:nombrec,procedencia:procedencia,cantidad:cantidad,categoria:categoria,dnic:dnic},
        success: function(){ 
            alert("Se registro la comparsa exitosamente");             
        }        
    }).fail( function() {
        alert("Datos incorrectos.");    
    }); 
    $(location).attr('href','#registrar');
    $("#formComparsa").trigger("reset"); 
}); 

$(document).on("click", ".btnRe", function(){
    $(location).attr('href','#registrar'); 
}); 
$(document).on("click", ".btnCom", function(){
    alert("Se habilitará esta opción mas adelante"); 
}); 
   
    
});