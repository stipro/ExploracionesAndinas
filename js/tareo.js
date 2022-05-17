/*  CREATE  */
const create_tareo_agregar = document.getElementById('btn-tareo-agregar');
const create_tareo_mbtnInsert = document.getElementById('create-tareo-mbtnInsert');
const create_tareo_mbtnNew = document.getElementById('create-tareo-mbtnNew');
const create_tareo_mbtnClose = document.getElementById('create-tareo-mbtnClose');
// Personal
const create_ipt_tareo_nTarjeta = document.getElementById('create-ipt-tareo-nTarjeta');
const create_ipt_tareo_dni = document.getElementById('create-ipt-tareo-dni');
const create_dtl_tareo_dni = document.getElementById('dtl-create-insert-dtl-tareo-dni');
const tpt_tareo_dni = document.getElementById('tpt-tareo-dni').content;

const create_ipt_tareo_nombre = document.getElementById('create-ipt-tareo-nombre');
const create_ipt_tareo_cargo = document.getElementById('create-ipt-tareo-cargo');
const create_ipt_tareo_area = document.getElementById('create-ipt-tareo-area');
// Datos
const create_ipt_tareo_dia = document.getElementById('create-ipt-tareo-dia');
const create_ipt_tareo_turno = document.getElementById('create-ipt-tareos-turno');
const create_ipt_tareo_guardia = document.getElementById('create-ipt-tareo-guardia');
const create_ipt_tareo_nActividad = document.getElementById('create-ipt-tareo-nActividad');
// Centro Costos
const create_ipt_tareo_codZona = document.getElementById('create-ipt-tareo-codZona');
const create_dtl_tareo_codZona = document.getElementById('dtl-create-insert-dtl-tareo-codZona');
const tpt_tareo_codZona = document.getElementById('tpt-tareo-codZona').content;

const create_ipt_tareo_centCostos = document.getElementById('create-ipt-tareo-centCostos');
const create_dtl_tareo_codZona = document.getElementById('dtl-create-insert-dtl-tareo-cenCostos');
const tpt_tareo_codZona = document.getElementById('tpt-tareo-cenCostos').content;

const create_ipt_tareo_zona = document.getElementById('create-ipt-tareo-zona');
const create_ipt_tareo_labor = document.getElementById('create-ipt-tareo-labor');
const create_ipt_tareo_nivel = document.getElementById('create-ipt-tareo-nivel');
// Actividad
const create_ipt_tareo_he = document.getElementById('create-ipt-tareo-he');
const create_ipt_tareo_htSeAd = document.getElementById('create-ipt-tareo-htSeAd');
const create_ipt_tareo_heSeAd = document.getElementById('create-ipt-tareo-heSeAd');
const create_ipt_tareo_ccSeAd = document.getElementById('create-ipt-tareo-ccSeAd');
const create_ipt_tareo_ccHe = document.getElementById('create-ipt-tareo-ccHe');

document.addEventListener('DOMContentLoaded', e => {
    mainEvents();
});

const mainEvents = () => {
    let form_request1 = {
        "accion": "getTable",
    }
    fetchData_inicio(form_request1);
}

const fetchData_inicio = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerTareoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    let rptSql = data['sql'];
    //paintTable(rptSql);
}

const paintTable = async (rptSql) => {
    // Actualiza la tabla
    tableMaster.clear();
    tableMaster.rows.add(rptSql).draw();
}
tableMaster = $('#table-master').DataTable({
        scrollX: true,
        scrollCollapse: true,
        fixedColumns: {
            right: 1,
        },
        fixedHeader: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay registro Tareos",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Labores",
            "infoEmpty": "Mostrando 0 a 0 de 0 Labores",
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
        pagingType: "full_numbers",
        dom: '<"row"<"text-center col-sm-12 col-md-3"l><"col-sm-12 col-md-6 d-flex justify-content-center text-center"<"dt-buttons btn-group flex-wrap"B>><"text-center col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [
                {
                    text: '<i class="btn-label fa fa-refresh"></i><span class="hidden-xs hidden-sm">Actualizar</span>',
                    action: function(e, dt, node, conf) {
                        let form_request1 = {
                            "accion": "table",
                        }
                        fetchData(form_request1);
                    },
                    className: 'btn btn-info btn-labeled', //Primary class for all buttons
                    attr: {
                        title: 'Agregar nuevo labor',
                        id: 'btn-insert'
                    }
                },
                {
                    extend: 'collection',
                    text: '<i class="btn-label fa fa-download"></i><span class="hidden-xs hidden-sm"> Exportar</span>',
                    className: 'btn-labeled',
                    buttons: [{
                            extend: 'excel',
                            text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                            titleAttr: 'Excel',
                            title: 'Labor',
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
                    text: '<i class="btn-label fa fa-upload"></i><span class="hidden-xs hidden-sm">Importar</span>',
                    action: function(e, dt, node, conf) {
                        $("#modal-import").modal("show");
                    },
                    className: 'btn btn-primary btn-labeled', //Primary class for all buttons
                    enabled: false
                },
                {
                    extend: 'print',
                    text: '<i class="btn-label fa fa-print"></i><span class="hidden-xs  hidden-sm">print</span>',
                    titleAttr: 'PDF',
                    className: 'btn-labeled', //Primary class for all buttons
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },
                {
                    extend: 'colvis',
                    text: '<i class="btn-label fa fa-eye"></i><span class="hidden-xs hidden-sm">Mostrar / Ocultar</span>',
                    className: 'btn-labeled' //Primary class for all buttons
                },
                'refresh',

            ],
    });
create_ipt_tareo_dni.addEventListener("input", (e) => {
    try {
        let val_dni = create_ipt_tareo_dni.value;
        /* var val_idColaborador = (val_dni) ? (
            document.querySelector("#insert-dtl-consumoMadera-centroCostos"  + " option[value='" +  val_dni + "']").dataset.idLabor
        ) : ("Juice");
        console.log(beverage);
        console.log(val_dni); */
        if(val_dni){
            let form = {
                "accion": "getNameCargoArea_dni",
                "paramentWhere": val_dni,
            }
            getSearch_colaborador(form);
        }
        else{
            create_ipt_tareo_nombre.value = '';
            create_ipt_tareo_cargo.value = '';
            create_ipt_tareo_area.value = '';
        }
    } catch (error) {
        create_ipt_tareo_nombre.value = '';
        create_ipt_tareo_cargo.value = '';
        create_ipt_tareo_area.value = '';
    }
});

const getSearch_colaborador = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarIpts_colaboradores(rptSql);
}

const pintarIpts_colaboradores = (rptSql) => {
    if(rptSql.length > 0){
        create_ipt_tareo_nombre.value = rptSql[0].fullName;
        create_ipt_tareo_cargo.value = rptSql[0].cargo_nombre;
        create_ipt_tareo_area.value = rptSql[0].area_nombre;
    }
    else{
        create_ipt_tareo_nombre.value = '';
        create_ipt_tareo_cargo.value = '';
        create_ipt_tareo_area.value = '';
    }
}

create_tareo_agregar.addEventListener("click", (e) => {
    let form1 = {
        "accion": "getcolumnAll",
        "column": "col_dni"
    }
    fetchDni_tareo_create(form1);
    let form2 = {
        "accion": "getcolumnAll",
        "column": "labZona_nombre"
    }
    fetchZonas_tareo_create(form2);
    let form3 = {
        "accion": "getcolumnAll",
        "column": "lab_ccostos"
    }
    fetchCCosto_tareo_create(form3);
});

const fetchDni_tareo_create = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintDtl_Dni(rptSql);
};

const paintDtl_Dni = (rptSql) => {
    create_dtl_tareo_dni.innerHTML = '';
    rptSql.forEach(item => {
        tpt_tareo_dni.querySelector('option').textContent = item.col_dni;
        tpt_tareo_dni.querySelector('option').value = item.col_dni;
        tpt_tareo_dni.querySelector('option').dataset.idColaborador = item.id_colaborador;
        const clone = tpt_tareo_dni.cloneNode(true);
        fragment.appendChild(clone);
    });
    create_dtl_tareo_dni.appendChild();
}

const fetchZonas_tareo_create = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerZonaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintDtl_Zona(rptSql);
};

const paintDtl_Zona = (rptSql) => {
    create_dtl_tareo_codZona.innerHTML = '';
    rptSql.forEach(item => {
        tpt_tareo_codZona.querySelector('option').textContent = item.col_dni;
        tpt_tareo_codZona.querySelector('option').value = item.col_dni;
        tpt_tareo_codZona.querySelector('option').dataset.idColaborador = item.id_colaborador;
        const clone = tpt_tareo_codZona.cloneNode(true);
        fragment.appendChild(clone);
    });
    create_dtl_tareo_codZona.appendChild();
}

const fetchCCosto_tareo_create = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerColaboradorList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintDtl_CenCosto(rptSql);
};

const paintDtl_CenCosto = (rptSql) => {
    
}