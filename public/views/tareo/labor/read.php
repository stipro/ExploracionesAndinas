<?php
/* Read Bootstrap Modal Principal */
/* =================================================== */
$template_read_labor = '
    <div class="modal fade" id="labor-lg-modal-read" role="dialog" style="overflow-y: scroll;"> 
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">[Ver] Labor</h4>
                </div> 
                <form class="form-horizontal" role="form" id="form-crear">
                    <div class="modal-body">
                        <div id="alerts-read-labor">
                        </div>
                        <form class="form-horizontal">
                            <div class="panel-body">
                                <!-- FORMULARIO -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="ipt-read-labor-ccosto" class="control-label">C. Costo <span class="text-danger">*</span></label>
                                        <input type="text" placeholder="C. Costo" class="form-control" id="ipt-read-labor-ccosto">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-read-labor-tipo" class="control-label">Tipo</label>
                                        <input type="text" placeholder="Tipo" class="form-control" id="ipt-read-labor-tipo">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-read-labor-veta" class="control-label">Veta</label>
                                        <input type="text" placeholder="Veta" class="form-control" id="ipt-read-labor-veta">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-read-labor-nivel" class="control-label">Nivel</label>
                                        <input type="text" placeholder="Nivel" class="form-control" id="ipt-read-labor-nivel">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-read-labor-mexplotacion" class="control-label">Metodo de Explotacion</label>
                                        <input type="text" placeholder="Metodo de Explotacion" class="form-control" id="ipt-read-labor-mexplotacion">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="ipt-read-labor-seccion" class="control-label">Sección</label>
                                        <input type="text" placeholder="Sección" class="form-control" id="ipt-read-labor-seccion">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-read-labor-tipEq" class="control-label">Tipo EQ</label>
                                        <input type="text" placeholder="Tipo EQ" class="form-control" id="ipt-read-labor-tipEq">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="ipt-read-labor-tipRocca" class="control-label">Tipo Roca</label>
                                        <input type="text" placeholder="Sección" class="form-control" id="ipt-read-labor-tipRocca">
                                    </div>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Labor</legend>
                                        <div class="col-md-4">
                                            <label for="ipt-read-labor-laborName" class="control-label">Labor <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Labor" class="form-control custom-select custom-select-md" id="ipt-read-labor-laborName" list="datalist-read-nombreLabor-nombre">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-labor-name"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                    </span>
                                                    <datalist id="datalist-read-nombreLabor-nombre">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-read-nombreLabor-nombre">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="ipt-read-labor-laborNameEtapa" class="control-label">Etapa</label>
                                            <input type="text" placeholder="Etapa" class="form-control" id="ipt-read-labor-laborNameEtapa" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ipt-read-labor-laborNamePrefijo" class="control-label">Prefijo</label>
                                            <input type="text" placeholder="Prefijo" class="form-control" id="ipt-read-labor-laborNamePrefijo" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="ipt-read-labor-laborNameTipo" class="control-label">Tipo</label>
                                            <input type="text" placeholder="Tipo" class="form-control" id="ipt-read-labor-laborNameTipo" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Zona</legend>
                                        <div class="col-md-6">
                                            <label for="ipt-read-labor-laborZona" class="control-label">Zona <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Zona" class="form-control" id="ipt-read-labor-laborZona" list="datalist-read-zonaLabor-zona">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-zona"><i class="btn-label fa-solid fa-plus"></i>Agregar</button>
                                                    </span>
                                                    <datalist id="datalist-read-zonaLabor-zona">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-read-zonaLabor-zona">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label" for="ipt-read-letra-laborZonaLetra">Letra</label>
                                            <input type="text" placeholder="Letra" class="form-control" id="ipt-read-letra-laborZonaLetra" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="row">
                                    <fieldset>
                                        <legend>Unidad Minera</legend>
                                        <div class="col-md-6">
                                            <label for="ipt-read-unitMining-nombre" class="control-label">Unid. Minera <span class="text-danger">*</span></label>
                                            <div class="input-group-wrap">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Unid. Minera" class="form-control" id="ipt-read-unitMining-nombre" list="datalist-read-labor-unitMining">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-success btn-labeled" type="button" id="add-sede">
                                                            <i class="btn-label fa-solid fa-plus"></i>
                                                            <span>Agregar</span>
                                                        </button>
                                                    </span>
                                                    <datalist id="datalist-read-labor-unitMining">
                                                        <option value="Nose ejecuto">
                                                    </datalist>
                                                    <template id="template-datalist-read-labor-unitMining">
                                                        <option value=""></option>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ipt-read-unitMining-abrev" class="control-label">Abrev. Minera</label>
                                            <input type="text" placeholder="Abrev. Minera" class="form-control" id="ipt-read-unitMining-abrev" disabled>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="read-mbtn-labor-new">
                            <span class="fa fa-save"></span>
                            <span class="hidden-xs"> Nuevo</span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="read-mbtn-labor-close">
                            <span class="glyphicon glyphicon-remove"></span>
                            <span class="hidden-xs"> Cerrar</span> 
                        </button>
                        <button type="button" class="btn btn-success" id="read-mbtn-labor-insert">
                            <span class="fa fa-save"></span>
                            <span class="hidden-xs"> Registrar</span> 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
';
?>
    