<?php
    echo __FILE__;
    require_once('./../../Config/config.php');
    include_once('./template/header.php');
    include_once('./template/aside.php');
    include_once('./template/javascript.php');
    include_once('./template/footer.php');
    session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
    }
    $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio';
    include_once('../menu.php');
    $nameArchivo = basename( __FILE__ );
    $parte = explode(".", $nameArchivo);
    $nameMenu = ucfirst($parte[0]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $nameMenu .' | '. NOMBRE_SISTEMA ?></title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <?php echo $template_header_css; ?>
            
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
        <?php echo $template_navBar; ?>
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
                        <h1 class="page-header text-overflow"><?php echo $nameMenu; ?></h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Pages</a></li>
					<li class="active"><?php echo $nameMenu; ?></li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<hr class="new-section-sm bord-no">
					<div class="row">
                        <div class="eq-height">
					        <div class="col-sm-4 eq-box-sm">
					
					            <!--Basic Panel-->
					            <!--===================================================-->
					            <div class="panel">

                                    <!--Panel heading-->
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-panel="fullscreen">
                                                <i class="icon-max demo-psi-maximize-3"></i>
                                                <i class="icon-min demo-psi-minimize-3"></i>
                                            </button>
                                        </div>
                                        <h3 class="panel-title">Permisos</h3>
                                    </div>

					                <div class="panel-body">
					                    Permisos
					                </div>
					            </div>
					            <!--===================================================-->
					            <!--End Basic Panel-->
					
					        </div>
					    </div>
                        <!--
					    <div class="col-lg-8 col-lg-offset-2">
					        <div class="panel panel-body text-center">
					            <div class="panel-heading">
					                <h3>Your content here...</h3>
					            </div>
					            <div class="panel-body">
					                <p>Start putting content on grids or panels, you can also use different combinations of grids.
					                <br>Please check out the dashboard and other pages.</p>
					            </div>
					        </div>
					    </div>
                        -->
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


    
    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript; ?>

    
    

</body>
</html>
