var idRegistro;
//VARIABLE PAGINA ACTUAL
var pageActualSelect = 0;
//NUMERO DE CELDAS A MOSTRAR
var pagesView = 3;
//INDICA INICIO DE RECORRIDO
var indexTourSelect = 0;
//INDICA FIN DE RECORRIDO
var endTour = 3;
// FILAS A VISUALIZAR
var rowstoDisplay = 5;
// Declaramos BOTONES
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsertar = document.getElementById("mbtn-insert");
const btnNuevo = document.getElementById("mbtn-new");
// Dclaramos Formularios
// Codigo vale o numero de Impreso
var inputPreImpre = document.getElementById('val_explosivo-text-form-pre_impre');
// Información General del Vale
// Numero de vale
var inputNVale = document.getElementById('val_explosivo-text-form-n_vale');
// Digiador
var inputDigitador = document.getElementById('val_explosivo-ipt-text-form-digitador');
// Zona
var selectZona = document.getElementById('val_explosivo-text-form-zona');
// Turno
var selectTurno = document.getElementById('val_explosivo-text-form-turno');
// Fecha de registro
var dateRegistro = document.getElementById('val_explosivo-text-form-fecha');
// Detalle del Vale
// Codigo de labor
var selectCostLabor = document.getElementById('val_explosivo-text-form-labor_codigo');
// Nombre de labor
var selectNombLabor = document.getElementById('val_explosivo-text-form-labor');
// Nivel de Zona
var inputNivelLabor = document.getElementById('val_explosivo-text-form-nivel');
//var selectTipoLabor = document.getElementById('val_explosivo-text-form-labor_tipo');

// --Tipo de Disparo

// --Disparo en

// Perforista
var selectPerforista = document.getElementById('val_explosivo-text-form-perforista');
// Calculo Explosivos
// Resultado Dinamita Semigelatinosa de 65%
var inputFormCalDimResultSemigelatinosa = document.getElementById('val_explosivo-text-form-resdin_semi');
// Resultado Dinamita Pulverulenta 65_7/8
var inputFormCalDimResultPulverulenta = document.getElementById('val_explosivo-text-form-resdin_pulv');
// Suma de Semigelatinosa con Pulverulenta
var inputFormSumaPulSemi = document.getElementById('suma-dimPulv-dimSemi');
// Registro de Perforadoras
// Barras
var selectFormBarra = document.getElementById('val_explosivo-input-form-barra');
// Lgt
var inputFormLgt_mt = document.getElementById('val_explosivo-input-form-lgt_mt');
// N° Taladros
var inputFormNTaladro = document.getElementById('val_explosivo-input-form-n_taladro');
// Taladro vacios
var inputFormTVacio = document.getElementById('val_explosivo-input-form-tal_vacio');
// Resultado
// Pies Perf
var inputFormPPerf = document.getElementById('val_explosivo-input-form-pies_perf');
// Pies Real
var inputFormPReal = document.getElementById('val_explosivo-input-form-pies_real');
// Numero de maquinas
var selectNMaquinas = document.getElementById('val_explosivo-text-form-nmaquinas');

//var valFormPPerf;
var iconValidadorPerforista = document.getElementById('validadorPerforista-icon');
var comtenedorformPerforista = document.getElementById('contenedor-Perforista');
// Materiales de Explosivos
// Emulnor 3000
var inputFormEmulnostresmil = document.getElementById('val_explosivo-text-form-emulnor_tresmil');
// Dinamita Pulverulenta 65_7/8
var inputFormCalDimValorPulverulenta = document.getElementById('val_explosivo-text-form-valdin_pulv');
// Carmex 7
var inputFormCarmexsiete = document.getElementById('val_explosivo-text-form-carmexsiete');
// Carmex 8
var inputFormCarmexocho = document.getElementById('val_explosivo-text-form-carmexocho');
// Mecha Rapida
var inputFormMechaRapida = document.getElementById('val_explosivo-text-form-mecha_rapida_zdiesocho');
// Mecha Lenta
var inputFormMechaLenta = document.getElementById('val_explosivo-text-form-mecha_lenta');
// Fulminantes
var inputFormFulminante_ocho = document.getElementById('val_explosivo-text-form-fuminante_ocho');
// Conector para Mecha
var inputFormConector_Mecha = document.getElementById('val_explosivo-text-form-conecto_mecha');
// Block de Sugeción
var inputFormBlockSegecion = document.getElementById('val_explosivo-text-form-blSugecion');
// Car. cortado 13 cm
var inputFormCarcortado13 = document.getElementById('val_explosivo-text-form-carcortado13');
// Dinamita Semigelatinosa de 65%
var inputFormCalDimValorSemigelatinosa = document.getElementById('val_explosivo-text-form-valdin_semi');
// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    var formId = {
        "accion": "idTable",
        "column": "id_valexplosivo"
    }
    fetchData(formId)
});

// Traer productos
const fetchData = async (json) => {
    console.log(json);
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../controllers/controllerValeExplosivoList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    idRegistro = rptJson['sql'][0]['id'];
    if(idRegistro == null){
        idRegistro = 0;
    }
    part_preImpreso = idRegistro;
    console.log(rptJson);
}

btnNuevo.addEventListener("click", (e) => {
    inputPreImpre.value = "0";
    inputNVale.value = "0";
    $(".chosenZona").val('').trigger("chosen:updated");
    $(".chosenTurno").val('').trigger("chosen:updated");
    $(".chosenLabCodigo").val('').trigger("chosen:updated");
    $(".chosenLabNombre").val('').trigger("chosen:updated");
    $(".chosenPerforistaName").val('').trigger("chosen:updated");
    inputNivelLabor.value = "0";
    inputFormCalDimResultSemigelatinosa.value = "0";
    inputFormCalDimResultPulverulenta.value = "0";
    inputFormSumaPulSemi.value = "0";
    for (var i = 0, l = selectFormBarra.length; i < l; i++) {
        selectFormBarra[i].selected = selectFormBarra[i].defaultSelected;
    }
    inputFormLgt_mt.value = "0";
    inputFormNTaladro.value = "0";
    inputFormTVacio.value = "0";
    inputFormPPerf.value = "0";
    inputFormPReal.value = "0";
    $(".chosenNMaquina").val('').trigger("chosen:updated");
    inputFormEmulnostresmil.value = "0";
    inputFormCalDimValorPulverulenta.value = "0";
    inputFormCarmexsiete.value = "0";
    inputFormCarmexocho.value = "0";
    inputFormMechaRapida.value = "0";
    inputFormMechaLenta.value = "0";
    inputFormFulminante_ocho.value = "0";
    inputFormConector_Mecha.value = "0";
    inputFormBlockSegecion.value = "0";
    inputFormCarcortado13.value = "0";
    inputFormCalDimValorSemigelatinosa.value = "0";
});
$('.chosenPerforistaName').chosen();
$('.chosenLabCodigo').chosen();
$('.chosenLabNombre').chosen();
$('.chosenNMaquina').chosen();

// Boton de Insertar Dato
btnInsertar.addEventListener("click", () => {
    // ZONA
    zonaSelect = selectZona.options[selectZona.selectedIndex];
    valselectZona = zonaSelect.value;
    valIdZona = zonaSelect.getAttribute('data-id-zona');
    console.log(valIdZona);

    valselectTurno = selectTurno.value;

    //Generamos PreImpreso
    diaRegistro = new Date();
    idNumeracion = 1;
    codigoValeExplosivo = 'VE' + diaRegistro.getDate() + valselectTurno.charAt(0).toUpperCase() + valselectZona.charAt(0).toUpperCase() + idNumeracion;
    console.log(codigoValeExplosivo);
    inputPreImpre.value = codigoValeExplosivo;

    // Obteniendo Dato
    valDigitador = inputDigitador.dataset.id;

    valdateRegistro = dateRegistro.value;

    valinputNVale = inputNVale.value;

    valinputPreImpre = inputPreImpre.value;

    // Codigo Labor
    var costLaborSelect = selectCostLabor.options[selectCostLabor.selectedIndex];
    valselectCostLabor = costLaborSelect.textContent;
    validLabor = costLaborSelect.dataset.idLabor;


    // Nombre Labor
    nombLaborSelect = selectNombLabor.options[selectNombLabor.selectedIndex];
    valselectNombLabor = nombLaborSelect.textContent;

    // Nivel Labor
    valinputNivelLabor = inputNivelLabor.value;

    // Tipo de Disparo
    valradioTipo_dis = document.querySelector('input[name="form-radio-tipo_disparo"]:checked').value

    // Perforista
    perforistaSelect = selectPerforista.options[selectPerforista.selectedIndex];
    valselectPerforista = perforistaSelect.value;
    valIdPerforista = perforistaSelect.getAttribute('data-id-perforista');
    console.log(valIdPerforista);

    // Tipo en
    valradioTipo_en = document.querySelector('input[name="form-radio-tipo_en"]:checked').value

    barraSelect = selectFormBarra.options[selectFormBarra.selectedIndex];
    valselectFormBarra = barraSelect.value;
    //valselectFormBarra = selectFormBarra.value;

    valinputFormLgt_mt = inputFormLgt_mt.value;

    valinputFormNTaladro = inputFormNTaladro.value;

    valinputFormTVacio = inputFormTVacio.value;

    // Resultado
    valinputFormPPerf = inputFormPPerf.value;
    valinputFormPReal = inputFormPReal.value;

    selectNMaquinasSelect = selectNMaquinas.options[selectNMaquinas.selectedIndex];
    valselectNMaquinas = selectNMaquinasSelect.textContent;

    valdinSemiResult = inputFormCalDimResultSemigelatinosa.value;
    valdinPulvResult = inputFormCalDimResultPulverulenta.value;

    valdinSemi = inputFormCalDimValorSemigelatinosa.value;
    valdinPulv = inputFormCalDimValorPulverulenta.value;

    Carmexsiete = inputFormCarmexsiete.value;
    Carmexocho = inputFormCarmexocho.value;

    valSunaSemi_Pulv = inputFormSumaPulSemi.value;

    //valEmulnormil = inputFormEmulnormil.value;

    valEmulnostresmil = inputFormEmulnostresmil.value;

    valMechaRapida = inputFormMechaRapida.value;
    valMechaLenta = inputFormMechaLenta.value;

    //valMecha = inputFormMecha.value;

    valFulminante_ocho = inputFormFulminante_ocho.value;

    valConector_Mecha = inputFormConector_Mecha.value;
    valBlockSegecion = inputFormBlockSegecion.value;
    valCarcortado13 = inputFormCarcortado13.value;
    // Preparando Datos
    var listInsert = {
        "id_digitador": valDigitador,
        "fechRegistro": valdateRegistro,
        "id_zona": valIdZona,
        "n_vale": valinputNVale,
        "turno": valselectTurno,
        "pre_impreso": valinputPreImpre,
        "id_labor": validLabor,
        "tip_disparo": valradioTipo_dis,
        "id_Perforista": valIdPerforista,
        "tip_en": valradioTipo_en,
        "barra": valselectFormBarra,
        "lgt": valinputFormLgt_mt,
        "ntaladro": valinputFormNTaladro,
        "tal_vacio": valinputFormTVacio,
        "pies_perf": valinputFormPPerf,
        "pies_real": valinputFormPReal,
        "n_maquinas": valselectNMaquinas,
        "emulno_tresmil": valEmulnostresmil,
        "me_dina_semi": valdinSemi,
        "cal_dina_semi": valdinSemiResult,
        "me_dina_pulv": valdinPulv,
        "cal_dina_pulv": valdinPulvResult,
        "suma_pulv_sumi": valSunaSemi_Pulv,
        "me_carmen_siete": Carmexsiete,
        "me_carmen_ocho": Carmexocho,
        "me_mecha_rapida": valMechaRapida,
        "me_mecha_lenta": valMechaLenta,
        "me_fulminante_ocho": valFulminante_ocho,
        "me_conector_mecha": valConector_Mecha,
        "me_BlockSegecion": valBlockSegecion,
        "me_Carcortadotrece": valCarcortado13,
    };
    requestInsert(listInsert);
    console.log(listInsert);
});

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    var data = {
        "accion": 'insertar',
        "list": form
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../controllers/controllerValeExplosivo.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);

    afterRequestInsert(result);
}

// 
const afterRequestInsert = (data) => {
    sqlRpt = data['sql']
    if (sqlRpt['estado'] == 1) {
        $.niftyNoty({
            type: 'success',
            container: '#alert-form-insert',
            html: '<strong>Bien hecho!</strong> ' + sqlRpt['mensaje'] + ', codigo generado : [' + sqlRpt['coperacion'] + ']',
            focus: false,
            timer: 8000
        });
        /*
    selectFormBarra.value = "0"
    inputFormLgt_mt.value = "0"
    inputFormNTaladro.value = "0"
    inputFormTVacio.value = "0"
    inputFormPPerf.value = "0"
    inputFormPReal.value = "0"
    inputFormCalDimResultSemigelatinosa.value = "0"
    inputFormCalDimResultPulverulenta.value = "0"
    inputFormSumaPulSemi.value = "0"
    inputNivelLabor.value = "0"
    inputFormCalDimValorSemigelatinosa.value = "0"
    inputFormCalDimValorPulverulenta
    inputFormEmulnormil.value = "0"
    inputFormEmulnostresmil.value = "0"
    inputFormMechaRapida.value = "0"
    inputFormMecha.value = "0"
    inputFormFulminante_ocho.value = "0"
    inputFormConector_Mecha.value = "0"*/
        console.log('Si');
    } else {
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>Oh cielos!</strong> ' + sqlRpt['messageUser'],
            focus: false,
        });
        console.log('No');
    }
    console.log(data);
};

// Aumento de numeros
function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del numero número */
    var length = number.toString().length; /* Largo del numero */
    var zero = "0"; /* String de cero */

    if (width <= length) {
        if (number < 0) {
            return ("-" + numberOutput.toString());
        } else {
            return numberOutput.toString();
        }
    } else {
        if (number < 0) {
            return ("-" + (zero.repeat(width - length)) + numberOutput.toString());
        } else {
            return ((zero.repeat(width - length)) + numberOutput.toString());
        }
    }
}
/**
 * console.log(zfill(324, 2)); //324
 * console.log(zfill(324, 3)); //324
 * console.log(zfill(324, 4)); //0324
 * console.log(zfill(324, 5)); //00324 
 * console.log(zfill(324, 10)); //0000000324
 * console.log(zfill(-324, 5)); //324
 */
// Fin Aumento de numeros

// Funcion Boton Agregar
btnAgregar.addEventListener("click", () => {
    console.log('numero de vale es : '+idRegistro);
    // Funcion para enfocar input
    setTimeout(function() {
        // $('#val_explosivo-text-form-n_vale').focus();
        inputNVale.focus();
    }, 1000);
    //$('#val_explosivo-text-form-n_vale').focus();
    //Declaramos variables
    nvale = '9000';

    //Capturo posible error compatibilidad con navegador
    try {
        nvalzfill = nvale, padStart(7, 0);
    } catch (e) {
        nvalzfill = zfill(nvale, 7);
        /* Manejar Errores
        console.error('Se encontro error : '+e);
        console.error('Nombre : '+e.name);
        console.error('Mensaje : '+e.message);
        */
    } finally {
        // Obtengo N° vale
        inputNVale.value = nvalzfill;
    }

    //Preparamos formato
    var selectCodZonaForm = {
        "accion": "select",
    }
    var selectCostLaborForm = {
        "accion": "getcolumnAll",
        "column": "lab_ccostos"
    }
    var selectPerforistaForm = {
        "accion": "getcolumnAll",
        "column": "col_nombres"
    }

    // Enviamos Formato Zona
    fetchDataZona(selectCodZonaForm);

    // Enviamos Formato Labor
    fetchDataLabor(selectCostLaborForm);

    // Enviamos Formato Perforista
    fetchDataPerforista(selectPerforistaForm);

});

// Traer JSON para Tabla (ZONA)
const fetchDataZona = async (json) => {
    if (json) {
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
    const rpt = await fetch('./../controllers/controllerZonaList.php', {
        method: "POST",
        body
    });
    console.log('Zona : ');
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSelectZona(rptJson);
};

const paintSelectZona = (data) => {
    arraySelect = data['sql']['list'];
    selectZona.innerHTML = '';
    const templateSelectZona = document.querySelector("#template-opt-zona").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objidZona = valor['id_zona'];
        objcodigo = valor['codigo'];
        objNombre = valor['nombre'];
        templateSelectZona.querySelector("#optzona").dataset.idZona = objidZona;
        templateSelectZona.querySelector("#optzona").textContent = objNombre;
        templateSelectZona.querySelector("#optzona").value = objNombre;
        const clone = templateSelectZona.cloneNode(true);
        fragment.appendChild(clone)
    });
    selectZona.appendChild(fragment);
    $('.chosenZona').chosen();
};
//FIN ZONA

// CODIGO LABOR
const fetchDataLabor = async (json) => {
    console.log(json);
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSelectLabor(rptJson);
};

//Pintando Seleccion Codigo Labor
const paintSelectLabor = (data) => {
    arraySelect = data['sql'];
    console.log('Labor..');
    console.log(arraySelect);
    selectCostLabor.innerHTML = '';
    const templateSelectCostoLabor = document.querySelector("#template-opt-ccostos").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objidLabNombre = valor['id_labNombre'];
        objidLabor = valor['id_labor'];
        objcodigoccostos = valor['lab_ccostos'];
        //objNombrelabor_explosivos = valor['labExplosivos_nombre'];
        //console.log(objNombre);
        templateSelectCostoLabor.querySelector("#optccostos").dataset.idLaborNombre = objidLabNombre;
        templateSelectCostoLabor.querySelector("#optccostos").dataset.idLabor = objidLabor;
        templateSelectCostoLabor.querySelector("#optccostos").textContent = objcodigoccostos;
        //templateSelectCostoLabor.querySelector("#optccostos").value =  objNombre;
        const clone = templateSelectCostoLabor.cloneNode(true);
        fragment.appendChild(clone)
    });

    selectCostLabor.appendChild(fragment);

    $('.chosenLabCodigo').trigger("chosen:updated");
};

//Detectando Seleccion Codigo Labor
$('#val_explosivo-text-form-labor_codigo').change(function() {
    //Obteniendo Valor Seleccionado
    codLaborSelect = selectCostLabor.options[selectCostLabor.selectedIndex];
    idLaborNombre = codLaborSelect.dataset.idLaborNombre;
    console.log('id Nombre_Labor: ' + idLaborNombre)
    var selectNombreLaborForm = {
        "accion": "getcolumnWhere",
        "column": "labNombre_nombre",
        "parament": idLaborNombre
    }
    var selectNivelLaborForm = {
        "accion": "getcolumnWhere",
        "column": "labNombre_nombre",
        "parament": idLaborNombre
    }
    fechLab_nombre(selectNombreLaborForm);
});

const fechLab_nombre = async (json) => {
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../controllers/controllerLaborNameList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintselectnomLabor(rptJson);
}

//Pintando Seleccion Codigo Labor
const paintselectnomLabor = (data) => {

    //contChosenLaborNombre.innerHTML = '';

    arraySelect = data['sql'];

    selectNombLabor.innerHTML = '';
    //selectTipoLabor.innerHTML = '';

    if (document.getElementById('val_explosivo_text_form_labor_chosen')) {
        console.log('Si existe');
        /*
        var chilLaborNombre = document.getElementById('val_explosivo_text_form_labor_chosen');
        var contLaborNombre = document.getElementById('contChosenLaborNombre');
        contLaborNombre.removeChild(chilLaborNombre);*/
    } else {
        console.log('No existe')
    }

    const templateSelectLabNombre = document.querySelector("#template-opt-labor_nombre").content;
    //const templateSelectLabTipo = document.querySelector("#template-opt-labor_tipo").content;

    const fragment = document.createDocumentFragment();
    //const fragmentSelectLabTipo = document.createDocumentFragment();

    arraySelect.forEach(function(valor, indice, array) {

        objNombrelabor = valor['labNombre_nombre'];
        //objtipoLabor = valor['labExplosivos_tipo'];

        templateSelectLabNombre.querySelector("#optlabNombre").textContent = objNombrelabor;
        //templateSelectLabTipo.querySelector("#optlabTipo").textContent =  objtipoLabor;

        const clone = templateSelectLabNombre.cloneNode(true);
        //const cloneLabTipo = templateSelectLabTipo.cloneNode(true);

        fragment.appendChild(clone)
        //fragmentSelectLabTipo.appendChild(cloneLabTipo)

    });

    selectNombLabor.appendChild(fragment);
    //selectTipoLabor.appendChild(fragmentSelectLabTipo);

    $('.chosenLabNombre').trigger("chosen:updated");
    /*
    $('.chosenTipo').chosen();
    $('.chosenTipo').trigger("chosen:updated");*/
    inputNivelLabor.value = '3125';
};
// FIN CODIGO LABOR

// CODIGO LABOR
const fetchDataPerforista = async (json) => {

    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSelectPerforista(rptJson);
};

//Pintando Seleccion Codigo Labor
const paintSelectPerforista = (data) => {

    arraySelect = data['sql'];
    selectPerforista.innerHTML = '';
    const templateSelectPerforista = document.querySelector("#template-opt-perforista").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objId = valor['id_colaborador'];
        objNombres = valor['col_nombres'];
        objapePaterno = valor['col_apePaterno'];
        obapeMaterno = valor['col_apeMaterno'];
        templateSelectPerforista.querySelector("#opt-perforista").dataset.idPerforista = objId;
        templateSelectPerforista.querySelector("#opt-perforista").textContent = objapePaterno + " " + obapeMaterno + " " + objNombres;
        const clone = templateSelectPerforista.cloneNode(true);
        fragment.appendChild(clone)
    });
    selectPerforista.appendChild(fragment);
    $('.chosenPerforistaName').trigger("chosen:updated");

};
/*
$('.chosen-search-input').keydown('change', function(e){
  var valor = $('.chosen-search-input').value;
  formPerforista(valor);
})*/

// Escucha Input Perforista
selectPerforista.addEventListener('keyup', function(e) {
    console.log('Enter en seleccion');
    var keycode = e.keyCode || e.width;
    // Valida Enter
    if (keycode == 13) {
        //formPerforista()
    }
});

/*
btnSearchPerforista.addEventListener("click", () => {
  formPerforista()
});
*/

function formPerforista() {
    iconValidadorPerforista.innerHTML = '';
    valPerforista = '';
    // Obtiene Valor
    // Codigo Labor
    costPerforistaSelect = selectPerforista.options[selectPerforista.selectedIndex];
    valselectPerforista = costPerforistaSelect.value;
    //valPerforista = inputPerforista.value;
    console.log(valselectPerforista);
    // Valida vacio
    if (valPerforista.length == 0) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-perforitsta',
            html: '<strong>Advertencia!</strong> Se requiere campo',
            focus: false,
            timer: 2000
        });
    } else {
        // Valida Numero
        if (!isNaN(valPerforista)) {
            // Valida DNI
            rptDni = validarDNI(valPerforista);
            console.log('Dni : ' + rptDni);
            if (rptDni) {
                // Preparamos formato
                var busquedaPerforista = {
                    "accion": "select",
                    "palabra": valPerforista,
                    "columna": "col_dni",
                }
                // Valor Nombre o DNI (Validado)
                fetchDataPerforista(busquedaPerforista);
            }
        } else {
            //Notificar
            $.niftyNoty({
                type: 'success',
                container: '#alert-perforitsta',
                html: '<strong>Bien hecho!</strong> Se podrecera buscar por Nombre',
                focus: false,
                timer: 2000
            });
            // Preparamos formato
            var busquedaPerforista = {
                "accion": "select",
                "palabra": valPerforista,
                "columna": "col_nombre",
            }
            // Valor Nombre o DNI (Validado)
            fetchDataPerforista(busquedaPerforista);
        }
    }
};
/*
// Traer JSON para Tabla (Perforista) - Plugin en desarrollo
const fetchDataPerforista = async (json) => {
  if(json){
    var accionSelect = 'mostrar';
  }
  else{
    accionSelect = 'mostrar';
  }
  var jsonRequests = {
    "accion" : 'Searsch',
    "other" : json,
  }
  console.log(jsonRequests);
  const body = new FormData();
  body.append("data", JSON.stringify(jsonRequests));
  const rpt = await fetch('./../controllers/controllerPerforistaList.php', { method: "POST", body });
  const rptJson = await rpt.json();//await JSON.parse(returned);
  console.log(rptJson);
  paintSelectPerforista(rptJson);
};

//Pintando Seleccion Codigo Labor
const paintSelectPerforista = (data) => {

  arraySelect = data['sql']['list'];
  
  if(arraySelect == 0){
    console.log ('vacio');
  }
  else{
    if(arraySelect.length <= 2){
      console.log('Es menor');
      console.log(arraySelect.length);

    }
    else{
      console.log('Es mayor o igual');
      console.log(arraySelect.length);
      comtenedorformPerforista.innerHTML = '';
      
       $('.chosenPerforistaName').trigger("chosen:updated");
    }
    inputPerforista.value = arraySelect[0]['col_dni'];
    iconValidadorPerforista.innerHTML = '<i id="icons-validador-perforista" class="ion-checkmark-circled"></i>';
    iconValidadorPerforista.querySelector("#icons-validador-perforista").style.cssText = "color: #b0d683; font-size: x-large"
  } 
};
*/
function validarDNI(dni) {
    /*
    var lockup = 'TRWAGMYFPDXBNJZSQVHLCKE';
    var valueDni = dni.substr(0, dni.length-1);
    var letra = dni.substr(dni.length-1,1).toUpperCase();

    /* El dni no trae ni espaccio ni guiones 
    if((dni.indexOf(' ') == 0) || (dni.indexOf('-') == 0)){
      console.log('El DNI/CIF no puedo tener ni espacio ni guiones');
      inputPerforista.focus();
      return false;
    }

    /* El DNI tiene 9 posiciones
    if(dni.length < 9){
      console.log('El DNI/CIF debe tener 9 caracteres');
      inputPerforista.focus();
      return false;
    }

    /* Si la primera posicion es una letra, no se valoda
    if (isNaN(dni.substr(0,0))){
      return true;
    }
    else{
      var corresponde = lockup.charAt(valueDni % 23);
      if(corresponde == letra){
        return true;
      }
      else{
        console.log('La letra del DNI esta mal, debe ser '&& corresponde);
        inputPerforista.focus();
        return false;
      }
    }
    */
    var ex_regular_dni;
    ex_regular_dni = /^\d{8}(?:[-\s]\d{4})?$/;
    if (ex_regular_dni.test(dni) == true) {
        $.niftyNoty({
            type: 'success',
            container: '#alert-perforitsta',
            html: '<strong>Bien hecho!</strong> DNI Valido, se procedera buscar por DNI',
            focus: false,
            timer: 2000
        });
        return true;
    } else {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-perforitsta',
            html: '<strong>Advertencia!</strong> Dni erroneo, formato no valido',
            focus: false,
            timer: 2000
        });
        return false;
    }
}


//Detectando Seleccion Codigo Labor
$('#val_explosivo-input-form-barra').change(function() {
    calPies_Perf_Real();
    calLgt()
});

function calLgt() {
    barraSelect = selectFormBarra.options[selectFormBarra.selectedIndex];
    valselectFormBarra = barraSelect.value;
    rptLgt = parseFloat(valselectFormBarra) * 0.3;
    inputFormLgt_mt.value = rptLgt;
}
$(document).ready(function() {
    $("#val_explosivo-input-form-lgt_mt").keyup(function(event) {
        console.log('Se detecto teclado');
        calPies_Perf_Real();
    });
});

$(document).ready(function() {
    $("#val_explosivo-input-form-n_taladro").keyup(function(event) {
        console.log('Se detecto teclado');
        calPies_Perf_Real();
    });
});

$(document).ready(function() {
    $("#val_explosivo-input-form-tal_vacio").keyup(function(event) {
        console.log('Se detecto teclado');
        calPies_Perf_Real();
    });
});

//Materiales Explosivos
$(document).ready(function() {
    $("#val_explosivo-text-form-valdin_semi").keyup(function(event) {
        console.log('Se detecto teclado');
        sumaMaterialExplosivo();
    });
});

$(document).ready(function() {
    $("#val_explosivo-text-form-valdin_pulv").keyup(function(event) {
        console.log('Se detecto teclado');
        sumaMaterialExplosivo();
    });
});

/*
btnCalPies_PerfReal.addEventListener("click", () => {
  calPies_Perf_Real();
});*/
function sumaMaterialExplosivo() {
    caldimSemigelatinosa65(0.07911392);
    caldimPulverulenta65(0.08012821);
    //Resultado
    console.log();
    valresultSumaDimSemiPul = parseFloat(resulOperDimSemigelatinosa) + parseFloat(resulOperDimvalorDimPulverulenta);
    console.log(valresultSumaDimSemiPul);
    inputFormSumaPulSemi.value = valresultSumaDimSemiPul.toFixed(8);
}

function caldimSemigelatinosa65(multiplicador) {
    // Calculo Dinamita Semigelatina
    valorDimSemigelatinosa = inputFormCalDimValorSemigelatinosa.value;
    resulOperDimSemigelatinosa = valorDimSemigelatinosa * multiplicador;
    inputFormCalDimResultSemigelatinosa.value = resulOperDimSemigelatinosa.toFixed(8);
}

function caldimPulverulenta65(multiplicador) {
    //
    valorDimPulverulenta = inputFormCalDimValorPulverulenta.value;
    resulOperDimvalorDimPulverulenta = valorDimPulverulenta * multiplicador;
    inputFormCalDimResultPulverulenta.value = resulOperDimvalorDimPulverulenta.toFixed(8);
}

function calPies_Perf_Real() {

    inputFormPReal.value = 0;
    inputFormPPerf.value = 0;

    barraSelect = selectFormBarra.options[selectFormBarra.selectedIndex];
    valFormBarra = barraSelect.value;

    //valFormBarra = selectFormBarra.value;

    //console.log('Barra : ' + valFormBarra);
    valFormNTaladro = inputFormNTaladro.value;
    //console.log('N_taladro : ' + valFormNTaladro);
    valFormTVacio = inputFormTVacio.value;
    //console.log('Total_vacio : ' + valFormTVacio);


    // Taladro Perforado
    //console.log(valFormBarra + '*' + valFormNTaladro);
    sumanTaladrotVacio = parseFloat(valFormNTaladro) + parseFloat(valFormTVacio);
    valFormPPerf = parseFloat(valFormBarra) * parseFloat(sumanTaladrotVacio);
    inputFormPPerf.value = valFormPPerf.toFixed(2);
    // Taladro Real
    sumaTal_TalVacio = parseFloat(valFormNTaladro) + parseFloat(valFormTVacio);
    //console.log('Suma : ' + sumaTal_TalVacio);
    valFormtalVacioBarra = parseFloat(sumaTal_TalVacio) * parseFloat(valFormBarra)
    //console.log('Multiplicacion : ' + valFormtalVacioBarra);
    //console.log(parseFloat('0.95'));
    valFormPReal = parseFloat(valFormtalVacioBarra) * parseFloat('0.95');
    //console.log('Resultado Final : ' + valFormPReal);

    inputFormPReal.value = valFormPReal.toFixed(2);
}

/*
btnCalKg_explosivos.addEventListener("click", () => {
  sumaMaterialExplosivo();
});*/