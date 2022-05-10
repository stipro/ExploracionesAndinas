<?php
/* Insertar Bootstrap Modal */
/* =================================================== */
$template_create_docExplosivo = '
    <div class="modal fade" id="docExplosivo-lg-modal-create" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header bord-btm">                    
                    <div class="row">
                        <h4 class="modal-title col-xs-3 col-sm-3 col-md-7">[Crear] Documento Ingreso Explosivo</h4>
                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <label for="insert-ipt-docExplosivo-digitador" class="col-sm-12 col-md-12 control-label label-sm">Digitador</label>
                            <div class="col-sm-12 col-md-12">
                                <input type="text" placeholder="..." class="form-control input-sm" name="digitador" id="insert-ipt-docExplosivo-digitador" data-id="' . $_SESSION["id"] . '" value="' . $_SESSION["name"] . '" disabled>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="iinsert-ipt-docExplosivo-numeroDoc" class="col-md-12 control-label label-sm">N° Doc.
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Nª Documento" class="form-control input-sm" name="n_documento" id="insert-ipt-docExplosivo-numeroDoc" autofocus>
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
                    <div id="alerts-form-insert-docExplosivo">
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <p class="bord-btm pad-ver text-main text-bold">Dirección de Pártida</p>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-viaTipo-dPa" class="col-sm-12 col-md-12 col-lg-3 control-label label-sm">Vía <br>Tipó</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-viaTipo-dPa" placeholder="Vía Tipó">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-viaNombre-dPa" class="col-sm-12 col-md-12 col-lg-3 control-label">Vía Nombre</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-viaNombre-dPa" placeholder="Via nombre">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-n-dPa" class="col-sm-12 col-md-12 control-label">N°</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-n-dPa" placeholder="N°">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-int-dPa" class="col-sm-12 col-md-12 control-label">Interíor</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-int-dPa" placeholder="Interior">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-zona-dPa" class="col-sm-12 col-md-12 control-label">Zona</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-zona-dPa" placeholder="Zona">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-dis-dPa" class="col-sm-12 col-md-12 control-label">Distrito</label>
                                        <div class="col-sm-12 col-md-12">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-dis-dPa" placeholder="Distrito">
                                            </div>
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-pro-dPa" class="col-sm-12 col-md-12 control-label">Prov.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-pro-dPa" placeholder="Prov.">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-dep-dPa" class="col-sm-12 col-md-12 control-label">Dep.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-dep-dPa" placeholder="Dep.">
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
                                        <label for="insert-ipt-docExplosivo-viaTipo-dLL" class="col-sm-12 col-md-12 col-lg-3 control-label label-sm">Vía <br>Tipó</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-viaTipo-dLL" placeholder="Vía Tipó">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-viaNombre-dLL" class="col-sm-12 col-md-12 col-lg-3 control-label">Vía Nombre</label>
                                        <div class="col-ms-12 col-md-12 col-lg-9">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-viaNombre-dLL" placeholder="Via nombre">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-n-dLL" class="col-sm-12 col-md-12 control-label">N°</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-n-dLL" placeholder="N°">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-int-dLL" class="col-sm-12 col-md-12 control-label">Interíor</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-int-dLL" placeholder="Interior">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-zona-dLL" class="col-sm-12 col-md-12 control-label">Zona</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <div class="">
                                                <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-zona-dLL" placeholder="Zona">
                                            </div>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-dis-dLL" class="col-sm-12 col-md-12 control-label">Distrito</label>
                                        <div class="col-sm-12 col-md-12">
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-dis-dLL" placeholder="Distrito">
                                        <!--===================================================-->
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-pro-dLL" class="col-sm-12 col-md-12 control-label">Prov.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-pro-dLL" placeholder="Prov.">
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-dep-dLL" class="col-sm-12 col-md-12 control-label">Dep.</label>
                                        <div class="col-sm-12 col-md-12">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-dep-dLL" placeholder="Dep.">
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
                                        <label for="insert-ipt-docExplosivo-nombres_razonSocial-remitente" class="col-md-12">Apellidos y Nombres / Razón Social: </label>
                                        <div class="col-md-12">
                                            <input list="dt-docExplosivo-nombres_razonSocial-remitente" type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-nombres_razonSocial-remitente" placeholder="Apellidos y nombres / Razón Social">
                                            <datalist id="dt-docExplosivo-nombres_razonSocial-remitente">
                                                <option value="">-- Hubo un Error ! --</option>
                                            </datalist>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-ruc-remitente" class="col-md-12">R.U.C.: </label>
                                        <div class="col-md-12">
                                            <input list="dt-docExplosivo-ruc-remitente" type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-ruc-remitente" placeholder="R.U.C.">
                                            <datalist id="dt-docExplosivo-ruc-remitente">
                                                <option value="">-- Hubo un Error ! --</option>
                                            </datalist>
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
                                        <label for="insert-ipt-docExplosivo-nombres_razonSocial-destinatario" class="col-md-12">Apellidos y Nombres / Razón Social: </label>
                                        <div class="col-md-12">
                                            <input list="dt-docExplosivo-nombres_razonSocial-destinatario" type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-nombres_razonSocial-destinatario" placeholder="Apellidos y nombres / Razón Social">
                                            <datalist id="dt-docExplosivo-nombres_razonSocial-destinatario">
                                                <option value="">-- Hubo un Error ! --</option>
                                            </datalist>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="col-sm-4 ol-md-4">
                                    <div class="form-group">
                                        <label for="insert-ipt-docExplosivo-ruc-destinatario" class="col-md-12">R.U.C.: </label>
                                        <div class="col-md-12">
                                            <input list="dt-docExplosivo-ruc-destinatario" type="text" class="form-control input-sm" id="insert-ipt-docExplosivo-ruc-destinatario" placeholder="R.U.C.">
                                            <datalist id="dt-docExplosivo-ruc-destinatario">
                                                <option value="">-- Hubo un Error ! --</option>
                                            </datalist>
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
                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="addDetail-ipt-docExplosivo-explosivoNombre" class="col-md-12">Nombre Explosivo: <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input list="addDetail-dt-docExplosivo-explosivoNombre" type="text" class="form-control input-sm" id="addDetail-ipt-docExplosivo-explosivoNombre" placeholder="Nombre Explosivo">
                                                <datalist id="addDetail-dt-docExplosivo-explosivoNombre">
                                                    <option value="">-- Hubo un Error ! --</option>
                                                </datalist>
                                            </div>
                                            <template id="addDetail-tpt-docExplosivo-explosivoNombre">
                                                <option id="" value=""></option>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="addDetail-ipt-docExplosivo-explosivoCodigo" class="col-md-12">Código: <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input list="addDetail-dt-docExplosivo-explosivoCodigo" type="text" class="form-control input-sm" id="addDetail-ipt-docExplosivo-explosivoCodigo" placeholder="Código">
                                                <datalist id="addDetail-dt-docExplosivo-explosivoCodigo">
                                                    <option value="">-- Hubo un Error ! --</option>
                                                </datalist>
                                            </div>
                                            <template id="addDetail-tpt-docExplosivo-explosivoCodigo">
                                                <option id="" value=""></option>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-md-2">
                                        <div class="form-group">
                                            <label for="addDetail-ipt-docExplosivo-unidMedida" class="col-md-12">Und. Medida: <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input list="addDetail-dt-docExplosivo-cantidad" type="text" class="form-control input-sm" id="addDetail-ipt-docExplosivo-unidMedida" placeholder="Unidad Medida" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="form-group">
                                            <label for="addDetail-ipt-docExplosivo-cantidad" class="col-md-12">Cantidad: <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input list="addDetail-dt-docExplosivo-cantidad" type="text" class="form-control input-sm" id="addDetail-ipt-docExplosivo-cantidad" placeholder="Cantidad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-1 col-md-1">
                                        <button class="btn btn-primary btn-sm h-100 d-inline-block" id="mbtn-add-btn-docExplosivo-listExplosivo">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="insert-tb-docExplosivos-listExplosivos" class="table table-striped table-bordered nowrap" style="width:100%" cellspacing="0">
                                                <colgroup>
                                                    <col span="3">
                                                    <col span="1" style="border-left: 2px solid #295C80">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th width="2% !important">id</th>
                                                        <th width="15% !important">Código</th>
                                                        <th width="33% !important">Descripción</th>
                                                        <th width="25% !important">Unidad. Medida</th>
                                                        <th width="25% !important">Cantidad</th>
                                                        <th width="25% !important">Acciónes</th>
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
                    <button  class="btn btn-primary" id="mbtn-new-docExplosivo">Nuevo</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button" id="mbtn-close-docExplosivo">Cerrar</button>
                    <button class="btn btn-success" id="mbtn-insert-docExplosivo">Registrar</button>
                </div>
            </div>
        </div>
    </div>
';
/* =================================================== */
/* End Insertar Bootstrap Modal */