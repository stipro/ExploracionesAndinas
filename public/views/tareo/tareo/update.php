<?php
/* Crear Bootstrap Modal */
/* =================================================== */
$template_update_tareo = '
    <div class="modal fade" id="tareo-lg-modal-update" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">[Editar] Registro</h4>
                </div>

                <!--Modal body-->
                <div class="modal-body">
                    <div id="alerts-Edit">
                        
                    </div>
					            <!--Input Size-->
					            <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
                                        <!-- FORMULARIO -->
                                        <div class="form-group">
					                        <label for="formIptTextCodigoEdit" class="col-sm-3 control-label">Código</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Código" class="form-control" id="formIptTextCodigoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextNombreEdit" class="col-sm-3 control-label">Nombre</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Cargo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCargoEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="formIptTextCargoEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextDiaEdit" class="col-sm-3 control-label">Dia</label>
					                        <div class="col-sm-6">
					                            <input type="date" placeholder="Dia" class="form-control" id="formIptTextDiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextTurnoEdit" class="col-sm-3 control-label">Turno</label>
					                        <div class="col-sm-6">
                                            <!--<input type="text" placeholder="Nombre" class="form-control" id="formIptTextNombreEdit">
                                                -===================================================-->
                                                <select data-placeholder="elige un turno" id="formIptTextTurnoEdit" tabindex="2">
                                                    <option value="Día">Día</option>
                                                    <option value="Noche">Noche</option>
                                                    <option value="Blanco">Descanso</option>
                                                </select>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHTEdit" class="col-sm-3 control-label">H.T.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Trabajo" class="form-control" id="formIptNumHTEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextHTSerAdiEdit" class="col-sm-3 control-label">H.T. Serv. Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H. T. Servicio Adicional" class="form-control" id="formIptTextHTSerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextCCostosEdit" class="col-sm-3 control-label">C. Costos</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Centro de costos" class="form-control" id="formIptTextCCostosEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextLaborEdit" class="col-sm-3 control-label">Labor</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Labor" class="form-control" id="formIptTextLaborEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumNivelEdit" class="col-sm-3 control-label">Nivel</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Nivel" class="form-control" id="formIptNumNivelEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHEEdit" class="col-sm-3 control-label">Horas Extras (H.E.)</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Horas Extras" class="form-control" id="formIptNumHEEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumHESerAdiEdit" class="col-sm-3 control-label">H.E. Servicio Adicional</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="H.E Servicio Adicional" class="form-control" id="formIptNumHESerAdiEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumCCostosHorasExtrasEdit" class="col-sm-3 control-label">C.Costos Horas E.</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="C. Costos Horas Extras" class="form-control" id="formIptNumCCostosHorasExtrasEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextZonaEdit" class="col-sm-3 control-label">Zona</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Zona" class="form-control" id="formIptTextZonaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextGuardiaEdit" class="col-sm-3 control-label">Cod. Guardia</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Codigo Guardia" class="form-control" id="formIptTextGuardiaEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptNumActividadEdit" class="col-sm-3 control-label">Numero Actividad</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="N° Actividad" class="form-control" id="formIptNumActividadEdit">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="formIptTextAreaEdit" class="col-sm-3 control-label">Area</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Área" class="form-control" id="formIptTextAreaEdit">
					                        </div>
					                    </div>
					                </div>
					            </form>
					            <!--===================================================-->
					            <!--End Input Size-->
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtn-edit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>
';
?>