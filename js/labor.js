////DOM ELEMENTOS
//
var arrayTable
// TABLA HTML
var listLabor = '';
var jlistLabor = '';
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

window.onload = function() {
    var bjson = {
        "accion": "mostrar"
    };
    makeRequests(bjson);
    capturarFila();
}
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
            "columna": "lab_" + valColBusqueda
        };
        makeRequests(busquedaColumna);
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
/**
 * ANIMACION
 */
/*
 let btn1 = document.getElementById('ocultar');
 btn1.addEventListener('click', () => {ocultar()});
 
 let btn2 = document.getElementById('mostrar');
 btn2.addEventListener('click', () => {mostrar()});
 */
const mostrar = () => {
    document.querySelector(".aparecer").classList.remove("desvanecer");
}

const ocultar = () => {
    console.log('ocultar');
    document.querySelector(".aparecer").classList.add("desvanecer");
}

function createAlerts() {
    return document.getElementById('contenedor').innerHTML = '<div class="alert alert-success">' +
        '<button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>' +
        '<strong>Well done!</strong> You successfully read this important alert message.' +
        '</div>';
}
/**
 * FIN ANIMACION
 */
const mbtnEditar = document.getElementById("mbtn-insert");
mbtnEditar.addEventListener("click", () => {
    var insertZona = document.getElementById("formIptTextZona").value;
    if (!insertZona) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato Zona.',
            focus: false,
            timer: 2000
        });
    }
    var insertnivel = document.getElementById("formIptNumNivel").value;
    if (!insertnivel) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato Nivel.',
            focus: false,
            timer: 2000
        });
        insertnivel = "0";
    }
    var insertLabor = document.getElementById("formIptTextLabor").value;
    if (!insertLabor) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato Labor.',
            focus: false,
            timer: 2000
        });
    }
    var insertCCostos = document.getElementById("formIptTextCCosto").value;
    if (!insertCCostos) {
        $.niftyNoty({
            type: 'warning',
            container: '#alerts-Insert',
            html: '<strong>¡Advertencia!</strong> Nose ingreso Dato CCosto.',
            focus: false,
            timer: 2000
        });
    } else {
        var labor = {
            "id": '',
            "zona": insertZona,
            "ccosto": insertCCostos,
            "nivel": insertnivel,
            "labor": insertLabor,
        };
        console.log(labor);
        requestInsert(labor);
    }
    //VALIDACION FORMULARIO

    //
});
const requestInsert = async (doc) => {
    beforeSending();
    const body = new FormData();
    var data = {
        "accion": 'insertar',
        "datos": doc
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../controllers/controllerLabor.php", {
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
    makeRequests();
    $.niftyNoty({
        type: 'success',
        container: '#alerts-Insert',
        html: '<strong>¡Bien hecho!</strong> ' + rptSql,
        focus: false,
        timer: 2000
    });
    /*
  document.getElementById("formIptTextZona").value = '';
  document.getElementById("formIptTextCCosto").value = '';
  document.getElementById("formIptNumNivel").value = '';
  document.getElementById("formIptTextLabor").value = '';
*/
    /*
      document.getElementById("alertsContainer").classList.remove("desvanecer");
      document.getElementById("alertsContainer").classList.add("aparecer");
      
      var sqlData = data;
      console.log(sqlData);
      document.getElementById("contenedor").innerHTML = '<div id="alertsContainer" class="alert alert-success">' +
        '<button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>' +
        '<div class="media-left">' +
          '<span class="icon-wrap icon-wrap-xs icon-circle alert-icon">' +
            '<i class="demo-psi-gear icon-2x"></i>' +
          '</span>' +
        '</div>' +
        '<div class="media-body">' +
          '<h4 class="alert-title">Mensaje</h4>' +
          '<p class="alert-message">' + sqlData['sql'] + '</p>' + 
        '</div>' +
      '</div>';
      setTimeout(function() {
        document.getElementById("alertsContainer").classList.remove("aparecer");
        document.getElementById("alertsContainer").classList.add("desvanecer");
        setTimeout(function() {
          console.log('Ahora eliminaremos');
          document.getElementById("contenedor").innerHTML = '';
        }, 100);
      }, 5000);
      console.log("after");
      //Insertara datos
      */
};

function capturarFila() {
    // creamos los eventos para cada elemento con la clase "boton"
    let elementos = document.getElementsByClassName("boton");
    //console.log(elementos);
    for (let i = 0; i < elementos.length; i++) {
        // cada vez que se haga clic sobre cualquier de los elementos,
        // ejecutamos la función obtenerValores()
        elementos[i].addEventListener("click", obtenerValores);
    }
}

//
const makeRequests = async (doc) => {
    beforeSending();
    const body = new FormData();
    console.log(doc)


    if (doc) {
        accionSelect = doc['accion'];
    } else {
        accionSelect = 'mostrar';
    }
    //PREPARAMOS DATOS CON PAGINA ACTUAL paginaActual
    var data = {
        "accion": accionSelect,
        "other": doc,
        "LOL": '',
        "paginaActual": pageActual,
        "indiceRecorrido": indexTour,
        "paginasaVisualizar": pagesView,
        "finRecorrido": endTour,
        "filasVisualizar": rowstoDisplay
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    handleReturnedData(result);
    //afterSending();
};
//Si necesitas hacer algo antes de enviar las
//consultas, hacelo aqui.
const beforeSending = () => {
    console.log("before");
};

function creandoTabla(data) {
    var jsonList = data;
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
        objCCostos = valor['lab_ccostos'];
        objLabor = valor['lab_labor'];
        objNivel = valor['lab_nivel'];
        objTipo = valor['lab_tipo'];
        objZona = valor['lab_zona'];
        objCCostos2 = valor['lab_ccostos2'];
        objIdLabor = valor['id_labor'];
        //console.log(objIdLabor);
        const trLabor = templateLabor.querySelector("#registro-tareo");
        trLabor.setAttribute("data-id", objIdLabor);
        const btnId = templateLabor.querySelector("#registro-tareo #btn-edit");
        btnId.setAttribute("data-id", objIdLabor);
        const btnDeletTable = templateLabor.querySelector("#registro-tareo #btn-delete");
        btnDeletTable.setAttribute("data-id", objIdLabor);
        templateLabor.querySelector("#registro-tareo #ccostos").textContent = objCCostos;
        //console.log(templateLabor);
        templateLabor.querySelector("#registro-tareo #labor").textContent = objLabor;
        templateLabor.querySelector("#registro-tareo #nivel").textContent = objNivel;
        templateLabor.querySelector("#registro-tareo #tipo").textContent = objTipo;
        templateLabor.querySelector("#registro-tareo #zona").textContent = objZona;
        templateLabor.querySelector("#registro-tareo #ccostos2").textContent = objCCostos2;

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
//Si necesitas hacer algo con las respuestas del servidor
//hacelas aqui.
const handleReturnedData = (data) => {
    console.log(data);
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
            var bjson = {
                "accion": "mostrar"
            };
            makeRequests(bjson);
        });
    }
    creandoTabla(arrayTable)
    /**
     * FIN ACCION PAGINACION
     */
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
    //var el = document.getElementById("t");
    var btnEditdos = document.getElementById("btn-edit");
    //console.log(btnEditdos);
    for (let i = 0; i < btnEditdos.length; i++) {

        // cada vez que se haga clic sobre cualquier de los btnEditdos,
        // ejecutamos la función obtenerValores()
        btnEditdos[i].addEventListener("click", obtenerValores);
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
                console.log(valor['id_labor']);
                if (valor['id_labor'] === id) {
                    console.log('es igual');
                    idLabor = valor['id_labor']
                    document.getElementById("formIptTextZonaEdit").value = valor['lab_zona'];
                    document.getElementById("formIptTextCCostoEdit").value = valor['lab_ccostos'];
                    document.getElementById("formIptNumNivelEdit").value = valor['lab_nivel'];
                    document.getElementById("formIptTextLaborEdit").value = valor['lab_labor'];
                }
            });
            const mbtnEditar = document.getElementById("mbtn-edit");
            mbtnEditar.addEventListener("click", () => {
                var editZona = document.getElementById("formIptTextZonaEdit").value;
                var editCCostos = document.getElementById("formIptTextCCostoEdit").value;
                var editnivel = document.getElementById("formIptNumNivelEdit").value;
                var editLabor = document.getElementById("formIptTextLaborEdit").value;
                var labor = {
                    "id": idLabor,
                    "zona": editZona,
                    "ccosto": editCCostos,
                    "nivel": editnivel,
                    "labor": editLabor,
                };
                console.log("diste click");
                requestEdit(labor);
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
                console.log(valor['id_labor']);
                if (valor['id_labor'] === id) {
                    console.log('es igual');
                    idLaborDelet = valor['id_labor']
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
            "datos": doc
        };
        console.log(data);
        body.append("data", JSON.stringify(data));
        const returned = await fetch("./../controllers/controllerLabor.php", {
            method: "POST",
            body
        });
        const result = await returned.json(); //await JSON.parse(returned);
        afterrequestEdit(result);
    };

    function afterrequestEdit(data) {

        rptSql = data['sql'];
        $.niftyNoty({
            type: 'success',
            container: '#alerts-Edit',
            html: '<strong>¡Bien hecho!</strong> ' + rptSql,
            focus: false,
            timer: 2000
        });
        makeRequests();
    }
    //FIN ENVIO DATO EDITAR
    //INICIO ENVIO DATO ELIMINAR
    const requestDelet = async (doc) => {
        beforeSending();
        const body = new FormData();
        var data = {
            "accion": 'eliminar',
            "datos": doc
        };
        console.log(data);
        body.append("data", JSON.stringify(data));
        const returned = await fetch("./../controllers/controllerLabor.php", {
            method: "POST",
            body
        });
        const result = await returned.json(); //await JSON.parse(returned);
        afterRequestDelet();
    };
    /* ACCION DESPUES DE ELIMINAR */
    function afterRequestDelet() {
        makeRequests();
        $.niftyNoty({
            type: 'success',
            container: '#alerts-general',
            html: '<strong>¡Bien hecho!</strong> Se elimino correctamente.',
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
        //console.log('data-id : ' + dataId);
        // vamos al elemento padre (<tr>) y buscamos todos los elementos <td>
        // que contenga el elemento padre


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
        //console.log(valores);
        //console.log(filaLabores);

    });
    //arrayTareo.forEach((item) => {
    /*
    templateTareo.querySelector("#registro-tareo #codigo").textContent = item;
    const clone = templateTareo.cloneNode(true);
    // const clone = document.importNode(template, true);
    fragmentTareo.appendChild(clone);*/
    //});
    //listTareo.appendChild(fragmentTareo);
    //console.log(data);
};
//Si necesitas hacer algo despues de que terminen las
//consultas, hacelas aqui.
const afterSending = () => {
    console.log("after");
    //Insertara datos
};