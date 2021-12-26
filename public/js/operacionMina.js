var arraySelectColaboradores;
// Declarando variables
const btnIncrementar =  document.getElementById("btn-increase");
const btndisminuir =  document.getElementById("btn-decline");
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsert = document.getElementById("mbtn-insert");
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


const iptinsertl = document.getElementById("insert-operacionMina-l");
const iptinsertlpv = document.getElementById("insert-operacionMina-lpv");
const iptinsertstto = document.getElementById("insert-operacionMina-stto");
const iptinsertserv = document.getElementById("insert-operacionMina-Serv");
const iptinsertcomentario = document.getElementById("insert-operacionMina-comentario");

const iptinserttipAvance = document.getElementById("insert-operacionMina-tipAvance");
const iptinsertmt = document.getElementById("insert-operacionMina-mt");
const iptinsertmt3 = document.getElementById("insert-operacionMina-mt3");
const iptinsertintDisparo = document.getElementById("insert-operacionMina-intDisparo");
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
document.addEventListener('DOMContentLoaded', e => {

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
});

btnInsert.addEventListener("click", () => {
    valRegistro = iptinsertRegistro.value;
    valTurno = iptinsertTurno.value;
    valGuardia = iptinsertGuardia.value;
    valNVale = iptinsertNVale.value;
    // Tipo de Disparo
    valradioTipo_dis = document.querySelector('input[name="radio-tipo_disparo"]:checked').value
    valCodLabor = iptinsertCodLabor.value;
    valNivel = iptinsertNivel.value;

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

    console.log("diste click");
    valInsert = {
        "registro": valRegistro,
        "turno": valTurno,
        "guardia": valGuardia,
        "nvale": valNVale,
        "tip_ disparo": valradioTipo_dis,
        "codZona": valCZona,
        "labor": valLabor,
        "zona": valZona,
        "codLabor": valCodLabor,
        "nivel": valNivel,
        "l": vall,
        "lpv": vallpv,
        "stto": valstto,
        "serv": valserv,
        "comentario": valcomentario,
        "tip_avanace": valtipavance,
        "mt": valmt,
        "mt3": valmt3,
        "int_disparo": valintDisparo,
        "resuelto": valresuelto,
        "manual": valmanual,
        "pala": valpala,
        "cantidad_pala": valcantidadpala,
        "mineral": valmineral,
        "winche": valwinche,
        "cantidad_winche": valcantidadwinche,
        "desmont": valdesmont,
    }
});
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
$("#insert-operacionMina-codzona").on('input', function () {
    var val=$('#insert-operacionMina-codzona').val();
    var validcodzona = $('#insert-options-codzona').find('option[value="'+val+'"]').data('id-codzona');
    var selectForm_codLabor = {
        "accion": "getcolumnWhere",
        "column": "lab_ccostos",
        "parament": validcodzona,
        "columnWhere": "id_zona",
    }
    if(validcodzona)
    {
        console.log(validcodzona);
        fetchCodlabor(selectForm_codLabor);
    }
 });

// Codigo Labor
 $("#insert-operacionMina-codLabor").on('input', function () {
    var val=$('#insert-operacionMina-codLabor').val();
    var validcodlabor = $('#insert-options-codLabor').find('option[value="'+val+'"]').data('id-codlabor');
    var selectForm = {
        "accion": "getcolumnsWhere",
        "columns": [
            "nombre", "labNombre_nombre", "nivel"
        ],
        "parament": validcodlabor,
        "columnWhere": "id_labor",
    }
    console.log(typeof selectForm);
    if(validcodlabor)
    {
        console.log(selectForm);
        fetchzonalabornivel(selectForm)
    }
 });

// Tareas
// Dni colabores (Maestro)
$("#insert-operacionaMina-dni-maestro").on('input', function () {
    var val=$('#insert-operacionaMina-dni-maestro').val();
    var validColaborador = $('#insert-options-dni-maestro').find('option[value="'+val+'"]').data('id-colaborador');//
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_nameMaestro.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoMaestro(selectFormCargo);
        }
        else{
            ipt_cargoMaestro.value = "no Registra";
        }
    }
 });

 // Nonbres colabores (Maestro)
$("#insert-operacionaMina-name-maestro").on('input', function () {
    var val=$('#insert-operacionaMina-name-maestro').val();
    var validColaborador = $('#insert-options-name-maestro').find('option[value="'+val+'"]').data('id-colaborador');//option template
    if(validColaborador)
    {
        //var rptsearch = searchColaborador(validColaborador);
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_dniMaestro.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoMaestro(selectFormCargo);
        }
        else{
            ipt_cargoMaestro.value = "no Registra";
        }
    }
 });

 //Traer Cargo Maestros ()
const fetchCargoMaestro = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    console.log(data);
    paintCargoMaestro(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoMaestro = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    console.log(arraySelect);
    ipt_cargoMaestro.value = arraySelect[0].cargo_nombre;
}

 // Dni colabores (Ayudante)
 $("#insert-operacionaMina-dni-ayudante").on('input', function () {
    var val=$('#insert-operacionaMina-dni-ayudante').val();
    var validColaborador = $('#insert-options-dni-ayudante').find('option[value="'+val+'"]').data('id-colaborador');//
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_nameAyudante.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoAyudante(selectFormCargo);
        }
        else{
            ipt_cargoAyudante.value = "no Registra";
        }
    }
 });

 // Nonbres colabores (Ayudante)
$("#insert-operacionaMina-name-ayudante").on('input', function () {
    var val=$('#insert-operacionaMina-name-ayudante').val();
    var validColaborador = $('#insert-options-name-ayudante').find('option[value="'+val+'"]').data('id-colaborador');
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_dniAyudante.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoAyudante(selectFormCargo);
        }
        else{
            ipt_cargoAyudante.value = "no Registra";
        }
    }
 });

//Traer Cargo Maestros ()
const fetchCargoAyudante = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    console.log(data);
    paintCargoAyudante(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoAyudante = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    console.log(arraySelect);
    ipt_cargoAyudante.value = arraySelect[0].cargo_nombre;
}

// Dni colabores (Tercer Persona)
$("#insert-operacionaMina-dni-tercer-hombre").on('input', function () {
    var val=$('#insert-operacionaMina-dni-tercer-hombre').val();
    var validColaborador = $('#insert-options-dni-tercer-hombre').find('option[value="'+val+'"]').data('id-colaborador');//
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_nameTercerpersona.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoTercerPersona(selectFormCargo);
        }
        else{
            ipt_cargoTercerPersona.value = "no Registra";
        }
    }
 });

 // Nonbres colabores (Tercer Persona)
$("#insert-operacionaMina-name-tercer-hombre").on('input', function () {
    var val=$('#insert-operacionaMina-name-tercer-hombre').val();
    var validColaborador = $('#insert-options-name-tercer-hombre').find('option[value="'+val+'"]').data('id-colaborador');
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_dniTercerpersona.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoTercerPersona(selectFormCargo);
        }
        else{
            ipt_cargoTercerPersona.value = "no Registra";
        }
    }
 });

//Traer Cargo Maestros ()
const fetchCargoTercerPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    console.log(data);
    paintCargoTercerPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoTercerPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    console.log(arraySelect);
    ipt_cargoTercerPersona.value = arraySelect[0].cargo_nombre;
}


// Dni colabores (Cuarto Persona)
$("#insert-operacionaMina-dni-cuarto-hombre").on('input', function () {
    var val=$('#insert-operacionaMina-dni-cuarto-hombre').val();
    var validColaborador = $('#insert-options-dni-cuarto-hombre').find('option[value="'+val+'"]').data('id-colaborador');//
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_nameCuartopersona.value = rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_apeMaterno + " " + rptsearch.col_nombres;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoCuartaPersona(selectFormCargo);
        }
        else{
            ipt_cargoCuartaPersona.value = "no Registra";
        }
    }
 });

 // Nonbres colabores (Cuarto Persona)
$("#insert-operacionaMina-name-cuarto-hombre").on('input', function () {
    var val=$('#insert-operacionaMina-name-cuarto-hombre').val();
    var validColaborador = $('#insert-options-name-cuarto-hombre').find('option[value="'+val+'"]').data('id-colaborador');
    if(validColaborador)
    {
        var rptsearch = arraySelectColaboradores.find( item => item.id_colaborador == validColaborador );
        iptinsert_dniCuartopersona.value = rptsearch.col_dni;
        var idCargo = rptsearch.id_cargo;
        if(idCargo){
            console.log("El id es: " + idCargo);
            var selectFormCargo = {
                "accion": "getcolumnWhere",
                "column": "cargo_nombre",
                "parament": idCargo,
                "columnWhere": "id_cargo",
            }
            fetchCargoCuartaPersona(selectFormCargo);
        }
        else{
            ipt_cargoCuartaPersona.value = "no Registra";
        }
    }
 });

//Traer Cargo Maestros ()
const fetchCargoCuartaPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerCargoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    console.log(data);
    paintCargoCuartaPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Cargo
const paintCargoCuartaPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    console.log(arraySelect);
    ipt_cargoCuartaPersona.value = arraySelect[0].cargo_nombre;
}

/////////////////////////////////////////////////////////////////////////////


//Traer codigo zona ()
const fetchCodzona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerLaborZoneList.php', {
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
    console.log(arraySelect);
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
    const res = await fetch('./../controllers/controllerLaborList.php',{
        method: "POST",
        body
    });
    const data = await res.json()
    // console.log(data)
    paintCodLabor(data)
}

//Traer codigo zona ()
const fetchzonalabornivel = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../controllers/controllerLaborList.php', {
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
    const res = await fetch('./../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    console.log(data);
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
    console.log('zona, labor, nivel');
    console.log(arraySelect);
    arraySelect.forEach(item => {
        iptinsertZona.value = item.nombre;
        iptinsertLabor.value = item.labNombre_nombre;
        iptinsertNivel.value = item.nivel;
    });
}

const paintDni_Nombres = (data) => {    
    arraySelectColaboradores = data['sql'];
    console.log(arraySelectColaboradores);
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
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').value = item.col_apePaterno +" "+ item.col_apeMaterno +" "+ item.col_nombres;
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').dataset.idColaborador = item.id_colaborador;
        const cloneDniMaestro = templateSelectDniMaestro.cloneNode(true);
        const cloneNameMaestro = templateSelectNameMaestro.cloneNode(true);
        fragmentdniMaestro.appendChild(cloneDniMaestro);
        fragmentnameMaestro.appendChild(cloneNameMaestro);

        // Ayudante
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').value = item.col_dni;
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').dataset.idColaborador = item.id_colaborador;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').value = item.col_apePaterno +" "+ item.col_apeMaterno +" "+ item.col_nombres;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').dataset.idColaborador = item.id_colaborador;
        const cloneDniAyudante = templateSelectDniAyudante.cloneNode(true);
        const cloneNameAyudante = templateSelectNameAyudante.cloneNode(true);
        fragmentdniAyudante.appendChild(cloneDniAyudante);
        fragmentnameAyudante.appendChild(cloneNameAyudante);

        // Tercer Persona
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').value = item.col_dni;
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').value = item.col_apePaterno +" "+ item.col_apeMaterno +" "+ item.col_nombres;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        const cloneDniTercerPersona = templateSelectDniTercerPersona.cloneNode(true);
        const cloneNameTercerPersona = templateSelectNameTercerPersona.cloneNode(true);
        fragmentdniTercerPersona.appendChild(cloneDniTercerPersona);
        fragmentnameTercerPersona.appendChild(cloneNameTercerPersona);

        // Cuarta Persona
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').value = item.col_dni;
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameCuartaPersona.querySelector('#template-opts-name-cuarto-hombre').value = item.col_apePaterno +" "+ item.col_apeMaterno +" "+ item.col_nombres;
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

$("#texto1").focus(function(){
    $(this).css("background-color", "#FFFFCC");
});