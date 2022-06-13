<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
        $dateServer = date('Y-m-d');
        $mindate = date("Y-m-d",strtotime($dateServer."- 2 days"));
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
        include_once('./labor/create.php');
        include_once('./labor/read.php');
        include_once('./labor/update.php');
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
    <style>
        .modal-content{
            border: 1px solid rgba(0,0,0,.2) !important;
        }
        div.container { max-width: 1200px !important}
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
                                        <div id="alerts-general" class="mb-5">
                                        </div>
                                        <div class="panel-body">
                                            <fieldset>
                                                <legend><h3 class="panel-title">Labores</h3></legend>
                                                <div class="table-responsive-md"> <!-- class  table-hover display-->
                                                    <table class="table display nowrap table-striped table-bordered dt-responsive" style="width:100%" id="tblMaster-labores">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>id_labor</th>
                                                                <th>C. Costos</th>
                                                                <th>Labor</th>
                                                                <th>Etapa L.</th>
                                                                <th>Prefijo L.</th>
                                                                <th>Tipo L.</th>
                                                                <th>Zona</th>
                                                                <th>Letra Z</th>
                                                                <th>Veta</th>
                                                                <th>Nivel</th>
                                                                <th>M. Explotacion</th>
                                                                <th>Sección</th>
                                                                <th>Tipo de EQ</th>
                                                                <th>Tipo de Roca</th>
                                                                <th>Unidad Minera</th>
                                                                <th>Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>id_labor</th>
                                                                <th>C. Costos</th>
                                                                <th>Labor</th>
                                                                <th>Etapa L.</th>
                                                                <th>Prefijo L.</th>
                                                                <th>Tipo L.</th>
                                                                <th>Zona</th>
                                                                <th>Letra Z</th>
                                                                <th>Veta</th>
                                                                <th>Nivel</th>
                                                                <th>M. Explotacion</th>
                                                                <th>Sección</th>
                                                                <th>Tipo de EQ</th>
                                                                <th>Tipo de Roca</th>
                                                                <th>Unidad Minera</th>
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

    <!-- Fin Insertar Bootstrap Modal Principal-->
    <?php echo $template_create_labor; ?>

    <?php echo $template_read_labor; ?>

    <?php echo $template_update_labor; ?>


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


    </script>
    <!--FooTable Example [ SAMPLE ]-->
    <!--<script src="js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]-->
    <!--<script src="plugins\fooTable\dist\footable.all.min.js"></script>-->
    <!--=================================================-->
</body>
</html>