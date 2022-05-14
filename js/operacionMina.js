var arraySelectColaboradores;
var indice;

const btn_agregar_operacionMina = document.getElementById("btn-agregar-operacionMina");

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


const mbtn_read_operacionMina_close = document.getElementById("mbtn-read-operacionMina-close");

document.addEventListener('DOMContentLoaded', e => {
    mainEvents();
});

const mainEvents = () => {
    //$('#table-master').DataTable().clear().destroy();
    let form_request1 = {
        "accion": "table",
    }
    fetchData(form_request1);
}
const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerOperacionMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    paintTable(rptSql);
}
const paintTable = async (rptSql) => {
    // Actualiza la tabla
    tableMaster.clear();
    tableMaster.rows.add(rptSql).draw();
}
tableMaster = $('#table-operacion-mina').DataTable({
    scrollX: true,
    scrollCollapse: true,
    fixedColumns: {
        right: 1,
    },
    columns: [{
            data: "id_operacionMina"
        },
        {
            data: "operacionMina_registro",
        },
        {
            data: "operacionMina_turno",
        },
        {
            data: "operacionMina_guardia",
        },
        {
            data: "operacionMina_nVale",
        },
        {
            data: "operacionMina_actividad",
        },
        {
            data: "operacionMina_l",
        },
        {
            data: "operacionMina_lpv",
        },
        {
            data: "operacionMina_stto",
        },
        {
            data: "operacionMina_serv",
        },
        {
            data: "operacionMina_comentario",
        },
        {
            data: "operacionMina_tipAvance",
        },
        {
            data: "operacionMina_avanceMt",
        },
        {
            data: "operacionMina_avanceMt3",
        },
        {
            data: "operacionMina_intDisparo",
        },
        {
            data: "operacionMina_Resuelto",
        },
        {
            data: "operacionMina_manualCantidad",
        },
        {
            data: "operacionMina_palaNombre",
        },
        {
            data: "operacionMina_palaCantidad",
        },
        {
            data: "operacionMina_wincheNombre",
        },
        {
            data: "operacionMina_wincheCantidad",
        },
        {
            data: "operacionMina_mineralCantidad",
        },
        {
            data: "operacionMina_desmonCantidad",
        },
        {
            defaultContent: '<button type="button" class="btn-view btn btn-success btn-view btn btn-success btn-tbM-operacionMina-detalle"><i class="fa fa-eye"></i> Detalle</button> <button type="button" class="name btn btn-primary btn-tableMaster-edit"><i class="fa fa-edit"></i> Editar</button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> Eliminar</button>'
        }
    ],
    fixedHeader: true,
    language: {
        "decimal": "",
        "emptyTable": "No hay registro de labores",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Labores",
        "infoEmpty": "Mostrando 0 to 0 of 0 Labores",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Labores",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Busqueda General :",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad",
            "collection": "Colección",
            "colvisRestore": "Restaurar visibilidad",
            "print": "Imprimir",
            "pageLength": {
                "-1": "Mostrar todas las filas",
                "_": "Mostrar %d filas",
            },
        }
    },
    rowReorder: {
        selector: 'td:nth-child(2)'
    },
    responsive: true,
    dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
    buttons: [
        {
            text: '<i class="btn-label fa fa-refresh"></i><span class="hidden-xs">Actualizar</span>',
            action: function(e, dt, node, conf) {
                let form_request1 = {
                    "accion": "table",
                }
                fetchData(form_request1);
            },
            className: 'btn btn-info btn-labeled' //Primary class for all buttons
        },
        {
            extend: 'collection',
            text: '<i class="btn-label fa fa-download"></i><span class="hidden-xs"> Exportar</span>',
            className: 'btn-labeled',
            buttons: [{
                    extend: 'excel',
                    text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                    titleAttr: 'Excel',
                    title: '',
                    className: 'btn-labeled',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },
                {
                    extend: 'csv',
                    text: '<i class="btn-label fa fa-file-csv"></i> CSV',
                    titleAttr: 'CSV',
                    className: 'btn-labeled',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="btn-label fa fa-file-pdf-o"></i> PDF',
                    titleAttr: 'PDF',
                    className: 'btn-labeled',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },
            ]
        },
        {
            text: '<i class="btn-label fa fa-file-excel-o"></i><span class="hidden-xs"> Excel</span>',
            className: 'btn btn-primary', //Primary class for all buttons
            tag: 'a',
            action: function(e, dt, node, config) {
                //This will send the page to the location specified
                window.location.href = './../../excelGenerator.php?table=view_operacion_mina';
            },
            init: function(dt, node, config) {
                $(node).attr('href', './../../excelGenerator.php?table=view_operacion_mina');
                $(node).attr('download', '');
                $(node).attr('title', 'Descargar Archivo');
            }
        },
        {
            text: '<i class="btn-label fa fa-upload"></i><span class="hidden-xs">Importar</span>',
            action: function(e, dt, node, conf) {
                $("#modal-import").modal("show");
            },
            className: 'btn btn-primary btn-labeled' //Primary class for all buttons
        },
        {
            extend: 'print',
            text: '<i class="btn-label fa fa-print"></i><span class="hidden-xs">print</span>',
            titleAttr: 'PDF',
            className: 'btn-labeled', //Primary class for all buttons
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
            }
        },
        {
            extend: 'colvis',
            text: '<i class="btn-label fa fa-eye"></i><span class="hidden-xs">Mostrar / Ocultar</span>',
            className: 'btn-labeled' //Primary class for all buttons
        },
        'refresh',

    ],
});

$('#table-operacion-mina tbody').on('click', '.btn-tbM-operacionMina-detalle', function() {
    $("#operacionMina-lg-modal-read").modal("show");
    const data = tableMaster.row($(this).parents('tr')).data();
    console.log("El id: " + data['id_operacionMina']);
});

$('#table-operacion-mina tbody').on('click', '.btn-tableMaster-edit', function() {
    const data = tableMaster.row($(this).parents('tr')).data();
    //alert("El id: " + data['id_operacionMina']);
    $("#modal-edit").modal("show");
    getRecord(data['id_operacionMina']);
});

$('#table-operacion-mina tbody').on('click', '.btn-tableMaster-delet', function() {
    var data = tableMaster.row($(this).parents('tr')).data();
    swal({
        title: "Estas seguro?",
        text: "Una vez eliminado, no podrá recuperarlo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            var form_request = {
                "accion": "delet",
                "id": data['id_operacionMina']
            }
            request(form_request);
            swal("¡La información ha sido eliminado!", {
                icon: "success",
            });
        } else {
            swal("¡La información está a salvo!");
        }
    });
});
/**
 * 
 * *BOTON NUEVO
 * @description Limpia todo el formulario
 */
btnNew.addEventListener("click", () => {
    resetFormulario();
});
//  Boton Agregar
btn_agregar_operacionMina.addEventListener('click', () => {
    var selectFoorm_codZona = {
        "accion": "getcolumnAll",
        "column": "labZona_letra"
    }
    fetchCodzona(selectFoorm_codZona);
    var selectFoorm_colaborador = {
        "accion": "col_dni",
    }
    fetchColaborador(selectFoorm_colaborador);
    var selectForm_instalacionMina = {
        "accion": "getcolumnAll",
        "column": "instalacionesMIna_nombre"
    }
    fetchInstalaciones(selectForm_instalacionMina);
})

btnInsert.addEventListener("click", () => {
    valArray_Instalaciones = getValue_Table();
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
    let validMaestro = datalistinsert_optiondniMaestro.querySelector("option[value='" +  datalistMaestro + "']").dataset.idColaborador;

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
    console.log('Weee');
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
// DNI (Maestro)
iptinsert_dniMaestro.addEventListener("input", (e) => {
    try {
        let valDni = iptinsert_dniMaestro.value;
        let idColaborador = datalistinsert_optiondniMaestro.querySelector("option[value='" + valDni +"']").dataset.idColaborador;
        if(idColaborador){
            var selectFormCargo = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchNombreCargo_Maestro(selectFormCargo);
        }
        else{
            iptinsert_nameMaestro.value = '';
            ipt_cargoMaestro.value = '';
        }
    }
    catch (error) {
        //console.error(error.message);
        iptinsert_nameMaestro.value = '';
        ipt_cargoMaestro.value = '';
    }
});

//Traer Nombres y cargos Maestros
const fetchNombreCargo_Maestro = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_NombresCargo(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombre y Cargo Maestros
const paint_NombresCargo = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    ipt_cargoMaestro.value = arraySelect[0].cargo_nombre;
    iptinsert_nameMaestro.value = arraySelect[0].fullName;
}

// Nonbres (Maestro)
iptinsert_nameMaestro.addEventListener("input", (e) => {
    try {
        let valName = iptinsert_nameMaestro.value;
        let idColaborador = datalistinsert_optionnameMaestro.querySelector("option[value='" + valName +"']").dataset.idColaborador;
        if(idColaborador){
            var selectFormCargo = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchDniCargo_Maestro(selectFormCargo);
        }
        else{
            iptinsert_dniMaestro.value = '';
            ipt_cargoMaestro.value = '';
        }
    }
    catch (error) {
        //console.error(error.message);
        iptinsert_dniMaestro.value = '';
        ipt_cargoMaestro.value = '';
    }
})

//Traer Dni y Cargo Maestros ()
const fetchDniCargo_Maestro = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_DniCargo(data);
    return data;
    //Enviamos a pintar
}

// Pintar Dni y Cargo
const paint_DniCargo = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_dniMaestro.value = arraySelect[0].fullName;
    ipt_cargoMaestro.value = arraySelect[0].cargo_nombre;
}

// DNI AYUDANTE
iptinsert_dniAyudante.addEventListener("input", (e) => {
    try {
        let valDni = iptinsert_dniAyudante.value;
        let idColaborador = datalistinsert_optiondniAyudante.querySelector("option[value='" + valDni +"']").dataset.idColaborador;
        if(idColaborador){
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchNombresCargo_Ayudante(selectForm);
        }
        else{
            iptinsert_nameAyudante.value = '';
            ipt_cargoAyudante.value = '';
        }
    } catch (error) {
        //console.error(error.message);
        iptinsert_nameAyudante.value = '';
        ipt_cargoAyudante.value = '';
    }
});

//Traer Nombres y Cargo Ayudante
const fetchNombresCargo_Ayudante = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_NombresCargo_Ayudante(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombres y Cargo Ayudante
const paint_NombresCargo_Ayudante = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_nameAyudante.value = arraySelect[0].fullName;
    ipt_cargoAyudante.value = arraySelect[0].cargo_nombre;
}

// NOMBRE AYUDANTE
iptinsert_nameAyudante.addEventListener("input", (e) => {
    try {
        let valName = iptinsert_nameAyudante.value;
        let idColaborador = datalistinsert_optionnameAyudante.querySelector("option[value='" + valName +"']").dataset.idColaborador;
        if(idColaborador){
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchDniCargo_Ayudante(selectForm);
        }
        else{
            iptinsert_dniAyudante.value = '';
            ipt_cargoAyudante.value = '';
        }
        
    } catch (error) {
        //console.error(error.message);
        iptinsert_dniAyudante.value = '';
        ipt_cargoAyudante.value = '';
    }
});

//Traer dni y Cargo Ayudante
const fetchDniCargo_Ayudante = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_DniCargo_Ayudante(data);
    return data;
    //Enviamos a pintar
}

// Pintar Dni y Cargo Ayudante
const paint_DniCargo_Ayudante = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_dniAyudante.value = arraySelect[0].col_dni;
    ipt_cargoAyudante.value = arraySelect[0].cargo_nombre;
}
// DNI TERCERA PERSONA
iptinsert_dniTercerpersona.addEventListener("input", (e) => {
    try {
        let valDni = iptinsert_dniTercerpersona.value;
        let idColaborador = datalistinsert_optiondniTercerPersona.querySelector("option[value='" + valDni +"']").dataset.idColaborador;
        if(idColaborador){
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchNombresCargo_tercerPersona(selectForm);
        }
        else{
            iptinsert_nameTercerpersona.value = '';
            ipt_cargoTercerPersona.value = '';
        }
        
    } catch (error) {
        //console.error(error.message);
        iptinsert_nameTercerpersona.value = '';
        ipt_cargoTercerPersona.value = ';'
    }
});

//Traer Nombres y Cargo Ayudante
const fetchNombresCargo_tercerPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_NombresCargo_tercerPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombres y Cargo TERCERA PERSONA
const paint_NombresCargo_tercerPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_nameTercerpersona.value = arraySelect[0].fullName;
    ipt_cargoTercerPersona.value = arraySelect[0].cargo_nombre;
}

// NOMBRES TERCERA PERSONA
iptinsert_nameTercerpersona.addEventListener("input", (e) => {
    try {
        let valName = iptinsert_nameTercerpersona.value;
        let idColaborador = datalistinsert_optionnameTercerPersona.querySelector("option[value='" + valName +"']").dataset.idColaborador;
        if (idColaborador) {
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchDniCargo_tercerPersona(selectForm);
        }
        else{
            iptinsert_dniTercerpersona.value = '';
            ipt_cargoTercerPersona.value = '';
        }
        
    } catch (error) {
        //console.error(error.message);
        iptinsert_dniTercerpersona.value = '';
        ipt_cargoTercerPersona.value = '';
    }
});

//Traer Nombres y Cargo TERCER PERSONA
const fetchDniCargo_tercerPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_DniCargo_tercerPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombres y Cargo TERCER PERSOBA
const paint_DniCargo_tercerPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_dniTercerpersona.value = arraySelect[0].col_dni;
    ipt_cargoTercerPersona.value = arraySelect[0].cargo_nombre;
}

// DNI CUARTA PERSONA
iptinsert_dniCuartopersona.addEventListener("input", (e) => {
    try {
        let valDni = iptinsert_dniCuartopersona.value;
        let idColaborador = datalistinsert_optiondniCuartaPersona.querySelector("option[value='" + valDni +"']").dataset.idColaborador;
        if (idColaborador) {
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchNombresCargo_cuartaPersona(selectForm);
        }
        else{
            iptinsert_nameCuartopersona.value =' ';
            ipt_cargoCuartaPersona.value = '';
        }
    } catch (error) {
        //console.error(error.message);
        iptinsert_nameCuartopersona.value = '';
        ipt_cargoCuartaPersona.value = '';
    }
});

//Traer Nombres y Cargo CUARTA PERSONA
const fetchNombresCargo_cuartaPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_NombresCargo_cuartaPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombres y Cargo CUARTO PERSONA
const paint_NombresCargo_cuartaPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_nameCuartopersona.value = arraySelect[0].fullName;
    ipt_cargoCuartaPersona.value = arraySelect[0].cargo_nombre;
}

// NOMBRE CUARTO HOMBRE
iptinsert_nameCuartopersona.addEventListener("input", (e) => {
    try {
        let valName = iptinsert_nameCuartopersona.value;
        console.log(valName);
        let idColaborador = datalistinsert_optionnameCuartaPersona.querySelector("option[value='" + valName +"']").dataset.idColaborador;
        console.log(idColaborador);
        if (idColaborador) {
            let selectForm = {
                "accion": "getPerforista",
                "parament": idColaborador,
            }
            fetchDniCargo_cuartaPersona(selectForm);
        } else {
            iptinsert_dniCuartopersona.value = '';
            ipt_cargoCuartaPersona.value = '';
        }
    } catch (error) {
        iptinsert_dniCuartopersona.value = '';
        ipt_cargoCuartaPersona.value = '';
    }
});
//Traer Nombres y Cargo CUARTA PERSONA
const fetchDniCargo_cuartaPersona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    paint_DniCargo_cuartaPersona(data);
    return data;
    //Enviamos a pintar
}

// Pintar Nombres y Cargo CUARTO PERSONA
const paint_DniCargo_cuartaPersona = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    iptinsert_dniCuartopersona.value = arraySelect[0].col_dni;
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
        templateSelect.querySelector('#opt-codzona').value = item.labZona_letra;
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
        iptinsertZona.value = item.labZona_nombre;
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
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').value = item.fullName;
        templateSelectNameMaestro.querySelector('#template-opts-name-maestro').dataset.idColaborador = item.id_colaborador;
        const cloneDniMaestro = templateSelectDniMaestro.cloneNode(true);
        const cloneNameMaestro = templateSelectNameMaestro.cloneNode(true);
        fragmentdniMaestro.appendChild(cloneDniMaestro);
        fragmentnameMaestro.appendChild(cloneNameMaestro);

        // Ayudante
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').value = item.col_dni;
        templateSelectDniAyudante.querySelector('#template-opts-dni-ayudante').dataset.idColaborador = item.id_colaborador;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').value = item.fullName;
        templateSelectNameAyudante.querySelector('#template-opts-name-ayudante').dataset.idColaborador = item.id_colaborador;
        const cloneDniAyudante = templateSelectDniAyudante.cloneNode(true);
        const cloneNameAyudante = templateSelectNameAyudante.cloneNode(true);
        fragmentdniAyudante.appendChild(cloneDniAyudante);
        fragmentnameAyudante.appendChild(cloneNameAyudante);

        // Tercer Persona
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').value = item.col_dni;
        templateSelectDniTercerPersona.querySelector('#template-opts-dni-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').value = item.fullName;
        templateSelectNameTercerPersona.querySelector('#template-opts-name-tercer-hombre').dataset.idColaborador = item.id_colaborador;
        const cloneDniTercerPersona = templateSelectDniTercerPersona.cloneNode(true);
        const cloneNameTercerPersona = templateSelectNameTercerPersona.cloneNode(true);
        fragmentdniTercerPersona.appendChild(cloneDniTercerPersona);
        fragmentnameTercerPersona.appendChild(cloneNameTercerPersona);

        // Cuarta Persona
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').value = item.col_dni;
        templateSelectDniCuartaPersona.querySelector('#template-opts-dni-cuarto-hombre').dataset.idColaborador = item.id_colaborador;
        templateSelectNameCuartaPersona.querySelector('#template-opts-name-cuarto-hombre').value = item.fullName;
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

const request = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerOperacionMina.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    console.log(rptSql);
}

const iptedit_registro = document.getElementById("edit-operacionMina-registro");
const iptedit_turno = document.getElementById("edit-operacionaMina-turno");
const iptedit_guardia = document.getElementById("edit-operacionMina-guardia");
const iptedit_nvale = document.getElementById("edit-operacionMina-nvale");

const getRecord = (parament) => {
    let form_request1 = {
        "accion": "record",
        "id": parament
    }
    fetchRecord(form_request1);
}
const fetchRecord = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerOperacionMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    console.log(rptSql);
    paintForm_record(rptSql);
}
const paintForm_record = async (rptSql) => {
    iptedit_registro.value = rptSql[0]['operacionMina_registro'];
    iptedit_turno.value = rptSql[0]['operacionMina_turno'];
    iptedit_guardia.value = rptSql[0]['operacionMina_guardia'];
    iptedit_nvale.value = rptSql[0]['operacionMina_nVale'];
}