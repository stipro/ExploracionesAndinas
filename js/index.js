var navMainnav_container = document.createElement("nav");
navMainnav_container.setAttribute("id", "mainnav-container");

var data = '';
// Traer Menu
const fetchNav = async (id_Usuario) => {
    const body = new FormData();
    body.append("data", JSON.stringify(id_Usuario));
    const res = await fetch('./../../../controllers/controllerNav.php', {
        method: "POST",
        body
    });
    data = await res.json()
    pintarNav(data);
}
const pintarHeader = () => {
    const contenedor = document.querySelector("#container");
    const navbar_Antiguo = document.querySelector("#navbar");

    var headerNavBar = document.createElement("header");
    headerNavBar.setAttribute("id", "navbar");

    headerNavBar.innerHTML = '\
        <div id="navbar-container" class="boxed">\
            <!--Brand logo & name-->\
            <!--================================-->\
            <div class="navbar-header">\
                <a href="index.html" class="navbar-brand">\
                    <img src="./../../../img/logo_letra.png" alt="Nifty Logo" class="brand-icon">\
                    <div class="brand-title">\
                        <span class="brand-text">Sistema Exploraciones Andinas</span>\
                    </div>\
                </a>\
            </div>\
            <!--================================-->\
            <!--End brand logo & name-->\
            <!--Navbar Dropdown-->\
            <!--================================-->\
            <div class="navbar-content">\
                <ul class="nav navbar-top-links">\
                    <!--Navigation toogle button-->\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <li class="tgl-menu-btn">\
                        <a class="mainnav-toggle slide" href="#">\
                            <i class="demo-pli-list-view"></i>\
                        </a>\
                    </li>\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <!--End Navigation toogle button-->\
                    <!--Search-->\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <li>\
                        <div class="custom-search-form">\
                            <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">\
                                <i class="demo-pli-magnifi-glass"></i>\
                            </label>\
                            <form>\
                                <div class="search-container collapse" id="nav-searchbox">\
                                    <input id="search-input" type="text" class="form-control" placeholder="Escriba para buscar...">\
                                </div>\
                            </form>\
                        </div>\
                    </li>\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <!--End Search-->\
                </ul>\
                <ul class="nav navbar-top-links">\
                    <!--Mega dropdown-->\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <li class="mega-dropdown">\
                        <a href="#" class="mega-dropdown-toggle">\
                            <i class="demo-pli-layout-grid"></i>\
                        </a>\
                        <div class="dropdown-menu mega-dropdown-menu">\
                            <div class="row">\
                                <div class="col-sm-4 col-md-3">\
                                    <!--Mega menu list-->\
                                    <ul class="list-unstyled">\
                                        <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>\
                                        <li><a href="#">Perfil</a></li>\
                                        <li><a href="#">Resultado de búsqueda</a></li>\
                                        <li><a href="#">Preguntas más frecuentes</a></li>\
                                        <li><a href="#">Bloqueo de pantalla</a></li>\
                                        <li><a href="#">Mantenimiento</a></li>\
                                        <li><a href="#">Factura</a></li>\
                                        <li><a href="#" class="disabled">Discapacitado</a></li>\
                                    </ul>\
                                </div>\
                                <div class="col-sm-4 col-md-3">\
                                    <!--Mega menu list-->\
                                    <ul class="list-unstyled">\
                                        <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>\
                                        <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>\
                                        <li><a href="#">Read Message</a></li>\
                                        <li><a href="#">Compose</a></li>\
                                        <li><a href="#">Template</a></li>\
                                    </ul>\
                                    <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>\
                                    <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>\
                                </div>\
                                <div class="col-sm-4 col-md-3">\
                                    <!--Mega menu list-->\
                                    <ul class="list-unstyled">\
                                        <li>\
                                            <a href="#" class="media mar-btm">\
                                                <span class="badge badge-success pull-right">90%</span>\
                                                <div class="media-left">\
                                                    <i class="demo-pli-data-settings icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="text-semibold text-main mar-no">Data Backup</p>\
                                                    <small class="text-muted">This is the item description</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a href="#" class="media mar-btm">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-support icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="text-semibold text-main mar-no">Support</p>\
                                                    <small class="text-muted">This is the item description</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a href="#" class="media mar-btm">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-computer-secure icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="text-semibold text-main mar-no">Security</p>\
                                                    <small class="text-muted">This is the item description</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a href="#" class="media mar-btm">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-map-2 icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="text-semibold text-main mar-no">Location</p>\
                                                    <small class="text-muted">This is the item description</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                    </ul>\
                                </div>\
                                <div class="col-sm-12 col-md-3">\
                                    <p class="dropdown-header"><i class="demo-pli-file-jpg icon-lg icon-fw"></i> Gallery</p>\
                                    <div class="row img-gallery">\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-1.jpeg" alt="thumbs">\
                                        </div>\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-3.jpeg" alt="thumbs">\
                                        </div>\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-2.jpeg" alt="thumbs">\
                                        </div>\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-4.jpeg" alt="thumbs">\
                                        </div>\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-6.jpeg" alt="thumbs">\
                                        </div>\
                                        <div class="col-xs-4">\
                                            <img class="img-responsive" src="./../../../img/thumbs/img-5.jpeg" alt="thumbs">\
                                        </div>\
                                    </div>\
                                    <a href="#" class="btn btn-block btn-primary">Browse Gallery</a>\
                                </div>\
                            </div>\
                        </div>\
                    </li>\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <!--End mega dropdown-->\
                    <!--Notification dropdown-->\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <li class="dropdown">\
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">\
                            <i class="demo-pli-bell"></i>\
                            <span class="badge badge-header badge-danger"></span>\
                        </a>\
                        <!--Notification dropdown menu-->\
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">\
                            <div class="nano scrollable">\
                                <div class="nano-content">\
                                    <ul class="head-list">\
                                        <li>\
                                            <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-data-settings icon-2x text-main"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="text-nowrap text-main text-semibold">HDD está lleno</p>\
                                                    <div class="progress progress-sm mar-no">\
                                                        <div style="width: 95%;" class="progress-bar progress-bar-danger">\
                                                            <span class="sr-only">95% Complete</span>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a class="media" href="#">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-file-edit icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="mar-no text-nowrap text-main text-semibold">Escribir un artículo de noticias</p>\
                                                    <small>Última actualización hace 8 horas</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a class="media" href="#">\
                                                <span class="label label-info pull-right">New</span>\
                                                <div class="media-left">\
                                                    <i class="demo-pli-speech-bubble-7 icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="mar-no text-nowrap text-main text-semibold">Clasificación de comentarios</p>\
                                                    <small>Última actualización hace 8 horas</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a class="media" href="#">\
                                                <div class="media-left">\
                                                    <i class="demo-pli-add-user-star icon-2x"></i>\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="mar-no text-nowrap text-main text-semibold">Nuevos usuario registrado</p>\
                                                    <small>hace 4 minutos</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a class="media" href="#">\
                                                <div class="media-left">\
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="./../../../img/profile-photos/9.png">\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="mar-no text-nowrap text-main text-semibold">Lucía te envió un mensaje</p>\
                                                    <small>hace 30 minutos</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                        <li>\
                                            <a class="media" href="#">\
                                                <div class="media-left">\
                                                    <img class="img-circle img-sm" alt="Profile Picture" src="./../../../img/profile-photos/3.png">\
                                                </div>\
                                                <div class="media-body">\
                                                    <p class="mar-no text-nowrap text-main text-semibold">Jackson te envió un mensaje</p>\
                                                    <small>hace 40 minutos</small>\
                                                </div>\
                                            </a>\
                                        </li>\
                                    </ul>\
                                </div>\
                            </div>\
                            <!--Dropdown footer-->\
                            <div class="pad-all bord-top">\
                                <a href="#" class="btn-link text-main box-block">\
                                    <i class="pci-chevron chevron-right pull-right"></i>Mostrar todas las notificaciones\
                                </a>\
                            </div>\
                        </div>\
                    </li>\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <!--End notifications dropdown-->\
                    <!--User dropdown-->\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <li id="dropdown-user" class="dropdown">\
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">\
                            <span class="ic-user pull-right">\
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                                <!--You can use an image instead of an icon.-->\
                                <!--<img class="img-circle img-user media-object" src="./../../../img/profile-photos/1.png" alt="Profile Picture">-->\
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                                <i class="demo-pli-male"></i>\
                            </span>\
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                            <!--You can also display a user name in the navbar.-->\
                            <!--<div class="username hidden-xs">Aaron Chavez</div>-->\
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                        </a>\
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">\
                            <ul class="head-list">\
                                <li>\
                                    <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Perfil</a>\
                                </li>\
                                <li>\
                                    <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Mensajes</a>\
                                </li>\
                                <li>\
                                    <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Ajustes</a>\
                                </li>\
                                <li>\
                                    <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Bloquear pantalla</a>\
                                </li>\
                                <li>\
                                    <a href="./../controllers/CtrlSalir.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión</a>\
                                </li>\
                            </ul>\
                        </div>\
                    </li>\
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->\
                    <!--End user dropdown-->\
                    <!--<li>\
                        <a href="#" class="aside-toggle">\
                            <i class="demo-pli-dot-vertical"></i>\
                        </a>\
                    </li>-->\
                </ul>\
            </div>\
            <!--================================-->\
            <!--End Navbar Dropdown-->\
        </div>';
    contenedor.replaceChild(headerNavBar, navbar_Antiguo);
}
// Pintar productos
const pintarNav = data => {
    const mainnav_menu = document.getElementById('mainnav-menu')
    const templateModulo = document.getElementById('template-modulo').content
    console.log(templateModulo);
    const templateMenus = document.getElementById('template-menu').content
    var li = document.createElement(li);
    var ul = document.createElement(ul);
    const fragmentModulo = document.createDocumentFragment()
    const fragmentmenu = document.createDocumentFragment()

    var modulo = 'false';
    var menu = 'false';
    var submenu = 'false';
    var template_Modulo = '';
    var template_Menu = '';
    var template_subMenu = '';

    for (var mo = 0; mo < data.length; mo++) {
        // Almaceno modulo en variable
        var nextModulo = data[mo]["nombre_modulo"];
        // Comparacion
        if (modulo !== nextModulo) {
            // Recorrer Menu
            for (var me = 0; me < data.length; me++) {
                // Almaceno menu en variable
                nextMenu = data[me]["nombre_menu"];
                // Comparacion
                if (data[mo]["nombre_modulo"] == data[me]["nombre_modulo"]) {
                    // Comparacion
                    if (menu != nextMenu) {

                        if (data[me]["link_menu"] !== '/') {
                            template_Menu += '<!--Submenu-->\
                                            <ul class="collapse">\
                                                <li>\
                                                    <a href="./../' + data[me]["link_modulo"] + '/' + data[me]["link_menu"] + '"><i class="fa fa-group"></i>' + data[me]["nombre_menu"] + '</a>\
                                                </li>\
                                            </ul>';

                        } else {
                            // templateMenus.querySelector('li a').textContent = data[me]["nombre_menu"];
                            const cloneMenus = templateMenus.cloneNode(true)
                            // fragmentmenu.appendChild(cloneMenus) 
                            template_subMenu += '<ul class="collapse">';
                            for (var sme = 0; sme < data.length; sme++) {
                                // Almaceno submenu en variable
                                nextsubMenu = data[sme]["nombre_submenu"];
                                if (data[me]["nombre_menu"] == data[sme]["nombre_menu"]) {

                                    if (submenu != nextsubMenu) {
                                        template_subMenu += '\
                                                <li><a href="./../' + data[sme]["link_modulo"] + '/' + data[sme]["link_submenu"] + '">' + data[sme]["nombre_submenu"] + '</a></li>\
                                            ';
                                        submenu = data[sme]["nombre_submenu"]
                                    }
                                }
                            }
                            template_subMenu += '</ul>';
                            template_Menu += '<!--Submenu-->\
                                            <ul class="collapse">\
                                                <li>\
                                                    <a href="#"><i class="fa fa-group"></i>' + data[me]["nombre_menu"] + '<i class="arrow"></i></a>\
                                                    ' + template_subMenu + '\
                                                </li>\
                                            </ul>';
                        }

                        menu = data[me]["nombre_menu"];
                        template_subMenu = '';

                    }
                }
            }
            /* templateModulo.querySelector('a').appendChild(fragmentmenu); */
            templateModulo.querySelector('a span').textContent = data[mo]["nombre_modulo"];
            const clone = templateModulo.cloneNode(true)
            fragmentModulo.appendChild(clone)
            template_Modulo += '<!--Menu list item-->\
                    <li class="">\
                                        <a href="#">\
                                            <i class="ti-bookmark-alt"></i>\
                                                <span class="menu-title">' + data[mo]["nombre_modulo"] + '</span>\
                                            <i class="arrow"></i>\
                                        </a>' + template_Menu +
                '</li>';
            modulo = data[mo]["nombre_modulo"];
            template_Menu = '';
        }
    }

    mainnav_menu.appendChild(fragmentModulo);

};
document.addEventListener('DOMContentLoaded', e => {

    fetchNav(id_Usuario);
    pintarHeader();

});