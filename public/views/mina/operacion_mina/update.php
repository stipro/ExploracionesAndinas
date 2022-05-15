<?php
/* Update Bootstrap Modal */
/* =================================================== */
$template_update_operacionMina = '
<div class="modal fade" id="operacionMina-lg-modal-update" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">[ ACTUALIZAR ] Operación Mina</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-update">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="update-operacionMina-registro" class="col-md-4 control-label">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="update-operacionMina-registro"  value=""> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="update-operacionaMina-turno" class="col-md-4 control-label">Turno</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-turno" id="update-operacionaMina-turno" placeholder="Ingrese Turno...">
                                        </div>
                                        <datalist id="update-options-turno">
                                            <option value="Dia">
                                            <option value="Noche">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="update-operacionMina-guardia" class="col-md-4 control-label">Guardia</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-guardia" id="update-operacionMina-guardia" placeholder="Ingrese Guardia...">
                                        </div>
                                        <datalist id="update-options-guardia">
                                            <option value="A">
                                            <option value="B">
                                            <option value="C">
                                        </datalist>
                                    </div>
                                    <div class="form-group">
                                        <label for="update-operacionMina-nvale" class="col-md-4 control-label">N° Vale</label>
                                        <div class="col-md-8">                                                    
                                            <input type="texto" placeholder="n° vale" class="form-control" id="update-operacionMina-nvale">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Actividad</label>
                                        <div class="col-md-8">
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="1 Perforacion" name="radio-tipo_disparo" id="opcion-tipo_disparo1" checked="">
                                                <label for="opcion-tipo_disparo1">1 Perforación</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="2 Voladura" name="radio-tipo_disparo" id="opcion-tipo_disparo2">
                                                <label for="opcion-tipo_disparo2">2 Voladura</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="3 Limpieza" name="radio-tipo_disparo" id="opcion-tipo_disparo3" >
                                                <label for="opcion-tipo_disparo3">3 Limpieza</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="4 Sostenimiento" name="radio-tipo_disparo" id="opcion-tipo_disparo4" >
                                                <label for="opcion-tipo_disparo4">4 Sostenimiento</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="5 Servicio" name="radio-tipo_disparo" id="opcion-tipo_disparo5" >
                                                <label for="opcion-tipo_disparo4">5 Servicios</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="6 Acarreo" name="radio-tipo_disparo" id="opcion-tipo_disparo6" >
                                                <label for="opcion-tipo_disparo4">6 Acarreo</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="7 Relleno" name="radio-tipo_disparo" id="opcion-tipo_disparo7" >
                                                <label for="opcion-tipo_disparo4">7 Relleno</label>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="bord-btm pad-ver text-main text-bold">Centro de Costos</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-codzona" class="col-md-4 control-label">cod. Zona</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-codzona" id="update-operacionMina-codzona" placeholder="seleccióne Zona...">
                                        </div>
                                        <datalist id="update-options-codzona">
                                            <option value="No se obtuvo Dato">
                                        </datalist>
                                        <template id="template-opt-cod_zona">
                                            <option id="opt-codzona" value="">
                                        </template>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-codLabor" class="col-md-4 control-label">Centro Costos</label>
                                        <div class="col-md-8">
                                            <input class="form-control"  list="update-options-codLabor" type="text" placeholder="Centro Costos" id="update-operacionMina-codLabor">
                                        </div>
                                        <datalist id="update-options-codLabor">
                                            <option data-value="42">Seleccione codigo Zona</option>
                                        </datalist>
                                        <input type="hidden" name="answer" id="update-operacionMina-codLabor-hidden">                                    
                                        <template id="template-opt-codLabor">
                                            <option id="opt-codLabor" value="">
                                        </template>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Zona" class="form-control" name="" id="update-operacionMina-zona" value="" disabled>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-labor" id="update-operacionMina-labor" placeholder="seleccióne Labor..." disabled>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-nivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" name="" id="update-operacionMina-nivel" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Inicio -->
                        <div class="tab-base">
                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#update-lft-tab-1" aria-expanded="true">Tareas</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#update-lft-tab-2" aria-expanded="false">Instalaciónes</a>
                                </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="update-lft-tab-1" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-2 form-tarea">DNI</div>
                                        <div class="col-md-4 form-tarea">Apellidos Y Nombres</div>
                                        <div class="col-md-3 form-tarea">Cargo</div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Maestro</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="update-options-dni-maestro" id="update-operacionaMina-dni-maestro" placeholder="Ingrese Dni...">
                                                <datalist id="update-options-dni-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-maestro">
                                                    <option id="template-opts-dni-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="update-options-name-maestro" id="update-operacionaMina-name-maestro" placeholder="Ingrese Nombre...">
                                                <datalist id="update-options-name-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-maestro">
                                                    <option id="template-opts-name-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="update-operacionaMina-cargo-maestro" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Ayudante</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="update-options-dni-ayudante" id="update-operacionaMina-dni-ayudante" placeholder="Ingrese Dni...">
                                                <datalist id="update-options-dni-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-ayudante">
                                                    <option id="template-opts-dni-ayudante" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="update-options-name-ayudante" id="update-operacionaMina-name-ayudante" placeholder="Ingrese Nombre...">
                                                <datalist id="update-options-name-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-ayudante">
                                                    <option id="template-opts-name-ayudante" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="update-operacionaMina-cargo-ayudante" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">3er Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="update-options-dni-tercer-hombre" id="update-operacionaMina-dni-tercer-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="update-options-dni-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-tercer-hombre">
                                                    <option id="template-opts-dni-tercer-hombre" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="update-options-name-tercer-hombre" id="update-operacionaMina-name-tercer-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="update-options-name-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-tercer-hombre">
                                                    <option id="template-opts-name-tercer-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="update-operacionaMina-cargo-tercer-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">4to Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="update-options-dni-cuarto-hombre" id="update-operacionaMina-dni-cuarto-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="update-options-dni-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-cuarto-hombre">
                                                    <option id="template-opts-dni-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="update-options-name-cuarto-hombre" id="update-operacionaMina-name-cuarto-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="update-options-name-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-cuarto-hombre">
                                                    <option id="template-opts-name-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="update-operacionaMina-cargo-cuarto-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <template id="template-">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">x Hombre</label>
                                            <div class="col-md-2">
                                                <!-- Default choosen -->
                                                <!--===================================================-->
                                                <select class="form-control chosenCodZona" data-placeholder="Elija una opcion" id="" tabindex="2">
                                                    <option value=""></option>
                                                </select>
                                                <template id="">
                                                    <option id="" value="">A</option>
                                                </template>
                                                <!--===================================================-->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Default choosen -->
                                                <!--===================================================-->
                                                <select class="form-control chosenCodZona" data-placeholder="Elija una opcion" id="" tabindex="2">
                                                    <option value=""></option>
                                                </select>
                                                <template id="">
                                                    <option id="" value="">A</option>
                                                </template>
                                                <!--===================================================-->
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="" value="0" disabled>
                                            </div>                                                            
                                        </div>
                                    </template>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <div class="col-md-3">
                                                <button id="btn-increase" class="btn btn-info btn-circle"><i class="ion-plus icon-lg"></i></button>
                                                <button id="btn-decline" class="btn btn-danger btn-circle"><i class="ion-minus icon-lg"></i></button>
                                            </div>
                                            <div class="col-md-2">
                                                
                                            </div>
                                            <div class="col-md-4">
                                                
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label class="col-md-3 form-tarea control-label">Insistencia</label>
                                            <div class="col-md-6">
                                                <div class="col-md-3">
                                                    <label for="update-operacionMina-l" class="control-label">L</label>
					                                <input type="text" placeholder="L" class="form-control" id="update-operacionMina-l">
                                                </div>
                                                <div class="col-md-3">                                                    
                                                    <label for="update-operacionMina-lpv" class="control-label">Lpv</label>
					                                <input type="text" placeholder="Lpv" class="form-control" id="update-operacionMina-lpv">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="update-operacionMina-stto" class="control-label">Stto</label>
                                                    <input type="text" placeholder="Stto" class="form-control" id="update-operacionMina-stto">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="update-operacionMina-Serv" class="control-label">Serv</label>
                                                    <input type="text" placeholder="Serv" class="form-control" id="update-operacionMina-Serv">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="update-operacionMina-comentario" class="col-md-4 control-label">Comentario</label>
                                                    <div class="col-md-8">
                                                    <textarea placeholder="Comentario" rows="13" class="form-control" id="update-operacionMina-comentario" style="width: 300px; height: 50px;"></textarea>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="update-lft-tab-2" class="tab-pane fade">
                                    <div class="row">
                                        <div id="myTabDiv" class="table-responsive-lg col-md-6">
                                            <!-- Table -->
                                            <table name="mytab" id="mytab1" class="table table-md table-hover table-instalaciones">
                                                <thead>
                                                    <tr class="ui-widget-header ">
                                                        <th class="indice" scope="col">#</th>
                                                        <th scope="col" data-sort-initial="true" data-toggle="true">Nombre</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Medida</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="instalacion-body">
                                                </tbody>
                                            </table>
                                            <template id="template-td-instalaciones">
                                                <tr>
                                                    <th id="indice" class="indice" scope="row"></th>
                                                    <td id="template-tds-name-instalaciones">val 22</td>
                                                    <td id="template-tds-cantidad-instalaciones">val 23</td>
                                                    <td id="template-tds-unidad-instalaciones">val 23</td>
                                                    <td>
                                                        <button  class="borrar btn btn-danger btn-xs btn-delete" value="Delete">
                                                            <i class="demo-pli-cross"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </template>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="bord-btm pad-ver text-main text-bold">Instalaciónes</p>
                                            <div class="form-group">
                                                <label for="nombre-instalaciones-table" class="col-md-2 control-label">Nombre</label>
                                                <div class="col-md-6">
                                                    <input class="form-control" list="nombre-instalaciones-options" id="nombre-instalaciones-table" placeholder="Seleccion opcion..">
                                                </div>
                                                <datalist id="nombre-instalaciones-options">
                                                    <option value="Aun no carga">
                                                </datalist>
                                                <template id="template-opts-name-instalaciones">
                                                    <option id="template-opt-name-instalaciones" value="">
                                                </template>
                                                <label for="cantidad-instalaciones-table" class="col-md-1 control-label">Cantidad</label>
                                                <div class="col-md-3">
                                                    <input class="form-control" id="cantidad-instalaciones-table" placeholder="Ingrese Cantidad...">
                                                </div>
                                            </div>
                                            <button id="update-option-table" type="button" class="btn btn-primary">Agregar</button>
                                            <!-- Fin Table 
                                            <button type="button" class="btn btn-primary btn-get-all">Obtener Todo</button>-->
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin -->
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="bord-btm pad-ver text-main text-bold">Avance Actual</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-tipo-avance" class="col-md-4 control-label">Tipo de Avance</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-tipo-avance" id="update-operacionMina-tipo-avance" placeholder="Eliga opción...">
                                            <datalist id="update-options-tipo-avance">
                                                <option value="Avance">Avance</option>
                                                <option value="Realce">Realce</option>
                                                <option value="Recarga">Recarga</option>
                                                <option value="Desquinche">Desquinche</option>
                                                <option value="Breasting">Breasting</option>
                                                <option value="Relleno">Relleno</option>
                                            </datalist>
                                            <template id="template-opts-update-tipo-avance">
                                                <option id="template-opt-update-tipo-avance" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Avance Mt. / Mt.3</label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt." class="form-control" name="digitador" id="update-operacionMina-mt" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt.3" class="form-control" name="digitador" id="update-operacionMina-mt3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-int-disparo" class="col-md-4 control-label">Int. Disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-int-disparo" id="update-operacionMina-int-disparo" placeholder="Eliga opción...">
                                            <datalist id="update-options-int-disparo">
                                                <option value="Normal">Normal</option>
                                                <option value="Plasteo">Plasteo</option>
                                            </datalist>
                                            <template id="template-opts-update-int-disparo">
                                                <option id="template-opt-update-int-disparo" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="update-operacionMina-resuelto" class="col-md-4 control-label">Resuelto de disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="update-options-resuelto" id="update-operacionMina-resuelto" placeholder="Eliga opción...">
                                            <datalist id="update-options-resuelto">
                                                <option value="Normal">Normal</option>
                                                <option value="T. soplado">T. soplado</option>
                                                <option value="T. cortado">T. cortado</option>
                                                <option value="Anillado">Anillado</option>
                                            </datalist>
                                            <template id="template-opts-update-resuelto">
                                                <option id="template-opt-update-resuelto" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Equipos de Limpieza (Horas)</p>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            -
                                        </div>
                                        <label for="" class="col-md-2 control-label">Manual</label>
                                    </div>                                 
                                    <div class="col-md-2">
					                    <label class="control-label">Horas Trabajadas</label>
                                        <!-- <label class="control-label">Carros Extraídos</label> -->
					                    <input type="text" placeholder="cantidad" class="form-control" id="update-operacionMina-Manual">
                                    </div>
                                    <label for="" class="col-md-2 control-label"></label>
                                    <label for="update-operacionMina-Manual" class="col-md-2 control-label">Carros Extraídos</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update-operacionMina-pala" class="col-md-2 control-label">Pala</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="update-options-pala" id="update-operacionMina-pala" placeholder="Eliga opción...">
                                        <datalist id="update-options-pala">
                                            <option value="PN_01">PN_01</option>
                                            <option value="PN_02">PN_02</option>
                                            <option value="PN_03">PN_03</option>
                                            <option value="PN_04">PN_04</option>
                                        </datalist>
                                        <template id="template-opts-update-pala">
                                            <option id="template-opt-update-pala" value="">
                                        </template>
                                    </div>
                                    <datalist id="update-options-pala">
                                        <option value="">
                                        <option value="">
                                        <option value="">
                                    </datalist>                                   
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="update-operMina-cantidadPala">
                                    </div>
                                    <label for="update-operMina-mineral" class="col-md-2 control-label">Mineral</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Mineral" class="form-control" id="update-operMina-mineral">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="update-operacionMina-winche" class="col-md-2 control-label">Winche</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="update-options-winche" id="update-operacionMina-winche" placeholder="Eliga opción...">
                                        <datalist id="update-options-winche">
                                            <option value="Wch_Izj_02">Wch_Izj_02</option>
                                            <option value="Wch_Izj_04">Wch_Izj_04</option>
                                            <option value="Wch_Izj_05">Wch_Izj_05</option>
                                            <option value="Wch_Izj_06">Wch_Izj_06</option>
                                            <option value="Wch_Izj_07">Wch_Izj_07</option>
                                            <option value="Wch_Izj_08">Wch_Izj_08</option>
                                            <option value="Wch_Izj_09">Wch_Izj_09</option>
                                            <option value="Wch_Izj_10">Wch_Izj_10</option>
                                            <option value="Wch_Artr_01">Wch_Artr_01</option>
                                            <option value="Wch_Artr_02">Wch_Artr_02</option>
                                            <option value="Wch_Artr_03">Wch_Artr_03</option>
                                            <option value="Wch_Artr_04">Wch_Artr_04</option>
                                            <option value="Wch_Artr_05">Wch_Artr_05</option>
                                            <option value="Wch_Artr_06">Wch_Artr_06</option>
                                            <option value="Wch_Neu_02">Wch_Neu_02</option>
                                            <option value="Wch_Neu_03">Wch_Neu_03</option>
                                        </datalist>
                                        <template id="template-opts-update-winche">
                                            <option id="template-opt-update-winche" value="">
                                        </template>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="update-operacionMina-cantidadWinche">
                                    </div>
                                    <label for="update-operacionMina-Desmon" class="col-md-2 control-label">Desmon</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Desmon" class="form-control" id="update-operacionMina-Desmon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button id="mbtn-new" class="btn btn-primary">Nuevo</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cerrar</button>
                    <button id="mbtn-update" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
';
?>