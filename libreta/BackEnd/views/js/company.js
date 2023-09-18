$(document).on('click', '.btnShowCompany',function() {

    var IdCompany = $(this).attr('IdCompany');

    var data = new FormData();
    data.append("IdCompany", IdCompany);

    $.ajax({
		url: "ajax/company.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            var Descripcion = response["Descripcion"];
            var Estatus = response["Estatus"];

            var ShowEstatus = "";

            if (Estatus == 1) {

                ShowEstatus += "<span class='bt btn-xs btn-success'> Activo </span>"
            
            }else{

                ShowEstatus += "<span class='bt btn-xs btn-danger'> Inactivo </span>"
            
            }

            $("#showDescriptionCompany").html(Descripcion);

            $("#showEstatusCompany").html(ShowEstatus);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditCompany',function() {

    var IdCompany = $(this).attr('IdCompany');

    var data = new FormData();
    data.append("IdCompany", IdCompany);

    $.ajax({
		url: "ajax/company.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            var Descripcion = response["Descripcion"];
            var IdEmpresa = response["IdEmpresa"];

            $("#txtEditDescripcionEmpresa").val(Descripcion);

            $("#txtEditIdEmpresa").val(IdEmpresa);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnDeleteCompany', function(){

    var IdCompany = $(this).attr("IdCompany");

    var data = new FormData();
    data.append("IdCompany", IdCompany);

    $.ajax({
		url: "ajax/company.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de deshabilitar la empresa?',
                text: "¡Está acción no eliminara la empresa solo lo deshabilitara del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, deshabilitar empresa!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=company&IdCompany="+response["IdEmpresa"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnActivarCompany', function(){

    var IdCompany = $(this).attr("IdCompany");

    var data = new FormData();
    data.append("IdCompany", IdCompany);

    $.ajax({
		url: "ajax/company.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de habilitar la empresa?',
                text: "¡Está acción solo habilitar la empresa del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, habilitar pais!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=company&IdCompany="+response["IdEmpresa"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});