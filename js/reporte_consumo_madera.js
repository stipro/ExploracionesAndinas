// ipt = input
// reg = registrar
// csm = consumo
var tableDetails = '';
// Boton para agregar o abrir model
const btnAgregar = document.getElementById("btn-add");
// boton para registrar o insertar registro
const btnInsertar = document.getElementById("mbtn-insert");
// boton para un nuevo formulario o limpiar formulario
const btnNuevo = document.getElementById("mbtn-new");
// Los inputs de formaulario
const iptreg_reportConsumoMadera_fecha = document.getElementById('input-fecha-insert');
const iptreg_reportConsumoMadera_nreporte = document.getElementById('input-nreporte-insert');
//
const iptreg_reportConsumoMadera_ccosto = document.getElementById('input-ccosto-insert');
const iptreg_reportConsumoMadera_labor = document.getElementById('input-labor-insert');
const iptreg_reportConsumoMadera_zona = document.getElementById('input-zona-insert');
//
const iptreg_reportConsumoMadera_descripcion = document.getElementById('input-descripcion-insert');
const iptreg_reportConsumoMadera_undmedida = document.getElementById('input-undmedida-insert');
//
const iptreg_reportConsumoMadera_cantidad = document.getElementById('input-cantidad-insert');
// Tablas
const table_master = document.getElementById('table-master');
const table_details = document.getElementById('table-details-insert');

// Datalist
const datalist_ccostos = document.getElementById('insert-options-ccostos');
const datalist_instalaciones = document.getElementById('nombre-instalaciones-options');
var counter = 1;

let listInsert = {}

document.addEventListener('DOMContentLoaded', e => {
    mainEvents();
});

function mainEvents() {
    $('#table-master').DataTable().clear().destroy();
    let form_request1 = {
        "accion": "table_master",
    }
    fetchData(form_request1);
}
const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerConsumoMaderaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    console.log(rptSql);
    paintTable(rptSql)
}

const paintTable = async (rptSql) => {
    /* let form_request1 = {
        "accion": "table_master",
    }
    const body = new FormData();
    body.append("data", JSON.stringify(form_request1)); */
    var tableMaster = $('#table-master').DataTable({
        /* ajax: {
            url: "./../../../controllers/controllerConsumoMaderaList.php",
            dataSrc: 'sql',
            dataType: 'json',
            contentType: "application/json",
            type: 'POST',
            data: body,
        },
        "initComplete": function(settings, json) {
            console.log(json);
        }, */
        data: rptSql,
        columns: [{
                data: "consumoMader_nVale"
            },
            {
                data: "consumoMader_fecha",
                defaultContent: 'raaaa',
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success"><i class="fa fa-eye"></i> Detalle</button> <button type="button" class="name btn btn-primary"><i class="fa fa-edit"></i> Editar</button> <button type="button" class="position btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>'
            }
        ],
        // Traduccion
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
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
                    "_": "Mostrar %d filas"
                },
            }
        },
        dom: "<'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        buttons: [{
                text: '<i class="demo-pli-add icon-fw" ></i> Agregar',
                action: function(e, dt, node, conf) {
                    $("#demo-lg-modal").modal("show");
                    var select1 = {
                        "accion": "getCcosto",
                        "column": "lab_ccostos"
                    }
                    var select2 = {
                        "accion": "getcolumnAll",
                        "column": "instalacionesMina_nombre"
                    }
                    fetchSelect_labor(select1);
                    fetchSelect_instalacionMina(select2);
                },
                className: 'btn btn-primary' //Primary class for all buttons
            },
            {
                extend: 'collection',
                text: '<i class="fa fa-download"></i> Exportar',
                buttons: [{
                        extend: 'excel',
                        text: '<i class="fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Excel',
                        title: 'Consumo_Madera_excel',
                    },
                    {
                        extend: 'csv',
                        text: '<i class="fa fa-file-csv"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="fa fa-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF'
                    },
                ]
            },
            {
                text: '<i class="fa fa-upload" ></i> Importar',
                action: function(e, dt, node, conf) {},
                className: 'btn btn-primary' //Primary class for all buttons
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i> print',
                titleAttr: 'PDF'
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-eye"></i> Mostrar / Ocultar',
            }
        ],
    });
}
// JAVASCRIPT VANILLA
// Boton registrar
btnInsertar.addEventListener("click", (e) => {
    mainEvents();
    var listDetalles = [];
    const valfecha = iptreg_reportConsumoMadera_fecha.value;
    const valNReporte = iptreg_reportConsumoMadera_nreporte.value;
    var form_data = tableDetails.rows().data();
    console.log(form_data);
    var f = form_data;
    for (var i = 0; f.length > i; i++) {
        var n = f[i].length;
        listDetalles.push({
            id_labor: f[i][1],
            ccostos: f[i][2],
            nom_labor: f[i][2],
            nom_zona: f[i][4],
            id_instalacionMina: f[i][5],
            nom_instalacion: f[i][6],
            uni_medida: f[i][7],
            cantidad: f[i][8],
        });
    }
    listInsert = {
        "Fecha": valfecha,
        "NReporte": valNReporte,
        "detalles": listDetalles
    }
    var form_insert = {
        "accion": "insert",
        "form": listInsert
    }
    console.log(form_insert);
    recordForm(form_insert);
});

const recordForm = async (listInsert) => {
    const body = new FormData();
    body.append("data", JSON.stringify(listInsert));
    const res = await fetch('./../../../controllers/controllerConsumoMadera.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    //notificationBackend(rptSql)
}
const notificationBackend = (rptSql) => {
    if (rptSql) {
        if (rptSql['sql1']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alert-form-insert',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql1']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
    }
}
// JQUERY

// Boton Nueva Fila
$("#btn-new-table-insert").on('click', function(e) {
    resetFormulario();
});
// Boton Editar Fila
$("#btn-edit-table-insert").on('click', function(e) {
    console.log('boton nuevo');
});
// Boton Exportar Fila en Excel
$("#btn-exportExcel-table-insert").on('click', function(e) {
    console.log('boton nuevo');
});
// Ejecuta despues de DOM cargado por completo
$(document).ready(function(e) {
    var btn_prueba = document.querySelector("#mainnav-menu"); // Encuentra el elemento "p" en el sitio
    btn_prueba.onclick = muestraAlerta; // Agrega función onclick al elemento

    function muestraAlerta(evento) {
        console.log();
        ("Evento onclick ejecutado!");
    }
    console.log("cargo el Dom!");

    tableDetails = $('#table-details-insert').DataTable({
        // Traduccion
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
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
                    "_": "Mostrar %d filas"
                },
            }
        },
        column: [{
                visible: false
            },
            null,
            null,
            null,
            null,
            null,
            null,
            null
        ],
        dom: 'lBfrtip',
        dom: "<'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        buttons: [{
            extend: 'excel',
            text: '<i class="fa fa-file-excel-o"></i> Excel',
            titleAttr: 'Excel',
            exportOptions: {
                columns: [1, 2, 3, 4, 5, 6, 7, 8]
            }
        }, ]
    });
    tableDetails.columns(1).visible(false);
    tableDetails.columns(5).visible(false);
    $('#table-details-insert').on('click', '.removeRow', function() {
        tableDetails.row($(this).parents('tr')).remove().draw();
    });
    // Boton Agregar Fila
    $("#btn-add-table-insert").on('click', function(e) {
        const valIdLabor = iptreg_reportConsumoMadera_labor.dataset.idLabor;
        const valCCosto = iptreg_reportConsumoMadera_ccosto.value;
        const valNLabor = iptreg_reportConsumoMadera_labor.value;
        const valZona = iptreg_reportConsumoMadera_zona.value;
        const valIdInstalacion = iptreg_reportConsumoMadera_undmedida.dataset.idInstalacionmina;
        const valDescripcion = iptreg_reportConsumoMadera_descripcion.value;
        const valUMedida = iptreg_reportConsumoMadera_undmedida.value;
        const valCantidad = iptreg_reportConsumoMadera_cantidad.value;

        if (!valCCosto) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> CCosto no seleccionado',
                focus: false,
                timer: 2000

            });
        } else if (!valNLabor) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Labor vacio',
                focus: false,
                timer: 2000
            });
        } else if (!valZona) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Zona vacio',
                focus: false,
                timer: 2000
            });
        } else if (!valDescripcion) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Descripcion no seleccionado',
                focus: false,
                timer: 2000
            });
        } else if (!valUMedida) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Unidad de medida vacia',
                focus: false,
                timer: 2000
            });
        } else if (!valCantidad) {
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Cantidad vacia',
                focus: false,
                timer: 2000
            });
        } else {
            tableDetails.row.add([
                counter,
                valIdLabor,
                valCCosto,
                valNLabor,
                valZona,
                valIdInstalacion,
                valDescripcion,
                valUMedida,
                valCantidad,
                '<button class="btn btn-danger removeRow">Eliminar</button>'
            ]).draw(false);
            counter++;
            resetFormulario();
        }

    });
});
const resetFormulario = () => {
    iptreg_reportConsumoMadera_ccosto.value = '';
    iptreg_reportConsumoMadera_labor.value = '';
    iptreg_reportConsumoMadera_zona.value = '';
    iptreg_reportConsumoMadera_undmedida.value = '';
    iptreg_reportConsumoMadera_descripcion.value = '';
    iptreg_reportConsumoMadera_cantidad.value = '';
}
// Ejecuta despues de DOM y Imagenes o iframes cargado por completo
$(window).on("load", function(e) {
    console.log("cargo el Dom y recursos");
});
const fetchSelect_labor = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    selectLabor(rptSql)
}

const fetchSelect_instalacionMina = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerInstalacionMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    selectInstalacion(rptSql);
}

const selectLabor = (rptSql) => {
    datalist_ccostos.innerHTML = '';
    const templatelabor = document.getElementById('template-opt-ccostos').content
    const fragmentLabor = document.createDocumentFragment()
    Object.values(rptSql).forEach(labor => {
        templatelabor.querySelector('#opt-ccostos').textContent = labor.lab_ccostos;
        templatelabor.querySelector('#opt-ccostos').value = labor.lab_ccostos;
        templatelabor.querySelector('#opt-ccostos').dataset.idLabor = labor.id_labor;
        const clone = templatelabor.cloneNode(true);;
        fragmentLabor.appendChild(clone)
    })
    datalist_ccostos.appendChild(fragmentLabor);
}

const selectInstalacion = (rptSql) => {
    datalist_instalaciones.innerHTML = '';
    const templateInstalacion = document.getElementById('template-opts-name-instalaciones').content
    const fragmentInstalacion = document.createDocumentFragment()
    Object.values(rptSql).forEach(instalacion => {
        templateInstalacion.querySelector('#template-opt-name-instalaciones').textContent = instalacion.instalacionesMina_nombre;
        templateInstalacion.querySelector('#template-opt-name-instalaciones').value = instalacion.instalacionesMina_nombre;
        templateInstalacion.querySelector('#template-opt-name-instalaciones').dataset.idInstalacionmina = instalacion.id_instalacionMina;
        const clone = templateInstalacion.cloneNode(true);;
        fragmentInstalacion.appendChild(clone)
    })
    datalist_instalaciones.appendChild(fragmentInstalacion);
}

$("#input-ccosto-insert").on('input', function() {
    var val = $('#input-ccosto-insert').val();
    var validccosto = $('#insert-options-ccostos').find('option[value="' + val + '"]').data('id-labor');
    if (validccosto) {
        var selectForm_labor = {
            "accion": "getLaborZona",
            "paramentWhere": validccosto,
        }
        getDataLabor(selectForm_labor);
    } else {
        iptreg_reportConsumoMadera_labor.value = '';
        iptreg_reportConsumoMadera_zona.value = '';
    }
});

$("#input-descripcion-insert").on('input', function() {
    var val = $('#input-descripcion-insert').val();
    var validinstalacion = $('#nombre-instalaciones-options').find('option[value="' + val + '"]').data('id-instalacionmina');
    if (validinstalacion) {
        var selectForm_instalacionMina = {
            "accion": "getLaborZona",
            "paramentWhere": validinstalacion,
        }
        getDataInstalacion(selectForm_instalacionMina);
    } else {
        iptreg_reportConsumoMadera_undmedida.value = '';
    }
});

const getDataLabor = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarAsociadosLabor(rptSql);
}

const pintarAsociadosLabor = (rptSql) => {
    iptreg_reportConsumoMadera_labor.dataset.idLabor = '';
    iptreg_reportConsumoMadera_labor.value = rptSql[0].labNombre_nombre;
    iptreg_reportConsumoMadera_labor.dataset.idLabor = rptSql[0].id_labor;
    iptreg_reportConsumoMadera_zona.value = rptSql[0].labZona_nombre;
}

const getDataInstalacion = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerInstalacionMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarAsociadosInstalacion(rptSql);
}

const pintarAsociadosInstalacion = (rptSql) => {
    iptreg_reportConsumoMadera_undmedida.dataset.idInstalacionmina = '';
    iptreg_reportConsumoMadera_undmedida.value = rptSql[0].instalacionMina_medida;
    iptreg_reportConsumoMadera_undmedida.dataset.idInstalacionmina = rptSql[0].id_instalacionMina;
}