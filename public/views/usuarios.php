<?php
    session_start();
    // Obtenemos URL HTTP
    function get_url(){
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://"; 
        }
        else{
            $url = "http://"; 
        }
        return $url . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
        //return $_SERVER['REQUEST_URI'];
    }
    $url_actual = get_url();
    //var_dump($url_actual);
    $separador = "/"; // Usar una cadena
    $ubicaciones = explode($separador, $url_actual);
    //print_r($ubicaciones);
    //echo $ubicaciones[4];
    
    if (!isset($_SESSION["username"])) {
        //echo 'No se inicio session ';
        
        header("location:../index.php");
    } else {
    }
    $validacionSession =  $_SESSION["name"] ? $_SESSION["name"] : 'No se inicio';
    $string = file_get_contents("./../data-logo.json");
    $json_a = json_decode($string, true);
    include_once ("../menu.php");   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Users 2 | Nifty - Admin Template</title>


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


    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="plugins\bootstrap-validator\bootstrapValidator.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]
    <link href="..\css\usuario.css" rel="stylesheet">-->

            
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
                        <img src="<?php echo $json_a['Empresa']['url'];?>" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text"><?php echo $json_a['Empresa']['nombre'];?></span>
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
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="..\img\profile-photos\9.png">
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
                                                        <img class="img-circle img-sm" alt="Profile Picture" src="..\img\profile-photos\3.png">
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
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Usuarios</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					    <!-- Contact Toolbar -->
					    <!---------------------------------->
					    <div class="row pad-btm">
					        <div class="col-sm-6 toolbar-left">
					            <button id="demo-btn-addrow" data-target="#insert-modal" data-toggle="modal" class="btn btn-purple">Agregar</button>
					            <button class="btn btn-default"><i class="demo-pli-printer"></i></button>
					        </div>
					        <div class="col-sm-6 toolbar-right text-right">
					            Sort by :
					            <div class="select">
					                <select id="demo-ease">
					                    <option value="date-created" selected="">Date Created</option>
					                    <option value="date-modified">Date Modified</option>
					                    <option value="frequency-used">Frequency Used</option>
					                    <option value="alpabetically">Alpabetically</option>
					                    <option value="alpabetically-reversed">Alpabetically Reversed</option>
					                </select>
					            </div>
					            <button class="btn btn-default">Filter</button>
					            <button class="btn btn-primary"><i class="demo-psi-gear icon-lg"></i></button>
					        </div>
					    </div>
					    <!---------------------------------->
					
					
					    <div class="row">
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="favorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\8.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Lucy Moon</span>
					                                <p class="text-sm">Designer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\10.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Brenda Fuller</span>
					                                <p class="text-sm">Graphics designer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\1.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Aaron Chavez</span>
					                                <p class="text-sm">CEO</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\5.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Donald Brown</span>
					                                <p class="text-sm">Programmer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\9.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Lucy Moon</span>
					                                <p class="text-sm">Frontend Designer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\4.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Howard Rios</span>
					                                <p class="text-sm">Marketing</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\7.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Kathryn Obrien</span>
					                                <p class="text-sm">Co-CEO</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\8.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Karen Murray</span>
					                                <p class="text-sm">Sales manager</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\8.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Karen Murray</span>
					                                <p class="text-sm">Sales manager</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\2.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Stephen Tran</span>
					                                <p class="text-sm">Marketing manager</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\10.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Brenda Fuller</span>
					                                <p class="text-sm">Graphics designer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
					        </div>
					        <div class="col-sm-4 col-md-3">
					
					
					            <!-- Contact Widget -->
					            <!---------------------------------->
					            <div class="panel pos-rel">
					                <div class="widget-control text-right">
					                    <a href="#" class="add-tooltip btn btn-trans" data-original-title="Favorite"><span class="unfavorite-color"><i class="demo-psi-star icon-lg"></i></span></a>
					                    <div class="btn-group dropdown">
					                        <a href="#" class="dropdown-toggle btn btn-trans" data-toggle="dropdown" aria-expanded="false"><i class="demo-psi-dot-vertical icon-lg"></i></a>
					                        <ul class="dropdown-menu dropdown-menu-right">
					                            <li><a href="#"><i class="icon-lg icon-fw demo-psi-pen-5"></i> Edit</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-recycling"></i> Remove</a></li>
					                            <li class="divider"></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-mail"></i> Send a Message</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-calendar-4"></i> View Details</a></li>
					                            <li><a href="#"><i class="icon-lg icon-fw demo-pli-lock-user"></i> Lock</a></li>
					                        </ul>
					                    </div>
					                </div>
					                <div class="pad-all">
					                    <div class="media pad-ver">
					                        <div class="media-left">
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src="..\img\profile-photos\5.png"></a>
					                        </div>
					                        <div class="media-body pad-top">
					                            <a href="#" class="box-inline">
					                                <span class="text-lg text-semibold text-main">Donald Brown</span>
					                                <p class="text-sm">Programmer</p>
					                            </a>
					                        </div>
					                    </div>
					                    <p class="pad-btm bord-bt text-sm">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa.</p>
					                    <div class="text-center pad-to">
					                        <div class="btn-group">
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-consulting icon-lg icon-fw"></i> Call</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-mail icon-lg icon-fw"></i> Email</a>
					                            <a href="#" class="btn btn-sm btn-default"><i class="demo-pli-pen-5 icon-lg icon-fw"></i> Edit</a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					            <!---------------------------------->
					
					
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
            <?php 
            echo $templateNav ?>
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

    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="insert-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo usuario</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <fieldset>
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Colaborador</label>
                                        <div class="col-md-9 input-group mar-btm">
                                            <input type="text" id="ipt-search-colaborador" class="form-control" name="colaborador" list="insert-options-colaborador" placeholder="Colaborador">
                                            <span class="input-group-btn">
                                                <div class="btn-group dropdown" style="display: flex;">
                                                    <button class="btn btn-default">DNI</button>
                                                    <button class="btn btn-default dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button">
                                                        <i class="dropdown-caret"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a>DNI</a></li>
                                                        <li><a>Nombre</a></li>
                                                    </ul>
                                                </div>
					                        </span>
                                        </div>
                                        <datalist id="insert-options-colaborador">
                                            <option value="No se obtuvo Dato">
                                        </datalist>
                                        <template id="template-opts-colaborador">
                                            <option id="opt-colaborador" value="">
                                        </template>
                                    </div>
                                </div>                                  
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
					                    <label class="col-md-2 control-label">Usuario</label>
					                    <div class="col-md-4">
					                        <input type="text" class="form-control" name="firstName" placeholder="Usuario">
					                    </div>
                                        <label class="col-md-2 control-label">Clave</label>
					                    <div class="col-md-3">
					                        <input type="text" class="form-control" name="lastName" placeholder="Clave">
					                    </div>
					                </div>
                                </div>                                      
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
					                    <label class="col-md-2 control-label">Correo</label>
					                    <div class="col-md-4">
					                        <input type="text" class="form-control" name="firstName" placeholder="Correo">
					                    </div>
                                        <label class="col-md-2 control-label text-bold">Estado</label>
                                        <div class="col-md-3">
					                        <!--Switchery : Checked-->
                                            <!--===================================================-->
                                            <input id="demo-sw-checked" type="checkbox" checked="">
                                            <!--===================================================-->
					                    </div>   
					                </div>
                                </div>
                                
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->

    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-search-colaborador" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Buscando colaborador</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <fieldset>
                        <div class="row form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Colaborador</label>
                                        <div class="col-md-9">
                                            <input type="text" id="insert-usuario" class="form-control" name="Colaborador" placeholder="Colaborador">
                                        </div>
                                    </div>
                                </div>                                  
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped" role="table">
                                    <thead role="rowgroup">
                                        <tr role="row">
                                            <th role="columnheader">First Name</th>
                                            <th role="columnheader">Last Name</th>
                                            <th role="columnheader">Job Title</th>
                                            <th role="columnheader">Favorite Color</th>
                                            <th role="columnheader">Wars or Trek?</th>
                                            <th role="columnheader">Secret Alias</th>
                                            <th role="columnheader">Date of Birth</th>
                                            <th role="columnheader">Dream Vacation City</th>
                                            <th role="columnheader">GPA</th>
                                            <th role="columnheader">Arbitrary Data</th>
                                        </tr>
                                    </thead>
                                    <tbody role="rowgroup">
                                        <tr role="row">
                                            <td role="cell">James</td>
                                            <td role="cell">Matman</td>
                                            <td role="cell">Chief Sandwich Eater</td>
                                            <td role="cell">Lettuce Green</td>
                                            <td role="cell">Trek</td>
                                            <td role="cell">Digby Green</td>
                                            <td role="cell">January 13, 1979</td>
                                            <td role="cell">Gotham City</td>
                                            <td role="cell">3.1</td>
                                            <td role="cell">RBX-12</td>
                                        </tr>
                                        <tr role="row">
                                            <td role="cell">The</td>
                                            <td role="cell">Tick</td>
                                            <td role="cell">Crimefighter Sorta</td>
                                            <td role="cell">Blue</td>
                                            <td role="cell">Wars</td>
                                            <td role="cell">John Smith</td>
                                            <td role="cell">July 19, 1968</td>
                                            <td role="cell">Athens</td>
                                            <td role="cell">N/A</td>
                                            <td role="cell">Edlund, Ben (July 1996).</td>
                                        </tr>
                                        <tr role="row">
                                            <td role="cell">Jokey</td>
                                            <td role="cell">Smurf</td>
                                            <td role="cell">Giving Exploding Presents</td>
                                            <td role="cell">Smurflow</td>
                                            <td role="cell">Smurf</td>
                                            <td role="cell">Smurflane Smurfmutt</td>
                                            <td role="cell">Smurfuary Smurfteenth, 1945</td>
                                            <td role="cell">New Smurf City</td>
                                            <td role="cell">4.Smurf</td>
                                            <td role="cell">One</td>
                                        </tr>
                                        <tr role="row">
                                            <td role="cell">Cindy</td>
                                            <td role="cell">Beyler</td>
                                            <td role="cell">Sales Representative</td>
                                            <td role="cell">Red</td>
                                            <td role="cell">Wars</td>
                                            <td role="cell">Lori Quivey</td>
                                            <td role="cell">July 5, 1956</td>
                                            <td role="cell">Paris</td>
                                            <td role="cell">3.4</td>
                                            <td role="cell">3451</td>
                                        </tr>
                                        <tr role="row">
                                            <td role="cell">Captain</td>
                                            <td role="cell">Cool</td>
                                            <td role="cell">Tree Crusher</td>
                                            <td role="cell">Blue</td>
                                            <td role="cell">Wars</td>
                                            <td role="cell">Steve 42nd</td>
                                            <td role="cell">December 13, 1982</td>
                                            <td role="cell">Las Vegas</td>
                                            <td role="cell">1.9</td>
                                            <td role="cell">Under the couch</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            </div>
                            
                        </div>
                    </fieldset>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button class="btn btn-primary">Elegir</button>
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

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="plugins\bootstrap-validator\bootstrapValidator.min.js"></script>


    <!--Switchery [ OPTIONAL ]-->
    <script src="..\plugins\switchery\switchery.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src="..\plugins\chosen\chosen.jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src="..\plugins\select2\js\select2.min.js"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src="..\js\demo\form-component.js"></script>



    

    <!--Form Component [ REQUIRED ]-->
    <script src="..\js\usuario.js"></script>


</body>
</html>
