<?php
/* Insert Bootstrap Modal */
/* =================================================== */
$template_create_consumoMadera = '
<div class="modal fade" id="consumoMadera-lg-modal-create" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="margin: 1rem;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title col-md-7">[Crear] Consumo de Madera diario</h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <div id="alerts-form-insert">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <legend><p class="text-main">Datos Principal</p></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="insert-slt-consumoMadera-unidadMinera" class="control-label">Unidad Minera<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                        <select name="unidadMinera" id="insert-slt-consumoMadera-unidadMinera" class="form-control">
                                            <option></option>
                                        </select>
                                        <template id="tpt-consumoMadera-unidadMinera">
                                            <option></option>
                                        </template>
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="insert-slt-consumoMadera-turno" class="control-label">Turno<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                        <select name="turnos" id="insert-slt-consumoMadera-turno" class="form-control">
                                            <option data-id-turno="1" value="Dia">Dia</option>
                                            <option data-id-turno="2" value="Noche">Noche</option>
                                        </select>
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-1">
                                <div class="form-group">
                                    <label for="insert-slt-consumoMadera-guardia" class="control-label">Guardia<span class="text-danger">*</span></label>
                                    <select name="turnos" id="insert-slt-consumoMadera-guardia" class="form-control">
                                        <option data-id-guardia="1" value="A">A</option>
                                        <option data-id-guardia="2" value="B">B</option>
                                        <option data-id-guardia="3" value="C">C</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="insert-ipt-consumoMadera-jefeGuardia" class="control-label">Jefe de Guardia<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                        <input list="insert-dtl-consumoMadera-jefeGuardia" type="text" class="form-control" id="insert-ipt-consumoMadera-jefeGuardia" name="jefe_guarda" placeholder="Jefe de Guardia">
                                        <datalist id="insert-dtl-consumoMadera-jefeGuardia">
                                            <option value="--no cargo--">--no cargo--</option>
                                        </datalist>
                                    <!-- </div> -->
                                    <template id="template-consumoMadera-jefeGuardia">
                                        <option id="template-opt-consumoMadera-jefeGuardia">
                                    </template>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <div class="form-group">
                                    <label for="insert-ipt-consumoMadera-fecha" class="control-label">Fecha<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-8"> -->
                                        <input type="date" class="form-control" id="insert-ipt-consumoMadera-fecha"  name="fecha" placeholder="Fecha" value="' . date('Y-m-d') . '">
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <div class="form-group">
                                    <label for="insert-slt-consumoMadera-nvale" class="control-label">N° Vale<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                        <input type="text" class="form-control" id="insert-slt-consumoMadera-nvale"  name="consumoMadera_nvale" placeholder="N° Vale" value="000000">
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <legend><p class="text-main">Detalle</p></legend>
                        <div class="row">
                            
                                <div class="col-xs-4 col-md-2">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-centroCostos" class="control-label">C. Costos<span class="text-danger">*</span></label>
                                        <!-- <div class="col-md-7"> -->
                                            <input list="insert-dtl-consumoMadera-centroCostos" type="text" class="form-control" id="insert-ipt-consumoMadera-centroCostos" name="centro_costos" placeholder="Centro Costos">
                                            <datalist id="insert-dtl-consumoMadera-centroCostos">
                                                <option value="--no cargo--">--no cargo--</option>
                                            </datalist>
                                        <!-- </div> -->
                                        <template id="template-consumoMadera-centroCostos">
                                            <option id="template-opt-consumoMadera-centroCostos">
                                        </template>
                                    </div>
                                </div>

                                <div class="col-xs-8 col-md-3">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-laborNombre" class="control-label">Labor<span class="text-danger">*</span></label>
                                        <!-- <div class="col-md-7"> -->
                                            <input list="insert-dtl-consumoMadera-laborNombre" type="text" class="form-control" id="insert-ipt-consumoMadera-laborNombre"  name="fecha" placeholder="Labor">
                                            <datalist id="insert-dtl-consumoMadera-laborNombre">
                                                <option value="--no cargo--">--no cargo--</option>
                                            </datalist>
                                        <!-- </div> -->
                                        <template id="template-consumoMadera-laborNombre">
                                            <option id="template-opt-consumoMadera-laborNombre">
                                        </template>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-madera" class="control-label">Madera<span class="text-danger">*</span></label>
                                        <!-- <div class="col-md-7"> -->
                                            <input list="insert-dtl-consumoMadera-madera" type="text" class="form-control" id="insert-ipt-consumoMadera-madera"  name="fecha" placeholder="Madera">
                                            <datalist id="insert-dtl-consumoMadera-madera">
                                                <option value="--no cargo--">--no cargo--</option>
                                            </datalist>
                                        <!-- </div> -->
                                        <template id="template-consumoMadera-madera">
                                            <option id="template-opt-consumoMadera-madera">
                                        </template>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="insert-ipt-consumoMadera-cantidad" class="control-label">Cantidad<span class="text-danger">*</span></label>
                                        <!-- <div class="col-md-6"> -->
                                            <input type="text" class="form-control" id="insert-ipt-consumoMadera-cantidad"  name="fecha" placeholder="Cantidad">
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <button id="mbtn-agregarDetalle" class="btn btn-success">Agregar</button>
                                </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="list-insert-consumoMadera-detalle" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="2% !important" scope="col">n°</th>
                                                <th scope="col">idLabor</th>
                                                <th width="8% !important" scope="col">C. Costos</th>
                                                <th width="10% !important" scope="col">Labor</th>
                                                <th scope="col">idMadera</th>
                                                <th width="20% !important" scope="col">Madera</th>
                                                <th width="10% !important" scope="col">Cantidad</th>
                                                <th width="15% !important" scope="col">Acciónes</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal footer-->
            <div class="modal-footer">
                <button class="btn btn-primary" id="mbtn-new-consumoMadera">Nuevo</button>
                <button class="btn btn-default" id="mbtn-close-consumoMadera" data-dismiss="modal" type="button">Cerrar</button>
                <button class="btn btn-success" id="mbtn-insert-consumoMadera">Registrar</button>
            </div>
        </div>
    </div>
</div>';
?>