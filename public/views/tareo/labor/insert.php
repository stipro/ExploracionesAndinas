<?php
$template_insert_labor = '
    <!--Insertar Bootstrap Modal Principal-->
    <!--===================================================-->
    <div class="modal fade" id="modal-insert-labor" role="dialog" style="overflow-y: scroll;"> 
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">Nuevo Registro</h4>
                </div> 
                <form class="form-horizontal" role="form" id="form-crear">
                    <div class="modal-body">
                        <div id="alerts-insert-labor">
                        </div>
                        <form class="form-horizontal">
                            <div class="panel-body">
                                <!-- FORMULARIO -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ipt-insert-labor-ccosto" class="control-label">C. Costo <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="C. Costo" class="form-control" id="ipt-insert-labor-ccosto">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-insert-labor-tipo" class="control-label">Tipo</label>
                                        <input type="text" placeholder="Tipo" class="form-control" id="ipt-insert-labor-tipo">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-insert-labor-veta" class="control-label">Veta</label>
                                        <input type="text" placeholder="Veta" class="form-control" id="ipt-insert-labor-veta">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-insert-labor-nivel" class="control-label">Nivel</label>
                                        <input type="text" placeholder="Nivel" class="form-control" id="ipt-insert-labor-nivel">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-insert-labor-mexplotacion" class="control-label">Metodo de Explotacion</label>
                                        <input type="text" placeholder="Metodo de Explotacion" class="form-control" id="ipt-insert-labor-mexplotacion">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-insert-labor-seccion" class="control-label">Sección</label>
                                        <input type="text" placeholder="Sección" class="form-control" id="ipt-insert-labor-seccion">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-insert-labor-tipEq" class="control-label">Tipo EQ</label>
                                        <input type="text" placeholder="Tipo EQ" class="form-control" id="ipt-insert-labor-tipEq">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-insert-labor-tipRocca" class="control-label">Tipo Roca</label>
                                        <input type="text" placeholder="Sección" class="form-control" id="ipt-insert-labor-tipRocca">
                                    </div>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Labor</legend>
                                        <div class="col-md-4">
                                            <label for="ipt-insert-labor-laborName" class="control-label">Labor <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Labor" class="form-control custom-select custom-select-md" id="ipt-insert-labor-laborName" list="datalist-insert-nombreLabor-nombre">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-labor"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                    </span>
                                                    <datalist id="datalist-insert-nombreLabor-nombre">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-insert-nombreLabor-nombre">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ipt-insert-labor-laborNameEtapa" class="control-label">Etapa</label>
                                            <input type="text" placeholder="Etapa" class="form-control" id="ipt-insert-labor-laborNameEtapa" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ipt-insert-labor-laborNamePrefijo" class="control-label">Prefijo</label>
                                            <input type="text" placeholder="Prefijo" class="form-control" id="ipt-insert-labor-laborNamePrefijo" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ipt-insert-labor-laborNameTipo" class="control-label">Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" id="ipt-insert-labor-laborNameTipo" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Zona</legend>
                                        <div class="col-md-6">
                                            <label for="ipt-insert-labor-laborZona" class="control-label">Zona <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Zona" class="form-control" id="ipt-insert-labor-laborZona" list="datalist-insert-zonaLabor-zona">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-zona"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                    </span>
                                                    <datalist id="datalist-insert-zonaLabor-zona">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-insert-zonaLabor-zona">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="ipt-insert-letra-laborZonaLetra">Letra</label>
                                            <input type="text" placeholder="Letra" class="form-control" id="ipt-insert-letra-laborZonaLetra" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Unidad Minera</legend>
                                        <div class="col-md-6">
                                            <label for="ipt-insert-unitMining-nombre" class="control-label">Unid. Minera <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Unid. Minera" class="form-control" id="ipt-insert-unitMining-nombre" list="datalist-insert-labor-unitMining">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-sede">
                                                            <i class="btn-label fa-solid fa-plus"></i>
                                                            <span>Agregar</span>
                                                        </button>
                                                    </span>
                                                    <datalist id="datalist-insert-labor-unitMining">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-insert-labor-unitMining">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ipt-insert-unitMining-abrev" class="control-label">Abrev. Minera</label>
                                            <input type="text" placeholder="Abrev. Minera" class="form-control" id="ipt-insert-unitMining-abrev" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="mbtn-new-labor">
                            <span class="fa fa-save"></span>
                            <span class="hidden-xs"> Nuevo</span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="mbtn-close-labor">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="hidden-xs"> Cerrar</span> 
                        </button>
                        <button type="button" class="btn btn-success" id="mbtn-insert-labor">
                            <span class="fa fa-save"></span>
                            <span class="hidden-xs"> Registrar</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin Insertar Bootstrap Modal Principal-->
    <!--Segundario1 Bootstrap Modal Segundario1-->
    <div id="modal-laborName" class="modal fade" role="dialog"> 
    	<div class="modal-dialog">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Nombre de Labor</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body">
                        <div id="alerts-insert-laborName">
                        </div>
    					<div class="row">
                            <div class="col-md-4">
                                <label for="input-insert-laborName-labor" class="control-label">Labor</label>
                                <input type="text" placeholder="Labor" class="form-control" id="input-insert-laborName-labor">
                            </div>
                            <div class="col-md-4">
                                <label for="input-insert-laborName-etapa" class="control-label">Etapa</label>
                                <div class="input-group-wrap">
                                    <div class="input-group">
                                        <input type="text" placeholder="Etapa" class="form-control" id="input-insert-laborName-etapa" name="input-insert-laborName-etapa" list="datalist-insert-laborName-etapa">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-labeled" type="button" id="add-etapa">
                                                <i class="btn-label fa-solid fa-plus"></i>
                                                <span class="hidden">
                                                Agregar
                                                </span>
                                            </button>
                                        </span>
                                        <datalist id="datalist-insert-laborName-etapa">
                                            <!-- <select name="input-insert-laborName-etapa"> -->
                                                <option value="No se ejecuto"></option>
                                            <!-- </select> -->
                                        </datalist>
                                        <template id="template-datalist-insert-laborName-etapa">
                                            <!-- <select name="input-insert-laborName-etapa"> -->
                                                <option value=""></option>
                                            <!-- </select> -->
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="input-insert-laborName-prefijo" class="control-label">Prefijo</label>
                                <input type="text" placeholder="Prefijo" class="form-control" id="input-insert-laborName-prefijo">
                            </div>
                            <div class="col-md-2">
                                <label for="input-insert-laborName-tipo" class="control-label">Tipo</label>
                                <input type="text" placeholder="Tipo" class="form-control" id="input-insert-laborName-tipo">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
                        <button type="button" class="btn btn-default" id="mbtn-new-laborName">
    						<span class="fa fa-save"></span>
                            <span class="hidden-xs"> Nuevo</span>
    					</button>
    					<button type="button" class="btn btn-danger" data-dismiss="modal" id="mbtn-close-laborName">
    						<span class="glyphicon glyphicon-remove"></span>
                            <span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" class="btn btn-success" id="mbtn-insert-laborName">
    						<span class="fa fa-save"></span>
                            <span class="hidden-xs"> Registrar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <!--Segundario1 Bootstrap Modal Segundario1-->
    <div id="modal-laborNameEtapa" class="modal fade" role="dialog"> 
    	<div class="modal-dialog modal-sm">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Etapa</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body">
                        <div id="alerts-insert-laborNameEtapa">
                        </div>
    					<div class="row">
                            <div class="col-md-12">
                                <label for="input-insert-laborNombreEtapa-etapa" class="control-label">Etapa</label>
                                <input type="text" placeholder="Etapa" class="form-control" id="input-insert-laborNombreEtapa-etapa">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
                        <button type="button" class="btn btn-default" id="mbtn-new-laborNameEtapa">
    						<span class="fa fa-save"></span><span class="hidden"> Nuevo</span>
    					</button>
    					<button type="button" class="btn btn-danger" data-dismiss="modal" id="mbtn-close-laborNameEtapa">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden"> Cerrar</span>
    					</button>
    					<button type="button" class="btn btn-success" id="mbtn-insert-laborNameEtapa">
    						<span class="fa fa-save"></span><span class="hidden"> Registrar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <!--Segundario2 Bootstrap Modal Segundario1-->
    <div id="modal-laborZone" class="modal fade" role="dialog"> 
    	<div class="modal-dialog modal-sm">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Zona</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body">
                        <div id="alerts-insert-laborZone">
                        </div>
    					<div class="row">
                            <div class="col-md-12">
                                <label for="input-insert-laborNombreZone-zona" class="control-label">Labor</label>
                                <input type="text" placeholder="Labor" class="form-control" id="input-insert-laborNombreZone-zona">
                            </div>
                            <div class="col-md-12">
                                <label for="input-insert-laborNombreZone-letra" class="control-label">Letra</label>
                                <input type="text" placeholder="Letra" class="form-control" id="input-insert-laborNombreZone-letra">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
                        <button type="button" class="btn btn-default" id="mbtn-new-laborZone">
    						<span class="fa fa-save"></span><span class="hidden"> Nuevo</span>
    					</button>
    					<button type="button" class="btn btn-danger" data-dismiss="modal" id="mbtn-close-laborZone">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden-xs"> Cerrar</span>
    					</button>
    					<button type="button" class="btn btn-success" id="mbtn-insert-laborZone">
    						<span class="fa fa-save"></span><span class="hidden-xs"> Guardar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>

    <!--Segundario2 Bootstrap Modal Segundario1-->
    <div id="modal-UnidMinera" class="modal fade" role="dialog"> 
    	<div class="modal-dialog modal-sm">
    		<div class="modal-content">
    			<div class="modal-header"> 
    				<h4 class="modal-tittle">Unid. Minera</h4>
    			</div> 
    			<form class="form-horizontal" role="form" id="form-agregar">
    				<div class="modal-body">
                        <div id="alerts-insert-unidMinera">
                        </div>
    					<div class="row">
                            <div class="col-md-12">
                                <label for="input-insert-unidMinera-nombre" class="control-label">Unid. Minera</label>
                                <input type="text" placeholder="Unid. Minera" class="form-control" id="input-insert-unidMinera-nombre">
                            </div>
                            <div class="col-md-12">
                                <label for="input-insert-unidMinera-abrev" class="control-label">Abrev. Minera</label>
                                <input type="text" placeholder="Abrev. Minera" class="form-control" id="input-insert-unidMinera-abrev">
                            </div>
                        </div>
    				</div>
    				<div class="modal-footer">
                        <button type="button" class="btn btn-default" id="mbtn-new-unidMinera">
    						<span class="fa fa-save"></span><span class="hidden"> Nuevo</span>
    					</button>
    					<button type="button" class="btn btn-danger" data-dismiss="modal" id="mbtn-close-unidMinera">
    						<span class="glyphicon glyphicon-remove"></span><span class="hidden"> Cerrar</span>
    					</button>
    					<button type="button" class="btn btn-success" id="mbtn-insert-unidMinera">
    						<span class="fa fa-save"></span><span class="hidden"> Guardar</span>
    					</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
';
?>
    