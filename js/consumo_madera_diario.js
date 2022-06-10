const btn_create_consumoMadera_diario = document.getElementById('btn-agregar-consumoMadera');
const mbtn_new_consumoMadera_diario = document.getElementById('mbtn-new-consumoMadera');
const mbtn_close_consumoMadera_diario = document.getElementById('mbtn-close-consumoMadera');
const mbtn_create_consumoMadera_diario = document.getElementById('mbtn-insert-consumoMadera');
const mbtn_agregarDetalle = document.getElementById('mbtn-agregarDetalle');
const slt_consumoMadera_turno = document.getElementById('insert-slt-consumoMadera-turno');

const slt_consumoMadera_guardia = document.getElementById('insert-slt-consumoMadera-guardia');

// Jefe de Guardia
const iptAdd_jefeGuardia = document.getElementById('insert-ipt-consumoMadera-jefeGuardia');
const dtl_consumoMadera_jefeGuardia = document.getElementById('insert-dtl-consumoMadera-jefeGuardia');
const tpe_consumoMadera_jefeGuardia = document.getElementById('template-consumoMadera-jefeGuardia').content;

const ipt_consumoMadera_fecha = document.getElementById('insert-ipt-consumoMadera-fecha');
const ipt_consumoMadera_nvale = document.getElementById('insert-slt-consumoMadera-nvale');

//Centro de Costos
const iptAdd_cCostos = document.getElementById('insert-ipt-consumoMadera-centroCostos');
const dtl_consumoMadera_cCostos = document.getElementById('insert-dtl-consumoMadera-centroCostos');
const tpe_consumoMadera_cCostos = document.getElementById('template-consumoMadera-centroCostos').content;

const ipt_consumoMadera_labor_nombre = document.getElementById('insert-ipt-consumoMadera-laborNombre');
const dtl_consumoMadera_labor_nombre = document.getElementById('insert-dtl-consumoMadera-laborNombre');
const tpe_consumoMadera_labor_nombre = document.getElementById('template-consumoMadera-laborNombre').content;



const iptAdd_madera = document.getElementById('insert-ipt-consumoMadera-madera');
const dtl_consumoMadera_madera = document.getElementById('insert-dtl-consumoMadera-madera');
const tpe_consumoMadera_madera = document.getElementById('template-consumoMadera-madera').content

const ipt_consumoMadera_cantidad = document.getElementById('insert-ipt-consumoMadera-cantidad');

var table_consumoMadera_detalle
const fragment = document.createDocumentFragment();
var counter = 1;

const slt_view_consumoMadera_turno = document.getElementById('view-slt-consumoMadera-turno');
const slt_view_consumoMadera_guardia = document.getElementById('view-slt-consumoMadera-guardia');
const ipt_view_consumoMadera_jefeGuardia = document.getElementById('view-ipt-consumoMadera-jefeGuardia');
const ipt_view_consumoMadera_fecha = document.getElementById('view-ipt-consumoMadera-fecha');
const slt_view_consumoMadera_nvale = document.getElementById('view-slt-consumoMadera-nvale');
const ipt_view_consumoMadera_detalle = document.getElementById('list-view-consumoMadera-detalle');


// Principal UPDATE
const mbtn_insert_consumoMadera_update = document.getElementById('mbtn-insert-consumoMadera-update');

const slt_update_consumoMadera_turno = document.getElementById('update-slt-consumoMadera-turno');
const slt_update_consumoMadera_guardia = document.getElementById('update-slt-consumoMadera-guardia');
const ipt_update_consumoMadera_jefeGuardia = document.getElementById('update-ipt-consumoMadera-jefeGuardia');
const dtl_update_consumoMadera_jefeGuardia = document.getElementById('update-dtl-consumoMadera-jefeGuardia');
const tpe_update_consumoMadera_jefeGuardia = document.getElementById('update-template-consumoMadera-jefeGuardia').content;


const ipt_update_consumoMadera_fecha = document.getElementById('update-ipt-consumoMadera-fecha');
const ipt_update_consumoMadera_nvale = document.getElementById('update-ipt-consumoMadera-nvale');


// Detalle UPDATE
const ipt_update_consumoMadera_centroCostos = document.getElementById('update-ipt-consumoMadera-centroCostos');
const dtl_update_consumoMadera_centroCostos = document.getElementById('update-dtl-consumoMadera-centroCostos');
const tpe_update_consumoMadera_centroCostos = document.getElementById('template-consumoMadera-centroCostos').content;

const ipt_update_consumoMadera_laborNombre = document.getElementById('update-ipt-consumoMadera-laborNombre');
const dtl_update_consumoMadera_laborNombre = document.getElementById('update-dtl-consumoMadera-laborNombre');
const tpe_update_consumoMadera_laborNombre = document.getElementById('template-consumoMadera-laborNombre').content;

const ipt_update_consumoMadera_madera = document.getElementById('update-ipt-consumoMadera-madera');
const dtl_update_consumoMadera_madera = document.getElementById('update-dtl-consumoMadera-madera');
const tpe_update_consumoMadera_madera = document.getElementById('template-consumoMadera-madera').content;

const ipt_update_consumoMadera_cantidad = document.getElementById('update-ipt-consumoMadera-cantidad');


const mbtn_agregarDetalle_update = document.getElementById('mbtn-update-agregarDetalle');


const slt_create_consumoMadera_unidadMinero = document.getElementById('insert-slt-consumoMadera-unidadMinera');
const tpt_create_consumoMadera_unidadMinera = document.getElementById('tpt-consumoMadera-unidadMinera').content;


document.addEventListener('DOMContentLoaded', e => {
    mainEvents_consumoMadera();
    table_consumoMadera = $('#tableMaster_consumoMadera').DataTable
    ({
        
        // Ordena desc Columna 1
        order: [[ 1, "desc" ]],
        // Declaramos columnas
        columns: [
            {
                data: "id_consumoMadera",
                responsivePriority: 1,
            },
            {
                data: "consumoMadera_fecha",
            },
            {
                data: "consumoMadera_nVale",
            },
            {
                data: "consumoMadera_turno",
            },
            {
                data: 'consumoMadera_jefeGuardia',
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tbM-consumoMadera-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tbM-consumoMadera-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tbM-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay registro de ",
            "info": "Mostrando _START_ a _END_ de _TOTAL_",
            "infoEmpty": "Mostrando 0 to 0 of 0 ",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ ",
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
        dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [
            {
                text: '<i class="btn-label fa fa-refresh"></i><span class="hidden-xs">Actualizar</span>',
                action: function(e, dt, node, conf) {
                    mainEvents_consumoMadera();
                },
                className: 'btn btn-info btn-labeled' //Primary class for all buttons
            },
            {
                extend: 'collection',
                text: '<i class="btn-label fa fa-download"></i><span class="hidden-xs"> Exportar</span>',
                className: 'btn-labeled',
                //* Botones
                buttons: [
                    //* Boton exportar copiar
                    {
                        //* Indicar Acción
                        extend: 'copy',
                        //* Mensaje hove
                        titleAttr: 'Copiar Tabla',
                        //
                        title: '',
                        //* Clases agregados
                        className: 'btn-labeled',
                        //* Texto u Boton
                        text: '<i class="btn-label fa fa-copy"></i> Copiar',
                        //* Indicar que columns se usará
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excel',
                        text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Excel',
                        title: '',
                        className: 'btn-labeled',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'csv',
                        text: '<i class="btn-label fa fa-file-excel-o"></i> CSV',
                        titleAttr: 'CSV',
                        className: 'btn-labeled',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: '<i class="btn-label fa fa-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF',
                        className: 'btn-labeled',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
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
                    window.location.href = './../../excelGenerator.php?table=reporte_consumo_madera';
                },
                init: function(dt, node, config) {
                    $(node).attr('href', './../../excelGenerator.php?table=reporte_consumo_madera');
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
                text: '<i class="btn-label fa fa-print"></i><span class="hidden-xs">Imprimir</span>',
                titleAttr: 'PDF',
                className: 'btn-labeled', //Primary class for all buttons
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
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
    table_consumoMadera_detalle = $('#list-insert-consumoMadera-detalle').DataTable
    ({
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                
            }
        ]
    });
    table_consumoMadera_detalle.columns(1).visible(false);
    table_consumoMadera_detalle.columns(4).visible(false);

    // View
    table_consumoMadera_detalle_view = $('#list-view-consumoMadera-detalle').DataTable({
        columns: [
            {
                data: "lab_ccostos",
            },
            {
                data: "labNombre_nombre",
            },
            {
                data: "maderas",
            },
            {
                data: 'consumoMaderaDetalle_cantidad',
            }
        ],
    });

    // Update
    table_consumoMadera_detalle_update = $('#list-update-consumoMadera-detalle').DataTable({
        /* columns: [
            {
                data: "id_labor",
            },
            {
                data: "lab_ccostos",
            },
            {
                data: "labNombre_nombre",
            },
            {
                data: "id_madera",
            },            
            {
                data: "maderas",
            },
            {
                data: 'consumoMaderaDetalle_cantidad',
            },
            {
                defaultContent: '<button type="button" class="position btn btn-danger btn-tbM-update-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ], */
    });
    table_consumoMadera_detalle_update.columns(0).visible(false);
    table_consumoMadera_detalle_update.columns(3).visible(false);
});

/** Eventos */

btn_create_consumoMadera_diario.addEventListener("click", (e) => {
    var select1 = {
        "accion": "getcolumnAll",
        "column": "nombre_unidadMinera"
    }
    fetch_unidadMinera_create(select1);
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "dtl-colaboradores-all",
    }
    // Enviamos formulario
    fetchData_colaboradores(form_request1);
    // Preparamos formulario
    let form_request2 = {
        // Se pone la accion
        "accion": "dtl-ccosto-labor",
    }
    // Enviamos formulario
    fetchData_ccosto_labor(form_request2);
    // Preparamos formulario
    let form_request2_1 = {
        // Se pone la accion
        "accion": "dtl-nombre-labor",
    }
    // Enviamos formulario
    fetchData_nombre_labor(form_request2_1);
    // Preparamos formulario
    let form_request3 = {
        // Se pone la accion
        "accion": "dtl-madera-all",
    }
    // Enviamos formulario
    fetchData_madera_all(form_request3);   
});
mbtn_create_consumoMadera_diario.addEventListener("click", (e) => {
    let listDetalles = [];
    let array_noti_error = [];
    slt_create_consumoMadera_unidadMinero
    let val_unidadMInera = slt_create_consumoMadera_unidadMinero.value;
    let id_unidadMinera = slt_create_consumoMadera_unidadMinero.querySelector("option[value='" + val_unidadMInera + "']").dataset.idUnidadMinera;
    let val_turno = slt_consumoMadera_turno.options[slt_consumoMadera_turno.selectedIndex].value;
    let valId_turno = slt_consumoMadera_turno.options[slt_consumoMadera_turno.selectedIndex].dataset.idTurno;
    let val_guardia = slt_consumoMadera_guardia.options[slt_consumoMadera_guardia.selectedIndex].value;
    let valId_guardia = slt_consumoMadera_guardia.options[slt_consumoMadera_guardia.selectedIndex].dataset.idGuardia;
    let val_jefeGuardia = iptAdd_jefeGuardia.value;
    val_jefeGuardia ? val_jefeGuardia = val_jefeGuardia : array_noti_error.push("JEFE DE GUARDIA");
    val_jefeGuardia ? val_idColaborador = document.querySelector("#insert-dtl-consumoMadera-jefeGuardia"  + " option[value='" +  val_jefeGuardia + "']").dataset.idJefeGuardia : array_noti_error.push("JEFE DE GUARDIA , ID");
    val_fecha = ipt_consumoMadera_fecha.value;
    val_fecha ? val_fecha = val_fecha : array_noti_error.push("FECHA");
    val_nvale = ipt_consumoMadera_nvale.value;
    val_nvale ? val_nvale = val_nvale : array_noti_error.push("N° VALE");
    let form_detalle = table_consumoMadera_detalle.rows().data();
    form_detalle.length > 0 ? form_detalle = form_detalle : array_noti_error.push("DETALLE");
    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-insert',
            html: '<strong>!Error!</strong> ' + array_noti_error[0],
            focus: false,
            timer: 2000
        });
    }
    else if(array_noti_error.length > 1){
        let paramentNoti = {
            'tipo': 'danger',
            'text': '!Error!',
            'descripcion': 'Falta :',
            'list': array_noti_error,
            'modal': 'alerts-form-insert'
        }
        alerts(paramentNoti);
    }
    else{
        let f = form_detalle;
        for (let i = 0; f.length > i; i++) {
            let n = f[i].length;
            listDetalles.push({
                id_labor: f[i][1],
                id_madera: f[i][4],
                cantidad: f[i][6],
            });
        }
        let listInsert = {
            "unidadMinera": id_unidadMinera,
            "turno": val_turno,
            "turno_id": valId_turno,
            "guardia": val_guardia,
            "guardia_id": valId_guardia,
            "jefeGuardia": val_idColaborador,
            "fecha": val_fecha,
            "nvale": val_nvale,
            "detalles": listDetalles
        }
        let form_insert = {
            "accion": "insert",
            "form": listInsert
        }
        recordForm(form_insert);
    }
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
    notificationBackend(rptSql)
}
const notificationBackend = (rptSql) => {
    if (rptSql) {
        if (rptSql['sql1']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alerts-form-insert',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql1']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if (rptSql['sql2']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alerts-form-insert',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql2']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if( rptSql['sql1']['estado'] == 1 | rptSql['sql2']['estado'] == 1){
            reset_formcreate_consumoMadera();
            table_consumoMadera_detalle.clear().draw();;
            mainEvents_consumoMadera();
        }
    }
}
mbtn_agregarDetalle.addEventListener("click", (e) => {
    let array_noti_error = [];
    let val_idLabor;
    let val_idMadera
    let val_cCostos = iptAdd_cCostos.value;
    val_cCostos ? val_cCostos = val_cCostos : array_noti_error.push("CENTRO DE COSTOS");
    val_cCostos ? val_idLabor = document.querySelector("#insert-dtl-consumoMadera-centroCostos"  + " option[value='" +  val_cCostos + "']").dataset.idLabor : array_noti_error.push("CENTRO DE COSTOS");
    let val_laborNombre = ipt_consumoMadera_labor_nombre.value;
    val_cCostos ? val_cCostos = val_cCostos : array_noti_error.push("CENTRO DE COSTOS");
    let val_madera = iptAdd_madera.value;
    val_madera ? val_madera = val_madera : array_noti_error.push("MADERA");
    val_madera ? val_idMadera = document.querySelector("#insert-dtl-consumoMadera-madera"  + " option[value='" +  (val_madera) + "']").dataset.idMadera : array_noti_error.push("MADERA");
    let val_cantidad = ipt_consumoMadera_cantidad.value;
    val_cantidad ? val_cantidad = val_cantidad : array_noti_error.push("CANTIDAD");

    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>!Error!</strong> ' + array_noti_error[0],
            focus: false,
            timer: 2000
        });
    }
    else if(array_noti_error.length > 1){
        var paramentNoti = {
            'tipo': 'danger',
            'text': '!Error!',
            'descripcion': 'Falta :',
            'list': array_noti_error
        }
        alerts(paramentNoti);
    }
    else{
        table_consumoMadera_detalle.row.add([
            counter,
            val_idLabor,
            val_cCostos,
            val_laborNombre,
            val_idMadera,
            val_madera,
            val_cantidad,
            '<button class="btn btn-danger removeRow">Eliminar</button>'
        ]).draw(false);
        counter++;
    }
    
});

$('#list-insert-consumoMadera-detalle').on('click', '.removeRow', function() {
    table_consumoMadera_detalle.row($(this).parents('tr')).remove().draw();
});

const mainEvents_consumoMadera = () => {
    let formList = {
        "accion": "table_master",
    }
    fetchTable_consumoMadera(formList);   
}
// Hacemos la Peticion
const fetchTable_consumoMadera = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerConsumoMaderaList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_consumoMadera(rptSQL);
}

// Se pinta DataList
const paintTable_consumoMadera = data => {
    table_consumoMadera.clear();
    table_consumoMadera.rows.add(data).draw();
};

// Traer JSON para Tabla (UNIDAD MIBERA)
const fetch_unidadMinera_create = async (json) => {
    const body = new FormData();
    body.append("data", JSON.stringify(json));
    const rpt = await fetch('./../../../controllers/controllerUnidadMineraList.php', {
        method: "POST",
        body
    });
    
    const rptJson = await rpt.json(); //await JSON.parse(returned);
    console.log(rptJson);
    paintSlt_unidadMinera_create(rptJson);
};

const paintSlt_unidadMinera_create = (data) => {
    tpt_create_consumoMadera_unidadMinera
    objectarrayInstalacion = data['sql'];
    slt_create_consumoMadera_unidadMinero.innerHTML = '';
    objectarrayInstalacion.forEach(item => {
        tpt_create_consumoMadera_unidadMinera.querySelector('option').textContent = item.nombre_unidadMinera;
        tpt_create_consumoMadera_unidadMinera.querySelector('option').value = item.nombre_unidadMinera;
        tpt_create_consumoMadera_unidadMinera.querySelector('option').dataset.idUnidadMinera = item.id_unidadMinera;
        const clone = tpt_create_consumoMadera_unidadMinera.cloneNode(true);
        fragment.appendChild(clone);
    });
    slt_create_consumoMadera_unidadMinero.appendChild(fragment);
};

// Hacemos la Peticion
const fetchData_colaboradores = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_jefeGuardia(rptSQL);
}

// Se pinta DataList
const paintDtl_jefeGuardia = data => {
    dtl_consumoMadera_jefeGuardia.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_jefeGuardia.querySelector('option').textContent = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_consumoMadera_jefeGuardia.querySelector('option').value = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_consumoMadera_jefeGuardia.querySelector('option').dataset.idJefeGuardia = item.id_colaborador;
        const clone = tpe_consumoMadera_jefeGuardia.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_jefeGuardia.appendChild(fragment);
};

// Hacemos la Peticion
const fetchData_ccosto_labor = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_ccostos_Labor(rptSQL);
}

// Se pinta DataList
const paintDtl_ccostos_Labor = data => {
    dtl_consumoMadera_cCostos.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_cCostos.querySelector('option').textContent = item.lab_ccostos;
        tpe_consumoMadera_cCostos.querySelector('option').value = item.lab_ccostos;
        tpe_consumoMadera_cCostos.querySelector('option').dataset.idLabor = item.id_labor;
        const clone = tpe_consumoMadera_cCostos.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_cCostos.appendChild(fragment);
};

// Hacemos la Peticion
const fetchData_nombre_labor = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_nombre_Labor(rptSQL);
}

// Se pinta DataList
const paintDtl_nombre_Labor = data => {
    dtl_consumoMadera_labor_nombre.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_labor_nombre.querySelector('option').textContent = item.labNombre_nombre;
        tpe_consumoMadera_labor_nombre.querySelector('option').value = item.labNombre_nombre;
        tpe_consumoMadera_labor_nombre.querySelector('option').dataset.idLaborNombre = item.id_labNombre;
        const clone = tpe_consumoMadera_labor_nombre.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_labor_nombre.appendChild(fragment);
}

// Hacemos la Peticion
const fetchData_madera_all = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerMaderaList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_madera(rptSQL);
}
// Se pinta DataList
const paintDtl_madera = data => {
    dtl_consumoMadera_madera.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_madera.querySelector('option').textContent = item.madera_codigo  + ' ' + item.madera_tipo + ' ' + item.madera_dimension;
        tpe_consumoMadera_madera.querySelector('option').value = item.madera_codigo  + ' ' + item.madera_tipo + ' ' + item.madera_dimension;
        tpe_consumoMadera_madera.querySelector('option').dataset.idMadera = item.id_madera;
        
        const clone = tpe_consumoMadera_madera.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_madera.appendChild(fragment);
};

iptAdd_cCostos.addEventListener("input", (e) => {
    try {
        let val_cCostos = iptAdd_cCostos.value;
        let val_id = document.querySelector("#insert-dtl-consumoMadera-centroCostos"  + " option[value='" +  (val_cCostos ? val_cCostos = val_cCostos : val_cCostos = 0) + "']").dataset.idLabor;
        if (val_id) {
            
            let selectForm1 = {
                "accion": "getLabor_ccosto",
                "paramentWhere": val_id,
            }
            getDataLabor(selectForm1);
        } else {
            ipt_consumoMadera_labor_nombre.value = '';
        }
    } catch (error) {
        ipt_consumoMadera_labor_nombre.value = '';
        //console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
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
    ipt_consumoMadera_labor_nombre.value = rptSql[0].labNombre_nombre;
}

ipt_consumoMadera_labor_nombre.addEventListener("input", (e) => {
    try {
        let val_nombre_laborNombre = ipt_consumoMadera_labor_nombre.value;
        console.log(val_nombre_laborNombre);
        if(val_nombre_laborNombre){
            let val_id_laborNombre = document.querySelector("#insert-dtl-consumoMadera-laborNombre"  + " option[value='" +  val_nombre_laborNombre + "']").dataset.idLaborNombre;
            console.log(val_id_laborNombre);
            console.log('Weyy el if');
            if (val_id_laborNombre) {
                
                let selectForm1 = {
                    "accion": "getCCostos_lbNm_nombre",
                    "paramentWhere": val_id_laborNombre,
                }
                getCCostos_laborNombre_nombre(selectForm1)
                console.log('Se envio');
            } else {
                iptAdd_cCostos.value = '';
            }
        }
        
    } catch (error) {
        iptAdd_cCostos.value = '';
        //console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
    }
});

const getCCostos_laborNombre_nombre = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarCCosto_nombreLabor_nombre(rptSql);
}

const pintarCCosto_nombreLabor_nombre = (rptSql) => {
    iptAdd_cCostos.value = rptSql[0].lab_ccostos;
}

// Alerta
const alerts = data => {
    console.log(data);
    /* let list = data['list'];
    console.log(list); */
    let notyFormt = '<strong>' + data.text + '</strong> <h4 class="alert-title">' + data.descripcion + '</h4>\
    <!--Unordered List-->\
    <!--===================================================-->\
    <ul>';
    data.list.forEach(item => {
        notyFormt += '<li>' + item + '</li>';
    }) 
    notyFormt += '</ul>\
    <!--===================================================-->',
    $.niftyNoty({
        type: data.tipo,
        container: '#'+data.modal,
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}

const reset_formcreate_consumoMadera = () => {
    iptAdd_jefeGuardia.value = '';
    ipt_consumoMadera_fecha.value = '';
    ipt_consumoMadera_nvale.value = '';
    iptAdd_cCostos.value = '';
    iptAdd_madera.value = '';
    ipt_consumoMadera_cantidad.value = '';
}

//* DETALLE REGISTRO
$('#tableMaster_consumoMadera tbody').on('click', '.btn-tbM-consumoMadera-detalle', function() {
    $("#consumoMadera-lg-modal-read").modal("show");
    let data = table_consumoMadera.row($(this).parents('tr')).data();
    let form_request = {
        "accion": "getRow",
        "id": data['id_consumoMadera']
    }
    getRowView(form_request);
});

const getRowView = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerConsumoMaderaList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    rptSql = data['sql'];
    console.log(rptSql);
    paintForm_view(rptSql)
}

const paintForm_view = (rptSql) => {
    if(rptSql){
        slt_view_consumoMadera_turno.value = rptSql[0]['consumoMadera_turno'];
        slt_view_consumoMadera_guardia.value = rptSql[0]['consumoMadera_guardia'];
        ipt_view_consumoMadera_jefeGuardia.value = rptSql[0]['jefe_guardia'];
        ipt_view_consumoMadera_fecha.value = rptSql[0]['consumoMadera_fecha'];
        slt_view_consumoMadera_nvale.value = rptSql[0]['consumoMadera_nvale'];

        table_consumoMadera_detalle_view.clear();
        table_consumoMadera_detalle_view.rows.add(rptSql).draw();
    }
    else{
        slt_view_consumoMadera_turno.value = '-';
        slt_view_consumoMadera_guardia.value = '-';
        ipt_view_consumoMadera_jefeGuardia.value = '-';
        ipt_view_consumoMadera_fecha.value = '-';
        slt_view_consumoMadera_nvale.value = '-';
    }
    
}

//* EDITAR REGISTRO
$('#tableMaster_consumoMadera tbody').on('click', '.btn-tbM-consumoMadera-edit', function() {

    //ALMACENANDO INFORMACION DE DATALIST UPDATE

    // Preparamos formulario
    let form_request2 = {
        // Se pone la accion
        "accion": "dtl-ccosto-labor",
    }
    // Enviamos formulario
    fetchData_update_ccosto_labor(form_request2);
    // Preparamos formulario
    let form_request2_1 = {
        // Se pone la accion
        "accion": "dtl-nombre-labor",
    }
    // Enviamos formulario
    fetchData_update_nombre_labor(form_request2_1);
    let form_request3 = {
        // Se pone la accion
        "accion": "dtl-madera-all",
    }
    fetchTable_update_consumoMadera(form_request3);   
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "dtl-colaboradores-all",
    }
    // Enviamos formulario
    fetchData_consumoMadera_colaboradores_update(form_request1);
    $("#consumoMadera-lg-modal-update").modal("show");
    const data = table_consumoMadera.row($(this).parents('tr')).data();
    let formRequest = {
        "accion": "getRowUpdate",
        "id": data['id_consumoMadera']
    }
    getRowUpdate(formRequest);
});

const fetchData_consumoMadera_colaboradores_update = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    rptSql = data['sql'];
    paintDtl_colaborador_formUpdate(rptSql);
}

const paintDtl_colaborador_formUpdate = (rptSql) => {
    dtl_update_consumoMadera_jefeGuardia.innerHTML = '';
    rptSql.forEach(item => {
        tpe_update_consumoMadera_jefeGuardia.querySelector('option').textContent = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_update_consumoMadera_jefeGuardia.querySelector('option').value = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_update_consumoMadera_jefeGuardia.querySelector('option').dataset.idJefeGuardia = item.id_colaborador;

        const clone = tpe_update_consumoMadera_jefeGuardia.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_update_consumoMadera_jefeGuardia.appendChild(fragment);
}

const getRowUpdate = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerConsumoMaderaList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    rptSql = data['sql'];
    paintForm_update(rptSql)
}

const paintForm_update = (rptSql) => {
    if(rptSql){
        slt_update_consumoMadera_turno.value = rptSql[0]['consumoMadera_turno'];
        slt_update_consumoMadera_guardia.value = rptSql[0]['consumoMadera_guardia'];
        ipt_update_consumoMadera_jefeGuardia.value = rptSql[0]['jefe_guardia'];
        ipt_update_consumoMadera_fecha.value = rptSql[0]['consumoMadera_fecha'];
        ipt_update_consumoMadera_nvale.value = rptSql[0]['consumoMadera_nvale'];
        ipt_update_consumoMadera_nvale.dataset.idConsumoMadera = rptSql[0]['id_consumoMadera'];
        table_consumoMadera_detalle_update.clear();
        rptSql.forEach(item => {
            table_consumoMadera_detalle_update.row.add( [
                item.id_labor,
                item.lab_ccostos,
                item.labNombre_nombre,
                item.id_madera,
                item.maderas,
                item.consumoMaderaDetalle_cantidad,
                '<button type="button" class="position btn btn-danger btn-tbM-update-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>',
            ] ).draw();
        });
        //table_consumoMadera_detalle_update.rows.add(rptSql).draw();
    }
    else{
        slt_update_consumoMadera_turno.value = '-';
        slt_update_consumoMadera_guardia.value = '-';
        ipt_update_consumoMadera_jefeGuardia.value = '-';
        ipt_update_consumoMadera_fecha.value = '-';
        ipt_update_consumoMadera_nvale.value = '-';
    }
    
}


//* ELIMINAR REGISTRO
$('#list-update-consumoMadera-detalle tbody').on('click', '.btn-tbM-update-consumoMadera-delet', function() {
    table_consumoMadera_detalle_update.row($(this).parents('tr')).remove().draw();
});

mbtn_insert_consumoMadera_update.addEventListener("click", (e) => {
    //mainEvents_consumoMadera();
    let listDetalles = [];
    let array_noti_error = [];
    let val_id_consumoMadera = ipt_update_consumoMadera_nvale.dataset.idConsumoMadera;
    let val_turno = slt_update_consumoMadera_turno.value
    let val_guardia = slt_update_consumoMadera_guardia.value
    let val_fecha = ipt_update_consumoMadera_fecha.value
    let val_nvale = ipt_update_consumoMadera_nvale.value

    let val_jefeGuardia = ipt_update_consumoMadera_jefeGuardia.value
    val_jefeGuardia ? val_jefeGuardia = val_jefeGuardia : array_noti_error.push("JEFE DE GUARDIA");
    val_jefeGuardia ? val_idColaborador = document.querySelector("#update-dtl-consumoMadera-jefeGuardia"  + " option[value='" +  val_jefeGuardia + "']").dataset.idJefeGuardia : array_noti_error.push("JEFE DE GUARDIA , ID");

    let form_detalle_update = table_consumoMadera_detalle_update.rows().data();
    console.log(form_detalle_update);
    form_detalle_update.length > 0 ? form_detalle_update = form_detalle_update : array_noti_error.push("DETALLE");

    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-update',
            html: '<strong>!Error!</strong> ' + array_noti_error[0],
            focus: false,
            timer: 2000
        });
    }
    else if(array_noti_error.length > 1){
        let paramentNoti = {
            'tipo': 'danger',
            'text': '!Error!',
            'descripcion': 'Falta :',
            'list': array_noti_error,
            'modal': 'alerts-form-update'
        }
        alerts(paramentNoti);
    }
    else{
        let f = form_detalle_update;
        for (let i = 0; f.length > i; i++) {
            let n = f[i].length;
            listDetalles.push({
                id_labor: f[i]['0'],
                id_madera: f[i]['3'],
                cantidad: f[i]['5'],
            });
        }
        let listInsert = {
            "id": val_id_consumoMadera,
            "turno": val_turno,
            "guardia": val_guardia,
            "jefeGuardia": val_idColaborador,
            "fecha": val_fecha,
            "nvale": val_nvale,
            "detalles": listDetalles
        }
        let form_insert = {
            "accion": "edit",
            "form": listInsert
        }
        console.log(form_insert);
        updateForm(form_insert);
    }
});

const updateForm = async (listInsert) => {
    const body = new FormData();
    body.append("data", JSON.stringify(listInsert));
    const res = await fetch('./../../../controllers/controllerConsumoMadera.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    notificationBackend_update(rptSql)
}

const notificationBackend_update = (rptSql) => {
    if (rptSql) {
        if (rptSql['sql1']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alerts-form-update',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql1']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if (rptSql['sql2']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alerts-form-update',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql2']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if( rptSql['sql1']['estado'] == 1 | rptSql['sql2']['estado'] == 1){
            reset_formcreate_consumoMadera();
            table_consumoMadera_detalle.clear().draw();;
            mainEvents_consumoMadera();
        }
    }
}

// Hacemos la Peticion
const fetchData_update_ccosto_labor = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_cCostos_update(rptSQL);
}

// Hacemos la Peticion
const fetchData_update_nombre_labor = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_laborNombre_update(rptSQL);
}

// Hacemos la Peticion
const fetchTable_update_consumoMadera = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerMaderaList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_madera_update(rptSQL);
}

// Se pinta DataList CENTRO COSTOS --- UPDATE
const paintDtl_cCostos_update = data => {
    dtl_update_consumoMadera_centroCostos.innerHTML = '';
    data.forEach(item => {
        tpe_update_consumoMadera_centroCostos.querySelector('option').textContent = item.lab_ccostos;
        tpe_update_consumoMadera_centroCostos.querySelector('option').value = item.lab_ccostos;
        tpe_update_consumoMadera_centroCostos.querySelector('option').dataset.idLabor = item.id_labor;
        const clone = tpe_update_consumoMadera_centroCostos.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_update_consumoMadera_centroCostos.appendChild(fragment);
};

// Se pinta DataList NOMBRE DE LABOR --- UPDATE
const paintDtl_laborNombre_update = data => {
    dtl_update_consumoMadera_laborNombre.innerHTML = '';
    data.forEach(item => {
        tpe_update_consumoMadera_laborNombre.querySelector('option').textContent = item.labNombre_nombre;
        tpe_update_consumoMadera_laborNombre.querySelector('option').value = item.labNombre_nombre;
        tpe_update_consumoMadera_laborNombre.querySelector('option').dataset.idLabor = item.id_labor;
        const clone = tpe_update_consumoMadera_laborNombre.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_update_consumoMadera_laborNombre.appendChild(fragment);
};

// Se pinta DataList MADERA --- UPDATE
const paintDtl_madera_update = data => {

    dtl_update_consumoMadera_madera.innerHTML = '';
    data.forEach(item => {
        tpe_update_consumoMadera_madera.querySelector('option').textContent = item.madera_codigo + ' ' + item.madera_tipo + ' ' + item.madera_dimension;
        tpe_update_consumoMadera_madera.querySelector('option').value = item.madera_codigo + ' ' + item.madera_tipo + ' ' + item.madera_dimension;
        tpe_update_consumoMadera_madera.querySelector('option').dataset.idMadera = item.id_madera;
        
        const clone = tpe_update_consumoMadera_madera.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_update_consumoMadera_madera.appendChild(fragment);
};

// DETECCION DE INPUT
// CENTRO DE COSTOS
ipt_update_consumoMadera_centroCostos.addEventListener("input", (e) => {
    try {
        let val_cCostos = ipt_update_consumoMadera_centroCostos.value;
        console.log(val_cCostos);
        let val_id = document.querySelector("#update-dtl-consumoMadera-centroCostos"  + " option[value='" +  (val_cCostos ? val_cCostos = val_cCostos : val_cCostos = 0) + "']").dataset.idLabor;
        console.log(val_id);
        if (val_id) {
            let selectForm1 = {
                "accion": "getLabor_ccosto",
                "paramentWhere": val_id,
            }
            getLaborNombre_update_labor_ccostos(selectForm1);
        } else {
            ipt_update_consumoMadera_laborNombre.value = '';
        }
    } catch (error) {
        ipt_update_consumoMadera_laborNombre.value = '';
        //console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
    }
});

// NOMBRE DE LABOR
ipt_update_consumoMadera_laborNombre.addEventListener("input", (e) => {
    try {
        let val_cCostos = ipt_update_consumoMadera_centroCostos.value;
        let val_id = document.querySelector("#update-dtl-consumoMadera-centroCostos"  + " option[value='" +  (val_cCostos ? val_cCostos = val_cCostos : val_cCostos = 0) + "']").dataset.idLabor;
        if (val_id) {
            
            let selectForm1 = {
                "accion": "getCCostos_lbNm_nombre",
                "paramentWhere": val_id,
            }
            getCCostos_update_laborNombre_nombre(selectForm1);
        } else {
            ipt_update_consumoMadera_centroCostos.value = '';
        }
    } catch (error) {
        ipt_update_consumoMadera_centroCostos.value = '';
        //console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
    }
});

const getLaborNombre_update_labor_ccostos = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarAsociados_update_laborNombre(rptSql);
}

const pintarAsociados_update_laborNombre = (rptSql) => {
    ipt_update_consumoMadera_laborNombre.value = rptSql[0].labNombre_nombre;
}

const getCCostos_update_laborNombre_nombre = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarAsociados_update_cCostos(rptSql);
}

const pintarAsociados_update_cCostos = (rptSql) => {
    ipt_update_consumoMadera_centroCostos.value = rptSql[0].labNombre_nombre;
}

//* ELIMINAR REGISTRO
$('#tableMaster_consumoMadera tbody').on('click', '.btn-tbM-consumoMadera-delet', function() {
    mainEvents_consumoMadera()
    var data = table_consumoMadera.row($(this).parents('tr')).data();
    swal({
        title: "Estas seguro?",
        text: "Una vez eliminado, no podrá recuperarlo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        mainEvents_consumoMadera();
        if (willDelete) {
            let form_request = {
                "accion": "delete",
                "id": data['id_consumoMadera']
            }
            console.log(form_request);
            requestDelete(form_request);
            swal("¡La información ha sido eliminado!", {
                icon: "success",
            });
        } else {
            swal("¡La información está a salvo!");
        }
    });
});

// Se envia Formulario
const requestDelete = async (form_request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form_request));
    const returned = await fetch("./../../../controllers/controllerConsumoMadera.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
}

mbtn_agregarDetalle_update.addEventListener("click", (e) => {
    try {
        let val_cCostos = ipt_update_consumoMadera_centroCostos.value;
        let val_lbNombre = ipt_update_consumoMadera_laborNombre.value;
        let val_idLabor = dtl_update_consumoMadera_centroCostos.querySelector("option[value='" +  val_cCostos + "']").dataset.idLabor;

        let val_madera = ipt_update_consumoMadera_madera.value;
        let val_idMadera = dtl_update_consumoMadera_madera.querySelector("option[value='" +  val_madera + "']").dataset.idMadera;
        let val_cantidad = ipt_update_consumoMadera_cantidad.value;
        
        table_consumoMadera_detalle_update.row.add( [
            val_idLabor,
            val_cCostos,
            val_lbNombre,
            val_idMadera,
            val_madera,
            val_cantidad,
            '<button type="button" class="position btn btn-danger btn-tbM-update-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>',
        ] ).draw();
        
    } catch (error) {
        
    }
});