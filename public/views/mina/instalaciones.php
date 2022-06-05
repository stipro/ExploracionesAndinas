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
					                            <h3 class="panel-title">INSTALACIÓNES</h3>
					                        </div>
                                        </legend>
										<div class="row">
											<div class="col-md-3">
                                                <button data-target="#consumoMadera-lg-modal-create" data-toggle="modal" class="btn btn-success btn-labeled" id="btn-agregar-consumoMadera">
                                                    <i class="btn-label fa-solid fa fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>
                                                </button>
											</div>
											<div class="col-sm-12 col-md-6 dt-buttons btn-group">
												
											</div>
											<div class="col-sm-12 col-md-3">											
											</div>
										</div>
										
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="tableMaster_consumoMadera">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="2% !important">N°</th>
                                                        <th width="10% !important">nombreUsuario</th>
                                                        <th width="10% !important">Medida</th>
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
    <?php echo $template_create_consumoMadera;?>
    <!--===================================================-->
    <!--End Insert Bootstrap Modal-->

    <!--Read Bootstrap Modal-->
    <!--===================================================-->
    <?php echo $template_read_consumoMadera;?>
    <!--===================================================-->
    <!--End Read Bootstrap Modal-->

    <!--Editar Bootstrap Modal-->
    <!--===================================================-->
    <?php echo $template_update_consumoMadera;?>
    <!--===================================================-->
    <!-- End Editar Bootstrap Modal -->

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <!-- Date-MYSQL [ REQUIRED ] -->
    <!-- <script src="./../../../js/consumo_madera_diario.js"></script> -->

</body>
</html>