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
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';
    </script>
    <!--STYLESHEET-->
    <!--=================================================-->

    <?php echo $template_header_css; ?>

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
    <link href=".\..\..\..\css\tareo.css" rel="stylesheet">

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

        <div id="container-boxed" class="boxed">

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
                                <div id="alerts-general" class="mb-5">
                                </div>
					            <div class="panel-body">
                                    <fieldset>
                                        <legend><h3 class="panel-title">Tareos</h3></legend>
                                        <div class="table-responsive-md"> <!-- class  table-hover display-->
                                            <table class="table display nowrap table-striped table-bordered dt-responsive" style="width:100%" id="table-master">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Apellidos y Nombres</th>
                                                        <th>Cargo</th>
                                                        <th>Dia</th>
                                                        <th>Turno</th>
                                                        <th>Ht</th>
                                                        <th>Ht Sev_Ad</th>
                                                        <th>**Ccostos</th>
                                                        <th>Labor</th>
                                                        <th>Nivel</th>
                                                        <th>He</th>
                                                        <th>He Ser Ad</th>
                                                        <th>C. Costos He</th>
                                                        <th>V.B</th>
                                                        <th>Guardia</th>
                                                        <th>Cod_Actividad</th>
                                                        <th>Área</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Apellidos y Nombres</th>
                                                        <th>Cargo</th>
                                                        <th>Dia</th>
                                                        <th>Turno</th>
                                                        <th>Ht</th>
                                                        <th>Ht Sev_Ad</th>
                                                        <th>**Ccostos</th>
                                                        <th>Labor</th>
                                                        <th>Nivel</th>
                                                        <th>He</th>
                                                        <th>He Ser Ad</th>
                                                        <th>C. Costos He</th>
                                                        <th>V.B</th>
                                                        <th>Guardia</th>
                                                        <th>Cod_Actividad</th>
                                                        <th>Área</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                </tbody>
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
    <div class="modal fade" id="modal-insert" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Registro</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <form class="form-horizontal">
                        <div id="group1Form">
                            <div id="g1item1Form">
                                <p class="bord-btm pad-ver text-main text-bold">Personal</p>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptNumberNTarjeta" class="col-sm-3 control-label">N. Tarjeta</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Tarjeta" class="form-control" id="formIptNumberNTarjeta">
                                        </div>
                                    </div>
                                    <div id="rptBusquedaDni">
                                    </div>
                                    
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptNumberDni" class="col-sm-3 control-label">DNI</label>
                                        <div class="col-sm-6">
                                            <input type="number" placeholder="DNI" class="form-control" id="formIptNumberDni">
                                        </div>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptTextNombre" class="col-sm-3 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombre">
                                        </div>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptTextCargo" class="col-sm-3 control-label">Cargo</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargo" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Area</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Area" class="form-control" id="formIptTextArea" disabled>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div id="g1item2Form">
                                <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formiptDateDia" class="col-lg-3 control-label">Dia</label>
                                        <div class="col-lg-7">
                                            <input type="date" class="form-control" id="formiptDateDia">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTurno" class="col-lg-3 control-label">Turno</label>
                                        <div class="col-lg-7">
                                            <select class="form-select" aria-label="Default select" id="formselectTurno" tabindex="2">
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                                <option value="Descanso">Descanso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectGuardia" class="col-lg-3 control-label">Guardia</label>
                                        <div class="col-lg-7">
                                            <select data-placeholder="Choose a Country..." id="formselectGuardia" tabindex="2">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The confirm password is required and can't be empty</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The password and its confirm are not the same</small></div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="formiptDecimalActividad" class="col-lg-3 control-label">Ingrese N° Actividad HT</label>
                                            <div class="col-lg-7">
                                                <input type="number" placeholder="N° Actividad" class="form-control" id="formiptDecimalActividad">
                                            </div>
                                        </div>
                                    <div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="group2Form">
                            <div id="g2item1Form">
                                <p class="bord-btm pad-ver text-main text-bold">CCostos</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTextCodZona" class="col-lg-3 control-label">Cod Zona</label>
                                        <select data-placeholder="" id="formselectTextCodZona" tabindex="2">
                                        </select>
                                        <template id="template-opt-zona">
                                            <option id="optzona" value="">A</option>
                                        </template>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTextCCostos" class="col-lg-3 control-label">C Costos</label>
                                        <select data-placeholder="CCostos" id="formselectTextCCostos" tabindex="2">
                                        </select>
                                        <template id="template-opt-ccostos">
                                            <option id="optccostos" value=""></option>
                                        </template>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptTextZona" class="col-lg-3 control-label">Zona</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Zona" class="form-control" id="formiptTextZona" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptTextLabor" class="col-lg-3 control-label">Labor</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Labor" class="form-control" id="formiptTextLabor" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberNivel" class="col-lg-3 control-label">Nivel</label>
                                        <div class="col-lg-7">
                                            <input type="number" placeholder="Nivel" class="form-control" id="formiptNumberNivel" disabled>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div id="g2item2Form">
                                <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHE" class="col-lg-3 control-label">HE</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HE" class="form-control" id="formiptNumberHE">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHT_Ser_Ad" class="col-lg-3 control-label">HT Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HT Serv. Ad" class="form-control" id="formiptNumberHT_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHE_Ser_Ad" class="col-lg-3 control-label">HE Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HE Serv. Ad" class="form-control" id="formiptNumberHE_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberCc_Ser_Ad" class="col-lg-3 control-label">Cc Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Cc Serv. Ad" class="form-control" id="formiptNumberCc_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberCCostosHe" class="col-lg-3 control-label">CcostosHe</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="CcostosHe" class="form-control" id="formiptNumberCCostosHe">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <br>
                        <div>
                            <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                            <fieldset>
                                <div class="form-group pad-ver">
					                <div class="col-md-9" style="width: 100%;">
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="1 Perforacion" type="radio" name="inline-form-radio" checked="">
                                            1 Perforacion
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="2 Vol" type="radio" name="inline-form-radio">
					                        2 Vol
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="3 Lim" type="radio" name="inline-form-radio">
                                            3 Lim
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="4 Stto" type="radio" name="inline-form-radio">
					                        4 Stto
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="5 Serv." type="radio" name="inline-form-radio">
					                        5 Serv.
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="6 Rehabulitacion" type="radio" name="inline-form-radio">
					                        6 Rehabulitacion
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="10 Cap" type="radio" name="inline-form-radio">
					                        10 Cap
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="11" value="11 Dm" type="radio" name="inline-form-radio">
					                        11 Dm
                                        </label>                                        
                                        <label class="radio-inline">
                                            <input id="" data-ht="12" value="12 Dl" type="radio" name="inline-form-radio">
					                        12 Dl
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="13" value="13 S" type="radio" name="inline-form-radio">
					                        13 S
                                        </label>
					                    <label class="radio-inline">
                                            <input id="" data-ht="14" value="14 F" type="radio" name="inline-form-radio">
					                        14 F
                                        </label>					
					                    <label class="radio-inline">
                                            <input id="" data-ht="15" value="15 L" type="radio" name="inline-form-radio">
					                        15 L
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="16" value="16 Lp" type="radio" name="inline-form-radio">
					                        16 Lp
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="17" value="17 Lf" type="radio" name="inline-form-radio">
					                        17 Lf
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="18" value="18 Td" type="radio" name="inline-form-radio">
					                        18 Td
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="19" value="19 Tn" type="radio" name="inline-form-radio">
					                        19 Tn
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="20" value="20 Pcg" type="radio" name="inline-form-radio">
					                        20 Pcg
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="21" value="21 Psg" type="radio" name="inline-form-radio">
					                        21 Psg
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="22" value="22 Sup" type="radio" name="inline-form-radio">
					                        22 Sup
                                        </label>                                        
                                        <label class="radio-inline">
                                            <input id="" data-ht="23" value="23 Vac" type="radio" name="inline-form-radio">
					                        23 Vac
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="24 Jft" type="radio" name="inline-form-radio">
					                        24 Jft
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="25 Aste" type="radio" name="inline-form-radio">
					                        25 Aste
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="26 Per_Adm" type="radio" name="inline-form-radio">
					                        26 Per_Adm
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="27 Serv. Mult" type="radio" name="inline-form-radio">
					                        27 Serv. Mult
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value=" 28 Serv. Ad. Mina" type="radio" name="inline-form-radio">
					                        28 Serv. Ad. Mina
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value=" 29 Tran Min" type="radio" name="inline-form-radio">
					                        29 Tran Min
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="30 Afiliación" type="radio" name="inline-form-radio">
					                        30 Afiliación
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="31 Tras Mat_E" type="radio" name="inline-form-radio">
					                        31 Tras Mat_E
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="35 Festividad" type="radio" name="inline-form-radio">
					                        35 Festividad
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="36" value="36 Cuarentena" type="radio" name="inline-form-radio">
					                        36 Cuarentena
                                        </label>
					                </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
                    <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-insert" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->


    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <!--Icons [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\icons.js"></script>

    <!--FooTable Example [ SAMPLE ]
    <script src=".\..\..\..\js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]
    <script src=".\..\..\..\plugins\fooTable\dist\footable.all.min.js"></script>-->

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
    <script src=".\..\..\..\js\tareo.js"></script>-->

    <script>
        document.addEventListener('DOMContentLoaded', e => {
            mainEvents();
        });
        const mainEvents = () => {
            let form_request1 = {
                "accion": "getTable",
            }
            fetchData(form_request1);
        }
        const fetchData = async (request) => {
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
                    "emptyTable": "No hay registro de labores",
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
                buttons: [{
                            text: '<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>',
                            action: function(e, dt, node, conf) {
                                $("#modal-insert").modal("show");

                            },
                            className: 'btn btn-success btn-labeled', //Primary class for all buttons
                            attr: {
                                title: 'Agregar nuevo labor',
                                id: 'btn-insert'
                            }
                        },
                        {
                            text: '<i class="btn-label fa fa-refresh"></i><span class="hidden-xs hidden-sm">Actualizar</span>',
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
                            className: 'btn btn-primary btn-labeled' //Primary class for all buttons
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
    </script>
</body>
</html>