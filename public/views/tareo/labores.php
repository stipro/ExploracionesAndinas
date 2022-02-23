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

    <?php echo $template_header_css; ?>

    <!--Icono Importar [ OPTIONAL ]-->
    <link href=".\..\..\..\css\tabla.css" rel="stylesheet">

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

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href=".\..\..\..\css\index.css" rel="stylesheet">
            
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
                                    <div class="panel-heading">
                                        <h3 class="panel-title">LABORES</h3>
                                    </div>
                                    <!--Data Table-->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <div id="alerts-general" class="mb-5">

                                        </div>
                                        <!-- Default choosen -->
                                        <div class="pad-btm form-inline">
                                            <div class="row">
                                                <div class="col-sm-6 table-toolbar-left">
                                                    <button data-target="#modal-insert" data-toggle="modal" class="btn btn-primary"><i class="demo-pli-add icon-fw"></i>Agregar</button>
                                                    <button class="btn btn-default"><i class="demo-pli-printer icon-lg"></i></button>
                                                    <div class="btn-group">
                                                        <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
                                                        <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 table-toolbar-right">
                                                    <div class="btn-group">
                                                        <div class="input-group">
                                                            <input id="ipt-Buscar" type="text" placeholder="Busqueda por columna" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button id="btn-Buscar"class="btn btn-primary" type="button">Buscar</button>
                                                            </span>
                                                        </div>			
                                                        <!--===================================================-->
                                                        <select data-placeholder="Choose a Country..." id="demo-chosen-select" tabindex="2">
                                                            <option value="CCostos">ccostos</option>
                                                            <option value="Labor">labor</option>
                                                            <option value="Nivel">nivel</option>
                                                            <option value="Tipo">tipo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Foo Table - Row Toggler -->
                                        <!--===================================================-->
                                        <div class="panel-body">
                                            <fieldset>
                                                <legend>Labores</legend>
                                                <div class="table-responsive-sm">
                                                    <table id="example" class="display" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th width="15%">Unidad Minera</th>
                                                                <th width="6%">Abrev</th>
                                                                <th>Zona</th>
                                                                <th width="6%">Letra</th>
                                                                <th width="18%">C. Costos</th>
                                                                <th>Nombre</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
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
                                                    <!-- Paginación 
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                        <li class="disabled"><span>...</span></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                        <li class="disabled"><span>...</span></li>
                                                        <li class="page-item"><a class="page-link" href="#">920</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                                                    </ul>
                                                </nav>-->
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
    <!--Date-MYSQL [ REQUIRED ]-->
    <script src=".\..\..\..\js/labor.js"></script>
    <!--FooTable Example [ SAMPLE ]-->
    <!--<script src="js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]-->
    <!--<script src="plugins\fooTable\dist\footable.all.min.js"></script>
-->
    <!--=================================================-->
</body>
</html>