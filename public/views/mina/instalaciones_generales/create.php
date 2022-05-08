<?php
$template_create_instalacionesGenerales = '
<div class="modal fade" id="InstalacionesGenerales-lg-modal-create" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title col-md-7">Registro Instalaciónes Generales</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <!-- <p class="bord-btm pad-ver text-main text-bold">Datos </p> -->
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-fecha-insert" class="control-label">Fecha</label>
                                        <input type="date" placeholder="Fecha" class="form-control" id="input-fecha-insert"  value="' . date('Y-m-d'). '" > <!--min="2021-12-12" max="2021-12-13"-->
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-nreporte-insert" class="control-label">N° Reporte</label>
                                        <input type="text" placeholder="N° Reporte" class="form-control" id="input-nreporte-insert"  value="000000" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-ccosto-insert" class="control-label">C. Costo</label>
                                        <input list="insert-options-ccostos" type="text" class="form-control" id="input-ccosto-insert"  placeholder="C. Costo">
                                        <datalist id="insert-options-ccostos">
                                            <option value="Nose ejecuto">
                                        </datalist>
                                        <template id="template-opt-ccostos">
                                            <option id="opt-ccostos" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-labor-insert" class="control-label">Labor</label>
                                        <input type="text" placeholder="Labor" class="form-control" id="input-labor-insert"  value="" disabled>
                                    </div>
                                </div>                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-zona-insert" class="control-label">Zona</label>
                                        <input type="text" placeholder="Zona" class="form-control" id="input-zona-insert"  value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-descripcion-insert" class="control-label">Descripción</label>
                                        <input type="text" class="form-control" id="input-descripcion-insert" list="nombre-instalaciones-options" placeholder="Descripción">
                                        <datalist id="nombre-instalaciones-options">
                                            <option value="Nose ejecuto">
                                        </datalist>
                                        <template id="template-opts-name-instalaciones">
                                            <option id="template-opt-name-instalaciones" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-undmedida-insert" class="control-label">Und Medida</label>
                                        <input type="text" placeholder="Und Medida" class="form-control" id="input-undmedida-insert"  value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="input-cantidad-insert" class="control-label">Cantidad</label>
                                        <input type="number" placeholder="Cantidad" class="form-control" id="input-cantidad-insert"  value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive-md">
                                        <fieldset>
                                            <legend>Detalle</legend>
                                            <table id="table-details-insert" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" width="2%"><input type="checkbox"/></th>
                                                        <th scope="col">id_labor</th>
                                                        <th scope="col">C. Costos</th>
                                                        <th scope="col">Labor</th>
                                                        <th scope="col">Zona</th>
                                                        <th scope="col">id_instalacionMina</th>
                                                        <th scope="col">Descripción</th>
                                                        <th scope="col">Und. Medida</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Acciónes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-success col-md-12" id="btn-add-table-insert">Agregar</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-default col-md-12" id="btn-new-table-insert">Nuevo</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-warning col-md-12" id="btn-edit-table-insert">Modificar</button>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-default col-md-12" id="btn-exportExcel-table-insert" ><i class="fa fa-file-excel-o"></i> Excel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button class="btn btn-primary" id="mbtn-new">Nuevo</button>
                    <button class="btn btn-default" id="mbtn-close" data-dismiss="modal" type="button">Cerrar</button>
                    <button class="btn btn-success" id="mbtn-insert" >Registrar</button>
                </div>
            </div>
        </div>
    </div>
';
?>