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
    <script>
        var data = '';
        var nombreUsuario = '<?= $validacionSession;?>';
        var id_Usuario = '<?= $idUsuario;?>';
    </script>

    <!--STYLESHEET-->
    <!--=================================================-->

    <?php echo $template_header_css; ?>


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
    This is to be removed, used for??demonstration purposes only.??This category must not be included in your project.


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
					            <button id="btn-crearUsuario" data-target="#insert-modal" data-toggle="modal" class="btn btn-purple">Agregar</button>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\8.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\10.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\1.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\5.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\9.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\4.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\7.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\8.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\8.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\2.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\10.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\5.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\8.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\2.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\10.png"></a>
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
					                            <a href="#" class="box-inline"><img alt="Profile Picture" class="img-md img-circle" src=".\..\..\..\img\profile-photos\5.png"></a>
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
                    <div id="alerts-form-insert">
                    </div>
                    <fieldset>
                        <div class="row">
                            <div class="form-horizontal">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Colaborador</label>
                                        <div class="col-md-4">
                                            <input list="insert-dtl-usuario-colaboradorNombre" type="text" id="ipt-insert-nombreColaborador-usuario" class="form-control" name="nombre_colaborador" list="options-nombreColaborador-usuario" placeholder="Nombre" onkeypress="return soloLetras(event)">
                                        </div>                                        
                                        <datalist id="insert-dtl-usuario-colaboradorNombre">
                                            <option value="No se pudo obtener Nombre">
                                        </datalist>
                                        <template id="template-opts-nombreColaborador-usuario">
                                            <option id="opt-nombreColaborador-usuario" value="">
                                        </template>
                                        <div class="col-md-4">
                                            <input list="insert-dtl-usuario-colaboradorDni"  type="number" id="ipt-insert-dniColaborador-usuario" class="form-control" name="dni_colaborador" placeholder="DNI" pattern="[0-9]+" onkeypress="return valideKey(event);">
                                        </div>
                                        <datalist id="insert-dtl-usuario-colaboradorDni">
                                            <option value="No se pudo obtener DNI">
                                        </datalist>
										<template id="template-opts-dniColaborador-usuario">
                                            <option id="opt-dniColaborador-usuario" value="">
                                        </template>
                                    </div>
                                </div>                                  
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
					                    <label class="col-md-2 control-label">Usuario</label>
					                    <div class="col-md-4">
					                        <input type="text" class="form-control" id="ipt-insert-nombre-usuario" name="usuario" placeholder="Usuario">
					                    </div>
                                        <label class="col-md-2 control-label">Clave</label>
					                    <div class="col-md-3">
					                        <input type="password" class="form-control" id="ipt-insert-clave-usuario" name="clave" placeholder="Clave">
					                    </div>
					                </div>
                                </div>                                      
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
					                    <label class="col-md-2 control-label">Correo</label>
					                    <div class="col-md-4">
					                        <input type="text" class="form-control" id="ipt-insert-correo-usuario" name="correo" placeholder="Correo">
					                    </div>
                                        <label class="col-md-2 control-label text-bold">Estado</label>
                                        <div class="col-md-3">
					                        <!--Switchery : Checked-->
                                            <!--===================================================-->
                                            <input id="ipt-insert-estado-usuario" type="checkbox" checked="">
                                            <!--===================================================-->
					                    </div>   
					                </div>
                                </div>
                                
                            </div>

							<div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
					                    <label class="col-md-2 control-label">Tipo Usuario</label>
					                    <div class="col-md-4">
											<select class="form-control" id="ipt-insert-tipo-usuario" name="tipo_usuario" placeholder="Tipo Usuario">
												<option selected>Simple Mortal</option>
												<option value="1">Admin</option>
											</select>
					                    </div>
					                </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
					<button id="mbtn-new-usuario" class="btn btn-primary">Nuevo</button>
					<button id="mbtn-search-usuario" class="btn btn-info">Buscar</button>
                    <button id="mbtn-close-usuario" data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-insert-usuario" class="btn btn-success">Registrar</button>
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

    <?php echo $template_javascript; ?>

    <!--Form Component [ REQUIRED ]-->
    <script src=".\..\..\..\js\usuario.js"></script>


</body>
</html>
