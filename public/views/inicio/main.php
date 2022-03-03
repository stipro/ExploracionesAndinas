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

    <title><?php echo $nameMenu .' | '. NOMBRE_SISTEMA ?></title>
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
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <!-- Line Chart -->
                            <!---------------------------------->
                            <!--
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Ventas Recientes</h3>
                                </div>
                                <div class="pad-all">
                                    <div id="demo-morris-line-legend" class="text-center"></div>
                                    <div id="demo-morris-line" style="height:268px"></div>
                                </div>
                            </div>-->
                            <!---------------------------------->

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="panel panel-warning panel-colorful media middle pad-all">
                                        <div class="media-left">
                                            <div class="pad-hor">
                                                <i class="demo-pli-file-word icon-3x"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-2x mar-no text-semibold">241</p>
                                            <p class="mar-no">Documentos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-info panel-colorful media middle pad-all">
                                        <div class="media-left">
                                            <div class="pad-hor">
                                                <i class="demo-pli-file-zip icon-3x"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-2x mar-no text-semibold">241</p>
                                            <p class="mar-no">Archivos comprimidos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-mint panel-colorful media middle pad-all">
                                        <div class="media-left">
                                            <div class="pad-hor">
                                                <i class="demo-pli-camera-2 icon-3x"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-2x mar-no text-semibold">241</p>
                                            <p class="mar-no">Fotos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel panel-purple panel-colorful media middle pad-all">
                                        <div class="media-left">
                                            <div class="pad-hor">
                                                <i class="demo-pli-video icon-3x"></i>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="text-2x mar-no text-semibold">241</p>
                                            <p class="mar-no">Videos</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Noticias</h3>
                                        </div>
                                        <div class="nano" style="height:360px">
                                            <div class="nano-content">
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#68464</p>
                                                    <p class="pad-btm">Para lograr esto, sería necesario tener una gramática uniforme, pronunciación y palabras más comunes. </p>
                                                    <a href="#" class="task-footer">
                                                        <span class="box-inline">
                                                            <label class="label label-warning">Solicitud de función</label>
                                                            <label class="label label-danger">Bug</label>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#45684</p>
                                                    <p class="pad-btm">Un pequeño río llamado Duden fluye por su lugar y lo abastece con los accesorios necesarios. Es un país paradisíaco, en el que te vuelan a la boca trozos asados ​​de frases.</p>
                                                    <a href="#" class="task-footer">
                                                        <span class="box-inline">
                                                            <span class="pad-rgt"><i class="demo-pli-speech-bubble-7"></i> 45</span>
                                                            <span class="pad-rgt"><i class="demo-pli-like"></i> 45</span>
                                                        </span>
                                                        <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                    </a>
                                                </div>
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#84564</p>
                                                    <div class="task-img">
                                                        <img class="img-responsive" src=".\..\..\..\img\shared-img-2.jpeg" alt="Image">
                                                    </div>
                                                    <p class="pad-btm">Nadie rechaza, disgusta o evita el placer en sí mismo, porque es placer.</p>
                                                    <a href="#" class="task-footer">
                                                        <span class="box-inline">
                                                            <span class="pad-rgt"><i class="demo-pli-heart-2"></i> 54K</span>
                                                        </span>
                                                        <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>03:08</span>
                                                    </a>
                                                </div>
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#23255</p>
                                                    <p class="pad-btm">El nuevo lenguaje común será más simple y regular que los idiomas europeos existentes.</p>
                                                    <a href="#" class="task-footer">
                                                        <span class="box-inline">
                                                            <img class="img-xs img-circle" src=".\..\..\..\img\profile-photos\8.png" alt="task-user">
                                                            Brenda Fuller
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#34522</p>
                                                    <p class="pad-btm">Para tomar un ejemplo trivial, ¿quién de nosotros emprende alguna vez un ejercicio físico laborioso, excepto para obtener alguna ventaja de él?</p>
                                                    <a href="#" class="task-footer">
                                                        <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                    </a>
                                                </div>
                                                <div class="panel-body bord-btm">
                                                    <p class="text-bold text-main text-sm">#45684</p>
                                                    <p class="pad-btm">Un pequeño río llamado Duden fluye por su lugar y lo abastece con los accesorios necesarios. Es un país paradisíaco, en el que te vuelan a la boca trozos asados ​​de frases.</p>
                                                    <a href="#" class="task-footer">
                                                        <span class="box-inline">
                                                            <span class="pad-rgt"><i class="demo-pli-speech-bubble-7"></i> 45</span>
                                                            <span class="pad-rgt"><i class="demo-pli-like"></i> 45</span>
                                                        </span>
                                                        <span class="text-sm"><i class="demo-pli-clock icon-fw text-main"></i>9:25</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer text-right">
                                            <button class="btn btn-sm btn-Default">Carga más</button>
                                            <button class="btn btn-sm btn-primary">Ver todo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Usuarios Registrado</h3>
                                            </div>

                                            <!--Bordered Table-->
                                            <!--===================================================-->
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th>Usuarioz</th>
                                                                <th>Fecha de orden</th>
                                                                <th>Plan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">34521</td>
                                                                <td><a href="#" class="btn-link">Scott S. Calabrese</a></td>
                                                                <td><span class="text-muted">Oct 10, 2017</span></td>
                                                                <td><span class="label label-purple">Negocio</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">23422</td>
                                                                <td><a href="#" class="btn-link">Teresa L. Doe</a></td>
                                                                <td><span class="text-muted">Oct 22, 2017</span></td>
                                                                <td><span class="label label-info">Personal</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">73455</td>
                                                                <td><a href="#" class="btn-link">Steve N. Horton</a></td>
                                                                <td><span class="text-muted">Oct 22, 2017</span></td>
                                                                <td><span class="label label-warning">Juicio</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">34523</td>
                                                                <td><a href="#" class="btn-link">Charles S Boyle</a></td>
                                                                <td><span class="text-muted">Nov 03, 2017</span></td>
                                                                <td><span class="label label-purple">Negocio</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">74634</td>
                                                                <td><a href="#" class="btn-link">Lucy Doe</a></td>
                                                                <td><span class="text-muted">Nov 05, 2017</span></td>
                                                                <td><span class="label label-success">Especial</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">23423</td>
                                                                <td><a href="#" class="btn-link">Michael Bunr</a></td>
                                                                <td><span class="text-muted">Nov 07, 2017</span></td>
                                                                <td><span class="label label-info">Personal</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">23422</td>
                                                                <td><a href="#" class="btn-link">Teresa L. Doe</a></td>
                                                                <td><span class="text-muted">Nov 10, 2017</span></td>
                                                                <td><span class="label label-info">Personal</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">73455</td>
                                                                <td><a href="#" class="btn-link">Steve N. Horton</a></td>
                                                                <td><span class="text-muted">Nov 10, 2017</span></td>
                                                                <td><span class="label label-danger">VIP</span></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">34521</td>
                                                                <td><a href="#" class="btn-link">Scott S. Calabrese</a></td>
                                                                <td><span class="text-muted">Nov 11, 2017</span></td>
                                                                <td><span class="label label-purple">Negocio</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--===================================================-->
                                            <!--End Bordered Table-->

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
                                    <button class="btn btn-primary mar-ver">Ir Modulo</button>\
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
                                    <button class="btn btn-primary mar-ver">Ir Modulo</button>\
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
                                    <button class="btn btn-primary mar-ver">Ir Modulo</button>\
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