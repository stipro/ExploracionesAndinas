
const btnAgregar_docExplosivo = document.getElementById('btn-agregar-docExplosivo');
const mbtn_new_docExplosivo = document.getElementById('mbtn-new-docExplosivo');
const mbtn_close_docExplosivo = document.getElementById('mbtn-close-docExplosivo');
const mbtn_insert_docExplosivo = document.getElementById('mbtn-insert-docExplosivo');

const mbtnAdd_docExplosivo_listExplosivo = document.getElementById('mbtn-add-btn-docExplosivo-listExplosivo');

//
const ipt_insert_docExplosivos_numeroDoc = document.getElementById('insert-ipt-docExplosivo-numeroDoc');

const ipt_insert_docExplosivos_viaTipo_dPa = document.getElementById('insert-ipt-docExplosivo-viaTipo-dPa');
const ipt_insert_docExplosivos_viaNombre_dPa = document.getElementById('insert-ipt-docExplosivo-viaNombre-dPa');
const ipt_insert_docExplosivos_n_dPa = document.getElementById('insert-ipt-docExplosivo-n-dPa');
const ipt_insert_docExplosivos_int_dPa = document.getElementById('insert-ipt-docExplosivo-int-dPa');
const ipt_insert_docExplosivos_zona_dPa = document.getElementById('insert-ipt-docExplosivo-zona-dPa');
const ipt_insert_docExplosivos_dis_dPa = document.getElementById('insert-ipt-docExplosivo-dis-dPa');
const ipt_insert_docExplosivos_pro_dPa = document.getElementById('insert-ipt-docExplosivo-pro-dPa');
const ipt_insert_docExplosivos_dep_dPa = document.getElementById('insert-ipt-docExplosivo-dep-dPa');
const ipt_insert_docExplosivos_RazonSocial_rem = document.getElementById('insert-ipt-docExplosivo-nombres_razonSocial-remitente');
const ipt_insert_docExplosivos_ruc_rem = document.getElementById('insert-ipt-docExplosivo-ruc-remitente');

const ipt_insert_docExplosivos_viaTipo_dLL = document.getElementById('insert-ipt-docExplosivo-viaTipo-dLL');
const ipt_insert_docExplosivos_viaNombre_dLL = document.getElementById('insert-ipt-docExplosivo-viaNombre-dLL');
const ipt_insert_docExplosivos_n_dLL = document.getElementById('insert-ipt-docExplosivo-n-dLL');
const ipt_insert_docExplosivos_int_dLL = document.getElementById('insert-ipt-docExplosivo-int-dLL');
const ipt_insert_docExplosivos_zona_dLL = document.getElementById('insert-ipt-docExplosivo-zona-dLL');
const ipt_insert_docExplosivos_dis_dLL = document.getElementById('insert-ipt-docExplosivo-dis-dLL');
const ipt_insert_docExplosivos_pro_dLL = document.getElementById('insert-ipt-docExplosivo-pro-dLL');
const ipt_insert_docExplosivos_dep_dLL = document.getElementById('insert-ipt-docExplosivo-dep-dLL');
const ipt_insert_docExplosivos_RazonSocial_des = document.getElementById('insert-ipt-docExplosivo-nombres_razonSocial-destinatario');
const ipt_insert_docExplosivos_ruc_des = document.getElementById('insert-ipt-docExplosivo-ruc-destinatario');



const ipt_insert_docExplosivos_nomRaz_remitente = document.getElementById('insert-ipt-docExplosivo-nombres_razonSocial-remitente');
const ipt_insert_docExplosivos_ruc_remitente = document.getElementById('insert-ipt-docExplosivo-ruc-remitente');
const ipt_insert_docExplosivos_nomRaz_destinatario = document.getElementById('insert-ipt-docExplosivo-nombres_razonSocial-destinatario');
const ipt_insert_docExplosivos_ruc_destinatario = document.getElementById('insert-ipt-docExplosivo-ruc-destinatario');

const iptAdd_docExplosivos_nombre = document.getElementById('addDetail-ipt-docExplosivo-explosivoNombre');
const dtl_docExplosivos_nombre = document.getElementById('addDetail-dt-docExplosivo-explosivoNombre');
const tpe_docExplosivos_nombre = document.getElementById('addDetail-tpt-docExplosivo-explosivoNombre').content

const iptAdd_docExplosivos_codigo = document.getElementById('addDetail-ipt-docExplosivo-explosivoCodigo');
const dtl_docExplosivos_codigo = document.getElementById('addDetail-dt-docExplosivo-explosivoCodigo');
const tpe_docExplosivos_codigo = document.getElementById('addDetail-tpt-docExplosivo-explosivoCodigo').content
const iptAdd_docExplosivos_unidadMedida = document.getElementById('addDetail-ipt-docExplosivo-unidMedida');


const iptAdd_docExplosivos_cantidad = document.getElementById('addDetail-ipt-docExplosivo-cantidad');

const fragmentNombre = document.createDocumentFragment();
const fragmentCodigo = document.createDocumentFragment();


//READ VARIABLES GLOVALES
const ipt_read_docExplosivo_numeroDoc = document.getElementById('read-ipt-docExplosivo-numeroDoc');

const ipt_read_docExplosivo_viaTipo_dpa = document.getElementById('read-ipt-docExplosivo-viaTipo-dPa');
const ipt_read_docExplosivo_viaNombre_dpa = document.getElementById('read-ipt-docExplosivo-viaNombre-dPa');
const ipt_read_docExplosivo_n_dpa = document.getElementById('read-ipt-docExplosivo-n-dPa');
const ipt_read_docExplosivo_int_dpa = document.getElementById('read-ipt-docExplosivo-int-dPa');
const ipt_read_docExplosivo_zona_dpa = document.getElementById('read-ipt-docExplosivo-zona-dPa');
const ipt_read_docExplosivo_dis_dpa = document.getElementById('read-ipt-docExplosivo-dis-dPa');
const ipt_read_docExplosivo_pro_dpa = document.getElementById('read-ipt-docExplosivo-pro-dPa');
const ipt_read_docExplosivo_dep_dpa = document.getElementById('read-ipt-docExplosivo-dep-dPa');
const ipt_read_docExplosivo_NombreRazon_remitente = document.getElementById('read-ipt-docExplosivo-nombres_razonSocial-remitente');
const ipt_read_docExplosivo_ruc_remitente = document.getElementById('read-ipt-docExplosivo-ruc-remitente');

const ipt_read_docExplosivo_viaTipo_dll = document.getElementById('read-ipt-docExplosivo-viaTipo-dLL');
const ipt_read_docExplosivo_viaNombre_dll = document.getElementById('read-ipt-docExplosivo-viaNombre-dLL');
const ipt_read_docExplosivo_n_dll = document.getElementById('read-ipt-docExplosivo-n-dLL');
const ipt_read_docExplosivo_int_dll = document.getElementById('read-ipt-docExplosivo-int-dLL');
const ipt_read_docExplosivo_zona_dll = document.getElementById('read-ipt-docExplosivo-zona-dLL');
const ipt_read_docExplosivo_dis_dll = document.getElementById('read-ipt-docExplosivo-dis-dLL');
const ipt_read_docExplosivo_pro_dll = document.getElementById('read-ipt-docExplosivo-pro-dLL');
const ipt_read_docExplosivo_dep_dll = document.getElementById('read-ipt-docExplosivo-dep-dLL');
const ipt_read_docExplosivo_NombreRazon_destinatario = document.getElementById('read-ipt-docExplosivo-nombres_razonSocial-destinatario');
const ipt_read_docExplosivo_ruc_destinatario = document.getElementById('read-ipt-docExplosivo-ruc-destinatario');


const ipt_update_docExplosivos_nombre = document.getElementById('update-addDetail-ipt-docExplosivo-explosivoNombre');
const dtl_update_docExplosivos_nombre = document.getElementById('update-addDetail-dt-docExplosivo-explosivoNombre');
const tpe_update_docExplosivos_nombre = document.getElementById('update-addDetail-tpt-docExplosivo-explosivoNombre').content;

const ipt_update_docExplosivos_codigo = document.getElementById('update-addDetail-ipt-docExplosivo-explosivoCodigo');
const dtl_update_docExplosivos_codigo = document.getElementById('update-addDetail-dt-docExplosivo-explosivoCodigo');
const tpe_update_docExplosivos_codigo = document.getElementById('update-addDetail-tpt-docExplosivo-explosivoCodigo').content;

const iptAdd_update_docExplosivos_unidadMedida = document.getElementById('update-addDetail-ipt-docExplosivo-unidMedida');
const iptAdd_update_docExplosivos_cantidad = document.getElementById('update-addDetail-ipt-docExplosivo-cantidad');

const ipt_update_docExplosivo_numeroDoc = document.getElementById('update-ipt-docExplosivo-numeroDoc');
const ipt_update_docExplosivo_viaTipo_dpa = document.getElementById('update-ipt-docExplosivo-viaTipo-dPa');
const ipt_update_docExplosivo_viaNombre_dpa = document.getElementById('update-ipt-docExplosivo-viaNombre-dPa');
const ipt_update_docExplosivo_n_dpa = document.getElementById('update-ipt-docExplosivo-n-dPa');
const ipt_update_docExplosivo_int_dpa = document.getElementById('update-ipt-docExplosivo-int-dPa');
const ipt_update_docExplosivo_zona_dpa = document.getElementById('update-ipt-docExplosivo-zona-dPa');
const ipt_update_docExplosivo_dis_dpa = document.getElementById('update-ipt-docExplosivo-dis-dPa');
const ipt_update_docExplosivo_pro_dpa = document.getElementById('update-ipt-docExplosivo-pro-dPa');
const ipt_update_docExplosivo_dep_dpa = document.getElementById('update-ipt-docExplosivo-dep-dPa');
const ipt_update_docExplosivo_NombreRazon_remitente = document.getElementById('update-ipt-docExplosivo-nombres_razonSocial-remitente');
const ipt_update_docExplosivo_ruc_remitente = document.getElementById('update-ipt-docExplosivo-ruc-remitente');
const ipt_update_docExplosivo_viaTipo_dll = document.getElementById('update-ipt-docExplosivo-viaTipo-dLL');
const ipt_update_docExplosivo_viaNombre_dll = document.getElementById('update-ipt-docExplosivo-viaNombre-dLL');
const ipt_update_docExplosivo_n_dll = document.getElementById('update-ipt-docExplosivo-n-dLL');
const ipt_update_docExplosivo_int_dll = document.getElementById('update-ipt-docExplosivo-int-dLL');
const ipt_update_docExplosivo_zona_dll = document.getElementById('update-ipt-docExplosivo-zona-dLL');
const ipt_update_docExplosivo_dis_dll = document.getElementById('update-ipt-docExplosivo-dis-dLL');
const ipt_update_docExplosivo_pro_dll = document.getElementById('update-ipt-docExplosivo-pro-dLL');
const ipt_update_docExplosivo_dep_dll = document.getElementById('update-ipt-docExplosivo-dep-dLL');
const ipt_update_docExplosivo_NombreRazon_destinatario = document.getElementById('update-ipt-docExplosivo-nombres_razonSocial-destinatario');
const ipt_update_docExplosivo_ruc_destinatario = document.getElementById('update-ipt-docExplosivo-ruc-destinatario');

const mbtnAdd_update_docExplosivo_listExplosivo = document.getElementById('update-mbtn-add-docExplosivo-listExplosivo');
const mbtn_update_insert_docExplosivo = document.getElementById('mbtn-update-docExplosivo');
const mbtn_update_close_docExplosivo = document.getElementById('mbtn-update-docExplosivo');


const fragmentUpdate_nombre = document.createDocumentFragment();
const fragmentUpdate_Codigo = document.createDocumentFragment();




document.addEventListener('DOMContentLoaded', e => {
    mainEvents_docExplosivos();
    // Crear
    tb_docExplosivo = $('#table-master-docExplosivos').DataTable({
        columns: [
            {
                data: "id_explosivoIngreso",
                responsivePriority: 1,
            },
            {
                data: "explosivoIngreso_nDocumento",
            },
            {
                data: "explosivoIngreso_NombreRazon_remitente",
            },
            {
                data: "explosivoIngreso_NombreRazon_destinatario",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tbM-docExplosivo-read"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tbM-docExplosivo-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tbM-docExplosivo-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
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
                    mainEvents_docExplosivos();
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
                text: '<i class="btn-label fa fa-file-excel-o"></i><span class="hidden-xs"> Excel +</span>',
                    className: 'btn btn-primary', //Primary class for all buttons
                tag: 'a',
                action: function(e, dt, node, config) {
                    //This will send the page to the location specified
                    window.location.href = './../../excelGenerator.php?table=view_explosivo_ingreso';
                },
                init: function(dt, node, config) {
                    $(node).attr('href', './../../excelGenerator.php?table=view_explosivo_ingreso');
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

    // Actualización
    tb_update_master_docExplosivo = $('#update-tb-docExplosivos-listExplosivos').DataTable({
        columns: [
            {
                data: "id_explosivo",
            },
            {
                data: "explosivo_codigo",
            },
            {
                data: "explosivo_descripcion",
            },
            {
                data: "explosivo_unidadMedida",
            },
            {
                data: "explosivoIngreso_cantidad",
            },
            {
                defaultContent: '<button class="btn btn-danger removeRow">Eliminar</button>',
            }
        ]
    });
    tb_update_master_docExplosivo.columns(0).visible(false);

    // Vista
    tb_read_master_docExplosivo = $('#read-tb-docExplosivos-listExplosivos').DataTable({
        columns: [
            {
                data: "explosivo_codigo",
            },
            {
                data: "explosivo_descripcion",
            },
            {
                data: "explosivo_unidadMedida",
            },
            {
                data: "explosivoIngreso_cantidad",
            },            
        ]
    });

});
const mainEvents_docExplosivos = () => {
    let formList = {
        "accion": "table_master_docExplosivos",
    }
    fetchTable_docExplosivos(formList);   
}

// Hacemos la Peticion
const fetchTable_docExplosivos = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerDocExplosivoList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_docExplosivos(rptSQL);
}

// Se pinta DataList
const paintTable_docExplosivos = data => {
    tb_docExplosivo.clear();
    tb_docExplosivo.rows.add(data).draw();
};

btnAgregar_docExplosivo.addEventListener("click", (e) => {
    tb_explosivosList = $('#insert-tb-docExplosivos-listExplosivos').DataTable();
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "dtl-getNombre-getCodigo_explosivo",
    }
    // Enviamos formulario
    fetchNombreCodigo_docExplosivos(form_request1);
    tb_explosivosList.columns(0).visible(false);
});

// Hacemos la Peticion
const fetchNombreCodigo_docExplosivos = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerExplosivoList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_NombreCodigo_docExplosivos(rptSQL);
}

// Se pinta DataList
const paintDtl_NombreCodigo_docExplosivos = data => {

    dtl_docExplosivos_nombre.innerHTML = '';
    dtl_docExplosivos_codigo.innerHTML = '';
    data.forEach(item => {
        tpe_docExplosivos_nombre.querySelector('option').textContent = item.explosivo_descripcion;
        tpe_docExplosivos_nombre.querySelector('option').value = item.explosivo_descripcion;
        tpe_docExplosivos_nombre.querySelector('option').dataset.idExplosivo = item.id_explosivo;
        tpe_docExplosivos_codigo.querySelector('option').textContent = item.explosivo_codigo;
        tpe_docExplosivos_codigo.querySelector('option').value = item.explosivo_codigo;
        tpe_docExplosivos_codigo.querySelector('option').dataset.idExplosivo = item.id_explosivo;
        const cloneNombre = tpe_docExplosivos_nombre.cloneNode(true);
        const cloneCodigo = tpe_docExplosivos_codigo.cloneNode(true);
        fragmentNombre.appendChild(cloneNombre)
        fragmentCodigo.appendChild(cloneCodigo)
    });
    dtl_docExplosivos_nombre.appendChild(fragmentNombre);
    dtl_docExplosivos_codigo.appendChild(fragmentCodigo);
};

mbtnAdd_docExplosivo_listExplosivo.addEventListener("click", (e) => {
    let val_codigo = iptAdd_docExplosivos_codigo.value;
    let val_explosivoId = document.querySelector("#addDetail-dt-docExplosivo-explosivoCodigo"  + " option[value='" +  val_codigo + "']").dataset.idExplosivo;
    let val_explosivoCodigo = iptAdd_docExplosivos_codigo.value;
    let val_explosivoNombre = iptAdd_docExplosivos_nombre.value;
    let val_explosivoUnidadMedida = iptAdd_docExplosivos_unidadMedida.value;
    let val_explosivoCantiad = iptAdd_docExplosivos_cantidad.value;
    tb_explosivosList.row.add([
        val_explosivoId,
        val_explosivoCodigo,
        val_explosivoNombre,
        val_explosivoUnidadMedida,
        val_explosivoCantiad,
        '<button class="btn btn-danger removeRow">Eliminar</button>'
    ]).draw(false);
});

iptAdd_docExplosivos_nombre.addEventListener("input", (e) => {
    try {
        let val_nombre = iptAdd_docExplosivos_nombre.value;
        if(val_nombre){
            let val_explosivoId = document.querySelector("#addDetail-dt-docExplosivo-explosivoNombre"  + " option[value='" +  val_nombre + "']").dataset.idExplosivo;
            if (val_explosivoId) {
                
                let selectForm1 = {
                    "accion": "getColumnWhere",
                    "column": "explosivo_codigo",
                    "paramentWhere": val_explosivoId,
                }
                getCodigo_nombre_explosivo(selectForm1)
            } else {
                iptAdd_docExplosivos_codigo.value = '';
                iptAdd_docExplosivos_unidadMedida.value = '';
            }
        }
        else{
            iptAdd_docExplosivos_codigo.value = '';
            iptAdd_docExplosivos_unidadMedida.value = '';
        }
        
    } catch (error) {
        iptAdd_docExplosivos_codigo.value = '';
        iptAdd_docExplosivos_unidadMedida.value = '';
    }
});

const getCodigo_nombre_explosivo = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintDtl_codigo_nombre(rptSql);
}

const paintDtl_codigo_nombre = (rptSql) => {
    iptAdd_docExplosivos_codigo.value = rptSql[0].explosivo_codigo;
    iptAdd_docExplosivos_unidadMedida.value = rptSql[0].explosivo_unidadMedida;
}

iptAdd_docExplosivos_codigo.addEventListener("input", (e) => {
    try {
        let val_codigo = iptAdd_docExplosivos_codigo.value;
        if(val_codigo){
            let val_explosivoId = document.querySelector("#addDetail-dt-docExplosivo-explosivoCodigo"  + " option[value='" +  val_codigo + "']").dataset.idExplosivo;
            if (val_explosivoId) {
                
                let selectForm1 = {
                    "accion": "getColumnWhere",
                    "column": "explosivo_descripcion",
                    "paramentWhere": val_explosivoId,
                }
                getNombre_codigo_explosivo(selectForm1);
            } else {
                iptAdd_docExplosivos_nombre.value = '';
                iptAdd_docExplosivos_unidadMedida.value = '';
            }
        }
        else{
            iptAdd_docExplosivos_nombre.value = '';
            iptAdd_docExplosivos_unidadMedida.value = '';
        }
        
    } catch (error) {
        iptAdd_docExplosivos_nombre.value = '';
        iptAdd_docExplosivos_unidadMedida.value = '';
    }
});

const getNombre_codigo_explosivo = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintDtl_nombre_codigo(rptSql);
}

const paintDtl_nombre_codigo = (rptSql) => {
    iptAdd_docExplosivos_nombre.value = rptSql[0].explosivo_descripcion;
    iptAdd_docExplosivos_unidadMedida.value = rptSql[0].explosivo_unidadMedida;
}

$('#insert-tb-docExplosivos-listExplosivos').on('click', '.removeRow', function() {
    tb_explosivosList.row($(this).parents('tr')).remove().draw();
});

$('#update-tb-docExplosivos-listExplosivos').on('click', '.removeRow', function() {
    tb_update_master_docExplosivo.row($(this).parents('tr')).remove().draw();
});

mbtn_new_docExplosivo.addEventListener("click", (e) => {

});

mbtn_close_docExplosivo.addEventListener("click", (e) => {
    resetForm_docExplosivo();
});

mbtn_insert_docExplosivo.addEventListener("click", (e) => {
    let listDetalles = [];
    let array_noti_error = [];
    let val_docExplosivo_NumeroDoc = ipt_insert_docExplosivos_numeroDoc.value;
    val_docExplosivo_NumeroDoc ? val_docExplosivo_NumeroDoc = val_docExplosivo_NumeroDoc : array_noti_error.push("Ingresar N° Documento");
    let val_docExplosivo_viaTipo_dPa = ipt_insert_docExplosivos_viaTipo_dPa.value;
    let val_docExplosivo_viaNombre_dPa = ipt_insert_docExplosivos_viaNombre_dPa.value;
    let val_docExplosivo_n_dPa = ipt_insert_docExplosivos_n_dPa.value;
    let val_docExplosivo_int_dPa = ipt_insert_docExplosivos_int_dPa.value;
    let val_docExplosivo_zona_dPa = ipt_insert_docExplosivos_zona_dPa.value;
    let val_docExplosivo_dis_dPa = ipt_insert_docExplosivos_dis_dPa.value;
    let val_docExplosivo_pro_dPa = ipt_insert_docExplosivos_pro_dPa.value;
    let val_docExplosivo_dep_dPa = ipt_insert_docExplosivos_dep_dPa.value;
    let val_docExplosivo_RazonSocial_rem = ipt_insert_docExplosivos_RazonSocial_rem.value;
    let val_docExplosivo_ruc_rem = ipt_insert_docExplosivos_ruc_rem.value;
    let val_docExplosivo_viaTipo_dLL = ipt_insert_docExplosivos_viaTipo_dLL.value;
    let val_docExplosivo_viaNombre_dLL = ipt_insert_docExplosivos_viaNombre_dLL.value;
    let val_docExplosivo_n_dLL = ipt_insert_docExplosivos_n_dLL.value;
    let val_docExplosivo_int_dLL = ipt_insert_docExplosivos_int_dLL.value;
    let val_docExplosivo_zona_dLL = ipt_insert_docExplosivos_zona_dLL.value;
    let val_docExplosivo_dis_dLL = ipt_insert_docExplosivos_dis_dLL.value;
    let val_docExplosivo_pro_dLL = ipt_insert_docExplosivos_pro_dLL.value;
    let val_docExplosivo_dep_dLL = ipt_insert_docExplosivos_dep_dLL.value;
    let val_docExplosivo_RazonSocial_des = ipt_insert_docExplosivos_RazonSocial_des.value;
    let val_docExplosivo_ruc_des = ipt_insert_docExplosivos_ruc_des.value;
    
    let form_detalle = tb_explosivosList.rows().data();
    form_detalle.length > 0 ? form_detalle = form_detalle : array_noti_error.push("Ingresar Explosivos");
    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-insert-docExplosivo',
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
            'modal': 'alerts-form-insert-docExplosivo'
        }
        alerts(paramentNoti);
    }
    else{
        let f = form_detalle;
        for (let i = 0; f.length > i; i++) {
            let n = f[i].length;
            listDetalles.push({
                idExplosivo: f[i][0],
                cantidad: f[i][4],
            });
        }
        let listInsert = {
            "nDoc": val_docExplosivo_NumeroDoc,
            "viaTipo_dPa": val_docExplosivo_viaTipo_dPa,
            "viaNombre_dPa": val_docExplosivo_viaNombre_dPa,
            "n_dPa": val_docExplosivo_n_dPa,
            "int_dPa": val_docExplosivo_int_dPa,
            "zona_dPa": val_docExplosivo_zona_dPa,
            "dis_dPa": val_docExplosivo_dis_dPa,
            "pro_dPa": val_docExplosivo_pro_dPa,
            "dep_dPa": val_docExplosivo_dep_dPa,
            "RazonSocial_rem": val_docExplosivo_RazonSocial_rem,
            "ruc_rem": val_docExplosivo_ruc_rem,
            "viaTipo_dLL": val_docExplosivo_viaTipo_dLL,
            "viaNombre_dLL": val_docExplosivo_viaNombre_dLL,
            "n_dLL": val_docExplosivo_n_dLL,
            "int_dLL": val_docExplosivo_int_dLL,
            "zona_dLL": val_docExplosivo_zona_dLL,
            "dis_dLL": val_docExplosivo_dis_dLL,
            "pro_dL": val_docExplosivo_pro_dLL,
            "dep_dL": val_docExplosivo_dep_dLL,
            "RazonSocial_de": val_docExplosivo_RazonSocial_des,
            "ruc_de": val_docExplosivo_ruc_des,
            "detalles": listDetalles
        }
        let form_insert = {
            "accion": "insert",
            "form": listInsert
        }
        recordForm_docExplosivo(form_insert);
    }
});

const recordForm_docExplosivo = async (listInsert) => {
    const body = new FormData();
    body.append("data", JSON.stringify(listInsert));
    const res = await fetch('./../../../controllers/controllerDocExplosivo.php', {
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
                container: '#alerts-form-insert-docExplosivo',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql1']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if (rptSql['sql2']['estado'] == 1) {
            $.niftyNoty({
                type: 'success',
                container: '#alerts-form-insert-docExplosivo',
                html: '<strong>¡Bien hecho!</strong> ' + rptSql['sql2']['mensaje'],
                focus: false,
                timer: 5000
            });
        }
        if( rptSql['sql1']['estado'] == 1 | rptSql['sql2']['estado'] == 1){
            //tb_explosivosList.clear().draw();
        }
    }
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

const resetForm_docExplosivo = () => {
    mainEvents_consumoMadera();
    ipt_insert_docExplosivos_numeroDoc.value = '';
    ipt_insert_docExplosivos_viaTipo_dPa.value = '';
    ipt_insert_docExplosivos_viaNombre_dPa.value = '';
    ipt_insert_docExplosivos_n_dPa.value = '';
    ipt_insert_docExplosivos_int_dPa.value = '';
    ipt_insert_docExplosivos_zona_dPa.value = '';
    ipt_insert_docExplosivos_dis_dPa.value = '';
    ipt_insert_docExplosivos_pro_dPa.value = '';
    ipt_insert_docExplosivos_dep_dPa.value = '';
    ipt_insert_docExplosivos_RazonSocial_rem.value = '';
    ipt_insert_docExplosivos_ruc_rem.value = '';
    ipt_insert_docExplosivos_viaTipo_dLL.value = '';
    ipt_insert_docExplosivos_viaNombre_dLL.value = '';
    ipt_insert_docExplosivos_n_dLL.value = '';
    ipt_insert_docExplosivos_int_dLL.value = '';
    ipt_insert_docExplosivos_zona_dLL.value = '';
    ipt_insert_docExplosivos_dis_dLL.value = '';
    ipt_insert_docExplosivos_pro_dLL.value = '';
    ipt_insert_docExplosivos_dep_dLL.value = '';
    ipt_insert_docExplosivos_RazonSocial_des.value = '';
    ipt_insert_docExplosivos_ruc_des.value = '';
}

//* EDITAR REGISTRO
$('#table-master-docExplosivos tbody').on('click', '.btn-tbM-docExplosivo-edit', function() {

    $("#docExplosivo-lg-modal-update").modal("show");
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "dtl-getNombre-getCodigo_explosivo",
    }
    // Enviamos formulario
    fetchNombreCodigo_edit_docExplosivos(form_request1);
    let data = tb_docExplosivo.row($(this).parents('tr')).data();
    let form_request = {
        "accion": "getRow",
        "id": data['id_explosivoIngreso']
    }
    getRowUpdate_docExplosivo(form_request);
});

mbtnAdd_update_docExplosivo_listExplosivo.addEventListener("click", (e) => {
    let val_codigo = ipt_update_docExplosivos_codigo.value;
    let val_explosivoId = document.querySelector("#update-addDetail-dt-docExplosivo-explosivoCodigo"  + " option[value='" +  val_codigo + "']").dataset.idExplosivo;
    console.log(val_explosivoId);
    let val_explosivoCodigo = ipt_update_docExplosivos_codigo.value;
    let val_explosivoNombre = ipt_update_docExplosivos_nombre.value;
    let val_explosivoUnidadMedida = iptAdd_update_docExplosivos_unidadMedida.value;
    let val_explosivoCantiad = iptAdd_update_docExplosivos_cantidad.value;
    console.log(val_explosivoCantiad);
    /* tb_update_master_docExplosivo.row.add([
        val_explosivoId,
        val_explosivoCodigo,
        val_explosivoNombre,
        val_explosivoUnidadMedida,
        val_explosivoCantiad,
        'hoo',
    ]).draw(false); */
});

const getRowUpdate_docExplosivo = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerDocExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    rptSql = data['sql'];
    paintForm_update_docExplosivo(rptSql)
}

const paintForm_update_docExplosivo = rptSql => {
    if(rptSql){
        ipt_update_docExplosivo_numeroDoc.value = rptSql[0]['explosivoIngreso_nDocumento'];
        ipt_update_docExplosivo_viaTipo_dpa.value = rptSql[0]['explosivoIngreso_viaTipo_direccionPartida'];
        ipt_update_docExplosivo_viaNombre_dpa.value = rptSql[0]['explosivoIngreso_viaNombre_direccionPartida'];
        ipt_update_docExplosivo_n_dpa.value = rptSql[0]['explosivoIngreso_n_direccionPartida'];
        ipt_update_docExplosivo_int_dpa.value = rptSql[0]['explosivoIngreso_interior_direccionPartida'];
        ipt_update_docExplosivo_zona_dpa.value = rptSql[0]['explosivoIngreso_zona_direccionPartida'];
        ipt_update_docExplosivo_dis_dpa.value = rptSql[0]['explosivoIngreso_distrito_direccionPartida'];
        ipt_update_docExplosivo_pro_dpa.value = rptSql[0]['explosivoIngreso_provincia_direccionPartida'];
        ipt_update_docExplosivo_dep_dpa.value = rptSql[0]['explosivoIngreso_departamento_direccionPartida'];
        ipt_update_docExplosivo_NombreRazon_remitente.value = rptSql[0]['explosivoIngreso_NombreRazon_remitente'];
        ipt_update_docExplosivo_ruc_remitente.value = rptSql[0]['explosivoIngreso_ruc_remitente'];
        ipt_update_docExplosivo_viaTipo_dll.value = rptSql[0]['explosivoIngreso_viaTipo_direccionLlegada'];
        ipt_update_docExplosivo_viaNombre_dll.value = rptSql[0]['explosivoIngreso_viaNombre_direccionLlegada'];
        ipt_update_docExplosivo_n_dll.value = rptSql[0]['explosivoIngreso_n_direccionLlegada'];
        ipt_update_docExplosivo_int_dll.value = rptSql[0]['explosivoIngreso_interior_direccionLlegada'];
        ipt_update_docExplosivo_zona_dll.value = rptSql[0]['explosivoIngreso_zona_direccionLlegada'];
        ipt_update_docExplosivo_dis_dll.value = rptSql[0]['explosivoIngreso_distrito_direccionLlegada'];
        ipt_update_docExplosivo_pro_dll.value = rptSql[0]['explosivoIngreso_provincia_direccionLlegada'];
        ipt_update_docExplosivo_dep_dll.value = rptSql[0]['explosivoIngreso_departamento_direccionLlegada'];
        ipt_update_docExplosivo_NombreRazon_destinatario.value = rptSql[0]['explosivoIngreso_NombreRazon_destinatario'];
        ipt_update_docExplosivo_ruc_destinatario.value = rptSql[0]['explosivoIngreso_ruc_destinatario'];

        tb_update_master_docExplosivo.clear();
        tb_update_master_docExplosivo.row.add(rptSql).draw();
    }
    else{
        ipt_update_docExplosivo_numeroDoc.value = '-';
        ipt_update_docExplosivo_viaTipo_dpa.value = '-';
        ipt_update_docExplosivo_viaNombre_dpa.value = '-';
        ipt_update_docExplosivo_n_dpa.value = '-';
        ipt_update_docExplosivo_int_dpa.value = '-';
        ipt_update_docExplosivo_zona_dpa.value = '-';
        ipt_update_docExplosivo_dis_dpa.value = '-';
        ipt_update_docExplosivo_pro_dpa.value = '-';
        ipt_update_docExplosivo_dep_dpa.value = '-';
        ipt_update_docExplosivo_NombreRazon_remitente.value = '-';
        ipt_update_docExplosivo_ruc_remitente.value = '-';
        ipt_update_docExplosivo_viaTipo_dll.value = '-';
        ipt_update_docExplosivo_viaNombre_dll.value = '-';
        ipt_update_docExplosivo_n_dll.value = '-';
        ipt_update_docExplosivo_int_dll.value = '-';
        ipt_update_docExplosivo_zona_dll.value = '-';
        ipt_update_docExplosivo_dis_dll.value = '-';
        ipt_update_docExplosivo_pro_dll.value = '-';
        ipt_update_docExplosivo_dep_dll.value = '-';
        ipt_update_docExplosivo_NombreRazon_destinatario.value = '-';
        ipt_update_docExplosivo_ruc_destinatario.value = '-';
    }
}

ipt_update_docExplosivos_nombre.addEventListener("input", (e) => {
    try {
        let val_codigo = ipt_update_docExplosivos_nombre.value;
        if(val_codigo){
            let val_explosivoId = document.querySelector("#update-addDetail-dt-docExplosivo-explosivoNombre"  + " option[value='" +  val_codigo + "']").dataset.idExplosivo;
            if (val_explosivoId) {
                let selectForm1 = {
                    "accion": "getColumnWhere",
                    "column": "explosivo_codigo",
                    "paramentWhere": val_explosivoId,
                }
                getCodigo_nombre_update_explosivo(selectForm1);
            } else {
                ipt_update_docExplosivos_codigo.value = '';
                iptAdd_update_docExplosivos_unidadMedida.value = '';
            }
        }
        else{
            ipt_update_docExplosivos_codigo.value = '';
            iptAdd_update_docExplosivos_unidadMedida.value = '';
        }
        
    } catch (error) {
        ipt_update_docExplosivos_codigo.value = '';
        iptAdd_update_docExplosivos_unidadMedida.value = '';
    }
});
const getCodigo_nombre_update_explosivo = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarCodigo_update_explosivo(rptSql);
}

const pintarCodigo_update_explosivo = (rptSql) => {
    ipt_update_docExplosivos_codigo.value = rptSql[0].explosivo_codigo;
    iptAdd_update_docExplosivos_unidadMedida.value = rptSql[0].explosivo_unidadMedida;
}


ipt_update_docExplosivos_codigo.addEventListener("input", (e) => {
    try {
        let val_codigo = ipt_update_docExplosivos_codigo.value;
        if(val_codigo){
            let val_explosivoId = document.querySelector("#update-addDetail-dt-docExplosivo-explosivoCodigo"  + " option[value='" +  val_codigo + "']").dataset.idExplosivo;
            if (val_explosivoId) {
                let selectForm1 = {
                    "accion": "getColumnWhere",
                    "column": "explosivo_descripcion",
                    "paramentWhere": val_explosivoId,
                }
                getNombre_codigo_update_explosivo(selectForm1);
            } else {
                ipt_update_docExplosivos_nombre.value = '';
                iptAdd_update_docExplosivos_unidadMedida.value = '';
            }
        }
        else{
            ipt_update_docExplosivos_nombre.value = '';
            iptAdd_update_docExplosivos_unidadMedida.value = '';
        }
        
    } catch (error) {
        ipt_update_docExplosivos_nombre.value = '';
        iptAdd_update_docExplosivos_unidadMedida.value = '';
    }
});

const getNombre_codigo_update_explosivo = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarNombre_update_explosivo(rptSql);
}

const pintarNombre_update_explosivo = (rptSql) => {
    ipt_update_docExplosivos_nombre.value = rptSql[0].explosivo_descripcion;
    iptAdd_update_docExplosivos_unidadMedida.value = rptSql[0].explosivo_unidadMedida;
}

// Hacemos la Peticion
const fetchNombreCodigo_edit_docExplosivos = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerDocExplosivoList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtlNombreCodigo_docExplosivos_update(rptSQL);
}

// Se pinta DataList CENTRO COSTOS --- UPDATE
const paintDtlNombreCodigo_docExplosivos_update = data => {
    dtl_update_docExplosivos_nombre.innerHTML = '';
    dtl_update_docExplosivos_codigo.innerHTML = '';
    data.forEach(item => {
        tpe_update_docExplosivos_nombre.querySelector('option').textContent = item.explosivo_descripcion;
        tpe_update_docExplosivos_nombre.querySelector('option').value = item.explosivo_descripcion;
        tpe_update_docExplosivos_nombre.querySelector('option').dataset.idExplosivo = item.id_explosivo;

        tpe_update_docExplosivos_codigo.querySelector('option').textContent = item.explosivo_codigo;
        tpe_update_docExplosivos_codigo.querySelector('option').value = item.explosivo_codigo;
        tpe_update_docExplosivos_codigo.querySelector('option').dataset.idExplosivo = item.id_explosivo;

        const cloneNombre = tpe_update_docExplosivos_nombre.cloneNode(true);
        const cloneCodigo = tpe_update_docExplosivos_codigo.cloneNode(true);

        fragmentUpdate_nombre.appendChild(cloneNombre)
        fragmentUpdate_Codigo.appendChild(cloneCodigo)
    });
    dtl_update_docExplosivos_nombre.appendChild(fragmentUpdate_nombre);
    dtl_update_docExplosivos_codigo.appendChild(fragmentUpdate_Codigo);
};

//* VISTA REGISTRO
$('#table-master-docExplosivos tbody').on('click', '.btn-tbM-docExplosivo-read', function() {
    $("#docExplosivo-lg-modal-read").modal("show");
    let data = tb_docExplosivo.row($(this).parents('tr')).data();
    let form_request = {
        "accion": "getRow",
        "id": data['id_explosivoIngreso']
    }
    getRowView_docExplosivo(form_request);
});

const getRowView_docExplosivo = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerDocExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json();
    rptSql = data['sql'];
    paintForm_view_docExplosivo(rptSql)
}

const paintForm_view_docExplosivo = (rptSql) => {
    if(rptSql){
        ipt_read_docExplosivo_numeroDoc.value = rptSql[0]['explosivoIngreso_nDocumento'];
        ipt_read_docExplosivo_viaTipo_dpa.value = rptSql[0]['explosivoIngreso_viaTipo_direccionPartida'];
        ipt_read_docExplosivo_viaNombre_dpa.value = rptSql[0]['explosivoIngreso_viaNombre_direccionPartida'];
        ipt_read_docExplosivo_n_dpa.value = rptSql[0]['explosivoIngreso_n_direccionPartida'];
        ipt_read_docExplosivo_int_dpa.value = rptSql[0]['explosivoIngreso_interior_direccionPartida'];
        ipt_read_docExplosivo_zona_dpa.value = rptSql[0]['explosivoIngreso_zona_direccionPartida'];
        ipt_read_docExplosivo_dis_dpa.value = rptSql[0]['explosivoIngreso_distrito_direccionPartida'];
        ipt_read_docExplosivo_pro_dpa.value = rptSql[0]['explosivoIngreso_provincia_direccionPartida'];
        ipt_read_docExplosivo_dep_dpa.value = rptSql[0]['explosivoIngreso_departamento_direccionPartida'];
        ipt_read_docExplosivo_NombreRazon_remitente.value = rptSql[0]['explosivoIngreso_NombreRazon_remitente'];
        ipt_read_docExplosivo_ruc_remitente.value = rptSql[0]['explosivoIngreso_ruc_remitente'];
        ipt_read_docExplosivo_viaTipo_dll.value = rptSql[0]['explosivoIngreso_viaTipo_direccionLlegada'];
        ipt_read_docExplosivo_viaNombre_dll.value = rptSql[0]['explosivoIngreso_viaNombre_direccionLlegada'];
        ipt_read_docExplosivo_n_dll.value = rptSql[0]['explosivoIngreso_n_direccionLlegada'];
        ipt_read_docExplosivo_int_dll.value = rptSql[0]['explosivoIngreso_interior_direccionLlegada'];
        ipt_read_docExplosivo_zona_dll.value = rptSql[0]['explosivoIngreso_zona_direccionLlegada'];
        ipt_read_docExplosivo_dis_dll.value = rptSql[0]['explosivoIngreso_distrito_direccionLlegada'];
        ipt_read_docExplosivo_pro_dll.value = rptSql[0]['explosivoIngreso_provincia_direccionLlegada'];
        ipt_read_docExplosivo_dep_dll.value = rptSql[0]['explosivoIngreso_departamento_direccionLlegada'];
        ipt_read_docExplosivo_NombreRazon_destinatario.value = rptSql[0]['explosivoIngreso_NombreRazon_destinatario'];
        ipt_read_docExplosivo_ruc_destinatario.value = rptSql[0]['explosivoIngreso_ruc_destinatario'];

        tb_read_master_docExplosivo.clear();
        tb_read_master_docExplosivo.rows.add(rptSql).draw();
    }
    else{
        ipt_read_docExplosivo_numeroDoc.value = '-';
        ipt_read_docExplosivo_viaTipo_dpa.value = '-';
        ipt_read_docExplosivo_viaNombre_dpa.value = '-';
        ipt_read_docExplosivo_n_dpa.value = '-';
        ipt_read_docExplosivo_int_dpa.value = '-';
        ipt_read_docExplosivo_zona_dpa.value = '-';
        ipt_read_docExplosivo_dis_dpa.value = '-';
        ipt_read_docExplosivo_pro_dpa.value = '-';
        ipt_read_docExplosivo_dep_dpa.value = '-';
        ipt_read_docExplosivo_NombreRazon_remitente.value = '-';
        ipt_read_docExplosivo_ruc_remitente.value = '-';
        ipt_read_docExplosivo_viaTipo_dll.value = '-';
        ipt_read_docExplosivo_viaNombre_dll.value = '-';
        ipt_read_docExplosivo_n_dll.value = '-';
        ipt_read_docExplosivo_int_dll.value = '-';
        ipt_read_docExplosivo_zona_dll.value = '-';
        ipt_read_docExplosivo_dis_dll.value = '-';
        ipt_read_docExplosivo_pro_dll.value = '-';
        ipt_read_docExplosivo_dep_dll.value = '-';
        ipt_read_docExplosivo_NombreRazon_destinatario.value = '-';
        ipt_read_docExplosivo_ruc_destinatario.value = '-';
    }
}

//* ELIMINAR REGISTRO
$('#table-master-docExplosivos tbody').on('click', '.btn-tbM-docExplosivo-delet', function() {
    mainEvents_docExplosivos()
    var data = tb_docExplosivo.row($(this).parents('tr')).data();
    swal({
        title: "Estas seguro?",
        text: "Una vez eliminado, no podrá recuperarlo!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            let form_request = {
                "accion": "delete",
                "id": data['id_explosivoIngreso']
            }
            var rptSql = requestDelete_docExplosivo(form_request);
            swal("¡La información ha sido eliminado!" + rptSql['sql1'], {
                icon: "success",
            });
        } else {
            swal("¡La información está a salvo!");
        }
    });
});

// Se envia Formulario
const requestDelete_docExplosivo = async (form_request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form_request));
    const returned = await fetch("./../../../controllers/controllerDocExplosivo.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    return result['sql'];
}