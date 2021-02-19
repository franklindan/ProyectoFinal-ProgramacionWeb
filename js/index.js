$(document).ready(function(){   
    
    // $("#idPukllay").css("display", "none");
    
    // $(document).on("click", ".btnDelegado", function(){
    $("#formDelegado").submit(function(e){
        e.preventDefault();
        $(location).attr('href','#registrar');
        idPukllay = $.trim($("#idPukllay").val());
        dnid = $.trim($("#dnid").val());
        nombred = $.trim($("#nombred").val());
        apellidod = $.trim($("#apellidod").val());
        correod = $.trim($("#correod").val());
        contraseñad = $.trim($("#contraseñad").val());
        $.ajax({
            url: "bd/crudindex.php",
            type: "POST",
            dataType: "json",
            data: {usuarioUsuario:dnid,idPukllay:idPukllay},
            success: function(data){ 
                console.log(data);
                if(data){
                alert("El delegado de dni:"+data[1]+" ya existe.");
                }             
            }      
        }).fail( function() {
            $.ajax({
                url: "bd/crudindex.php",
                type: "POST",
                dataType: "json",
                data: {usuarioUsuario:dnid,nombDele:nombred,apelDele:apellidod,coreDele:correod,pswUsuario:contraseñad,idPukllay:idPukllay},
                success: function(){ 
                    alert("Se registro exitosamente al delegado de dni:"+dnid+".");
                    $("#formDelegado").trigger("reset");             
                }      
            }).fail( function() {
                alert("Datos incorrectos");    
            });        
        });
        // $("#formDelegado").trigger("reset");
        $(location).attr('href','#registrar');
    });
    
    // $(document).on("click", ".btnComparsa", function(){
    $("#formComparsa").submit(function(e){
        e.preventDefault();
        $(location).attr('href','#registrar');
        nombrec = $.trim($("#nombrec").val());
        procedencia = $.trim($("#procedencia").val());
        cantidad = $.trim($("#cantidad").val());
        categoria = $.trim($("#categoria").val());
        dnic = $.trim($("#dnic").val());
        idPukllayc = $.trim($("#idPukllayc").val());
        $.ajax({
            url: "bd/crudindex.php",
            type: "POST",
            dataType: "json",
            data: {nombrec:nombrec,idPukllayc:idPukllayc},
            success: function(data){ 
                console.log(data);
                if(data){
                alert("El nombre de comparsa: "+data[1]+" ya existe.");
                }             
            }        
        }).fail( function() {
            $.ajax({
                url: "bd/crudindex.php",
                type: "POST",
                dataType: "json",
                data: {dnic:dnic,idPukllayc:idPukllayc},
                success: function(data){ 
                    console.log(data);
                    if(data){
                    alert("El delegado de dni: "+data[6]+" ya registro una comparsa.");
                    }             
                }        
            }).fail( function() {
                $.ajax({
                    url: "bd/crudindex.php",
                    type: "POST",
                    dataType: "json",
                    data: {nombrec:nombrec,procedencia:procedencia,cantidad:cantidad,categoria:categoria,dnic:dnic},
                    success: function(){ 
                        alert("Se registro la comparsa exitosamente");
                        $("#formComparsa").trigger("reset");             
                    }        
                }).fail( function() {
                    alert("Datos incorrectos.");    
                });    
            });    
        }); 
        // $("#formComparsa").trigger("reset");
        $(location).attr('href','#registrar'); 
    }); 

    /* ---------------------------------------*/
    $(document).on("click", ".btnRe", function(){
        $(location).attr('href','#registrar'); 
    }); 
    $(document).on("click", ".btnCom", function(){
        alert("Se habilitará esta opción mas adelante"); 
    }); 
    
    // $(document).on("click", "#form1b", function(){ 
    $("#form1").submit(function(e){
        e.preventDefault();
        $(location).attr('href','#inicio');
        usuario = $.trim($("#form1d").val());
        password = $.trim($("#form1c").val());
        $.ajax({
            url: "bd/crudindex.php",
            type: "POST",
            dataType: "json",
            data: {dni:usuario,contraseña:password},
            success: function(data){ 
                //var datos=JSON.parse(data);
                console.log(data);
                alert("Bienvenido:"+data[3]);
    
                if("final indirecto"==data[3]){ 
                    url="./finalindirecto.php";
                   } else {
                    url="./"+data[3]+".php";
                   }
                $(location).attr('href',url);
            }        
        }).fail( function() {
            alert("Datos incorrectos.");
        });
        // $("#form1").trigger("reset");
        $(location).attr('href','#inicio');    
    });

    // $(document).on("click", "#form2b", function(){
    $("#form2").submit(function(e){
        e.preventDefault();            
        $(location).attr('href','#jurados');
        usuario = $.trim($("#form2d").val());
        password = $.trim($("#form2c").val());
        $.ajax({
            url: "bd/crudindex.php",
            type: "POST",
            dataType: "json",
            data: {dni:usuario,contraseña:password},
            success: function(data){ 
                //var datos=JSON.parse(data);
                console.log(data);
                alert("Bienvenido:"+data[3]);
    
                if("final indirecto"==data[3]){ 
                    url="./finalindirecto.php";
                   } else {
                    url="./"+data[3]+".php";
                   }
                $(location).attr('href',url);
            }        
        }).fail( function() {
            alert("Datos incorrectos.");
        });
        // $("#form2").trigger("reset");
        $(location).attr('href','#jurados');    
    });

// $(document).on("click", "#form3b", function(){ 
    $("#form3").submit(function(e){
        e.preventDefault();
        $(location).attr('href','#registrar');
        usuario = $.trim($("#form3d").val());
        password = $.trim($("#form3c").val());
        $.ajax({
            url: "bd/crudindex.php",
            type: "POST",
            dataType: "json",
            data: {dni:usuario,contraseña:password},
            success: function(data){ 
               //var datos=JSON.parse(data);
               console.log(data);
               alert("Bienvenido:"+data[3]);
    
               if("final indirecto"==data[3]){ 
                url="./finalindirecto.php";
               } else {
                url="./"+data[3]+".php";
               }
               $(location).attr('href',url);
            }        
        }).fail( function() {
            alert("Datos incorrectos.");
        });  
        // $("#form3").trigger("reset");
        $(location).attr('href','#registrar');   
    });
       
        
    });