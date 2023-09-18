$(document).on("keyup", "#btnSearchContact", function (e) {
    
    e.preventDefault();

    var NombreContacto = $(this).val();
  
    var datos = new FormData();
    datos.append("NombreContacto", NombreContacto);

    var Contenido = "";

    $('.contactos').empty();
  
    $.ajax({
      url: "ajax/contact.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

        if(respuesta.length != 0){

          for (var i = 0; i < respuesta.length; i++) {

            var PrimerNombre = respuesta[i]["PrimerNombre"];
            var PrimerApellido = respuesta[i]["PrimerApellido"];
            var Puesto = respuesta[i]["Puesto"];
            var Codigo = respuesta[i]["Codigo"];
            var Extension = respuesta[i]["Extension"];
            var Telefono = respuesta[i]["Telefono"];
            var Correo = respuesta[i]["Correo"];
            var IdContacto = respuesta[i]["IdContacto"];
            var Imagen = respuesta[i]["Imagen"];
            var Departamento = respuesta[i]["Departamento"];
            var Sede = respuesta[i]["Sede"];
          
            Contenido += '<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">'+
                    '<div class="card bg-light d-flex flex-fill">'+
                      '<div class="card-header text-muted border-bottom-0">'+
                        '<i class="fas fa-building"></i> '+Departamento+' - '+Sede+''+
                      '</div>'+
                      '<div class="card-body pt-0">'+
                        '<div class="row">'+
                          '<div class="col-8">'+
                            '<h2 class="lead"><b>'+PrimerNombre+' '+PrimerApellido+'</b></h2>'+
                            '<p class="text-muted text-sm"><b>Puesto: </b> '+Puesto+' </p>'+
                            '<ul class="ml-4 mb-0 fa-ul text-muted">'+
                              '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-hashtag"></i></span> Código: '+Codigo+'</li>'+
                              '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Extensión: '+Extension+'</li>'+
                              '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-mobile"></i></span> Teléfono: '+Telefono+'</li>'+
                              '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Correo: <a href="mailto:'+Correo+'">'+Correo+'</a></li>'+
                            '</ul>'+
                          '</div>'+
                          '<div class="col-4 text-center">'
                          if(Imagen == '') {
                            
                             Contenido +='<img src="views/img/user.png" alt="user-avatar" class="img-circle img-fluid"></img>'
      
                          }else{
      
                            Contenido += '<img src="'+Imagen+'" alt="user-avatar" class="img-circle img-fluid"></img>'
      
                          }
                          
                          Contenido += '</div>'+
                        '</div>'+
                      '</div>'+
                      '<div class="card-footer">'+
                        '<div class="text-right">'+
                          '<a href="index.php?route=contact&IdContacto='+IdContacto+'" class="btn btn-sm btn-primary">'+
                          '<i class="fas fa-user"></i> Ver Contacto'+
                          '</a>'+
                        '</div>'+
                      '</div>'+
                    '</div>'+
                  '</div>';
  
          
  
                   
          }

        }else{

          Contenido += '<div class="col-12 mb-2">'+
                          '<h3 class="text-center text-muted">No se encontraron resultados con el nombre '+NombreContacto+'</h3>'+
                        '</div>';

        }

        $('.contactos').append(Contenido);
      
    },
      error: function (respuesta) {
        
        console.log(respuesta);
      
    },
  });
});
