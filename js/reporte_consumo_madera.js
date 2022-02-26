// ipt = input
// reg = registrar
// csm = consumo
// Boton para agregar o abrir model
const btnAgregar = document.getElementById("btn-add");
// boton para registrar o insertar registro
const btnInsertar = document.getElementById("mbtn-insert");
// boton para un nuevo formulario o limpiar formulario
const btnNuevo = document.getElementById("mbtn-new");
// Los inputs de formaulario
const iptreg_reportConsumoMadera_numero = document.getElementById('insert-reportConsumoMadera-numero');
const iptreg_reportConsumoMadera_fecha = document.getElementById('insert-reportConsumoMadera-fecha');
const iptreg_reportConsumoMadera_turno = document.getElementById('insert-reportConsumoMadera-turno');
const iptreg_reportConsumoMadera_nombre = document.getElementById('insert-reportConsumoMadera-nombre');
const iptreg_reportConsumoMadera_dni = document.getElementById('insert-reportConsumoMadera-dni');
const iptreg_reportConsumoMadera_labor = document.getElementById('insert-reportConsumoMadera-labor');
const iptreg_reportConsumoMadera_cantidad = document.getElementById('insert-reportConsumoMadera-cantidad');

const iptreg_oprtion_table = document.getElementById('insert-option-table');


let listInsert = {}

document.addEventListener('DOMContentLoaded', e => {

});

btnInsertar.addEventListener("click", (e) => {
    console.log('Se obtuvo la informacion siguiente');
    const valNumReporte = iptreg_reportConsumoMadera_numero.value;
    const valfecha = iptreg_reportConsumoMadera_fecha.value;
    const valturno = iptreg_reportConsumoMadera_turno.value;
    const valnombre = iptreg_reportConsumoMadera_nombre.value;
    const valdni = iptreg_reportConsumoMadera_dni.value;
    listInsert = {
        "numReporte": valNumReporte,
        "fecha": valfecha,
        "turno": valturno,
        "nombre": valnombre,
        "dni": valdni,
        "labor": vallabor,
        "cantidad": valcantidad,
    }
    const vallabor = iptreg_reportConsumoMadera_labor.value;
    const valcantidad = iptreg_reportConsumoMadera_cantidad.value;
    console.log(listInsert);
});
// JQUERY

// Boton Agregar Fila
$("#btn-add-table-insert").on('click', 'button.alert', function(e) {
    console.log('boton registrar');
});
// Boton Nueva Fila
$("#btn-new-table-insert").on('click', 'button.alert', function(e) {
    console.log('boton nuevo');
});
// Boton Agregar Fila
$("#btn-edit-table-insert").on('click', 'button.alert', function(e) {
    console.log('boton nuevo');
});
// Boton Exportar Fila en Excel
$("#btn-exportExcel-table-insert").on('click', 'button.alert', function(e) {
    console.log('boton nuevo');
});
// Ejecuta despues de DOM cargado por completo
$(document).ready(function(e) {
    console.log("cargo el Dom!");
    $('#table-master').DataTable({
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
                text: '<i class="fa fa-hdd-o" ></i> Importar',
                action: function(e, dt, node, conf) {
                    $("#modal-insert").modal("show");
                },
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
    $('#table-details-insert').DataTable({
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
    });
});
// Ejecuta despues de DOM y Imagenes o iframes cargado por completo
$(window).on("load", function(e) {
    console.log("cargo el Dom y recursos");
});