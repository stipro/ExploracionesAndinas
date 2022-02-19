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
    <link href=".\..\..\..\css\valeExplosivos.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\font-awesome\css\font-awesome.min.css" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-validator\bootstrapValidator.min.css" rel="stylesheet">

    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-timepicker\bootstrap-timepicker.min.css" rel="stylesheet">


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-datepicker\bootstrap-datepicker.min.css" rel="stylesheet">

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
					                <h3 class="panel-title">Extracción Mina</h3>
					            </div>
					
					            <div class="panel-body">
					                <div class="pad-btm form-inline">
					                    <div class="row">
					                        <div class="col-sm-6 table-toolbar-left">
					                            <button id="btn-Agregar" data-target="#demo-lg-modal" data-toggle="modal" class="btn btn-primary"><i class="demo-pli-add icon-fw"></i>Agregar</button>
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
    <!--===================================================-->
    <!--End Editar Bootstrap Modal-->
    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-lg-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm"  class="modal-dialog" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">                    
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title col-md-7">Registro de Extracción de Mineral</h4>            
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <p class="bord-btm pad-ver text-main text-bold"><!--Titulo Fragmento--></p>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="insert-extrMineral-fecha-extracion" class="col-md-4 control-label">Fecha Extracción</label>
                                    <div class="col-md-8">                                                    
                                        <input type="date" placeholder="Dia" class="form-control" id="insert-extrMineral-fecha-extracion"  value="<?php echo date('Y-m-d') ?>" > <!--min="2021-12-12" max="2021-12-13"-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-locomotora" class="col-md-4 form-label">Locomotora:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions-Locomotora" id="insert-extrMineral-locomotora" placeholder="Ingrese Extractor...">
                                    </div>                                        
                                    <datalist id="datalistOptions-Locomotora">
                                        <option value="LM-1">
                                        <option value="LM-2">
                                        <option value="LM-3">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-tolva" class="col-md-4 form-label">Tolva:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions-Tolva" id="insert-extrMineral-tolva" placeholder="Ingrese Tolva...">
                                    </div>                                        
                                    <datalist id="datalistOptions-Tolva">
                                        <option value="Tolva-1">
                                        <option value="Tolva-2">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="insert-extrMineral-unidadEmpresa" class="col-md-4 form-label">Uni Empresa:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions-UniEmpresa" id="insert-extrMineral-unidadEmpresa" placeholder="Ingrese Contrata...">
                                    </div>                                        
                                    <datalist id="datalistOptions-UniEmpresa">
                                        <option value="San Andres">
                                        <option value="Huinllo">
                                        <option value="Torrellas">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-motorista" class="col-md-4 form-label">Motorista/Scooper:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions-motorista" id="insert-extrMineral-motorista" placeholder="Ingrese Motorista/Scooper...">
                                    </div>                                        
                                    <datalist id="datalistOptions-motorista">
                                        <option value="...">
                                    </datalist>
                                    <template id="template-opt-motorista">
                                        <option id="template-opts-motorista" value="">
                                    </template>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-ayudante" class="col-md-4 form-label">Ayudante:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions-ayudante" id="insert-extrMineral-ayudante" placeholder="Ingrese Ayudante...">
                                    </div>                                        
                                    <datalist id="datalistOptions-ayudante">
                                        <option value="...">
                                    </datalist>
                                    <template id="template-opt-ayudante">
                                        <option id="template-opts-ayudante" value="">
                                    </template>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="insert-extrMineral-zona" class="col-md-4 form-label">Zona:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions" id="insert-extrMineral-zona" placeholder="Ingrese Zona...">
                                    </div>                                        
                                    <datalist id="datalistOptions">
                                        <option value="San Andres">
                                        <option value="willo">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-nivel" class="col-md-4 form-label">Nivel:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions" id="insert-extrMineral-nivel" placeholder="Ingrese Nivel...">
                                    </div>                                        
                                    <datalist id="datalistOptions">
                                        <option value="San Andres">
                                        <option value="willo">
                                    </datalist>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="insert-extrMineral-fech-Digitacion" class="col-md-4 control-label">Fecha Digitacion</label>
                                    <div class="col-md-8">                                                    
                                        <input type="date" placeholder="Dia" class="form-control" id="insert-extrMineral-fech-Digitacion"  value="<?php echo date('Y-m-d') ?>" > <!--min="2021-12-12" max="2021-12-13"-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-guardia-normal" class="col-md-4 form-label">Guardia Normal:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" list="datalistOptions" id="insert-extrMineral-guardia-normal" placeholder="Ingrese Guardia...">
                                    </div>                                        
                                    <datalist id="datalistOptions">
                                        <option value="A: [11:20 - 20:51]">
                                        <option value="">
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="insert-extrMineral-hrs-extractor" class="col-md-4 control-label">Hrs. Operación Extractor</label>
                                    <div class="col-md-8">                                                    
                                        <!--Bootstrap Timepicker : Component-->
					                    <!--===================================================-->
					                    <div class="input-group date">
					                        <input id="insert-extrMineral-hrs-extractor" type="time" class="form-control">
					                        <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
					                    </div>
					                    <!--===================================================-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="insert-extrMineral-observacion" class="col-md-4 control-label">Observaciones:</label>
                                    <textarea class="form-control" id="insert-extrMineral-observacion" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="insert-option-table-detalleExtraccion" type="button" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Detalle de Extracción</p>
                            <div class="row">                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="insert-extrMineral-codigo" class="col-md-4 form-label">Código:</label>
                                        <!-- <div class="col-md-8">
                                            <input class="form-control" list="options-codigo" id="insert-extrMineral-codigo" placeholder="Ingrese Código...">
                                        </div>                                        
                                        <datalist id="options-codigo">
                                            <option value="1">
                                            <option value="2">
                                        </datalist> -->
                                        <select class="selectpicker col-md-8" id="insert-extrMineral-codigo" name="browser">
                                            <option value="Mineral" selected>1</option>
                                            <option value="Desmonte">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="insert-extrMineral-descripcion" class="col-md-4 form-label">Descripción:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="Mineral" list="options-descripcion-ExtracionMineral" id="insert-extrMineral-descripcion" placeholder="Ingrese Descripción..." disabled>
                                        </div>                                        
                                        <!-- <datalist id="options-descripcion-ExtracionMineral">
                                            <option value="Mineral">
                                            <option value="Desmonte">
                                        </datalist> -->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="insert-extrMineral-programa" class="col-md-4 form-label">Programa:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="optionsPrograma" id="insert-extrMineral-programa" placeholder="Ingrese Programa...">
                                        </div>                                        
                                        <datalist id="optionsPrograma">
                                            <option value="[TODAS]">
                                            <option value="">
                                        </datalist>
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="table-responsive table-hover">
                                    <table class="table" id="detalleExtraccion">
                                        <thead>
                                            <tr>
                                                <th scope="col">Empresa Esp.</th>
                                                <th scope="col">Tolva</th>
                                                <th scope="col">Código</th>
                                                <th scope="col">Labor</th>
                                                <th scope="col">Zona</th>
                                                <th scope="col">Nivel</th>
                                                <th scope="col">Veta</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Programa</th>
                                                <th scope="col">Sección</th>
                                                <th scope="col">Roca</th>
                                                <th scope="col">Equipo Limpieza</th>
                                                <th scope="col">Fec. Creación</th>
                                                <th scope="col">N° Cole.</th>

                                            </tr>
                                        </thead>
                                        <tbody id="detalleExtraccion-body">
                                        </tbody>
                                    </table>
                                    <template id="template-detalleExtraccion">
                                        <tr>
                                            <td id="template-tds-uni_empresa"></td>
                                            <td id="template-tds-tolva"></td>
                                            <td id="template-tds-codigo"></td>
                                            <td id="template-tds-labor"></td>
                                            <td id="template-tds-zona"></td>
                                            <td id="template-tds-nivel"></td>
                                            <td id="template-tds-veta"></td>
                                        </tr>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Detalle de Material Extraido:</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive table-hover">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tipo Mat</th>
                                                    <th scope="col">Cant. Carros</th>
                                                    <th scope="col">Cod Tolva</th>
                                                    <th scope="col">Nombre Tolva Destino</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Extractor</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                    <th>1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>Jacob</td>
                                                    <td>Thornton</td>
                                                    <td>@fat</td>
                                                    <th>1</th>
                                                    <td>Mark</td>
                                                    <td>Otto</td>
                                                    <td>@mdo</td>
                                                </tr>
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
                    <button id="mbtn-new" class="btn btn-primary">Nuevo</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button data-toggle="modal" class="btn btn-success" href="#stack2" id="mbtn-insert">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Insertar Bootstrap Modal-->
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript;?>


    <!--=================================================-->
    
    <!--Demo script [ DEMONSTRATION ]
    <script src="..\js\demo\nifty-demo.min.js"></script>-->

    <!--Icons [ SAMPLE ]-->
    <script src="./../../../js\demo\icons.js"></script>

    <!--FooTable Example [ SAMPLE ]
    <script src="./../../../js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]
    <script src="./../../../plugins\fooTable\dist\footable.all.min.js"></script>-->

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="./../../../plugins\bootstrap-select\bootstrap-select.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="./../../../plugins\chosen\chosen.jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="./../../../plugins\select2\js\select2.min.js"></script>

    <!--Panel [ SAMPLE ]-->
    <script src="./../../../js\demo\ui-panels.js"></script>

    <!--Date-MYSQL [ REQUIRED ]-->
    <script src="./../../../js\extraccionMineral.js"></script>

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="./../../../plugins\bootstrap-validator\bootstrapValidator.min.js"></script>
    
    <!--Masked Input [ OPTIONAL ]-->
    <script src="./../../../plugins\masked-input\jquery.maskedinput.min.js"></script>

    
    <!--Bootstrap Timepicker [ OPTIONAL ]-->
    <script src="./../../../plugins\bootstrap-timepicker\bootstrap-timepicker.min.js"></script>


    <!--Bootstrap Datepicker [ OPTIONAL ]-->
    <script src="./../../../plugins\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>


    <!--Form Component [ SAMPLE ]-->
    <script src="./../../../js\demo\form-component.js"></script>

    <script>
        $('.chosenTurno').chosen();
    </script>

</body>
</html>