<?php
/* Editar Bootstrap Modal */
/* =================================================== */
$template_update_explosivo = '
    <div class="modal fade" id="modal-edit" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">

                <!--Modal header-->
                <div class="modal-header bord-btm">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pci-cross pci-circle"></i></button>
                    <div class="row">

                        <h4 class="modal-title col-md-5 col-sm-12">Editar Registro</h4>

                        <div class="col-md-3 col-sm-4">
                            <div class="form-group">
                                <label for="edit-valesExplosivo-digitador" class="col-md-2 control-label">Digitador</label>
                                <div class="col-md-10">
                                    <input type="text" placeholder="..." class="form-control" name="digitador" id="edit-valesExplosivo-digitador" value="" disabled>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-4">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="edit-valesExplosivo-preImpreso" class="col-md-4 control-label">PreImpre</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="PreImpre" class="form-control" id="edit-valesExplosivo-preImpreso" value="..." disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4">
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="edit-valesExplosivo-nVale" class="col-md-4 control-label">n°Vale</label>
                                <div class="col-md-8">
                                    <input type="text" placeholder="Nª Vale" class="form-control" name="fullname" id="edit-valesExplosivo-nVale" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal body-->
                <div class="modal-body">

                    <!--Alert body-->
                    <div id="alerts-Edit">
                        <div class="alert alert alert-info" style="margin:0">
                            <button class="close" data-dismiss="alert">
                                <i class="pci-cross pci-circle"></i>
                            </button>
                            <div class="media-left">
                                <span class="icon-wrap icon-wrap-xs icon-circle alert-icon">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="alert-title">Aviso!</h4>
                                <p class="alert-message">Estimado usuario se aplicara los cambios segun el usuario en automativo ...</p>
                            </div>
                        </div>					
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="bord-btm pad-ver text-main text-bold">Información General del Vale</p>
                            <div class="row">
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-zonaNombre" class="col-md-4 control-label">Zona <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input class="form-control" list="edit-dt-valesExplosivo-zonaNombre" id="edit-valesExplosivo-zonaNombre" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-zonaNombre">
                                                <option value="">Hubo un Error ! </option>
                                            </datalist>
                                            <template id="edit-tpt-zonaNombre">
                                                <option id="" value=""></option>
                                            </template>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-turno" class="col-md-4 control-label">Turno <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <!-- Default choosen -->
                                            <!--===================================================-->
                                            <input class="form-control" list="edit-dt-valesExplosivo-turno" id="edit-valesExplosivo-turno" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-turno">
                                                <option value="Dia">Dia</option>
                                                <option value="Noche">Noche</option>
                                            </datalist>
                                            <!--===================================================-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="edit-valesExplosivo-fecha" class="col-md-4 control-label">Fecha <span class="text-danger">*</span></label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Fecha" class="form-control" id="edit-valesExplosivo-fecha"  value=""> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="bord-btm pad-ver text-main text-bold">Detalle del Vale</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborCCosto" class="col-md-4 control-label">Codigo <span class="text-danger">*</span></label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <input class="form-control" list="edit-dt-valesExplosivo-laborCCosto" id="edit-valesExplosivo-laborCCosto" placeholder="Eliga opción...">
                                                    <span class="fa fa-toggle-down form-control-icon"></span>
                                                    <datalist id="edit-dt-valesExplosivo-laborCCosto">
                                                        <option value="">Hubo un Error ! </option>
                                                    </datalist>
                                                    <template id="edit-tpt-laborCCosto">
                                                        <option id="" value=""></option>
                                                    </template>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborNombre" class="col-md-4 control-label">Labor</label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <input class="form-control" list="edit-dt-valesExplosivo-laborNombre" id="edit-valesExplosivo-laborNombre" placeholder="Eliga opción...">
                                                    <span class="fa fa-toggle-down form-control-icon"></span>
                                                    <datalist id="edit-dt-valesExplosivo-laborNombre">
                                                        <option value="">Hubo un Error ! </option>
                                                    </datalist>
                                                    <template id="edit-tpt-laborNombre">
                                                        <option id="" value=""></option>
                                                    </template>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-4">
                                            <div class="form-group">
                                                <label for="edit-valesExplosivo-laborNivel" class="col-md-4 control-label">Nivel</label>
                                                <div class="col-md-8">
                                                    <input type="text" placeholder="Nivel" class="form-control" id="edit-valesExplosivo-laborNivel" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Tipo de Disparo <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Avance" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo1" checked="">
                                                <label for="edit-opcion-tipo_disparo1">Avance</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Realce" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo2">
                                                <label for="edit-opcion-tipo_disparo2">Realce</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Breasting" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo3" >
                                                <label for="edit-opcion-tipo_disparo3">Breasting</label>
                                            </div>
                            
                                        </div>
                                        <div class="col-md-4">
                            
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Desquinche" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo4">
                                                <label for="edit-opcion-tipo_disparo4">Desquinche</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Reperforacion" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo5">
                                                <label for="edit-opcion-tipo_disparo5">Reperforacion</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="Recarga" name="edit-form-radio-tipo_disparo" id="edit-opcion-tipo_disparo6" >
                                                <label for="edit-opcion-tipo_disparo6">Recarga</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Disparo en <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                        <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input id="edit-demo-form-radio" class="magic-radio" type="radio" name="edit-form-radio-tipo_en" value="Mineral" checked="">
                                                <label for="edit-demo-form-radio">Mineral</label>
                                            </div>
                                            <div class="radio">
                                                <input id="edit-demo-form-radio-2" class="magic-radio" type="radio" name="edit-form-radio-tipo_en" value="Desmonte">
                                                <label for="edit-demo-form-radio-2">Desmonte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Registro de Perforadoras</p>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <!-- FORMULARIO -->
                                    <div class="col-md-2 col-sm-4">
                                        <label for="edit-valesExplosivo-barra" class="col-md-4 control-label">Barra</label>
                                        <!-- Default choosen -->
                                        <!--===================================================-->
                                        <div class="col-md-8">
                                            <input class="form-control" list="edit-dt-valesExplosivo-barra" id="edit-valesExplosivo-barra" placeholder="Eliga opción...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-barra">
                                                <option value="0" selected>0</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                            </datalist>
                                        </div>                                        
                                        <!--===================================================-->
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-lgtMt" class="col-md-4 control-label">Lgt (mt)</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-lgtMt">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-nTaladro" class="col-md-4 control-label">N° Taladros</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-nTaladro">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-talVacio" class="col-md-4 control-label">Tal_Vacio</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-talVacio">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-piesPerf" class="col-md-4 control-label">Pies Perf</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-piesPerf" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-piesReal" class="col-md-4 control-label">Pie Real</label>
                                        <div class="col-md-8">
                                            <input class="form-control" value="0" name="" id="edit-valesExplosivo-piesReal" disabled>
                                        </div> 
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-res_dinSemi" disabled>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-res_dinPulv" data-toggle="tooltip" data-placement="top" title="dinamita Pulverulenta" disabled>
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input class="form-control" type="number" name="" value="0" id="edit-valesExplosivo-suma-dimPulv-dimSemi" disabled>
                                    </div>
                                    <!-- FORMULARIO -->
                                    <div class="col-md-3 col-sm-6">
                                        <label for="edit-valesExplosivo-nMaquinas" class="col-md-4 control-label">N° Maquina</label>
                                        <div class="col-md-8">
                                            <select class="form-control" data-placeholder="Seleccione N° Maquinas" id="edit-valesExplosivo-nMaquinas" tabindex="2">
                                                <option value="PA_20">PA_20</option>
                                                <option value="PA_30">PA_30</option>
                                                <option value="PA_36">PA_36</option>
                                                <option value="PS_04"></option>
                                                <option value="PS_05">PS_05</option>
                                                <option value="PS_06">PS_06</option>
                                                <option value="PS_07">PS_07</option>
                                                <option value="PSS_01">PSS_01</option>
                                                <option value="PSecan_01<">PSecan_01</option>
                                                <option value="PSecan_02<">PSecan_02</option>
                                                <option value="PSecan_03<">PSecan_03</option>
                                                <option value="PSecan_04<">PSecan_04</option>
                                                <option value="PSecan_05<">PSecan_05</option>
                                                <option value="PSecan_06<">PSecan_06</option>
                                                <option value="PSecan_07<">PSecan_07</option>
                                                <option value="PSecan_08<">PSecan_08</option>
                                                <option value="PSecan_09<">PSecan_09</option>
                                                <option value="PSecan_10<">PSecan_10</option>
                                                <option value="RNP_01">RNP_01</option>
                                                <option value="RNP_02">RNP_02</option>
                                                <option value="RNP_03">RNP_03</option>
                                                <option value="RNP_04">RNP_04</option>
                                                <option value="RNP_05">RNP_05</option>
                                                <option value="RNP_06">RNP_06</option>
                                                <option value="RNP_07">RNP_07</option>
                                                <option value="PT_03">PT_03</option>
                                                <option value="PT_04">PT_04</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <!-- FORMULARIO -->
                                        <label for="edit-valesExplosivo-perforista" class="col-md-4 control-label">Perforista <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="edit-dt-valesExplosivo-perforista" id="edit-valesExplosivo-perforista" placeholder="Ingrese Nombre o Dni...">
                                            <span class="fa fa-toggle-down form-control-icon"></span>
                                            <datalist id="edit-dt-valesExplosivo-perforista">
                                                <option value="">Hubo un Error ! </option>
                                            </datalist>
                                            <template id="edit-tpt-perforista">
                                                <option id="" value=""></option>
                                            </template>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="bord-btm pad-ver text-main text-bold">Materiales de Explosivos</p>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                        <colgroup>
                                            <col span="3">
                                            <col span="1" style="border-left: 2px solid #295C80">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th style="width:20%" data-sort-initial="true" data-toggle="true">Código</th>
                                                <th style="width:30%">Nombre del Material de Explosivo</th>
                                                <th style="width:20%" data-hide="phone, tablet">Unid. Medida</th>
                                                <th data-hide="phone, tablet">Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody-tareo">
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000652</td>
                                                <td>Emulnor 1000</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-emulnoMil" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000631</td>
                                                <td>Emulnor 3000</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-emulnorTresmil" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000568</td>
                                                <td>Dinamita Pulverulenta 65_7/8</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-dinPulv" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000632</td>
                                                <td>Carmex 7</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carmexSiete" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000633</td>
                                                <td>Carmex 8</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carmexOcho" name="">
                                                </td>                                                        
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000438</td>
                                                <td>Mecha Rapida</td>
                                                <td>MTS</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-mecha_mechaRapida" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000436</td>
                                                <td>Mecha Lenta</td>
                                                <td>MTS</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-mechaLenta" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000454</td>
                                                <td>Fulminantes</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-fuminante" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000514</td>
                                                <td>Conector para Mecha</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-conectorMecha" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000613</td>
                                                <td>Block de Sugeción</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-blockSugecion" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>MTC000077</td>
                                                <td>Car. cortado 13 cm</td>
                                                <td>UND</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-carCortado13" name="">
                                                </td>
                                            </tr>
                                            <tr id="tr-tbody-tareo">
                                                <td>SSO 000439</td>
                                                <td>Dinamita Semigelatinosa de 65%</td>
                                                <td>CAR</td>
                                                <td data-type="number">
                                                    <input type="number" class="form-control" value="0" id="edit-valesExplosivo-dinSemi" name="">
                                                </td>                                                        
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                    <button id="mbtnEdit-edit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
';
/* =================================================== */
/* End Editar Bootstrap Modal */
?>
    
    
    