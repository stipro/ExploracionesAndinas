//VARIABLE PAGINA ACTUAL
var pageActual = 1;
//NUMERO DE CELDAS A MOSTRAR
var pagesView = 3;
//INDICA INICIO DE RECORRIDO
var indexTour = 1;
//INDICA FIN DE RECORRIDO
var endTour = 3;
// FILAS A VISUALIZAR
var rowstoDisplay = 5;
// TOTAL DE PAGINACION
var pageAll = 0
// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    var dataother = {
        "accion": "no select",
    }
    fetchData(dataother);
});
// Traer JSON para Tabla
const fetchData = async (json) => {
    if (json) {
        accionSelect = 'mostrar';
    } else {
        accionSelect = 'mostrar';
    }
    var jsonRequests = {
        "accion": accionSelect,
        "other": json,
        "paginaActual": pageActual,
        "indiceRecorrido": indexTour,
        "paginasaVisualizar": pagesView,
        "finRecorrido": endTour,
        "filasVisualizar": rowstoDisplay
    }
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./controllers/controllerZonaList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintTable(rptJson)
}
const paintTable = (data) => {
    // LISTA DATOS
    arrayTable = data['sql']['list'];
    //RECIBIENDO INICIO RECORRIDO
    indexTour = data['sql']['paginacion']['indexTour'];
    //RECIBIENDO FIN DE RECORRIDO
    endTour = data['sql']['paginacion']['endTour'];
    // TOTAL DE PAGINACION
    pageAll = data['sql']['paginacion']['pageAll'];
    console.log('INICIO DE RECORRIDO : ' + indexTour);
    console.log('FIN DE RECORRIDO : ' + endTour);
    jlistLabor = data['sql']['list'];
    pagesNumber = data['sql']['paginacion']['filasTotal'];
    console.log('cantidad de paginas a visualizar : ' + pagesView);

    createPagination();

    /**BOTON PAGINACION
     * ACCION PAGINACION
     */
    var btnPage = document.getElementsByClassName("page-item");
    for (var i = 0; i < btnPage.length; i++) {

        //Añades un evento a cada elemento
        btnPage[i].addEventListener("click", function(e) {
            console.log(e.target.textContent);
            pageActual = e.target.textContent;
            fetchData();
        });
    }
    creandoTabla(arrayTable)
    /**
     * FIN ACCION PAGINACION
     */

    //var el = document.getElementById("t");
    var btnEditdos = document.getElementById("btn-edit");
    //console.log(btnEditdos);
    console.log({
        btnEditdos
    })
    if (btnEditdos) {
        console.log('lel');
        for (let i = 0; i < btnEditdos.length; i++) {

            // cada vez que se haga clic sobre cualquier de los btnEditdos,
            // ejecutamos la función obtenerValores()
            btnEditdos[i].addEventListener("click", obtenerValores);
        }
    } else {
        fetchData();
    }


    // funcion que se ejecuta cada vez que se hace clic
    function obtenerValores(e) {
        var valores = "";

        // vamos al elemento padre (<tr>) y buscamos todos los elementos <td>
        // que contenga el elemento padre
        var elementosTD = e.srcElement.parentElement.getElementsByTagName("td");

        // recorremos cada uno de los elementos del array de elementos <td>
        for (let i = 0; i < elementosTD.length; i++) {
            // obtenemos cada uno de los valores y los ponemos en la variable "valores"
            valores += elementosTD[i].innerHTML + "\n";
        }
        console.log(valores);
    }
    var btnEditdos = document.getElementsByClassName("btn-edit");
    var btnDeletFil = document.getElementsByClassName("btn-delete");
    //Recorres la lista de elementos seleccionados
    for (var i = 0; i < btnEditdos.length; i++) {
        //Añades un evento a cada elemento
        btnEditdos[i].addEventListener("click", function() {
            console.log(jlistLabor);
            var id = this.getAttribute('data-id');
            arrayTable.forEach(function(valor, indice, array) {
                //console.log('Array');
                console.log("En el índice " + indice + " hay este valor: ");
                console.log(valor);
                console.log(valor['idzona']);
                if (valor['idzona'] === id) {
                    console.log('es igual');
                    idLabor = valor['idzona']
                    document.getElementById("formIptTextCodigoEdit").value = valor['codigo'];
                    document.getElementById("formIptTextNombreEdit").value = valor['nombre'];
                }
            });
            //EDITAR DATO
            const mbtnEditar = document.getElementById("mbtn-edit");
            mbtnEditar.addEventListener("click", () => {
                var item1 = document.getElementById("formIptTextCodigoEdit").value;
                var item2 = document.getElementById("formIptTextNombreEdit").value;
                var listFormEdit = {
                    "id": idLabor,
                    "item1": item1,
                    "item2": item2,
                };
                console.log("diste click");
                requestEdit(listFormEdit);
            });
            //Aquí la función que se ejecutará cuando se dispare el evento
            //alert(this.getAttribute('data-id')); //En este caso alertaremos el texto del cliqueado
        });
    }
    // INICIO DE BOTON ELIMINAR
    //Recorres la lista de elementos seleccionados
    for (var i = 0; i < btnDeletFil.length; i++) {
        //Añades un evento a cada elemento
        btnDeletFil[i].addEventListener("click", function() {
            console.log(jlistLabor);
            var id = this.getAttribute('data-id');
            arrayTable.forEach(function(valor, indice, array) {
                //console.log('Array');
                console.log("En el índice " + indice + " hay este valor: ");
                console.log(valor);
                console.log(valor['idzona']);
                if (valor['idzona'] === id) {
                    console.log('es igual');
                    idLaborDelet = valor['idzona']
                }
            });

            requestDelet(idLaborDelet);
            //Aquí la función que se ejecutará cuando se dispare el evento
            //alert(this.getAttribute('data-id')); //En este caso alertaremos el texto del cliqueado
        });
    }
    //FIN BOTON ELIMINAR
    //INICIO ENVIO DATO EDITAR
    const requestEdit = async (doc) => {
        const body = new FormData();
        var data = {
            "accion": 'editar',
            "list": doc
        };
        console.log(data);
        body.append("data", JSON.stringify(data));
        const returned = await fetch("./controllers/controllerZona.php", {
            method: "POST",
            body
        });
        const result = await returned.json(); //await JSON.parse(returned);
        afterrequestEdit(result);
    };

    function afterrequestEdit() {
        fetchData();
        rptSql = data['sql'];
        $.niftyNoty({
            type: 'success',
            container: '#alerts-Edit',
            html: '<strong>¡Bien hecho!</strong> ' + rptSql,
            focus: false,
            timer: 2000
        });
    }

    //FIN ENVIO DATO EDITAR
    //INICIO ENVIO DATO ELIMINAR
    const requestDelet = async (doc) => {
        const body = new FormData();
        var data = {
            "accion": 'eliminar',
            "list": doc
        };
        console.log(data);
        body.append("data", JSON.stringify(data));
        const returned = await fetch("./controllers/controllerZona.php", {
            method: "POST",
            body
        });
        const result = await returned.json(); //await JSON.parse(returned);
        afterRequestDelet(result);
    };
    /* ACCION DESPUES DE ELIMINAR */
    function afterRequestDelet(data) {
        rptSql = data['sql'];
        fetchData();
        $.niftyNoty({
            type: 'success',
            container: '#alerts-general',
            html: '<strong>¡Bien hecho!</strong>' + rptSql,
            focus: false,
            timer: 2000
        });
    }
    //FIN ENVIO DATO ELIMINAR
    var btnEdit = document.getElementById("btn-edit");
    var btnDele = document.getElementById("btn-delete");


    /* Se agrega el evento al elemento */
    btnEdit.addEventListener("click", editFila);
    btnDele.addEventListener("click", deleFila);

    /* FUNCION PARA EDITAR */
    function editFila() {

    }
    /* FUNCION PARA ELIMINAR */
    function deleFila() {
        console.log('Se vale eliminar');
    }
    //CLICK ELEMENTOS
    listLabor.addEventListener('click', function(e) {
        //console.log(e.target.tagName);
        //console.log(e);
        const padreuno = e.target.parentElement;
        var element = '';
        var indice = e.target;
        //CONTIENE EL ID
        var dataId = '';
        if (e.target && e.target.tagName === 'BUTTON') {
            console.log('es un buttom');
            console.log(e.target.getAttribute('id'));
        }
        if (e.target && e.target.tagName === 'I') {
            element = padreuno.parentElement;
            indice = e.target.parentElement.getAttribute('data-id');
            console.log('es un i')
        } else {
            indice = e.target.getAttribute('data-id');
            element = padreuno;
            console.log('No es I');
        }
        var valores = "";
        dataId = indice;
        var elementosTD = element.parentElement.getElementsByTagName("td");
        //console.log(elementosTD);
        var filaLabores = [];
        const arrayRowTitle = ['ccostos', 'ccostos', 'labor', 'nivel', 'tipo', 'zona', 'ccostos2'];
        filaLabores.push({
            nombreEstudiante: 'Andrea',
            testScore: 100
        }, {
            nombreEstudiante: 'Timmy',
            testScore: 71
        });
        // recorremos cada uno de los elementos del array de elementos <td>
        for (let i = 1; i < elementosTD.length; i++) {
            // obtenemos cada uno de los valores y los ponemos en la variable "valores"
            //console.log(arrayRowTitle [i]);
            var itemRowTitle = arrayRowTitle[i];
            filaLabores.push({
                itemRowTitle: elementosTD[i].innerHTML
            });
            //console.log(elementosTD[i].innerHTML);
            valores += elementosTD[i].innerHTML + "\n";
        }
    });
};
/**
 * CREANDO DATOS
 * 
 */
//creadno tabla
function creandoTabla(data) {
    var jsonList = data;
    console.log(data)
    listLabor = document.getElementById("tbody-tareo");
    listLabor.innerHTML = '';
    const templateLabor = document.querySelector("#template-td-tareo").content;
    const fragment = document.createDocumentFragment();
    //const trLabor = templateLabor.querySelector("#registro-tareo");
    jsonList.forEach(function(valor, indice, array) {
        /*
        //console.log('Array');
        console.log("En el índice " + indice + " hay este valor: ");
        console.log(valor);
        console.log(valor['ccostos']);
        */
        objIdLabor = valor['idzona'];
        objLabor = valor['codigo'];
        objNivel = valor['nombre'];
        //console.log(objIdLabor);
        const trLabor = templateLabor.querySelector("#registro-tareo");
        trLabor.setAttribute("data-id", objIdLabor);
        const btnId = templateLabor.querySelector("#registro-tareo #btn-edit");
        btnId.setAttribute("data-id", objIdLabor);
        const btnDeletTable = templateLabor.querySelector("#registro-tareo #btn-delete");
        btnDeletTable.setAttribute("data-id", objIdLabor);
        templateLabor.querySelector("#registro-tareo #codigo").textContent = objLabor;
        templateLabor.querySelector("#registro-tareo #nombre").textContent = objNivel;

        const clone = templateLabor.cloneNode(true);
        fragment.appendChild(clone)
        /*
        for (var propiedad in objetoTareo) {
          if (objetoTareo.hasOwnProperty(propiedad)) {
            console.log("En la propiedad '" + propiedad + "' hay este valor: " + objetoTareo[propiedad]);
            templateTareo.querySelector("#registro-tareo #codigo").textContent =  objetoTareo[propiedad];
            const clone = templateTareo.cloneNode(true);
            fragment.appendChild(clone)
          }
        }*/
    });
    listLabor.appendChild(fragment);
}
//CREANDO PAGINACION
function createPagination() {
    // INICIO PAGINACION //

    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    const templatePagination = document.getElementById('template-pagination').content;

    const fragmentPagination = document.createDocumentFragment();

    templatePagination.querySelector("#itemPage a").textContent = '<';
    const clonePagination = templatePagination.cloneNode(true);
    fragmentPagination.appendChild(clonePagination);
    //CREAMOS LA PAGINACION
    for (var i = indexTour; i <= endTour; i++) {
        console.log('Estas en la pagina : ' + pageActual);
        console.log('El numero de recorrido es  : ' + i);
        if (i == pageActual) {
            console.log('es un : ' + pageActual);
            templatePagination.querySelector("#itemPage").className += ' active';
        } else {
            console.log('No es igual');
            templatePagination.querySelector("#itemPage").className = 'page-item';
        }
        templatePagination.querySelector("#itemPage a").textContent = i;
        const clonePagination = templatePagination.cloneNode(true);
        fragmentPagination.appendChild(clonePagination);
        console.log(i);
    }
    templatePagination.querySelector("#itemPage a").textContent = '>';
    const clonePaginationNext = templatePagination.cloneNode(true);

    if (pagesView >= 3) {
        console.log('Es mayor');
        templatePagination.querySelector("#itemPage a").textContent = pageAll;
        const clonePaginationNumber = templatePagination.cloneNode(true);
        templatePagination.querySelector("#itemPage").className = 'disabled';
        templatePagination.querySelector("#itemPage").innerHTML = '<span>...</span>';
        const clonePaginationSpan = templatePagination.cloneNode(true);
        fragmentPagination.appendChild(clonePaginationSpan);
        //console.log(templatePagination);


        fragmentPagination.appendChild(clonePaginationNumber);

    } else {
        console.log('No es mayor');
    }
    templatePagination.querySelector("#itemPage").innerHTML = '<a class="page-link" href="#">2</a></li>';
    templatePagination.querySelector("#itemPage a").textContent = '';
    templatePagination.querySelector("#itemPage").className = 'page-item';
    //console.log(templatePagination);
    fragmentPagination.appendChild(clonePaginationNext);

    pagination.appendChild(fragmentPagination);

}
// FIN PAGINACION //
/**
 * 
 * NUEVO REGISTRO
 * 
 */
const mbtnInsert = document.getElementById("mbtn-insert");
mbtnInsert.addEventListener("click", () => {
    var item1 = document.getElementById("formIptTextCodigo").value;
    if (!item1) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato Zona.',
            focus: false,
            timer: 2000
        });
    }

    var item2 = document.getElementById("formIptTextNombre").value;
    if (!item2) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato Nivel.',
            focus: false,
            timer: 2000
        });
        insertnivel = "0";
    } else {
        var listInsert = {
            "id": '',
            "item1": item1,
            "item2": item2,
        };
        requestInsert(listInsert);
    }
    //VALIDACION FORMULARIO
});
const requestInsert = async (listInsert) => {
    const body = new FormData();
    var data = {
        "accion": 'insertar',
        "list": listInsert
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./controllers/controllerZona.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    afterSendingInsert(result);
};
//Si necesitas hacer algo despues de que terminen las
//consultas, hacelas aqui.
const afterSendingInsert = (data) => {
    rptSql = data['sql'];
    fetchData();
    $.niftyNoty({
        type: 'success',
        container: '#alerts-Insert',
        html: '<strong>...</strong> ' + rptSql,
        focus: false,
        timer: 2000
    });
    document.getElementById("formIptTextZona").value = '';
    document.getElementById("formIptTextCCosto").value = '';
    document.getElementById("formIptNumNivel").value = '';
    document.getElementById("formIptTextLabor").value = '';
};
/**
 * 
BUSQUEDA POR COLUMNA
 * 
 */
const btnBuscar = document.getElementById("btn-Buscar");
btnBuscar.addEventListener("click", () => {
    var datoBuqueda = document.getElementById("ipt-Buscar").value;
    var valColBusqueda = document.querySelector(".chosen-single span").textContent;
    console.log('Se buscara por la columna : ' + valColBusqueda);
    if (datoBuqueda) {
        $.niftyNoty({
            type: 'success',
            container: '#alerts-general',
            html: '<strong>¡Bien hecho!</strong> Se procede con la busqueda, un momento.',
            focus: false,
            timer: 2000
        });
        var busquedaColumna = {
            "accion": "busqueda",
            "palabra": datoBuqueda,
            "columna": valColBusqueda
        };
        fetchData(busquedaColumna);
    } else {
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-general',
            html: '<strong>¡Oh cielos!</strong> No se ingreso nada para buscar',
            focus: false,
            timer: 2000
        });
    }
});
//FIN BUSQUEDA POR COLUMNA