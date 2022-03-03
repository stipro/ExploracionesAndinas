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
                                                    <table class="table table-striped table-bordered dt-responsive nowrap display" style="width:100%" cellspacing="0" width="100%" id="table-labores">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">C. Costos</th>
                                                                <th scope="col">Labor</th>
                                                                <th scope="col">Etapa L.</th>
                                                                <th scope="col">Prefijo L.</th>
                                                                <th scope="col">Tipo L.</th>
                                                                <th scope="col">Zona</th>
                                                                <th scope="col">Letra Z</th>
                                                                <th scope="col">Tipo</th>
                                                                <th scope="col">Veta</th>
                                                                <th scope="col">Nivel</th>
                                                                <th scope="col">M. Explotacion</th>
                                                                <th scope="col">Sección</th>
                                                                <th scope="col">Tipo de EQ</th>
                                                                <th scope="col">Tipo de Roca</th>
                                                                <th scope="col">Sede</th>
                                                                <th scope="col">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>C. Costos</th>
                                                                <th>Labor</th>
                                                                <th scope="col">Etapa L.</th>
                                                                <th scope="col">Prefijo L.</th>
                                                                <th scope="col">Tipo L.</th>
                                                                <th scope="col">Zona</th>
                                                                <th scope="col">Letra Z</th>
                                                                <th scope="col">Tipo</th>
                                                                <th>Veta</th>
                                                                <th>Nivel</th>
                                                                <th>M. Explotacion</th>
                                                                <th>Sección</th>
                                                                <th>Tipo de EQ</th>
                                                                <th>Tipo de Roca</th>
                                                                <th>Sede</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </fieldset>
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
        <?php //echo $template_footer; ?>
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

    <!--Insertar Bootstrap Modal Principal-->
    <!--===================================================-->
    <div id="modal-insert" class="modal fade" role="dialog" style="overflow-y: scroll;"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Registro</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-crear">
    				<div class="modal-body">
                        <div id="alerts-Insert">
                        </div>
                        <form class="form-horizontal">
					    <div class="panel-body">
                            <!-- FORMULARIO -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="" class="control-label">C. Costo</label>
                                    <input type="text" placeholder="C. Costo" class="form-control" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label">Tipo</label>
                                    <input type="text" placeholder="Tipo" class="form-control" id="">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="control-label">Veta</label>
                                    <input type="text" placeholder="Veta" class="form-control" id="">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="control-label">Nivel</label>
                                    <input type="text" placeholder="Nivel" class="form-control" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label">Metodo de Explotacion</label>
                                    <input type="text" placeholder="Metodo de Explotacion" class="form-control" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="control-label">Sección</label>
                                    <input type="text" placeholder="Sección" class="form-control" id="">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="control-label">Tipo EQ</label>
                                    <input type="text" placeholder="Tipo EQ" class="form-control" id="">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="control-label">Tipo Roca</label>
                                    <input type="text" placeholder="Sección" class="form-control" id="">
                                </div>
                            </div>                            
                            <div class="row">
                                <fieldset>
                                    <legend>Labor</legend>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Labor</label>
                                        <div class="input-group-wrap">
                                            <div class="input-group">
                                                <input type="text" placeholder="Labor" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success btn-labeled" type="button" id="add-labor"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="control-label">Etapa</label>
                                        <input type="text" placeholder="Etapa" class="form-control" id="" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="control-label">Prefijo</label>
                                        <input type="text" placeholder="Prefijo" class="form-control" id="" disabled>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="" class="control-label">Tipo</label>
                                        <input type="text" placeholder="Tipo" class="form-control" id="" disabled>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset>
                                    <legend>Zona</legend>
                                    <div class="col-md-6">
                                        <label class="control-label">Zona</label>
                                        <div class="input-group-wrap">
                                            <div class="input-group">
                                                <input type="text" placeholder="Zona" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success btn-labeled" type="button" id="add-zona"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Letra</label>
                                        <input type="text" placeholder="Letra" class="form-control" disabled>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row">
                                <fieldset>
                                    <legend>Unidad Minera</legend>
                                    <div class="col-md-6">
                                        <label for="" class="control-label">Unid. Minera</label>
                                        <div class="input-group-wrap">
                                            <div class="input-group">
                                                <input type="text" placeholder="Unid. Minera" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-success btn-labeled" type="button" id="add-sede"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="control-label">Abrev. Minera</label>
                                        <input type="text" placeholder="Abrev. Minera" class="form-control" id="" disabled>
                                    </div>
                                </fieldset>
                            </div>
					    </div>
					</form>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal" id="mbtn-insert">
    						<span class="glyphicon glyphicon-remove"></span>
                        	<span class="hidden-xs"> Cerrar</span> 
    					</button>
    					<button type="button" id="Guardar" name="Guardar" class="btn btn-primary">
    						<span class="fa fa-save"></span>
                        	<span class="hidden-xs"> Guardar</span> 
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!-- Fin Insertar Bootstrap Modal Principal-->
    
    <!--Segundario1 Bootstrap Modal Segundario1-->
    <div id="modalSegundario1" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Labor</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Labor</label>
                                <input type="text" placeholder="Labor" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label">Etapa</label>
                                <input type="text" placeholder="Etapa" class="form-control" id="">
                            </div>
                            <div class="col-md-2">
                                <label for="" class="control-label">Prefijo</label>
                                <input type="text" placeholder="Prefijo" class="form-control" id="">
                            </div>
                            <div class="col-md-2">
                                <label for="" class="control-label">Tipo</label>
                                <input type="text" placeholder="Tipo" class="form-control" id="">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <!--Segundario2 Bootstrap Modal Segundario1-->
    <div id="modalSegundario2" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Zona</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Labor</label>
                                <input type="text" placeholder="Labor" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label">Etapa</label>
                                <input type="text" placeholder="Etapa" class="form-control" id="">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <!--Segundario2 Bootstrap Modal Segundario1-->
    <div id="modalSegundario3" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Unid. Minera</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body"> 
    					<div class="row">
                            <div class="col-md-4">
                                <label for="" class="control-label">Unid. Minera</label>
                                <input type="text" placeholder="Labor" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="control-label">Abrev. Minera</label>
                                <input type="text" placeholder="Etapa" class="form-control" id="">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

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
    <script>

        $(document).on('click', '#add-labor', function() {
            $('#modalSegundario1').modal('show');
        });

        $(document).on('click', '#add-zona', function() {
            $('#modalSegundario2').modal('show');
        });

        $(document).on('click', '#add-sede', function() {
            $('#modalSegundario3').modal('show');
        });
    </script>
    <!--FooTable Example [ SAMPLE ]-->
    <!--<script src="js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]-->
    <!--<script src="plugins\fooTable\dist\footable.all.min.js"></script>-->
    <!--=================================================-->
</body>
</html>