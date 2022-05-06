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
					                            <h3 class="panel-title"><?php echo strtoupper($name_menu) ?></h3>
					                        </div>
                                        </legend>
										<div class="row">
											<div class="col-md-3">
                                                <button class="btn btn-default btn-success btn-labeled" id="btn-agregar-consumoMadera" data-target="#insert-modal-consumoMadera" data-toggle="modal">
													<i class="btn-label fa-solid fa fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>
												</button>
											</div>
											<div class="col-sm-12 col-md-6 dt-buttons btn-group">
												
											</div>
											<div class="col-sm-12 col-md-3">											
											</div>
										</div>
                                        <div class="row">
                                            <!--Default Tabs (Left Aligned)-->
                                            <!--===================================================-->
                                            <div class="tab-base">
                                                
                                                <!--Nav Tabs-->
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a data-toggle="tab" href="#demo-lft-tab-1">Modulo <span class="badge badge-purple">0</span></a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#demo-lft-tab-2">Menu <span class="badge badge-purple">0</span></a>
                                                    </li>
                                                    <li>
                                                        <a data-toggle="tab" href="#demo-lft-tab-3">SubMenu <span class="badge badge-purple">0</span></a>
                                                    </li>
                                                </ul>
                                    
                                                <!--Tabs Content-->
                                                <div class="tab-content">
                                                    <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                        <p class="text-main text-semibold">First Tab Content</p>
                                                        <p>Segun la eleccion que elija va afectar en Menu y subMenu.</p>
                                                        <div class="table-responsive">
                                                            <table class="table" id="table-asignaciones-modulos">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Estado</th>
                                                                    <th scope="col">Orden</th>
                                                                    <th scope="col">Accion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Jacob</td>
                                                                        <td>Thornton</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Larry</td>
                                                                        <td>the Bird</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="demo-lft-tab-2" class="tab-pane fade">
                                                        <p class="text-main text-semibold">Second Tab Content</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                                        <div class="table-responsive">
                                                            <table class="table" id="table-asignaciones-menu">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Estado</th>
                                                                    <th scope="col">Orden</th>
                                                                    <th scope="col">Accion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Jacob</td>
                                                                        <td>Thornton</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Larry</td>
                                                                        <td>the Bird</td>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="demo-lft-tab-3" class="tab-pane fade">
                                                        <p class="text-main text-semibold">Third Tab Content</p>
                                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                                        <div class="table-responsive">
                                                            <table class="table" id="table-asignaciones-submenu">
                                                                <thead>
                                                                    <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nombre</th>
                                                                    <th scope="col">Accion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Mark</td>
                                                                        <td>Otto</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Jacob</td>
                                                                        <td>Thornton</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Larry</td>
                                                                        <td>the Bird</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--===================================================-->
                                            <!--End Default Tabs (Left Aligned)-->
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

    <!--===================================================-->
    <!--End Insert Bootstrap Modal-->

    <!--Editar Bootstrap Modal-->
    <!--===================================================-->
    <?php echo $template_update_explosivo;?>
    <!--===================================================-->
    <!-- End Editar Bootstrap Modal -->

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    <!--Form Component [ REQUIRED ]-->
    <script src=".\..\..\..\js\asignaciones.js"></script>

</body>
</html>