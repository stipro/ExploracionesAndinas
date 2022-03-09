var tableMaster = '';
document.addEventListener('DOMContentLoaded', e => {
    const mbtnInsert_labor = document.getElementById("mbtn-insert-labor");
    // INPUT
    const insert_labor_ccosto = document.getElementById("ipt-insert-labor-ccosto");
    const insert_labor_tipo = document.getElementById("ipt-insert-labor-tipo");
    const insert_labor_veta = document.getElementById("ipt-insert-labor-veta");
    const insert_labor_nivel = document.getElementById("ipt-insert-labor-nivel");
    const insert_labor_mexplotacion = document.getElementById("ipt-insert-labor-mexplotacion");
    const insert_labor_seccion = document.getElementById("ipt-insert-labor-seccion");
    const insert_labor_tipEq = document.getElementById("ipt-insert-labor-tipEq");
    const insert_labor_tipRocca = document.getElementById("ipt-insert-labor-tipRocca");
    // DataLists y inputs
    const insert_labor_laborName = document.getElementById("ipt-insert-labor-laborName");
    const datalist_labor_laborName = document.getElementById("datalist-insert-nombreLabor-nombre");

    const insert_labor_nameEtapa = document.getElementById("ipt-insert-labor-laborNameEtapa");
    const insert_labor_namePrefijo = document.getElementById("ipt-insert-labor-laborNamePrefijo");
    const insert_labor_nametipo = document.getElementById("ipt-insert-labor-laborNameTipo");


    const insert_labor_zoneName = document.getElementById("ipt-insert-labor-laborZona");
    const insert_labor_zoneLetra = document.getElementById("ipt-insert-letra-laborZonaLetra");
    const datalist_labor_laborZone = document.getElementById("datalist-insert-zonaLabor-zona");
    const insert_labor_unitMining = document.getElementById("ipt-insert-unitMining-nombre");
    const datalist_labor_unitMining = document.getElementById("datalist-insert-labor-unitMining");
    const insert_labor_unitMiningAbrev = document.getElementById("ipt-insert-unitMining-abrev");


    const madd_labor = document.getElementById("add-labor");
    const madd_zona = document.getElementById("add-zona");
    // Nombre de Zona
    // Boones
    const mbtnInsert_laborZone = document.getElementById("mbtn-insert-laborZone");
    // input
    const insert_laborZone_zona = document.getElementById("input-insert-laborNombreZone-zona");
    const insert_laborZone_letra = document.getElementById("input-insert-laborNombreZone-letra");
    // Nombre de Labor
    // Botones
    const mbtnInsert_laborName = document.getElementById("mbtn-insert-laborName");
    const mbtnNew_laborName = document.getElementById("mbtn-new-laborName");
    const mbtnClose_laborName = document.getElementById("mbtn-close-laborName");
    // input
    const insert_laborName_labor = document.getElementById("input-insert-laborName-labor");
    const insert_laborName_etapa = document.getElementById("input-insert-laborName-etapa");
    const datalist_laborName_etapa = document.getElementById("datalist-insert-laborName-etapa");

    const insert_laborName_prefijo = document.getElementById("input-insert-laborName-prefijo");
    const insert_laborName_tipo = document.getElementById("input-insert-laborName-tipo");
    // ETAPA    
    // Botones
    const mbtnInsert_laborNameEtapa = document.getElementById("mbtn-insert-laborNameEtapa");
    const mbtnNew_laborNameEtapa = document.getElementById("mbtn-insert-laborNameEtapa");
    const mbtnClose_laborNameEtapa = document.getElementById("mbtn-close-laborNameEtapa");
    // input
    const insert_laborNameEtapa_etapa = document.getElementById("input-insert-laborNombreEtapa-etapa");
    // Unidad Minera
    const mbtnInsert_unidMinera = document.getElementById("mbtn-insert-unidMinera");
    const insert_unidMinera_nombre = document.getElementById("input-insert-unidMinera-nombre");
    const insert_unidMinera_abrev = document.getElementById("input-insert-unidMinera-abrev");

    mainEvents();
    tableMaster = $('#table-labores').DataTable({
        columns: [{
                data: "lab_ccostos"
            },
            {
                data: "labNombre_nombre",
            },
            {
                data: "nombre_etapa",
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
                data: "nombre_unidad_mineras",
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
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        pagingType: "full_numbers",
        // Indica la inicial a mostrar
        //pageLength: 5,
        /* dom: "<'row'<'col-md-3'l><'col-md-6'B><'col-md-3'f>>" +
            "<'row'<'col-md-12'tr>>" +
            "<'row'<'col-md-5'i><'col-md-7'p>>", */
        dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
                text: '<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>',
                action: function(e, dt, node, conf) {
                    const form_uno = {
                        "accion": "getLaborNombre",
                    }
                    getSelect_workName(form_uno);
                    const form_dos = {
                        "accion": "getLaborZona",
                    }
                    getSelect_workZone(form_dos);
                    const form_tres = {
                        "accion": "getUnidMinera",
                    }
                    getSelect_unitMining(form_tres);
                    $("#modal-insert").modal("show");

                },
                className: 'btn btn-success btn-labeled', //Primary class for all buttons
                attr: {
                    title: 'Agregar nuevo labor',
                    id: 'btn-insert'
                }
            },
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
            templateLabor_unitMining.querySelector('option').textContent = unidMinera.nombre_unidad_mineras;
            templateLabor_unitMining.querySelector('option').value = unidMinera.nombre_unidad_mineras;
            templateLabor_unitMining.querySelector('option').dataset.id = unidMinera.id_unidad_mineras;
            templateLabor_unitMining.querySelector('option').dataset.abrev = unidMinera.abrev_unidad_mineras;
            const clone = templateLabor_unitMining.cloneNode(true);;
            fragmentLabor_unitMining.appendChild(clone)
        })
        datalist_labor_unitMining.appendChild(fragmentLabor_unitMining);
    }


    // Nombre labor
    madd_labor.addEventListener("click", () => {
        const form = {
            "accion": "getLaborNombre_etapa",
        }
        getSelect_workName_etapa(form)
    })
    const getSelect_workName_etapa = async (request) => {
        const body = new FormData();
        body.append("data", JSON.stringify(request));
        const res = await fetch('./../../../controllers/controllerLaborList.php', {
            method: "POST",
            body
        });
        const data = await res.json()
        let answerSql = data['sql'];
        console.log(answerSql);
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
    mbtnInsert_labor.addEventListener("click", () => {
        const val_labor_ccostoLabor = insert_labor_ccosto.value;
        const val_labor_tipo = insert_labor_tipo.value;
        const val_labor_veta = insert_labor_veta.value;
        const val_labor_nivel = insert_labor_nivel.value;
        const val_labor_mexplotacion = insert_labor_mexplotacion.value;
        const val_labor_seccion = insert_labor_seccion.value;
        const val_labor_tipEq = insert_labor_tipEq.value;
        const val_labor_tipRocca = insert_labor_tipRocca.value;
        const val_labor_laborName_id = document.querySelector('#datalist-insert-nombreLabor-nombre option[value="' + insert_labor_laborName.value + '"]').dataset.id;
        const val_labor_laborZone_id = document.querySelector('#datalist-insert-zonaLabor-zona option[value="' + insert_labor_zoneName.value + '"]').dataset.id;
        const val_labor_unitMining_id = document.querySelector('#datalist-insert-labor-unitMining option[value="' + insert_labor_unitMining.value + '"]').dataset.id;

        const data = {
            "ccosto_labor": val_labor_ccostoLabor,
            "tipo_labor": val_labor_tipo,
            "veta_labor": val_labor_veta,
            "nivel_labor": val_labor_nivel,
            "mexplotacion_labor": val_labor_mexplotacion,
            "seccion_labor": val_labor_seccion,
            "tipoEq_labor": val_labor_tipEq,
            "tipRocca_labor": val_labor_tipRocca,
            "id_laborName": val_labor_laborName_id,
            "id_laborZone": val_labor_laborZone_id,
            "id_laborUnitMining": val_labor_unitMining_id
        }
        const form = {
            "accion": "insert-labor",
            "datos": data
        }
        console.log(form);
        insertForm_labor(form);
    })
    // Nombre de labor
    mbtnInsert_laborName.addEventListener("click", () => {
        const val_nombreLabor = insert_laborName_labor.value;
        const val_etapaLabor = insert_laborName_etapa.value;
        const val_idLaborName = insert_laborName_etapa.dataset.id;
        const val_prefijoLabor = insert_laborName_prefijo.value;
        const val_tipoLabor = insert_laborName_tipo.value;
        const data = {
            "nombreLabor": val_nombreLabor,
            "etapaLabor": val_etapaLabor,
            "id_laborName": val_idLaborName,
            "prefijoLabor": val_prefijoLabor,
            "tipoLabor": val_tipoLabor,
        }
        console.log(data);
        const form = {
            "accion": "insert-laborName",
            "datos": data
        }
        insertSelect_laborName(form);
    });

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
    mbtnClose_laborNameEtapa.addEventListener("click", () => {
        const form = {
            "accion": "getLaborNombre_etapa",
        }
        getSelect_workName_etapa(form)
    });

    mbtnInsert_laborZone.addEventListener("click", () => {
        val_laborZone_zona = insert_laborZone_zona.value;
        val_laborZone_letra = insert_laborZone_letra.value;

        if (val_laborZone_zona && val_laborZone_letra) {
            const data = {
                "laborZone_zona": val_laborZone_zona,
                "laborZone_letra": val_laborZone_letra,
            }
            const form = {
                "accion": "insert-laborZone",
                "datos": data
            }
            insertSelect_laborZona(form);
        } else {
            const data = {
                'estado': 0,
                'mensaje': ' Falta datos'
            }
            const rptBackend = {
                'modalName': 'laborZone',
                'sql': data
            }
            modal_notifications(rptBackend)
        }
    })
    mbtnInsert_unidMinera.addEventListener("click", () => {
        val_unidMinera_nombre = insert_unidMinera_nombre.value;
        val_unidMinera_abrev = insert_unidMinera_abrev.value;

        if (val_unidMinera_nombre && val_unidMinera_abrev) {
            const data = {
                "unidMinera_nombre": val_unidMinera_nombre,
                "unidMinera_abrev": val_unidMinera_abrev,
            }
            const form = {
                "accion": "insert-unidMinera",
                "datos": data
            }
            insertSelect_unidMinera(form);
        } else {
            const data = {
                'estado': 0,
                'mensaje': ' Falta datos'
            }
            const rptBackend = {
                'modalName': 'unidMinera',
                'sql': data
            }
            modal_notifications(rptBackend)
            console.log(form);
        }

    });

    document.querySelector('#ipt-insert-labor-laborName').addEventListener('input', (e) => {
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

    document.querySelector('#ipt-insert-labor-laborZona').addEventListener('input', (e) => {
        if (document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]') !== null) {
            insert_labor_zoneLetra.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.letra;
        } else {
            insert_labor_zoneLetra.value = 'No existe';
        }

    });
    document.querySelector('#ipt-insert-unitMining-nombre').addEventListener('input', (e) => {
        if (document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]') !== null) {
            insert_labor_unitMiningAbrev.value = document.querySelector('#' + e.target.getAttribute('list') + ' option[value="' + e.target.value + '"]').dataset.abrev;
        } else {
            insert_labor_unitMiningAbrev.value = 'No existe';
        }
    });

});

function resetForm() {
    insert_nombreLabor.value = '';
    insert_etapaLabor.value = '';
    insert_prefijoLabor.value = '';
    insert_tipoLabor.value = '';
}

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
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
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
// ----------- INICIO DE INSERT ----------- //
const insertForm_labor = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLabor.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    const rptBackend = {
        'modalName': 'labor',
        'sql': data['sql']
    }
    modal_notifications(rptBackend)
}
const insertSelect_laborName = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLabor.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    const rptBackend = {
        'modalName': 'laborName',
        'sql': data['sql']
    }
    modal_notifications(rptBackend)
}
const insertSelect_laborNameEtapa = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLabor.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    const rptBackend = {
        'modalName': 'laborNameEtapa',
        'sql': data['sql']
    }
    modal_notifications(rptBackend)
}
const insertSelect_laborZona = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLabor.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    const rptBackend = {
        'modalName': 'laborZone',
        'sql': data['sql']
    }
    modal_notifications(rptBackend)
}
const insertSelect_unidMinera = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch('./../../../controllers/controllerLabor.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    const rptBackend = {
        'modalName': 'unidMinera',
        'sql': data['sql']
    }
    modal_notifications(rptBackend)
}
// ----------- FIN DE INSERT ----------- //
const modal_notifications = (rptBackend) => {
    if (rptBackend['sql']['estado']) {
        $.niftyNoty({
            type: 'success',
            container: '#alerts-insert-' + rptBackend['modalName'],
            html: '<strong>¡Bien hecho!</strong> ' + rptBackend['sql']['mensaje'],
            focus: false,
            timer: 2000
        });
    } else {
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-insert-' + rptBackend['modalName'],
            html: '<strong>Oh cielos!</strong> ' + rptBackend['sql']['mensaje'],
            focus: false,
            timer: 2000
        });
    }
};

// Find all inputs on the DOM which are bound to a datalist via their list attribute.
var inputs = document.querySelectorAll('input[list]');
for (var i = 0; i < inputs.length; i++) {
    // When the value of the input changes...
    inputs[i].addEventListener('change', function() {
        var optionFound = false,
            datalist = this.list;
        // Determine whether an option exists with the current value of the input.
        for (var j = 0; j < datalist.options.length; j++) {
            if (this.value == datalist.options[j].value) {
                optionFound = true;
                break;
            }
        }
        // use the setCustomValidity function of the Validation API
        // to provide an user feedback if the value does not exist in the datalist
        if (optionFound) {
            this.setCustomValidity('');
        } else {
            this.setCustomValidity('Please select a valid value.');
        }
    });
}

$(document).on('click', '#add-labor', function() {
    $('#modal-laborName').modal('show');
});

$(document).on('click', '#add-etapa', function() {
    $('#modal-laborNameEtapa').modal('show');
});

$(document).on('click', '#add-zona', function() {
    $('#modal-laborZone').modal('show');
});
$(document).on('click', '#add-sede', function() {
    $('#modal-UnidMinera').modal('show');
});