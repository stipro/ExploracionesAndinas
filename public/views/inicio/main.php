<?php
    require_once('./../../../Config/config.php');
    include_once('./../template/header.php');
    include_once('./../template/javascript.php');
    include_once('./../template/footer.php');
    include_once('./../template/aside.php');
    session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
        $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio, o ocurrio un error';
        $idUsuario = $_SESSION["id"];
        //include_once('./../menu.php');
        $nameArchivo = basename( __FILE__ );
        $parte = explode(".", $nameArchivo);
        $nameMenu = ucfirst($parte[0]);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $nameMenu .' | '. NOMBRE_SISTEMA ?></title>
    
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
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="./../../../img/logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Nifty</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->


                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Navigation toogle button-->



                        <!--Search-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li>
                            <div class="custom-search-form">
                                <label class="btn btn-trans" for="search-input" data-toggle="collapse" data-target="#nav-searchbox">
                                    <i class="demo-pli-magnifi-glass"></i>
                                </label>
                                <form>
                                    <div class="search-container collapse" id="nav-searchbox">
                                        <input id="search-input" type="text" class="form-control" placeholder="Type for search...">
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Search-->

                    </ul>
                    <ul class="nav navbar-top-links">


                        <!--Mega dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="mega-dropdown">
                            <a href="#" class="mega-dropdown-toggle">
                                <i class="demo-pli-layout-grid"></i>
                            </a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">

                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
									        <li class="dropdown-header"><i class="demo-pli-file icon-lg icon-fw"></i> Pages</li>
									        <li><a href="#">Profile</a></li>
									        <li><a href="#">Search Result</a></li>
									        <li><a href="#">FAQ</a></li>
									        <li><a href="#">Sreen Lock</a></li>
									        <li><a href="#">Maintenance</a></li>
									        <li><a href="#">Invoice</a></li>
									        <li><a href="#" class="disabled">Disabled</a></li>                                        </ul>

                                    </div>
                                    <div class="col-sm-4 col-md-3">

                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
									        <li class="dropdown-header"><i class="demo-pli-mail icon-lg icon-fw"></i> Mailbox</li>
									        <li><a href="#"><span class="pull-right label label-danger">Hot</span>Indox</a></li>
									        <li><a href="#">Read Message</a></li>
									        <li><a href="#">Compose</a></li>
									        <li><a href="#">Template</a></li>
                                        </ul>
                                        <p class="pad-top text-main text-sm text-uppercase text-bold"><i class="icon-lg demo-pli-calendar-4 icon-fw"></i>News</p>
                                        <p class="pad-top mar-top bord-top text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <!--Mega menu list-->
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#" class="media mar-btm">
                                                    <span class="badge badge-success pull-right">90%</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-data-settings icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Data Backup</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-support icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Support</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-computer-secure icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Security</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="media mar-btm">
                                                    <div class="media-left">
                                                        <i class="demo-pli-map-2 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-semibold text-main mar-no">Location</p>
                                                        <small class="text-muted">This is the item description</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <p class="dropdown-header"><i class="demo-pli-file-jpg icon-lg icon-fw"></i> Gallery</p>
                                        <div class="row img-gallery">
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-1.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-3.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-2.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-4.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-6.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="./../../../img/thumbs/img-5.jpeg" alt="thumbs">
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-block btn-primary">Browse Gallery</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End mega dropdown-->



                        <!--Notification dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="demo-pli-bell"></i>
                                <span class="badge badge-header badge-danger"></span>
                            </a>


                            <!--Notification dropdown menu-->
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                <div class="nano scrollable">
                                    <div class="nano-content">
                                        <ul class="head-list">
                                            <li>
                                                <a href="#" class="media add-tooltip" data-title="Used space : 95%" data-container="body" data-placement="bottom">
                                                    <div class="media-left">
                                                        <i class="demo-pli-data-settings icon-2x text-main"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-nowrap text-main text-semibold">HDD is full</p>
                                                        <div class="progress progress-sm mar-no">
                                                            <div style="width: 95%;" class="progress-bar progress-bar-danger">
                                                                <span class="sr-only">95% Complete</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <i class="demo-pli-file-edit icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Write a news article</p>
                                                        <small>Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <span class="label label-info pull-right">New</span>
                                                    <div class="media-left">
                                                        <i class="demo-pli-speech-bubble-7 icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Comment Sorting</p>
                                                        <small>Last Update 8 hours ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <i class="demo-pli-add-user-star icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">New User Registered</p>
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="./../../../img/profile-photos/9.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Lucy sent you a message</p>
                                                        <small>30 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="./../../../img/profile-photos/3.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Jackson sent you a message</p>
                                                        <small>40 minutes ago</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Show All Notifications
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->



                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="ic-user pull-right">
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <!--You can use an image instead of an icon.-->
                                    <!--<img class="img-circle img-user media-object" src="img/profile-photos/1.png" alt="Profile Picture">-->
                                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                    <i class="demo-pli-male"></i>
                                </span>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--You can also display a user name in the navbar.-->
                                <!--<div class="username hidden-xs">Aaron Chavez</div>-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            </a>


                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right panel-default">
                                <ul class="head-list">
                                    <li>
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Messages</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End user dropdown-->
 
                        
                        <li>
                            <a href="#" class="aside-toggle">
                                <i class="demo-pli-dot-vertical"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div id="container-boxed"class="boxed">

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
                    <hr class="new-section-md bord-no">
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
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="img/logo.png" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">Nifty</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    -->



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="./../../../img/profile-photos/1.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name"><?php echo $validacionSession ?></p>
                                            <!--<span class="mnp-desc">aaron.cha@themeon.net</span>-->
                                        </a>
                                    </div>
                                    <div id="profile-nav" class="collapse list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                                        </a>
                                    </div>
                                </div>


                                <!--Shortcut buttons-->
                                <!--================================-->
                                <div id="mainnav-shortcut">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="My Profile">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Messages">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Activity">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Lock Screen">
                                            <a class="shortcut-grid" href="./../../../controllers/CtrlSalir.php">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================-->
                                <!--End shortcut buttons-->


                                <ul id="mainnav-menu" class="list-group">
						
						            <!--Category name-->
						            <li class="list-header">Modulos</li>
						
						            <!--Menu list item-->
						            <li>
						                <a href="./../inicio/main.php">
						                    <i class="demo-pli-home"></i>
						                    <span class="menu-title">Inicio</span>
						                </a>
						            </li>

                                    <template id="template-modulo">
                                        <li>
                                            <a href="#">
                                                <i class="demo-pli-tactic"></i>
                                                <span class="menu-title">Modulo Level</span>
                                                <i class="arrow"></i>
                                            </a>
                                        </li>
                                    </template>
                                    <template id="template-menu">
                                        <ul class="collapse">
                                            <li>
                                                <a href="#"> Menu Item<i class="arrow"></i></a>
                                            </li>
                                        </ul>
                                    </template>
                                    <template id="template-submenu">
                                        <ul class="collapse"><li><a href="#"> Menu Item</a></li></ul>
                                    </template>
	
                                </ul>


                                <!--Widget-->
                                <!--================================-->
                                <div class="mainnav-widget">

                                    <!-- Show the button on collapsed navigation -->
                                    <div class="show-small">
                                        <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="demo-pli-monitor-2"></i>
                                        </a>
                                    </div>

                                    <!-- Hide the content on collapsed navigation -->
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no mar-ver">Server Status</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>CPU Usage</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Bandwidth</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================-->
                                <!--End widget-->

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
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
   
    <script>
        const mainnav_menu = document.getElementById('mainnav-menu');
        //Asigno id al variable
        const templateModulo = document.getElementById('template-modulo').content;
        // C<reo el fragment
        const fragmentModulo = document.createDocumentFragment();
        //Asigno id al variable
        const templateMenu = document.getElementById('template-menu').content;
        // C<reo el fragment
        const fragmentMenu = document.createDocumentFragment();
        //Asigno id al variable
        const templateSubmenu = document.getElementById('template-submenu').content;
        // C<reo el fragment
        const fragmentSubmenu = document.createDocumentFragment();
        const i = document.createElement('i');
        const fragmenti = document.createDocumentFragment();
        const u = document.createElement('u');
        const fragmentu = document.createDocumentFragment();

        $(document).ready(function(){
            $('#mainnav-menu').on("click", function(e){
                
                if(e.target.parentElement.querySelector('ul')){
                    e.target.parentElement.querySelector('ul').classList.toggle('in');
                    e.target.parentElement.classList.toggle('active');
                }                
                
            });
            $('#mainnav-menu li a ul').on("click", function(e){
                e.target.parentElement.querySelector('ul').classList.toggle('in');
                e.target.parentElement.classList.toggle('active');
            });
        });
        
        // Solictud de la data menu
        const getAsignado = async (id_Usuario) => {
            const body = new FormData();
            body.append("data", JSON.stringify(id_Usuario));
            const res = await fetch('./../../../controllers/controllerNav.php', {
                method: "POST",
                body
            });
            data = await res.json()
            pintarNav(data);
            pintarCards(data)
        }
        
        console.log('ID USUARIO ES : '+id_Usuario);
        // Obtengo datos //
        getAsignado(id_Usuario);
         
        const pintarNav = (data) => {
            console.log(data);
            // scope en js --- o en general
            // const let var
            var modulo = 'false';
            var menu = 'false';
            var submenu = 'false';
            var template_Modulo = '';
            var template_Menu = '';
            var template_subMenu = '';

            for (var mo = 0; mo < data.length; mo++) {
                // Almaceno modulo en variable
                var nextModulo = data[mo]["nombre_modulo"];
                // Comparacion
                if (modulo !== nextModulo) {
                    // Recorrer Menu
                    for (var me = 0; me < data.length; me++) {
                        // Almaceno menu en variable
                        nextMenu = data[me]["nombre_menu"];
                        // Comparacion
                        if (data[mo]["nombre_modulo"] == data[me]["nombre_modulo"]) {
                            // Comparacion
                            if (menu != nextMenu) {

                                if (data[me]["link_menu"] !== '/') {
                                    template_Menu += '<!--Submenu-->\
                                                    <ul class="collapse">\
                                                        <li>\
                                                            <a href="./../' + data[me]["link_modulo"] + '/' + data[me]["link_menu"] + '"><i class="fa fa-group"></i>' + data[me]["nombre_menu"] + '</a>\
                                                        </li>\
                                                    </ul>';

                                } else {
                                    template_subMenu += '<ul class="collapse">';
                                    for (var sme = 0; sme < data.length; sme++) {
                                        // Almaceno submenu en variable
                                        nextsubMenu = data[sme]["nombre_submenu"];
                                        if (data[me]["nombre_menu"] == data[sme]["nombre_menu"]) {

                                            if (submenu != nextsubMenu) {
                                                template_subMenu += '\
                                                        <li><a href="./../' + data[sme]["link_modulo"] + '/' + data[sme]["link_submenu"] + '">' + data[sme]["nombre_submenu"] + '</a></li>\
                                                    ';
                                                submenu = data[sme]["nombre_submenu"]
                                            }
                                        }
                                    }
                                    template_subMenu += '</ul>';
                                    template_Menu += '<!--Submenu-->\
                                                    <ul class="collapse">\
                                                        <li>\
                                                            <a href="#"><i class="fa fa-group"></i>' + data[me]["nombre_menu"] + '<i class="arrow"></i></a>\
                                                            ' + template_subMenu + '\
                                                        </li>\
                                                    </ul>';
                                }

                                menu = data[me]["nombre_menu"];
                                template_subMenu = '';

                            }
                        }
                    }
                    template_Modulo += '<!--Menu list item-->\
                            <li class="">\
                                                <a href="#">\
                                                    <i class="ti-bookmark-alt"></i>\
                                                        <span class="menu-title">' + data[mo]["nombre_modulo"] + '</span>\
                                                    <i class="arrow"></i>\
                                                </a>' + template_Menu +
                        '</li>';
                    modulo = data[mo]["nombre_modulo"];
                    template_Menu = '';
                }
            }
            mainnav_menu.innerHTML = template_Modulo;
        }
    </script>



    <!--Morris.js [ OPTIONAL ]
    <script src=".\..\..\..\plugins\morris-js\morris.min.js"></script>
    <script src=".\..\..\..\plugins\morris-js\raphael-js\raphael.min.js"></script>-->



    <!--Custom script [ DEMONSTRATION ]-->
    <!--===================================================-->

    <script>
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
    </script>

    <!--<script type="text/javascript" src="./../../../js/index.js"></script>-->

</body>

</html>