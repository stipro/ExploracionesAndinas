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
    fetchData()
});
// Traer JSON para Tabla
const fetchData = async (json) => {
    if (json) {
        console.log('se hara una busqueda');
        var accionSelect = json['accion'];
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
    const rpt = await fetch('./../../../controllers/controllerTareoList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintTable(rptJson);
}
// CREANDO HTML
const paintTable = (data) => {
    // LISTA DATOS
    arrayTable = data['sql']['list'];
    if (arrayTable.length == 0) {
        console.log('vacio');
    } else {
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
                    console.log(valor['id']);
                    if (valor['id'] === id) {
                        console.log('es igual');
                        idLabor = valor['id']
                        document.getElementById("formIptTextCodigoEdit").value = valor['codigo'];
                        document.getElementById("formIptTextNombreEdit").value = valor['nombre'];
                        document.getElementById("formIptTextCargoEdit").value = valor['cargo'];
                        document.getElementById("formIptTextDiaEdit").value = valor['dia'];
                        document.getElementById("formIptTextTurnoEdit").value = valor['turno'];
                        document.getElementById("formIptNumHTEdit").value = valor['ht'];
                        document.getElementById("formIptTextHTSerAdiEdit").value = valor['h_serv_ad'];
                        document.getElementById("formIptTextCCostosEdit").value = valor['ccostos'];
                        document.getElementById("formIptTextLaborEdit").value = valor['labor'];
                        document.getElementById("formIptNumNivelEdit").value = valor['nivel'];
                        document.getElementById("formIptNumHEEdit").value = valor['he'];
                        document.getElementById("formIptNumHESerAdiEdit").value = valor['heSer_Ad'];
                        document.getElementById("formIptNumCCostosHorasExtrasEdit").value = valor['cCostosHe'];
                        document.getElementById("formIptTextZonaEdit").value = valor['v.B'];
                        document.getElementById("formIptTextGuardiaEdit").value = valor['Cod_Actividad'];
                        document.getElementById("formIptNumActividadEdit").value = valor['guardia'];
                        document.getElementById("formIptTextAreaEdit").value = valor['area'];
                    }
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
                    console.log(valor['id_tareo']);
                    if (valor['id_tareo'] === id) {
                        console.log('es igual');
                        idLaborDelet = valor['id_tareo']
                    }
                });

                requestDelet(idLaborDelet);
            });
        }
        //FIN BOTON ELIMINAR

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
            const returned = await fetch("./../../../controllers/controllerTareo.php", {
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
        console.log('lleno');
    }

};
/**
 * CREANDO DATOS
 * 
 */
//creadno tabla
function creandoTabla(data) {
    var jsonList = data;
    console.log('se obtuvo esta lista sql : ');
    console.log(data);
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
        sqlId = valor['id_tareo'];
        sqlItem1 = valor['codigo'];
        sqlItem2 = valor['nombre'];
        sqlItem3 = valor['cargo'];
        //
        if (!sqlItem1 && !sqlItem2 && !sqlItem3) {
            console.log('Esta vacio ' + sqlItem1 + sqlItem2 + sqlItem3);
            sqlItem1 = valor['col_dni'];
            sqlItem2 = valor['col_nombre'];
            sqlItem3 = valor['col_cargo_actual'];
            /*
            idcolaboradorTable = valor['id_colaborador'];
            var formForeignKey = {
              "accion" : "completarCol",
              "table" : "colaboradore",
              "palabra" : idcolaboradorTable,
              "columna" : "id_colaborador",
            }
            console.log('Se hara busqueda de colaborador es : ');
            console.log(formForeignKey);
            getfechForeignKey(formForeignKey);*/
        }
        sqlItem4 = valor['dia'];
        sqlItem5 = valor['actividad'];
        sqlItem6 = valor['turno'];
        sqlItem7 = valor['ht'];
        sqlItem8 = valor['h_serv_ad'];
        sqlItem9 = valor['ccostos'];
        sqlItem10 = valor['labor'];
        sqlItem11 = valor['nivel'];
        if (!sqlItem9 && !sqlItem10 && !sqlItem11) {
            console.log('Esta vacio ' + sqlItem9 + sqlItem10 + sqlItem11);
            sqlItem9 = valor['lab_ccostos'];
            sqlItem10 = valor['lab_labor'];
            sqlItem11 = valor['lab_nivel'];
        }
        sqlItem12 = valor['he'];
        sqlItem13 = valor['heSer_Ad'];
        sqlItem14 = valor['cCostosHe'];
        sqlItem15 = valor['v.B'];
        sqlItem16 = valor['guardia'];
        sqlItem17 = valor['Cod_Actividad'];
        sqlItem18 = valor['area'];
        //console.log(sqlId);
        const trLabor = templateLabor.querySelector("#registro-tareo");
        trLabor.setAttribute("data-id", sqlId);
        const btnId = templateLabor.querySelector("#registro-tareo #btn-edit");
        btnId.setAttribute("data-id", sqlId);
        const btnDeletTable = templateLabor.querySelector("#registro-tareo #btn-delete");
        btnDeletTable.setAttribute("data-id", sqlId);
        templateLabor.querySelector("#registro-tareo #codigo").textContent = sqlItem1;
        templateLabor.querySelector("#registro-tareo #nombreCompleto").textContent = sqlItem2;
        templateLabor.querySelector("#registro-tareo #cargo").textContent = sqlItem3;
        templateLabor.querySelector("#registro-tareo #dia").textContent = sqlItem4;
        //templateLabor.querySelector("#registro-tareo #actividad").textContent =  sqlItem5;
        templateLabor.querySelector("#registro-tareo #turno").textContent = sqlItem6;
        templateLabor.querySelector("#registro-tareo #ht").textContent = sqlItem7;
        templateLabor.querySelector("#registro-tareo #htSev_ad").textContent = sqlItem8;
        templateLabor.querySelector("#registro-tareo #costos").textContent = sqlItem9;
        templateLabor.querySelector("#registro-tareo #labor").textContent = sqlItem10;
        templateLabor.querySelector("#registro-tareo #nivel").textContent = sqlItem11;
        templateLabor.querySelector("#registro-tareo #hE").textContent = sqlItem12;
        templateLabor.querySelector("#registro-tareo #heSerAd").textContent = sqlItem13;
        templateLabor.querySelector("#registro-tareo #cCostosHe").textContent = sqlItem14;
        templateLabor.querySelector("#registro-tareo #VB").textContent = sqlItem15;
        templateLabor.querySelector("#registro-tareo #guardia").textContent = sqlItem16;
        templateLabor.querySelector("#registro-tareo #codActividad").textContent = sqlItem17;
        templateLabor.querySelector("#registro-tareo #Area").textContent = sqlItem18;


        const clone = templateLabor.cloneNode(true);
        fragment.appendChild(clone)
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
//EDITAR DATO
const mbtnEditar = document.getElementById("mbtn-edit");
mbtnEditar.addEventListener("click", () => {
    var item1 = document.getElementById("formIptTextCodigoEdit").value;
    var item2 = document.getElementById("formIptTextNombreEdit").value;
    var item3 = document.getElementById("formIptTextCargoEdit").value;
    var item4 = document.getElementById("formIptTextDiaEdit").value;
    var item5 = document.getElementById("formIptTextTurnoEdit").value;
    var item6 = document.getElementById("formIptNumHTEdit").value;
    var item7 = document.getElementById("formIptTextHTSerAdiEdit").value;
    var item8 = document.getElementById("formIptTextCCostosEdit").value;
    var item9 = document.getElementById("formIptTextLaborEdit").value;
    var item10 = document.getElementById("formIptNumNivelEdit").value;
    var item11 = document.getElementById("formIptNumHEEdit").value;
    var item12 = document.getElementById("formIptNumHESerAdiEdit").value;
    var item13 = document.getElementById("formIptNumCCostosHorasExtrasEdit").value;
    var item14 = document.getElementById("formIptTextZonaEdit").value;
    var item15 = document.getElementById("formIptTextGuardiaEdit").value;
    var item16 = document.getElementById("formIptNumActividadEdit").value;
    var item17 = document.getElementById("formIptTextAreaEdit").value;
    var listFormEdit = {
        "id": idLabor,
        "codigo": item1,
        "nombre": item2,
        "cargo": item3,
        "dia": item4,
        "turno": item5,
        "ht": item6,
        "htseradi": item7,
        "ccostos": item8,
        "labor": item9,
        "nivel": item10,
        "he": item11,
        "heseradi": item12,
        "ccostoshe": item13,
        "zona": item14,
        "guardia": item15,
        "actividad": item16,
        "area": item17,
    };
    console.log("diste click");
    requestEdit(listFormEdit);
});
//INICIO ENVIO DATO EDITAR
const requestEdit = async (doc) => {
    const body = new FormData();
    var data = {
        "accion": 'editar',
        "list": doc
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../../../controllers/controllerTareo.php", {
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
/**
 * 
 * NUEVO REGISTRO
 * 
 */
const mbtnInsert = document.getElementById("mbtn-insert");
mbtnInsert.addEventListener("click", () => {
    var item1 = iptnTarjeta.value;

    var item2 = iptDni.value;
    if (!item2) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese DNI.',
            focus: false,
            timer: 2000
        });
    }

    var item3 = iptNombre.value;
    if (!item3) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese Nombre.',
            focus: false,
            timer: 2000
        });
    }

    var item4 = iptCargo.value;
    var areaCol = iptArea.value;
    var id_colaboradorInsert = iptDni.dataset.colaborador;
    var item5 = iptDia.value;
    if (!item5) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese Dia.',
            focus: false,
            timer: 2000
        });
    }

    var selectedOptionItem6 = selectTurno.options[selectTurno.selectedIndex];
    var item6 = selectedOptionItem6.text;
    if (!item6) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Turno.',
            focus: false,
            timer: 2000
        });
    }

    var selectedOptionItem7 = selectGuardia.options[selectGuardia.selectedIndex];
    var item7 = selectedOptionItem7.value;
    if (!item7) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Guardia.',
            focus: false,
            timer: 2000
        });
    }

    var item8 = nActividad.value;


    var selectedOptionItem9 = selectZona.options[selectZona.selectedIndex];
    var item9 = selectedOptionItem9.textContent;
    if (!item9) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Cod.Zona.',
            focus: false,
            timer: 2000
        });
    }
    var selectedOptionItem10 = selectCCostos.options[selectCCostos.selectedIndex];
    var item10 = selectedOptionItem10.value;
    if (!item10) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Ccostos.',
            focus: false,
            timer: 2000
        });
    }

    var item11 = iptZona.value;
    if (!item11) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese Zona.',
            focus: false,
            timer: 2000
        });
    }
    var item12 = iptLabor.value;
    if (!item12) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese Cargo.',
            focus: false,
            timer: 2000
        });
    }

    var item13 = iptNivel.value;
    if (!item13) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Ingrese Nivel.',
            focus: false,
            timer: 2000
        });
    }
    var formidLabor = iptLabor.dataset.idlabor;
    var formidZona = iptZona.dataset.idZona;
    var item14 = $('input:radio[name=inline-form-radio]:checked').val();
    var ht = $('input:radio[name=inline-form-radio]:checked').attr('data-ht');
    var item15 = iptHe.value;
    var item16 = iptHTSerAd.value;
    var item17 = iptHESerAd.value;
    var item18 = iptCcSerAd.value;
    var item19 = iptCcHe.value;
    if (item2 && item3 && item4 && item5 && selectedOptionItem6 && selectedOptionItem7 && selectedOptionItem9 && selectedOptionItem10 && item11 && item12 && item13) {
        console.log('loco');
        var listInsert = {
            "id": '',
            "item1": item1,
            "idColaborador": id_colaboradorInsert,
            "item5": item5,
            "item6": item6,
            "item7": item7,
            "item8": item8,
            "item9": item9,
            "idLabor": formidLabor,
            "idZona": formidZona,
            "item14": item14,
            'ht': ht,
            "item15": item15,
            "item16": item16,
            "item17": item17,
            "item18": item18,
            "item19": item19,
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
    const returned = await fetch("./../../../controllers/controllerTareo.php", {
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

    document.getElementById("formiptTextZona").value = '';
    document.getElementById("formiptTextLabor").value = '';
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

/* BUSQUEDA DNI */
var iptnTarjeta = document.getElementById('formIptNumberNTarjeta');
var iptDni = document.getElementById('formIptNumberDni');
var iptNombre = document.getElementById('formIptTextNombre');
var iptCargo = document.getElementById('formIptTextCargo');
var iptArea = document.getElementById('formIptTextArea');
var iptDia = document.getElementById('formiptDateDia');
var selectTurno = document.getElementById('formselectTurno');
var selectGuardia = document.getElementById('formselectGuardia');
var nActividad = document.getElementById('formiptDecimalActividad');
var selectZona = document.getElementById('formselectTextCodZona');
var selectCCostos = document.getElementById('formselectTextCCostos');
var iptZona = document.getElementById('formiptTextZona');
var iptLabor = document.getElementById('formiptTextLabor');
var iptNivel = document.getElementById('formiptNumberNivel');
var iptHe = document.getElementById('formiptNumberHE');
var iptHTSerAd = document.getElementById('formiptNumberHT_Ser_Ad');
var iptHESerAd = document.getElementById('formiptNumberHE_Ser_Ad');
var iptCcSerAd = document.getElementById('formiptNumberCc_Ser_Ad');
var iptCcHe = document.getElementById('formiptNumberCCostosHe');

iptDni.addEventListener('keyup', function(e) {
    var keycode = e.keyCode || e.which;
    if (keycode == 13) {
        var NumberDni = iptDni.value;
        var busquedaDni = {
            "accion": "busqueda",
            "palabra": NumberDni,
            "columna": "col_dni",
        }
        fetchDataDNI(busquedaDni);
    }
});
// Traer JSON para Tabla
const fetchDataDNI = async (json) => {
    if (json) {
        console.log('se hara una busqueda');
        var accionSelect = json['accion'];
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
    const rpt = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    fillData(rptJson);
}
const fillData = (data) => {
    console.log(data)
    objsearchDni = data;
    var lengthSearch = objsearchDni['sql']['list'].length;
    console.log(typeof lengthSearch);
    if (lengthSearch > 0) {
        console.log('lleno ' + lengthSearch);
        numId_Colaborador = objsearchDni['sql']['list']['0']['id_colaborador'];
        textNombre = objsearchDni['sql']['list']['0']['col_nombre'];
        textCargo = objsearchDni['sql']['list']['0']['col_cargo_actual'];
        textArea = objsearchDni['sql']['list']['0']['col_area'];
        iptDni.dataset.colaborador = numId_Colaborador;
        formIptTextNombre.value = textNombre;
        formIptTextCargo.value = textCargo;
        formIptTextArea.value = textArea;
    } else {
        $.niftyNoty({
            type: 'danger',
            container: '#rptBusquedaDni',
            html: '<strong>¡No se encontro Dni, por favor registrar!</strong>',
            focus: false,
            timer: 2000
        });
        console.log('vacio ' + lengthSearch);
    }
};
const btnAgregar = document.getElementById("btn-Agregar");
btnAgregar.addEventListener("click", () => {
    var selectCodZona = {
        "accion": "select",
    }
    fetchDataZona(selectCodZona);
});
const fetchDataZona = async (json) => {
    if (json) {
        console.log('se hara una busqueda');
        var accionSelect = 'mostrar';
    } else {
        accionSelect = 'mostrar';
    }
    var jsonRequests = {
        "accion": accionSelect,
        "other": json,
    }
    console.log(jsonRequests);
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./../../../controllers/controllerZonaList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSelect(rptJson);
};
const paintSelect = (data) => {
    arraySelect = data['sql']['list'];
    selectZona.innerHTML = '';
    const templateSelectZona = document.querySelector("#template-opt-zona").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objidZona = valor['id_zona'];
        objcodigo = valor['codigo'];
        objNombre = valor['nombre'];
        templateSelectZona.querySelector("#optzona").dataset.idZona = objidZona;
        templateSelectZona.querySelector("#optzona").textContent = objcodigo;
        templateSelectZona.querySelector("#optzona").value = objNombre;
        const clone = templateSelectZona.cloneNode(true);
        fragment.appendChild(clone)
    });
    selectZona.appendChild(fragment);
};

selectZona.addEventListener('change', function() {
    var selectedOption = this.options[selectZona.selectedIndex];
    iptZona.dataset.idZona = selectedOption.dataset.idZona;
    var textCodZona = selectedOption.text;
    console.log(selectedOption.value + ': ' + selectedOption.text);
    //cambios
    if (textCodZona == 'Z') {
        console.log('es igual a Z');
        iptZona.disabled = false;
        iptLabor.disabled = false;
        iptNivel.disabled = false;
    } else {
        iptZona.disabled = true;
        iptLabor.disabled = true;
        iptNivel.disabled = true;
    }
    var busquedaCCostosLabores = {
        "accion": "select",
        "palabra": textCodZona,
        "columna": "ccostos",
    }
    fechCCostosLabores(busquedaCCostosLabores);
});

const fechCCostosLabores = async (json) => {
    var jsonRequests = {
        "accion": 'mostrar',
        "other": json,
        "paginaActual": pageActual,
        "indiceRecorrido": indexTour,
        "paginasaVisualizar": pagesView,
        "finRecorrido": endTour,
        "filasVisualizar": rowstoDisplay
    }
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintselectCCostos(rptJson);
}
const paintselectCCostos = (data) => {
    console.log(data)
    arraySelect = data['sql']['list'];
    selectCCostos.innerHTML = '';
    const templateselectCCostos = document.querySelector("#template-opt-ccostos").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objccostos = valor['lab_ccostos'];
        templateselectCCostos.querySelector("#optccostos").textContent = objccostos;
        templateselectCCostos.querySelector("#optccostos").value = objccostos;
        const clone = templateselectCCostos.cloneNode(true);
        fragment.appendChild(clone)
    });
    selectCCostos.appendChild(fragment);
};
//AUTOCOMPLETAR ZONA, LABOR, NIVEL
selectCCostos.addEventListener('change', function() {
    var selectedOption = this.options[selectCCostos.selectedIndex];
    var textCCostos = selectedOption.text;
    console.log(selectedOption.value + ': ' + selectedOption.text);
    var busquedaZonaLaborNivel = {
        "accion": "select",
        "palabra": textCCostos,
        "columna": "ccostos",
    }
    fechCCostosZonLabNiv(busquedaZonaLaborNivel);
});
const fechCCostosZonLabNiv = async (json) => {
    var jsonRequests = {
        "accion": 'mostrar',
        "other": json,
        "paginaActual": pageActual,
        "indiceRecorrido": indexTour,
        "paginasaVisualizar": pagesView,
        "finRecorrido": endTour,
        "filasVisualizar": rowstoDisplay
    }
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintZoLaNi(rptJson);
}
const paintZoLaNi = (data) => {
    console.log(data)
    var selectedOption = selectZona.options[selectZona.selectedIndex];
    var textCodZona = selectedOption.text;
    console.log(selectedOption.value + ': ' + selectedOption.text);
    if (textCodZona == 'Z') {
        console.log('es igual a Z');
    }
    arraySelect = data['sql']['list'][0];
    var idLabor = arraySelect['id_labor'];
    var valueZona = arraySelect['lab_zona'];
    var valueLabor = arraySelect['lab_labor'];
    var valueNivel = arraySelect['lab_nivel'];
    iptLabor.dataset.idlabor = idLabor;
    iptZona.value = valueZona;
    iptLabor.value = valueLabor;
    iptNivel.value = valueNivel;
};

/***
 * 
 * OBTENIENDO TABLA COLABORADOR
 * 
 */
const getfechForeignKey = async (json) => {

    if (json) {
        console.log('Se generara ');
        var accionSelect = json['accion'];
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
    const rpt = await fetch('./../../../controllers/controllerTareoList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
}
/*// GUARDAMOS EN VARIABLE
const btnLogin = document.getElementById("user-logout");

//Ejecutamos funcion
btnLogin.addEventListener("click", () => {
    window.location.href = ('./../../../ontrollers/CtrlSalir.php');
});*/

/*
const btnExportarExcel = document.getElementById("btn-ExportarExcel");
  btnExportarExcel.addEventListener("click", () => {
    console.log("Se exportara en Excel");
    generadorExcel();
  });
  const generadorExcel = async () => {
    var jsonRequests = {}
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./../../../excelGenerator.php', { 
      method: "POST", 
      headers: {
        'Content-Type': 'text/html',
        'Content-Type': 'application/x-www-form-urlencoded',
      },
      body });
}
*/