const mbtn_create_consumoMadera_diario = document.getElementById('mbtn-insert');
const mbtn_agregarDetalle = document.getElementById('mbtn-agregarDetalle');
const slt_consumoMadera_turno = document.getElementById('insert-slt-consumoMadera-turno');

// Jefe de Guardia
const iptAdd_jefeGuardia = document.getElementById('insert-ipt-consumoMadera-jefeGuardia');
const dtl_consumoMadera_jefeGuardia = document.getElementById('insert-dtl-consumoMadera-jefeGuardia');
const tpe_consumoMadera_jefeGuardia = document.getElementById('template-consumoMadera-jefeGuardia').content;

const ipt_consumoMader_fecha = document.getElementById('insert-ipt-consumoMadera-fecha');


//Centro de Costos
const iptAdd_cCostos = document.getElementById('insert-ipt-consumoMadera-centroCostos');
const dtl_consumoMadera_cCostos = document.getElementById('insert-dtl-consumoMadera-centroCostos');
const tpe_consumoMadera_cCostos = document.getElementById('template-consumoMadera-centroCostos').content;

const ipt_consumoMadera_labor_nombre = document.getElementById('insert-ipt-consumoMadera-labor');


const iptAdd_madera = document.getElementById('insert-ipt-consumoMadera-madera');
const dtl_consumoMadera_madera = document.getElementById('insert-dtl-consumoMadera-madera');
const tpe_consumoMadera_madera = document.getElementById('template-consumoMadera-madera').content

const ipt_consumoMadera_cantidad = document.getElementById('insert-ipt-consumoMadera-cantidad');

var table_consumoMadera_detalle
const fragment = document.createDocumentFragment();
var counter = 1;
document.addEventListener('DOMContentLoaded', e => {
    mainEvents_consumoMadera();
    table_consumoMadera_detalle = $('#list-insert-consumoMadera-detalle').DataTable
    ({
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                
            }
        ]
    });
});

/** Eventos */
mbtn_create_consumoMadera_diario.addEventListener("click", (e) => {
    let listDetalles = [];
    let array_noti_error = [];
    var val_turno = slt_consumoMadera_turno.options[slt_consumoMadera_turno.selectedIndex].value;
    val_jefeGuardia = iptAdd_jefeGuardia.value;
    val_jefeGuardia ? val_jefeGuardia = val_jefeGuardia : array_noti_error.push("JEFE DE GUARDIA");
    val_fecha = ipt_consumoMader_fecha.value;
    val_fecha ? val_fecha = val_fecha : array_noti_error.push("FECHA");
    var form_detalle = table_consumoMadera_detalle.rows().data();
    form_detalle.length > 0 ? form_detalle = form_detalle : array_noti_error.push("DETALLE");
    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>!Error!</strong> ' + array_noti_error[0],
            focus: false,
            timer: 2000
        });
    }
    else if(array_noti_error.length > 1){
        var paramentNoti = {
            'tipo': 'danger',
            'text': '!Error!',
            'descripcion': 'Falta :',
            'list': array_noti_error
        }
        alerts(paramentNoti);
    }
    else{
        var f = form_detalle;
        for (var i = 0; f.length > i; i++) {
            var n = f[i].length;
            listDetalles.push({
                id_labor: f[i][1],
                ccostos: f[i][2],
                nom_labor: f[i][2],
                nom_zona: f[i][4],
                id_instalacionMina: f[i][5],
                nom_instalacion: f[i][6],
                uni_medida: f[i][7],
                cantidad: f[i][8],
            });
        }
        let listInsert = {
            "item1": val_turno,
            "item2": val_jefeGuardia,
            "item3": val_fecha,
            "detalles": listDetalles
        }
        let form_insert = {
            "accion": "insert",
            "form": listInsert
        }
        recordForm(form_insert);
    }
});
const recordForm = async (listInsert) => {
    const body = new FormData();
    body.append("data", JSON.stringify(listInsert));
    const res = await fetch('./../../../controllers/controllerInstalacionGenerales.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    notificationBackend(rptSql)
}
mbtn_agregarDetalle.addEventListener("click", (e) => {
    let array_noti_error = [];
    
    val_cCostos = iptAdd_cCostos.value;
    val_cCostos ? val_cCostos = val_cCostos : array_noti_error.push("CENTRO DE COSTOS");
    val_laborNombre = ipt_consumoMadera_labor_nombre.value;
    val_cCostos ? val_cCostos = val_cCostos : array_noti_error.push("CENTRO DE COSTOS");
    val_madera = iptAdd_madera.value;
    val_madera ? val_madera = val_madera : array_noti_error.push("MADERA");
    val_cantidad = ipt_consumoMadera_cantidad.value;
    val_cantidad ? val_cantidad = val_cantidad : array_noti_error.push("CANTIDAD");
    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>!Error!</strong> ' + array_noti_error[0],
            focus: false,
            timer: 2000
        });
    }
    else if(array_noti_error.length > 1){
        var paramentNoti = {
            'tipo': 'danger',
            'text': '!Error!',
            'descripcion': 'Falta :',
            'list': array_noti_error
        }
        alerts(paramentNoti);
    }
    else{
        table_consumoMadera_detalle.row.add([
            counter,
            val_cCostos,
            val_laborNombre,
            val_madera,
            val_cantidad,
            '<button class="btn btn-danger removeRow">Eliminar</button>'
        ]).draw(false);
        counter++;
    }
    
});

$('#list-insert-consumoMadera-detalle').on('click', '.removeRow', function() {
    table_consumoMadera_detalle.row($(this).parents('tr')).remove().draw();
});

const mainEvents_consumoMadera = () => {
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "dtl-colaboradores-all",
    }
    // Enviamos formulario
    fetchData_colaboradores(form_request1);
    // Preparamos formulario
    let form_request2 = {
        // Se pone la accion
        "accion": "dtl-ccosto-labor",
    }
    // Enviamos formulario
    fetchData_ccosto_labor(form_request2);
    // Preparamos formulario
    let form_request3 = {
        // Se pone la accion
        "accion": "dtl-madera-all",
    }
    // Enviamos formulario
    fetchData_madera_all(form_request3);   
}

// Hacemos la Peticion
const fetchData_colaboradores = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_jefeGuardia(rptSQL);
}

// Se pinta DataList
const paintDtl_jefeGuardia = data => {
    dtl_consumoMadera_jefeGuardia.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_jefeGuardia.querySelector('option').textContent = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_consumoMadera_jefeGuardia.querySelector('option').value = item.col_apePaterno + ' ' + item.col_apeMaterno + ' ' + item.col_nombres;
        tpe_consumoMadera_jefeGuardia.querySelector('option').dataset.idJefeGuardia = item.id_colaborador;
        const clone = tpe_consumoMadera_jefeGuardia.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_jefeGuardia.appendChild(fragment);
};

// Hacemos la Peticion
const fetchData_ccosto_labor = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerLaborList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_ccostos_Labor(rptSQL);
}

// Se pinta DataList
const paintDtl_ccostos_Labor = data => {
    dtl_consumoMadera_cCostos.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_cCostos.querySelector('option').textContent = item.lab_ccostos;
        tpe_consumoMadera_cCostos.querySelector('option').value = item.lab_ccostos;
        tpe_consumoMadera_cCostos.querySelector('option').dataset.idLabor = item.id_labor;
        const clone = tpe_consumoMadera_cCostos.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_cCostos.appendChild(fragment);
};

// Hacemos la Peticion
const fetchData_madera_all = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerMaderaList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_madera(rptSQL);
}
// Se pinta DataList
const paintDtl_madera = data => {
    dtl_consumoMadera_madera.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_madera.querySelector('option').textContent = item.madera_tipo + ' ' + item.madera_codigo + ' ' + item.madera_dimension;
        tpe_consumoMadera_madera.querySelector('option').value = item.madera_tipo + ' ' + item.madera_codigo + ' ' + item.madera_dimension;
        tpe_consumoMadera_madera.querySelector('option').dataset.idMadera = item.id_madera;
        
        const clone = tpe_consumoMadera_madera.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_madera.appendChild(fragment);
};

iptAdd_cCostos.addEventListener("input", (e) => {
    try {
        let val_cCostos = iptAdd_cCostos.value;
        let val_id = document.querySelector("#insert-dtl-consumoMadera-centroCostos"  + " option[value='" +  (val_cCostos ? val_cCostos = val_cCostos : val_cCostos = 0) + "']").dataset.idLabor;
        if (val_id) {
            
            let selectForm1 = {
                "accion": "getLabor_ccosto",
                "paramentWhere": val_id,
            }
            getDataLabor(selectForm1);
        } else {
            ipt_consumoMadera_labor_nombre.value = '';
        }
    } catch (error) {
        ipt_consumoMadera_labor_nombre.value = '';
        //console.error(error);
        // expected output: ReferenceError: nonExistentFunction is not defined
        // Note - error messages will vary depending on browser
    }
    
});

const getDataLabor = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerLaborList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    pintarAsociadosLabor(rptSql);
}

const pintarAsociadosLabor = (rptSql) => {
    ipt_consumoMadera_labor_nombre.value = rptSql[0].labNombre_nombre;
}

// Alerta
const alerts = data => {
    console.log(data);
    /* let list = data['list'];
    console.log(list); */
    let notyFormt = '<strong>' + data.text + '</strong> <h4 class="alert-title">' + data.descripcion + '</h4>\
    <!--Unordered List-->\
    <!--===================================================-->\
    <ul>';
    data.list.forEach(item => {
        notyFormt += '<li>' + item + '</li>';
    }) 
    notyFormt += '</ul>\
    <!--===================================================-->',
    $.niftyNoty({
        type: data.tipo,
        container: '#alert-form-insert',
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}