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
        //
        var data = '';
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';     
    </script>


    <!--STYLESHEET-->
    <!--=================================================-->

    <?php echo $template_header_css; ?>

    <!--Morris.js [ OPTIONAL ]-->
    <link href=".\..\..\..\css\themes\type-d\theme-navy.min.css" rel="stylesheet">


    <!--Morris.js [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\morris-js\morris.min.css" rel="stylesheet">


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
    <div id="container" class="effect aside-float aside-bright mainnav-out slide">

        <!--NAVBAR-->
        <!--===================================================-->
        <?php echo $template_navBar ?>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div id="container-boxed" class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <hr class="new-section-sm bord-no">
                    <div class="text-center">
                        <h3>Hola <?php echo $validacionSession ?> Bienvenido de nuevo al Tablero.</h3>
                        <!--<p>Consulte sus búsquedas anteriores y el contenido que ha explorado. <a href="#" class="btn-link">Ver últimos resultados</a></p>-->
                        <p>Sus Modulos permitidos, si desea mas modulo solicitar . <a href="#" class="btn-link">Solcitar modulos</a></p>
                    </div>
                    <!--<hr class="new-section-md bord-no">-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                    <div id="content-modules" class="row">
                    </div>

                    <hr class="new-section-md bord-no">




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

    <!--JAVASCRIPT-->
    <!--=================================================-->
    <?php 
        echo $template_javascript;
    ?>



    <!--Morris.js [ OPTIONAL ]
    <script src=".\..\..\..\plugins\morris-js\morris.min.js"></script>
    <script src=".\..\..\..\plugins\morris-js\raphael-js\raphael.min.js"></script>-->



    <!--Custom script [ DEMONSTRATION ]-->
    <!--===================================================-->

    <script>
        
        var array = '';
        var cardModulo = 'false';
        var template_card_modulos = '';
        const contenedor_modulos = document.querySelector("#content-modules");
        const pintarCards = (data) => {
            console.log(data);
            var contadorLinea = 1;
            for (var mo = 0; mo < data.length; mo++) {
                var nextcardModulo = data[mo]["nombre_modulo"];
                if (cardModulo !== nextcardModulo) {
                    if(contadorLinea > 4){
                        template_card_modulos += '\
                        <div class="col-md-2 col-md-offset-3">\
                            <div class="panel">\
                                <div class="panel-body text-center">\
                                    <div class="pad-ver mar-top text-main"><i class="demo-pli-data-settings icon-4x"></i></div>\
                                    <p class="text-lg text-semibold mar-no text-main">' + data[mo]["nombre_modulo"] + '</p>\
                                    <p class="text-muted">' + data[mo]["descripcion_modulo"] + '</p>\
                                    <p class="text-sm">' + data[mo]["comentario_modulo"] + '</p>\
                                    <a href="./../' + data[mo]["link_modulo"] + ' "><button class="btn btn-primary mar-ver">Ir Modulo</button></a>\
                                    \
                                </div>\
                            </div>\
                        </div>';
                        contadorLinea = 0;
                    }
                    else if (contadorLinea == 1){
                        template_card_modulos += '\
                        <div class="col-md-2 col-md-offset-3">\
                            <div class="panel">\
                                <div class="panel-body text-center">\
                                    <div class="pad-ver mar-top text-main"><i class="demo-pli-data-settings icon-4x"></i></div>\
                                    <p class="text-lg text-semibold mar-no text-main">' + data[mo]["nombre_modulo"] + '</p>\
                                    <p class="text-muted">' + data[mo]["descripcion_modulo"] + '</p>\
                                    <p class="text-sm">' + data[mo]["comentario_modulo"] + '</p>\
                                    <a href="./../' + data[mo]["link_modulo"] + ' "><button class="btn btn-primary mar-ver">Ir Modulo</button></a>\
                                </div>\
                            </div>\
                        </div>';
                    }
                    else{
                        template_card_modulos += '\
                        <div class="col-md-2">\
                            <div class="panel">\
                                <div class="panel-body text-center">\
                                    <div class="pad-ver mar-top text-main"><i class="demo-pli-data-settings icon-4x"></i></div>\
                                    <p class="text-lg text-semibold mar-no text-main">' + data[mo]["nombre_modulo"] + '</p>\
                                    <p class="text-muted">' + data[mo]["descripcion_modulo"] + '</p>\
                                    <p class="text-sm">' + data[mo]["comentario_modulo"] + '</p>\
                                    <a href="./../' + data[mo]["link_modulo"] + ' "><button class="btn btn-primary mar-ver">Ir Modulo</button></a>\
                                </div>\
                            </div>\
                        </div>';
                    }
                    contadorLinea++;
                    cardModulo = data[mo]["nombre_modulo"];
                }
                cardModulo = data[mo]["nombre_modulo"];            
            }
            contenedor_modulos.insertAdjacentHTML('beforeend', template_card_modulos)
        }
        // Solictud de la data menu
        const getAsignadoCard = async (id_Usuario) => {
            const body = new FormData();
            body.append("data", JSON.stringify(id_Usuario));
            const res = await fetch('./../../../controllers/controllerNav.php', {
                method: "POST",
                body
            });
            array = await res.json()
            pintarCards(array);
        }
        // Obtengo datos //
        getAsignadoCard(id_Usuario);
    </script>

    <!--<script type="text/javascript" src="./../../../js/index.js"></script>-->

</body>

</html>