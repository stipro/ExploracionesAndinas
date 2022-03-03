<?php
    /* <!--NAVBAR--> */
    /* <!--===================================================--> */
    $template_navBar = '
    <header id="navbar">
        <div id="navbar-container" class="boxed">
            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <img src="'.URL_LOGO.'" alt="Nifty Logo" class="brand-icon">
                    <div class="brand-title">
                        <span class="brand-text">' . NOMBRE_SISTEMA . '</span>
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
                                    <input id="search-input" type="text" class="form-control" placeholder="Escriba para buscar ...">
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
                    <li class="">
                        <a href="#" class="">
                            <i class="fa fa-sign-out"></i> Salir
                        </a>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End mega dropdown-->
                </ul>
            </div>
            <!--================================
            <!--End Navbar Dropdown-->

        </div>
    </header>
    ';
    /* <!--MAIN NAVIGATION--> */
    /* <!--===================================================--> */
    $template_MainNavigation = '
    <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================-->
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src="' . URL_LOGO . '" alt="Nifty Logo" class="brand-icon">
                            <span class="brand-text">' . NOMBRE_SISTEMA . '</span>
                        </a>
                        <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
                    </div>
                    



                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">

                                <!--Profile Widget-->
                                <!--================================
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="./../../../img/profile-photos/1.png" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                            <p class="mnp-name">' . $validacionSession . '</p>
                                            <!--<span class="mnp-desc">aaron.cha@themeon.net</span>
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
                                -->

                                <!--Shortcut buttons-->
                                <!--================================
                                <div id="mainnav-shortcut">
                                    <ul class="list-unstyled shortcut-wrap">
                                        <li class="col-xs-3" data-content="Mi perfil">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                                                <i class="demo-pli-male"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Mensajes">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                                                <i class="demo-pli-speech-bubble-3"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Actividad">
                                            <a class="shortcut-grid" href="#">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                                                <i class="demo-pli-thunder"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="col-xs-3" data-content="Bloquear pantalla">
                                            <a class="shortcut-grid" href="./../../../controllers/CtrlSalir.php">
                                                <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                                                <i class="demo-pli-lock-2"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--================================
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
                                <!--================================
                                <div class="mainnav-widget">

                                    <!-- Show the button on collapsed navigation 
                                    <div class="show-small">
                                        <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                                            <i class="demo-pli-monitor-2"></i>
                                        </a>
                                    </div>

                                    <!-- Hide the content on collapsed navigation 
                                    <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                                        <ul class="list-group">
                                            <li class="list-header pad-no mar-ver">Estado del Servidor</li>
                                            <li class="mar-btm">
                                                <span class="label label-primary pull-right">15%</span>
                                                <p>Uso de CPU</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                                        <span class="sr-only">15%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mar-btm">
                                                <span class="label label-purple pull-right">75%</span>
                                                <p>Banda ancha</p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                                        <span class="sr-only">75%</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">Ver detalles</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--================================
                                <!--End widget

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->

                </div>
            </nav>
    ';
?>