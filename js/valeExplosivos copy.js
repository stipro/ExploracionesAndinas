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

const btnCreate_valeExplosivo = document.getElementById("btn-agregar-valeExplosivo");

const mbtnCreate_valeExplosivo = document.getElementById("mbtn-create-valeExplosivo");
const alertInsert = document.getElementById("alert-form-insert");

//* DECLARACIÓNES BOTONES
/* const btnAgregar = document.getElementById("btn-Agregar"); */

const btnEdit_insert = document.getElementById("mbtnEdit-edit");

const btnNuevo = document.getElementById("mbtn-new");
// Dclaramos Formularios
const createStl_valeExplosivo_unidadMinera = document.getElementById('create-slt-valeExplosivo-unidadMinera');
const tpt_valesExplosivo_unidadMinera = document.getElementById('tpt-valeExplosivo-unidadMinera').content;
//const fragment = document.createDocumentFragment()


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
var option;
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
// Emulnor 1000
var inputFormEmulnormil = document.getElementById('val_explosivo-text-form-emulnor_mil');
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
var inputFormFulminante = document.getElementById('val_explosivo-text-form-fuminante_ocho');
// Conector para Mecha
var inputFormConector_Mecha = document.getElementById('val_explosivo-text-form-conecto_mecha');
// Block de Sugeción
var inputFormBlockSegecion = document.getElementById('val_explosivo-text-form-blSugecion');
// Car. cortado 13 cm
var inputFormCarcortado13 = document.getElementById('val_explosivo-text-form-carcortado13');
// Dinamita Semigelatinosa de 65%
var inputFormCalDimValorSemigelatinosa = document.getElementById('val_explosivo-text-form-valdin_semi');
//* ELEMENTOS VER
const iptView_digitador = document.getElementById('view-valesExplosivo-digitador');
const iptView_preImpreso = document.getElementById('view-valesExplosivo-preImpreso');
const iptView_nVale = document.getElementById('view-valesExplosivo-nVale');
const iptView_zona = document.getElementById('view-valesExplosivo-zona');
const iptView_turno = document.getElementById('view-valesExplosivo-turno');
const iptView_fecha = document.getElementById('view-valesExplosivo-fecha');
const iptView_laborCodigo = document.getElementById('view-valesExplosivo-laborCodigo');
const iptView_laborNombre = document.getElementById('view-valesExplosivo-laborNombre');
const iptView_laborNivel = document.getElementById('view-valesExplosivo-laborNivel');

const iptView_barra = document.getElementById('view-valesExplosivo-barra');
const iptView_lgtMt = document.getElementById('view-valesExplosivo-lgtMt');
const iptView_nTaladror = document.getElementById('view-valesExplosivo-nTaladro');
const iptView_talVacio = document.getElementById('view-valesExplosivo-talVacio');
const iptView_piesPerf = document.getElementById('view-valesExplosivo-piesPerf');
const iptView_piesReal = document.getElementById('view-valesExplosivo-piesReal');

const iptView_dinSemi_res = document.getElementById('view-valesExplosivo-resdin_semi');
const iptView_dinPulv_res = document.getElementById('view-valesExplosivo-resdin_pulv');
const iptView_dinPulv_dinSemi_suma = document.getElementById('view-valesExplosivo-suma-dimPulv-dimSemi');
const iptView_nMaquinas = document.getElementById('view-valesExplosivo-nMaquinas');
const iptView_perforista = document.getElementById('view-valesExplosivo-perforista');

const iptView_emulnorMil = document.getElementById('view-valesExplosivo-emulnorMil');
const iptView_emulnorTresMil = document.getElementById('view-valesExplosivo-emulnorTresMil');
const iptView_dinPulv = document.getElementById('view-valesExplosivo-dinPulv');
const iptView_carmexSiete = document.getElementById('view-valesExplosivo-carmexSiete');
const iptView_carmexOcho = document.getElementById('view-valesExplosivo-carmexOcho');
const iptView_mechaRapida = document.getElementById('view-valesExplosivo-mechaRapida');
const iptView_mechaLenta = document.getElementById('view-valesExplosivo-mechaLenta');
const iptView_Fulminante = document.getElementById('view-valesExplosivo-Fulminante');
const iptView_conectorMecha = document.getElementById('view-valesExplosivo-conectorMecha');
const iptView_blkSugecion = document.getElementById('view-valesExplosivo-blkSugecion');
const iptView_carCortado = document.getElementById('view-valesExplosivo-carCortado');
const iptView_dinSemi = document.getElementById('view-valesExplosivo-dinSemi');


//* ELEMENTOS EDITAR
const iptEdit_digitador = document.getElementById('edit-valesExplosivo-digitador');
const iptEdit_preImpreso = document.getElementById('edit-valesExplosivo-preImpreso');
const iptEdit_nVale = document.getElementById('edit-valesExplosivo-nVale');
//* Informacion general del vale
const iptEdit_zonaNombre = document.getElementById('edit-valesExplosivo-zonaNombre');
const iptEdit_turno = document.getElementById('edit-valesExplosivo-turno');
const iptEdit_fecha = document.getElementById('edit-valesExplosivo-fecha');
//* Detalle del vale
const iptEdit_ccosto = document.getElementById('edit-valesExplosivo-laborCCosto');
const iptEdit_laborNombre = document.getElementById('edit-valesExplosivo-laborNombre');
const iptEdit_laborNivel = document.getElementById('edit-valesExplosivo-laborNivel');
//* Registro de Perforadoras
const iptEdit_barra = document.getElementById('edit-valesExplosivo-barra');
const iptEdit_lgtMt = document.getElementById('edit-valesExplosivo-lgtMt');
const iptEdit_nTaladro = document.getElementById('edit-valesExplosivo-nTaladro');
const iptEdit_talVacio = document.getElementById('edit-valesExplosivo-talVacio');
const iptEdit_piesPerf = document.getElementById('edit-valesExplosivo-piesPerf');
const iptEdit_piesReal = document.getElementById('edit-valesExplosivo-piesReal');

const iptEdit_res_dinSemi = document.getElementById('edit-valesExplosivo-res_dinSemi');
const iptEdit_res_dinPulv = document.getElementById('edit-valesExplosivo-res_dinPulv');
const iptEdit_suma_dimPulv_dimSemi = document.getElementById('edit-valesExplosivo-suma-dimPulv-dimSemi');
const iptEdit_nMaquinas = document.getElementById('edit-valesExplosivo-nMaquinas');
const iptEdit_perforista = document.getElementById('edit-valesExplosivo-perforista');

    //* TABLA MATERIALES EXPLOSIVOS
    const iptEdit_emulnorMil = document.getElementById('edit-valesExplosivo-emulnoMil');
    const iptEdit_emulnorTresmil = document.getElementById('edit-valesExplosivo-emulnorTresmil');
    const iptEdit_dinamitaPulverulenta = document.getElementById('edit-valesExplosivo-dinPulv');
    const iptEdit_carmen7 = document.getElementById('edit-valesExplosivo-carmexSiete');
    const iptEdit_carmen8 = document.getElementById('edit-valesExplosivo-carmexOcho');
    const iptEdit_mechaRapida = document.getElementById('edit-valesExplosivo-mecha_mechaRapida');
    const iptEdit_mechaLenta = document.getElementById('edit-valesExplosivo-mechaLenta');
    const iptEdit_fulminante = document.getElementById('edit-valesExplosivo-fuminante');
    const iptEdit_conectorMecha = document.getElementById('edit-valesExplosivo-conectorMecha');
    const iptEdit_blockSugeccion = document.getElementById('edit-valesExplosivo-blockSugecion');
    const iptEdit_carCortado13 = document.getElementById('edit-valesExplosivo-carCortado13');
    const iptEdit_dinamitaSemigelatinosa = document.getElementById('edit-valesExplosivo-dinSemi');

    



// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {

});

btnCreate_valeExplosivo.addEventListener("click", (e) => {
    const form_request1 = {
        "accion": "getLast_record",
    }
    getLast_record(form_request1);
    // Enfocar el input indicado
    inputNVale.focus();
    // Preparamos formato
    var selectCodZonaForm = {
        "accion": "getSelect_zonaNombre",
    }
    var selectCostLaborForm = {
        "accion": "getcolumnAll",
        "column": "lab_ccostos"
    }
    var selectPerforistaForm = {
        "accion": "getColumn_fullname",
    }

    let selectForm_unidadMinera = {
        "accion": "getcolumnAll",
        "column": "nombre_unidadMinera"
    }

    fetch_unidadMinera(selectForm_unidadMinera);

    // Enviamos Formato Zona
    fetchDataZona(selectCodZonaForm);

    // Enviamos Formato Labor
    fetchDataLabor(selectCostLaborForm);

    // Enviamos Formato Perforista
    fetchDataPerforista(selectPerforistaForm);
});

/* // Traer productos
const fetchData = async (json) => {
    console.log(json);
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerValeExplosivoList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    idRegistro = rptJson['sql'][0]['id'];
    if (idRegistro == null) {
        idRegistro = 0;
    }
    part_preImpreso = idRegistro;
    console.log(rptJson);
} */

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
    inputFormEmulnormil.value = "0";
    inputFormEmulnostresmil.value = "0";
    inputFormCalDimValorPulverulenta.value = "0";
    inputFormCarmexsiete.value = "0";
    inputFormCarmexocho.value = "0";
    inputFormMechaRapida.value = "0";
    inputFormMechaLenta.value = "0";
    inputFormFulminante.value = "0";
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
mbtnCreate_valeExplosivo.addEventListener("click", () => {
    let listInsert = new Object();
    let detail = [];
    //Generamos PreImpreso
    diaRegistro = new Date();
    idNumeracion = 1;
    // Obteniendo Dato
    // Digitador
    let val_digitador = inputDigitador.dataset.id;
    // Numero de Vale
    let val_nNVale = inputNVale.value;
    // Unidad Minera
    let val_unidadMInera = createStl_valeExplosivo_unidadMinera.value;
    let id_unidadMinera = createStl_valeExplosivo_unidadMinera.querySelector("option[value='" + val_unidadMInera + "']").dataset.idUnidadMinera;
    // Zona
    zonaSelect = selectZona.options[selectZona.selectedIndex];
    valselectZona = zonaSelect.value;
    let val_zonaId = zonaSelect.getAttribute('data-id-zona');
    // Turno
    valselectTurno = selectTurno.value;
    // Fecha de vale Explosivo
    valdateRegistro = dateRegistro.value;
    // Centro de Costos
    var costLaborSelect = selectCostLabor.options[selectCostLabor.selectedIndex];
    valselectCostLabor = costLaborSelect.textContent;
    validLabor = costLaborSelect.dataset.idLabor;


    codigoValeExplosivo = 'VE' + diaRegistro.getDate() + valselectTurno.charAt(0).toUpperCase() + valselectZona.charAt(0).toUpperCase();
    inputPreImpre.value = codigoValeExplosivo;

    valinputPreImpre = inputPreImpre.value;

    // Nombre Labor
    nombLaborSelect = selectNombLabor.options[selectNombLabor.selectedIndex] ? selectNombLabor.options[selectNombLabor.selectedIndex] : "0"
    valselectNombLabor = nombLaborSelect.textContent ? nombLaborSelect.textContent : "0";

    // Nivel Labor
    valinputNivelLabor = inputNivelLabor.value;

    // Tipo de Disparo
    valradioTipo_dis = document.querySelector('input[name="form-radio-tipo_disparo"]:checked').value



    // Tipo en
    valradioTipo_en = document.querySelector('input[name="form-radio-tipo_en"]:checked').value

    barraSelect = selectFormBarra.options[selectFormBarra.selectedIndex];
    valselectFormBarra = barraSelect.value;
    //valselectFormBarra = selectFormBarra.value;

    valinputFormLgt_mt = inputFormLgt_mt.value;

    valinputFormNTaladro = inputFormNTaladro.value;

    valinputFormTVacio = inputFormTVacio.value;

    // Resultado
    // Pies Perforados
    valinputFormPPerf = inputFormPPerf.value;
    // Pies Reales
    valinputFormPReal = inputFormPReal.value;
    // Resultado
    // Calculo Dinamita Semigelationsa
    valdinSemiResult = inputFormCalDimResultSemigelatinosa.value;
    // Calculo Dinamita Pulvurulenta
    valdinPulvResult = inputFormCalDimResultPulverulenta.value;
    // Suma de Calculo
    valSunaSemi_Pulv = inputFormSumaPulSemi.value;
    // N° Maquina
    selectNMaquinasSelect = selectNMaquinas.options[selectNMaquinas.selectedIndex];
    valselectNMaquinas = selectNMaquinasSelect.textContent;
    // Perforista
    perforistaSelect = selectPerforista.options[selectPerforista.selectedIndex];
    valselectPerforista = perforistaSelect.textContent;
    valIdPerforista = perforistaSelect.getAttribute('data-id-perforista');
    // Materiales Explosivos
    // Obtenemos valor Emulnor de 1000 y 3000
    let dtSet_Emulnormil = inputFormEmulnormil.dataset.idExplosivo;
    let valEmulnormil = inputFormEmulnormil.value;
    valEmulnormil>0 ? detail.push({'id': dtSet_Emulnormil, 'cantidad': valEmulnormil}):'';
    // Emulnor 3000
    let dtSet_Emultresmil = inputFormEmulnostresmil.dataset.idExplosivo;
    let val_emulTresmil = inputFormEmulnostresmil.value;
    val_emulTresmil>0 ? detail.push({'id': dtSet_Emultresmil, 'cantidad': val_emulTresmil}):'';
    // Calculos
    let totalKilos_dinamitaEmulnorMil = calcular_KilosDinamita(valEmulnormil, parseFloat('0.09615385'));
    let totalKilos_dinamitaEmulnorTresmil = calcular_KilosDinamita(val_emulTresmil, parseFloat('0.09469697'));
    // Fin Calculo
    // Dinamita Pulverulenta 65 7/8
    let dtSet_dinamitaPulvurulenta = inputFormCalDimValorPulverulenta.dataset.idExplosivo;
    let val_dinamitaPulvurulenta = inputFormCalDimValorPulverulenta.value;
    val_dinamitaPulvurulenta>0 ? detail.push({'id': dtSet_dinamitaPulvurulenta, 'cantidad': val_dinamitaPulvurulenta}):'';
    // Carmex 7
    let dtSet_carmexSiete = inputFormCarmexsiete.dataset.idExplosivo;
    let val_carmexSiete = inputFormCarmexsiete.value;
    val_carmexSiete>0 ? detail.push({'id': dtSet_carmexSiete, 'cantidad': val_carmexSiete}):'';
    // Carmex 8
    let dtSet_carmexOcho = inputFormCarmexocho.dataset.idExplosivo;
    let val_carmexOcho = inputFormCarmexocho.value;
    val_carmexOcho>0 ? detail.push({'id': dtSet_carmexOcho, 'cantidad': val_carmexOcho}):'';
    // Mecha Rapida
    let dtSet_mechaRapida = inputFormMechaRapida.dataset.idExplosivo;
    let val_mechaRapida = inputFormMechaRapida.value;
    val_mechaRapida>0 ? detail.push({'id': dtSet_mechaRapida, 'cantidad': val_mechaRapida}):'';
    // Mecha Lenta
    let dtSet_mechaLenta = inputFormMechaLenta.dataset.idExplosivo;
    let val_mechaLenta = inputFormMechaLenta.value;
    val_mechaLenta>0 ? detail.push({'id': dtSet_mechaLenta, 'cantidad': val_mechaLenta}):'';
    // Fulminantes
    let dtSet_fulminante = inputFormFulminante.dataset.idExplosivo;
    let val_fulminante = inputFormFulminante.value;
    val_fulminante>0 ? detail.push({'id': dtSet_fulminante, 'cantidad': val_fulminante}):'';
    // Conector para Mecha
    let dtSet_conectorMecha = inputFormConector_Mecha.dataset.idExplosivo;
    let val_conectorMecha = inputFormConector_Mecha.value;
    val_conectorMecha>0 ? detail.push({'id': dtSet_conectorMecha, 'cantidad': val_conectorMecha}):'';
    // Block de Sugeción
    let dtSet_blockSegecion = inputFormBlockSegecion.dataset.idExplosivo;
    let val_blockSegecion = inputFormBlockSegecion.value;
    val_blockSegecion>0 ? detail.push({'id': dtSet_blockSegecion, 'cantidad': val_blockSegecion}):'';
    // Carrizo cortado de 13cm
    let dtSet_carcortado13 = inputFormCarcortado13.dataset.idExplosivo;
    let val_carcortado13 = inputFormCarcortado13.value;
    val_carcortado13>0 ? detail.push({'id': dtSet_carcortado13, 'cantidad': val_carcortado13}):'';
    // Dinamita Semigelatinosa de 65%
    let dtSet_dinamitaSemigelatinosa = inputFormCalDimValorSemigelatinosa.dataset.idExplosivo;
    let val_dinamitaSemigelatinosa = inputFormCalDimValorSemigelatinosa.value;
    val_dinamitaSemigelatinosa>0 ? detail.push({'id': dtSet_dinamitaSemigelatinosa, 'cantidad': val_dinamitaSemigelatinosa}):'';
    listInsert = ({
        "unidadMinera": id_unidadMinera,
        "id_digitador": val_digitador,
        "n_vale": val_nNVale,
        "fechRegistro": valdateRegistro,
        "id_zona": val_zonaId,
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
        "cal_dina_semi": valdinSemiResult,
        "cal_dina_pulv": valdinPulvResult,
        "suma_pulv_sumi": valSunaSemi_Pulv,
        "totalKilos_DEmulnorMil": totalKilos_dinamitaEmulnorMil,
        "totalKilos_DEmulnorTresmil": totalKilos_dinamitaEmulnorTresmil,
    });
    listInsert.detail = detail;
    console.log(listInsert);
    requestInsert(listInsert);
});

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    var data = {
        "accion": 'insertar',
        "list": form
    };
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../../../controllers/controllerValeExplosivo.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);

    afterRequestInsert(result);
}

// 
const afterRequestInsert = (data) => {
    alertInsert.innerHTML = '';
    sqlRpt = data['sql']['sql1'];
    sqlRpt2 = data['sql']['sql2'];
    mainEvents();
    if (sqlRpt['estado'] == 1) {
        $.niftyNoty({
            type: 'success',
            container: '#alert-form-insert',
            html: '<strong>Bien hecho!</strong> ' + sqlRpt['mensaje'] + ', codigo generado : [' + sqlRpt['coperacion'] + ']',
            focus: false,
            timer: 8000
        });
    } else {
        if (data['rptController']['estado'] == 0) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>!Error!</strong> ' + data['rptController']['mensaje'],
                focus: false,
            });
        } else {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>!Error!</strong> ' + sqlRpt['messageUser'],
                focus: false,
            });
        }
    }
    if(sqlRpt2['estado'] == 1){
        $.niftyNoty({
            type: 'success',
            container: '#alert-form-insert',
            html: '<strong>Bien hecho!</strong> ' + sqlRpt2['mensaje'],
            focus: false,
            timer: 8000
        });
    }
    else{
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>!Error!</strong> ' + sqlRpt2['mensaje'],
            focus: false,
        });
    }

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
// Traer JSON para Tabla (UNIDAD MIBERA)
const fetch_unidadMinera = async (json) => {
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerUnidadMineraList.php', {
        method: "POST",
        body
    });
    
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSlt_unidadMinera(rptJson);
};

const paintSlt_unidadMinera = (data) => {
    objectarrayInstalacion = data['sql'];
    createStl_valeExplosivo_unidadMinera.innerHTML = '';
    objectarrayInstalacion.forEach(item => {
        tpt_valesExplosivo_unidadMinera.querySelector('option').textContent = item.nombre_unidadMinera;
        tpt_valesExplosivo_unidadMinera.querySelector('option').value = item.nombre_unidadMinera;
        tpt_valesExplosivo_unidadMinera.querySelector('option').dataset.idUnidadMinera = item.id_unidadMinera;
        const clone = tpt_valesExplosivo_unidadMinera.cloneNode(true);
        fragment.appendChild(clone);
    });
    createStl_valeExplosivo_unidadMinera.appendChild(fragment);
};

// Traer JSON para Tabla (ZONA)
const fetchDataZona = async (json) => {
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerZonaList.php', {
        method: "POST",
        body
    });
    
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintSlt_zona(rptJson);
};

const paintSlt_zona = (data) => {
    arraySelect = data['sql'];
    selectZona.innerHTML = '';
    const templateSelectZona = document.querySelector("#template-opt-zona").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objidZona = valor['id_zona'];
        objcodigo = valor['labZona_letra'];
        objNombre = valor['labZona_nombre'];
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
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintSelectLabor(rptJson);
};

//Pintando Seleccion Codigo Labor
const paintSelectLabor = (data) => {
    let arraySelect = data['sql'];
    selectCostLabor.innerHTML = '';
    const templateSelectCostoLabor = document.querySelector("#template-opt-ccostos").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(function(valor, indice, array) {
        objidLabNombre = valor['id_labNombre'];
        objidLabor = valor['id_labor'];
        objcodigoccostos = valor['lab_ccostos'];
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
    //idLaborNombre = codLaborSelect.dataset.idLaborNombre;
    lab_ccostos = codLaborSelect.textContent;
    var selectNombreLaborForm = {
        "accion": "getcolumnWhere",
        "column": "lab_ccostos",
        "parament": lab_ccostos
    }
    var selectNivelLaborForm = {
        "accion": "getcolumnWhere",
        "column": "labNombre_nombre",
        "parament": lab_ccostos
    }
    fechLab_nombre(selectNombreLaborForm);
});

//Obtiene el nombre de Labor
const fechLab_nombre = async (json) => {
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerLaborNameList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    paintselectnomLabor(rptJson);
}

//Pintando Seleccion Codigo Labor
const paintselectnomLabor = (data) => {

    //contChosenLaborNombre.innerHTML = '';

    arraySelect = data['sql'];

    selectNombLabor.innerHTML = '';
    inputNivelLabor.value = '';
    //selectTipoLabor.innerHTML = '';

    if (document.getElementById('val_explosivo_text_form_labor_chosen')) {
        /*
        var chilLaborNombre = document.getElementById('val_explosivo_text_form_labor_chosen');
        var contLaborNombre = document.getElementById('contChosenLaborNombre');
        contLaborNombre.removeChild(chilLaborNombre);*/
    } else {
    }

    const templateSelectLabNombre = document.querySelector("#template-opt-labor_nombre").content;
    //const templateSelectLabTipo = document.querySelector("#template-opt-labor_tipo").content;

    const fragment = document.createDocumentFragment();
    inputNivelLabor.value = arraySelect[0]['lab_nivel'];
    arraySelect.forEach(function(valor, indice, array) {

        objNombrelabor = valor['labNombre_nombre'];
        objnivelLabor = valor['lab_nivel'];

        templateSelectLabNombre.querySelector("#optlabNombre").textContent = objNombrelabor;

        if (arraySelect.length == 1) {
            templateSelectLabNombre.querySelector("#optlabNombre").selected = 'selected';
        } else {

        }
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
    //inputNivelLabor.value = '3125';
};
// FIN CODIGO LABOR
//Detectando Seleccion Nombre Labor
$('#val_explosivo_text_form_labor_chosen a span').change(function() {
});
// CODIGO LABOR
const fetchDataPerforista = async (json) => {

    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    const rptSQL = rptJson['sql'];
    paintSelectPerforista(rptSQL);
};

//Pintando Seleccion Codigo Labor
const paintSelectPerforista = (data) => {

    arraySelect = data['sql'];
    selectPerforista.innerHTML = '';
    const templateSelectPerforista = document.querySelector("#template-opt-perforista").content;
    const fragment = document.createDocumentFragment();
    data.forEach(item => {
        templateSelectPerforista.querySelector("#opt-perforista").dataset.idPerforista = item.id_colaborador;
        templateSelectPerforista.querySelector("#opt-perforista").textContent = item.FullName;
        const clone = templateSelectPerforista.cloneNode(true);
        fragment.appendChild(clone)
    })
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
  const rpt = await fetch('./../../../controllers/controllerPerforistaList.php', { method: "POST", body });
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
    let rptLgt = parseFloat(valselectFormBarra) * 0.3;
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
//* DETECCION DE INPUT
//* Input Dinamita Pulverulenta
iptEdit_barra.addEventListener('input', (e) => {
    // Obtenemos y capturamos valor
    let val_Barra = iptEdit_barra.value;
    let val_nTaladro = iptEdit_nTaladro.value;
    let val_talVacio = iptEdit_talVacio.value;
    // Verificamos el dato
    val_Barra = val_Barra ? val_Barra : 0;
    val_nTaladro = val_nTaladro ? val_nTaladro : 0;
    val_talVacio = val_talVacio ? val_talVacio : 0;
    // Enviamos y capturamos la respuesta del valor
    let calRes_lgt = cal_lgt(val_Barra);
    // Mostamos en la vista
    iptEdit_lgtMt.value = calRes_lgt;
    // Enviamos y capturamos la respuesta del valor
    valRpt_piesPerf = cal_piesPerf(val_Barra, val_nTaladro, val_talVacio);
    valRpt_piesReal = cal_piesReal(val_Barra, val_nTaladro, val_talVacio);
    //* Mostramos en la vista
    iptEdit_piesPerf.value = valRpt_piesPerf.toFixed(2);
    iptEdit_piesReal.value = valRpt_piesReal.toFixed(2);
});
iptEdit_nTaladro.addEventListener('input', (e) => {
    // Obtenemos y capturamos valores
    let val_Barra = iptEdit_barra.value;
    let val_nTaladro = iptEdit_nTaladro.value;
    let val_talVacio = iptEdit_talVacio.value;
    // Verificamos el dato
    val_Barra = val_Barra ? val_Barra : 0;
    val_nTaladro = val_nTaladro ? val_nTaladro : 0;
    val_talVacio = val_talVacio ? val_talVacio : 0;
    // Enviamos y capturamos la respuesta del valor
    valRpt_piesPerf = cal_piesPerf(val_Barra, val_nTaladro, val_talVacio);
    valRpt_piesReal = cal_piesReal(val_Barra, val_nTaladro, val_talVacio);
    //* Mostramos en la vista
    iptEdit_piesPerf.value = valRpt_piesPerf.toFixed(2);
    iptEdit_piesReal.value = valRpt_piesReal.toFixed(2);
});
iptEdit_talVacio.addEventListener('input', (e) => {
    // Obtenemos y capturamos valores
    let val_Barra = iptEdit_barra.value;
    let val_nTaladro = iptEdit_nTaladro.value;
    let val_talVacio = iptEdit_talVacio.value;
    // Verificamos el dato
    val_Barra = val_Barra ? val_Barra : 0;
    val_nTaladro = val_nTaladro ? val_nTaladro : 0;
    val_talVacio = val_talVacio ? val_talVacio : 0;
    // Enviamos y capturamos la respuesta del valor
    valRpt_piesPerf = cal_piesPerf(val_Barra, val_nTaladro, val_talVacio);
    valRpt_piesReal = cal_piesReal(val_Barra, val_nTaladro, val_talVacio);
    //* Mostramos en la vista
    iptEdit_piesPerf.value = valRpt_piesPerf.toFixed(2);
    iptEdit_piesReal.value = valRpt_piesReal.toFixed(2);
});
const cal_piesPerf = (val_Barra, val_nTaladro, val_talVacio) => {
    //* Suma
    let sumanTaladrotVacio = parseFloat(val_nTaladro) + parseFloat(val_talVacio);
    //* Multiplica
    let valFormPPerf = parseFloat(val_Barra) * parseFloat(sumanTaladrotVacio);
    return valFormPPerf;
}
const cal_piesReal = (val_Barra, val_nTaladro, val_talVacio) =>{
    //* Suma
    let sumaTal_TalVacio = parseFloat(val_nTaladro) + parseFloat(val_talVacio);
    //* Multiplica
    let valFormtalVacioBarra = parseFloat(sumaTal_TalVacio) * parseFloat(val_Barra)
    //* Multiplica
    let valFormPReal = parseFloat(valFormtalVacioBarra) * parseFloat('0.95');
    return valFormPReal;

}
const cal_lgt = (val) => {
    // Realiza la operacion
    let rptLgt = parseFloat(val) * 0.3;
    // Retornamos valor
    return rptLgt;
}
//* Input Dinamita Pulverulenta
iptEdit_dinamitaPulverulenta.addEventListener('input', (e) => {
    //* Declaraciones de variables *//
    var resulDinamitaPulverulenta;
    var resulDinamitaSemigelationsa;

    //* Obteniendo valores de Inputs *//
    let val_dinamitaPulverulenta = iptEdit_dinamitaPulverulenta.value;
    let val_dinamitaSemigelatinosa = iptEdit_dinamitaSemigelatinosa.value;

    //* EVENTOS *//
    calcular_dinamitas(val_dinamitaPulverulenta, 0.08012821).then(val => {
        iptEdit_res_dinPulv.value = val;
        resulDinamitaPulverulenta = val;
    });
    calcular_dinamitas(val_dinamitaSemigelatinosa, 0.07911392).then(val => {
        iptEdit_res_dinSemi.value = val;
        resulDinamitaSemigelationsa = val;
        sumaDinamitas(resulDinamitaPulverulenta, resulDinamitaSemigelationsa).then(resultado_fixex => iptEdit_suma_dimPulv_dimSemi.value = resultado_fixex);
    });
    //* FIN DE EVENTOS *//
});
//* Input Dinamita Semigelatinosa
iptEdit_dinamitaSemigelatinosa.addEventListener('input', (e) => {
    //* Declaraciones de variables *//
    var resulDinamitaPulverulenta;
    var resulDinamitaSemigelationsa;

    //* Obteniendo valores de Inputs *//
    let val_dinamitaPulverulenta = iptEdit_dinamitaPulverulenta.value;
    let val_dinamitaSemigelatinosa = iptEdit_dinamitaSemigelatinosa.value;

    //* EVENTOS *//
    calcular_dinamitas(val_dinamitaPulverulenta, 0.08012821).then(val => {
        iptEdit_res_dinPulv.value = val;
        resulDinamitaPulverulenta = val;
    });
    calcular_dinamitas(val_dinamitaSemigelatinosa, 0.07911392).then(val => {
        iptEdit_res_dinSemi.value = val;
        resulDinamitaSemigelationsa = val;
        sumaDinamitas(resulDinamitaPulverulenta, resulDinamitaSemigelationsa).then(resultado_fixex => iptEdit_suma_dimPulv_dimSemi.value = resultado_fixex);
    });
    //* FIN DE EVENTOS *//
});

/*
btnCalPies_PerfReal.addEventListener("click", () => {
  calPies_Perf_Real();
});*/

const sumaDinamitas = async (resulDinamitaPulverulenta, resulDinamitaSemigelationsa) => {
    sumaDinamitas_SemigelatinosaPulverulenta = parseFloat(resulDinamitaSemigelationsa) + parseFloat(resulDinamitaPulverulenta);
    return resultado_fixex = sumaDinamitas_SemigelatinosaPulverulenta.toFixed(8);
}
const calcular_dinamitas = async (valDinamita, multiplicador) => {
    const result = valDinamita * multiplicador;
    resultFixed = result.toFixed(8);
    return resultFixed;
}
const sumaMaterialExplosivo = () => {
    caldimSemigelatinosa65(0.07911392);
    caldimPulverulenta65(0.08012821);
    //Resultado
    console.log();
    valresultSumaDimSemiPul = parseFloat(resulOperDimSemigelatinosa) + parseFloat(resulOperDimvalorDimPulverulenta);
    console.log(valresultSumaDimSemiPul);
    inputFormSumaPulSemi.value = valresultSumaDimSemiPul.toFixed(8);
}

const caldimSemigelatinosa65 = (multiplicador) => {
    // Calculo Dinamita Semigelatina
    valorDimSemigelatinosa = inputFormCalDimValorSemigelatinosa.value;
    resulOperDimSemigelatinosa = valorDimSemigelatinosa * multiplicador;
    inputFormCalDimResultSemigelatinosa.value = resulOperDimSemigelatinosa.toFixed(8);
}

const caldimPulverulenta65 = (multiplicador) => {
    //
    valorDimPulverulenta = inputFormCalDimValorPulverulenta.value;
    resulOperDimvalorDimPulverulenta = valorDimPulverulenta * multiplicador;
    inputFormCalDimResultPulverulenta.value = resulOperDimvalorDimPulverulenta.toFixed(8);
}

const calPies_Perf_Real = () => {
    inputFormPReal.value = 0;
    inputFormPPerf.value = 0;
    //* Obtenemos Valor
    barraSelect = selectFormBarra.options[selectFormBarra.selectedIndex];
    valFormBarra = barraSelect.value;
    valFormNTaladro = inputFormNTaladro.value;
    valFormTVacio = inputFormTVacio.value;
    // Taladro Perforado
    //* Suma
    sumanTaladrotVacio = parseFloat(valFormNTaladro) + parseFloat(valFormTVacio);
    //* Multiplica
    valFormPPerf = parseFloat(valFormBarra) * parseFloat(sumanTaladrotVacio);
    //* Mostramos en la vista
    inputFormPPerf.value = valFormPPerf.toFixed(2);
    //* Suma
    sumaTal_TalVacio = parseFloat(valFormNTaladro) + parseFloat(valFormTVacio);
    //* Multiplica
    valFormtalVacioBarra = parseFloat(sumaTal_TalVacio) * parseFloat(valFormBarra)
    //* Multiplica
    valFormPReal = parseFloat(valFormtalVacioBarra) * parseFloat('0.95');
    //* Resultado Final
    inputFormPReal.value = valFormPReal.toFixed(2);
}
//* Calcula los kilos de dimanita
const calcular_KilosDinamita = (pesototal, peso) => {
    return totalKilo = pesototal * peso;
}
// MODULO LABOR
// Nombre Labor
const insert_labor_laborName = document.getElementById("ipt-insert-labor-laborName");
const datalist_labor_laborName = document.getElementById("datalist-insert-nombreLabor-nombre");
// Automatico
const insert_labor_nameEtapa = document.getElementById("ipt-insert-labor-laborNameEtapa");
const insert_labor_namePrefijo = document.getElementById("ipt-insert-labor-laborNamePrefijo");
const insert_labor_nametipo = document.getElementById("ipt-insert-labor-laborNameTipo");

const insert_labor_zonaName = document.getElementById("ipt-insert-labor-laborZona");
const insert_labor_zoneLetra = document.getElementById("ipt-insert-letra-laborZonaLetra");
const datalist_labor_laborZone = document.getElementById("datalist-insert-zonaLabor-zona");

const insert_labor_unitMining = document.getElementById("ipt-insert-unitMining-nombre");
const insert_labor_unitMiningAbrev = document.getElementById("ipt-insert-unitMining-abrev");
const datalist_labor_unitMining = document.getElementById("datalist-insert-labor-unitMining");

//
const insert_laborName_labor = document.getElementById("input-insert-laborName-labor");
const insert_laborName_etapa = document.getElementById("input-insert-laborName-etapa");
const datalist_laborName_etapa = document.getElementById("datalist-insert-laborName-etapa");

//Modulo Labor
const btnAgregar_labor = document.getElementById('btn-insert-labor')
/* // Modulo Nombre Labor
const madd_labor_nombre = document.getElementById("add-labor");
// Modulo Etapa
const madd_labor_nombre_etapa = document.getElementById("add-etapa"); */
// Botones Inferiores
const mbtnInsert_laborNameEtapa = document.getElementById("mbtn-insert-laborNameEtapa");
const mbtnClose_laborNameEtapa = document.getElementById("mbtn-close-laborNameEtapa");
// Modulo Zona
const madd_labor_zona = document.getElementById("add-zona");
// Modulo Sede
const madd_labor_sede = document.getElementById("add-sede");

btnAgregar_labor.addEventListener("click", (e) => {
    const form_uno = {
        "accion": "getLaborNombre",
    }
    getSelect_workName(form_uno);
    const form_dos = {
        "accion": "getAll_zona",
    }
    getSelect_workZone(form_dos);
    const form_tres = {
        "accion": "getUnidMinera",
    }
    getSelect_unitMining(form_tres);
    //$("#modal-insert-labor").modal("show");
});

const getSelect_workName = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let answerSql = data['sql'];
    console.log(answerSql);
    paintSelect_workName(answerSql);
}

const getSelect_workZone = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let answerSql = data['sql'];
    console.log(answerSql);
    paintSelect_workZone(answerSql);
}

const getSelect_unitMining = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let answerSql = data['sql'];
    console.log(answerSql);
    paintSelect_unitMining(answerSql);
}

// PAINT
const paintSelect_workName = (answerSql) => {
    datalist_labor_laborName.innerHTML = '';
    const templateLabor_laborName = document.getElementById('template-datalist-insert-nombreLabor-nombre').content
    const fragmentLabor_laborName = document.createDocumentFragment()
    Object.values(answerSql).forEach(laborName => {
        templateLabor_laborName.querySelector('option').textContent = laborName.labNombre_nombre;
        templateLabor_laborName.querySelector('option').value = laborName.labNombre_nombre;
        templateLabor_laborName.querySelector('option').dataset.id = laborName.id_labNombre;
        templateLabor_laborName.querySelector('option').dataset.etapa = laborName.nombre_etapa;
        templateLabor_laborName.querySelector('option').dataset.prefijo = laborName.labNombre_prefijo;
        templateLabor_laborName.querySelector('option').dataset.tipo = laborName.labNombre_tipo;
        const clone = templateLabor_laborName.cloneNode(true);;
        fragmentLabor_laborName.appendChild(clone)
    })
    datalist_labor_laborName.appendChild(fragmentLabor_laborName);
}

const paintSelect_workZone = (answerSql) => {
    datalist_labor_laborZone.innerHTML = '';
    const templateLabor_laborZone = document.getElementById('template-datalist-insert-zonaLabor-zona').content
    const fragmentLabor_laborZone = document.createDocumentFragment()
    Object.values(answerSql).forEach(laborZone => {
        templateLabor_laborZone.querySelector('option').textContent = laborZone.labZona_nombre;
        templateLabor_laborZone.querySelector('option').value = laborZone.labZona_nombre;
        templateLabor_laborZone.querySelector('option').dataset.id = laborZone.id_zona;
        templateLabor_laborZone.querySelector('option').dataset.letra = laborZone.labZona_letra;
        const clone = templateLabor_laborZone.cloneNode(true);;
        fragmentLabor_laborZone.appendChild(clone)
    })
    datalist_labor_laborZone.appendChild(fragmentLabor_laborZone);
}

const paintSelect_unitMining = (answerSql) => {
    datalist_labor_unitMining.innerHTML = '';
    const templateLabor_unitMining = document.getElementById('template-datalist-insert-labor-unitMining').content
    const fragmentLabor_unitMining = document.createDocumentFragment()
    Object.values(answerSql).forEach(unidMinera => {
        templateLabor_unitMining.querySelector('option').textContent = unidMinera.nombre_unidadMinera;
        templateLabor_unitMining.querySelector('option').value = unidMinera.nombre_unidadMinera;
        templateLabor_unitMining.querySelector('option').dataset.id = unidMinera.id_unidadMinera;
        templateLabor_unitMining.querySelector('option').dataset.abrev = unidMinera.abrev_unidadMinera;
        const clone = templateLabor_unitMining.cloneNode(true);;
        fragmentLabor_unitMining.appendChild(clone)
    })
    datalist_labor_unitMining.appendChild(fragmentLabor_unitMining);
    insert_labor_unitMining.value = 'San Andres';
}

insert_labor_laborName.addEventListener('input', (e) => {
    console.log('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]')
    //Object.assign(e.target.dataset, document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset);
    if (document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]') !== null) {
        insert_labor_nameEtapa.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.etapa;
        insert_labor_namePrefijo.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.prefijo;
        insert_labor_nametipo.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.tipo;
    } else {
        insert_labor_nameEtapa.value = 'No existe';
        insert_labor_namePrefijo.value = 'No existe';
        insert_labor_nametipo.value = 'No existe';
    }
});

insert_labor_zonaName.addEventListener('input', (e) => {
    if (document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]') !== null) {
        insert_labor_zoneLetra.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.letra;
    } else {
        insert_labor_zoneLetra.value = 'No existe';
    }

});

insert_labor_unitMining.addEventListener('input', (e) => {
    if (document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]') !== null) {
        insert_labor_unitMiningAbrev.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.abrev;
    } else {
        insert_labor_unitMiningAbrev.value = 'No existe';
    }
});

/* // MODAL NOMBRE LABOR
madd_labor_nombre.addEventListener("click", (e) => {
    $('#modal-laborName').modal('show');
    const form = {
        "accion": "getLaborNombre_etapa",
    }
    getSelect_workName_etapa(form)
}) */
const getSelect_workName_etapa = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let answerSql = data['sql'];
    paintSelectLaborNombre_etapa(answerSql)
}
const paintSelectLaborNombre_etapa = (answerSql) => {
    datalist_laborName_etapa.innerHTML = '';
    const templateLaborName_etapa = document.getElementById('template-datalist-insert-laborName-etapa').content
    const fragmentLaborName = document.createDocumentFragment()
    Object.values(answerSql).forEach(laborName => {
        templateLaborName_etapa.querySelector('option').textContent = laborName.nombre_etapa;
        templateLaborName_etapa.querySelector('option').value = laborName.nombre_etapa;
        templateLaborName_etapa.querySelector('option').dataset.id = laborName.id_etapa;
        const clone = templateLaborName_etapa.cloneNode(true);;
        fragmentLaborName.appendChild(clone)
    })
    datalist_laborName_etapa.appendChild(fragmentLaborName);
}
/* madd_labor_nombre_etapa.addEventListener("click", (e) => {
    $('#modal-laborNameEtapa').modal('show');
}) */

// Etapa de labor
mbtnInsert_laborNameEtapa.addEventListener("click", () => {
    val_laborNameEtapa_etapa = insert_laborNameEtapa_etapa.value;
    if (val_laborNameEtapa_etapa) {
        console.log('Se obtuvo : ' + val_laborNameEtapa_etapa);
        const data = {
            "nombre_etapa": val_laborNameEtapa_etapa,
        }
        const form = {
            "accion": "insert-laborNameEtapa",
            "datos": data
        }
        insertSelect_laborNameEtapa(form);
    } else {
        const data = {
            'estado': 0,
            'mensaje': ' No se obtuvo valor'
        }
        const rptBackend = {
            'modalName': 'laborNameEtapa',
            'sql': data
        }
        console.log('No se obtuvo valor');
        modal_notifications(rptBackend);
    }
});

madd_labor_zona.addEventListener("click", (e) => {

})
madd_labor_sede.addEventListener("click", (e) => {

})