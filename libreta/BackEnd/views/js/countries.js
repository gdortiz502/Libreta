$(document).on('click', '.btnShowCountry',function() {

    var IdCountry = $(this).attr('IdPais');

    var data = new FormData();
    data.append("IdCountry", IdCountry);

    $.ajax({
		url: "ajax/countries.ajax.php",
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

            $("#showDescriptionCountry").html(Descripcion);

            $("#showEstatusContries").html(ShowEstatus);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditCountry',function() {

    var IdCountry = $(this).attr('IdPais');

    var data = new FormData();
    data.append("IdCountry", IdCountry);

    $.ajax({
		url: "ajax/countries.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            var Descripcion = response["Descripcion"];
            var IdPais = response["IdPais"];

            $("#txtEditDescripcionPais").val(Descripcion);

            $("#txtEditIdPais").val(IdPais);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnDeleteCountry', function(){

    var IdCountry = $(this).attr("IdPais");

    var data = new FormData();
    data.append("IdCountry", IdCountry);

    $.ajax({
		url: "ajax/countries.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de deshabilitar el pais?',
                text: "¡Está acción no eliminara el pais solo lo deshabilitara del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, deshabilitar pais!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=countries&IdPais="+response["IdPais"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnActivarCountry', function(){

    var IdCountry = $(this).attr("IdPais");

    var data = new FormData();
    data.append("IdCountry", IdCountry);

    $.ajax({
		url: "ajax/countries.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de habilitar el pais?',
                text: "¡Está acción solo habilitar el pais del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, habilitar pais!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=countries&IdPais="+response["IdPais"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});