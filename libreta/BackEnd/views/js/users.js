$(document).on('change', '#txtCorreoUsuario',function() {

    var Correo = $(this).val();

    var data = new FormData();
    data.append("Correo", Correo);

    $.ajax({
		url: "ajax/users.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            if(response[0]){

	    		toastr["warning"]("El correo ya existe en la base de datos", "Advertencia")

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "600",
                    "hideDuration": "600",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                $("#txtCorreoUsuario").val('');

	    	}

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnShowUser',function() {

    var IdUsuario = $(this).attr('IdUsuario');

    var data = new FormData();
    data.append("IdUsuario", IdUsuario);

    $.ajax({
		url: "ajax/users.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            $("#showPrimerNombreUsuario").html(response["PrimerNombre"]);
            $("#showSegundoNombreUsuario").html(response["SegundoNombre"]);
            $("#showTercerNombreUsuario").html(response["TercerNombre"]);
            $("#showPrimerApellidoUsuario").html(response["PrimerApellido"]);
            $("#showSegundoApellidoUsuario").html(response["SegundoApellido"]);
            $("#showApellidoCasadoUsuario").html(response["ApellidoCasado"]);
            
            $("#showCorreoUsuario").html(response["Correo"]);

            if (response["Estatus"] == 1) {
                $("#ShowEstatusUsuario").html('<span class="btn btn-xs btn-success">Activo</span>');
            }else{
                $("#ShowEstatusUsuario").html('<span class="btn btn-xs btn-danger">Inactivo</span>');
            }
            


            var Rol = response["Rol"];

            var data1 = new FormData();
            data1.append("IdRol", Rol);

            $.ajax({
                url: "ajax/users.ajax.php",
                method: "POST",
                data: data1,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(response1){

                    $("#showRolUsuario").html(response1["Descripcion"]);

                },
                error: function(response1){

                    console.log(response1);

                }

            });

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditUser',function() {

    var IdUsuario = $(this).attr('IdUsuario');

    var data = new FormData();
    data.append("IdUsuario", IdUsuario);

    $.ajax({
		url: "ajax/users.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            $("#txtIdUsuario").val(response["IdUsuario"]);
            $("#txtEditPrimerNombre").val(response["PrimerNombre"]);
            $("#txtEditSegundoNombre").val(response["SegundoNombre"]);
            $("#txtEditTercerNombre").val(response["TercerNombre"]);
            $("#txtEditPrimerApellido").val(response["PrimerApellido"]);
            $("#txtEditSegundoApellido").val(response["SegundoApellido"]);
            $("#txtEditApellidoCasada").val(response["ApellidoCasado"]);
            
            $("#txtEditCorreo").val(response["Correo"]);
            $("#txtPasswordActual").val(response["Password"]);
            $("#ddEditRol option[value='"+response["Rol"]+"']").attr('selected',true);
            

     	},
        error: function(response){

            console.log(response);

        }

	});
});

$(document).on('click', '.btnDeleteUser', function(){

    var IdUsuario = $(this).attr("IdUsuario");

    var data = new FormData();
    data.append("IdUsuario", IdUsuario);

    $.ajax({
		url: "ajax/users.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de deshabilitar el usuario?',
                text: "¡Está acción solo deshabilitara el usuario del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, deshabilitar usuario!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=users&IdUsuario="+response["IdUsuario"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnActivarUsuario', function(){

    var IdUsuario = $(this).attr("IdUsuario");

    var data = new FormData();
    data.append("IdUsuario", IdUsuario);

    $.ajax({
		url: "ajax/users.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de habilitar el usuario?',
                text: "¡Está acción solo habilitar el usuario del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, habilitar usuario!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=users&IdUsuario="+response["IdUsuario"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

