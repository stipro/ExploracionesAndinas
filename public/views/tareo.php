<?php
session_start();
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
    }
    $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Mod. Principal | Sistema Tareo</title>
    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="..\css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="..\css\demo\nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="..\plugins\pace\pace.min.css" rel="stylesheet">

    <script src="..\plugins\pace\pace.min.js"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\css\demo\nifty-demo.min.css" rel="stylesheet">

    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="..\plugins\bootstrap-select\bootstrap-select.min.css" rel="stylesheet">
    <!--Chosen [ OPTIONAL ]-->
    <link href="..\plugins\chosen\chosen.min.css" rel="stylesheet">
    <!--noUiSlider [ OPTIONAL ]-->
    <link href="..\plugins\noUiSlider\nouislider.min.css" rel="stylesheet">
    <!--Select2 [ OPTIONAL ]-->
    <link href="..\plugins\select2\css\select2.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="..\css\demo\nifty-demo.min.css" rel="stylesheet">
    <!--Themify Icons [ OPTIONAL ]-->
    <link href="..\plugins\themify-icons\themify-icons.min.css" rel="stylesheet">
    <!--FooTable [ OPTIONAL ]
    <link href="..\plugins\fooTable\css\footable.core.css" rel="stylesheet">-->
    <!--Ion Icons [ OPTIONAL ]-->
    <link href="..\plugins\ionicons\css\ionicons.min.css" rel="stylesheet">

    <!--Chosen [ OPTIONAL ]-->
    <link href="..\plugins\chosen\chosen.min.css" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="..\css\tareo.css" rel="stylesheet">

    <!--Font Awesome [ OPTIONAL ]-->
    <link href="..\plugins\font-awesome\css\font-awesome.min.css" rel="stylesheet">

            
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
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src=".\..\img\logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">Exploraciones Andinas S.A.C.</span>
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
									        <li><a href="#" class="disabled">Disabled</a></li>                                        
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
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img\profile-photos\9.png">
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
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="img\profile-photos\3.png">
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

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <div class="pad-all text-center">
                        <h3>Bienvenido de nuevo al Panel de control.</h3>
                        <p1>Desplácese hacia abajo para ver enlaces rápidos y descripciones generales de su servidor, lista de tareas pendientes, estado del pedido u obtener ayuda con Soporte TI.</p1>
                    </div>
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-xs-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">TAREO</h3>
					            </div>
                                <input id="user-logout" type="button" value="Cerra Session">
					            <!--Data Table-->
					            <!--===================================================-->
					            <div class="panel-body">
					                <div class="pad-btm form-inline">
					                    <div class="row">
					                        <div class="col-sm-6 table-toolbar-left">
					                            <button id="btn-Agregar" data-target="#demo-lg-modal" data-toggle="modal" class="btn btn-primary"><i class="demo-pli-add icon-fw"></i>Agregar</button>
					                            <a href="./../excelGenerator.php?docDescarga='. $value['nombre'].'&extension='. $value['extension'].'&time='.date('h:m:y').'" class="btn btn-default" download="" title="Descargar Archivo">
                                                    <i class="fa fa-file-excel-o icon-lg"></i>
                                                </a>
					                            <div class="btn-group">
					                                <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
					                                <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
					                            </div>
					                        </div>
					                        <div class="col-sm-6 table-toolbar-right">
                                                <div class="btn-group">
                                                        <div class="input-group">
                                                            <input id="ipt-Buscar" type="text" placeholder="Busqueda por columna" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button id="btn-Buscar"class="btn btn-primary" type="button">Buscar</button>
                                                            </span>
                                                        </div>			
                                                        <!--===================================================-->
                                                        <select data-placeholder="Elija Columna" id="demo-chosen-select" tabindex="2">
                                                            <option value="codigo">codigo</option>
                                                            <option value="nombre">nombre</option>
                                                            <option value="cargo">cargo</option>
                                                        </select>
                                                    </div>
					                        </div>
					                    </div>
					                </div>
                                    <!-- Foo Table - Row Toggler -->
                                    <!--===================================================-->
                                    <div class="panel-body">
                                        <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                            <thead>
                                                <tr>
                                                    <th data-sort-ignore="true" class="min-width"></th>
                                                    <th data-sort-initial="true" data-toggle="true">Código</th>
                                                    <th>Apellidos y Nombres</th>
                                                    <th data-hide="phone, tablet">Cargo</th>
                                                    <th data-hide="phone, tablet">Dia</th>
                                                    <!--<th data-hide="phone, tablet">Actividad</th>-->
                                                    <th data-hide="phone, tablet">Turno</th>
                                                    <th data-hide="phone, tablet">Ht</th>
                                                    <th data-hide="phone, tablet">Ht Sev_Ad</th>
                                                    <th data-hide="phone, tablet">**Ccostos</th>
                                                    <th data-hide="phone, tablet">Labor</th>
                                                    <th data-hide="phone, tablet">Nivel</th>
                                                    <th data-hide="phone, tablet">He</th>
                                                    <th data-hide="phone, tablet">He Ser Ad</th>
                                                    <th data-hide="phone, tablet">C. Costos He</th>
                                                    <th data-hide="phone, tablet">V.B</th>
                                                    <th data-hide="phone, tablet">Guardia</th>
                                                    <th data-hide="phone, tablet">Cod_Actividad</th>
                                                    <th data-hide="phone, tablet">Área</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-tareo">

                                            </tbody>
                                            <template id="template-td-tareo">
                                                <tr id="registro-tareo">
                                                    <td>
                                                        <button id="btn-delete" class="btn btn-danger btn-xs btn-delete">
                                                            <i class="demo-pli-cross"></i>
                                                        </button>
                                                        <button id="btn-edit" class="btn btn-warning btn-xs btn-edit" data-target="#modal-edit"  data-toggle="modal">
                                                        <i class="ti-pencil-alt"></i></button>
                                                    </td>
                                                    <td id="codigo">..</td>
                                                    <td id="nombreCompleto">Boudreaux</td>
                                                    <td id="cargo">Traffic Court Referee</td>
                                                    <td id="dia">22 Jun 1972</td>
                                                    <!--<td id="actividad">22 Jun 1972</td>-->
                                                    <td id="turno">Isidra</td>
                                                    <td id="ht">Boudreaux</td>
                                                    <td id="htSev_ad">Isidra</td>
                                                    <td id="costos">Boudreaux</td>
                                                    <td id="labor">Traffic Court Referee</td>
                                                    <td id="nivel">22 Jun 1972</td>
                                                    <td id="hE">22 Jun 1972</td>
                                                    <td id="heSerAd">Isidra</td>
                                                    <td id="cCostosHe">Boudreaux</td>
                                                    <td id="VB">Traffic Court Referee</td>
                                                    <td id="guardia">22 Jun 1972</td>
                                                    <td id="codActividad">22 Jun 1972</td>
                                                    <td id="Area">..</td>
                                                </tr>
                                                </template>
                                            <tfoot>
                                              <!-- Paginación -->
                                              <nav aria-label="Page navigation example">
                                                    <ul class="pagination" id="pagination">
                                                        <!--<li class="disabled"><a class="page-link" href="#">Anterior</a></li>-->

                                                        <!--
                                                            <li class="disabled"><span>...</span></li>
                                                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                                                        -->
                                                    </ul>
                                                    <template id="template-pagination">
                                                        <li id="itemPage" class="page-item"><a class="page-link" href="#">2</a></li>
                                                    </template>
                                                </nav>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--===================================================-->
                                    <!-- End Foo Table - Row Toggler -->
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
            <aside id="aside-container">
                <div id="aside">
                    <div class="nano">
                        <div class="nano-content">
                            
                            <!--Nav tabs-->
                            <!--================================-->
                            <ul class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#demo-asd-tab-1" data-toggle="tab">
                                        <i class="demo-pli-speech-bubble-7 icon-lg"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-2" data-toggle="tab">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Report
                                    </a>
                                </li>
                                <li>
                                    <a href="#demo-asd-tab-3" data-toggle="tab">
                                        <i class="demo-pli-wrench icon-lg icon-fw"></i> Settings
                                    </a>
                                </li>
                            </ul>
                            <!--================================-->
                            <!--End nav tabs-->



                            <!-- Tabs Content -->
                            <!--================================-->
                            <div class="tab-content">

                                <!--First tab (Contact list)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade in active" id="demo-asd-tab-1">
                                    <p class="pad-all text-main text-sm text-uppercase text-bold">
                                        <span class="pull-right badge badge-warning">3</span> Family
                                    </p>

                                    <!--Family-->
                                    <div class="list-group bg-trans">
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\2.png" alt="Profile Picture">
												<i class="badge badge-success badge-stat badge-icon pull-left"></i>
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Stephen Tran</p>
							                    <small class="text-muteds">Availabe</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\7.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Brittany Meyer</p>
							                    <small class="text-muteds">I think so</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\1.png" alt="Profile Picture">
												<i class="badge badge-info badge-stat badge-icon pull-left"></i>
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Jack George</p>
							                    <small class="text-muteds">Last Seen 2 hours ago</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\4.png" alt="Profile Picture">
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Donald Brown</p>
							                    <small class="text-muteds">Lorem ipsum dolor sit amet.</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\8.png" alt="Profile Picture">
												<i class="badge badge-warning badge-stat badge-icon pull-left"></i>
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Betty Murphy</p>
							                    <small class="text-muteds">Idle</small>
							                </div>
							            </a>
							            <a href="#" class="list-group-item">
							                <div class="media-left pos-rel">
							                    <img class="img-circle img-xs" src="img\profile-photos\9.png" alt="Profile Picture">
												<i class="badge badge-danger badge-stat badge-icon pull-left"></i>
							                </div>
							                <div class="media-body">
							                    <p class="mar-no text-main">Samantha Reid</p>
							                    <small class="text-muteds">Offline</small>
							                </div>
							            </a>
                                    </div>

                                    <hr>
                                    <p class="pad-all text-main text-sm text-uppercase text-bold">
                                        <span class="pull-right badge badge-success">Offline</span> Friends
                                    </p>

                                    <!--Works-->
                                    <div class="list-group bg-trans">
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-purple badge-icon badge-fw pull-left"></span> Joey K. Greyson
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-info badge-icon badge-fw pull-left"></span> Andrea Branden
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-success badge-icon badge-fw pull-left"></span> Johny Juan
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <span class="badge badge-danger badge-icon badge-fw pull-left"></span> Susan Sun
                                        </a>
                                    </div>


                                    <hr>
                                    <p class="pad-all text-main text-sm text-uppercase text-bold">News</p>

                                    <div class="pad-hor">
                                        <p>Lorem ipsum dolor sit amet, consectetuer
                                            <a data-title="45%" class="add-tooltip text-semibold text-main" href="#">adipiscing elit</a>, sed diam nonummy nibh. Lorem ipsum dolor sit amet.
                                        </p>
                                        <small><em>Last Update : Des 12, 2014</em></small>
                                    </div>


                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--End first tab (Contact list)-->


                                <!--Second tab (Custom layout)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade" id="demo-asd-tab-2">

                                    <!--Monthly billing-->
                                    <div class="pad-all">
                                        <p class="pad-ver text-main text-sm text-uppercase text-bold">Billing &amp; reports</p>
                                        <p>Get <strong class="text-main">$5.00</strong> off your next bill by making sure your full payment reaches us before August 5, 2018.</p>
                                    </div>
                                    <hr class="new-section-xs">
                                    <div class="pad-all">
                                        <span class="pad-ver text-main text-sm text-uppercase text-bold">Amount Due On</span>
                                        <p class="text-sm">August 17, 2018</p>
                                        <p class="text-2x text-thin text-main">$83.09</p>
                                        <button class="btn btn-block btn-success mar-top">Pay Now</button>
                                    </div>


                                    <hr>

                                    <p class="pad-all text-main text-sm text-uppercase text-bold">Additional Actions</p>

                                    <!--Simple Menu-->
                                    <div class="list-group bg-trans">
                                        <a href="#" class="list-group-item"><i class="demo-pli-information icon-lg icon-fw"></i> Service Information</a>
                                        <a href="#" class="list-group-item"><i class="demo-pli-mine icon-lg icon-fw"></i> Usage Profile</a>
                                        <a href="#" class="list-group-item"><span class="label label-info pull-right">New</span><i class="demo-pli-credit-card-2 icon-lg icon-fw"></i> Payment Options</a>
                                        <a href="#" class="list-group-item"><i class="demo-pli-support icon-lg icon-fw"></i> Message Center</a>
                                    </div>


                                    <hr>

                                    <div class="text-center">
                                        <div><i class="demo-pli-old-telephone icon-3x"></i></div>
                                        Questions?
                                        <p class="text-lg text-semibold text-main"> (415) 234-53454 </p>
                                        <small><em>We are here 24/7</em></small>
                                    </div>
                                </div>
                                <!--End second tab (Custom layout)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


                                <!--Third tab (Settings)-->
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <div class="tab-pane fade" id="demo-asd-tab-3">
                                    <ul class="list-group bg-trans">
                                        <li class="pad-top list-header">
                                            <p class="text-main text-sm text-uppercase text-bold mar-no">Account Settings</p>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-1" type="checkbox" checked="">
                                                <label for="demo-switch-1"></label>
                                            </div>
                                            <p class="mar-no text-main">Show my personal status</p>
                                            <small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</small>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-2" type="checkbox" checked="">
                                                <label for="demo-switch-2"></label>
                                            </div>
                                            <p class="mar-no text-main">Show offline contact</p>
                                            <small class="text-muted">Aenean commodo ligula eget dolor. Aenean massa.</small>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-3" type="checkbox">
                                                <label for="demo-switch-3"></label>
                                            </div>
                                            <p class="mar-no text-main">Invisible mode </p>
                                            <small class="text-muted">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </small>
                                        </li>
                                    </ul>


                                    <hr>

                                    <ul class="list-group pad-btm bg-trans">
                                        <li class="list-header"><p class="text-main text-sm text-uppercase text-bold mar-no">Public Settings</p></li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-4" type="checkbox" checked="">
                                                <label for="demo-switch-4"></label>
                                            </div>
                                            Online status
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-5" type="checkbox" checked="">
                                                <label for="demo-switch-5"></label>
                                            </div>
                                            Show offline contact
                                        </li>
                                        <li class="list-group-item">
                                            <div class="pull-right">
                                                <input class="toggle-switch" id="demo-switch-6" type="checkbox" checked="">
                                                <label for="demo-switch-6"></label>
                                            </div>
                                            Show my device icon
                                        </li>
                                    </ul>



                                    <hr>

                                    <p class="pad-hor text-main text-sm text-uppercase text-bold mar-no">Task Progress</p>
                                    <div class="pad-all">
                                        <p class="text-main">Upgrade Progress</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-success" style="width: 15%;"><span class="sr-only">15%</span></div>
                                        </div>
                                        <small>15% Completed</small>
                                    </div>
                                    <div class="pad-hor">
                                        <p class="text-main">Database</p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar progress-bar-danger" style="width: 75%;"><span class="sr-only">75%</span></div>
                                        </div>
                                        <small>17/23 Database</small>
                                    </div>

                                </div>
                                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                                <!--Third tab (Settings)-->

                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--===================================================-->
            <!--END ASIDE-->

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php include_once "../menu.php"; ?>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>

        

        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pad-rgt pull-right">
                You have <a href="#" class="text-main"><span class="badge badge-danger">3</span> pending action.</a>
            </div>



            <!-- Visible when footer positions are static -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="hide-fixed pull-right pad-rgt">
                14GB of <strong>512GB</strong> Free.
            </div>



            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

            <p class="pad-lft">&#0169; 2018 Your Company</p>



        </footer>
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

    <!--Editar Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-edit" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Editar Registro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-Edit">
                        
                    </div>
					            <!--Input Size-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
                                        <!-- FORMULARIO -->
                                        <div class="form-group">
					                        <label for="formIptTextCodigoEdit" class="col-sm-3 control-label">Código</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Código" class="form-control" id="formIptTextCodigoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextNombreEdit" class="col-sm-3 control-label">Nombre</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Cargo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextDiaEdit" class="col-sm-3 control-label">Dia</label>
					                        <div class="col-sm-6">
					                            <input type="date" placeholder="Dia" class="form-control" id="formIptTextDiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextTurnoEdit" class="col-sm-3 control-label">Turno</label>
					                        <div class="col-sm-6">
                                            <!--<input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
                                                -===================================================-->
                                                <select data-placeholder="elige un turno" id="formIptTextTurnoEdit" tabindex="2">
                                                    <option value="Día">Día</option>
                                                    <option value="Noche">Noche</option>
                                                    <option value="Blanco">Descanso</option>
                                                </select>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHTEdit" class="col-sm-3 control-label">H.T.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Trabajo" class="form-control" id="formIptNumHTEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextHTSerAdiEdit" class="col-sm-3 control-label">H.T. Serv. Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H. T. Servicio Adicional" class="form-control" id="formIptTextHTSerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCCostosEdit" class="col-sm-3 control-label">C. Costos</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Centro de costos" class="form-control" id="formIptTextCCostosEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextLaborEdit" class="col-sm-3 control-label">Labor</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Labor" class="form-control" id="formIptTextLaborEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumNivelEdit" class="col-sm-3 control-label">Nivel</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nivel" class="form-control" id="formIptNumNivelEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHEEdit" class="col-sm-3 control-label">Horas Extras (H.E.)</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Extras" class="form-control" id="formIptNumHEEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHESerAdiEdit" class="col-sm-3 control-label">H.E. Servicio Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H.E Servicio Adicional" class="form-control" id="formIptNumHESerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumCCostosHorasExtrasEdit" class="col-sm-3 control-label">C.Costos Horas E.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="C. Costos Horas Extras" class="form-control" id="formIptNumCCostosHorasExtrasEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextZonaEdit" class="col-sm-3 control-label">Zona</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Zona" class="form-control" id="formIptTextZonaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextGuardiaEdit" class="col-sm-3 control-label">Cod. Guardia</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Codigo Guardia" class="form-control" id="formIptTextGuardiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumActividadEdit" class="col-sm-3 control-label">Numero Actividad</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="N° Actividad" class="form-control" id="formIptNumActividadEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextAreaEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Área" class="form-control" id="formIptTextAreaEdit">
					                        </div>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Input Size-->
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtn-edit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-lg-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Registro</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <form class="form-horizontal">
                        <div id="group1Form">
                            <div id="g1item1Form">
                                <p class="bord-btm pad-ver text-main text-bold">Personal</p>
                                <fieldset>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptNumberNTarjeta" class="col-sm-3 control-label">N. Tarjeta</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Tarjeta" class="form-control" id="formIptNumberNTarjeta">
                                        </div>
                                    </div>
                                    <div id="rptBusquedaDni">
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptNumberDni" class="col-sm-3 control-label">DNI</label>
                                        <div class="col-sm-6">
                                            <input type="number" placeholder="DNI" class="form-control" id="formIptNumberDni">
                                        </div>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptTextNombre" class="col-sm-3 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombre">
                                        </div>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="form-group">
                                        <label for="formIptTextCargo" class="col-sm-3 control-label">Cargo</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargo" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Area</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Area" class="form-control" id="formIptTextArea" disabled>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div id="g1item2Form">
                                <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formiptDateDia" class="col-lg-3 control-label">Dia</label>
                                        <div class="col-lg-7">
                                            <input type="date" class="form-control" id="formiptDateDia">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTurno" class="col-lg-3 control-label">Turno</label>
                                        <div class="col-lg-7">
                                            <select class="form-select" aria-label="Default select" id="formselectTurno" tabindex="2">
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                                <option value="Descanso">Descanso</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectGuardia" class="col-lg-3 control-label">Guardia</label>
                                        <div class="col-lg-7">
                                            <select data-placeholder="Choose a Country..." id="formselectGuardia" tabindex="2">
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                            </select>
                                        <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The confirm password is required and can't be empty</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The password and its confirm are not the same</small></div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="formiptDecimalActividad" class="col-lg-3 control-label">Ingrese N° Actividad HT</label>
                                            <div class="col-lg-7">
                                                <input type="number" placeholder="N° Actividad" class="form-control" id="formiptDecimalActividad">
                                            </div>
                                        </div>
                                    <div>
                                </fieldset>
                            </div>
                        </div>
                        <div id="group2Form">
                            <div id="g2item1Form">
                                <p class="bord-btm pad-ver text-main text-bold">CCostos</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTextCodZona" class="col-lg-3 control-label">Cod Zona</label>
                                        <select data-placeholder="" id="formselectTextCodZona" tabindex="2">
                                        </select>
                                        <template id="template-opt-zona">
                                            <option id="optzona" value="">A</option>
                                        </template>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formselectTextCCostos" class="col-lg-3 control-label">C Costos</label>
                                        <select data-placeholder="CCostos" id="formselectTextCCostos" tabindex="2">
                                        </select>
                                        <template id="template-opt-ccostos">
                                            <option id="optccostos" value=""></option>
                                        </template>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptTextZona" class="col-lg-3 control-label">Zona</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Zona" class="form-control" id="formiptTextZona" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptTextLabor" class="col-lg-3 control-label">Labor</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Labor" class="form-control" id="formiptTextLabor" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberNivel" class="col-lg-3 control-label">Nivel</label>
                                        <div class="col-lg-7">
                                            <input type="number" placeholder="Nivel" class="form-control" id="formiptNumberNivel" disabled>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <br>
                            <div id="g2item2Form">
                                <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHE" class="col-lg-3 control-label">HE</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HE" class="form-control" id="formiptNumberHE">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHT_Ser_Ad" class="col-lg-3 control-label">HT Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HT Serv. Ad" class="form-control" id="formiptNumberHT_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberHE_Ser_Ad" class="col-lg-3 control-label">HE Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="HE Serv. Ad" class="form-control" id="formiptNumberHE_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberCc_Ser_Ad" class="col-lg-3 control-label">Cc Serv. Ad</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="Cc Serv. Ad" class="form-control" id="formiptNumberCc_Ser_Ad">
                                        </div>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="formiptNumberCCostosHe" class="col-lg-3 control-label">CcostosHe</label>
                                        <div class="col-lg-7">
                                            <input type="text" placeholder="CcostosHe" class="form-control" id="formiptNumberCCostosHe">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <br>
                        <div>
                            <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                            <fieldset>
                                <div class="form-group pad-ver">
					                <div class="col-md-9" style="width: 100%;">
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="1 Perforacion" type="radio" name="inline-form-radio" checked="">
                                            1 Perforacion
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="2 Vol" type="radio" name="inline-form-radio">
					                        2 Vol
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="3 Lim" type="radio" name="inline-form-radio">
                                            3 Lim
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="4 Stto" type="radio" name="inline-form-radio">
					                        4 Stto
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="5 Serv." type="radio" name="inline-form-radio">
					                        5 Serv.
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="6 Rehabulitacion" type="radio" name="inline-form-radio">
					                        6 Rehabulitacion
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="10 Cap" type="radio" name="inline-form-radio">
					                        10 Cap
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="11" value="11 Dm" type="radio" name="inline-form-radio">
					                        11 Dm
                                        </label>                                        
                                        <label class="radio-inline">
                                            <input id="" data-ht="12" value="12 Dl" type="radio" name="inline-form-radio">
					                        12 Dl
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="13" value="13 S" type="radio" name="inline-form-radio">
					                        13 S
                                        </label>
					                    <label class="radio-inline">
                                            <input id="" data-ht="14" value="14 F" type="radio" name="inline-form-radio">
					                        14 F
                                        </label>					
					                    <label class="radio-inline">
                                            <input id="" data-ht="15" value="15 L" type="radio" name="inline-form-radio">
					                        15 L
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="16" value="16 Lp" type="radio" name="inline-form-radio">
					                        16 Lp
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="17" value="17 Lf" type="radio" name="inline-form-radio">
					                        17 Lf
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="18" value="18 Td" type="radio" name="inline-form-radio">
					                        18 Td
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="19" value="19 Tn" type="radio" name="inline-form-radio">
					                        19 Tn
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="20" value="20 Pcg" type="radio" name="inline-form-radio">
					                        20 Pcg
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="21" value="21 Psg" type="radio" name="inline-form-radio">
					                        21 Psg
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="22" value="22 Sup" type="radio" name="inline-form-radio">
					                        22 Sup
                                        </label>                                        
                                        <label class="radio-inline">
                                            <input id="" data-ht="23" value="23 Vac" type="radio" name="inline-form-radio">
					                        23 Vac
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="24 Jft" type="radio" name="inline-form-radio">
					                        24 Jft
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="25 Aste" type="radio" name="inline-form-radio">
					                        25 Aste
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="26 Per_Adm" type="radio" name="inline-form-radio">
					                        26 Per_Adm
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="27 Serv. Mult" type="radio" name="inline-form-radio">
					                        27 Serv. Mult
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value=" 28 Serv. Ad. Mina" type="radio" name="inline-form-radio">
					                        28 Serv. Ad. Mina
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value=" 29 Tran Min" type="radio" name="inline-form-radio">
					                        29 Tran Min
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="30 Afiliación" type="radio" name="inline-form-radio">
					                        30 Afiliación
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="31 Tras Mat_E" type="radio" name="inline-form-radio">
					                        31 Tras Mat_E
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="10.5" value="35 Festividad" type="radio" name="inline-form-radio">
					                        35 Festividad
                                        </label>
                                        <label class="radio-inline">
                                            <input id="" data-ht="36" value="36 Cuarentena" type="radio" name="inline-form-radio">
					                        36 Cuarentena
                                        </label>
					                </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
                    <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-insert" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->


    
    
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="..\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="..\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="..\js\nifty.min.js"></script>




    <!--=================================================-->
    
    <!--Demo script [ DEMONSTRATION ]-->
    <script src="..\js\demo\nifty-demo.min.js"></script>

    <!--Icons [ SAMPLE ]-->
    <script src="..\js\demo\icons.js"></script>

    <!--FooTable Example [ SAMPLE ]
    <script src="..\js\demo\tables-footable.js"></script>-->
    
    <!--FooTable [ OPTIONAL ]
    <script src="..\plugins\fooTable\dist\footable.all.min.js"></script>-->

    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="..\plugins\bootstrap-select\bootstrap-select.min.js"></script>
    <!--Chosen [ OPTIONAL ]-->
    <script src="..\plugins\chosen\chosen.jquery.min.js"></script>
    <!--Select2 [ OPTIONAL ]-->
    <script src="..\plugins\select2\js\select2.min.js"></script>
    <!--Form Component [ SAMPLE ]-->
    <script src="..\js\demo\form-component.js"></script>
    <!--Panel [ SAMPLE ]-->
    <script src="..\js\demo\ui-panels.js"></script>
    
    <!--Date-MYSQL [ REQUIRED ]-->
    <script src="..\js/tareo.js"></script>

</body>
</html>