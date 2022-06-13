const tbodyDetalleExtraccion = document.getElementById("detalleExtraccion-body");
// boton para registrar o insertar registro
const btnInsertar = document.getElementById("mbtn-insert");

const btnAdd_DetalleExtraccion = document.getElementById("insert-option-table-detalleExtraccion");
const iptinsertFechaExtraccion = document.getElementById("insert-extrMineral-fecha-extracion");
const iptinsertUniEmpresa = document.getElementById("insert-extrMineral-unidadEmpresa");
const iptinsertZona = document.getElementById("insert-extrMineral-zona");
const iptinsertDigitacion = document.getElementById("insert-extrMineral-fech-Digitacion");
const iptinsertLocomotora = document.getElementById("insert-extrMineral-locomotora");
const iptinsertMotorista = document.getElementById("insert-extrMineral-motorista");
const iptinsertNivel = document.getElementById("insert-extrMineral-nivel");
const iptinsertTolva = document.getElementById("insert-extrMineral-tolva");
const iptinsertAyudante = document.getElementById("insert-extrMineral-ayudante");

const iptInsert_extraccionMineral_guardia = document.getElementById("insert-extrMineral-guardia-normal");
const iptInsert_extraccionMineral_hrs = document.getElementById("insert-extrMineral-hrs-extractor");


const iptinsertDescripcion = document.getElementById("insert-extrMineral-descripcion")

const datalistInsert_unidadMineral = document.getElementById("datalist-insert-extrMineral-unidMineral");

const datalistinsert_optionmotorista = document.getElementById("datalist-insert-extrMineral-motorista");
const tpeInsert_extractionMineral_motorista = document.getElementById("template-opt-motorista");
const datalistinsert_optionayudante = document.getElementById("datalist-insert-extrMineral-ayudante");

const datalistInsert_optionzona = document.getElementById("datalist-insert-extrMineral-zona");

const selectInsert_codigo = document.getElementById("insert-extrMineral-codigo");
const iptInsert_extraccionMineral_cCosto = document.getElementById("insert-extrMineral-cCostos");
const dtlInsert_extraccionMineral_cCosto = document.getElementById("datalist-insert-extrMineral-cCostos");
const iptInsert_extraccionMinera_laborNombre = document.getElementById("insert-extrMineral-nombre");

const iptInsert_extraccionMinera_cantidad = document.getElementById("insert-extrMineral-cantidad");

var tblMaster_extraccionMineral;

const fragment = document.createDocumentFragment()
var tbl_detalleExtraccion;

cont = 0;
// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    mainEvents_extraccionMineral();
});
const mainEvents_extraccionMineral = () => {
    let formList = {
        "accion": "table_master",
    }
    fetchTM_extraccionMineral(formList);   
}
// Hacemos la Peticion
const fetchTM_extraccionMineral = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_extraccionMineral(rptSQL);
}

// Se pinta DataList
const paintTable_extraccionMineral = data => {
    tblMaster_extraccionMineral.clear();
    tblMaster_extraccionMineral.rows.add(data).draw();
};

// JAVASCRIPT VANILLA
// Boton registrar
btnInsertar.addEventListener("click", (e) => {
    let listDetalles = [];
    var form_data = tbl_detalleExtraccion.rows().data();
    console.log(form_data);
    var f = form_data;
    for (var i = 0; f.length > i; i++) {
        var n = f[i].length;
        listDetalles.push({
            'id_unidadMinera': f[i][0],
            'ud_Minera': f[i][1],
            'id_motorista': f[i][2],
            'motorista': f[i][3],
            'id_ayudante': f[i][4],
            'ayudante': f[i][5],
            'Locomotora': f[i][6],
            'tolva': f[i][7],
            'tipo_mat': f[i][8],
            'id_labor': f[i][9],
            'ccostos': f[i][10],
            'labor': f[i][11],
            'id_zona': f[i][12],
            'zona': f[i][13],
            'nivel': f[i][14],
            'veta': f[i][15],
            'fech_extraccion': f[i][16],
            'hora': f[i][17],
            'turno': f[i][18],
            'turno_id': f[i][19],
            'cant_carros': f[i][20],
        });
    }
    listInsert = {
        "detalles": listDetalles
    }
    var form_insert = {
        "accion": "create",
        "form": listInsert
    }
    console.log(listDetalles);
    recordForm(form_insert);
});
const recordForm = async (listInsert) => {
    const body = new FormData();
    body.append("data", JSON.stringify(listInsert));
    const res = await fetch('./../../../controllers/controllerExtraccionMineral.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    notificationBackend(rptSql)
}
const notificationBackend = (rptSql) => {
    if (rptSql) {
        if (rptSql['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alert-form-insert',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['mensaje'],
                focus: false,
                timer: 5000
            });
        }
    }
}
$('.chosenTurno').chosen();
var idiomaEs = {
    "decimal": "",
    "emptyTable": "No hay registro",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Datos",
    "infoEmpty": "Mostrando 0 to 0 of 0 Datos",
    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Datos",
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
};
$(document).ready(function() {
    tblMaster_extraccionMineral = $('#tblMaster-extraccionMineral').DataTable({
        language: idiomaEs,
        scrollY: "100%",
        scrollCollapse: true,
        columns: [
            {
                data: "id_extraccionMineral",
                responsivePriority: 1,
            },
            {
                data: "fechaExtraccion_extraccionMineral",
            },
            {
                data: "nombre_unidadMinera",
            },
            {
                data: "labZona_nombre",
            },
            {
                data: 'fechaDigitacion_extraccionMineral',
            },
            {
                data: 'locomotora_extraccionMineral',
            },
            {
                data: 'fullName_motorista',
            },
            {
                data: 'nivel_extraccionMineral',
            },
            {
                data: 'turno_extraccionMineral',
            },
            {
                data: 'tolva_extraccionMineral',
            },
            {
                data: 'fullName_ayudante',
            },
            {
                data: 'horasExtraccion_extraccionMineral',
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tbM-consumoMadera-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tbM-consumoMadera-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tbM-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ],
        dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
                text: '<i class="btn-label fa-solid fa fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>',
                action: function(e, dt, node, conf) {
                    console.log('Boton crear');
                    let form_request1 = {
                        "accion": "getSelect_unidadMinera",
                    }
                    fetch_unidadMinera(form_request1);
                    let form_request2 = {
                        "accion": "getSelect_colaboradores",
                    }
                    fetch_colaboradores(form_request2);
                    let form_request3 = {
                        "accion": "getSelect_zona",
                    }
                    fetch_zona(form_request3);
                    let form_request4 = {
                        "accion": "getSelect_cCosto",
                    }
                    fetch_cCosto(form_request4);
                    $("#modal-insert").modal("show");

                },
                className: 'btn btn-success btn-labeled', //Primary class for all buttons
                attr: {
                    title: 'Agregar',
                    id: 'btn-insert'
                }
            },
            {
                text: '<i class="btn-label fa fa-refresh"></i><span class="hidden-xs">Actualizar</span>',
                action: function(e, dt, node, conf) {

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
                    window.location.href = './../../excelGenerator.php?table=view_extraccionmineral_dev';
                },
                init: function(dt, node, config) {
                    $(node).attr('href', './../../excelGenerator.php?table=view_extraccionmineral_dev');
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
    tblMaster_extraccionMineral.columns(0).visible(false);
    tbl_detalleExtraccion = $('#detalleExtraccion').DataTable({
        language: idiomaEs,
        /* scrollY:       "200px",
        scrollCollapse: true, */
        // boton de cantidad a visualizar //
        lengthChange: false,
        filter: false,
        column: [{
                visible: true
            },
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        ],
        dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
            extend: 'excel',
            text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
            titleAttr: 'Excel',
            title: '',
            className: 'btn-labeled',
            /* exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
            } */
        }]

    });
    tbl_detalleExtraccion.columns(0).visible(false);
    tbl_detalleExtraccion.columns(2).visible(false);
    tbl_detalleExtraccion.columns(4).visible(false);
    tbl_detalleExtraccion.columns(9).visible(false);
    tbl_detalleExtraccion.columns(12).visible(false);
    // Remover fila
    $('#detalleExtraccion').on('click', '.removeRow', function() {
        tbl_detalleExtraccion.row($(this).parents('tr')).remove().draw();
    });
    $('#detalleMaterialExtraido').DataTable({
        language: idiomaEs,
        /* scrollY:       "200px",
        scrollCollapse: true, */
        lengthChange: false,
        filter: false,
    });
});

/* btnAgregar.addEventListener("click", () => {
    var selectFoorm_colaborador = {
        "accion": "getcolumnAll",
        "column": "col_dni"
    }
    fetchData(selectFoorm_colaborador)
    $("#insert-extrMineral-codigo").change(function() {
        iptinsertDescripcion.value = $('select[id=insert-extrMineral-codigo]').val();
    });
}); */
$("#insert-extrMineral-codigo").change(function() {
    iptinsertDescripcion.value = $('select[id=insert-extrMineral-codigo]').val();
});
btnAdd_DetalleExtraccion.addEventListener("click", () => {
    let arrayError = [];
    console.log('Agregando');
    valFechaExtraccion = iptinsertFechaExtraccion.value;
    valLocomotora = iptinsertLocomotora.value;
    valTolva = iptinsertTolva.value;
    valUniEmpresa = iptinsertUniEmpresa.value;
    valUniEmpresa ? val_idMinera = document.querySelector('#datalist-insert-extrMineral-unidMineral option[value="' + valUniEmpresa + '"]').dataset.idUnidadMinera : arrayError.push("Unidad Minera");
    valMotorista = iptinsertMotorista.value;
    valMotorista ? val_idMotorista = document.querySelector('#datalist-insert-extrMineral-motorista option[value="' + valMotorista + '"]').dataset.idColaboradorMotorista : arrayError.push("Motorista");
    valAyudante = iptinsertAyudante.value;
    valAyudante ? val_idAyudante = document.querySelector('#datalist-insert-extrMineral-ayudante option[value="' + valAyudante + '"]').dataset.idColaboradorAyudante : arrayError.push("Ayudante");
    valZona = iptinsertZona.value;
    valZona ? val_idZona = document.querySelector('#datalist-insert-extrMineral-zona option[value="' + valZona + '"]').dataset.idZona : arrayError.push("Zona");
    valNivel = iptinsertNivel.value;
    valDigitacion = iptinsertDigitacion.value;
    valHrs = iptInsert_extraccionMineral_hrs.value;
    valTurno = iptInsert_extraccionMineral_guardia.value;
    valTurno ? valId_turno = document.querySelector('#datalist-insert-extrMineral-guardia option[value="' + valTurno + '"]').dataset.idTurno : arrayError.push("Turno");
    valCodigo = selectInsert_codigo.options[selectInsert_codigo.selectedIndex].text;
    valcCosto = iptInsert_extraccionMineral_cCosto.value;
    valcCosto ? val_idLabor = document.querySelector('#datalist-insert-extrMineral-cCostos option[value="' + valcCosto + '"]').dataset.idCosto : arrayError.push("Centro de Costo");
    valLabor = iptInsert_extraccionMinera_laborNombre.value;
    valCantidad = iptInsert_extraccionMinera_cantidad.value;
    if(arrayError.length > 0){
        alerts(arrayError);
    }
    else{   
        tbl_detalleExtraccion.row.add([
            val_idMinera,
            valUniEmpresa,
            val_idMotorista,
            valMotorista,
            val_idAyudante,
            valAyudante,
            valLocomotora,
            valTolva,
            valCodigo,
            val_idLabor,
            valcCosto,
            valLabor,
            val_idZona,
            valZona,
            valNivel,
            null,
            valDigitacion,
            valHrs,
            valTurno,
            valId_turno,
            valCantidad,
            '<button class="btn btn-danger removeRow"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
        ]).draw(false);
    }
});

// Alerta
const alerts = data => {    
    let notyFormt = '<strong>!Error!</strong> <h4 class="alert-title">Falta :</h4>\
    <!--Unordered List-->\
    <!--===================================================-->\
    <ul>';
    data.forEach(item => {
        notyFormt += '<li>' + item + '</li>';
    }) 
    notyFormt += '</ul>\
    <!--===================================================-->',
    $.niftyNoty({
        type: 'danger',
        container: '#alert-form-insert',
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}

iptinsertLocomotora.addEventListener('keyup', function(e) {
    valExtractor = iptinsertLocomotora.value;
    var request = {
        'accion': 'search',
        'term': valExtractor,
        'type': 'id_cargo'
    };
    fetchData(request);
});
iptinsertTolva.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertTolva.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});

iptinsertMotorista.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertMotorista.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});
iptinsertAyudante.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertAyudante.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});

// Traer cohicidencia
const fetch_colaboradores = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintarMotorista(data);
    pintarAyudante(data);
}
const pintarMotorista = (data) => {
    arraySelectColaboradores = data['sql'];
    datalistinsert_optionmotorista.innerHTML = ''
    const templateSelectMotorista = document.querySelector("#template-opt-motorista").content;
    const fragmentMotorista = document.createDocumentFragment();
    arraySelectColaboradores.forEach(item => {
        templateSelectMotorista.querySelector('#template-opts-motorista').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectMotorista.querySelector('#template-opts-motorista').dataset.idColaboradorMotorista = item.id_colaborador;
        const cloneMotorista = templateSelectMotorista.cloneNode(true);
        fragmentMotorista.appendChild(cloneMotorista);
    });
    datalistinsert_optionmotorista.appendChild(fragmentMotorista);
}
const pintarAyudante = (data) => {
    arraySelectColaboradores = data['sql'];
    datalistinsert_optionayudante.innerHTML = '';
    const templateSelectAyudante = document.querySelector("#template-opt-ayudante").content;
    const fragmentAyudante = document.createDocumentFragment();
    arraySelectColaboradores.forEach(item => {
        templateSelectAyudante.querySelector('#template-opts-ayudante').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        templateSelectAyudante.querySelector('#template-opts-ayudante').dataset.idColaboradorAyudante = item.id_colaborador;
        const cloneAyudante = templateSelectAyudante.cloneNode(true);
        fragmentAyudante.appendChild(cloneAyudante);
    });
    datalistinsert_optionayudante.appendChild(fragmentAyudante);
}

// Traer cohicidencia
const fetch_unidadMinera = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintar_unidadMinera(data);
}
const pintar_unidadMinera = (data) => {
    arraySelect_unidadMinera = data['sql'];
    datalistInsert_unidadMineral.innerHTML = '';
    const templateSelect_unidadMinera = document.querySelector("#template-insert-extrMineral-unidadMinera").content;
    const fragment_unidadMinera = document.createDocumentFragment();
    arraySelect_unidadMinera.forEach(item => {
        templateSelect_unidadMinera.querySelector('option').value = item.nombre_unidadMinera
        templateSelect_unidadMinera.querySelector('option').dataset.idUnidadMinera = item.id_unidadMinera;
        const clone_unidadMinera = templateSelect_unidadMinera.cloneNode(true);
        fragment_unidadMinera.appendChild(clone_unidadMinera);
    });
    datalistInsert_unidadMineral.appendChild(fragment_unidadMinera);
}

// Traer cohicidencia
const fetch_zona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintar_Zona(data);
}
const pintar_Zona = (data) => {
    arraySelect_zona = data['sql'];
    datalistInsert_optionzona.innerHTML = '';
    const templateSelect_zona = document.querySelector("#template-insert-extrMineral-zona").content;
    const fragment_zona = document.createDocumentFragment();
    arraySelect_zona.forEach(item => {
        templateSelect_zona.querySelector('option').value = item.labZona_nombre
        templateSelect_zona.querySelector('option').dataset.idZona = item.id_zona;
        const clone_zona = templateSelect_zona.cloneNode(true);
        fragment_zona.appendChild(clone_zona);
    });
    datalistInsert_optionzona.appendChild(fragment_zona);
}

const fetch_cCosto = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintar_cCosto(data);
}
const pintar_cCosto = (data) => {
    arraySelect_cCosto = data['sql'];
    dtlInsert_extraccionMineral_cCosto.innerHTML = '';
    const templateSelect_cCostos = document.querySelector("#template-insert-extrMineral-cCostos").content;
    const fragment_cCostos = document.createDocumentFragment();
    arraySelect_cCosto.forEach(item => {
        templateSelect_cCostos.querySelector('option').value = item.lab_ccostos
        templateSelect_cCostos.querySelector('option').dataset.idCosto = item.id_labor;
        const clone_cCostos = templateSelect_cCostos.cloneNode(true);
        fragment_cCostos.appendChild(clone_cCostos);
    });
    dtlInsert_extraccionMineral_cCosto.appendChild(fragment_cCostos);
}

iptInsert_extraccionMineral_cCosto.addEventListener('input', (e) => {
    const val_cCosto = iptInsert_extraccionMineral_cCosto.value;
    if (val_cCosto) {
        var val_idCCosto = document.querySelector('#datalist-insert-extrMineral-cCostos option[value="' + iptInsert_extraccionMineral_cCosto.value + '"]').dataset.idCosto;

        const data = {
            "id": val_idCCosto
        }
        const form = {
            "accion": "getIpt_laborName",
            "datos": data
        }
        get_nameLabor(form)
    }
});
const get_nameLabor = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerExtraccionMinera_list.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    iptInsert_extraccionMinera_laborNombre.value = data['sql'][0]['labNombre_nombre'];
}