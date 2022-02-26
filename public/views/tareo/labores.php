<?php
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
    <style>
        thead input {
            width: 100%;
        }
        .filters input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
    <?php echo $template_header_css; ?>

    <!--Icono Importar [ OPTIONAL ]
    <link href=".\..\..\..\css\tabla.css" rel="stylesheet">-->

    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-select\bootstrap-select.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\chosen\chosen.min.css" rel="stylesheet">

    <!--noUiSlider [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\noUiSlider\nouislider.min.css" rel="stylesheet">

    <!--Select2 [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\select2\css\select2.min.css" rel="stylesheet">

    <!--Themify Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">

    <!--FooTable [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\fooTable\css\footable.core.css" rel="stylesheet">

    <!--Ion Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\ionicons\css\ionicons.min.css" rel="stylesheet">

    
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
                                    <!--Data Table-->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <div id="alerts-general" class="mb-5">

                                        </div>
                                        <div class="panel-body">
                                            <fieldset>
                                                <legend>Labores</legend>
                                                <div class="table-responsive-md"> <!-- class  table-hover display-->
                                                    <table id="table-labores" class="table table-striped table-bordered dt-responsive nowrap" data-page-length="2" cellspacing="0" width="100%">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col" width="2%"><input type="checkbox"/></th>
                                                                <th scope="col">C. Costos</th>
                                                                <th scope="col">Veta</th>
                                                                <th scope="col">Nivel</th>
                                                                <th scope="col">M. Explotacion</th>
                                                                <th scope="col">Sección</th>
                                                                <th scope="col">Tipo de EQ</th>
                                                                <th scope="col">Tipo de Roca</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                            <tr class="filters">
                                                                <th scope="col" width="2%"><input type="checkbox"/></th>
                                                                <th scope="col">C. Costos</th>
                                                                <th scope="col">Veta</th>
                                                                <th scope="col">Nivel</th>
                                                                <th scope="col">M. Explotacion</th>
                                                                <th scope="col">Sección</th>
                                                                <th scope="col">Tipo de EQ</th>
                                                                <th scope="col">Tipo de Roca</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th><input type="checkbox"/></th>
                                                                <th scope="col">C. Costos</th>
                                                                <th scope="col">Veta</th>
                                                                <th scope="col">Nivel</th>
                                                                <th scope="col">M. Explotacion</th>
                                                                <th scope="col">Sección</th>
                                                                <th scope="col">Tipo de EQ</th>
                                                                <th scope="col">Tipo de Roca</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <!--<label>Total</label>-->
                                                    <input type="text" id="total" class="form-control" readonly value="0.0" />
                                                    <br>
                                                    <button id="btnObtener">Obtener</button>
                                                </div>
                                            </fieldset>
                                            <!-- <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                                <thead>
                                                    <tr>
                                                        <th data-sort-ignore="true" class="min-width"></th>
                                                        <th data-sort-initial="true" data-toggle="true">CCostos</th>
                                                        <th>Labor</th>
                                                        <th data-hide="phone, tablet">Nivel</th>
                                                        <th data-hide="phone, tablet">Tipo</th>
                                                        <th data-hide="phone, tablet">Zona</th>
                                                        <th data-hide="phone, tablet">CCostos2</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-tareo">

                                                </tbody>
                                                <template id="template-td-tareo">
                                                    <tr id="registro-tareo">
                                                        <td>
                                                            <button id="btn-delete" class="btn btn-danger btn-xs btn-delete">
                                                                <i class="demo-pli-cross"></i>
                                                            </button>
                                                            <button id="btn-edit" class="btn btn-warning btn-xs btn-edit" data-target="#modal-edit"  data-toggle="modal">
                                                                <i class="ti-pencil-alt"></i></button>
                                                        </td>
                                                        <td id="ccostos">...</td>
                                                        <td id="labor">...</td>
                                                        <td id="nivel">...</td>
                                                        <td id="tipo">...</td>
                                                        <td id="zona">...</td>
                                                        <td id="ccostos2">...</td>
                                                    </tr>
                                                    </template>
                                                <tfoot>
                                                <!-- Paginación -
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination" id="pagination">
                                                        <!--<li class="disabled"><a class="page-link" href="#">Anterior</a></li>-

                                                        <!--
                                                            <li class="disabled"><span>...</span></li>
                                                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                                                        --
                                                    </ul>
                                                    <template id="template-pagination">
                                                        <li id="itemPage" class="page-item"><a class="page-link" href="#">2</a></li>
                                                    </template>
                                                </nav>
                                                </tfoot>

                                            </table> -->
                                        </div>
                                        <!--===================================================-->
                                        <!-- End Foo Table - Row Toggler -->
                                    </div>
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


    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-insert" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Registro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
					<!-- Success Alert -->
					<!--===================================================-->

                    <div id="alerts-Insert">

                    </div>
					    <!--Input Size-->
					    <!--===================================================-->
					    <form class="form-horizontal">
					        <div class="panel-body">
                                <!-- FORMULARIO -->
                                <div class="col-sm-6">
					                <label for="demo-is-inputnormal" class="control-label">Unidad Minera</label>
					                <input type="text" placeholder="Unidad Minera" class="form-control" id="formIptTextZona">
					            </div>
                                <div class="col-sm-6">
					                <label for="demo-is-inputnormal" class="control-label">Abrev. Minera</label>
					                <input type="text" placeholder="Unidad Minera" class="form-control" id="formIptTextZona">
					            </div>
					            <div class="col-sm-6">
					                <label class="control-label">Zona</label>
					                <input type="text" placeholder="Zona" class="form-control">
					            </div>
					            <div class="col-sm-6">
					                <label class="control-label">Letra</label>
					                <input type="text" placeholder="Letra" class="form-control">
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Zona</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Zona" class="form-control" id="formIptTextZona">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">C. Costo</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="C. Costo" class="form-control" id="formIptTextCCosto">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nivel</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Nivel" class="form-control" id="formIptNumNivel">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Veta</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Veta" class="form-control" id="formIptNumNivel">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Tipo Roca</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Tipo roca" class="form-control" id="formIptNumNivel">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">labor</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="labor" class="form-control" id="formIptTextLabor">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Prefijo</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Prefijo" class="form-control" id="formIptTextLabor">
					                </div>
					            </div>
                                <div class="form-group">
					                <label for="demo-is-inputnormal" class="col-sm-3 control-label">Tipo Labor</label>
					                <div class="col-sm-6">
					                    <input type="text" placeholder="Tipo Labor" class="form-control" id="formIptTextLabor">
					                </div>
					            </div>
					        </div>
					    </form>
					    <!--===================================================-->
					    <!--End Input Size-->
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtn-insert" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Insertar Bootstrap Modal-->

    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-edit" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Editar Registro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                <div id="alerts-Edit">
                        
                        </div>
					            <!--Input Size-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
                                        <!-- FORMULARIO -->
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Zona</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Zona" class="form-control" id="formIptTextZonaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">C. Costo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="C. Costo" class="form-control" id="formIptTextCCostoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Nivel</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nivel" class="form-control" id="formIptNumNivelEdit">
					                        </div>
					                    </div>


                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">labor</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="labor" class="form-control" id="formIptTextLaborEdit">
					                        </div>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Input Size-->
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtn-edit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>

    <!--===================================================-->
    <!--End Editar Bootstrap Modal-->
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    
    
    <!--Demo script [ DEMONSTRATION ]-->
    <script src=".\..\..\..\js\demo\nifty-demo.min.js"></script>
    <!--Icons [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\icons.js"></script>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\bootstrap-select\bootstrap-select.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\chosen\chosen.jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\select2\js\select2.min.js"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\form-component.js"></script>
    <!--Panel [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\ui-panels.js"></script>
    <!--Date-MYSQL [ REQUIRED ]
    <script src=".\..\..\..\js/labor.js"></script>-->
    <!--FooTable Example [ SAMPLE ]-->
    <!--<script src="js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]-->
    <!--<script src="plugins\fooTable\dist\footable.all.min.js"></script>-->
    <!--=================================================-->
    <script>
        $(document).ready(function() {
            // ACA suscribimos un listener
            $('#btnObtener').on('click', function() {
                let table_labores = $('#table-labores').DataTable();
                let checkeds = table_labores.data().toArray().filter((data) => data.checked);
                console.log(checkeds);
            });
            // Configuración: agregue una entrada de texto a cada celda de pie de página
            // $('#table-labores thead tr').clone(true).addClass('filters').appendTo('#table-labores thead');
            // Setup - add a text input to each footer cell
            $('#table-labores thead .filters th').each(function() {
                var title = $('#table-labores thead tr:eq(0) th').eq($(this).index()).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });
            $.ajax({
                type: 'GET',  // Envío con método POST
                url: './../../json.php',  // Fichero destino (el PHP que trata los datos)
                dataType: 'json',
                data: { tipoUsuario: 'nom', table: 'labores' },
                success: (function(obj, textstatus){
                    console.log(obj);
                    let $table_labores = $('#table-labores');
                    var table_labores = $table_labores.DataTable({
                        // Cabezera 
                        fixedHeader: true,
                        // informacion
                        data: obj,
                        // Declaracon de columnas con key
                        columns: [
                            {
                                render: function(data, type, full, meta) {
                                    // ACA controlamos la propiedad para des/marcar el input
                                    return "<input type='checkbox'" + (full.checked ? ' checked' : '') + "/>";
                                },
                                orderable: false
                            },
                            { data: 'lab_ccostos' },
                            { data: 'lab_veta' },
                            { data: 'lab_nivel' },
                            { data: 'lab_metodoExplotacion' },
                            { data: 'lab_seccion' },
                            { data: 'lab_tipoEq' },
                            { data: 'lab_tipoRoca' },
                            { defaultContent: '<button type="button" class="name btn btn-primary">Editar</button><button type="button" class="position btn btn-danger">Eliminar</button>'}
                        ],
                        pageLength: 4,
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
                            "search": "Buscar:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            },
                            "buttons":{
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
                        
                        responsive: true,
                        // Activacion Boon
                        dom: 'lBfrtip',
                        dom:    "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
                                "<'row'<'col-sm-12'tr>>" +
                                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        // Estado mostrar/ocultar columna simple
                        lengthChange: true,
                        // Estado mostrar/ocultar columna simple
                        lengthMenu: [
                            [ 10, 25, 50, -1 ],
                            [ '10 Filas', '25 Filas', '50 Filas', 'Mostrar todo' ]
                        ],
                        // Declaracion de botones
                        buttons: [
                            {
                                text: '<i class="demo-pli-add icon-fw" ></i> Agregar',
                                action: function ( e, dt, node, conf ) {
                                    $("#modal-insert").modal("show");
                                },
                                className: 'btn btn-primary' //Primary class for all buttons
                            },
                            /* {
                                extend:    'pageLength',
                                className: 'btn btn-secondary'
                            }, */
                            {
                                extend:    'copy',
                                text:      '<i class="fa fa-files-o"></i> Copiar',
                                titleAttr: 'Copy',
                                className: 'btn btn-secondary'
                            },
                            {
                                extend: 'collection',
                                text: '<i class="fa fa-download"></i> Exportar',
                                buttons: [
                                    {
                                        extend:     'excel',
                                        text:       '<i class="fa fa-file-excel-o"></i> Excel',
                                        titleAttr:  'Excel',
                                    },
                                    {
                                        extend:    'csv',
                                        text:      '<i class="fa fa-file-csv"></i> CSV',
                                        titleAttr: 'CSV'
                                    },
                                    {
                                        extend:    'pdf',
                                        text:      '<i class="fa fa-file-pdf-o"></i> PDF',
                                        titleAttr: 'PDF'
                                    },
                                ]
                            },
                            {
                                extend:    'print',
                                text:      '<i class="fa fa-print"></i> print',
                                titleAttr: 'PDF'
                            },
                            {
                                extend: 'colvis',
                                text:   '<i class="fa fa-eye"></i> Mostrar / Ocultar',
                            }
                            /* 'colvis' */
                        ],
                        // Configuracion de ordnamiento
                        orderCellsTop: true,
                        fixedHeader: true,
                        // Filtrar columnas
                        /*
                        initComplete: function () {
                            var api = this.api();
                
                            // For each column
                            api.columns().eq(0).each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('#table-labores thead .filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="' + title + '" />');
                                // On every keypress in this input
                                $('input',$('#table-labores thead .filters th').eq($(api.column(colIdx).header()).index())).off('keyup change').on('keyup change', function (e) {
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
                        },*/
                    });
                    // Apply the search
                    table_labores.columns().eq(0).each(function(colIdx) {
                        $('input', $('.filters th')[colIdx]).on('keyup change', function() {
                            table_labores
                                .column(colIdx)
                                .search(this.value)
                                .draw();
                        });
                    });
                    let $total = $('#total');

                    // Cuando hacen click en el checkbox del thead
                    $table_labores.on('change', 'thead input', function(evt) {
                        let checked = this.checked;
                        let total = 0;
                        let data = [];

                        table_labores.data().each(function(info) {
                            // ACA cambiamos el valor de la propiedad
                            info.checked = checked;
                            // ACA accedemos a las propiedades del objeto
                            if (info.checked) total += info.Precio;
                            data.push(info);
                        });

                        table_labores.clear().rows.add(data).draw();
                        $total.val(total);
                    });
                    // Cuando hacen click en los checkbox del tbody
                    $table_labores.on('change', 'tbody input', function() {
                        let info = table_labores.row($(this).closest('tr')).data();
                        let total = parseFloat($total.val());
                        // ACA accedemos a las propiedades del objeto
                        info.checked = this.checked;
                        let price = info.Precio;
                        total += info.checked ? price : price * -1;
                        $total.val(total);
                    });
                    new $.fn.dataTable.FixedHeader( table_labores );
                    table_labores.buttons().container().appendTo( '#table-labores .col-sm-6:eq(0)' );
                    
                    
                })
            });
            
            function create (){
                
            }
        });
    </script>
</body>
</html>