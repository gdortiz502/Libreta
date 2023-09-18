$(document).on('click', '.btnShowDepartment',function() {

    var IdDepartment = $(this).attr('IdDepartment');

    var data = new FormData();
    data.append("IdDepartment", IdDepartment);

    $.ajax({
		url: "ajax/department.ajax.php",
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

            $("#showDescriptionDepartment").html(Descripcion);

            $("#showEstatusDepartment").html(ShowEstatus);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditDepartment',function() {

    var IdDepartment = $(this).attr('IdDepartment');

    var data = new FormData();
    data.append("IdDepartment", IdDepartment);

    $.ajax({
		url: "ajax/department.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            var Descripcion = response["Descripcion"];
            var IdDepartamento = response["IdDepartamento"];

            $("#txtEditDescripcionDepartment").val(Descripcion);

            $("#txtEditIdDepartamento").val(IdDepartamento);

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnDeleteCompany', function(){

    var IdDepartment = $(this).attr("IdDepartment");

    var data = new FormData();
    data.append("IdDepartment", IdDepartment);

    $.ajax({
		url: "ajax/department.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de deshabilitar el departamento?',
                text: "¡Está acción no eliminara el departamento solo lo deshabilitara del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, deshabilitar departamento!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=departments&IdDepartamento="+response["IdDepartamento"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnActivarDepartamento', function(){

    var IdDepartment = $(this).attr("IdDepartment");

    var data = new FormData();
    data.append("IdDepartment", IdDepartment);

    $.ajax({
		url: "ajax/department.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de habilitar el departamento?',
                text: "¡Está acción solo habilitar el departamento del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, habilitar departamento!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=departments&IdDepartamento="+response["IdDepartamento"]+"&estatus="+response["Estatus"];
        
                }
            
            })

     	},
        error: function(response){

            console.log(response);

        }

	});

});