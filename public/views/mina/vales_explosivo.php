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
        /* #table-master thead input {
        width: 20%; 
    }*/
    </style>
    <?php echo $template_header_css; ?>

    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="./../../../plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="./../../../plugins/chosen/chosen.min.css" rel="stylesheet">

    <!--noUiSlider [ OPTIONAL ]-->
    <link href="./../../../plugins/noUiSlider/nouislider.min.css" rel="stylesheet">

    <!--Select2 [ OPTIONAL ]-->
    <link href="./../../../plugins/select2/css/select2.min.css" rel="stylesheet">

    <!--Demo [ DEMONSTRATION ]-->
    <link href="./../../../css/demo/nifty-demo.min.css" rel="stylesheet">

    <!--Themify Icons [ OPTIONAL ]-->
    <link href="./../../../plugins/themify-icons/themify-icons.min.css" rel="stylesheet">

    <!--FooTable [ OPTIONAL ]
    <link href="./../../../plugins/fooTable/css/footable.core.css" rel="stylesheet">-->

    <!--Ion Icons [ OPTIONAL ]-->
    <link href="./../../../plugins/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="./../../../plugins/chosen/chosen.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="./../../../css/valeExplosivos.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="./../../../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="./../../../plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">

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
					                            <h3 class="panel-title">VALES DE EXPLOSIVOS</h3>
					                        </div>
                                        </legend>
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="table-master">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="20% !important">PreImpreso</th>
                                                        <th>Fecha</th>
                                                        <th>cód. Registro</th>
                                                        <th>N. Vale</th>
                                                        <th>Turno</th>                                                       
                                                        <th>Zona</th>
                                                        <th>C. Costos</th>
                                                        <th>Nombre</th>
                                                        <th>Nivel</th>
                                                        <th>Tipo Disparo</th>
                                                        <th>Disparo en</th>
                                                        <th class="all">Operaciónes</th>
                                                        <!-- <th data-sort-ignore="true" class="min-width"></th>
                                                        <th data-sort-initial="true" data-toggle="true">Usuario</th>
                                                        <th>Fecha</th>
                                                        <th data-hide="phone, tablet">Zona</th>
                                                        <th data-hide="phone, tablet">N° Vale</th>
                                                        <th data-hide="phone, tablet">Turno</th>
                                                        <th data-hide="phone, tablet">preImpreso</th>
                                                        <th data-hide="phone, tablet">Labor</th>
                                                        <th data-hide="phone, tablet">tip Disparo</th>
                                                        <th data-hide="phone, tablet">Colaborador</th>
                                                        <th data-hide="phone, tablet">TipEn</th>
                                                        <th data-hide="phone, tablet">Barra</th>
                                                        <th data-hide="phone, tablet">Lgt</th>
                                                        <th data-hide="phone, tablet">n° Taladro</th>
                                                        <th data-hide="phone, tablet">Taladro Vacio</th>
                                                        <th data-hide="phone, tablet">Pie Perforado</th>
                                                        <th data-hide="phone, tablet">n° Maquina</th>
                                                        <th data-hide="phone, tablet">Din Semigelationsa 65</th>
                                                        <th data-hide="phone, tablet">Din Semigelationsa Calculado</th>
                                                        <th data-hide="phone, tablet">Din Pulverulenta 65</th>
                                                        <th data-hide="phone, tablet">Din Pulverulenta 65 Calculado</th>
                                                        <th data-hide="phone, tablet">Emulnor 1000</th>
                                                        <th data-hide="phone, tablet">Emulsion Emulnor 3000 I"X7"</th> -->
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
            <?php echo $template_aside ?>
            <!--===================================================-->
            <!--END ASIDE-->

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php echo $template_MainNavigation ?>
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

    <!--Detalle Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-detail" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Detalle Registro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-detail">
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button id="mbtn-edit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Detalle Bootstrap Modal -->

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
    <!-- End Editar Bootstrap Modal -->
    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-insert" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm"  class="modal-dialog modal-lg" style="margin: 1rem;">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    <div class="row">
                        
                        <h4 class="modal-title col-md-5">Ingreso de Vales de Explosivos</h4>
                        <label for="val_explosivo-ipt-text-form-digitador" class="col-md-1 control-label">Digitador</label>
                        <div class="col-md-1">
                            <input type="text" placeholder="..." class="form-control" name="digitador" id="val_explosivo-ipt-text-form-digitador" data-id="<?php echo $_SESSION["id"]?>" value="<?php echo $_SESSION["name"]?>" disabled>
                        </div>
                        <div class="col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="val_explosivo-text-form-pre_impre" class="col-md-4 control-label">PreImpre</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="PreImpre" class="form-control" id="val_explosivo-text-form-pre_impre" value="..." disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="val_explosivo-text-form-n_vale" class="col-md-4 control-label">n°Vale</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Nª Vale" class="form-control" name="fullname" id="val_explosivo-text-form-n_vale" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="bord-btm pad-ver text-main text-bold">Información General del Vale</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="val_explosivo-text-form-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <select class="form-control chosenZona" data-placeholder="Elija una Zona ..." id="val_explosivo-text-form-zona" tabindex="2">
                                                <option value="#">Hubo un Error ! </option>
                                            </select>
                                            <template id="template-opt-zona">
                                                <option id="0" value="" selected></option>
                                                <option id="optzona" value="">A</option>
                                            </template>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="val_explosivo-text-form-turno" class="col-md-4 control-label">Turno</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <select class="form-control chosenTurno" data-placeholder="Elija un Turno ..." id="val_explosivo-text-form-turno" tabindex="2">
                                                <option value="0" selected></option>
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                            </select>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="val_explosivo-text-form-fecha" class="col-md-4 control-label">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="val_explosivo-text-form-fecha"  value="<?php echo date('Y-m-d') ?>" > <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="bord-btm pad-ver text-main text-bold">Detalle del Vale</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="val_explosivo-ipt-text-form-digitador" class="col-md-4 control-label">Codigo</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <select class="form-control chosenLabCodigo" data-placeholder="Elige un Codigo" id="val_explosivo-text-form-labor_codigo" tabindex="2">
                                            </select>
                                            <template id="template-opt-ccostos">
                                                <option id="" value="" selected></option>
                                                <option id="optccostos" value="" ></option>
                                            </template>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="val_explosivo-ipt-text-form-digitador" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <select class="form-control chosenLabNombre" data-placeholder="Elige un Codigo" id="val_explosivo-text-form-labor" tabindex="2">
                                                <option value=""></option>
                                            </select>
                                            <template id="template-opt-labor_nombre">
                                                <option id="0" value="" ></option>
                                                <option id="optlabNombre" value="" selected></option>
                                            </template>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="val_explosivo-text-form-nivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" id="val_explosivo-text-form-nivel" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tipo de Disparo</label>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Avance" name="form-radio-tipo_disparo" id="opcion-tipo_disparo1" checked="">
                                                <label for="opcion-tipo_disparo1">Avance</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Realce" name="form-radio-tipo_disparo" id="opcion-tipo_disparo2">
                                                <label for="opcion-tipo_disparo2">Realce</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Breasting" name="form-radio-tipo_disparo" id="opcion-tipo_disparo3" >
                                                <label for="opcion-tipo_disparo3">Breasting</label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Desquinche" name="form-radio-tipo_disparo" id="opcion-tipo_disparo4">
                                                <label for="opcion-tipo_disparo4">Desquinche</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Reperforacion" name="form-radio-tipo_disparo" id="opcion-tipo_disparo5">
                                                <label for="opcion-tipo_disparo5">Reperforacion</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Recarga" name="form-radio-tipo_disparo" id="opcion-tipo_disparo6" >
                                                <label for="opcion-tipo_disparo6">Recarga</label>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Disparo en</label>
                                        <div class="col-md-8">
                                        <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input id="demo-form-radio" class="magic-radio" type="radio" name="form-radio-tipo_en" value="Mineral" checked="">
                                                <label for="demo-form-radio">Mineral</label>
                                            </div>
                                            <div class="radio">
                                                <input id="demo-form-radio-2" class="magic-radio" type="radio" name="form-radio-tipo_en" value="Desmonte">
                                                <label for="demo-form-radio-2">Desmonte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Registro de Perforadoras</p>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-barra" class="col-md-1 control-label">Barra</label>
                                    <div class="col-md-1">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                        <select class="form-control" data-placeholder="Barra" id="val_explosivo-input-form-barra" tabindex="2">
                                            <option value="0" selected>0</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                        </select>
                                        <!--===================================================-->
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-lgt_mt" class="col-md-1 control-label">Lgt (mt)</label>
                                    <div class="col-md-1">
                                        <input class="form-control" value="0" name="" id="val_explosivo-input-form-lgt_mt">
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-n_taladro" class="col-md-1 control-label">N° Taladros</label>
                                    <div class="col-md-1">
                                        <input class="form-control" value="0" name="" id="val_explosivo-input-form-n_taladro">
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-tal_vacio" class="col-md-1 control-label">Tal_Vacio</label>
                                    <div class="col-md-1">
                                        <input class="form-control" value="0" name="" id="val_explosivo-input-form-tal_vacio">
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-pies_perf" class="col-md-1 control-label">Pies Perf</label>
                                    <div class="col-md-1">
                                        <input class="form-control" value="0" name="" id="val_explosivo-input-form-pies_perf" disabled>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-pies_real" class="col-md-1 control-label">Pie Real</label>
                                    <div class="col-md-1">
                                        <input class="form-control" value="0" name="" id="val_explosivo-input-form-pies_real" disabled>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" value="0" id="val_explosivo-text-form-resdin_semi" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" value="0" id="val_explosivo-text-form-resdin_pulv" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" value="0" id="suma-dimPulv-dimSemi" disabled>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-text-form-nmaquinas" class="col-md-1 control-label">N° Maquina</label>
                                    <div class="col-md-2" id="contenedor-Perforista">
                                        <select class="form-control chosenNMaquina" data-placeholder="Seleccione N° Maquinas" id="val_explosivo-text-form-nmaquinas" tabindex="2">
                                            <option value=""></option>
                                            <option value="">PA_20</option>
                                            <option value="">PA_30</option>
                                            <option value="">PA_36</option>
                                            <option value="">PS_04</option>
                                            <option value="">PS_05</option>
                                            <option value="">PS_06</option>
                                            <option value="">PS_07</option>
                                            <option value="">PSS_01</option>
                                            <option value="">PSecan_01</option>
                                            <option value="">PSecan_02</option>
                                            <option value="">PSecan_03</option>
                                            <option value="">PSecan_04</option>
                                            <option value="">PSecan_05</option>
                                            <option value="">PSecan_06</option>
                                            <option value="">PSecan_07</option>
                                            <option value="">PSecan_08</option>
                                            <option value="">PSecan_09</option>
                                            <option value="">PSecan_10</option>
                                            <option value="">RNP_01</option>
                                            <option value="">RNP_02</option>
                                            <option value="">RNP_03</option>
                                            <option value="">RNP_04</option>
                                            <option value="">RNP_05</option>
                                            <option value="">RNP_06</option>
                                            <option value="">RNP_07</option>
                                            <option value="">PT_03</option>
                                            <option value="">PT_04</option>
                                        </select>                                            
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-text-form-perforista" class="col-md-1 control-label">Perforista</label>
                                    <div class="col-md-2" id="contenedor-Perforista">
                                        <select class="form-control chosenPerforistaName" data-placeholder="Ingrese Nombre o Dni" id="val_explosivo-text-form-perforista" tabindex="2">
                                            <option value=""></option>
                                        </select>
                                        <template id="template-opt-perforista">
                                            <option id="0" value="" selected></option>
                                            <option id="opt-perforista" value="">A</option>
                                        </template>                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Materiales de Explosivos</p>
                            <div class="row">
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                    <colgroup>
                                        <col span="3">
                                        <col span="1" style="border-left: 2px solid #295C80">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th style="width:20%" data-sort-initial="true" data-toggle="true">Código</th>
                                            <th style="width:30%">Nombre del Material de Explosivo</th>
                                            <th style="width:20%" data-hide="phone, tablet">Unid. Medida</th>
                                            <th data-hide="phone, tablet">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-tareo">
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000652</td>
                                            <td>Emulnor 1000</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-emulnor_mil" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000631</td>
                                            <td>Emulnor 3000</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-emulnor_tresmil" name="">
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000568</td>
                                            <td>Dinamita Pulverulenta 65_7/8</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-valdin_pulv" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000632</td>
                                            <td>Carmex 7</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-carmexsiete" name="">
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000633</td>
                                            <td>Carmex 8</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-carmexocho" name="">
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000438</td>
                                            <td>Mecha Rapida</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-mecha_rapida_zdiesocho" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000436</td>
                                            <td>Mecha Lenta</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-mecha_lenta" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000454</td>
                                            <td>Fulminantes</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-fuminante_ocho" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000514</td>
                                            <td>Conector para Mecha</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-conecto_mecha" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000613</td>
                                            <td>Block de Sugeción</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-blSugecion" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>MTC000077</td>
                                            <td>Car. cortado 13 cm</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-carcortado13" name="">
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000439</td>
                                            <td>Dinamita Semigelatinosa de 65%</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-valdin_semi" name="">
                                            </td>                                                        
                                        </tr>
                                        <!--
                                        
                                        
                                        
                                        <tr>
                                            <td>SSO 000436</td>
                                            <td>Mecha</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="val_explosivo-text-form-mecha" name="">
                                            </td>
                                        </tr>
                                    -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button id="mbtn-new" class="btn btn-primary">Nuevo</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button data-toggle="modal" class="btn btn-success" href="#stack2" id="mbtn-insert">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Insertar Bootstrap Modal-->    
    
      <!-- Modal-->
    <div class="modal fade" id="mi_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">TITULO</h4>
            </div>
            <div class="modal-body">
            <div class="row" style="padding:15px">
                ESPACIO PARA TEXTO ESPACIO PARA TEXTO ESPACIO PARA TEXTO ESPACIO PARA TEXTO ESPACIO PARA TEXTO
                ESPACIO PARA TEXTO                   
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript;?>
    <!--Aleta-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--Icons [ SAMPLE ]-->
    <script src="./../../../js/demo/icons.js"></script>

    <!--FooTable Example [ SAMPLE ]
    <script src="./../../../js/demo/tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]
    <script src="./../../../plugins/fooTable/dist/footable.all.min.js"></script>-->

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="./../../../plugins/bootstrap-select/bootstrap-select.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="./../../../plugins/chosen/chosen.jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="./../../../plugins/select2/js/select2.min.js"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="./../../../js/demo/form-component.js"></script>

    <!--Panel [ SAMPLE ]-->
    <script src="./../../../js/demo/ui-panels.js"></script>

    <!--Date-MYSQL [ REQUIRED ]-->
    <script src="./../../../js/valeExplosivos.js"></script>

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="./../../../plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
    
    <!--Masked Input [ OPTIONAL ]-->
    <script src="./../../../plugins/masked-input/jquery.maskedinput.min.js"></script>

    <!--Form validation [ SAMPLE ]-->
    <script src="./../../../js/demo/form-validation.js"></script>
    <script>
        var tableMaster;
        document.addEventListener('DOMContentLoaded', e => {
            mainEvents();
            $('#table-master thead tr').clone(true).addClass('filters').appendTo('#table-master thead');
            tableMaster = $('#table-master').DataTable
            ({
                //* Activa el desplazamiento horizontal agregar class a tabla(nowrap)
                scrollX: true,
                //* Forzará la altura de la ventana gráfica de la tabla segun al tamaño indicado
                //scrollY: 400,
                //scrollCollapse: true,
                //* Configuracion columna filtro
                responsive: true,
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
                        $(cell).html('<input class="form-control" type="text" placeholder="Buscar ' + title + '" />');
    
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
                /* fixedColumns: {
                    right: 1,
                }, */
                order: [[ 1, "desc" ]],
                columns: [
                    {
                        data: "valexplosivo_preimpresor",
                        responsivePriority: 1,
                        //width: "50% !important",
                    },
                    {
                        data: "valexplosivo_fecha",
                    },
                    {
                        data: "valexplosivo_preimpresor",
                    },
                    {
                        data: "valexplosivo_nvale",
                    },
                    {
                        data: "valexplosivo_turno",
                    },
                    {
                        data: "labZona_nombre",
                    },
                    {
                        data: "lab_ccostos",
                    },
                    {
                        data: "labNombre_nombre",
                    },
                    {
                        data: "lab_nivel",
                    },
                    {
                        data: "valexplosivo_tipDisparo",
                    },
                    {
                        data: "valexplosivo_tipEn",
                    },
                    {
                        defaultContent: '<button type="button" class="btn-view btn btn-success btn-tableMaster-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tableMaster-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
                    }
                ],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay registro de ",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_",
                    "infoEmpty": "Mostrando 0 to 0 of 0 ",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ ",
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
                dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                buttons: [
                    {
                        text: '<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>',
                        action: function(e, dt, node, conf) {
                            const form_request1 = {
                                "accion": "getLast_record",
                            }
                            getLast_record(form_request1);
                            // Funcion para enfocar input
                            setTimeout(function() {
                            // JQUERY
                            // $('#val_explosivo-text-form-n_vale').focus();
                            // JAVASCRIPT
                            inputNVale.focus();
                            }, 1000);
                            //Capturo posible error compatibilidad con navegador
                            /* try {
                                nvalzfill = nvale, padStart(7, 0);
                            } catch (e) {
                                nvalzfill = zfill(nvale, 7);
                                // Manejar Errores
                                //console.error('Se encontro error : '+e);
                                //console.error('Nombre : '+e.name);
                                //console.error('Mensaje : '+e.message);
                                } finally {
                                    // Obtengo N° vale
                                    inputNVale.value = nvalzfill;
                                } */

                            //Preparamos formato
                            var selectCodZonaForm = {
                                "accion": "getSelect_zonaNombre",
                            }
                            var selectCostLaborForm = {
                                "accion": "getcolumnAll",
                                "column": "lab_ccostos"
                            }
                            var selectPerforistaForm = {
                                "accion": "getcolumnAll",
                                "column": "col_nombres"
                            }

                            // Enviamos Formato Zona
                            fetchDataZona(selectCodZonaForm);

                            // Enviamos Formato Labor
                            fetchDataLabor(selectCostLaborForm);

                            // Enviamos Formato Perforista
                            fetchDataPerforista(selectPerforistaForm);
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
                        //* Botones
                        buttons: [
                            //* Boton exportar copiar
                            {
                                //* Indicar Acción
                                extend: 'copy',
                                //* Mensaje hove
                                titleAttr: 'Copiar Tabla',
                                //
                                title: '',
                                //* Clases agregados
                                className: 'btn-labeled',
                                //* Texto u Boton
                                text: '<i class="btn-label fas fa-copy"></i> Copiar',
                                //* Indicar que columns se usará
                                exportOptions: {
                                    columns: [0,1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                }
                            },
                            {
                                extend: 'excel',
                                text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                                titleAttr: 'Excel',
                                title: '',
                                className: 'btn-labeled',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                }
                            },
                            {
                                extend: 'csv',
                                text: '<i class="btn-label fa fa-file-csv"></i> CSV',
                                titleAttr: 'CSV',
                                className: 'btn-labeled',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="btn-label fa fa-file-pdf-o"></i> PDF',
                                titleAttr: 'PDF',
                                className: 'btn-labeled',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                                }
                            },
                        ]
                    },
                    {
                        text: '<i class="btn-label fa fa-file-excel-o"></i><span class="hidden-xs"> Excel</span>',
                            className: 'btn btn-primary', //Primary class for all buttons
                        tag: 'a',
                        action: function(e, dt, node, config) {
                            //This will send the page to the location specified
                            window.location.href = './../../excelGenerator.php?table=view_vales_explosivo';
                        },
                        init: function(dt, node, config) {
                            $(node).attr('href', './../../excelGenerator.php?table=view_vales_explosivo');
                            $(node).attr('download', '');
                            $(node).attr('title', 'Descargar Archivo');
                        }
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
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
        //* CONFIGURACIONES EXTERNOS
        });
        const mainEvents = () => {
            let form_request1 = {
                "accion": "table",
            }
            fetchData(form_request1);
        }
        const fetchData = async (request) => {
            const body = new FormData();
            body.append("data", JSON.stringify(request));
            const res = await fetch('./../../../controllers/controllerValeExplosivoList.php', {
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
        $('.chosenTurno').chosen();
        // Setup - add a text input to each footer cell
        // ARREGLAR RESPONSIVE
        
        let options = {
            "sScrollX": "100%",
            "sScrollXInner": "110%",
            "bScrollCollapse": true,
            "colReorder": true
        };
        
        
        $('#table-master tbody').on('click', '.btn-tableMaster-detalle', function() {
            $("#modal-detail").modal("show");
        const data = tableMaster.row($(this).parents('tr')).data();
        alert("El id: " + data['valexplosivo_preimpresor']);
        });

        $('#table-master tbody').on('click', '.btn-tableMaster-edit', function() {
            const data = tableMaster.row($(this).parents('tr')).data();
            //alert("El id: " + data['id_operacionMina']);
            $("#modal-edit").modal("show");
            getRecord(data['valexplosivo_preimpresor']);
        });
        //* ELIMINAR REGISTRO
        $('#table-master tbody').on('click', '.btn-tableMaster-delet', function() {
            mainEvents()
            var data = tableMaster.row($(this).parents('tr')).data();
            console.log(data);
            swal({
                title: "Estas seguro?",
                text: "Una vez eliminado, no podrá recuperarlo!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var form_request = {
                        "accion": "delete",
                        "id": data['valexplosivo_preimpresor']
                    }
                    console.log(form_request);
                    requestDelete(form_request);
                    swal("¡La información ha sido eliminado!", {
                        icon: "success",
                    });
                } else {
                    swal("¡La información está a salvo!");
                }
            });
        });
        // Se envia Formulario
        const requestDelete = async (form_request) => {
            const body = new FormData();
            body.append("data", JSON.stringify(form_request));
            const returned = await fetch("./../../../controllers/controllerValeExplosivo.php", {
                method: "POST",
                body
            });
            const result = await returned.json(); //await JSON.parse(returned);

            afterRequestInsert(result);
        }
        //*
        const getLast_record = async (request) => {
            const body = new FormData();
            body.append("data", JSON.stringify(request));
            const res = await fetch('./../../../controllers/controllerValeExplosivoList.php', {
                method: "POST",
                body
            });
            const data = await res.json();
            rptSql = data['sql'];
            paintNVale(rptSql);
        }

        //*
        const paintNVale = async (rptSql) => {
            
            nvalAnterior = rptSql[0]['valexplosivo_nvale'];
            console.log(nvalAnterior);
            nvaleProx = parseInt(nvalAnterior)+parseInt(1);
            try {
                valZFill_nvalProx = zfill(nvaleProx, 6);
                console.log(zfill(nvaleProx, 6)); //00324 
            } catch (e) {
                nvalzfill = zfill(nvale, 6);
                // Manejar Errores
                //console.error('Se encontro error : '+e);
                //console.error('Nombre : '+e.name);
                //console.error('Mensaje : '+e.message);
            } finally {
                // Obtengo N° vale
                inputNVale.value = valZFill_nvalProx;
            }
        }
    </script>
</body>
</html>