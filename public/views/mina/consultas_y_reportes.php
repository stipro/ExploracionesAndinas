<?php
    $dateServer = date('Y-m-d');
    $mindate = date("Y-m-d",strtotime($dateServer."- 2 days"));
    session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
        $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio, o ocurrio un error';
        $idUsuario = $_SESSION["id"];
        $actual_url = __FILE__;
        $partsActual_url = explode("\\", $actual_url);
        $name_modulo = $partsActual_url[5];
        $nameArchivo = basename( __FILE__, '.php');
        $parte = explode("_", $nameArchivo);
        require_once('./../../../Config/config.php');
        include_once('./../template/header.php');
        include_once('./../template/menu.php');
        include_once('./../template/footer.php');
        include_once('./../template/aside.php');
        include_once('./../template/javascript.php');
        $name_menu = '';
        for ($i=0; $i < count($parte); $i++) {
            $name_menu .= ucfirst($parte[$i]).' ';
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $name_menu .' | '. NOMBRE_SISTEMA ?></title>
    <meta name="description" content="sistema para Mina">
    <meta name="keywords" content="EA, Exploraciones Andinas">
    <meta name="author" content="Frank Sitft">
    <script>
        var data = '';
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';
    </script>
    <!--STYLESHEET-->
    <!--=================================================-->

    <?php echo $template_header_css; ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

    <!--Icono Importar [ OPTIONAL ]-->
    <link href=".\..\..\..\css\icons.css" rel="stylesheet">

    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-select\bootstrap-select.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\chosen\chosen.min.css" rel="stylesheet">

    <!--noUiSlider [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\noUiSlider\nouislider.min.css" rel="stylesheet">

    <!--Select2 [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\select2\css\select2.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href=".\..\..\..\css\demo\nifty-demo.min.css" rel="stylesheet">

    <!--Themify Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">

    <!--FooTable [ OPTIONAL ]
    <link href=".\..\..\..\plugins\fooTable\css\footable.core.css" rel="stylesheet">-->

    <!--Ion Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\ionicons\css\ionicons.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\chosen\chosen.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href=".\..\..\..\css\operacionMina.css" rel="stylesheet">
    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\font-awesome\css\font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.dataTables.min.css" rel="stylesheet">
    <style>
    thead input {
        width: 100%;
    }
    </style>
            
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <!--NAVBAR-->
        <!--===================================================-->
        <?php echo $template_navBar ?>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow"><?php echo $name_menu; ?></h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#"><?php echo ucfirst($name_modulo); ?></a></li>
					<li class="active"><?php echo $name_menu; ?></li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-xs-12">
					        <div class="panel">
					            <!-- <div class="panel-heading">
					                <h3 class="panel-title">Reportes</h3>
					            </div> -->
					
					            <!--Data Table-->
					            <!--===================================================-->
					            <div class="panel-body">
					                <div class="pad-btm form-inline">
					                    <div class="row">
					                    </div>
					                </div>
                                    <!-- Foo Table - Row Toggler -->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <fieldset>
                                            <legend>Reporte de Operacion Mina</legend>
                                            <div class="table-responsive-sm">
                                                <table id="reporte-OperMina" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Instalacion_mina</th>                                                            
                                                            <th>Fecha</th>
                                                            <th>CCosto</th>
                                                            <th>Labor</th>
                                                            <th>Zona</th>
                                                            <th>Instalacion</th>
                                                            <th>Cantidad</th>
                                                            <th>Medida</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Reporte de Vale Explosivos</legend>
                                            <div class="table-responsive-sm">
                                                <table id="reporte-ValeExplosivo" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Pies Perforados</th>
                                                            <th>Dia</th>
                                                            <th>n. Maquina</th>
                                                            <th>C. Costos</th>
                                                            <th>Nombre Labor</th>
                                                            <th>Zona</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!--===================================================-->
                                    <!-- End Foo Table - Row Toggler -->
					            </div>
					        </div>
					    </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            <!--ASIDE-->
            <!--===================================================-->
            <?php echo $template_aside; ?>
            <!--===================================================-->
            <!--END ASIDE-->

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php echo $template_MainNavigation; ?>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <?php echo $template_footer; ?>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->





    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <!-- Data table plugin-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--Icons [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\icons.js"></script>

    <!--FooTable Example [ SAMPLE ]
    <script src=".\..\..\..\js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]
    <script src=".\..\..\..\plugins\fooTable\dist\footable.all.min.js"></script>-->


        
    <!--Date-MYSQL [ REQUIRED ]
    <script src=".\..\..\..\js\operacionMina.js"></script>-->

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.2.1/js/dataTables.fixedHeader.min.js"></script>


  
<script>
    $(document).ready(function() {
        // Configuración: agregue una entrada de texto a cada celda de pie de página
        $('#reporte-OperMina thead tr').clone(true).addClass('filters').appendTo('#reporte-OperMina thead');
        $('#reporte-ValeExplosivo thead tr').clone(true).addClass('filters').appendTo('#reporte-ValeExplosivo thead');
        var dataTable = '';
        ptipUsuario= 'nom'; // Cogemos del formulario el valor nom
        ptabla= 'reporte_operacion_mina_1'; // Cogemos del formulario el valor pass
            // Función que envía y recibe respuesta con AJAX
        $.ajax({
            type: 'GET',  // Envío con método POST
            url: './../../json.php',  // Fichero destino (el PHP que trata los datos)
            dataType: 'json',
            data: { tipoUsuario: ptipUsuario, table: ptabla },
            success: function(obj, textstatus){
                for (const property in obj) {
                    console.log(`${property}: ${obj[property]}`);
                    Object.assign(obj[property], {name_archivo: "reporte_operacion_mina_1"});
                }
                Object.assign(obj, {key3: "value3"});
                console.log(obj);
                $('#reporte-OperMina').DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true,
                    data: obj,
                    columns: [
                        { data: 'name_archivo' },                        
                        { data: 'Fecha' },
                        { data: 'CCosto' },
                        { data: 'Labor' },
                        { data: 'Zona' },            
                        { data: 'instalacionesMina_nombre' },
                        { data: 'Cantidad' },
                        { data: 'instalacionMina_medida' }
                    ],
                    /* "pageLength": 3, */
                    
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
                    dom: 'lBfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'print'
                    ],
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function () {
                        var api = this.api();
                        // For each column
                        api.columns().eq(0).each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('.filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');
                            // On every keypress in this input
                            $('input',$('.filters th').eq($(api.column(colIdx).header()).index())).off('keyup change').on('keyup change', function (e) {
                                e.stopPropagation();
            
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
            
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api.column(colIdx).search(
                                    this.value != '' ? regexr.replace('{search}', '(((' + this.value + ')))') : '',
                                    this.value != '',
                                    this.value == ''
                                ).draw();
            
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                        });
                    },
                });
            }// Datos que se envían
        })

        $.ajax({
            type: 'GET',  // Envío con método POST
            url: './../../json.php',  // Fichero destino (el PHP que trata los datos)
            dataType: 'json',
            data: { tipoUsuario: 'nom', table: 'reporte_vales_explosivos_1' },
            success: function(obj, textstatus){
                $('#reporte-ValeExplosivo').DataTable({
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    responsive: true,
                    data: obj,
                    columns: [
                        { data: 'Pie_perforados' },
                        { data: 'Fecha' },
                        { data: 'Numero_Maquinas' },
                        { data: 'Ccostos' },            
                        { data: 'Numero_Maquinas' },
                        { data: 'Zona' }
                    ],
                    /* "pageLength": 3, */
                    
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
                    dom: 'lBfrtip',
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'print'
                    ],
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function () {
                        var api = this.api();
            
                        // For each column
                        api.columns().eq(0).each(function (colIdx) {
                            // Set the header cell to contain the input element
                            var cell = $('#reporte-ValeExplosivo thead .filters th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            $(cell).html('<input type="text" placeholder="' + title + '" />');
                            // On every keypress in this input
                            $('input',$('#reporte-ValeExplosivo thead .filters th').eq($(api.column(colIdx).header()).index())).off('keyup change').on('keyup change', function (e) {
                                e.stopPropagation();
            
                                // Get the search value
                                $(this).attr('title', $(this).val());
                                var regexr = '({search})'; //$(this).parents('th').find('select').val();
            
                                var cursorPosition = this.selectionStart;
                                // Search the column for that value
                                api.column(colIdx).search(
                                    this.value != '' ? regexr.replace('{search}', '(((' + this.value + ')))') : '',
                                    this.value != '',
                                    this.value == ''
                                ).draw();
            
                                $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                            });
                        });
                    },
                });
            }// Datos que se envían
        })
    });    
</script>

</body>
</html>