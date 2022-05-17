<?php
/* Crear Bootstrap Modal */
/* =================================================== */
$template_create_tareo = '
<div class="modal fade" id="tareo-lg-modal-create" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
<div class="modal-dialog modal-lg" style="margin: 1rem;">
    <div class="modal-content">
        <!--Modal header-->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
            <h4 class="modal-title">[ CREAR ] Tareo</h4>
        </div>
        <!--Modal body-->
        <div class="modal-body">
            <div id="alerts-form-insert">
            </div>
            <form class="form-horizontal">
                <div id="group1Form">
                    <div id="g1item1Form">
                        <p class="bord-btm pad-ver text-main text-bold">Personal</p>
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="create-ipt-tareo-nTarjeta" class="col-sm-3 control-label input-sm">N. Tarjeta</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Tarjeta" class="form-control input-sm" id="create-ipt-tareo-nTarjeta">
                                </div>
                            </div>
                            <div id="rptBusquedaDni">
                            </div>
                            
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="create-ipt-tareo-dni" class="col-sm-3 control-label">DNI</label>
                                <div class="col-sm-6">
                                    <input list="dtl-create-insert-dtl-tareo-dni" type="number" placeholder="DNI" class="form-control" id="create-ipt-tareo-dni">
                                    <datalist id="dtl-create-insert-dtl-tareo-dni">
                                        <option value="--no cargo--">--no cargo--</option>
                                    </datalist>
                                </div>
                                <template id="tpt-tareo-dni">
                                    <option></option>
                                </template>
                            </div>
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="create-ipt-tareo-nombre" class="col-sm-3 control-label input-sm">Nombre</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Nombre" class="form-control input-sm" id="create-ipt-tareo-nombre" disabled>
                                </div>
                            </div>
                            <!-- FORMULARIO -->
                            <div class="form-group">
                                <label for="create-ipt-tareo-cargo" class="col-sm-3 control-label input-sm">Cargo</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Cargo" class="form-control input-sm" id="create-ipt-tareo-cargo" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="create-ipt-tareo-area" class="col-sm-3 control-label input-sm">Area</label>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Area" class="form-control input-sm" id="create-ipt-tareo-area" disabled>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <br>
                    <div id="g1item2Form">
                        <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                        <fieldset>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-dia" class="col-lg-3 control-label">Dia</label>
                                <div class="col-lg-7">
                                    <input type="date" class="form-control" id="create-ipt-tareo-dia">
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-turno" class="col-xs-12 col-lg-3 control-label">Turno</label>
                                <div class="col-xs-12 col-md-7">
                                    <select name="turnos" id="create-ipt-tareo-turno" class="form-control">
                                        <option value="Dia">Dia</option>
                                        <option value="Noche">Noche</option>
                                        <option value="Descanso">Descanso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-guardia" class="col-lg-3 control-label">Guardia</label>
                                <div class="col-lg-7">
                                    <select name="turnos" id="create-ipt-tareo-guardia" class="form-control">
                                    <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The confirm password is required and cant be empty</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="confirmPassword" data-bv-result="NOT_VALIDATED">The password and its confirm are not the same</small></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="create-ipt-tareo-nActividad" class="col-lg-3 control-label">Ingrese N° Actividad HT</label>
                                    <div class="col-lg-7">
                                        <input type="number" placeholder="N° Actividad" class="form-control" id="create-ipt-tareo-nActividad">
                                    </div>
                                </div>
                            <div>
                        </fieldset>
                    </div>
                </div>
                <div id="group2Form">
                    <div id="g2item1Form">
                        <p class="bord-btm pad-ver text-main text-bold">CCostos</p>
                        <fieldset>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-codZona" class="col-lg-3 control-label">Cod. Zona</label>
                                <div class="col-md-7">
                                    <input list="dtl-create-insert-dtl-tareo-codZona" type="text" class="form-control" id="create-ipt-tareo-codZona" name="cod_zona" placeholder="Codigo Zona">
                                    <datalist id="dtl-create-insert-dtl-tareo-codZona">
                                        <option value="--no cargo--">--no cargo--</option>
                                    </datalist>
                                </div>
                                <template id="tpt-tareo-codZona">
                                    <option></option>
                                </template>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-centCostos" class="col-lg-3 control-label">Cent. Costos</label>
                                <div class="col-md-7">
                                    <input list="dtl-create-insert-dtl-tareo-cenCostos" type="text" class="form-control" id="create-ipt-tareo-centCostos" name="cod_zona" placeholder="Centro Costos">
                                    <datalist id="dtl-create-insert-dtl-tareo-cenCostos">
                                        <option value="--no cargo--">--no cargo--</option>
                                    </datalist>
                                </div>
                                <template id="tpt-tareo-cenCostos">
                                    <option></option>
                                </template>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-zona" class="col-lg-3 control-label input-sm">Zona</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="Zona" class="form-control input-sm" id="create-ipt-tareo-zona" disabled>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-labor" class="col-lg-3 control-label input-sm">Labor</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="Labor" class="form-control input-sm" id="create-ipt-tareo-labor" disabled>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-nivel" class="col-lg-3 control-label input-sm">Nivel</label>
                                <div class="col-lg-7">
                                    <input type="number" placeholder="Nivel" class="form-control input-sm" id="create-ipt-tareo-nivel" disabled>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <br>
                    <div id="g2item2Form">
                        <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                        <fieldset>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-he" class="col-lg-3 control-label">HE</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="HE" class="form-control" id="create-ipt-tareo-he">
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-htSeAd" class="col-lg-3 control-label">HT Serv. Ad</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="HT Serv. Ad" class="form-control" id="create-ipt-tareo-htSeAd">
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-heSeAd" class="col-lg-3 control-label">HE Serv. Ad</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="HE Serv. Ad" class="form-control" id="create-ipt-tareo-heSeAd">
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-ccSeAd" class="col-lg-3 control-label">Cc Serv. Ad</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="Cc Serv. Ad" class="form-control" id="create-ipt-tareo-ccSeAd">
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="create-ipt-tareo-ccHe" class="col-lg-3 control-label">CcostosHe</label>
                                <div class="col-lg-7">
                                    <input type="text" placeholder="CcostosHe" class="form-control" id="create-ipt-tareo-ccHe">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <br>
                <div>
                    <p class="bord-btm pad-ver text-main text-bold">Actividad</p>
                    <fieldset>
                        <div class="form-group pad-ver">
                            <div class="col-md-9" style="width: 100%;">
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="1 Perforacion" type="radio" name="create-tareo-activadadTipo" checked="">
                                    1 Perforacion
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="2 Vol" type="radio" name="create-tareo-activadadTipo">
                                    2 Vol
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="3 Lim" type="radio" name="create-tareo-activadadTipo">
                                    3 Lim
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="4 Stto" type="radio" name="create-tareo-activadadTipo">
                                    4 Stto
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="5 Serv." type="radio" name="create-tareo-activadadTipo">
                                    5 Serv.
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="6 Rehabulitacion" type="radio" name="create-tareo-activadadTipo">
                                    6 Rehabulitacion
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="10 Cap" type="radio" name="create-tareo-activadadTipo">
                                    10 Cap
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="11" value="11 Dm" type="radio" name="create-tareo-activadadTipo">
                                    11 Dm
                                </label>                                        
                                <label class="radio-inline">
                                    <input id="" data-ht="12" value="12 Dl" type="radio" name="create-tareo-activadadTipo">
                                    12 Dl
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="13" value="13 S" type="radio" name="create-tareo-activadadTipo">
                                    13 S
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="14" value="14 F" type="radio" name="create-tareo-activadadTipo">
                                    14 F
                                </label>					
                                <label class="radio-inline">
                                    <input id="" data-ht="15" value="15 L" type="radio" name="create-tareo-activadadTipo">
                                    15 L
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="16" value="16 Lp" type="radio" name="create-tareo-activadadTipo">
                                    16 Lp
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="17" value="17 Lf" type="radio" name="create-tareo-activadadTipo">
                                    17 Lf
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="18" value="18 Td" type="radio" name="create-tareo-activadadTipo">
                                    18 Td
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="19" value="19 Tn" type="radio" name="create-tareo-activadadTipo">
                                    19 Tn
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="20" value="20 Pcg" type="radio" name="create-tareo-activadadTipo">
                                    20 Pcg
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="21" value="21 Psg" type="radio" name="create-tareo-activadadTipo">
                                    21 Psg
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="22" value="22 Sup" type="radio" name="create-tareo-activadadTipo">
                                    22 Sup
                                </label>                                        
                                <label class="radio-inline">
                                    <input id="" data-ht="23" value="23 Vac" type="radio" name="create-tareo-activadadTipo">
                                    23 Vac
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="24 Jft" type="radio" name="create-tareo-activadadTipo">
                                    24 Jft
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="25 Aste" type="radio" name="create-tareo-activadadTipo">
                                    25 Aste
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="26 Per_Adm" type="radio" name="create-tareo-activadadTipo">
                                    26 Per_Adm
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="27 Serv. Mult" type="radio" name="create-tareo-activadadTipo">
                                    27 Serv. Mult
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value=" 28 Serv. Ad. Mina" type="radio" name="create-tareo-activadadTipo">
                                    28 Serv. Ad. Mina
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value=" 29 Tran Min" type="radio" name="create-tareo-activadadTipo">
                                    29 Tran Min
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="30 Afiliación" type="radio" name="create-tareo-activadadTipo">
                                    30 Afiliación
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="31 Tras Mat_E" type="radio" name="create-tareo-activadadTipo">
                                    31 Tras Mat_E
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="10.5" value="35 Festividad" type="radio" name="create-tareo-activadadTipo">
                                    35 Festividad
                                </label>
                                <label class="radio-inline">
                                    <input id="" data-ht="36" value="36 Cuarentena" type="radio" name="create-tareo-activadadTipo">
                                    36 Cuarentena
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
        </div>
            <!--Modal footer-->
        <div class="modal-footer">
            <button id="create-tareo-mbtnNew" class="btn btn-primary">Nuevo</button>
            <button id="create-tareo-mbtnClose" data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
            <button id="create-tareo-mbtnInsert" class="btn btn-success">Registrar</button>
        </div>
    </div>
</div>
</div>
';
?>