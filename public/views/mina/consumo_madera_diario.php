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
        include_once('./explosivo/update.php');
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

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" /> -->

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
    <!-- <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.2.1/css/fixedHeader.dataTables.min.css" rel="stylesheet"> -->
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
					            <div class="panel-body">
                                    <fieldset>
                                        <legend>
                                            <div class="panel-heading">
					                            <h3 class="panel-title">CONSUMO DE MADERA DIARIO </h3>
					                        </div>
                                        </legend>
										<div class="row">
											<div class="col-md-3">
											</div>
											<div class="col-sm-12 col-md-6 dt-buttons btn-group">
												<button class="btn btn-default btn-success btn-labeled" id="btn-agregar-consumoMadera" data-target="#insert-modal-consumoMadera" data-toggle="modal">
													<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>
												</button>
												<button class="btn btn-default btn-info btn-labeled">
													<i class="btn-label fa fa-refresh"></i>
													<span class="hidden-xs">Actualizar</span>
												</button>
												<button class="btn btn-default btn-labeled">
													<i class="btn-label fa fa-download"></i>
													<span class="hidden-xs"> Exportar</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label fa fa-download"></i>
													<span class="hidden-xs"> Importar</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label demo-pli-printer"></i>
													<span class="hidden-xs"> Imprimir</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label fa fa-eye"></i>
													<span class="hidden-xs"> Mostrar / Ocultar</span>
												</button>
											</div>
											<div class="col-sm-12 col-md-3">											
											</div>
										</div>
										
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="tableMaster_consumoMadera">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="2% !important">N°</th>
                                                        <th width="10% !important">Fecha</th>
                                                        <th width="10% !important">N° Consumo Madera</th>
                                                        <th width="10% !important">Turno</th>
                                                        <th class="28% !important">Jefe de Guardia</th>
                                                        <th class="15% !important">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    
                                                </tfoot>
                                            </table>
                                        </div>
                                    </fieldset>
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

    <!--Insert Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="insert-modal-consumoMadera" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm-consumoMadera_diario" class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title col-md-7">Consumo de Madera diario</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <legend><p class="text-main">Datos Principal</p></legend>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="insert-slt-consumoMadera-turno" class="col-md-5 control-label">Turno<span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <select name="turnos" id="insert-slt-consumoMadera-turno" class="form-control">
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-jefeGuardia" class="col-md-5 control-label">Jefe de <br> Guardia<span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input list="insert-dtl-consumoMadera-jefeGuardia" type="text" class="form-control" id="insert-ipt-consumoMadera-jefeGuardia" name="jefe_guarda" placeholder="Jefe de Guardia">
                                            <datalist id="insert-dtl-consumoMadera-jefeGuardia">
                                                <option value="--no cargo--">--no cargo--</option>
                                            </datalist>
                                        </div>
                                        <template id="template-consumoMadera-jefeGuardia">
                                            <option id="template-opt-consumoMadera-jefeGuardia">
                                        </template>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-fecha" class="col-md-4 control-label">Fecha<span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" id="insert-ipt-consumoMadera-fecha"  name="fecha" placeholder="Fecha" value="<?php echo date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="insert-slt-consumoMadera-nvale" class="col-md-5 control-label">N° <br> Vale<span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="insert-slt-consumoMadera-nvale"  name="consumoMadera_nvale" placeholder="N° Vale" value="000000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <legend><p class="text-main">Detalle</p></legend>
                            <div class="row">
                                
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="insert-ipt-consumoMadera-centroCostos" class="col-md-4 control-label">Centro <br> Costos<span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <input list="insert-dtl-consumoMadera-centroCostos" type="text" class="form-control" id="insert-ipt-consumoMadera-centroCostos" name="centro_costos" placeholder="Centro Costos">
                                                <datalist id="insert-dtl-consumoMadera-centroCostos">
                                                    <option value="--no cargo--">--no cargo--</option>
                                                </datalist>
                                            </div>
                                            <template id="template-consumoMadera-centroCostos">
                                                <option id="template-opt-consumoMadera-centroCostos">
                                            </template>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="insert-ipt-consumoMadera-labor" class="col-md-5 control-label">Labor<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="insert-ipt-consumoMadera-labor"  name="fecha" placeholder="Labor" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="insert-ipt-consumoMadera-madera" class="col-md-5 control-label">Madera<span class="text-danger">*</span></label>
                                            <div class="col-md-7">
                                                <input list="insert-dtl-consumoMadera-madera" type="text" class="form-control" id="insert-ipt-consumoMadera-madera"  name="fecha" placeholder="Madera">
                                                <datalist id="insert-dtl-consumoMadera-madera">
                                                    <option value="--no cargo--">--no cargo--</option>
                                                </datalist>
                                            </div>
                                            <template id="template-consumoMadera-madera">
                                                <option id="template-opt-consumoMadera-madera">
                                            </template>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="insert-ipt-consumoMadera-cantidad" class="col-md-6 control-label">Cantidad<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="insert-ipt-consumoMadera-cantidad"  name="fecha" placeholder="Cantidad">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                        <button id="mbtn-agregarDetalle" class="btn btn-success">Agregar</button>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive-md">
                                        <table id="list-insert-consumoMadera-detalle" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th width="2% !important" scope="col">n°</th>
                                                    <th scope="col">idLabor</th>
                                                    <th width="8% !important" scope="col">C. Costos</th>
                                                    <th width="10% !important" scope="col">Labor</th>
                                                    <th scope="col">idMadera</th>
                                                    <th width="20% !important" scope="col">Madera</th>
                                                    <th width="10% !important" scope="col">Cantidad</th>
                                                    <th width="15% !important" scope="col">Acciónes</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="mbtn-new-consumoMadera">Nuevo</button>
                    <button class="btn btn-default" id="mbtn-close-consumoMadera" data-dismiss="modal" type="button">Cerrar</button>
                    <button class="btn btn-success" id="mbtn-insert-consumoMadera">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Insert Bootstrap Modal-->

    <!--Editar Bootstrap Modal-->
    <!--===================================================-->
    <?php echo $template_update_explosivo;?>
    <!--===================================================-->
    <!-- End Editar Bootstrap Modal -->

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="./../../../js/nifty.min.js"></script>

    <!-- Date-MYSQL [ REQUIRED ] -->
    <script src="./../../../js/consumo_madera_diario.js"></script>

</body>
</html>