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
					                            <h3 class="panel-title">INGRESO</h3>
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
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    <div class="row">

                        <h4 class="modal-title col-md-5">Ver Registro</h4>
                        <label for="view-valesExplosivo-digitador" class="col-md-1 control-label">Digitador</label>
                        <div class="col-md-1">
                            <input type="text" placeholder="..." class="form-control" name="digitador" id="view-valesExplosivo-digitador" value="" disabled>
                        </div>
                        <div class="col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="view-valesExplosivo-preImpreso" class="col-md-4 control-label">PreImpre</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="PreImpre" class="form-control" id="view-valesExplosivo-preImpreso" value="..." disabled>
                                   </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="view-valesExplosivo-nVale" class="col-md-4 control-label">n°Vale</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Nª Vale" class="form-control" id="view-valesExplosivo-nVale" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <!--Alert body-->
                    <div id="alerts-detail">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="bord-btm pad-ver text-main text-bold">DIRECCION DE PARTIDA</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">VIA TIPO</label>
                                        <div class="col-md-8">
                                            <!-- zona choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Via Tipo" >
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">N°</label>
                                        <div class="col-md-8">
                                            <!-- turno choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="N°" >
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="" class="col-md-4 control-label">DISTRITO</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="" placeholder="Fecha" disabled> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="bord-btm pad-ver text-main text-bold">DIRECCION DE LLEGADA</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborCodigo" class="col-md-4 control-label">Codigo</label>
                                        <div class="col-md-8">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-laborCodigo" placeholder="Codigo" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborNombre" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-laborNombre" placeholder="labor" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborNivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" id="view-valesExplosivo-laborNivel" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tipo de Disparo</label>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Avance" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Avance</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Realce" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Realce</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Breasting" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Breasting</label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Desquinche" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Desquinche</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Reperforacion" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Reperforacion</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Recarga" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Recarga</label>
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
                                                <input id="" class="magic-radio" type="radio" name="view-form-radio-tipo_en" value="Mineral" checked="">
                                                <label for="">Mineral</label>
                                            </div>
                                            <div class="radio">
                                                <input id="" class="magic-radio" type="radio" name="view-form-radio-tipo_en" value="Desmonte">
                                                <label for="">Desmonte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="bord-btm pad-ver text-main text-bold">REMITENTE</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <!-- zona choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-zona" placeholder="Zona" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-turno" class="col-md-4 control-label">Turno</label>
                                        <div class="col-md-8">
                                            <!-- turno choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-turno" placeholder="Turno" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="">
                                        <label for="view-valesExplosivo-fecha" class="col-md-4 control-label">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="view-valesExplosivo-fecha" placeholder="Fecha" disabled> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="bord-btm pad-ver text-main text-bold">DESTINATARIO</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborCodigo" class="col-md-4 control-label">Codigo</label>
                                        <div class="col-md-8">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-laborCodigo" placeholder="Codigo" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborNombre" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-laborNombre" placeholder="labor" disabled>
                                                <span class="fa fa-toggle-down form-control-icon"></span>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborNivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" id="view-valesExplosivo-laborNivel" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tipo de Disparo</label>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Avance" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Avance</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Realce" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Realce</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Breasting" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Breasting</label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Desquinche" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Desquinche</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Reperforacion" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Reperforacion</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Recarga" name="view-form-radio-tipo_disparo" id="">
                                                <label for="">Recarga</label>
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
                                                <input id="" class="magic-radio" type="radio" name="view-form-radio-tipo_en" value="Mineral" checked="">
                                                <label for="">Mineral</label>
                                            </div>
                                            <div class="radio">
                                                <input id="" class="magic-radio" type="radio" name="view-form-radio-tipo_en" value="Desmonte">
                                                <label for="">Desmonte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Materiales de Explosivos</p>
                            <div class="row">
                            <table class="table table-bordered table-hover toggle-circle" data-page-size="5">
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
                                            <input type="number" class="form-control" value="0" id="view-valesExplosivo-emulnorMil" name="" disabled>
                                        </td>
                                    </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000631</td>
                                            <td>Emulnor 3000</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-emulnorTresMil" name="" disabled>
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000568</td>
                                            <td>Dinamita Pulverulenta 65_7/8</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-dinPulv" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000632</td>
                                            <td>Carmex 7</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-carmexSiete" name="" disabled>
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000633</td>
                                            <td>Carmex 8</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-carmexOcho" name="" disabled>
                                            </td>                                                        
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000438</td>
                                            <td>Mecha Rapida</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-mechaRapida" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000436</td>
                                            <td>Mecha Lenta</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-mechaLenta" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000454</td>
                                            <td>Fulminante</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-Fulminante" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000514</td>
                                            <td>Conector para Mecha</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-conectorMecha" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000613</td>
                                            <td>Block de Sugeción</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-blkSugecion" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>MTC000077</td>
                                            <td>Car. cortado 13 cm</td>
                                            <td>UND</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-carCortado" name="" disabled>
                                            </td>
                                        </tr>
                                        <tr id="tr-tbody-tareo">
                                            <td>SSO 000439</td>
                                            <td>Dinamita Semigelatinosa de 65%</td>
                                            <td>CAR</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-dinSemi" name="" disabled>
                                            </td>                                                        
                                        </tr>
                                        <!--
                                        <tr>
                                            <td>SSO 000436</td>
                                            <td>Mecha</td>
                                            <td>MTS</td>
                                            <td data-type="number">
                                                <input type="number" class="form-control" value="0" id="view-valesExplosivo-mecha" name="" disabled>
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
                    
                    <button data-dismiss="modal" class="btn btn-default" type="button"> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Detalle Bootstrap Modal -->

    <!--Editar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-edit" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header bord-btm">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    <div class="row">

                        <h4 class="modal-title col-md-5 col-sm-12">Editar Registro</h4>

                        <div class="col-md-3 col-sm-4">
                            <div class="form-group">
                                <label for="edit-valesExplosivo-digitador" class="col-md-2 control-label">Digitador</label>
                                <div class="col-md-10">
                                    <input type="text" placeholder="..." class="form-control" name="digitador" id="edit-valesExplosivo-digitador" value="" disabled>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-4">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="edit-valesExplosivo-preImpreso" class="col-md-4 control-label">PreImpre</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="PreImpre" class="form-control" id="edit-valesExplosivo-preImpreso" value="..." disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="edit-valesExplosivo-nVale" class="col-md-4 control-label">n°Vale</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Nª Vale" class="form-control" name="fullname" id="edit-valesExplosivo-nVale" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal body-->
                <div class="modal-body">

                    <!--Alert body-->
                    <div id="alerts-Edit">
                        <div class="alert alert alert-info" style="margin:0">
                            <button class="close" data-dismiss="alert">
                                <i class="pci-cross pci-circle"></i>
                            </button>
                            <div class="media-left">
                                <span class="icon-wrap icon-wrap-xs icon-circle alert-icon">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="alert-title">Aviso!</h4>
                                <p class="alert-message">Estimado usuario se aplicara los cambios segun el usuario en automativo ...</p>
                            </div>
                        </div>					
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="bord-btm pad-ver text-main text-bold">Información General del Vale</p>
                            <div class="row">
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-zonaNombre" class="col-md-4 control-label">Zona <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input class="form-control" list="edit-dt-valesExplosivo-zonaNombre" id="edit-valesExplosivo-zonaNombre" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-zonaNombre">
                                                <option value="">Hubo un Error ! </option>
                                            </datalist>
                                            <template id="edit-tpt-zonaNombre">
                                                <option id="" value=""></option>
                                            </template>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-turno" class="col-md-4 control-label">Turno <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input class="form-control" list="edit-dt-valesExplosivo-turno" id="edit-valesExplosivo-turno" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-turno">
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                            </datalist>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-fecha" class="col-md-4 control-label">Fecha <span class="text-danger">*</span></label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Fecha" class="form-control" id="edit-valesExplosivo-fecha"  value=""> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="bord-btm pad-ver text-main text-bold">Detalle del Vale</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborCCosto" class="col-md-4 control-label">Codigo <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <input class="form-control" list="edit-dt-valesExplosivo-laborCCosto" id="edit-valesExplosivo-laborCCosto" placeholder="Eliga opción...">
                                                    <span class="fa fa-toggle-down form-control-icon"></span>
                                                    <datalist id="edit-dt-valesExplosivo-laborCCosto">
                                                        <option value="">Hubo un Error ! </option>
                                                    </datalist>
                                                    <template id="edit-tpt-laborCCosto">
                                                        <option id="" value=""></option>
                                                    </template>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborNombre" class="col-md-4 control-label">Labor</label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <input class="form-control" list="edit-dt-valesExplosivo-laborNombre" id="edit-valesExplosivo-laborNombre" placeholder="Eliga opción...">
                                                    <span class="fa fa-toggle-down form-control-icon"></span>
                                                    <datalist id="edit-dt-valesExplosivo-laborNombre">
                                                        <option value="">Hubo un Error ! </option>
                                                    </datalist>
                                                    <template id="edit-tpt-laborNombre">
                                                        <option id="" value=""></option>
                                                    </template>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborNivel" class="col-md-4 control-label">Nivel</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Nivel" class="form-control" id="edit-valesExplosivo-laborNivel" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tipo de Disparo <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Avance" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo1" checked="">
                                                <label for="edit-opcion-tipo_disparo1">Avance</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Realce" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo2">
                                                <label for="edit-opcion-tipo_disparo2">Realce</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Breasting" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo3" >
                                                <label for="edit-opcion-tipo_disparo3">Breasting</label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Desquinche" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo4">
                                                <label for="edit-opcion-tipo_disparo4">Desquinche</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Reperforacion" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo5">
                                                <label for="edit-opcion-tipo_disparo5">Reperforacion</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Recarga" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo6" >
                                                <label for="edit-opcion-tipo_disparo6">Recarga</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Disparo en <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                        <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input id="edit-demo-form-radio" class="magic-radio" type="radio" name="edit-form-radio-tipo_en" value="Mineral" checked="">
                                                <label for="edit-demo-form-radio">Mineral</label>
                                            </div>
                                            <div class="radio">
                                                <input id="edit-demo-form-radio-2" class="magic-radio" type="radio" name="edit-form-radio-tipo_en" value="Desmonte">
                                                <label for="edit-demo-form-radio-2">Desmonte</label>
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
                                    <div class="col-md-2 col-sm-4">
                                        <label for="edit-valesExplosivo-barra" class="col-md-4 control-label">Barra</label>
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                        <div class="col-md-8">
                                            <input class="form-control" list="edit-dt-valesExplosivo-barra" id="edit-valesExplosivo-barra" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-barra">
                                                <option value="0" selected>0</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                            </datalist>
                                        </div>                                        
                                        <!--===================================================-->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-lgtMt" class="col-md-4 control-label">Lgt (mt)</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-lgtMt">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-nTaladro" class="col-md-4 control-label">N° Taladros</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-nTaladro">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-talVacio" class="col-md-4 control-label">Tal_Vacio</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-talVacio">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-piesPerf" class="col-md-4 control-label">Pies Perf</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-piesPerf" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-piesReal" class="col-md-4 control-label">Pie Real</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-piesReal" disabled>
                                        </div> 
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-res_dinSemi" disabled>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-res_dinPulv" data-toggle="tooltip" data-placement="top" title="dinamita Pulverulenta" disabled>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-suma-dimPulv-dimSemi" disabled>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="col-md-3 col-sm-6">
                                        <label for="edit-valesExplosivo-nMaquinas" class="col-md-4 control-label">N° Maquina</label>
                                        <div class="col-md-8">
                                            <select class="form-control" data-placeholder="Seleccione N° Maquinas" id="edit-valesExplosivo-nMaquinas" tabindex="2">
                                                <option value="PA_20">PA_20</option>
                                                <option value="PA_30">PA_30</option>
                                                <option value="PA_36">PA_36</option>
                                                <option value="PS_04"></option>
                                                <option value="PS_05">PS_05</option>
                                                <option value="PS_06">PS_06</option>
                                                <option value="PS_07">PS_07</option>
                                                <option value="PSS_01">PSS_01</option>
                                                <option value="PSecan_01<">PSecan_01</option>
                                                <option value="PSecan_02<">PSecan_02</option>
                                                <option value="PSecan_03<">PSecan_03</option>
                                                <option value="PSecan_04<">PSecan_04</option>
                                                <option value="PSecan_05<">PSecan_05</option>
                                                <option value="PSecan_06<">PSecan_06</option>
                                                <option value="PSecan_07<">PSecan_07</option>
                                                <option value="PSecan_08<">PSecan_08</option>
                                                <option value="PSecan_09<">PSecan_09</option>
                                                <option value="PSecan_10<">PSecan_10</option>
                                                <option value="RNP_01">RNP_01</option>
                                                <option value="RNP_02">RNP_02</option>
                                                <option value="RNP_03">RNP_03</option>
                                                <option value="RNP_04">RNP_04</option>
                                                <option value="RNP_05">RNP_05</option>
                                                <option value="RNP_06">RNP_06</option>
                                                <option value="RNP_07">RNP_07</option>
                                                <option value="PT_03">PT_03</option>
                                                <option value="PT_04">PT_04</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-perforista" class="col-md-4 control-label">Perforista <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="edit-dt-valesExplosivo-perforista" id="edit-valesExplosivo-perforista" placeholder="Ingrese Nombre o Dni...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-perforista">
                                                <option value="">Hubo un Error ! </option>
                                            </datalist>
                                            <template id="edit-tpt-perforista">
                                                <option id="" value=""></option>
                                            </template>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Materiales de Explosivos</p>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover toggle-circle" data-page-size="5">
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
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-emulnoMil" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000631</td>
                                                <td>Emulnor 3000</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-emulnorTresmil" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000568</td>
                                                <td>Dinamita Pulverulenta 65_7/8</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-dinPulv" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000632</td>
                                                <td>Carmex 7</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carmexSiete" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000633</td>
                                                <td>Carmex 8</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carmexOcho" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000438</td>
                                                <td>Mecha Rapida</td>
                                                <td>MTS</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-mecha_mechaRapida" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000436</td>
                                                <td>Mecha Lenta</td>
                                                <td>MTS</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-mechaLenta" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000454</td>
                                                <td>Fulminantes</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-fuminante" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000514</td>
                                                <td>Conector para Mecha</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-conectorMecha" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000613</td>
                                                <td>Block de Sugeción</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-blockSugecion" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>MTC000077</td>
                                                <td>Car. cortado 13 cm</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carCortado13" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000439</td>
                                                <td>Dinamita Semigelatinosa de 65%</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-dinSemi" name="">
                                                </td>                                                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtnEdit-edit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!-- End Editar Bootstrap Modal -->

    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-insert" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm"  class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header bord-btm">                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    <div class="row">
                        
                        <h4 class="modal-title col-md-5">Ingreso de Documento</h4>
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
                                <label for="val_explosivo-text-form-n_vale" class="col-md-4 control-label">N° Documento
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Nª Vale" class="form-control" name="fullname" id="val_explosivo-text-form-n_vale" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <!--Alert body-->
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">DIRECCION DE PARTIDA</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">VIA TIPO</label>
                                        <div class="col-md-9">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Via tipo">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">VIA NOMBRE</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Via nombre">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="col-md-2 control-label">N°</label>
                                        <div class="col-md-10">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="N°">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">INTERIOR</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Interior">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">ZONA</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Zona">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">DISTRITO</label>
                                        <div class="col-md-8">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Distrito">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">PROV.</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Prov.">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">DEP.</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Dep.">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">DIRECCION DE LLEGADA</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="view-valesExplosivo-laborCodigo" class="col-md-3 control-label">VIA TIPO</label>
                                        <div class="col-md-9">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="view-valesExplosivo-laborCodigo" placeholder="Via tipo">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">VIA NOMBRE</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Via nombre">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="" class="col-md-2 control-label">N°</label>
                                        <div class="col-md-10">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="N°">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">INTERIOR</label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Interior">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">ZONA</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Zona">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">DISTRITO</label>
                                        <div class="col-md-8">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Distrito">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">PROV.</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Prov.">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-3 control-label">DEP.</label>
                                        <div class="col-md-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control" id="" placeholder="Dep.">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">REMITENTE</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="col-md-12">APELLIDOS Y NOMBRES / RAZÓN SOCIAL</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="" placeholder="Apellidos y nombres / Razón Social">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-12">R.U.C.:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="" placeholder="R.U.C.">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">DESTINATARIO</p>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="col-md-12">APELLIDOS Y NOMBRES / RAZÓN SOCIAL</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="" placeholder="Apellidos y nombres / Razón Social">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="col-md-12">R.U.C.:</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" id="" placeholder="R.U.C.">
                                        </div>
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
                                            <th style="width:30%">Descripción</th>
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

    <!--Date-MYSQL [ REQUIRED ]
    <script src="./../../../js/valeExplosivos.js"></script>-->

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="./../../../plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
    
    <!--Masked Input [ OPTIONAL ]-->
    <script src="./../../../plugins/masked-input/jquery.maskedinput.min.js"></script>

    <!--Form validation [ SAMPLE ]-->
    <script src="./../../../js/demo/form-validation.js"></script>
    <script>
        
        const alertEdit = document.getElementById('alerts-Edit');
        const datalist_zonaNombre = document.getElementById('edit-dt-valesExplosivo-zonaNombre');
        const datalist_laborCCosto = document.getElementById('edit-dt-valesExplosivo-laborCCosto');
        const datalist_perforistaNombres = document.getElementById('edit-dt-valesExplosivo-perforista');
        const templateDatalist_zonaNombre = document.getElementById('edit-tpt-zonaNombre').content;
        const templateDatalist_laborCCosto = document.getElementById('edit-tpt-laborCCosto').content;
        const templateDatalist_perforista_colaborador = document.getElementById('edit-tpt-perforista').content;
        const fragment = document.createDocumentFragment()
        var tableMaster;
        document.addEventListener('DOMContentLoaded', e => {
            mainEvents();
            $('#table-master thead tr').clone(true).addClass('filters').appendTo('#table-master thead');
            tableMaster = $('#table-master').DataTable
            ({
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
            const res = await fetch('./../../../controllers/controllerApis.php', {
                method: "POST",
                body
            });
            const data = await res.json()
            let rptSql = data['sql'];
        }
    </script>
</body>
</html>