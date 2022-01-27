<?php
    include_once('./public/views/template/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Error 404 | Nifty - Admin Template</title>
    <style type="text/css">
        body {
            font-family: Verdana;
            text-align: center;
        }

        #box {
            width: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10%;

        }

        .big {
            color: #ccc;
            font-size: 200px;
            font-weight: bold;
        }

        .small {
            color: #555;
            font-size: 35px;
        }

        pre {
            white-space: pre-wrap;
        }
    </style>


    <!--STYLESHEET-->
    <!--=================================================-->
    <?php
        echo $template_header_css;
    ?>            
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
    <div id="container" class="cls-container">
        
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header">
		    <div class="cls-brand">
		        <a class="box-inline" href="index.html">
		            <!--<img alt="Nifty Admin" src="img/logo.png" class="brand-icon">-->
		            <span class="brand-title">Exploraciones Andinas S.A.C.<span class="text-thin">Administrador</span></span>
		        </a>
		    </div>
		</div>
		
		<!-- CONTENT -->
		<!--===================================================-->
		<div class="cls-content">
		    <h1 class="error-code text-info">404</h1>
		    <p class="h4 text-uppercase text-bold">Página no encontrada!</p>
		    <div class="pad-btm">
                Lo sentimos, pero la página que busca no se encuentra en nuestro servidor.
		    </div>
		    <div class="row mar-ver">
		        <form class="col-xs-12 col-sm-10 col-sm-offset-1" method="post" action="pages-search-results.html">
		            <input type="text" placeholder="Search.." class="form-control error-search">
		        </form>
		    </div>
		    <hr class="new-section-sm bord-no">
		    <div class="pad-top"><a class="btn btn-primary" href="./public/index.php">Volver a casa</a></div>
		</div>
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js\nifty.min.js"></script>




    <!--=================================================-->
    </body>
</html>

