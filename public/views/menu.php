<?php

    
    include('./../../../controllers/controllerNav.php');
    /* <!--NAVBAR--> */
    /* <!--===================================================--> */
    $template_navBar = '
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="'. URL_LOGO .'" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">' . NOMBRE_COMERCIAL . '</span>
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
                            <a class="mainnav-toggle slide" href="#">
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
                                        <input id="search-input" type="text" class="form-control" placeholder="Escriba para buscar...">
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
                                            <li><a href="#">Perfil</a></li>
                                            <li><a href="#">Resultado de búsqueda</a></li>
                                            <li><a href="#">Preguntas más frecuentes</a></li>
                                            <li><a href="#">Bloqueo de pantalla</a></li>
                                            <li><a href="#">Mantenimiento</a></li>
                                            <li><a href="#">Factura</a></li>
                                            <li><a href="#" class="disabled">Discapacitado</a></li>
                                        </ul>

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
                                                <img class="img-responsive" src="img\thumbs\img-1.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img\thumbs\img-3.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img\thumbs\img-2.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img\thumbs\img-4.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img\thumbs\img-6.jpeg" alt="thumbs">
                                            </div>
                                            <div class="col-xs-4">
                                                <img class="img-responsive" src="img\thumbs\img-5.jpeg" alt="thumbs">
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
                                                        <p class="text-nowrap text-main text-semibold">HDD está lleno</p>
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
                                                        <p class="mar-no text-nowrap text-main text-semibold">Escribir un artículo de noticias</p>
                                                        <small>Última actualización hace 8 horas</small>
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
                                                        <p class="mar-no text-nowrap text-main text-semibold">Clasificación de comentarios</p>
                                                        <small>Última actualización hace 8 horas</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <i class="demo-pli-add-user-star icon-2x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Nuevos usuario registrado</p>
                                                        <small>hace 4 minutos</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="..\img\profile-photos\9.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Lucía te envió un mensaje</p>
                                                        <small>hace 30 minutos</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="media" href="#">
                                                    <div class="media-left">
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="..\img\profile-photos\3.png">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mar-no text-nowrap text-main text-semibold">Jackson te envió un mensaje</p>
                                                        <small>hace 40 minutos</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!--Dropdown footer-->
                                <div class="pad-all bord-top">
                                    <a href="#" class="btn-link text-main box-block">
                                        <i class="pci-chevron chevron-right pull-right"></i>Mostrar todas las notificaciones
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
                                        <a href="#"><i class="demo-pli-male icon-lg icon-fw"></i> Perfil</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="badge badge-danger pull-right">9</span><i class="demo-pli-mail icon-lg icon-fw"></i> Mensajes</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="label label-success pull-right">New</span><i class="demo-pli-gear icon-lg icon-fw"></i> Ajustes</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="demo-pli-computer-secure icon-lg icon-fw"></i> Bloquear pantalla</a>
                                    </li>
                                    <li>
                                        <a href="./../controllers/CtrlSalir.php"><i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión</a>
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
    ';
    $template_MainNavigation = '
    <nav id="mainnav-container">
        <div id="mainnav">
            <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
            <!--It will only appear on small screen devices.-->
            <!--================================-->
            <div class="mainnav-brand">
                <a href="index.html" class="brand" style="display: flex;">
                    <img src="'. URL_LOGO .'" alt="Exploraciones Andinas Logo" class="brand-icon">
                    <span class="brand-text" style="text-align: center;">' . NOMBRE_COMERCIAL . '</span>
                </a>
                <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
            </div>
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
                                    <img class="img-circle img-md" src="..\..\img\profile-photos\1.png" alt="Profile Picture">
                                </div>
                                <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                    <span class="pull-right dropdown-toggle">
                                        <i class="dropdown-caret"></i>
                                    </span>
                                    <p class="mnp-name">' . $validacionSession . '</p>
                                    <!--<span class="mnp-desc">prueba.cha@themeon.net</span>-->
                                </a>
                            </div>
                                <div id="profile-nav" class="collapse list-group bg-trans">
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-male icon-lg icon-fw"></i> Ver perfil
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-gear icon-lg icon-fw"></i> Ajustes
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Ayuda
                                    </a>
                                    <a href="./../controllers/CtrlSalir.php" class="list-group-item">
                                        <i class="demo-pli-unlock icon-lg icon-fw"></i> Cerrar sesión
                                    </a>
                                </div>
                            </div>
                            <!--Shortcut buttons-->
                            <!--================================-->
                            <div id="mainnav-shortcut" class="">
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
                            
                                <!--Menu list item--
                                <li class="">
                                    <a href="#">
                                        <i class="ti-bookmark-alt"></i>
                                        <span class="menu-title">TAREO</span>
                                        <i class="arrow"></i>
                                    </a>
                            
                                    <!--Submenu--
                                    <ul class="collapse">
                                        <li><a href="tareo.php">Main</a></li>
                                        <li><a href="labor.php">Labor</a></li>
                                        <li><a href="trabajador.php">Trabajador</a></li>
                                        <!--<li><a href="zona.php">Zona</a></li>
                                    </ul>
                                </li>-->
                                <!--Modulo list item-->';
                                $modulo = 'false';
                                $menu ='false';
                                $menu_nivel2 =$rptSql[0]['nombre_menu'];
                                $submenu = 'false';
                                $template_Modulo = '';
                                $template_Menu = '';
                                $template_subMenu = '';
                                // Recorrer Modulos
                                for ($mo=0; $mo < count($rptSql); $mo++) {                                    
                                    // Almaceno modulo en variable
                                    $nextModulo = $rptSql[$mo]["nombre_modulo"];                                    
                                    // Comparacion
                                    if($modulo != $nextModulo){
                                        // Recorrer Menu
                                        for ($me=0; $me < count($rptSql); $me++) {
                                            // Almaceno modulo en variable
                                            $nextMenu = $rptSql[$me]["nombre_menu"];
                                            // Comparacion
                                            if ($rptSql[$mo]["nombre_modulo"] == $rptSql[$me]["nombre_modulo"]) {
                                                // Comparacion
                                                if($menu != $nextMenu){
                                                    // Recorrer subMenu
                                                    for ($sme=0; $sme < count($rptSql); $sme++) {
                                                        // Almaceno modulo en variable
                                                        $nextsubMenu = $rptSql[$me]["nombre_submenu"];
                                                        if ( $rptSql[$me]["nombre_menu"] == $rptSql[$sme]["nombre_menu"]) {
                                                            if ($submenu != $nextsubMenu) {
                                                                $template_subMenu .= '<li>
                                                                        <a href="';
                                                                        if ($rptSql[$me]["link_submenu"]) {
                                                                            $template_subMenu .=$rptSql[$sme]["link_submenu"];
                                                                        }else{
                                                                            $template_subMenu .= './';
                                                                        }
                                                            $template_subMenu .= '">' . $rptSql[$sme]["nombre_submenu"] . '</a>
                                                                    </li>';
                                                                
                                                            }
                                                        }
                                                    }
                                                    $template_Menu .= ' 
                                                                        <li>
                                                                            <a href="';
                                                                            if ($rptSql[$me]["nombre_menu"]) {
                                                                                $template_Menu .= $rptSql[$me]["link_menu"];
                                                                            }else{
                                                                                $template_Menu .= '#';
                                                                            }
                                                            $template_Menu .= '">
                                                                                ' . $rptSql[$me]["nombre_menu"];
                                                                                if ($rptSql[$me]["nombre_submenu"]) {
                                                                                    $template_Menu .= '<i class="arrow"> </i>';
                                                                                }
                                                        $template_Menu .= '</a>';
                                                        if ($rptSql[$me]["nombre_submenu"]) {
                                                            $template_Menu .= ' <!--Submenu-->
                                                                            <ul class="collapse">' . $template_subMenu .'</ul>';
                                                                        
                                                        }
                                                        $template_Menu .= '</li>';
                                                        $template_subMenu = '';
                                                }
                                                
                                            }
                                            $menu = $nextMenu;
                                        }
                                        
                                        $template_Modulo .= '<!--Menu list item-->
                                            <li>
                                                <a href="#">
                                                    <span class="menu-title">' . $rptSql[$mo]["nombre_modulo"] .'</span>';
                                                    if ($rptSql[$mo]["nombre_menu"]) {
                                                        $template_Modulo .= '<i class="arrow">  </i>';
                                                    }
                                                    
                            $template_Modulo .= '</a>';
                        if ($rptSql[$mo]["nombre_menu"]) {
                            $template_Modulo .= '<!--Submenu-->
                                                <ul class="collapse">
                                                    ' . $template_Menu . '
                                                </ul>';
                        }
                        
                         $template_Modulo .= '</li>';
                                        $template_Menu = '';
                                    }
                                    $modulo = $nextModulo;
                                }
                                $template_MainNavigation .= $template_Modulo . '<!--Menu list item-->
                                        
                                        <!--Menu list item-->
                                        <li class="">
                                            <a href="#">
                                                <i class="fa fa-group"></i>
                                                <span class="menu-title">ADM DE USUARIOS</span>
                                                <i class="arrow"></i>
                                            </a>
                            
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li>
                                                    <a href="./usuarios.php"><i class="fa fa-group"></i>Usuarios</a>
                                                </li>
                                                <li>
                                                    <a href="#">Perfil<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Perfil</a></li>
                                                        <li><a href="#">Consulta de Perfil</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Rol<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Rol</a></li>
                                                        <li><a href="#">Consulta de Rol</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Modulo<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Modulo</a></li>
                                                        <li><a href="#">Consulta de v</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Menu<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Menu</a></li>
                                                        <li><a href="#">Consulta de Menu</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Submenu<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Submenu</a></li>
                                                        <li><a href="#">Consulta de Submenu</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">Asignacion Perfil</a>
                                                </li>
                                                <li>
                                                    <a href="./permisos.php">Permisos</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="list-divider"></li>
                                        <li class="">
                                            <a href="#">
                                                <i class="demo-pli-unlock"></i>
                                                <span class="menu-title">Cerrar Sessión</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
    
                    </div>
                </nav>';
?>