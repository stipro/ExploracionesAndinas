<?php
$template_create_labor = '
    <!--Insert Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="insert-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm" class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Explosivos</h4>
                </div>  

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-form-insert">
                    </div>
					<fieldset>
						<fieldset><p class="bord-btm pad-ver text-main text-bold">Datos Principal</p></fieldset>
                        <div class="row">
                            <div class="row"> 
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="insert-ipt-explosivo-codigo" class="col-md-5 control-label">Cod.<br> Explosivo<span class="text-danger">*</span></label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" id="insert-ipt-explosivo-codigo" name="Ape_Paterno" placeholder="Codigo Explosivo" onkeypress="return soloLetras(event)">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="insert-ipt-explosivo-nombre" class="col-md-5 control-label">Nombre <br>Explosivo<span class="text-danger">*</span></label>
					                    <div class="col-md-7">
					                        <input type="text" class="form-control" id="insert-ipt-explosivo-nombre" name="Ape_Materno" placeholder="Nombre Explosivo" onkeypress="return soloLetras(event)">
					                    </div>
					                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
					                    <label for="insert-ipt-explosivo-unidadMedida" class="col-md-4 control-label">Uni. <br>Medida<span class="text-danger">*</span></label>
					                    <div class="col-md-8">
											<input type="text" class="form-control" id="insert-ipt-explosivo-unidadMedida"  name="nombre_colaborador" list="options-nombreColaborador" placeholder="Unidad Medida" onkeypress="return soloLetras(event)">
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
                    <button id="mbtm-close" data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-insert-explosivo" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Insert Bootstrap Modal-->
';
?>