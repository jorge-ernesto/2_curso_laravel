/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    
    //CONFIGURACION PARA OBTENER URL EN LARAVEL
    path = path.split('/');
    var path_ = path[0] + '/'+ path[1] + '/' + path[2] + '/' + path[3];
    var path__ = path[0] + '/'+ path[1] + '/' + path[2] + '/' + path[3] + '/' + path[4];
    console.log(path_);
    console.log(path__);
    //CERRAR CONFIGURACION PARA OBTENER URL EN LARAVEL

    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path_ || this.href === path__) {
            $(this).addClass("active");

            //CONFIGURACION PARA QUE EL ELEMENTO PADRE DEL ENLACE SE EXPANDA
            var parent = $(this).parents('div.collapse');
            parent.addClass('collapse show');
            //CERRAR CONFIGURACION PARA QUE EL ELEMENTO PADRE DEL ENLACE SE EXPANDA
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);
