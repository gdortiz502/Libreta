const imageInput = document.getElementById('imgUserPhonebook');
const imagePreview = document.getElementById('imgUser');

if (imageInput) {
    imageInput.addEventListener('change', function () {
        // Verifica si se seleccionó un archivo
        if (imageInput.files && imageInput.files[0]) {
            // Crea un objeto URL para la imagen seleccionada
            const imageURL = URL.createObjectURL(imageInput.files[0]);
            // Establece la URL como fuente de la imagen de previsualización
            imagePreview.src = imageURL;
        }
    });
}

const imageInput1 = document.getElementById('imgUserPhonebookEdit');
const imagePreview1 = document.getElementById('imgUserEdit');

if (imageInput1) {
    imageInput1.addEventListener('change', function () {
        // Verifica si se seleccionó un archivo
        if (imageInput1.files && imageInput1.files[0]) {
            // Crea un objeto URL para la imagen seleccionada
            const imageURL = URL.createObjectURL(imageInput1.files[0]);
            // Establece la URL como fuente de la imagen de previsualización
            imagePreview1.src = imageURL;
        }
    });
}

$(document).on('click', '.btnShowContact',function() {

    var IdContact = $(this).attr('IdContacto');

    var data = new FormData();
    data.append("IdContact", IdContact);

    $.ajax({
		url: "ajax/phonebook.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            $("#showImgContact").attr('src',response["Imagen"]);
            $("#showPrimerNombreContact").html(response["PrimerNombre"]);
            $("#showSegundoNombreContact").html(response["SegundoNombre"]);
            $("#showTercerNombreContact").html(response["TercerNombre"]);
            $("#showPrimerApellidoContact").html(response["PrimerApellido"]);
            $("#showSegundoApellidoContact").html(response["SegundoApellido"]);
            $("#showApellidoCasadoContact").html(response["ApellidoCasado"]);
            
            if (response["FechaNacimiento"] != '0000-00-00') {
                $("#showFechaContacts").html(response["FechaNacimiento"]);
            }

            $("#showCorreoContacto").html(response["Correo"]);
            $("#showCodigoContacto").html(response["Codigo"]);
            $("#showExtensionContacto").html(response["Extension"]);
            $("#showTelefonoContacto").html(response["Telefono"]);
            $("#showPuestoContacto").html(response["Puesto"]);
            $("#showObservacionesContacto").html(response["Observaciones"]);


            var Sede = response["Sede"];

            var data1 = new FormData();
            data1.append("IdSede", Sede);

            $.ajax({
                url: "ajax/headquarters.ajax.php",
                method: "POST",
                data: data1,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(response1){

                    $("#showSedeContacto").html(response1["Descripcion"]);

                    var Pais = response1["Pais"];

                    var data4 = new FormData();
                    data4.append("IdCountry", Pais);

                    $.ajax({
                        url: "ajax/countries.ajax.php",
                        method: "POST",
                        data: data4,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType:"json",
                        success: function(response4){

                            $("#showPaisContacto").html(response4["Descripcion"]);

                        },
                        error: function(response4){

                            console.log(response4);

                        }

                    });

                },
                error: function(response1){

                    console.log(response1);

                }

            });

            var Departamento = response["Departamento"];

            var data2 = new FormData();
            data2.append("IdDepartment", Departamento);

            $.ajax({
                url: "ajax/department.ajax.php",
                method: "POST",
                data: data2,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(response2){

                    $("#showDepartamentoContacto").html(response2["Descripcion"]);

                },
                error: function(response2){

                    console.log(response2);

                }

            });

            var Empresa = response["Empresa"];

            var data3 = new FormData();
            data3.append("IdCompany", Empresa);

            $.ajax({
                url: "ajax/company.ajax.php",
                method: "POST",
                data: data3,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success: function(response3){

                    $("#showEmpresaContacto").html(response3["Descripcion"]);

                },
                error: function(response3){

                    console.log(response3);

                }

            });


     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnEditContact',function() {

    var IdContacto = $(this).attr('IdContacto');

    var data = new FormData();
    data.append("IdContact", IdContacto);

    $.ajax({
		url: "ajax/phonebook.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            $("#imgUserEdit").attr('src',response["Imagen"]);
            $("#imgUserEditActual").val(response["Imagen"]);
            $("#txtEditNombre").val(response["PrimerNombre"]);
            $("#txtEditIdContact").val(response["IdContacto"]);
            $("#txtEditSegundoNombre").val(response["SegundoNombre"]);
            $("#txtEditTercerNombre").val(response["TercerNombre"]);
            $("#txtEditPrimerApellido").val(response["PrimerApellido"]);
            $("#txtEditSegundoApellido").val(response["SegundoApellido"]);
            $("#txtEditApellidoCasado").val(response["ApellidoCasado"]);
            $("#txtEditFechaNacimiento").val(response["FechaNacimiento"]);
            $("#txtEditCorreo").val(response["Correo"]);
            $("#txtEditCodigo").val(response["Codigo"]);
            $("#txtEditExtension").val(response["Extension"]);
            $("#txtEditTelefono").val(response["Telefono"]);
            $("#txtEditPuesto").val(response["Puesto"]);
            $("#showObservacionesContacto").val(response["Observaciones"]);
            $("#ddEditSede option[value="+response["Sede"]+"]").attr('selected', true);
            $("#ddEditDepartamento option[value="+response["Departamento"]+"]").attr('selected', true);
            $("#ddEditEmpresa option[value="+response["Empresa"]+"]").attr('selected', true);
            

     	},
        error: function(response){

            console.log(response);

        }

	});

});

$(document).on('click', '.btnDeleteContact', function(){

    var IdContacto = $(this).attr("IdContacto");

    var data = new FormData();
    data.append("IdContact", IdContacto);

    $.ajax({
		url: "ajax/phonebook.ajax.php",
		method: "POST",
      	data: data,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(response){

            swal.fire({
                title: '¿Está seguro de eliminar el contacto?',
                text: "¡Está acción eliminará permanentemente el contacto del sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Si, eliminar contacto!'
            }).then(function(result){
            
                if(result.value){
        
                    window.location = "index.php?ruta=phonebook&IdContacto="+response["IdContacto"];
        
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

