<?php
/* Lectura Bootstrap Modal */
/* =================================================== */
$template_read_docExplosivo = '
    <div class="modal fade" id="docExplosivo-lg-modal-read" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header bord-btm">                    
                    <div class="row">
                        <h4 class="modal-title col-xs-3 col-sm-6 col-md-9">[Ver] Documento Ingreso Explosivo</h4>
                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="read-ipt-docExplosivo-numeroDoc" class="col-md-12 control-label label-sm">N° Doc.
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Nª Documento" class="form-control input-sm" name="n_documento" id="read-ipt-docExplosivo-numeroDoc" disabled>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    </div>   
                    <div class="row">
                        <div class="col-md-3"></div>
                        
                    </div>                 
                </div>

                <!--Modal body-->
                <div class="modal-body">

                    <!--Alert body-->
                    <div id="alerts-form-read-docExplosivo">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">Dirección de Pártida</p>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-viaTipo-dPa" class="col-sm-12 col-md-12 col-lg-3 control-label label-sm">Vía <br>Tipó</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-viaTipo-dPa" placeholder="Vía Tipó" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-viaNombre-dPa" class="col-sm-12 col-md-12 col-lg-3 control-label">Vía Nombre</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-viaNombre-dPa" placeholder="Via nombre" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-n-dPa" class="col-sm-12 col-md-12 control-label">N°</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-n-dPa" placeholder="N°" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-int-dPa" class="col-sm-12 col-md-12 control-label">Interíor</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-int-dPa" placeholder="Interior" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-zona-dPa" class="col-sm-12 col-md-12 control-label">Zona</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-zona-dPa" placeholder="Zona" disabled>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-dis-dPa" class="col-sm-12 col-md-12 control-label">Distrito</label>
                                        <div class="col-sm-12 col-md-12">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-dis-dPa" placeholder="Distrito" disabled>
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-pro-dPa" class="col-sm-12 col-md-12 control-label">Prov.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-pro-dPa" placeholder="Prov." disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-dep-dPa" class="col-sm-12 col-md-12 control-label">Dep.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-dep-dPa" placeholder="Dep." disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">Dirección de LLegada</p>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-viaTipo-dLL" class="col-sm-12 col-md-12 col-lg-3 control-label label-sm">Vía <br>Tipó</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-viaTipo-dLL" placeholder="Vía Tipó" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-viaNombre-dLL" class="col-sm-12 col-md-12 col-lg-3 control-label">Vía Nombre</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-viaNombre-dLL" placeholder="Via nombre" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-n-dLL" class="col-sm-12 col-md-12 control-label">N°</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-n-dLL" placeholder="N°" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-int-dLL" class="col-sm-12 col-md-12 control-label">Interíor</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-int-dLL" placeholder="Interior" disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-zona-dLL" class="col-sm-12 col-md-12 control-label">Zona</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-zona-dLL" placeholder="Zona" disabled>
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-dis-dLL" class="col-sm-12 col-md-12 control-label">Distrito</label>
                                        <div class="col-sm-12 col-md-12">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-dis-dLL" placeholder="Distrito" disabled>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-pro-dLL" class="col-sm-12 col-md-12 control-label">Prov.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-pro-dLL" placeholder="Prov." disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-dep-dLL" class="col-sm-12 col-md-12 control-label">Dep.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-dep-dLL" placeholder="Dep." disabled>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">Remitente</p>
                            <div class="row">
                                <div class="col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-nombres_razonSocial-remitente" class="col-md-12">Apellidos y Nombres / Razón Social: </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-nombres_razonSocial-remitente" placeholder="Apellidos y nombres / Razón Social" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-ruc-remitente" class="col-md-12">R.U.C.: </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-ruc-remitente" placeholder="R.U.C." disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">Destinatario</p>
                            <div class="row">
                                <div class="col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-nombres_razonSocial-destinatario" class="col-md-12">Apellidos y Nombres / Razón Social: </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-nombres_razonSocial-destinatario" placeholder="Apellidos y nombres / Razón Social" disabled>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 ol-md-4">
                                    <div class="form-group">
                                        <label for="read-ipt-docExplosivo-ruc-destinatario" class="col-md-12">R.U.C.: </label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control input-sm" id="read-ipt-docExplosivo-ruc-destinatario" placeholder="R.U.C." disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <template id="tpt-select">
                            <option id="" value=""></option>
                        </template>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Materiales de Explosivos</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="read-tb-docExplosivos-listExplosivos" class="table table-striped table-bordered nowrap" style="width:100%" cellspacing="0">
                                            <colgroup>
                                                <col span="3">
                                                <col span="1" style="border-left: 2px solid #295C80">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th width="15% !important">Código</th>
                                                    <th width="33% !important">Descripción</th>
                                                    <th width="25% !important">Unidad. Medida</th>
                                                    <th width="25% !important">Cantidad</th>
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
                    <button data-dismiss="modal" class="btn btn-default" type="button" id="mbtn-close-docExplosivo">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
';
/* =================================================== */
/* End Lectura Bootstrap Modal */
?>