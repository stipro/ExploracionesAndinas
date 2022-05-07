<?php
/* View Bootstrap Modal */
/* =================================================== */
$template_read_consumoMadera = '
<div class="modal fade" id="consumoMadera-lg-modal-read" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="margin: 1rem;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title col-md-7">[Ver] Consumo de Madera diario</h4>
            </div>
            <!--Modal body-->
            <div class="modal-body">
                <div id="alerts-form-view">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <legend><p class="text-main">Datos Principal</p></legend>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="view-slt-consumoMadera-turno" class="control-label">Turno<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                    <select name="turnos" id="view-slt-consumoMadera-turno" class="form-control" disabled>
                                        <option value="Dia">Dia</option>
                                        <option value="Noche">Noche</option>
                                    </select>
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-1">
                                <div class="form-group">
                                    <label for="view-slt-consumoMadera-guardia" class="control-label">Guardia<span class="text-danger">*</span></label>
                                    <select name="turnos" id="view-slt-consumoMadera-guardia" class="form-control" disabled>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="B">C</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="view-ipt-consumoMadera-jefeGuardia" class="control-label">Jefe de Guardia<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                        <input list="view-dtl-consumoMadera-jefeGuardia" type="text" class="form-control" id="view-ipt-consumoMadera-jefeGuardia" name="jefe_guarda" placeholder="Jefe de Guardia" disabled>
                                        <datalist id="view-dtl-consumoMadera-jefeGuardia">
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
                                    <label for="view-ipt-consumoMadera-fecha" class="control-label">Fecha<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-8"> -->
                                    <input type="date" class="form-control" id="view-ipt-consumoMadera-fecha"  name="fecha" placeholder="Fecha" value="' . date('Y-m-d') . '" disabled>
                                    <!-- </div> -->
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-3">
                                <div class="form-group">
                                    <label for="view-slt-consumoMadera-nvale" class="control-label">N° Vale<span class="text-danger">*</span></label>
                                    <!-- <div class="col-md-7"> -->
                                    <input type="text" class="form-control" id="view-slt-consumoMadera-nvale"  name="consumoMadera_nvale" placeholder="N° Vale" value="000000" disabled>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="list-view-consumoMadera-detalle" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th width="8% !important" scope="col">C. Costos</th>
                                                <th width="10% !important" scope="col">Labor</th>
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
                <button class="btn btn-default" id="mbtn-close-consumoMadera" data-dismiss="modal" type="button">Cerrar</button>
            </div>
        </div>
    </div>
</div>';
?>