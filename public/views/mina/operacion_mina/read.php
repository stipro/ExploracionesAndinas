<?php
/* Read Bootstrap Modal */
/* =================================================== */
$template_read_operacionMina = '
<div class="modal fade" id="operacionMina-lg-modal-read" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin: 1rem;">
            <div class="modal-content">
                <!--Modal header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                    <h4 class="modal-title">[ VER ] Operación Mina</h4>
                </div>
                <!--Modal body-->
                <div class="modal-body">
                    <div id="alert-form-read">
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="bord-btm pad-ver text-main text-bold">Datos</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="read-operacionMina-registro" class="col-md-4 control-label">Fecha</label>
                                        <div class="col-md-8">                                                    
                                            <input type="date" placeholder="Dia" class="form-control" id="read-operacionMina-registro"  value="" disabled> <!--min="2021-12-12" max="2021-12-13"-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="read-operacionaMina-turno" class="col-md-4 control-label">Turno</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-turno" id="read-operacionaMina-turno" placeholder="Turno" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="read-operacionMina-guardia" class="col-md-4 control-label">Guardia</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-guardia" id="read-operacionMina-guardia" placeholder="Guardia" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="read-operacionMina-nvale" class="col-md-4 control-label">N° Vale</label>
                                        <div class="col-md-8">                                                    
                                            <input type="texto" placeholder="n° vale" class="form-control" id="read-operacionMina-nvale" placeholder="N° Vale" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Actividad</label>
                                        <div class="col-md-8">
                                            <!-- Radio Buttons -->
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="1 Perforacion" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo1" disabled>
                                                <label for="opcion-tipo_disparo1">1 Perforación</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="2 Voladura" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo2" disabled>
                                                <label for="opcion-tipo_disparo2">2 Voladura</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="3 Limpieza" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo3" disabled>
                                                <label for="opcion-tipo_disparo3">3 Limpieza</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="4 Sostenimiento" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo4" disabled>
                                                <label for="opcion-tipo_disparo4">4 Sostenimiento</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="5 Servicio" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo5" disabled>
                                                <label for="opcion-tipo_disparo4">5 Servicios</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="6 Acarreo" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo6" disabled>
                                                <label for="opcion-tipo_disparo4">6 Acarreo</label>
                                            </div>
                                            <div class="radio">
                                                <input class="magic-radio" type="radio" value="7 Relleno" name="read-form-radio-tipo_disparo" id="opcion-tipo_disparo7" disabled>
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
                                        <label for="read-operacionMina-codzona" class="col-md-4 control-label">cod. Zona</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-codzona" id="read-operacionMina-codzona" placeholder="Zona" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="read-operacionMina-codLabor" class="col-md-4 control-label">Centro Costos</label>
                                        <div class="col-md-8">
                                            <input class="form-control"  list="read-options-codLabor" type="text" placeholder="Centro Costos" id="read-operacionMina-codLabor" disabled>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="read-operacionMina-zona" class="col-md-4 control-label">Zona</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Zona" class="form-control" name="" id="read-operacionMina-zona" value="" disabled>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Labor</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-labor" id="read-operacionMina-labor" placeholder="Labor" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="read-operacionMina-nivel" class="col-md-4 control-label">Nivel</label>
                                        <div class="col-md-8">
                                            <input type="text" placeholder="Nivel" class="form-control" name="" id="read-operacionMina-nivel" value="" disabled>
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
                                    <a data-toggle="tab" href="#read-lft-tab-1" aria-expanded="true">Tareas</a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#read-lft-tab-2" aria-expanded="false">Instalaciónes</a>
                                </li>
                            </ul>
                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="read-lft-tab-1" class="tab-pane fade active in">
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
                                                <input class="form-control" list="read-options-dni-maestro" id="read-operacionaMina-dni-maestro" placeholder="DNI">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="read-options-name-maestro" id="read-operacionaMina-name-maestro" placeholder="Nombres">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" id="read-operacionaMina-cargo-maestro" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">Ayudante</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="read-options-dni-ayudante" id="read-operacionaMina-dni-ayudante" placeholder="DNI">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="read-options-name-ayudante" id="read-operacionaMina-name-ayudante" placeholder="Nombres">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="read-operacionaMina-cargo-ayudante" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">3er Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="read-options-dni-tercer-hombre" id="read-operacionaMina-dni-tercer-hombre" placeholder="DNI">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="read-options-name-tercer-hombre" id="read-operacionaMina-name-tercer-hombre" placeholder="Nombres">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="read-operacionaMina-cargo-tercer-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-tarea">
                                            <label for="" class="col-md-3 form-tarea control-label">4to Hombre</label>
                                            <div class="col-md-2">
                                                <input class="form-control" list="read-options-dni-cuarto-hombre" id="read-operacionaMina-dni-cuarto-hombre" placeholder="DNI">
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control" list="read-options-name-cuarto-hombre" id="read-operacionaMina-name-cuarto-hombre" placeholder="Nombres">
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="" id="read-operacionaMina-cargo-cuarto-hombre" value="..." disabled>
                                            </div>                                                            
                                        </div>
                                    </div>
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
                                                    <label for="read-operacionMina-l" class="control-label">L</label>
					                                <input type="text" placeholder="L" class="form-control" id="read-operacionMina-l">
                                                </div>
                                                <div class="col-md-3">                                                    
                                                    <label for="read-operacionMina-lpv" class="control-label">Lpv</label>
					                                <input type="text" placeholder="Lpv" class="form-control" id="read-operacionMina-lpv">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="read-operacionMina-stto" class="control-label">Stto</label>
                                                    <input type="text" placeholder="Stto" class="form-control" id="read-operacionMina-stto">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="read-operacionMina-Serv" class="control-label">Serv</label>
                                                    <input type="text" placeholder="Serv" class="form-control" id="read-operacionMina-Serv">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="read-operacionMina-comentario" class="col-md-4 control-label">Comentario</label>
                                                    <div class="col-md-8">
                                                    <textarea placeholder="Comentario" rows="13" class="form-control" id="read-operacionMina-comentario" style="width: 300px; height: 50px;"></textarea>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>                                                            
                                        </div>
                                    </div>
                                </div>
                                <div id="read-lft-tab-2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="table-responsive-lg col-md-12">
                                            <!-- Table -->
                                            <table name="read-mtbl-operInstalaciones" id="read-mtbl-operInstalaciones" class="table table-md table-hover table-instalaciones">
                                                <thead>
                                                    <tr class="ui-widget-header ">
                                                        <th class="indice" scope="col">#</th>
                                                        <th scope="col" data-sort-initial="true" data-toggle="true">Nombre</th>
                                                        <th scope="col">Cantidad</th>
                                                        <th scope="col">Medida</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="instalacion-body">
                                                </tbody>
                                            </table>
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
                                        <label for="read-operacionMina-tipo-avance" class="col-md-4 control-label">Tipo de Avance</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-tipo-avance" id="read-operacionMina-tipo-avance" placeholder="Tipo de Avance">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Avance Mt. / Mt.3</label>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt." class="form-control" name="digitador" id="read-operacionMina-mt" value="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" placeholder="Mt.3" class="form-control" name="digitador" id="read-operacionMina-mt3" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="read-operacionMina-int-disparo" class="col-md-4 control-label">Int. Disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-int-disparo" id="read-operacionMina-int-disparo" placeholder="Int. Disparo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="read-operacionMina-resuelto" class="col-md-4 control-label">Resuelto de disparo</label>
                                        <div class="col-md-8">
                                            <input class="form-control" list="read-options-resuelto" id="read-operacionMina-resuelto" placeholder="Resuelto de disparo">
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
					                    <input type="text" placeholder="cantidad" class="form-control" id="read-operacionMina-Manual">
                                    </div>
                                    <label for="" class="col-md-2 control-label"></label>
                                    <label for="read-operacionMina-Manual" class="col-md-2 control-label">Carros Extraídos</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="read-operacionMina-pala" class="col-md-2 control-label">Pala</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="read-options-pala" id="read-operacionMina-pala" placeholder="Pala">
                                    </div>
                                    <datalist id="read-options-pala">
                                        <option value="">
                                        <option value="">
                                        <option value="">
                                    </datalist>                                   
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="read-operMina-cantidadPala">
                                    </div>
                                    <label for="read-operMina-mineral" class="col-md-2 control-label">Mineral</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Mineral" class="form-control" id="read-operMina-mineral">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="read-operacionMina-winche" class="col-md-2 control-label">Winche</label>
                                    <div class="col-md-4">
                                        <input class="form-control" list="read-options-winche" id="read-operacionMina-winche" placeholder="Winche">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="cantidad" class="form-control" id="read-operacionMina-cantidadWinche">
                                    </div>
                                    <label for="read-operacionMina-Desmon" class="col-md-2 control-label">Desmon</label>
                                    <div class="col-md-2">
                                        <input type="text" placeholder="Desmon" class="form-control" id="read-operacionMina-Desmon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal footer-->
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button" id="mbtn-read-operacionMina-close">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
';
?>