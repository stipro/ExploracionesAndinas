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

    <!--Switchery [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\switchery\switchery.min.css" rel="stylesheet">

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href=".\..\..\..\plugins\bootstrap-validator\bootstrapValidator.min.css" rel="stylesheet">


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
                        <h1 class="page-header text-overflow">Colaboradores</h1>
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
					            <button id="btn-Agregar" data-target="#insert-modal" data-toggle="modal" class="btn btn-purple">Agregar</button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Colaborador</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
					<fieldset>
						<fieldset><p class="bord-btm pad-ver text-main text-bold">Datos Principal</p></fieldset>
                        <div class="row">
                            <div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="insert-ipt-colaboradorApePaterno" class="col-md-5 control-label">Ape.Paterno <span class="text-danger">*</span></label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" id="insert-ipt-colaboradorApePaterno" name="Ape_Paterno" placeholder="Ape.Paterno" onkeypress="return soloLetras(event)">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="insert-ipt-colaboradorApeMaterno" class="col-md-5 control-label">Ape.Materno <span class="text-danger">*</span></label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" id="insert-ipt-colaboradorApeMaterno" name="Ape_Materno" placeholder="Ape.Materno" onkeypress="return soloLetras(event)">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Nombres <span class="text-danger">*</span></label>
					                    <div class="col-md-8">
											<input type="text" class="form-control" id="insert-ipt-colaboradorNombres"  name="nombre_colaborador" list="options-nombreColaborador" placeholder="Nombres" onkeypress="return soloLetras(event)">
					                    </div>
					                </div>
								</div>                                  
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="slt-insert-colaboradorEstadoCivil" class="col-md-5 control-label">Estado Civil <span class="text-danger">*</span></label>
					                    <div class="col-md-7">
											<select class="form-control" id="slt-insert-colaboradorEstadoCivil" name="Estado Civil" placeholder="Estado Civil">
												<option value="CASADO" selected>CASADO</option>
												<option value="CONVIVIENTE" >CONVIVIENTE</option>
												<option value="DIVORCIADO">DIVORCIADO</option>
												<option value="SOLTERO">SOLTERO</option>
												<option value="CONVIVIENTE" >CONVIVIENTE</option>
												<option value="DIVORCIADO">DIVORCIADO</option>
												<option value="VIUDO">VIUDO</option>
											</select>
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="slt-insert-colaboradorSexo" class="col-md-4 control-label">Sexo <span class="text-danger">*</span></label>
					                    <div class="col-md-8">
											<select class="form-control" id="slt-insert-colaboradorSexo" name="Sexo" placeholder="Sexo">
												<option value="FEMENINO">FEMENINO</option>
												<option value="MASCULINO" >MASCULINO</option>
												<!-- <option value="BINARIO">BINARIO</option>
												<option value="SISGENERO">SISGENERO</option> -->
											</select>
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Fec.Nac <span class="text-danger">*</span></label>
					                    <div class="col-md-8">
					                        <input type="date" class="form-control" id="ipt-insert-colaboradorNombres" name="Fec_Nac" placeholder="Fec.Nac">
					                    </div>
					                </div>
								</div>                                  
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Tolerancia</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorApePaterno" name="Tolerancia" placeholder="Tolerancia">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="slt-insert-colaboradorTipoDoc" class="col-md-4 control-label">Tipo <span class="text-danger">*</span> Documento</label>
					                    <div class="col-md-8">
											<select class="form-control" id="slt-insert-colaboradorTipoDoc" name="Tipo_Documento" placeholder="Tipo Documento">
												<option value="DOC. NACIONAL DE IDENTIDAD">DOC. NACIONAL DE IDENTIDAD</option>
												<option value="REG. UNICO DE CONTRIBUYENTES" >REG. UNICO DE CONTRIBUYENTES</option>
												<option value="CARNET DE EXTRANJERÍA">CARNET DE EXTRANJERÍA</option>
												<option value="PASAPORTE">PASAPORTE</option>
												<option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
											</select>
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-4 control-label">Numero <span class="text-danger">*</span></label>
										<div class="col-md-8">
											<div class="input-group mar-btm">
											<input type="text" id="insert-ipt-colaboradorDni" class="form-control" name="dni_colaborador" list="options-dniColaborador" placeholder="Numero" pattern="[0-9]+" onkeypress="return valideKey(event);">
												<span class="input-group-btn">
													<button class="btn btn-mint" type="button"><i class="fa fa-cloud"></i></button>
												</span>
											</div>
										</div>
									</div>
									
									<!-- <div class="form-group">
					                    <label class="col-md-4 control-label">Numero</label>
					                    <div class="col-md-8">
										<input type="text" id="insert-ipt-colaboradorDni" class="form-control" name="dni_colaborador" list="options-dniColaborador" placeholder="Numero" pattern="[0-9]+" onkeypress="return valideKey(event);">
					                    </div>
					                </div> -->
								</div>                                  
                            </div>
                        </div>
                    </fieldset>
					<fieldset>
						<fieldset><p class="bord-btm pad-ver text-main text-bold">DIRECCION</p></fieldset>
                        <div class="row">
                            <div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" id="slt-insert-colaboradorDireccion1" name="Direccion_1" >
											<option value="AVENIDA">AVENIDA</option>
											<option value="JIRON" >JIRON</option>
											<option value="CALLE">CALLE</option>
											<option value="PASAJE">PASAJE</option>
											<option value="ALAMEDA">ALAMEDA</option>
											<option value="MALECON">MALECON</option>
											<option value="OVALO">OVALO</option>
											<option value="PARQUE">PARQUE</option>
											<option value="PLAZA">PLAZA</option>
											<option value="CARRETERA">CARRETERA</option>
											<option value="BLOCK">BLOCK</option>
										</select>
					                </div>
								</div>
								<div class="col-md-8">
					                <input type="text" class="form-control" id="ipt-insert-colaboradorDireccion1" name="Direccion_1" placeholder="Dirección">
					            </div>
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
										<select class="form-control" id="slt-insert-colaboradorDireccion1" name="Direccion_1" >
											<option value="URB. URBANIZACION">URB. URBANIZACION</option>
											<option value="P.J. PUEBLO JOVEN" >P.J. PUEBLO JOVEN</option>
											<option value="U.V. UNIDAD VECINAL">U.V. UNIDAD VECINAL</option>
											<option value="A.H. ASENTA. HUMANO">A.H. ASENTA. HUMANO</option>
											<option value="COO. COOPERATIVA">COO. COOPERATIVA</option>
											<option value="RES. RESIDENCIAL">RES. RESIDENCIAL</option>
											<option value="Z.I. ZONA INDUSTRIAL">Z.I. ZONA INDUSTRIAL</option>
											<option value="GRU. GRUPO">GRU. GRUPO</option>
											<option value="CAS. CASERIO">CAS. CASERIO</option>
											<option value="FND. FUNDO">FND. FUNDO</option>
											<option value="PUEBLO TRADICIONAL">PUEBLO TRADICIONAL</option>
											<option value="-">-</option>
										</select>
					                </div>
								</div>
								<div class="col-md-8">
					                <input type="text" class="form-control" id="ipt-insert-colaboradorDireccion1" name="Direccion_1" placeholder="Dirección">
					            </div>
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Departamento</label>
					                    <div class="col-md-8">
											<select class="form-control" id="slt-insert-colaboradorDepartamento" name="Departamento" placeholder="Departamento">
												<option value="AMAZONAS">AMAZONAS</option>
												<option value="ANCASH" >ANCASH</option>
												<option value="APURIMAC">APURIMAC</option>
												<option value="AREQUIPA">AREQUIPA</option>
												<option value="AYACUCHO">AYACUCHO</option>
											</select>
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Provincia</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorProvincia" name="Provincia" placeholder="Provincia">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Distrito</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorDistrito" name="Distrito" placeholder="Distrito">
					                    </div>
					                </div>
								</div>                                  
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Estado Civil</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorApePaterno" name="Estado Civil" placeholder="Estado Civil">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Sexo</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorApeMaterno" name="Sexo" placeholder="Sexo">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Fec.Nac</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorNombres" name="Fec.Nac" placeholder="Fec.Nac">
					                    </div>
					                </div>
								</div>                                  
                            </div>
							<div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Tolerancia</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorApePaterno" name="Tolerancia" placeholder="Tolerancia">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Tipo Documento</label>
					                    <div class="col-md-8">
					                        <input type="text" class="form-control" id="ipt-insert-colaboradorApeMaterno" name="Tipo Documento" placeholder="Tipo Documento">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label class="col-md-4 control-label">Numero</label>
					                    <div class="col-md-8">
										<input type="text" id="insert-ipt-colaboradorDni" class="form-control" name="dni_colaborador" list="options-dniColaborador" placeholder="Numero" pattern="[0-9]+" onkeypress="return valideKey(event);">
					                    </div>
					                </div>
								</div>                                  
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
					<button id="mbtn-new" class="btn btn-primary">Nuevo</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-insert" class="btn btn-success">Registrar</button>
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

    <!--Switchery [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\switchery\switchery.min.js"></script>

    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\bootstrap-validator\bootstrapValidator.min.js"></script>

    <!--Chosen [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\chosen\chosen.jquery.min.js"></script>

    <!--Select2 [ OPTIONAL ]-->
    <script src=".\..\..\..\plugins\select2\js\select2.min.js"></script>

    <!--Form Component [ SAMPLE ]-->
    <script src=".\..\..\..\js\demo\form-component.js"></script>



    

    <!--Form Component [ REQUIRED ]-->
    <script src=".\..\..\..\js\Colaboradores.js"></script>

	<script>
		function soloLetras(e) {
			var key = e.keyCode || e.which,
				tecla = String.fromCharCode(key).toLowerCase(),
				letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
				especiales = [8, 37, 39, 46],
				tecla_especial = false;

			for (var i in especiales) {
				if (key == especiales[i]) {
					tecla_especial = true;
					break;
				}
			}

			if (letras.indexOf(tecla) == -1 && !tecla_especial) {
				return false;
			}
		}
		function valideKey(evt) {

			// code is the decimal ASCII representation of the pressed key.
			var code = (evt.which) ? evt.which : evt.keyCode;

			if (code == 8) { // backspace.
				return true;
			} else if (code >= 48 && code <= 57) { // is a number.
				return true;
			} else { // other keys.
				return false;
			}
		}
	</script>

</body>
</html>
