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
                        <h1 class="page-header text-overflow"><?php echo $name_menu; ?></h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#"><?php echo ucfirst($name_modulo); ?></a></li>
					<li class="active"><?php echo $name_menu; ?></li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-xs-12">
					        <div class="panel">
					            <div class="panel-body">
                                    <fieldset>
                                        <legend>
                                            <div class="panel-heading">
					                            <h3 class="panel-title">COLABORADORES</h3>
					                        </div>
                                        </legend>
										<div class="row">
											<div class="col-md-3">
											</div>
											<div class="col-sm-12 col-md-6 dt-buttons btn-group">
												<button class="btn btn-default btn-success btn-labeled" id="btn-Agregar" data-target="#insert-modal" data-toggle="modal">
													<i class="btn-label fa-solid fa-plus"></i><span class="hidden-xs hidden-sm">Agregar</span>
												</button>
												<button class="btn btn-default btn-info btn-labeled">
													<i class="btn-label fa fa-refresh"></i>
													<span class="hidden-xs">Actualizar</span>
												</button>
												<button class="btn btn-default btn-labeled">
													<i class="btn-label fa fa-download"></i>
													<span class="hidden-xs"> Exportar</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label fa fa-download"></i>
													<span class="hidden-xs"> Importar</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label demo-pli-printer"></i>
													<span class="hidden-xs"> Imprimir</span>
												</button>
												<button class="btn btn-primary btn-labeled">
													<i class="btn-label fa fa-eye"></i>
													<span class="hidden-xs"> Mostrar / Ocultar</span>
												</button>
											</div>
											<div class="col-sm-12 col-md-3">											
											</div>
										</div>
										
                                        <div class="table-responsive-md">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0" id="table-master">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th width="10% !important">Ape. Paterno</th>
                                                        <th width="10% !important">Ape. Materno</th>
                                                        <th width="10% !important">Nombres</th>
                                                        <th width="10% !important">Cent. Costo</th>
                                                        <th width="10% !important">Tipo Doc.</th>                                                       
                                                        <th width="10% !important">Numero</th>
                                                        <th width="10% !important">Guardia</th>
                                                        <th width="10% !important">F. Nacimiento</th>
                                                        <th class="all">Operaciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    
                                                </tfoot>
                                            </table>
                                        </div>
                                    </fieldset>
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

    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="insert-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm" class="modal-dialog modal-lg">
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
					                    <label for="date-insert-colaborador-fechaNacimiento" class="col-md-4 control-label">Fec.Nac <span class="text-danger">*</span></label>
					                    <div class="col-md-8">
					                        <input type="date" class="form-control" id="date-insert-colaborador-fechaNacimiento" name="Fec_Nac" placeholder="Fec.Nac">
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
					<!--Default Tabs (Left Aligned)-->
					<!--===================================================-->
					<div class="tab-base">
					
					    <!--Nav Tabs-->
					    <ul class="nav nav-tabs">
					        <li class="active">
					            <a data-toggle="tab" href="#demo-lft-tab-1">Datos Generales</a>
					        </li>
					        <li>
					            <a data-toggle="tab" href="#demo-lft-tab-2">Datos Laborales</a>
					        </li>
					    </ul>
					
					    <!--Tabs Content-->
					    <div class="tab-content">
					        <div id="demo-lft-tab-1" class="tab-pane fade active in">
					            <!--<p class="text-main text-semibold">First Tab Content</p>-->
					            <fieldset>
									<p class="bord-btm pad-ver text-main text-bold">DIRECCION</p>
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
									</div>
								</fieldset>
								<fieldset>
									<p class="bord-btm pad-ver text-main text-bold"></p>
									<div class="row"> 
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-4 control-label">Telefono</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="ipt-insert-colaboradorApePaterno" name="Telefono" placeholder="Telefono">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-4 control-label">Movil 1</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="ipt-insert-colaboradorApeMaterno" name="Movil 1" placeholder="Movil 1">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="col-md-4 control-label">Movil 2</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="ipt-insert-colaboradorNombres" name="Movil 2" placeholder="Movil 2">
												</div>
											</div>
										</div>                                  
									</div>
									<div class="row"> 
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-4 control-label">Correo Personal</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="ipt-insert-colaboradorApePaterno" name="Correo Personal" placeholder="Correo Personal">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-4 control-label">Correo Corporativo</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="ipt-insert-colaboradorApeMaterno" name="Correo Corporativo" placeholder="Correo Corporativo">
												</div>
											</div>
										</div>                               
									</div>
								</fieldset>
					        </div>
					        <div id="demo-lft-tab-2" class="tab-pane fade">
								<div class="row">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
					                    		<label for="slt-insert-colaboradorSexo" class="col-md-4 control-label">Empresa</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaborador_empresa" name="Empresa" placeholder="Empresa">
														<option value="EXPLORACIONES ANDINAS" selected>EXPLORACIONES ANDINAS</option>
													</select>
												</div>
					                		</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
					                    		<label for="slt-insert-colaborador-unidadMinera" class="col-md-4 control-label">U. Minera</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaborador-unidadMinera" name="ud_Minera" placeholder="ud. Minera">
														<option value="-" selected>-</option>
													</select>
													<template id="template-insert-colaborador-unidadMinera">
														<option></option>
													</template>
												</div>
					                		</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaborador-area" class="col-md-4 control-label">Area</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaborador-area" name="area" placeholder="Area">
														<option value="-" selected>-</option>
													</select>
													<template id="template-insert-colaborador-area">
														<option></option>
													</template>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaborador-cargo" class="col-md-4 control-label">Cargo</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaborador-cargo" name="cargo" placeholder="Cargo">
														<option data-id-cargo="0" value="seleccione Area" selected>seleccione Area</option>
													</select>
													<template id="template-insert-colaborador-cargo">
														<option></option>
													</template>
												</div>
					                		</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaborador_regimenLaboral" class="col-md-4 control-label">R. Laboral</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaborador_regimenLaboral" name="Regimen_Laboral" placeholder="Regimen Laboral">
														<option value="-" selected>-</option>
														<option value="PLANILLA">PLANILLA</option>
														<option value="RECIBO HONORARIOS" >RECIBO HONORARIOS</option>
													</select>
												</div>
					                		</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaborador_fechaInicio" class="col-md-4 control-label">Fec.Inicio</label>
												<div class="col-md-8">
													<input type="date" class="form-control" id="ipt-insert-colaborador-fechaInicio" name="Fec_Inicio" placeholder="Fec.Inicio">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaborador_fechaFin" class="col-md-4 control-label">Fec.Fin</label>
												<div class="col-md-8">
													<input type="date" class="form-control" id="ipt-insert-colaborador-fechaFin" name="Fec_Fin" placeholder="Fec.Fin">
												</div>
					                		</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaboradorSexo" class="col-md-4 control-label">Estado</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaboradorEstado" name="Estado" placeholder="Estado">
														<option value="-" selected>-</option>
														<option value="INACTIVO">INACTIVO</option>
														<option value="ACTIVO" >ACTIVO</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaboradorSexo" class="col-md-4 control-label">Motivo Renuncia</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaboradorMotivo Renuncia" name="Motivo Renuncia" placeholder="Motivo Renuncia">
														<option value="-" selected>-</option>
														<option value="RENUNCIA">RENUNCIA</option>
														<option value="RENUNCIA POR INCENTIVOS" >RENUNCIA POR INCENTIVOS</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="slt-insert-colaboradorSexo" class="col-md-4 control-label">Centro de Costos</label>
												<div class="col-md-8">
													<select class="form-control" id="slt-insert-colaboradorCentro de Costos" name="Centro de Costos" placeholder="Centro de Costos">
														<option value="-">-</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
					        </div>
					    </div>
					</div>
					<!--===================================================-->
					<!--End Default Tabs (Left Aligned)-->
					
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
					<button id="mbtn-new" class="btn btn-primary">Nuevo</button>
					<button id="mbtn-search" class="btn btn-info">Buscar</button>
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
    <script src=".\..\..\..\js\colaboradores.js"></script>

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
