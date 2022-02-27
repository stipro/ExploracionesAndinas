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
    <script>
        var data = '';
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';
    </script>
    <!--STYLESHEET-->
    <!--=================================================-->
    <style>
        #inserForm{
            width: 60% !important;
        }

        /* .form-group>label {
        bottom: 34px;
        left: 15px;
        position: relative;
        background-color: white;
        padding: 0px 5px 0px 5px;
        font-size: 1.1em;
        transition: 0.2s;
        pointer-events: none;
        }

        .form-control:focus~label {
        bottom: 55px;
        }

        .form-control:valid~label {
        bottom: 55px;
        } */
    </style>
    <?php /* echo $template_header_css; */ ?>

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">

    <!--Stylesheet [ REQUIRED - REQUERIDO ]-->
    <link href=".\..\..\..\css\base.css" rel="stylesheet">

    <!--=================================================-->

    <!--Bootstrap Stylesheet 3.3.7 [ REQUIRED ]-->
    <link href=".\..\..\..\bootstrap_3\css\bootstrap.min.css" rel="stylesheet">

    <!--Bootstrap DataTables Stylesheet 1.10.15 [ REQUIRED ]-->
    <link href=".\..\..\..\bootstrap_3\css\dataTables.bootstrap.min.css" rel="stylesheet">

    <!--Bootstrap DataTables Stylesheet 2.1.1 [ REQUIRED ]-->
    <link href=".\..\..\..\bootstrap_3\css\responsive.bootstrap.min.css" rel="stylesheet">

    <!--FixedHeader Bootstrap DataTables Stylesheet 1.11.4 [ REQUIRED ]-->
    <link href=".\..\..\..\bootstrap_3\css\fixedHeader.bootstrap.css" rel="stylesheet">

    <!--Bootstrap DataTables Stylesheet [ REQUIRED ]-->
    <link href=".\..\..\..\bootstrap_3\css\buttons.bootstrap.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href=".\..\..\..\css\nifty.min.css" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href=".\..\..\..\css\demo\nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href=".\..\..\..\plugins\pace\pace.min.css" rel="stylesheet">
    <script src=".\..\..\..\plugins\pace\pace.min.js"></script>


    <!--Demo [ DEMONSTRATION ]-->
    <link href=".\..\..\..\css\demo\nifty-demo.min.css" rel="stylesheet">

    <!--Ion Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\ionicons\css\ionicons.min.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\font-awesome\css\font-awesome.min.css" rel="stylesheet">

    <!--Themify Icons [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">

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
    <link href=".\..\..\..\css\reporte_consumo_madera.css" rel="stylesheet">
    
    <!--Font Awesome [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\font-awesome\css\font-awesome.min.css" rel="stylesheet">

            
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
                                    <div class="table-responsive-md">
                                        <fieldset>
                                            <legend>REPORTE CONSUMO DE MADERA</legend>
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="table-master">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="2%"><input type="checkbox"/></th>
                                                        <th scope="col">N° Reporte</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col" width="10%">Acciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </fieldset>
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

    <!--Editar Bootstrap Modal-->
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
					                        <label for="formIptTextCodigoEdit" class="col-sm-3 control-label">Código</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Código" class="form-control" id="formIptTextCodigoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextNombreEdit" class="col-sm-3 control-label">Nombre</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Cargo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextDiaEdit" class="col-sm-3 control-label">Dia</label>
					                        <div class="col-sm-6">
					                            <input type="date" placeholder="Dia" class="form-control" id="formIptTextDiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextTurnoEdit" class="col-sm-3 control-label">Turno</label>
					                        <div class="col-sm-6">
                                            <!--<input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
                                                -===================================================-->
                                                <select data-placeholder="elige un turno" id="formIptTextTurnoEdit" tabindex="2">
                                                    <option value="Día">Día</option>
                                                    <option value="Noche">Noche</option>
                                                    <option value="Blanco">Descanso</option>
                                                </select>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHTEdit" class="col-sm-3 control-label">H.T.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Trabajo" class="form-control" id="formIptNumHTEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextHTSerAdiEdit" class="col-sm-3 control-label">H.T. Serv. Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H. T. Servicio Adicional" class="form-control" id="formIptTextHTSerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCCostosEdit" class="col-sm-3 control-label">C. Costos</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Centro de costos" class="form-control" id="formIptTextCCostosEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextLaborEdit" class="col-sm-3 control-label">Labor</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Labor" class="form-control" id="formIptTextLaborEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumNivelEdit" class="col-sm-3 control-label">Nivel</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nivel" class="form-control" id="formIptNumNivelEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHEEdit" class="col-sm-3 control-label">Horas Extras (H.E.)</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Extras" class="form-control" id="formIptNumHEEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHESerAdiEdit" class="col-sm-3 control-label">H.E. Servicio Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H.E Servicio Adicional" class="form-control" id="formIptNumHESerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumCCostosHorasExtrasEdit" class="col-sm-3 control-label">C.Costos Horas E.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="C. Costos Horas Extras" class="form-control" id="formIptNumCCostosHorasExtrasEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextZonaEdit" class="col-sm-3 control-label">Zona</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Zona" class="form-control" id="formIptTextZonaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextGuardiaEdit" class="col-sm-3 control-label">Cod. Guardia</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Codigo Guardia" class="form-control" id="formIptTextGuardiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumActividadEdit" class="col-sm-3 control-label">Numero Actividad</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="N° Actividad" class="form-control" id="formIptNumActividadEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextAreaEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Área" class="form-control" id="formIptTextAreaEdit">
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
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-lg-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm" class="modal-dialog" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title col-md-7">Registro Reporte Consumo Madera</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <!-- <p class="bord-btm pad-ver text-main text-bold">Datos </p> -->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-fecha-insert" class="control-label">Fecha</label>
                                        <input type="date" placeholder="Fecha" class="form-control" id="input-fecha-insert"  value="<?php echo date('Y-m-d') ?>" > <!--min="2021-12-12" max="2021-12-13"-->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-nreporte-insert" class="control-label">N° Reporte</label>
                                        <input type="text" placeholder="N° Reporte" class="form-control" id="input-nreporte-insert"  value="000000" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-ccosto-insert" class="control-label">C. Costo</label>
                                        <input type="text" class="form-control" id="input-ccosto-insert" list="insert-options-ccostos" placeholder="C. Costo">
                                        <datalist id="insert-options-ccostos">
                                            <option value="Nose ejecuto">
                                        </datalist>
                                        <template id="template-opt-ccostos">
                                            <option id="opt-ccostos" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-labor-insert" class="control-label">Labor</label>
                                        <input type="text" placeholder="Labor" class="form-control" id="input-labor-insert"  value="" disabled>
                                    </div>
                                </div>                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-zona-insert" class="control-label">Zona</label>
                                        <input type="text" placeholder="Zona" class="form-control" id="input-zona-insert"  value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-descripcion-insert" class="control-label">Descripción</label>
                                        <input type="text" class="form-control" id="input-descripcion-insert" list="nombre-instalaciones-options" placeholder="Descripción">
                                        <datalist id="nombre-instalaciones-options">
                                            <option value="Nose ejecuto">
                                        </datalist>
                                        <template id="template-opts-name-instalaciones">
                                            <option id="template-opt-name-instalaciones" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-undmedida-insert" class="control-label">Und Medida</label>
                                        <input type="text" placeholder="Und Medida" class="form-control" id="input-undmedida-insert"  value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-cantidad-insert" class="control-label">Cantidad</label>
                                        <input type="number" placeholder="Cantidad" class="form-control" id="input-cantidad-insert"  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive-md">
                                        <fieldset>
                                            <legend>Detalle</legend>
                                            <table id="table-details-insert" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" >
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" width="2%"><input type="checkbox"/></th>
                                                        <th scope="col">id_labor</th>
                                                        <th scope="col">C. Costos</th>
                                                        <th scope="col">Labor</th>
                                                        <th scope="col">Zona</th>
                                                        <th scope="col">id_instalacionMina</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Und. Medida</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Acciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-12" id="btn-add-table-insert">Agregar</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-default col-md-12" id="btn-new-table-insert">Nuevo</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-warning col-md-12" id="btn-edit-table-insert">Modificar</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-default col-md-12" id="btn-exportExcel-table-insert" ><i class="fa fa-file-excel-o"></i> Excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="mbtn-new">Nuevo</button>
                    <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
                    <button class="btn btn-success" id="mbtn-insert" >Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->


    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php /* echo $template_javascript; */ ?>

        <!--jQuery 1.12.4 [ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/jquery-1.12.4.js"></script>

        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="./../../../js/bootstrap.min.js"></script>

        <!--Jquery DataTables 1.11.4 -->
        <script src="./../../../bootstrap_3/js/jquery.dataTables.min.js"></script>

        <!--Jquery DataTables 1.11.4 -->
        <script src="./../../../bootstrap_3/js/dataTables.bootstrap.min.js"></script>

        <!--Responsive Bootstrap DataTables 2.1.1[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/responsive.bootstrap.min.js"></script>
        
        <!--DataTables Responsive 1.0.7 [ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/dataTables.responsive.min.js"></script>

        <!--Bootstrap DataTables 3.1.5[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/dataTables.fixedHeader.js"></script>

        <!--DataTables Buttons 2.2.2[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/dataTables.buttons.min.js"></script>

        <!--Buttons Bootstrap 2.2.2[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/buttons.bootstrap.min.js"></script>

        <!--Buttons Bootstrap JSZip 3.1.3[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/jszip.min.js"></script>

        <!--Buttons Bootstrap pdfmake 0.1.53[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/pdfmake.min.js"></script>

        <!--Buttons Bootstrap vfs_fonts 0.1.53[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/vfs_fonts.js"></script>

        <!--Buttons Html5 2.2.2[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/buttons.html5.min.js"></script>

        <!--Buttons Html5 Print 2.2.2[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/buttons.print.min.js"></script>

        <!--Buttons Html5 colVis 2.2.2[ REQUIRED ]-->
        <script src="./../../../bootstrap_3/js/buttons.colVis.min.js"></script>




        <!--=================================================-->

        <!--NiftyJS [ RECOMMENDED ]-->
        <script src="./../../../js/nifty.min.js"></script>


        <!--Base [ RECOMMENDED ]-->
        <script type="text/javascript" src="./../../../js/index.js"></script>


        <!--=================================================-->

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
    <script src=".\..\..\..\js\reporte_consumo_madera.js"></script>

</body>
</html>