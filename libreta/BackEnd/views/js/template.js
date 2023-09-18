$(document).ready(function() {
    // Obtener la URL actual
    var urlActual = window.location.href;

    if(urlActual.includes('home')){

        $("#home").addClass('active');

    }else if (urlActual.includes('phonebook')) {
        
        $("#phonebook").addClass('active');

    }else if (urlActual.includes('countries')) {
        
        $("#countries").addClass('active');

    }else if (urlActual.includes('company')) {
        
        $("#company").addClass('active');

    }else if (urlActual.includes('departments')) {
        
        $("#departments").addClass('active');

    }else if (urlActual.includes('headquarters')) {
        
        $("#headquarters").addClass('active');

    }else if (urlActual.includes('users')) {
        
        $("#users").addClass('active');

    }

});