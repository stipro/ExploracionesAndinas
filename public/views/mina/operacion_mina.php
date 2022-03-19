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

    <style>
        div.container { max-width: 1200px }
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
                                                <h3 class="panel-title">Operación Mina</h3>
                                            </div>
                                        </legend>
                                        <div class="table-responsive-md">
                                            <table class="table display nowrap table-striped table-bordered dt-responsive" style="width:100%" id="table-operacion-mina">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="2%"><input type="checkbox"/></th>
                                                        <th>Fecha registro</th>
                                                        <th>Turno</th>
                                                        <th>Guardia</th>
                                                        <th>n° Vale</th>
                                                        <th>Actividad</th>
                                                        <th>L</th>
                                                        <th>Lpv</th>
                                                        <th>Stto</th>
                                                        <th>Serv</th>
                                                        <th>Comentario</th>
                                                        <th>Tipo Avance</th>
                                                        <th>Avance Mt</th>
                                                        <th>Avance Mt3</th>
                                                        <th>Int Disparo</th>
                                                        <th>Resuelto</th>
                                                        <th>Manual Cantidad</th>
                                                        <th>Pala</th>
                                                        <th>Cantidad</th>
                                                        <th>Winche</th>
                                                        <th>Cantidad</th>
                                                        <th>Mineral</th>
                                                        <th>Desmonte</th>
                                                        <th class="all">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th width="2%"><input type="checkbox"/></th>
                                                        <th>Fecha registro</th>
                                                        <th>Turno</th>
                                                        <th>Guardia</th>
                                                        <th>n° Vale</th>
                                                        <th>Actividad</th>
                                                        <th>L</th>
                                                        <th>Lpv</th>
                                                        <th>Stto</th>
                                                        <th>Serv</th>
                                                        <th>Comentario</th>
                                                        <th>Tipo Avance</th>
                                                        <th>Avance Mt</th>
                                                        <th>Avance Mt3</th>
                                                        <th>Int Disparo</th>
                                                        <th>Resuelto</th>
                                                        <th>Manual Cantidad</th>
                                                        <th>Pala</th>
                                                        <th>Cantidad</th>
                                                        <th>Winche</th>
                                                        <th>Cantidad</th>
                                                        <th>Mineral</th>
                                                        <th>Desmonte</th>
                                                        <th class="all">Operaciónes</th>
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


    <!--Insertar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-insert" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm" class="modal-dialog" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Registro Operación Mina</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-registro" class="col-md-4 control-label">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="insert-operacionMina-registro"  value="<?php echo $dateServer ?>" min="<?php echo $mindate ?>" max="<?php echo $dateServer ?>"> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionaMina-turno" class="col-md-4 control-label">Turno</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-turno" id="insert-operacionaMina-turno" placeholder="Ingrese Turno...">
                                        </div>
                                        <datalist id="insert-options-turno">
                                            <option value="Dia">
                                            <option value="Noche">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionMina-guardia" class="col-md-4 control-label">Guardia</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-guardia" id="insert-operacionMina-guardia" placeholder="Ingrese Guardia...">
                                        </div>
                                        <datalist id="insert-options-guardia">
                                            <option value="A">
                                            <option value="B">
                                            <option value="C">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionMina-nvale" class="col-md-4 control-label">N° Vale</label>
                                        <div class="col-md-8">                                                    
                                            <input type="texto" placeholder="n° vale" class="form-control" id="insert-operacionMina-nvale">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Actividad</label>
                                        <div class="col-md-8">
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="1 smtr" name="radio-tipo_disparo" id="opcion-tipo_disparo1" checked="">
                                                <label for="opcion-tipo_disparo1">1 Smtr</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="2 Stto" name="radio-tipo_disparo" id="opcion-tipo_disparo2">
                                                <label for="opcion-tipo_disparo2">2 Stto</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="3 Serv." name="radio-tipo_disparo" id="opcion-tipo_disparo3" >
                                                <label for="opcion-tipo_disparo3">3 Serv.</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="4 Rhb" name="radio-tipo_disparo" id="opcion-tipo_disparo4" >
                                                <label for="opcion-tipo_disparo4">4 Rhb</label>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="bord-btm pad-ver text-main text-bold">Centro de Costos</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-codzona" class="col-md-4 control-label">cod. Zona</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-codzona" id="insert-operacionMina-codzona" placeholder="seleccióne Zona...">
                                        </div>
                                        <datalist id="insert-options-codzona">
                                            <option value="No se obtuvo Dato">
                                        </datalist>
                                        <template id="template-opt-cod_zona">
                                            <option id="opt-codzona" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-codLabor" class="col-md-4 control-label">cod. Labor</label>
                                        <div class="col-md-8">
                                            <input class="form-control"  list="insert-options-codLabor" type="text" placeholder="Cod. Labor" id="insert-operacionMina-codLabor">
                                        </div>
                                        <datalist id="insert-options-codLabor">
                                            <option data-value="42">Seleccione codigo Zona</option>
                                        </datalist>
                                        <input type="hidden" name="answer" id="insert-operacionMina-codLabor-hidden">                                    
                                        <template id="template-opt-codLabor">
                                            <option id="opt-codLabor" value="">
                                        </template>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Zona" class="form-control" name="" id="insert-operacionMina-zona" value="" disabled>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-labor" id="insert-operacionMina-labor" placeholder="seleccióne Labor..." disabled>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-nivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" name="" id="insert-operacionMina-nivel" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Inicio -->
                        <div class="tab-base">
                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true">Tareas</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="false">Instalaciónes</a>
                                </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2 form-tarea">DNI</div>
                                        <div class="col-md-4 form-tarea">Apellidos Y Nombres</div>
                                        <div class="col-md-3 form-tarea">Cargo</div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Maestro</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-maestro" id="insert-operacionaMina-dni-maestro" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-maestro">
                                                    <option id="template-opts-dni-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-maestro" id="insert-operacionaMina-name-maestro" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-maestro">
                                                    <option id="template-opts-name-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="insert-operacionaMina-cargo-maestro" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Ayudante</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-ayudante" id="insert-operacionaMina-dni-ayudante" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-ayudante">
                                                    <option id="template-opts-dni-ayudante" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-ayudante" id="insert-operacionaMina-name-ayudante" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-ayudante">
                                                    <option id="template-opts-name-ayudante" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-ayudante" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">3er Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-tercer-hombre" id="insert-operacionaMina-dni-tercer-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-tercer-hombre">
                                                    <option id="template-opts-dni-tercer-hombre" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-tercer-hombre" id="insert-operacionaMina-name-tercer-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-tercer-hombre">
                                                    <option id="template-opts-name-tercer-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-tercer-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">4to Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-cuarto-hombre" id="insert-operacionaMina-dni-cuarto-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-cuarto-hombre">
                                                    <option id="template-opts-dni-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-cuarto-hombre" id="insert-operacionaMina-name-cuarto-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-cuarto-hombre">
                                                    <option id="template-opts-name-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-cuarto-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <template id="template-">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">x Hombre</label>
                                            <div class="col-md-2">
                                                <!-- Default choosen -->
                                                <!--===================================================-->
                                                <select class="form-control chosenCodZona" data-placeholder="Elija una opcion" id="" tabindex="2">
                                                    <option value=""></option>
                                                </select>
                                                <template id="">
                                                    <option id="" value="">A</option>
                                                </template>
                                                <!--===================================================-->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Default choosen -->
                                                <!--===================================================-->
                                                <select class="form-control chosenCodZona" data-placeholder="Elija una opcion" id="" tabindex="2">
                                                    <option value=""></option>
                                                </select>
                                                <template id="">
                                                    <option id="" value="">A</option>
                                                </template>
                                                <!--===================================================-->
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="" value="0" disabled>
                                            </div>                                                            
                                        </div>
                                    </template>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <div class="col-md-3">
                                                <button id="btn-increase" class="btn btn-info btn-circle"><i class="ion-plus icon-lg"></i></button>
                                                <button id="btn-decline" class="btn btn-danger btn-circle"><i class="ion-minus icon-lg"></i></button>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label class="col-md-3 form-tarea control-label">Insistencia</label>
                                            <div class="col-md-6">
                                                <div class="col-md-3">
                                                    <label for="insert-operacionMina-l" class="control-label">L</label>
					                                <input type="text" placeholder="L" class="form-control" id="insert-operacionMina-l">
                                                </div>
                                                <div class="col-md-3">                                                    
                                                    <label for="insert-operacionMina-lpv" class="control-label">Lpv</label>
					                                <input type="text" placeholder="Lpv" class="form-control" id="insert-operacionMina-lpv">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="insert-operacionMina-stto" class="control-label">Stto</label>
                                                    <input type="text" placeholder="Stto" class="form-control" id="insert-operacionMina-stto">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="insert-operacionMina-Serv" class="control-label">Serv</label>
                                                    <input type="text" placeholder="Serv" class="form-control" id="insert-operacionMina-Serv">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="insert-operacionMina-comentario" class="col-md-4 control-label">Comentario</label>
                                                    <div class="col-md-8">
                                                    <textarea placeholder="Comentario" rows="13" class="form-control" id="insert-operacionMina-comentario" style="width: 300px; height: 50px;"></textarea>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                    <div class="row">
                                        <div id="myTabDiv" class="table-responsive-lg col-md-6">
                                            <!-- Table -->
                                            <table name="mytab" id="mytab1" class="table table-md table-hover table-instalaciones">
                                                <thead>
                                                    <tr class="ui-widget-header ">
                                                        <th class="indice" scope="col">#</th>
                                                        <th scope="col" data-sort-initial="true" data-toggle="true">Nombre</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Medida</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="instalacion-body">
                                                </tbody>
                                            </table>
                                            <template id="template-td-instalaciones">
                                                <tr>
                                                    <th id="indice" class="indice" scope="row"></th>
                                                    <td id="template-tds-name-instalaciones">val 22</td>
                                                    <td id="template-tds-cantidad-instalaciones">val 23</td>
                                                    <td id="template-tds-unidad-instalaciones">val 23</td>
                                                    <td>
                                                        <button  class="borrar btn btn-danger btn-xs btn-delete" value="Delete">
                                                            <i class="demo-pli-cross"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="bord-btm pad-ver text-main text-bold">Instalaciónes</p>
                                            <div class="form-group">
                                                <label for="nombre-instalaciones-table" class="col-md-2 control-label">Nombre</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" list="nombre-instalaciones-options" id="nombre-instalaciones-table" placeholder="Seleccion opcion..">
                                                </div>
                                                <datalist id="nombre-instalaciones-options">
                                                    <option value="Aun no carga">
                                                </datalist>
                                                <template id="template-opts-name-instalaciones">
                                                    <option id="template-opt-name-instalaciones" value="">
                                                </template>
                                                <label for="cantidad-instalaciones-table" class="col-md-1 control-label">Cantidad</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" id="cantidad-instalaciones-table" placeholder="Ingrese Cantidad...">
                                                </div>
                                            </div>
                                            <button id="insert-option-table" type="button" class="btn btn-primary">Agregar</button>
                                            <!-- Fin Table 
                                            <button type="button" class="btn btn-primary btn-get-all">Obtener Todo</button>-->
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin -->
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="bord-btm pad-ver text-main text-bold">Avance Actual</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-tipo-avance" class="col-md-4 control-label">Tipo de Avance</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-tipo-avance" id="insert-operacionMina-tipo-avance" placeholder="Eliga opción...">
                                            <datalist id="insert-options-tipo-avance">
                                                <option value="Avance">Avance</option>
                                                <option value="Realce">Realce</option>
                                                <option value="Recarga">Recarga</option>
                                                <option value="Desquinche">Desquinche</option>
                                                <option value="Breasting">Breasting</option>
                                                <option value="Relleno">Relleno</option>
                                            </datalist>
                                            <template id="template-opts-insert-tipo-avance">
                                                <option id="template-opt-insert-tipo-avance" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Avance Mt. / Mt.3</label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt." class="form-control" name="digitador" id="insert-operacionMina-mt" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt.3" class="form-control" name="digitador" id="insert-operacionMina-mt3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-int-disparo" class="col-md-4 control-label">Int. Disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-int-disparo" id="insert-operacionMina-int-disparo" placeholder="Eliga opción...">
                                            <datalist id="insert-options-int-disparo">
                                                <option value="Normal">Normal</option>
                                                <option value="Plasteo">Plasteo</option>
                                            </datalist>
                                            <template id="template-opts-insert-int-disparo">
                                                <option id="template-opt-insert-int-disparo" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-resuelto" class="col-md-4 control-label">Resuelto</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-resuelto" id="insert-operacionMina-resuelto" placeholder="Eliga opción...">
                                            <datalist id="insert-options-resuelto">
                                                <option value="Normal">Normal</option>
                                                <option value="T. soplado">T. soplado</option>
                                                <option value="T. cortado">T. cortado</option>
                                                <option value="Anillado">Anillado</option>
                                            </datalist>
                                            <template id="template-opts-insert-resuelto">
                                                <option id="template-opt-insert-resuelto" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Limpieza (Horas)</p>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-2">
                                    </div>
                                    <label for="insert-operacionMina-Manual" class="col-md-4 control-label">Manual</label>                                 
                                    <div class="col-md-2">
					                    <label class="control-label">Carros Extraídos</label>
					                    <input type="text" placeholder="cantidad" class="form-control" id="insert-operacionMina-Manual">
                                    </div>
                                    <label for="" class="col-md-2 control-label"></label>
                                    <div class="col-md-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="insert-operacionMina-pala" class="col-md-2 control-label">Pala</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="insert-options-pala" id="insert-operacionMina-pala" placeholder="Eliga opción...">
                                        <datalist id="insert-options-pala">
                                            <option value="PN_01">PN_01</option>
                                            <option value="PN_02">PN_02</option>
                                            <option value="PN_03">PN_03</option>
                                            <option value="PN_04">PN_04</option>
                                        </datalist>
                                        <template id="template-opts-insert-pala">
                                            <option id="template-opt-insert-pala" value="">
                                        </template>
                                    </div>
                                    <datalist id="insert-options-pala">
                                        <option value="">
                                        <option value="">
                                        <option value="">
                                    </datalist>                                   
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="insert-operMina-cantidadPala">
                                    </div>
                                    <label for="insert-operMina-mineral" class="col-md-2 control-label">Mineral</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Mineral" class="form-control" id="insert-operMina-mineral">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="insert-operacionMina-winche" class="col-md-2 control-label">Winche</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="insert-options-winche" id="insert-operacionMina-winche" placeholder="Eliga opción...">
                                        <datalist id="insert-options-winche">
                                            <option value="Wch_Izj_02">Wch_Izj_02</option>
                                            <option value="Wch_Izj_04">Wch_Izj_04</option>
                                            <option value="Wch_Izj_05">Wch_Izj_05</option>
                                            <option value="Wch_Izj_06">Wch_Izj_06</option>
                                            <option value="Wch_Izj_07">Wch_Izj_07</option>
                                            <option value="Wch_Izj_08">Wch_Izj_08</option>
                                            <option value="Wch_Izj_09">Wch_Izj_09</option>
                                            <option value="Wch_Izj_10">Wch_Izj_10</option>
                                            <option value="Wch_Artr_01">Wch_Artr_01</option>
                                            <option value="Wch_Artr_02">Wch_Artr_02</option>
                                            <option value="Wch_Artr_03">Wch_Artr_03</option>
                                            <option value="Wch_Artr_04">Wch_Artr_04</option>
                                            <option value="Wch_Artr_05">Wch_Artr_05</option>
                                            <option value="Wch_Artr_06">Wch_Artr_06</option>
                                            <option value="Wch_Neu_02">Wch_Neu_02</option>
                                            <option value="Wch_Neu_03">Wch_Neu_03</option>
                                        </datalist>
                                        <template id="template-opts-insert-winche">
                                            <option id="template-opt-insert-winche" value="">
                                        </template>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="insert-operacionMina-cantidadWinche">
                                    </div>
                                    <label for="insert-operacionMina-Desmon" class="col-md-2 control-label">Desmon</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Desmon" class="form-control" id="insert-operacionMina-Desmon">
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
                    <button id="mbtn-insert" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->

    <!--Modal Importacion-->
    <!--===================================================-->
    <div class="modal fade" id="modal-import" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Importación Archivo</h4>
                </div>


                <!--Modal body-->
                <div class="modal-body">
                    <!--Icono Excel-->
                    <label id="contenerdor-ico" class="btn-import">
                        <img class="ico-exce" src="./../../../svg/excel2.svg" alt="Icono Excel">
                            <!--<span class="exc-letra">Importar Archivo</span>-->
                            <!--<input type="file" id="excelfile" value="image1" name="excelfile" multiple="multiple"/>-->
                            <form id="" class="fsubiarchivo" action="herramientas/php/cargar_archivo.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <input type="file" id="excelfile" value="image1" name="excelfile" multiple="multiple"/>
                                </div>                                    
                                <button id="btn-subir-archivo" class="btn btn-confirmar" type="submit">Cargar Fichero</button>
                            </form>  
                    </label>
                </div>


                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Bootstrap Modal without Animation-->
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    <script src=".\..\..\..\js\operacionMina.js"></script>-->
    <script>
    // El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
    document.addEventListener('DOMContentLoaded', e => {
        mainEvents();
    });

    const mainEvents = () => {
        //$('#table-master').DataTable().clear().destroy();
        let form_request1 = {
            "accion": "table",
        }
        fetchData(form_request1);
    }
    const fetchData = async (request) => {
        const body = new FormData();
        body.append("data", JSON.stringify(request));
        const res = await fetch('./../../../controllers/controllerOperacionMinaList.php', {
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
    tableMaster = $('#table-operacion-mina').DataTable({
        scrollX: true,
        scrollCollapse: true,
        fixedColumns: {
            right: 1,
        },
        columns: [{
                data: "id_operacionMina"
            },
            {
                data: "operacionMina_registro",
            },
            {
                data: "operacionMina_turno",
            },
            {
                data: "operacionMina_guardia",
            },
            {
                data: "operacionMina_nVale",
            },
            {
                data: "operacionMina_actividad",
            },
            {
                data: "operacionMina_l",
            },
            {
                data: "operacionMina_lpv",
            },
            {
                data: "operacionMina_stto",
            },
            {
                data: "operacionMina_serv",
            },
            {
                data: "operacionMina_comentario",
            },
            {
                data: "operacionMina_tipAvance",
            },
            {
                data: "operacionMina_avanceMt",
            },
            {
                data: "operacionMina_avanceMt3",
            },
            {
                data: "operacionMina_intDisparo",
            },
            {
                data: "operacionMina_Resuelto",
            },
            {
                data: "operacionMina_manualCantidad",
            },
            {
                data: "operacionMina_palaNombre",
            },
            {
                data: "operacionMina_palaCantidad",
            },
            {
                data: "operacionMina_wincheNombre",
            },
            {
                data: "operacionMina_wincheCantidad",
            },
            {
                data: "operacionMina_mineralCantidad",
            },
            {
                data: "operacionMina_desmonCantidad",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tableMaster-detalle"><i class="fa fa-eye"></i> Detalle</button> <button type="button" class="name btn btn-primary btn-tableMaster-edit"><i class="fa fa-edit"></i> Editar</button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> Eliminar</button>'
            }
        ],
        fixedHeader: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay registro de labores",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Labores",
            "infoEmpty": "Mostrando 0 to 0 of 0 Labores",
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
        dom: '<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-6"<"dt-buttons btn-group flex-wrap"B>><"col-sm-12 col-md-3"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [{
                text: '<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>',
                action: function(e, dt, node, conf) {
                    var selectFoorm_codZona = {
                        "accion": "getcolumnAll",
                        "column": "labZona_letra"
                    }
                    fetchCodzona(selectFoorm_codZona);
                    var selectFoorm_colaborador = {
                        "accion": "getcolumnAll",
                        "column": "col_dni"
                    }
                    fetchColaborador(selectFoorm_colaborador);
                    var selectForm_instalacionMina = {
                        "accion": "getcolumnAll",
                        "column": "instalacionesMIna_nombre"
                    }
                    fetchInstalaciones(selectForm_instalacionMina);
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
                buttons: [{
                        extend: 'excel',
                        text: '<i class="btn-label fa fa-file-excel-o"></i> Excel',
                        titleAttr: 'Excel',
                        title: '',
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
                text: '<i class="btn-label fa fa-file-excel-o"></i><span class="hidden-xs"> Excel</span>',
                className: 'btn btn-primary', //Primary class for all buttons
                tag: 'a',
                action: function(e, dt, node, config) {
                    //This will send the page to the location specified
                    window.location.href = './../../excelGenerator.php?table=view_operacion_mina';
                },
                init: function(dt, node, config) {
                    $(node).attr('href', './../../excelGenerator.php?table=view_operacion_mina');
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
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
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

    $('#table-operacion-mina tbody').on('click', '.btn-tableMaster-detalle', function() {
        const data = tableMaster.row($(this).parents('tr')).data();
        alert("El id: " + data['id_operacionMina']);

    });

    $('#table-operacion-mina tbody').on('click', '.btn-tableMaster-edit', function() {
        const data = tableMaster.row($(this).parents('tr')).data();
        //alert("El id: " + data['id_operacionMina']);
        $("#modal-edit").modal("show");
        getRecord(data['id_operacionMina']);
    });

    $('#table-operacion-mina tbody').on('click', '.btn-tableMaster-delet', function() {
        var data = tableMaster.row($(this).parents('tr')).data();
        swal({
            title: "Estas seguro?",
            text: "Una vez eliminado, no podrá recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                var form_request = {
                    "accion": "delet",
                    "id": data['id_operacionMina']
                }
                request(form_request);
                swal("¡La información ha sido eliminado!", {
                    icon: "success",
                });
            } else {
                swal("¡La información está a salvo!");
            }
        });
    });
    </script>

</body>
</html>