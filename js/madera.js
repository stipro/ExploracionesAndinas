// Declaración de Botones
const mbtnInsert_madera = document.getElementById('mbtn-insert');
// Declaracion de Variables
const iptInsert_madera_tipo = document.getElementById('insert-ipt-madera-tipo');
const iptInsert_madera_dimension = document.getElementById('insert-ipt-madera-dimension');
const iptInsert_madera_codigo = document.getElementById('insert-ipt-madera-codigo');

document.addEventListener('DOMContentLoaded', e => {
    table_madera = $('#table-madera').DataTable({
        // Declaramos columnas
        columns: [
            {
                data: "id_madera",
            },
            {
                data: "madera_tipo",
            },
            {
                data: "madera_codigo",
            },
            {
                data: "madera_dimension",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tableMaster-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tableMaster-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ],
    });
    mainEvents_madera();
});

const mainEvents_madera = () => {
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "table-master",
    }
    // Enviamos formulario
    fetchData_madera(form_request1);
}

// Hacemos la Peticion
const fetchData_madera = async (request) => {
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
    paintTable_madera(rptSQL);
}

// Se pinta la Tabla Principal
const paintTable_madera = async (rptSql) => {
    // Limpia tabla
    table_madera.clear();
    // Agregada datos a Tabla
    table_madera.rows.add(rptSql).draw();
}

/** Evento Boton */
mbtnInsert_madera.addEventListener("click", (e) => {
    mainEvents_madera();
    let array_noti_error = [];

    let val_tipo = iptInsert_madera_tipo.value;
    val_tipo ? val_tipo = val_tipo : array_noti_error.push("TIPO");
    let val_dimension = iptInsert_madera_dimension.value;
    val_dimension ? val_dimension = val_dimension : array_noti_error.push("DIMENSION");
    let val_codigo = iptInsert_madera_codigo.value;
    val_codigo ? val_codigo = val_codigo : array_noti_error.push("CODIGO");
    var listInsert = {
        "item1": val_tipo,
        "item2": val_dimension,
        "item3": val_codigo,
    };
    var form_insert = {
        "accion": "insert",
        "form": listInsert
    }
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
        requestInsert_madera(form_insert);
    }
});

// Se envia Formulario // 
const requestInsert_madera = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerMadera.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    afterRequestInsert_madera(result);
}
const afterRequestInsert_madera = (data) => {
    rptSql = data['sql'];
    if(rptSql['estado'] == 1){
        $.niftyNoty({
            type: 'success',
            container: '#alert-form-insert',
            html: '<strong>¡Bien hecho!</strong> ' + rptSql['mensaje'],
            focus: false,
            timer: 2000
        });
        resetFormulario()
    }else{
        console.log('nell');
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>!Error!</strong> ' + rptSql['messageUser'],
            focus: false,
            timer: 2000
        });
    }
};

// Alerta
const alerts = data => {
    console.log(data);
    /* let list = data['list'];
    console.log(list); */
    let notyFormt = '<strong>' + data.text + '</strong> <h4 class="alert-title">' + data.text + '</h4>\
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

const resetFormulario = () => {
    iptInsert_madera_tipo.value = '';
    iptInsert_madera_dimension.value = '';
    iptInsert_madera_codigo.value = '';
}
