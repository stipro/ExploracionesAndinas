mainnav_menu = document.getElementById('mainnav-menu');
$(document).ready(function() {
    $('#mainnav-menu').on("click", function(e) {
        if (e.target.parentElement.querySelector('ul')) {
            var childrens = e.target.parentElement.querySelectorAll('ul');
            [].forEach.call(childrens, el => {
                el.classList.toggle('in');
            });
            e.target.parentElement.classList.toggle('active');
        }

    });
    $('#mainnav-menu li a ul').on("click", function(e) {
        console.log(e.target.parentElement);
        e.target.parentElement.querySelector('ul').classList.toggle('in');
        e.target.parentElement.classList.toggle('active');
    });
});

// Solictud de la data menu
const getAsignado = async (id_Usuario) => {
    const body = new FormData();
    body.append("data", JSON.stringify(id_Usuario));
    const res = await fetch('./../../../controllers/controllerNav.php', {
        method: "POST",
        body
    });
    array = await res.json()
    pintarNav(array);
}
// Obtengo datos //
getAsignado(id_Usuario);

const pintarNav = (data) => {
    // scope en js --- o en general
    // const let var
    var modulo = 'false';
    var menu = 'false';
    var submenu = 'false';
    var template_Modulo = '';
    var template_Menu = '';
    var template_subMenu = '';
    for (var mo = 0; mo < data.length; mo++) {
        // Almaceno modulo en variable
        nextModulo = data[mo]["nombre_modulo"];
        // Comparacion
        if (modulo !== nextModulo) {
            // Recorrer Menu
            for (var me = 0; me < data.length; me++) {
                // Almaceno menu en variable
                nextMenu = data[me]["nombre_menu"];
                // Comparacion
                if (menu != nextMenu) {
                    // Comparacion
                    if (nextModulo == data[me]["nombre_modulo"]) {

                        if (data[me]["link_menu"] !== '/') {
                            template_Menu += '<!--Submenu-->\
                                            <ul class="collapse">\
                                                <li>\
                                                    <a href="./../' + data[me]["link_modulo"] + '/' + data[me]["link_menu"] + '"><i class="fa fa-group"></i>' + data[me]["nombre_menu"] + '</a>\
                                                </li>\
                                            </ul>';

                        } else {
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
                        template_subMenu = '';

                    }
                }
                menu = data[me]["nombre_menu"];

            }
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
    mainnav_menu.innerHTML = template_Modulo;
}