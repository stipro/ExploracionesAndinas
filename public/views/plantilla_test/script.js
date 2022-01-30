const templateModulo = document.getElementById('template-modulo').content
const fragment = document.createDocumentFragment()
const mainnav_menu = document.querySelector('.nav-links')
const ulContenedor = document.getElementById('contendor');

ulContenedor.addEventListener('click', (e) => {
    console.log('Hicises click contenedor');
    console.log(e);
    if (e.target && e.target.tagName === 'LI') {
        console.log('Hola');
    }
});
const getAsignado = async (id_Usuario) => {
    const body = new FormData();
    body.append("data", JSON.stringify(id_Usuario));
    const res = await fetch('./../../../controllers/controllerNav.php', {
        method: "POST",
        body
    });
    data = await res.json()
    pintarNav(data);
    //pintarCards(data)
}

getAsignado(id_Usuario);

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}


let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

const pintarNav = (data) => {
    var modulo = 'false';
    var menu = 'false';
    var submenu = 'false';
    var template_Modulo = '';
    var template_Menu = '';
    var template_subMenu = '';
    for (var mo = 0; mo < data.length; mo++) {
        /* li.textContent(''); */
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
            templateModulo.querySelector('li div a span').textContent = data[mo]["nombre_modulo"];
            const clone = templateModulo.cloneNode(true)
            fragment.appendChild(clone)
            /* template_Modulo += '<!--Menu list item--><li><div class="iocn-link"><a href="#"><i class="bx bx-collection" ></i><span class="link_name">' + data[mo]["nombre_modulo"] + '</span></a><i class="bx bxs-chevron-down arrow"></i></div><ul class="sub-menu"><li><a class="link_name" href="#">Category</a></li><li><a href="#">HTML & CSS</a></li><li><a href="#">JavaScript</a></li><li><a href="#">PHP & MySQL</a></li></ul></li>'; */
            modulo = data[mo]["nombre_modulo"];
            template_Menu = '';
        }
    }
    mainnav_menu.appendChild(fragment);
    /* $("#mainnav-menu li").after(template_Modulo); */
    /* $.niftyNav('bind'); */

    /* var li = document.createElement(li);
    li.appendChild(templateModulo); */
}
document.addEventListener('DOMContentLoaded', e => {

});