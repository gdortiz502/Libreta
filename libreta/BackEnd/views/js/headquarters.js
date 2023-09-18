$(document).on('click', '.btnShowHeadquarter',function() {

    var IdSede = $(this).attr('IdSede');

    var data = new FormData();
    data.append("IdSede", IdSede);

    $.ajax({
		url: "ajax/headquarters.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            var IdCountry = response["Pais"];

            var data1 = new FormData();
            data1.append("IdCountry", IdCountry);

            var Descripcion = response["Descripcion"];
            var Direccion = response["Direccion"];
            var Estatus = response["Estatus"];

            if (Estatus == 1) {

                ShowEstatus += "<span class='bt btn-xs btn-success'> Activo </span>"
            
            }else{

                ShowEstatus += "<span class='bt btn-xs btn-danger'> Inactivo </span>"
            
            }

            $.ajax({
                url: "ajax/countries.ajax.php",
                method: "POST",
                data: data1,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(response1){

                    var Pais = response1["Descripcion"];


                    $("#showDescripcionHeadquarter").html(Descripcion);

                    $("#showPaisHeadquarter").html(Pais);

                    $("#showDireccionHeadquarter").html(Direccion);

                    $("#showEstatusHeadquarter").html(ShowEstatus);

                },
                error: function(response){

                    console.log(response);

                }

            });

            

            var ShowEstatus = "";

            if (Estatus == 1) {

                ShowEstatus += "<span class='bt btn-xs btn-success'> Activo </span>"
            
            }else{

                ShowEstatus += "<span class='bt btn-xs btn-danger'> Inactivo </span>"
            
            }

            $("#showDescriptionDepartment").html(Descripcion);

            $("#showEstatusDepartment").html(ShowEstatus);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditHeadQuarter',function() {

    var IdSede = $(this).attr('IdSede');

    var data = new FormData();
    data.append("IdSede", IdSede);

    $.ajax({
		url: "ajax/headquarters.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            $("#txtEditDescripcionSede").val(response["Descripcion"]);

            $("#ddPaisSedeEdit option[value="+response["Pais"]+"]").attr('selected', true);

            $("#txtDireccionEditSede").val(response["Direccion"]);

            $("#txtIdEditSede").val(response["IdSede"]);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnDeleteHeadquarter', function(){

    var IdSede = $(this).attr("IdSede");

    var data = new FormData();
    data.append("IdSede", IdSede);

    $.ajax({
		url: "ajax/headquarters.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de deshabilitar la sede?',
                text: "¡Está acción no eliminara la sede solo lo deshabilitara del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, deshabilitar sede!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=headquarters&IdSede="+response["IdSede"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnActivarHeadquarter', function(){

    var IdSede = $(this).attr("IdSede");

    var data = new FormData();
    data.append("IdSede", IdSede);

    $.ajax({
		url: "ajax/headquarters.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de habilitar la sede?',
                text: "¡Está acción solo habilitar la sede del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, habilitar sede!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=headquarters&IdSede="+response["IdSede"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});