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
					                            <h3 class="panel-title">KARDEX</h3>
					                        </div>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label for="slt-explosivosKardex-Almacen" class="col-sm-1 col-md-1 control-label">Almacen</label>
                                                    <div class="col-sm-2 col-md-2">
                                                        <select name="almacen" id="slt-explosivosKardex-Almacen" class="form-control">
                                                            <option value="1">Almacen Principal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label for="ipt-explosivosKardex-explosivoCodigo" class="col-sm-1 col-md-1 control-label">Explosivo:</label>
                                                    <div class="col-sm-2 col-md-2">
                                                        <input list="dtl-explosivosKardex-explosivoCodigo" type="text" class="form-control input-sm" id="ipt-explosivosKardex-explosivoCodigo" placeholder="Codígo">
                                                        <datalist id="dtl-explosivosKardex-explosivoCodigo">
                                                            <option value="--no cargo--">--no cargo--</option>
                                                        </datalist>
                                                    </div>
                                                    <div class="col-sm-1 col-md-1">
                                                        <input type="text" class="form-control input-sm" id="ipt-explosivosKardex-unidaMedida" placeholder="Unidad Medida" disabled>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <div class="form-group">
                                                            <div class="col-sm-12 col-md-12">
                                                                <input type="text" class="form-control input-sm" id="ipt-explosivosKardex-nombre" placeholder="Nombre Explosivo" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <template id="tpt-explosivosKardex-explosivoCodigo">
                                                    <option id="" value=""></option>
                                                </template>
                                            </div>
                                            
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label for="cst-ipt-explosivosKardex-Periodo" class="col-sm-4 control-label">Periodo:</label>
                                                    <div class="col-sm-8 input-group mar-btm">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-mint btn-sm" type="button">
                                                                <i class="fa fa-mail-reply"></i>
                                                            </button>
                                                        </span>
                                                        <input type="text" class="form-control input-sm" id="cst-ipt-explosivosKardex-Periodo" placeholder="Mes" name="daterange" value="01/01/2018 - 01/15/2018">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-mint btn-sm" type="button">
                                                                <i class="fa fa-mail-forward"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-1">
                                                <div class="form-group">
                                                    <div class="col-sm-12 col-md-12">
                                                        <button class="btn btn-mint">
                                                            Buscar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="table-master-kardexExplosivo">
                                                <colgroup>
                                                    <col class=""/>
                                                    <col class=""/>
                                                    <col class=""/>
                                                    <col class="green" span="1" />
                                                    <col class="orange" span="1"/>
                                                    <col class="blue" span="1"/>
                                                </colgroup>
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>N° Vale</th>
                                                        <th>Fecha</th>
                                                        <th>Explosivo</th>
                                                        <th>Entrada</th>
                                                        <th>Salida</th>
                                                        <th>Saldos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>N° Vale</th>
                                                        <th>Fecha</th>
                                                        <th>Explosivo</th>
                                                        <th>Entrada</th>
                                                        <th>Salida</th>
                                                        <th>Saldos</th>
                                                    </tr>
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

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <?php echo $template_javascript;?>
    <script>
        /* document.addEventListener('DOMContentLoaded', e => {
            var table = $('#table-master').DataTable({
            //Tip from this user kthorngren: absolute not working
            rowCallback: function( row, data, index ) {
                if ( data[3] == "22" ) {$(row).addClass('green');} 
                else if ( data[3] == "61" ) {$(row).addClass('orange');}
                else if ( data[3] == "30" ) {$(row).addClass('red');} 
            }
            });
        //* CONFIGURACIONES EXTERNOS
        }); */
    </script>
    <script src="./../../../plugins/date-range-picker/moment.min.js"></script>
    <script src="./../../../plugins/date-range-picker/daterangepicker.js"></script>
    <!-- Date Range [ REQUIRED - REQUERIDO ]-->
    <link href="./../../../plugins/date-range-picker/daterangepicker.css" rel="stylesheet">
    <!-- [ REQUIRED ]-->
    <script src="./../../../js/kardex_explosivos.js"></script>
</body>
</html>