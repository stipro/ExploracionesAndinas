<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.dataTables.min.css" />
    

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <style>
    thead input {
        width: 100%;
    }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="table-responsive-sm">
        <table id="table4" class="table table-striped display" style="width:100%">
            <thead>
                <tr>
                    <th>CCosto</th>
                    <th>Fecha</th>
                    <th>Labor</th>
                    <th>Zona</th>
                    <th>Instalacion</th>
                    <th>Medida</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th>CCosto</th>
                    <th>Fecha</th>
                    <th>Labor</th>
                    <th>Zona</th>
                    <th>Instalacion</th>
                    <th>Medida</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->


    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    -->
      <!-- Bootstrap core JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        // Setup - add a text input to each footer cell
        $('#table4 thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#table4 thead');
        var dataTable = '';
        ptipUsuario= 'nom'; // Cogemos del formulario el valor nom
        ptabla= 'reporte_operacion_mina_1'; // Cogemos del formulario el valor pass
        // Función que envía y recibe respuesta con AJAX
        $.ajax({
            type: 'GET',  // Envío con método POST
            url: './../../json.php',  // Fichero destino (el PHP que trata los datos)
            dataType: 'json',
            data: { tipoUsuario: ptipUsuario, table: ptabla } // Datos que se envían
        }).done(function( obj, textstatus ) {// Función que se ejecuta si todo ha ido bien
            var table = $('#table4').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                data: obj,
                columns: [
                    {
                        data: 'CCosto',
                    },
                    { data: 'Fecha' },
                    { data: 'Labor' },
                    { data: 'Zona' },            
                    { data: 'instalacionesMina_nombre' },
                    { data: 'instalacionMina_medida' }
                ],
                "pageLength": 3,
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Documentos",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Documentos",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Documentos",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
                lengthChange: false,
                dom: 'lBfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    {
                        extend:    'pageLength',
                        className: 'btn btn-secondary'
                    },
                    {
                        extend:    'copy',
                        text:      '<i class="fa fa-files-o"></i> Copiar',
                        titleAttr: 'Copy',
                        className: 'btn btn-secondary'
                    },
                    {
                        extend:    'excel',
                        text:      '<i class="fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend:    'csvHtml5',
                        text:      '<i class="fas fa-file-csv"></i> CSV',
                        titleAttr: 'CSV'
                    },
                    {
                        extend:    'pdf',
                        text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend:    'copy',
                        text:      '<i class="fas fa-print"></i> print',
                        titleAttr: 'PDF'
                    },
                    'colvis',

                /* 'excel', 'csv', 'pdf', 'print', 'copy', */
                ],
                orderCellsTop: true,
                fixedHeader: true,
                initComplete: function () {
                        var api = this.api();
            
                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="' + title + '" />');
            
                                // On every keypress in this input
                                $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                    .off('keyup change')
                                    .on('keyup change', function (e) {
                                        e.stopPropagation();
            
                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
            
                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();
            
                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                    },
            });
            table.buttons().container().appendTo( '#table4_wrapper .col-md-6:eq(0)' );
            /* console.log(msg);
            console.log(typeof(msg));
            dataTable = JSON.stringify(msg);  // Escribimos en el div consola el mensaje devuelto
            console.log(typeof(dataTable)); */
        }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
        // Mostramos en consola el mensaje con el error que se ha producido
        console.log("The following error occured: "+ textStatus +" "+ errorThrown);
        });
    });    
</script>
  </body>
</html>