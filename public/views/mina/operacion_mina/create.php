<?php
/* Insert Bootstrap Modal */
/* =================================================== */
$template_create_operacionMina = '
<div class="modal fade" id="operacionMina-lg-modal-create" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div id="inserForm" class="modal-dialog" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">[ CREAR ] Operación Mina</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-insert">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="insert-slt-operacionMina_unidadMinera" class="control-label col-sm-4 col-md-4">Unidad Minera</label>
                                        <div class="col-sm-8 col-md-8">
                                            <select id="insert-slt-operacionMina_unidadMinera" class="form-control">
                                                <option>--Ocurrio un Error--</option>
                                            </select> 
                                        </div>
                                        <template id="tpt-unidadMinera">
                                            <option></option>
                                        </template>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionMina-registro" class="control-label col-md-4 ">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="insert-operacionMina-registro"  value="' . $dateServer . '" > <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionaMina-turno" class="control-label col-md-4">Turno</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-dtl-turno" id="insert-operacionaMina-turno" placeholder="Ingrese Turno...">
                                            <datalist id="insert-dtl-turno">
                                                <option>--Ocurrio un Error--</option>
                                            </datalist>
                                        </div>
                                        <template id="insert-tpt-turno">
                                            <option></option>
                                        </template>
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionMina-guardia" class="control-label col-md-4">Guardia</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-dtl-guardia" id="insert-operacionMina-guardia" placeholder="Ingrese Guardia...">
                                            <datalist id="insert-dtl-guardia">
                                                <option value="">Ocurrio un Error</option>
                                            </datalist>
                                        </div>
                                        <template id="insert-tpt-guardia">
                                            <option></option>
                                        </template>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="insert-operacionMina-nvale" class="control-label col-md-4">N° Vale</label>
                                        <div class="col-md-8">                                                    
                                            <input type="texto" placeholder="n° vale" class="form-control" id="insert-operacionMina-nvale">
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
                                                <label for="opcion-tipo_disparo5">5 Servicios</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="6 Acarreo" name="radio-tipo_disparo" id="opcion-tipo_disparo6" >
                                                <label for="opcion-tipo_disparo6">6 Acarreo</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="7 Relleno" name="radio-tipo_disparo" id="opcion-tipo_disparo7" >
                                                <label for="opcion-tipo_disparo7">7 Relleno</label>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <p class="bord-btm pad-ver text-main text-bold">Centro de Costos</p>
                            <div class="row">
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-codzona" class="col-md-4 control-label">cod. Zona</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-codzona" id="insert-operacionMina-codzona" placeholder="seleccióne Zona...">
                                        </div>
                                        <datalist id="insert-options-codzona">
                                            <option value="No se obtuvo Dato">
                                        </datalist>
                                        <template id="template-opt-cod_zona">
                                            <option id="opt-codzona" value="">
                                        </template>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-codLabor" class="col-md-4 control-label">Centro Costos</label>
                                        <div class="col-md-8">
                                            <input class="form-control"  list="insert-options-codLabor" type="text" placeholder="Centro Costos" id="insert-operacionMina-codLabor">
                                        </div>
                                        <datalist id="insert-options-codLabor">
                                            <option data-value="42">Seleccione codigo Zona</option>
                                        </datalist>
                                        <input type="hidden" name="answer" id="insert-operacionMina-codLabor-hidden">                                    
                                        <template id="template-opt-codLabor">
                                            <option id="opt-codLabor" value="">
                                        </template>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Zona" class="form-control" name="" id="insert-operacionMina-zona" value="" disabled>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-labor" id="insert-operacionMina-labor" placeholder="seleccióne Labor..." disabled>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-nivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" name="" id="insert-operacionMina-nivel" value="" disabled>
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
                                    <a data-toggle="tab" href="#demo-lft-tab-1" aria-expanded="true">Tareas</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#demo-lft-tab-2" aria-expanded="false">Instalaciónes</a>
                                </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
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
                                                <input class="form-control" list="insert-options-dni-maestro" id="insert-operacionaMina-dni-maestro" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-maestro">
                                                    <option id="template-opts-dni-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-maestro" id="insert-operacionaMina-name-maestro" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-maestro">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-maestro">
                                                    <option id="template-opts-name-maestro" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="insert-operacionaMina-cargo-maestro" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Ayudante</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-ayudante" id="insert-operacionaMina-dni-ayudante" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-ayudante">
                                                    <option id="template-opts-dni-ayudante" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-ayudante" id="insert-operacionaMina-name-ayudante" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-ayudante">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-ayudante">
                                                    <option id="template-opts-name-ayudante" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-ayudante" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">3er Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-tercer-hombre" id="insert-operacionaMina-dni-tercer-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-tercer-hombre">
                                                    <option id="template-opts-dni-tercer-hombre" value="">
                                                </template>
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-tercer-hombre" id="insert-operacionaMina-name-tercer-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-tercer-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-tercer-hombre">
                                                    <option id="template-opts-name-tercer-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-tercer-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">4to Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="insert-options-dni-cuarto-hombre" id="insert-operacionaMina-dni-cuarto-hombre" placeholder="Ingrese Dni...">
                                                <datalist id="insert-options-dni-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-dni-cuarto-hombre">
                                                    <option id="template-opts-dni-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="insert-options-name-cuarto-hombre" id="insert-operacionaMina-name-cuarto-hombre" placeholder="Ingrese Nombre...">
                                                <datalist id="insert-options-name-cuarto-hombre">
                                                    <option value="No se obtuvo Dato">
                                                </datalist>
                                                <template id="template-opt-name-cuarto-hombre">
                                                    <option id="template-opts-name-cuarto-hombre" value="">
                                                </template>
                                            </div>
                                            <div class="col-md-3">
                                            <input class="form-control" type="text" name="" id="insert-operacionaMina-cargo-cuarto-hombre" value="..." disabled>
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
                                                    <label for="insert-operacionMina-l" class="control-label">L</label>
					                                <input type="text" placeholder="L" class="form-control" id="insert-operacionMina-l">
                                                </div>
                                                <div class="col-md-3">                                                    
                                                    <label for="insert-operacionMina-lpv" class="control-label">Lpv</label>
					                                <input type="text" placeholder="Lpv" class="form-control" id="insert-operacionMina-lpv">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="insert-operacionMina-stto" class="control-label">Stto</label>
                                                    <input type="text" placeholder="Stto" class="form-control" id="insert-operacionMina-stto">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="insert-operacionMina-Serv" class="control-label">Serv</label>
                                                    <input type="text" placeholder="Serv" class="form-control" id="insert-operacionMina-Serv">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="insert-operacionMina-comentario" class="col-md-4 control-label">Comentario</label>
                                                    <div class="col-md-8">
                                                    <textarea placeholder="Comentario" rows="13" class="form-control" id="insert-operacionMina-comentario" style="width: 300px; height: 50px;"></textarea>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="demo-lft-tab-2" class="tab-pane fade">
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
                                            <button id="insert-option-table" type="button" class="btn btn-primary">Agregar</button>
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
                                        <label for="insert-operacionMina-tipo-avance" class="col-md-4 control-label">Tipo de Avance</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-tipo-avance" id="insert-operacionMina-tipo-avance" placeholder="Eliga opción...">
                                            <datalist id="insert-options-tipo-avance">
                                                <option value="Avance">Avance</option>
                                                <option value="Realce">Realce</option>
                                                <option value="Recarga">Recarga</option>
                                                <option value="Desquinche">Desquinche</option>
                                                <option value="Breasting">Breasting</option>
                                                <option value="Relleno">Relleno</option>
                                            </datalist>
                                            <template id="template-opts-insert-tipo-avance">
                                                <option id="template-opt-insert-tipo-avance" value="">
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
                                            <input type="text" placeholder="Mt." class="form-control" name="digitador" id="insert-operacionMina-mt" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt.3" class="form-control" name="digitador" id="insert-operacionMina-mt3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-int-disparo" class="col-md-4 control-label">Int. Disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-int-disparo" id="insert-operacionMina-int-disparo" placeholder="Eliga opción...">
                                            <datalist id="insert-options-int-disparo">
                                                <option value="Normal">Normal</option>
                                                <option value="Plasteo">Plasteo</option>
                                            </datalist>
                                            <template id="template-opts-insert-int-disparo">
                                                <option id="template-opt-insert-int-disparo" value="">
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="insert-operacionMina-resuelto" class="col-md-4 control-label">Resuelto de disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="insert-options-resuelto" id="insert-operacionMina-resuelto" placeholder="Eliga opción...">
                                            <datalist id="insert-options-resuelto">
                                                <option value="Normal">Normal</option>
                                                <option value="T. soplado">T. soplado</option>
                                                <option value="T. cortado">T. cortado</option>
                                                <option value="Anillado">Anillado</option>
                                            </datalist>
                                            <template id="template-opts-insert-resuelto">
                                                <option id="template-opt-insert-resuelto" value="">
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
					                    <input type="text" placeholder="cantidad" class="form-control" id="insert-operacionMina-Manual">
                                    </div>
                                    <label for="" class="col-md-2 control-label"></label>
                                    <label for="insert-operacionMina-Manual" class="col-md-2 control-label">Carros Extraídos</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="insert-operacionMina-pala" class="col-md-2 control-label">Pala</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="insert-options-pala" id="insert-operacionMina-pala" placeholder="Eliga opción...">
                                        <datalist id="insert-options-pala">
                                            <option value="PN_01">PN_01</option>
                                            <option value="PN_02">PN_02</option>
                                            <option value="PN_03">PN_03</option>
                                            <option value="PN_04">PN_04</option>
                                        </datalist>
                                        <template id="template-opts-insert-pala">
                                            <option id="template-opt-insert-pala" value="">
                                        </template>
                                    </div>
                                    <datalist id="insert-options-pala">
                                        <option value="">
                                        <option value="">
                                        <option value="">
                                    </datalist>                                   
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="insert-operMina-cantidadPala">
                                    </div>
                                    <label for="insert-operMina-mineral" class="col-md-2 control-label">Mineral</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Mineral" class="form-control" id="insert-operMina-mineral">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="insert-operacionMina-winche" class="col-md-2 control-label">Winche</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="insert-options-winche" id="insert-operacionMina-winche" placeholder="Eliga opción...">
                                        <datalist id="insert-options-winche">
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
                                        <template id="template-opts-insert-winche">
                                            <option id="template-opt-insert-winche" value="">
                                        </template>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="insert-operacionMina-cantidadWinche">
                                    </div>
                                    <label for="insert-operacionMina-Desmon" class="col-md-2 control-label">Desmon</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Desmon" class="form-control" id="insert-operacionMina-Desmon">
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
                    <button id="mbtnCreate-operacionMina-insert" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </div>
    </div>
';
