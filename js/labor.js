var tableMaster = '';
document.addEventListener('DOMContentLoaded', e => {
    mainEvents();
    tableMaster = $('#table-labores').DataTable({
        columns: [{
                data: "lab_ccostos"
            },
            {
                data: "labNombre_nombre",
            },
            {
                data: "labNombre_etapa",
            },
            {
                data: "labNombre_prefijo",
            },
            {
                data: "labNombre_tipo",
            },
            {
                data: "labZona_nombre",
            },
            {
                data: "labZona_letra",
            },
            {
                data: "lab_tipo",
            },
            {
                data: "lab_veta",
            },
            {
                data: "lab_nivel",
            },
            {
                data: "lab_metodoExplotacion",
            },
            {
                data: "lab_seccion",
            },
            {
                data: "lab_tipoEq",
            },
            {
                data: "lab_tipoRoca",
            },
            {
                data: "nombre_sede",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success"><i class="fa fa-eye"></i> Detalle</button> <button type="button" class="name btn btn-primary"><i class="fa fa-edit"></i> Editar</button> <button type="button" class="position btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>'
            }
        ],
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
        pagingType: "full_numbers",
        // Indica la inicial a mostrar
        //pageLength: 5,
        dom: "<'row'<'col-md-3'l><'col-md-6'B><'col-md-3'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>",
        buttons: [{
                text: '<i class="btn-label fa-solid fa-plus"></i> Agregar',
                action: function(e, dt, node, conf) {
                    $("#modal-insert").modal("show");
                    /* var select1 = {
                        "accion": "getcolumnAll",
                        "column": "lab_ccostos"
                    }
                    var select2 = {
                        "accion": "getcolumnAll",
                        "column": "instalacionesMina_nombre"
                    }
                    fetchSelect_labor(select1);
                    fetchSelect_instalacionMina(select2); */
                },
                className: 'btn btn-success btn-labeled' //Primary class for all buttons
            },
            {
                text: '<i class="btn-label fa fa-refresh"></i> Actualizar',
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
                text: '<i class="btn-label fa fa-download"></i> Exportar',
                className: 'btn-labeled',
                buttons: [{
                        extend: 'excel',
                        text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Excel',
                        title: 'Consumo_Madera_excel',
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
                text: '<i class="btn-label fa fa-upload" ></i> Importar',
                action: function(e, dt, node, conf) {},
                className: 'btn btn-primary btn-labeled' //Primary class for all buttons
            },
            {
                extend: 'print',
                text: '<i class="btn-label fa fa-print"></i> print',
                titleAttr: 'PDF',
                className: 'btn-labeled', //Primary class for all buttons
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                }
            },
            {
                extend: 'colvis',
                text: '<i class="btn-label fa fa-eye"></i> Mostrar / Ocultar',
                className: 'btn-labeled' //Primary class for all buttons
            },
            'refresh',

        ],
    });
});

function mainEvents() {
    //$('#table-master').DataTable().clear().destroy();
    let form_request1 = {
        "accion": "table",
    }
    fetchData(form_request1);
}

const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    console.log(rptSql);
    paintTable(rptSql);
}
const paintTable = async (rptSql) => {
    // Actualiza la tabla
    tableMaster.clear();
    tableMaster.rows.add(rptSql).draw();
}