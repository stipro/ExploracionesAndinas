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
					            <div class="panel-heading">
					                <h3 class="panel-title">VALES DE EXPLOSIVOS</h3>
					            </div>
					
					            <!--Data Table-->
					            <!--===================================================-->
					            <div class="panel-body">
					                <div class="pad-btm form-inline">
					                    <div class="row">
					                        <div class="col-sm-6 table-toolbar-left">
					                            <button id="btn-Agregar" data-target="#stack1" data-toggle="modal" class="btn btn-primary"><i class="demo-pli-add icon-fw"></i>Agregar</button>
					                            <a href="./../../excelGenerator.php?table=view_vales_explosivo" class="btn btn-default" download="" title="Descargar Archivo">
                                                    <i class="fa fa-file-excel-o icon-lg"></i>
                                                </a>
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
                                                        <select data-placeholder="Elija Columna" id="demo-chosen-select" tabindex="2">
                                                            <option value="codigo">codigo</option>
                                                            <option value="nombre">nombre</option>
                                                            <option value="cargo">cargo</option>
                                                        </select>
                                                    </div>
					                        </div>
					                    </div>
					                </div>
                                    <!-- Foo Table - Row Toggler -->
                                    <!--===================================================-->
                                    <div class="panel-body table-responsive">
                                        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                            <thead>
                                                <tr>
                                                    <th data-sort-ignore="true" class="min-width"></th>
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
                                                    <th data-hide="phone, tablet">Emulsion Emulnor 3000 I"X7"</th>
                                                    <th data-hide="phone, tablet">Mecha Rapida Z18</th>
                                                    <th data-hide="phone, tablet">Mecha</th>
                                                    <th data-hide="phone, tablet">Fulminante N°8</th>
                                                    <th data-hide="phone, tablet">Conector para Mecha</th>
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
                                                    <td id="codigo">..</td>
                                                    <td id="nombreCompleto"></td>
                                                    <td id="cargo"></td>
                                                    <td id="dia"></td>
                                                    <!--<td id="actividad">22 Jun 1972</td>-->
                                                    <td id="turno"></td>
                                                    <td id="ht"></td>
                                                    <td id="htSev_ad"></td>
                                                    <td id="costos"></td>
                                                    <td id="labor"></td>
                                                    <td id="nivel"></td>
                                                    <td id="hE"></td>
                                                    <td id="heSerAd"></td>
                                                    <td id="cCostosHe"></td>
                                                    <td id="VB"></td>
                                                    <td id="guardia"></td>
                                                    <td id="codActividad"></td>
                                                    <td id="Area">..</td>
                                                </tr>
                                                </template>
                                            <tfoot>
                                              <!-- Paginación -->
                                              <nav aria-label="Page navigation example">
                                                    <ul class="pagination" id="pagination">
                                                        <!--<li class="disabled"><a class="page-link" href="#">Anterior</a></li>-->

                                                        <!--
                                                            <li class="disabled"><span>...</span></li>
                                                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                                                        -->
                                                    </ul>
                                                    <template id="template-pagination">
                                                        <li id="itemPage" class="page-item"><a class="page-link" href="#">2</a></li>
                                                    </template>
                                                </nav>
                                            </tfoot>
                                        </table>
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
    <div id="stack1" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
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
                                            <option value="" selected></option>
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
                                        <input class="form-control" name="" id="val_explosivo-input-form-pies_perf" disabled>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <label for="val_explosivo-input-form-pies_real" class="col-md-1 control-label">Pie Real</label>
                                    <div class="col-md-1">
                                        <input class="form-control" name="" id="val_explosivo-input-form-pies_real" disabled>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" id="val_explosivo-text-form-resdin_semi" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" id="val_explosivo-text-form-resdin_pulv" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <input class="form-control" type="number" name="" id="suma-dimPulv-dimSemi" disabled>
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
                                            <option value="">RNP_01</option>
                                            <option value="">RNP_02</option>
                                            <option value="">RNP_03</option>
                                            <option value="">RNP_04</option>
                                            <option value="">RNP_05</option>
                                            <option value="">RNP_06</option>
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
    <!--End Default Bootstrap Modal-->    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript;?>

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
        $('.chosenTurno').chosen();
    </script>
</body>
</html>