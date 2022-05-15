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

const dt_operacionMina_zonaLetra = document.getElementById("update-options-codzona");
const dt_operacionMina_laborCcosto = document.getElementById("update-options-codLabor");


const update_operacionMina_regitro = document.getElementById("update-operacionMina-registro");
const update_operacionMina_turno = document.getElementById("update-operacionaMina-turno");
const update_operacionMina_guardia = document.getElementById("update-operacionMina-guardia");
const update_operacionMina_nvale = document.getElementById("update-operacionMina-nvale");
const update_operacionMina_codZona = document.getElementById("update-operacionMina-codzona");
const update_operacionMina_codLabor = document.getElementById("update-operacionMina-codLabor");
const update_operacionMina_zona = document.getElementById("update-operacionMina-zona");
const update_operacionMina_labor = document.getElementById("update-operacionMina-labor");
const update_operacionMina_nivel = document.getElementById("update-operacionMina-nivel");

const update_operacionMina_dni_maestro = document.getElementById("update-operacionaMina-dni-maestro");
const dt_update_operacionMina_dni_maestro = document.getElementById("update-options-dni-maestro");

const update_operacionMina_name_maestro = document.getElementById("update-operacionaMina-name-maestro");
const dt_update_operacionMina_name_maestro = document.getElementById("update-options-name-maestro");
const update_operacionMina_cargo_maestro = document.getElementById("update-operacionaMina-cargo-maestro");

const update_operacionMina_dni_ayudante = document.getElementById("update-operacionaMina-dni-ayudante");
const dt_update_operacionMina_dni_ayudante = document.getElementById("update-options-dni-ayudante");

const update_operacionMina_name_ayudante = document.getElementById("update-operacionaMina-name-ayudante");
const dt_update_operacionMina_name_ayudante = document.getElementById("update-options-name-ayudante");
const update_operacionMina_cargo_ayudante = document.getElementById("update-operacionaMina-cargo-ayudante");

const update_operacionMina_dni_tercer_hombre = document.getElementById("update-operacionaMina-dni-tercer-hombre");
const dt_update_operacionMina_dni_tercer_hombre = document.getElementById("update-options-dni-tercer-hombre");

const update_operacionMina_name_tercer_hombre = document.getElementById("update-operacionaMina-name-tercer-hombre");
const dt_update_operacionMina_name_tercer_hombre = document.getElementById("update-options-name-tercer-hombre");
const update_operacionMina_cargo_tercer_hombre = document.getElementById("update-operacionaMina-cargo-tercer-hombre");

const update_operacionMina_dni_cuarto_hombre = document.getElementById("update-operacionaMina-dni-cuarto-hombre");
const dt_update_operacionMina_dni_cuarto_hombre = document.getElementById("update-options-dni-cuarto-hombre");

const update_operacionMina_name_cuarto_hombre = document.getElementById("update-operacionaMina-name-cuarto-hombre");
const dt_update_operacionMina_name_cuarto_hombre = document.getElementById("update-options-name-cuarto-hombre");
const update_operacionMina_cargo_cuarto_hombre = document.getElementById("update-operacionaMina-cargo-cuarto-hombre");

const update_operacionMina_l = document.getElementById("update-operacionMina-l");
const update_operacionMina_lpv = document.getElementById("update-operacionMina-lpv");
const update_operacionMina_stto = document.getElementById("update-operacionMina-stto");
const update_operacionMina_Serv = document.getElementById("update-operacionMina-Serv");
const update_operacionMina_comentario = document.getElementById("update-operacionMina-comentario");

const update_operacionMina_tipo_avance = document.getElementById("update-operacionMina-tipo-avance");
const update_operacionMina_mt = document.getElementById("update-operacionMina-mt");
const update_operacionMina_mt3 = document.getElementById("update-operacionMina-mt3");
const update_operacionMina_int_disparo = document.getElementById("update-operacionMina-int-disparo");
const update_operacionMina_resuelto = document.getElementById("update-operacionMina-resuelto");

const update_operacionMina_Manual = document.getElementById("update-operacionMina-Manual");
const update_operacionMina_pala = document.getElementById("update-operacionMina-pala");
const update_operacionMina_cantidadPala = document.getElementById("update-operMina-cantidadPala");
const update_operacionMina_mineral = document.getElementById("update-operMina-mineral");
const update_operacionMina_winche = document.getElementById("update-operacionMina-winche");
const update_operacionMina_cantidadWinche = document.getElementById("update-operacionMina-cantidadWinche");
const update_operacionMina_Desmon = document.getElementById("update-operacionMina-Desmon");

const update_mBtnAdd_tblInstalaciones = document.getElementById("update-btnM-add-table");

const mbtn_read_operacionMina_close = document.getElementById("mbtn-read-operacionMina-close");
const read_operacionMina_registro = document.getElementById("read-operacionMina-registro");
const read_operacionMina_turno = document.getElementById("read-operacionaMina-turno");
const read_operacionMina_guardia = document.getElementById("read-operacionMina-guardia");
const read_operacionMina_nvale = document.getElementById("read-operacionMina-nvale");
const read_operacionMina_codZona = document.getElementById("read-operacionMina-codzona");
const read_operacionMina_codLabor = document.getElementById("read-operacionMina-codLabor");
const read_operacionMina_zona = document.getElementById("read-operacionMina-zona");
const read_operacionMina_labor = document.getElementById("read-operacionMina-labor");
const read_operacionMina_nivel = document.getElementById("read-operacionMina-nivel");

const read_operacionaMina_dni_maestro = document.getElementById("read-operacionaMina-dni-maestro");
const read_operacionaMina_name_maestro = document.getElementById("read-operacionaMina-name-maestro");
const read_operacionaMina_cargo_maestro = document.getElementById("read-operacionaMina-cargo-maestro");
const read_operacionaMina_dni_ayudante = document.getElementById("read-operacionaMina-dni-ayudante");
const read_operacionaMina_name_ayudante = document.getElementById("read-operacionaMina-name-ayudante");
const read_operacionaMina_cargo_ayudante = document.getElementById("read-operacionaMina-cargo-maestro");
const read_operacionaMina_dni_tercer_hombre = document.getElementById("read-operacionaMina-dni-tercer-hombre");
const read_operacionaMina_name_tercer_hombre = document.getElementById("read-operacionaMina-name-tercer-hombre");
const read_operacionaMina_cargo_tercer_hombre = document.getElementById("read-operacionaMina-cargo-tercer-hombre");
const read_operacionaMina_dni_cuarto_hombre = document.getElementById("read-operacionaMina-dni-cuarto-hombre");
const read_operacionaMina_name_cuarto_hombre = document.getElementById("read-operacionaMina-name-cuarto-hombre");
const read_operacionaMina_cargo_cuarto_hombre = document.getElementById("read-operacionaMina-cargo-cuarto-hombre");

const read_operacionaMina_l = document.getElementById("read-operacionMina-l");
const read_operacionaMina_lpv = document.getElementById("read-operacionMina-lpv");
const read_operacionaMina_stto = document.getElementById("read-operacionMina-stto");
const read_operacionaMina_serv = document.getElementById("read-operacionMina-Serv");
const read_operacionaMina_comentario = document.getElementById("read-operacionMina-comentario");

const read_operacionaMina_tipoAvance = document.getElementById("read-operacionMina-tipo-avance");
const read_operacionaMina_mt = document.getElementById("read-operacionMina-mt");
const read_operacionaMina_mt3 = document.getElementById("read-operacionMina-mt3");
const read_operacionaMina_int = document.getElementById("read-operacionMina-int-disparo");
const read_operacionaMina_resuelto = document.getElementById("read-operacionMina-resuelto");

const read_operacionaMina_manual = document.getElementById("read-operacionMina-Manual");
const read_operacionaMina_pala = document.getElementById("read-operacionMina-pala");
const read_operacionaMina_palaCantidad = document.getElementById("read-operMina-cantidadPala");
const read_operacionaMina_mineral = document.getElementById("read-operMina-mineral");
const read_operacionaMina_winche = document.getElementById("read-operacionMina-winche");
const read_operacionaMina_wincheCantidad = document.getElementById("read-operacionMina-cantidadWinche");
const read_operacionaMina_desmonte = document.getElementById("read-operacionMina-Desmon");


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
var tableMaster = $('#table-operacion-mina').DataTable({
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
            defaultContent: '<button type="button" class="btn-view btn btn-success btn-view btn btn-success btn-tbM-operacionMina-read"><i class="fa fa-eye"></i> Detalle</button> <button type="button" class="name btn btn-primary btn-tbM-operacionMina-edit"><i class="fa fa-edit"></i> Editar</button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> Eliminar</button>'
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
                window.location.href = './../../excelGenerator.php?table=view_operacion_mina_dev';
            },
            init: function(dt, node, config) {
                $(node).attr('href', './../../excelGenerator.php?table=view_operacion_mina_dev');
                $(node).attr('download', '');
                $(node).attr('title', 'Descargar Archivo');
            }
        },
        {
            text: '<i class="btn-label fa fa-upload"></i><span class="hidden-xs">Importar</span>',
            action: function(e, dt, node, conf) {
                $("#modal-import").modal("show");
            },
            className: 'btn btn-primary btn-labeled', //Primary class for all buttons
            enabled: false
        },
        {
            extend: 'print',
            text: '<i class="btn-label fa fa-print"></i><span class="hidden-xs">Imprimir</span>',
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

var read_mtbl_operInsltaciones = $('#read-mtbl-operInstalaciones').DataTable();

var update_mtbl_operInsltaciones = $('#update-mtbl-operInstalaciones').DataTable();

$('#table-operacion-mina tbody').on('click', '.btn-tbM-operacionMina-edit', function() {
    $("#operacionMina-lg-modal-update").modal("show");
    // Cargar Dato Formulario
    let data = tableMaster.row($(this).parents('tr')).data();
    let idOperacionnMina = data['id_operacionMina'];
    let form = {
        "accion": "getRow_update",
        "whereParament": idOperacionnMina
    }
    fetchRow_update_operacionMina(form);
    // Cargar dato para actualizar
    let selectFoorm_codZona = {
        "accion": "getcolumnAll",
        "column": "labZona_letra"
    }
    fetchCodzona_update(selectFoorm_codZona);
     let selectFoorm_colaborador = {
        "accion": "col_dni",
    }
    fetchColaborador_update(selectFoorm_colaborador);
    
    let selectForm_instalacionMina = {
        "accion": "getcolumnAll",
        "column": "instalacionesMIna_nombre"
    }
    fetchInstalaciones_update(selectForm_instalacionMina);
    //

});
//Traer Instalaciones
const fetchInstalaciones_update = async (request) => {
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

//Traer Colaborador ()
const fetchColaborador_update = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintDni_Nombres_update(data)
}

const paintDni_Nombres_update = (data) => {
    arraySelectColaboradores = data['sql'];
    //iptinsert_dniMaestro
    
    dt_update_operacionMina_dni_maestro.innerHTML = '';
    const templateSelectDniMaestro = document.querySelector("#template-opt-dni-maestro").content;
    const fragmentdniMaestro = document.createDocumentFragment();

    dt_update_operacionMina_name_maestro.innerHTML = '';
    const templateSelectNameMaestro = document.querySelector("#template-opt-name-maestro").content;
    const fragmentnameMaestro = document.createDocumentFragment();

    dt_update_operacionMina_dni_ayudante.innerHTML = '';
    const templateSelectDniAyudante = document.querySelector("#template-opt-dni-ayudante").content;
    const fragmentdniAyudante = document.createDocumentFragment();

    dt_update_operacionMina_name_ayudante.innerHTML = '';
    const templateSelectNameAyudante = document.querySelector("#template-opt-name-ayudante").content;
    const fragmentnameAyudante = document.createDocumentFragment();

    dt_update_operacionMina_dni_tercer_hombre.innerHTML = '';
    const templateSelectDniTercerPersona = document.querySelector("#template-opt-dni-tercer-hombre").content;
    const fragmentdniTercerPersona = document.createDocumentFragment();

    dt_update_operacionMina_name_tercer_hombre.innerHTML = '';
    const templateSelectNameTercerPersona = document.querySelector("#template-opt-name-tercer-hombre").content;
    const fragmentnameTercerPersona = document.createDocumentFragment();

    dt_update_operacionMina_dni_cuarto_hombre.innerHTML = '';
    const templateSelectDniCuartaPersona = document.querySelector("#template-opt-dni-cuarto-hombre").content;
    const fragmentdniCuartaPersona = document.createDocumentFragment();

    dt_update_operacionMina_name_cuarto_hombre.innerHTML = '';
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
    dt_update_operacionMina_dni_maestro.appendChild(fragmentdniMaestro);
    dt_update_operacionMina_name_maestro.appendChild(fragmentnameMaestro);

    // Ayudante
    dt_update_operacionMina_dni_ayudante.appendChild(fragmentdniAyudante);
    dt_update_operacionMina_name_ayudante.appendChild(fragmentnameAyudante);

    // Tercer Persona
    dt_update_operacionMina_dni_tercer_hombre.appendChild(fragmentdniTercerPersona);
    dt_update_operacionMina_name_tercer_hombre.appendChild(fragmentnameTercerPersona);

    // Cuarta Persona
    dt_update_operacionMina_dni_cuarto_hombre.appendChild(fragmentdniCuartaPersona);
    dt_update_operacionMina_name_cuarto_hombre.appendChild(fragmentnameCuartaPersona);
}

const fetchRow_update_operacionMina = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerOperacionMinaList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    paintForm_update(result);
}
const paintForm_update = (data) => {
    try {
        // Guardamos en variable
        arraySelect = data['sql'];
        console.log(arraySelect);
        update_operacionMina_regitro.value = arraySelect[0].operacionMina_registro;
        update_operacionMina_turno.value = arraySelect[0].operacionMina_turno;
        update_operacionMina_guardia.value = arraySelect[0].operacionMina_guardia;
        update_operacionMina_nvale.value = arraySelect[0].operacionMina_nVale;
        console.log(arraySelect[0].operacionMina_nVale);
        document.querySelector('input[name=update-form-radio-tipo_disparo][value="'+ arraySelect[0].operacionMina_actividad + '"]').checked = true;
        update_operacionMina_codZona.value = arraySelect[0].labZona_letra;
        update_operacionMina_codLabor.value = arraySelect[0].lab_ccostos;
        update_operacionMina_zona.value = arraySelect[0].labZona_nombre;
        update_operacionMina_labor.value = arraySelect[0].labNombre_nombre;
        update_operacionMina_nivel.value = arraySelect[0].lab_nivel;
        arraySelect.forEach(item => {
            if(item.operacionTareas_nombre == 'Maestro'){
                update_operacionMina_dni_maestro.value = item.col_dni;
                update_operacionMina_name_maestro.value = item.fullName;
                update_operacionMina_cargo_maestro.value = item.cargo_nombre;
            }
            else if (item.operacionTareas_nombre == 'Ayudante'){
                update_operacionMina_dni_ayudante.value = item.col_dni;
                update_operacionMina_name_ayudante.value = item.fullName;
                update_operacionMina_cargo_ayudante.value = item.cargo_nombre;
            }
            else if(item.operacionTareas_nombre == 'TercerHombre'){
                update_operacionMina_dni_tercer_hombre.value = item.col_dni;
                update_operacionMina_name_tercer_hombre.value = item.fullName;
                update_operacionMina_cargo_tercer_hombre.value = item.cargo_nombre;
            }
            else if(item.operacionTareas_nombre == 'CuartoHombre'){
                update_operacionMina_dni_cuarto_hombre.value = item.col_dni;
                update_operacionMina_name_cuarto_hombre.value = item.fullName;
                update_operacionMina_cargo_cuarto_hombre.value = item.cargo_nombre;
            }
            else{
    
            }
        });
        let counter = 1;
        let rpt_idInstalacion = 0;
        update_mtbl_operInsltaciones.clear();
        arraySelect.forEach(item => {
            if(item.id_instalacionMina > rpt_idInstalacion){
                rpt_idInstalacion = item.id_instalacionMina
                update_mtbl_operInsltaciones.row.add( [
                    counter,
                    item.instalacionesMina_nombre,
                    item.operacionInstalacion_cantidad,
                    item.instalacionMina_medida,
                    '<button class="btn btn-danger update_removeRow">Eliminar</button>',
                ] ).draw();
                counter++;
            }
        });
        update_operacionMina_l.value = arraySelect[0].operacionMina_l;
        update_operacionMina_lpv.value = arraySelect[0].operacionMina_lpv;
        update_operacionMina_stto.value = arraySelect[0].operacionMina_stto;
        update_operacionMina_Serv.value = arraySelect[0].operacionMina_serv;
        update_operacionMina_comentario.value = arraySelect[0].operacionMina_comentario;
        update_operacionMina_tipo_avance.value = arraySelect[0].operacionMina_tipAvance;
        update_operacionMina_mt.value = arraySelect[0].operacionMina_avanceMt;
        update_operacionMina_mt3.value = arraySelect[0].operacionMina_avanceMt3;
        update_operacionMina_int_disparo.value = arraySelect[0].operacionMina_intDisparo;
        update_operacionMina_resuelto.value = arraySelect[0].operacionMina_Resuelto;
        update_operacionMina_Manual.value = arraySelect[0].operacionMina_manualCantidad;
        update_operacionMina_pala.value = arraySelect[0].operacionMina_palaNombre;
        update_operacionMina_cantidadPala.value = arraySelect[0].operacionMina_palaCantidad;
        update_operacionMina_mineral.value = arraySelect[0].operacionMina_mineralCantidad;
        update_operacionMina_winche.value = arraySelect[0].operacionMina_wincheNombre;
        update_operacionMina_cantidadWinche.value = arraySelect[0].operacionMina_wincheCantidad;
        update_operacionMina_Desmon.value = arraySelect[0].operacionMina_desmonCantidad;

    } catch (error) {
        console.error(error.message);        
    }
};
$('#update-mtbl-operInstalaciones').on('click', '.update_removeRow', function() {
    update_mtbl_operInsltaciones.row($(this).parents('tr')).remove().draw();
});


//Traer codigo zona ()
const fetchCodzona_update = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerLaborZoneList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintZonas_update(data)
}
// Pintar zona datalist
const paintZonas_update = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    dt_operacionMina_zonaLetra.innerHTML = '';
    const templateSelect = document.querySelector("#template-opt-cod_zona").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(item => {
        templateSelect.querySelector('#opt-codzona').value = item.labZona_letra;
        templateSelect.querySelector('#opt-codzona').dataset.idCodzona = item.id_zona;
        const clone = templateSelect.cloneNode(true);
        fragment.appendChild(clone)
    })
    dt_operacionMina_zonaLetra.appendChild(fragment);
}

update_operacionMina_codZona.addEventListener("input", (e) => {
    try {
        let val_zonaLetra = update_operacionMina_codZona.value;
        let idCodzona = dt_operacionMina_zonaLetra.querySelector("option[value='" + val_zonaLetra +"']").dataset.idCodzona;
        if(idCodzona){
            console.log('Se envia0');
            var selectForm_codLabor = {
                "accion": "getcolumnWhere",
                "column": "lab_ccostos",
                "parament": idCodzona,
                "columnWhere": "id_zona",
            }
            fetchCodlabor_update(selectForm_codLabor);
        }
        else{
            dt_operacionMina_laborCcosto.innerHTML = '';
            update_operacionMina_codLabor.value = '';
            update_operacionMina_zona.value = '';
            update_operacionMina_labor.value = '';
            update_operacionMina_nivel.value = '';
        }
    }
    catch (error) {
        //console.error(error.message);
        dt_operacionMina_laborCcosto.innerHTML = '';
        update_operacionMina_codLabor.value = '';
        update_operacionMina_zona.value = '';
        update_operacionMina_labor.value = '';
        update_operacionMina_nivel.value = '';
    }

});

//Traer codigo Labor ()
const fetchCodlabor_update = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    paintCodLabor_update(data)
}

// Pintar Coigo Labor datalist
const paintCodLabor_update = (data) => {
    // Guardamos en variable
    arraySelect = data['sql'];
    dt_operacionMina_laborCcosto.innerHTML = '';
    const templateSelect = document.querySelector("#template-opt-codLabor").content;
    const fragment = document.createDocumentFragment();
    arraySelect.forEach(item => {
        templateSelect.querySelector('#opt-codLabor').value = item.lab_ccostos;
        templateSelect.querySelector('#opt-codLabor').dataset.idCodlabor = item.id_labor;
        const clone = templateSelect.cloneNode(true);
        fragment.appendChild(clone)
    });
    dt_operacionMina_laborCcosto.appendChild(fragment);
}

update_operacionMina_codLabor.addEventListener("input", (e) => {
    try {
        let val_laborCcostos = update_operacionMina_codLabor.value;
        console.log(val_laborCcostos);
        let val_idcodlabor = dt_operacionMina_laborCcosto.querySelector("option[value='" + val_laborCcostos +"']").dataset.idCodlabor;
        console.log(val_idcodlabor);
        if (val_idcodlabor) {
            let selectForm = {
                "accion": "getcolumnsWhere",
                "columns": [
                    "nombre", "labNombre_nombre", "nivel"
                ],
                "parament": val_idcodlabor,
                "columnWhere": "id_labor",
            }
            console.log(selectForm);
            fetchzonalabornivel_update(selectForm)
        }
        else{
            update_operacionMina_zona.value = '';
            update_operacionMina_labor.value = '';
            update_operacionMina_nivel.value = '';
        }
    } catch (error) {
        //console.error(error.message);
        update_operacionMina_zona.value = '';
        update_operacionMina_labor.value = '';
        update_operacionMina_nivel.value = '';
    }
});

//Traer codigo zona ()
const fetchzonalabornivel_update = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    //Enviamos solicitud
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    //Enviamos a pintar
    paintZonaLaborNivel_update(data)
}

const paintZonaLaborNivel_update = (data) => {
    arraySelect = data['sql'];
    arraySelect.forEach(item => {
        update_operacionMina_zona.value = item.labZona_nombre;
        update_operacionMina_labor.value = item.labNombre_nombre;
        if(item.lab_nivel){
            update_operacionMina_nivel.value = item.lab_nivel; 
        }
    });
}

$('#table-operacion-mina tbody').on('click', '.btn-tbM-operacionMina-read', function() {
    $("#operacionMina-lg-modal-read").modal("show");
    let data = tableMaster.row($(this).parents('tr')).data();
    /* console.log("El id: " + data['id_operacionMina']); */
    let idOperacionnMina = data['id_operacionMina'];
    let form = {
        "accion": "getRow",
        "whereParament": idOperacionnMina
    }
    fetchRow_operacionMina(form);
});

const fetchRow_operacionMina = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerOperacionMinaList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    paintForm_read(result);
}
// Pintar Nombre y Cargo Maestros
const paintForm_read = (data) => {
    try {
        // Guardamos en variable
        arraySelect = data['sql'];
        console.log(arraySelect);
        read_operacionMina_registro.value = arraySelect[0].operacionMina_registro;
        read_operacionMina_turno.value = arraySelect[0].operacionMina_turno;
        read_operacionMina_guardia.value = arraySelect[0].operacionMina_guardia;
        read_operacionMina_nvale.value = arraySelect[0].operacionMina_nVale;
        //document.querySelector('input[name=read-form-radio-tipo_disparo][value="'+arraySelect[0].operacionMina_actividad+'"]').checked = true;
       /*  document.querySelector('input[name=update-form-radio-tipo_disparo][value="'+ arraySelect[0].operacionMina_actividad + '"]').checked = true; */
        document.querySelector('input[name=read-form-radio-tipo_disparo][value="' + arraySelect[0].operacionMina_actividad + '"]').checked = true;
        read_operacionMina_codZona.value = arraySelect[0].labZona_letra;
        read_operacionMina_codLabor.value = arraySelect[0].lab_ccostos;
        read_operacionMina_zona.value = arraySelect[0].labZona_nombre;
        read_operacionMina_labor.value = arraySelect[0].labNombre_nombre;
        read_operacionMina_nivel.value = arraySelect[0].lab_nivel;
        arraySelect.forEach(item => {
            if(item.operacionTareas_nombre == 'Maestro'){
                read_operacionaMina_dni_maestro.value = item.col_dni;
                read_operacionaMina_name_maestro.value = item.fullName;
                read_operacionaMina_cargo_maestro.value = item.cargo_nombre;
            }
            else if (item.operacionTareas_nombre == 'Ayudante'){
                read_operacionaMina_dni_ayudante.value = item.col_dni;
                read_operacionaMina_name_ayudante.value = item.fullName;
                read_operacionaMina_cargo_ayudante.value = item.cargo_nombre;
    
            }
            else if(item.operacionTareas_nombre == 'TercerHombre'){
                read_operacionaMina_dni_tercer_hombre.value = item.col_dni;
                read_operacionaMina_name_tercer_hombre.value = item.fullName;
                read_operacionaMina_cargo_tercer_hombre.value = item.cargo_nombre;
            }
            else if(item.operacionTareas_nombre == 'CuartoHombre'){
                read_operacionaMina_dni_cuarto_hombre.value = item.col_dni;
                read_operacionaMina_name_cuarto_hombre.value = item.fullName;
                read_operacionaMina_cargo_cuarto_hombre.value = item.cargo_nombre;
            }
            else{
    
            }
        });
        let counter = 1;
        let rpt_idInstalacion = 0;
        read_mtbl_operInsltaciones.clear();
        arraySelect.forEach(item => {
            if(item.id_instalacionMina > rpt_idInstalacion){
                rpt_idInstalacion = item.id_instalacionMina
                read_mtbl_operInsltaciones.row.add( [
                    counter,
                    item.instalacionesMina_nombre,
                    item.operacionInstalacion_cantidad,
                    item.instalacionMina_medida,
                ] ).draw();
                counter++;
            }
        });
        read_operacionaMina_l.value = arraySelect[0].operacionMina_l;
        read_operacionaMina_lpv.value = arraySelect[0].operacionMina_lpv;
        read_operacionaMina_stto.value = arraySelect[0].operacionMina_stto;
        read_operacionaMina_serv.value = arraySelect[0].operacionMina_serv;
        read_operacionaMina_comentario.value = arraySelect[0].operacionMina_comentario;

        read_operacionaMina_tipoAvance.value = arraySelect[0].operacionMina_tipAvance;
        read_operacionaMina_mt.value = arraySelect[0].operacionMina_avanceMt;
        read_operacionaMina_mt3.value = arraySelect[0].operacionMina_avanceMt3;
        read_operacionaMina_int.value = arraySelect[0].operacionMina_intDisparo;
        read_operacionaMina_resuelto.value = arraySelect[0].operacionMina_Resuelto;

        read_operacionaMina_manual.value = arraySelect[0].operacionMina_manualCantidad;
        read_operacionaMina_pala.value = arraySelect[0].operacionMina_palaNombre;
        read_operacionaMina_palaCantidad.value = arraySelect[0].operacionMina_palaCantidad;
        read_operacionaMina_mineral.value = arraySelect[0].operacionMina_mineralCantidad;
        read_operacionaMina_winche.value = arraySelect[0].operacionMina_wincheNombre;
        read_operacionaMina_wincheCantidad.value = arraySelect[0].operacionMina_wincheCantidad;
        read_operacionaMina_desmonte.value = arraySelect[0].operacionMina_desmonCantidad;
    } catch (error) {
        console.error(error.message);
    }

}

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
    let selectFoorm_codZona = {
        "accion": "getcolumnAll",
        "column": "labZona_letra"
    }
    fetchCodzona(selectFoorm_codZona);
    let selectFoorm_colaborador = {
        "accion": "col_dni",
    }
    fetchColaborador(selectFoorm_colaborador);
    let selectForm_instalacionMina = {
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
    //let validMaestro = datalistinsert_optiondniMaestro.querySelector("option[value='" +  datalistMaestro + "']").dataset.idColaborador;
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
                "nombre": "Maestro",
            },
            2: {
                "id": validAyudante,
                "nombre": "Ayudante",
            },
            3: {
                "id": validTercerHombre,
                "nombre": "TercerHombre",
            },
            4: {
                "id": validCuartoHombre,
                "nombre": "CuartoHombre",
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
    let val = $('#insert-operacionMina-codzona').val();
    let validcodzona = $('#insert-options-codzona').find('option[value="' + val + '"]').data('id-codzona');
    let selectForm_codLabor = {
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
    let val = $('#insert-operacionMina-codLabor').val();
    let validcodlabor = $('#insert-options-codLabor').find('option[value="' + val + '"]').data('id-codlabor');
    let selectForm = {
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