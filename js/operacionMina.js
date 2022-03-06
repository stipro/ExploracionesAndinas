var arraySelectColaboradores;
var indice;

const alertInsert = document.getElementById("alert-form-insert");
var objectarrayInstalacion;
// Declarando variables
const btnIncrementar = document.getElementById("btn-increase");
const btndisminuir = document.getElementById("btn-decline");
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsert = document.getElementById("mbtn-insert");
const btnNew = document.getElementById("mbtn-new");
const btnInsertTable = document.getElementById("insert-option-table");
const iptinsertTable_name = document.getElementById("nombre-instalaciones-table");
const iptinsertTable_cantidad = document.getElementById("cantidad-instalaciones-table");
const tbodyInstalaciones = document.getElementById("instalacion-body");
const iptinsertRegistro = document.getElementById("insert-operacionMina-registro");
const iptinsertTurno = document.getElementById("insert-operacionaMina-turno");
const iptinsertGuardia = document.getElementById("insert-operacionMina-guardia");
const iptinsertNVale = document.getElementById("insert-operacionMina-nvale");

// Seccion Centro de CCostos
const iptinsertCodZona = document.getElementById("insert-operacionMina-codzona");
const dtlistOptionCodZona = document.getElementById("insert-options-codzona");
const iptinsertCodLabor = document.getElementById("insert-operacionMina-codLabor");
const dtlistOptionscodlabor = document.getElementById("insert-options-codLabor");
const iptinsertZona = document.getElementById("insert-operacionMina-zona");
const iptinsertLabor = document.getElementById("insert-operacionMina-labor");
const iptinsertNivel = document.getElementById("insert-operacionMina-nivel");

// Seccion Tareas
// Maestro
const iptinsert_dniMaestro = document.getElementById("insert-operacionaMina-dni-maestro");
const datalistinsert_optiondniMaestro = document.getElementById("insert-options-dni-maestro");
const ipt_cargoMaestro = document.getElementById("insert-operacionaMina-cargo-maestro");
const iptinsert_nameMaestro = document.getElementById("insert-operacionaMina-name-maestro");
const datalistinsert_optionnameMaestro = document.getElementById("insert-options-name-maestro");

// Ayudante
const iptinsert_dniAyudante = document.getElementById("insert-operacionaMina-dni-ayudante");
const datalistinsert_optiondniAyudante = document.getElementById("insert-options-dni-ayudante");
const ipt_cargoAyudante = document.getElementById("insert-operacionaMina-cargo-ayudante");
const iptinsert_nameAyudante = document.getElementById("insert-operacionaMina-name-ayudante");
const datalistinsert_optionnameAyudante = document.getElementById("insert-options-name-ayudante");

// 3ter Persona
const iptinsert_dniTercerpersona = document.getElementById("insert-operacionaMina-dni-tercer-hombre");
const datalistinsert_optiondniTercerPersona = document.getElementById("insert-options-dni-tercer-hombre");
const ipt_cargoTercerPersona = document.getElementById("insert-operacionaMina-cargo-tercer-hombre");
const iptinsert_nameTercerpersona = document.getElementById("insert-operacionaMina-name-tercer-hombre");
const datalistinsert_optionnameTercerPersona = document.getElementById("insert-options-name-tercer-hombre");

// 4to Persona
const iptinsert_dniCuartopersona = document.getElementById("insert-operacionaMina-dni-cuarto-hombre");
const datalistinsert_optiondniCuartaPersona = document.getElementById("insert-options-dni-cuarto-hombre");
const ipt_cargoCuartaPersona = document.getElementById("insert-operacionaMina-cargo-cuarto-hombre");
const iptinsert_nameCuartopersona = document.getElementById("insert-operacionaMina-name-cuarto-hombre");
const datalistinsert_optionnameCuartaPersona = document.getElementById("insert-options-name-cuarto-hombre");

// Instalaciones
const datalistinsert_optionsInstalaciones = document.getElementById("nombre-instalaciones-options");
const datalistinsert_optionsCuadro = document.getElementById("insert-options-cuadro");
const datalistinsert_optionsCribing = document.getElementById("insert-options-cribing");
const iptinsertl = document.getElementById("insert-operacionMina-l");
const iptinsertlpv = document.getElementById("insert-operacionMina-lpv");
const iptinsertstto = document.getElementById("insert-operacionMina-stto");
const iptinsertserv = document.getElementById("insert-operacionMina-Serv");
const iptinsertcomentario = document.getElementById("insert-operacionMina-comentario");
const iptinserttipAvance = document.getElementById("insert-operacionMina-tipo-avance");
const iptinsertmt = document.getElementById("insert-operacionMina-mt");
const iptinsertmt3 = document.getElementById("insert-operacionMina-mt3");
const iptinsertintDisparo = document.getElementById("insert-operacionMina-int-disparo");
const iptinsertresuelto = document.getElementById("insert-operacionMina-resuelto");
const iptinsertmanual = document.getElementById("insert-operacionMina-Manual");
const iptinsertpala = document.getElementById("insert-operacionMina-pala");
const iptinsertcantidadPala = document.getElementById("insert-operMina-cantidadPala");
const iptinsertmineral = document.getElementById("insert-operMina-mineral");
const iptinsertWinche = document.getElementById("insert-operacionMina-winche");
const iptinsertcantidadWinche = document.getElementById("insert-operacionMina-cantidadWinche");
const iptinsertdesmont = document.getElementById("insert-operacionMina-Desmon");

// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {});

btnNew.addEventListener("click", () => {
    resetFormulario();
});
btnAgregar.addEventListener("click", () => {
    iptinsertRegistro.value;
    iptinsertTurno.value;
    iptinsertGuardia.value;
    iptinsertNVale.value;
    iptinsertCodLabor.value;
    iptinsertNivel.value;
    var selectFoorm_codZona = {
        "accion": "getcolumnAll",
        "column": "letra"
    }
    fetchCodzona(selectFoorm_codZona);
    var selectFoorm_colaborador = {
        "accion": "getcolumnAll",
        "column": "col_dni"
    }
    fetchColaborador(selectFoorm_colaborador);
    var selectForm_instalacionMina = {
        "accion": "getcolumnAll",
        "column": "instalacionesMIna_nombre"
    }
    fetchInstalaciones(selectForm_instalacionMina);
});

btnInsert.addEventListener("click", () => {
    valArray_Instalaciones = getValue_Table();
    console.log('Instalacion');
    console.log(valArray_Instalaciones);
    console.log(typeof valArray_Instalaciones);
    valRegistro = iptinsertRegistro.value;
    valTurno = iptinsertTurno.value;
    valGuardia = iptinsertGuardia.value;
    valNVale = iptinsertNVale.value;
    // Tipo de Disparo
    valradioTipo_dis = document.querySelector('input[name="radio-tipo_disparo"]:checked').value
    var valdatalist = $('#insert-operacionMina-codLabor').val();
    var validLabor = $('#insert-options-codLabor').find('option[value="' + valdatalist + '"]').data('id-codlabor');
    valNivel = iptinsertNivel.value;
    // Tareas
    var datalistMaestro = $('#insert-operacionaMina-dni-maestro').val();
    var validMaestro = $('#insert-options-dni-maestro').find('option[value="' + datalistMaestro + '"]').data('id-colaborador');

    var datalistAyudante = $('#insert-operacionaMina-dni-ayudante').val();
    var validAyudante = $('#insert-options-dni-ayudante').find('option[value="' + datalistAyudante + '"]').data('id-colaborador');

    var datalistTercerHombre = $('#insert-operacionaMina-dni-tercer-hombre').val();
    var validTercerHombre = $('#insert-options-dni-tercer-hombre').find('option[value="' + datalistTercerHombre + '"]').data('id-colaborador');

    var datalistCuartoHombre = $('#insert-operacionaMina-dni-cuarto-hombre').val();
    var validCuartoHombre = $('#insert-options-dni-cuarto-hombre').find('option[value="' + datalistCuartoHombre + '"]').data('id-colaborador');

    vall = iptinsertl.value;
    vallpv = iptinsertlpv.value;
    valstto = iptinsertstto.value;
    valserv = iptinsertserv.value;
    valcomentario = iptinsertcomentario.value;

    valtipavance = iptinserttipAvance.value;
    valmt = iptinsertmt.value;
    valmt3 = iptinsertmt3.value;
    valintDisparo = iptinsertintDisparo.value;
    valresuelto = iptinsertresuelto.value;

    valmanual = iptinsertmanual.value;
    valpala = iptinsertpala.value;
    valcantidadpala = iptinsertcantidadPala.value;
    valmineral = iptinsertmineral.value;
    valwinche = iptinsertWinche.value;
    valcantidadwinche = iptinsertcantidadWinche.value;
    valdesmont = iptinsertdesmont.value;

    valInsert = {
        "datos_registro": valRegistro,
        "datos_turno": valTurno,
        "datos_guardia": valGuardia,
        "datos_nvale": valNVale,
        "datos_actividad": valradioTipo_dis,
        "id_Labor": validLabor,
        "tareas": {
            1: {
                "id": validMaestro,
                "nombre": "Maestro"
            },
            2: {
                "id": validAyudante,
                "nombre": "Ayudante"
            },
            3: {
                "id": validTercerHombre,
                "nombre": "TercerHombre"
            },
            4: {
                "id": validCuartoHombre,
                "nombre": "CuartoHombre"
            }
        },
        "list_instalaciones": valArray_Instalaciones,
        "tareas_l": vall,
        "tareas_lpv": vallpv,
        "tareas_stto": valstto,
        "tareas_serv": valserv,
        "tareas_comentario": valcomentario,
        "avanActual_tipAvance": valtipavance,
        "avanActual_mt": valmt,
        "avanActual_mt3": valmt3,
        "avanActual_intDisparo": valintDisparo,
        "avanActual_resuelto": valresuelto,
        "limpieza_manual": valmanual,
        "limpieza_pala": valpala,
        "limpieza_cantidadPala": valcantidadpala,
        "limpieza_winche": valwinche,
        "limpieza_cantidadWinche": valcantidadwinche,
        "limpieza_mineral": valmineral,
        "limpieza_desmont": valdesmont
    }
    console.log('Se esta enviando datos de operacion Mina');
    console.log(valInsert);
    var form_insert = {
        "accion": "insert",
        "list": valInsert
    }
    requestInsert(form_insert);

});


// Traer productos
const requestInsert = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerOperacionMina.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);

    afterRequestInsert(result);
}

const afterRequestInsert = (data) => {
    alertInsert.innerHTML = '';
    console.log(data);

    sqlRpt = data['sql']
    if (sqlRpt['estado'] == 1) {
        $.niftyNoty({
            type: 'success',
            container: '#alert-form-insert',
            html: '<strong>Bien hecho!</strong> ' + sqlRpt['mensaje'] + ', codigo generado : [' + sqlRpt['coperacion'] + ']',
            focus: false,
            timer: 8000
        });
        resetFormulario();
    } else {
        if (data['rptController']['estado'] == 0) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> ' + data['rptController']['mensaje'],
                focus: false,
            });
        } else {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> ' + sqlRpt['messageUser'],
                focus: false,
            });
        }

        console.log('No');
    }
};
/*
iptinsertCZona.addEventListener('keyup', function(e) {
    var costLaborSelect = iptinsertCZona.options[iptinsertCZona.selectedIndex];
    idCZona = costLaborSelect.dataset.idCodzona;
    console.log(idCZona);
    var selectFoorm_codLabor = {
        "accion": "getcolumnWhere",
        "column": "lab_ccostos",
        "parament": idCZona,
    }
    //fetchCodlabor(selectFoorm_codLabor);
});*/

// Detectores de cambio de input
// Codigo Zona
$("#insert-operacionMina-codzona").on('input', function() {
    var val = $('#insert-operacionMina-codzona').val();
    var validcodzona = $('#insert-options-codzona').find('option[value="' + val + '"]').data('id-codzona');
    var selectForm_codLabor = {
        "accion": "getcolumnWhere",
        "column": "lab_ccostos",
        "parament": validcodzona,
        "columnWhere": "id_zona",
    }
    if (validcodzona) {
        fetchCodlabor(selectForm_codLabor);
    }
});

// Codigo Labor
$("#insert-operacionMina-codLabor").on('input', function() {
    var val = $('#insert-operacionMina-codLabor').val();
    var validcodlabor = $('#insert-options-codLabor').find('option[value="' + val + '"]').data('id-codlabor');
    var selectForm = {
        "accion": "getcolumnsWhere",
        "columns": [
            "nombre", "labNombre_nombre", "nivel"
        ],
        "parament": validcodlabor,
        "columnWhere": "id_labor",
    }
    if (validcodlabor) {
        fetchzonalabornivel(selectForm)
    }
});

// Tareas
// Dni colabores (Maestro)
$("#insert-operacionaMina-dni-maestro").on('input', function() {
    var val = $('#insert-operacionaMina-dni-maestro').val();
    var validColaborador = $('#insert-options-dni-maestro').find('option[value="' + val + '"]').data('id-colaborador'); //
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_nameMaestro.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoMaestro(selectFormCargo);
        } else {
            ipt_cargoMaestro.value = "no Registra";
        }
    }
});

// Nonbres colabores (Maestro)
$("#insert-operacionaMina-name-maestro").on('input', function() {
    var val = $('#insert-operacionaMina-name-maestro').val();
    var validColaborador = $('#insert-options-name-maestro').find('option[value="' + val + '"]').data('id-colaborador'); //option template
    if (validColaborador) {
        //var rptsearch = searchColaborador(validColaborador);
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_dniMaestro.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoMaestro(selectFormCargo);
        } else {
            ipt_cargoMaestro.value = "no Registra";
        }
    }
});

//Traer Cargo Maestros ()
const fetchCargoMaestro = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paintCargoMaestro(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoMaestro = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    ipt_cargoMaestro.value = arraySelect[0].cargo_nombre;
}

// Dni colabores (Ayudante)
$("#insert-operacionaMina-dni-ayudante").on('input', function() {
    var val = $('#insert-operacionaMina-dni-ayudante').val();
    var validColaborador = $('#insert-options-dni-ayudante').find('option[value="' + val + '"]').data('id-colaborador'); //
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_nameAyudante.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoAyudante(selectFormCargo);
        } else {
            ipt_cargoAyudante.value = "no Registra";
        }
    }
});

// Nonbres colabores (Ayudante)
$("#insert-operacionaMina-name-ayudante").on('input', function() {
    var val = $('#insert-operacionaMina-name-ayudante').val();
    var validColaborador = $('#insert-options-name-ayudante').find('option[value="' + val + '"]').data('id-colaborador');
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_dniAyudante.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoAyudante(selectFormCargo);
        } else {
            ipt_cargoAyudante.value = "no Registra";
        }
    }
});

//Traer Cargo Maestros ()
const fetchCargoAyudante = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paintCargoAyudante(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoAyudante = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    ipt_cargoAyudante.value = arraySelect[0].cargo_nombre;
}

// Dni colabores (Tercer Persona)
$("#insert-operacionaMina-dni-tercer-hombre").on('input', function() {
    var val = $('#insert-operacionaMina-dni-tercer-hombre').val();
    var validColaborador = $('#insert-options-dni-tercer-hombre').find('option[value="' + val + '"]').data('id-colaborador'); //
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_nameTercerpersona.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoTercerPersona(selectFormCargo);
        } else {
            ipt_cargoTercerPersona.value = "no Registra";
        }
    }
});

// Nonbres colabores (Tercer Persona)
$("#insert-operacionaMina-name-tercer-hombre").on('input', function() {
    var val = $('#insert-operacionaMina-name-tercer-hombre').val();
    var validColaborador = $('#insert-options-name-tercer-hombre').find('option[value="' + val + '"]').data('id-colaborador');
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_dniTercerpersona.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoTercerPersona(selectFormCargo);
        } else {
            ipt_cargoTercerPersona.value = "no Registra";
        }
    }
});

//Traer Cargo Maestros ()
const fetchCargoTercerPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paintCargoTercerPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoTercerPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    ipt_cargoTercerPersona.value = arraySelect[0].cargo_nombre;
}


// Dni colabores (Cuarto Persona)
$("#insert-operacionaMina-dni-cuarto-hombre").on('input', function() {
    var val = $('#insert-operacionaMina-dni-cuarto-hombre').val();
    var validColaborador = $('#insert-options-dni-cuarto-hombre').find('option[value="' + val + '"]').data('id-colaborador'); //
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_nameCuartopersona.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoCuartaPersona(selectFormCargo);
        } else {
            ipt_cargoCuartaPersona.value = "no Registra";
        }
    }
});

// Nonbres colabores (Cuarto Persona)
$("#insert-operacionaMina-name-cuarto-hombre").on('input', function() {
    var val = $('#insert-operacionaMina-name-cuarto-hombre').val();
    var validColaborador = $('#insert-options-name-cuarto-hombre').find('option[value="' + val + '"]').data('id-colaborador');
    if (validColaborador) {
        var rptsearch = arraySelectColaboradores.find(item => item.id_colaborador == validColaborador);
        iptinsert_dniCuartopersona.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if (idCargo) {
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoCuartaPersona(selectFormCargo);
        } else {
            ipt_cargoCuartaPersona.value = "no Registra";
        }
    }
});

//Traer Cargo Maestros ()
const fetchCargoCuartaPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paintCargoCuartaPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoCuartaPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    ipt_cargoCuartaPersona.value = arraySelect[0].cargo_nombre;
}

/////////////////////////////////////////////////////////////////////////////


//Traer codigo zona ()
const fetchCodzona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerLaborZoneList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintZonas(data)
}

// Pintar zona datalist
const paintZonas = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    dtlistOptionCodZona.innerHTML = '';
    const templateSelect = document.querySelector("#template-opt-cod_zona").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(item => {
        templateSelect.querySelector('#opt-codzona').value = item.letra;
        templateSelect.querySelector('#opt-codzona').dataset.idCodzona = item.id_zona;
        const clone = templateSelect.cloneNode(true);
        fragment.appendChild(clone)
    })
    dtlistOptionCodZona.appendChild(fragment);
}

//Traer codigo Labor ()
const fetchCodlabor = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    paintCodLabor(data)
}

//Traer codigo zona ()
const fetchzonalabornivel = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintZonaLaborNivel(data)
}

//Traer Colaborador ()
const fetchColaborador = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintDni_Nombres(data)
}

// Pintar Coigo Labor datalist
const paintCodLabor = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    dtlistOptionscodlabor.innerHTML = '';
    const templateSelect = document.querySelector("#template-opt-codLabor").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(item => {
        templateSelect.querySelector('#opt-codLabor').value = item.lab_ccostos;
        templateSelect.querySelector('#opt-codLabor').dataset.idCodlabor = item.id_labor;
        const clone = templateSelect.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtlistOptionscodlabor.appendChild(fragment);
}

const paintZonaLaborNivel = (data) => {
    arraySelect = data['sql'];
    arraySelect.forEach(item => {
        iptinsertZona.value = item.nombre;
        iptinsertLabor.value = item.labNombre_nombre;
        iptinsertNivel.value = item.lab_nivel;
    });
}

const paintDni_Nombres = (data) => {
    arraySelectColaboradores = data['sql'];
    //iptinsert_dniMaestro
    datalistinsert_optiondniMaestro.innerHTML = '';
    const templateSelectDniMaestro = document.querySelector("#template-opt-dni-maestro").content;
    const fragmentdniMaestro = document.createDocumentFragment();

    datalistinsert_optionnameMaestro.innerHTML = '';
    const templateSelectNameMaestro = document.querySelector("#template-opt-name-maestro").content;
    const fragmentnameMaestro = document.createDocumentFragment();

    datalistinsert_optiondniAyudante.innerHTML = '';
    const templateSelectDniAyudante = document.querySelector("#template-opt-dni-ayudante").content;
    const fragmentdniAyudante = document.createDocumentFragment();

    datalistinsert_optionnameAyudante.innerHTML = '';
    const templateSelectNameAyudante = document.querySelector("#template-opt-name-ayudante").content;
    const fragmentnameAyudante = document.createDocumentFragment();

    datalistinsert_optiondniTercerPersona.innerHTML = '';
    const templateSelectDniTercerPersona = document.querySelector("#template-opt-dni-tercer-hombre").content;
    const fragmentdniTercerPersona = document.createDocumentFragment();

    datalistinsert_optionnameTercerPersona.innerHTML = '';
    const templateSelectNameTercerPersona = document.querySelector("#template-opt-name-tercer-hombre").content;
    const fragmentnameTercerPersona = document.createDocumentFragment();

    datalistinsert_optiondniCuartaPersona.innerHTML = '';
    const templateSelectDniCuartaPersona = document.querySelector("#template-opt-dni-cuarto-hombre").content;
    const fragmentdniCuartaPersona = document.createDocumentFragment();

    datalistinsert_optionnameCuartaPersona.innerHTML = '';
    const templateSelectNameCuartaPersona = document.querySelector("#template-opt-name-cuarto-hombre").content;
    const fragmentnameCuartaPersona = document.createDocumentFragment();
    arraySelectColaboradores.forEach(item => {
        // Maestro
        templateSelectDniMaestro.querySelector('#template-opts-dni-maestro').value = item.col_dni;
        templateSelectDniMaestro.querySelector('#template-opts-dni-maestro').dataset.idColaborador = item.id_colaborador;
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').dataset.idColaborador = item.id_colaborador;
        const cloneDniMaestro = templateSelectDniMaestro.cloneNode(true);
        const cloneNameMaestro = templateSelectNameMaestro.cloneNode(true);
        fragmentdniMaestro.appendChild(cloneDniMaestro);
        fragmentnameMaestro.appendChild(cloneNameMaestro);

        // Ayudante
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').value = item.col_dni;
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').dataset.idColaborador = item.id_colaborador;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').dataset.idColaborador = item.id_colaborador;
        const cloneDniAyudante = templateSelectDniAyudante.cloneNode(true);
        const cloneNameAyudante = templateSelectNameAyudante.cloneNode(true);
        fragmentdniAyudante.appendChild(cloneDniAyudante);
        fragmentnameAyudante.appendChild(cloneNameAyudante);

        // Tercer Persona
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').value = item.col_dni;
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        const cloneDniTercerPersona = templateSelectDniTercerPersona.cloneNode(true);
        const cloneNameTercerPersona = templateSelectNameTercerPersona.cloneNode(true);
        fragmentdniTercerPersona.appendChild(cloneDniTercerPersona);
        fragmentnameTercerPersona.appendChild(cloneNameTercerPersona);

        // Cuarta Persona
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').value = item.col_dni;
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameCuartaPersona.querySelector('#template-opts-name-cuarto-hombre').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectNameCuartaPersona.querySelector('#template-opts-name-cuarto-hombre').dataset.idColaborador = item.id_colaborador;
        const cloneDniCuartaPersona = templateSelectDniCuartaPersona.cloneNode(true);
        const cloneNameCuartaPersona = templateSelectNameCuartaPersona.cloneNode(true);
        fragmentdniCuartaPersona.appendChild(cloneDniCuartaPersona);
        fragmentnameCuartaPersona.appendChild(cloneNameCuartaPersona);
    });
    //Maestro
    datalistinsert_optiondniMaestro.appendChild(fragmentdniMaestro);
    datalistinsert_optionnameMaestro.appendChild(fragmentnameMaestro);

    // Ayudante
    datalistinsert_optiondniAyudante.appendChild(fragmentdniAyudante);
    datalistinsert_optionnameAyudante.appendChild(fragmentnameAyudante);

    // Tercer Persona
    datalistinsert_optiondniTercerPersona.appendChild(fragmentdniTercerPersona);
    datalistinsert_optionnameTercerPersona.appendChild(fragmentnameTercerPersona);

    // Cuarta Persona
    datalistinsert_optiondniCuartaPersona.appendChild(fragmentdniCuartaPersona);
    datalistinsert_optionnameCuartaPersona.appendChild(fragmentnameCuartaPersona);
}

// Incrementar
btnIncrementar.addEventListener('click', () => {
    console.log('Se va incrementar');
})
// Disminuir
btndisminuir.addEventListener('click', () => {
    console.log('Se va disminuir');
})

$("#texto1").focus(function() {
    $(this).css("background-color", "#FFFFCC");
});

// Instalaciones

// Obtienes Fila
$(".use-address").click(function() {
    var $row = $(this).closest("tr"); // Find the row
    var $tds = $row.find("td");
    $.each($tds, function() {
        console.log($(this).text());
    });
});

// Obtener por Fila
$(".boton").click(function() {
    var valores = "";
    // Obtenemos todos los valores contenidos en los <td> de la fila
    // seleccionada
    $(this).parents("tr").find("td").each(function() {
        valores += $(this).html() + "\n";
    });
    alert(valores);
});

// Obtienes Fila
$(".btn-get-all").click(function() {
    getValue_Table();
});

const getValue_Table = () => {
    var arrayTable = [],
        keys = [
            'item1',
            'nombre',
            'cantidad',
            'medida',
            'id',
        ];
    var t = document.getElementById('instalacion-body');
    if (t) {
        Array.from(t.rows).forEach((tr, row_ind) => {
            var oRow = {};
            Array.from(tr.cells).forEach((cell, col_ind) => {
                console.log('Value at row/col [' + row_ind + ',' + col_ind + '] = ' + cell.textContent);
                console.log(typeof cell.textContent);
                if (cell.textContent) {
                    if (cell.dataset.idInstalacionmina) {
                        //console.log('No esta vacio');
                        //console.log('Id is : ' + cell.dataset.idInstalacionmina);
                        id = cell.dataset.idInstalacionmina;
                    }
                    oRow[keys[col_ind]] = cell.textContent;

                }
                if (col_ind == 4) {
                    oRow[keys[col_ind]] = id;
                    console.log('Es 4');
                }
            });
            arrayTable.push(oRow);
        });
    }
    return arrayTable;
}


//Traer Instalaciones
const fetchInstalaciones = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerInstalacionMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    console.log("Instalaciones");
    console.log(data);
    objectarrayInstalacion = data['sql']
    datalistinsert_optionsInstalaciones.innerHTML = "";
    const template_optsInstalaciones = document.querySelector("#template-opts-name-instalaciones").content;
    const fragment_optsInstalaciones = document.createDocumentFragment();

    objectarrayInstalacion.forEach(item => {
        template_optsInstalaciones.querySelector('#template-opt-name-instalaciones').value = item.instalacionesMIna_nombre;
        template_optsInstalaciones.querySelector('#template-opt-name-instalaciones').dataset.idInstalacionmina = item.id_instalacionMina;
        template_optsInstalaciones.querySelector('#template-opt-name-instalaciones').dataset.medidaInstalacionmina = item.instalacionMina_medida;
        const clone_optsInstalaciones = template_optsInstalaciones.cloneNode(true);
        fragment_optsInstalaciones.appendChild(clone_optsInstalaciones);
    });

    datalistinsert_optionsInstalaciones.appendChild(fragment_optsInstalaciones);
}

const enumeracion_Table = () => {
    var table = document.getElementById('instalacion-body')[0],
        rows = table.getElementsByTagName('tr'),
        text = 'textContent' in document ? 'textContent' : 'innerText';
    console.log(text);

    for (var i = 0, len = rows.length; i < len; i++) {
        rows[i].children[0][text] = i + ': ' + rows[i].children[0][text];
    }
}

$("#insert-operacionMina-cuadro").on('input', function() {
    var val = $('#insert-operacionMina-cuadro').val();
    var validcodzona = $('#insert-options-cuadro').find('option[value="' + val + '"]').data('id-codzona');
    var selectForm_codLabor = {
        "accion": "getcolumnWhere",
        "column": "lab_ccostos",
        "parament": validcodzona,
        "columnWhere": "id_zona",
    }
    if (validcodzona) {
        console.log(validcodzona);
        fetchCodlabor(selectForm_codLabor);
    }
});


btnInsertTable.addEventListener("click", () => {
    valNameInstalacion = iptinsertTable_name.value;
    console.log(valNameInstalacion);
    valCantidadInstalacion = iptinsertTable_cantidad.value;
    console.log(valCantidadInstalacion);

    if (valNameInstalacion && valCantidadInstalacion) {
        var val = $('#nombre-instalaciones-table').val();
        var valnameInstalacion = $('#nombre-instalaciones-options').find('option[value="' + val + '"]').val();
        var validInstalacion = $('#nombre-instalaciones-options').find('option[value="' + val + '"]').data('id-instalacionmina');
        var valmedidaInstalacion = $('#nombre-instalaciones-options').find('option[value="' + val + '"]').data('medida-instalacionmina');
        console.log(validInstalacion);
        console.log(valmedidaInstalacion);
        /* var rptsearch_Instalacion = objectarrayInstalacion.find(item => item.id_instalacionMina == validInstalacion);
        if (rptsearch_Instalacion) { */
        const templatetdInstalacion = document.querySelector("#template-td-instalaciones").content;
        const fragmentInstalacion = document.createDocumentFragment();
        indice++;
        //templatetdInstalacion.querySelector('#indice').textContent = indice;
        templatetdInstalacion.querySelector('#template-tds-name-instalaciones').textContent = valnameInstalacion;
        templatetdInstalacion.querySelector('#template-tds-name-instalaciones').dataset.idInstalacionmina = validInstalacion;
        templatetdInstalacion.querySelector('#template-tds-cantidad-instalaciones').textContent = valCantidadInstalacion;
        templatetdInstalacion.querySelector('#template-tds-unidad-instalaciones').textContent = valmedidaInstalacion;

        const clone_tdInstalaciones = templatetdInstalacion.cloneNode(true);
        fragmentInstalacion.appendChild(clone_tdInstalaciones);

        tbodyInstalaciones.appendChild(fragmentInstalacion);

        $(function() {
            $(document).on('click', '.borrar', function(event) {
                event.preventDefault();
                $(this).closest('tr').remove();
            });
        });

        iptinsertTable_name.value = '';
        iptinsertTable_cantidad.value = '';
        //enumeracion_Table();
        /* } else {
            $.niftyNoty({
                type: 'warning',
                container: '#alert-form-insert',
                html: '<strong>¡Advertencia!</strong> Instalacion no registrada.',
                focus: false,
                timer: 2000
            });
        } */
    } else {
        if (!valNameInstalacion) {
            $.niftyNoty({
                type: 'warning',
                container: '#alert-form-insert',
                html: '<strong>¡Advertencia!</strong> Ingrese Nombre.',
                focus: false,
                timer: 2000
            });
        }
        if (!valCantidadInstalacion) {
            $.niftyNoty({
                type: 'warning',
                container: '#alert-form-insert',
                html: '<strong>¡Advertencia!</strong> Ingrese Cantidad.',
                focus: false,
                timer: 2000
            });
        }
    }
})
const resetFormulario = () => {
    // Datos
    iptinsertTurno.value = '';
    iptinsertGuardia.value = '';
    iptinsertNVale.value = '';
    // Centro de Costos
    iptinsertCodZona.value = '';
    iptinsertCodLabor.value = '';
    iptinsertZona.value = '';
    iptinsertLabor.value = '';
    iptinsertNivel.value = '';
    // Tareas
    iptinsert_dniMaestro.value = '';
    iptinsert_nameMaestro.value = '';
    ipt_cargoMaestro.value = '';
    iptinsert_dniAyudante.value = '';
    iptinsert_nameAyudante.value = '';
    ipt_cargoAyudante.value = '';
    iptinsert_dniTercerpersona.value = '';
    iptinsert_nameTercerpersona.value = '';
    ipt_cargoTercerPersona.value = '';
    iptinsert_dniCuartopersona.value = '';
    iptinsert_nameCuartopersona.value = '';
    ipt_cargoCuartaPersona.value = '';
    iptinsertl.value = '';
    iptinsertlpv.value = '';
    iptinsertstto.value = '';
    iptinsertserv.value = '';
    iptinsertcomentario.value = '';
    // Instalaciones
    iptinsertTable_name.value = '';
    iptinsertTable_cantidad.value = '';
    tbodyInstalaciones.innerHTML = '';
    // Avance Actual
    iptinserttipAvance.value = '';
    iptinsertmt.value = '';
    iptinsertmt3.value = '';
    iptinsertintDisparo.value = '';
    iptinsertresuelto.value = '';
    // Limpieza
    iptinsertmanual.value = '';
    iptinsertpala.value = '';
    iptinsertcantidadPala.value = '';
    iptinsertmineral.value = '';
    iptinsertWinche.value = '';
    iptinsertcantidadWinche.value = '';
    iptinsertdesmont.value = '';
}
document.getElementById('insert-operacionMina-registro').addEventListener('keydown', inputCharacters_registro);
document.getElementById('insert-operacionaMina-turno').addEventListener('keydown', inputCharacters_turno);
document.getElementById('insert-operacionMina-guardia').addEventListener('keydown', inputCharacters_guardia);
document.getElementById('insert-operacionMina-nvale').addEventListener('keydown', inputCharacters_nvale);
document.getElementById('opcion-tipo_disparo1').addEventListener('keydown', inputCharacters_tipDisparo);
document.getElementById('insert-operacionMina-codzona').addEventListener('keydown', inputCharacters_codZona);

function inputCharacters_registro(event) {
    if (event.keyCode == 13) {
        document.getElementById('insert-operacionaMina-turno').focus();
    }
}

function inputCharacters_turno(event) {
    if (event.keyCode == 13) {
        document.getElementById('insert-operacionMina-guardia').focus();
    }
}

function inputCharacters_guardia(event) {
    if (event.keyCode == 13) {
        document.getElementById('insert-operacionMina-nvale').focus();
    }
}

function inputCharacters_nvale(event) {
    if (event.keyCode == 13) {
        document.getElementById('opcion-tipo_disparo1').focus();
    }
}

function inputCharacters_tipDisparo(event) {
    if (event.keyCode == 13) {
        document.getElementById('insert-operacionMina-codzona').focus();
    }
}

function inputCharacters_codZona(event) {
    if (event.keyCode == 13) {
        document.getElementById('insert-operacionMina-codLabor').focus();
    }
}
$(document).ready(function() {
    $('#example').DataTable();
});