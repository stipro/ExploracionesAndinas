					            <form class="form-horizontal">
					                <div class="panel-body">
                                        <!-- FORMULARIO -->
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">C. Costo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="C. Costo" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">DNI</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="DNI" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Apellidos y Nombres</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Apellidos y Nombres" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Cargo</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Cargo" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Área</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Área" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label for="demo-is-inputnormal" class="col-sm-3 control-label">Guardia</label>
					                        <div class="col-sm-6">
					                            <input type="text" placeholder="Guardia" class="form-control" id="demo-is-inputnormal">
					                        </div>
					                    </div>
					                </div>
					                <div class="panel-footer text-right">
                                        <button class="btn btn-info">Nuevo</button>
					                    <button class="btn btn-success" type="submit">Ingreso</button>
					                </div>
					            </form>
                                <!-- FIN FORMULARIO -->
                                <!-- TABLA -->
                                <table id="demo-foo-addrow" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                                                <thead>
                                                    <tr>
                                                        <th data-sort-ignore="true" class="min-width"></th>
                                                        <th data-sort-initial="true" data-toggle="true">Código</th>
                                                        <th>Apellidos y Nombres</th>
                                                        <th data-hide="phone, tablet">Cargo</th>
                                                        <th data-hide="phone, tablet">Dia</th>
                                                        <th data-hide="phone, tablet">Actividad</th>
                                                        <th data-hide="phone, tablet">Turno</th>
                                                        <th data-hide="phone, tablet">Ht</th>
                                                        <th data-hide="phone, tablet">Ht Sev_Ad</th>
                                                        <th data-hide="phone, tablet">**Ccostos</th>
                                                        <th data-hide="phone, tablet">Labor</th>
                                                        <th data-hide="phone, tablet">Nivel</th>
                                                        <th data-hide="phone, tablet">He</th>
                                                        <th data-hide="phone, tablet">He Ser Ad</th>
                                                        <th data-hide="phone, tablet">C. Costos He</th>
                                                        <th data-hide="phone, tablet">V.B</th>
                                                        <th data-hide="phone, tablet">Guardia</th>
                                                        <th data-hide="phone, tablet">Cod_Actividad</th>
                                                        <th data-hide="phone, tablet">Área</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody-tareo">
                                                    <template id="template-td-tareo">
                                                    <tr id="registro-tareo">
                                                        <td><button class="demo-delete-row btn btn-danger btn-xs"><i class="demo-pli-cross"></i></button></td>
                                                        <td id="codigo">Isidra</td>
                                                        <td id="nombreCompleto">Boudreaux</td>
                                                        <td id="cargo">Traffic Court Referee</td>
                                                        <td id="dia">22 Jun 1972</td>
                                                        <td id="actividad">22 Jun 1972</td>
                                                        <td id="turno">Isidra</td>
                                                        <td id="ht">Boudreaux</td>
                                                        <td id="htSev_ad">Isidra</td>
                                                        <td id="costos">Boudreaux</td>
                                                        <td id="labor">Traffic Court Referee</td>
                                                        <td id="nivel">22 Jun 1972</td>
                                                        <td id="hE">22 Jun 1972</td>
                                                        <td id="heSerAd">Isidra</td>
                                                        <td id="cCostosHe">Boudreaux</td>
                                                        <td id="VB">Traffic Court Referee</td>
                                                        <td id="guardia">22 Jun 1972</td>
                                                        <td id="codActividad">22 Jun 1972</td>
                                                        <td id="Area"><span class="label label-table label-success">Active</span></td>
                                                    </tr>
                                                    </template>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="text-right">
                                                                <ul class="pagination"></ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>