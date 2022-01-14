            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <div id="mainnav">


                    <!--OPTIONAL : ADD YOUR LOGO TO THE NAVIGATION-->
                    <!--It will only appear on small screen devices.-->
                    <!--================================-->
                    <div class="mainnav-brand">
                        <a href="index.html" class="brand">
                            <img src=".\..\img\logo_letra.png" alt="Exploraciones Andinas Logo" class="brand-icon">
                            <span class="brand-text">Exploraciones Andinas S.A.C.</span>
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
                                            <p class="mnp-name"><?php echo $validacionSession ?></p>
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
						            <li class="list-header">MENU</li>
						
						            <!--Menu list item-->
						            <li class="">
						                <a href="#">
						                    <i class="ti-bookmark-alt"></i>
						                    <span class="menu-title">TAREO</span>
											<i class="arrow"></i>
						                </a>
						
						                <!--Submenu-->
						                <ul class="collapse">
                                            <li><a href="tareo.php">Main</a></li>
                                            <li><a href="labor.php">Labor</a></li>
                                            <li><a href="trabajador.php">Trabajador</a></li>
                                            <!--<li><a href="zona.php">Zona</a></li>-->
						                </ul>
						            </li>

                                    <!--Menu list item-->
						            <li class="active-sub">
						                <a href="#">
						                    <i class="ti-bookmark-alt"></i>
						                    <span class="menu-title">REGISTRO DE DATOS</span>
											<i class="arrow"></i>
						                </a>
						
                                        <!--Submenu-->
                                        <ul class="collapse in">
											<li>
                                                <a href="#">Vales de explosivos<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="./valeExplosivos.php">Ingreso de Vales de Explosivos</a></li>
                                                    <li><a href="#">Consulta de vales de Explosivos</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Operación Mina<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="./operacionMina.php">Registro</a></li>
                                                    <li><a href="#">Consulta</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Extraccion Mineral<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="./extraccionMineral.php">Inicio</a></li>
                                                    <li><a href="./extraccionMineral.php">Registro</a></li>
                                                    <li><a href="#">Consulta</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Operacion de Equipos<i class="arrow"></i></a>

                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <li><a href="#">Registro</a></li>
                                                    <li><a href="#">Consulta</a></li>
                                                </ul>
                                            </li>
                                            <!--
                                            <li><a href="./operacionMina.php">Registro Operación Mina</a></li>
                                            <li><a href="./extraccionMineral.php">Registro de Extraccion de Mineral</a></li>
                                            <li><a href="#">Registro de Operación de Equipos</a></li>-->
                                            <li class="list-divider"></li>
											<li><a href="#">Salir del Sistema</a></li>
                                        </ul>
						            </li>

                                    <!--Menu list item-->
						            <li class="">
						                <a href="#">
						                    <i class="fa fa-group"></i>
						                    <span class="menu-title">ADM DE USUARIOS</span>
											<i class="arrow"></i>
						                </a>
						
                                        <!--Submenu-->
                                        <ul class="collapse in">
											<li>
                                                <a href="#"><i class="fa fa-group"></i>Usuarios<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="./usuarios.php">Inicio</a></li>
                                                    <li><a href="./usuarios.php">Ingreso Usuario</a></li>
                                                    <li><a href="#">Consulta de Usuario</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Perfil<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="#">Ingreso Perfil</a></li>
                                                    <li><a href="#">Consulta de Perfil</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Rol<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="#">Ingreso Rol</a></li>
                                                    <li><a href="#">Consulta de Rol</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Modulo<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="#">Ingreso Modulo</a></li>
                                                    <li><a href="#">Consulta de v</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Menu<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="#">Ingreso Menu</a></li>
                                                    <li><a href="#">Consulta de Menu</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Submenu<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
                                                    <li><a href="#">Ingreso Submenu</a></li>
                                                    <li><a href="#">Consulta de Submenu</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Asignacion Perfil<i class="arrow"></i></a>
                                                <!--Submenu-->
                                                <ul class="collapse in">
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
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->