<?php
    $string = file_get_contents("./../data-logo.json");
    $json_a = json_decode($string, true);
    include('./../models/nav.php');
    $tableManager = new Nav();
    $rptSql = $tableManager->getAll();
    $templateNav = '
    <nav id="mainnav-container">
        <div id="mainnav">
            <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
            <!--It will only appear on small screen devices.-->
            <!--================================-->
            <div class="mainnav-brand">
                <a href="index.html" class="brand" style="display: flex;">
                    <img src="'. $json_a['Empresa']['url'] .'" alt="Exploraciones Andinas Logo" class="brand-icon">
                    <span class="brand-text" style="text-align: center;">' . $json_a['Empresa']['nombre'] . '</span>
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
                                    <img class="img-circle img-md" src="..\img\profile-photos\1.png" alt="Profile Picture">
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
                                        <a class="shortcut-grid" href="./../controllers/CtrlSalir.php">
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
                                $templateNav .= $template_Modulo . '<!--Menu list item-->
                                        
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
                                                    <a href="#">Asignacion Perfil<i class="arrow"></i></a>
                                                    <!--Submenu-->
                                                    <ul class="collapse">
                                                        <li><a href="#">Ingreso Asignacion Perfil</a></li>
                                                        <li><a href="#">Consulta de Asignacion Perfil</a></li>
                                                    </ul>
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