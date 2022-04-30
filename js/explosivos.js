const btnInsert_explosivos = document.getElementById('mbtn-insert-explosivo');
const btnNew_explosivos = document.getElementById('mbtn-new');
const btnClose_explosivos = document.getElementById('mbtm-close');


const btnDetalle_explosivos = document.getElementsByClassName('btn-tableMaster-detalle');

const ipt_explosivo_codigo = document.getElementById('insert-ipt-explosivo-codigo');
const ipt_explosivo_nombre = document.getElementById('insert-ipt-explosivo-nombre');
const ipt_explosivo_unidadMedida = document.getElementById('insert-ipt-explosivo-unidadMedida');



function soloLetras(e) {
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function valideKey(evt) {

    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;

    if (code == 8) { // backspace.
        return true;
    } else if (code >= 48 && code <= 57) { // is a number.
        return true;
    } else { // other keys.
        return false;
    }
}

// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    // Capturamos en una variable
    tableMaster_explosivos = $('#table-master-explosivos').DataTable({
        // Estado de input visual
        // Busqueda
        "searching": true,
        // Paginación
        "paging":   true,
        // Paginación defecto
        "pageLength": 10,
        // Declaramos columnas
        columns: [
            {
                data: "id_explosivo",
            },
            {
                data: "explosivo_codigo",
            },
            {
                data: "explosivo_descripcion",
            },
            {
                data: "explosivo_unidadMedida",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tableMaster-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tableMaster-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tableMaster-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay registro de ",
            "info": "Mostrando _START_ a _END_ de _TOTAL_",
            "infoEmpty": "Mostrando 0 to 0 of 0 ",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Datos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Busqueda General :",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "print": "Imprimir",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "_": "Mostrar %d filas",
                },
            }
        },
    });
    mainEvents();
});

const mainEvents = () => {
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "table-master",
    }
    // Enviamos formulario
    fetchData(form_request1);
}

// Hacemos la Peticion
const fetchData = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerExplosivoList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable(rptSQL);
}

// Se pinta la Tabla Principal
const paintTable = async (rptSql) => {
    // Limpia tabla
    tableMaster_explosivos.clear();
    // Agregada datos a Tabla
    tableMaster_explosivos.rows.add(rptSql).draw();
}
btnClose_explosivos.addEventListener("click", (e) => {
    mainEvents();
    resetForm();
});

btnNew_explosivos.addEventListener("click", (e) => {
    resetForm();
});

//* DETALLE REGISTRO
$('#table-master-explosivos tbody').on('click', '.btn-tableMaster-detalle', function() {
    const data = tableMaster_explosivos.row($(this).parents('tr')).data();
    let form_request = {
        "accion": "readRow",
        "id": data['id_explosivo']
    }
    /* getRowView(form_request); */
});

//* EDITAR REGISTRO
$('#table-master-explosivos tbody').on('click', '.btn-tableMaster-edit', function() {
    $("#modal-edit").modal("show");
    const data = tableMaster.row($(this).parents('tr')).data();
    let formRequest = {
        "accion": "updateRow",
        "id": data['id_explosivo']
    }
    getRowEdit(formRequest);
});

const getRowEdit = async (formRequest) => {
    try {
        //* DECLARAION DE VARIABLES *//
        var body = new FormData();
        let form_request;
        let res;
        let data;
        let state;

        //* PETICIONES *//
        form_request = {
            "accion": "getDatalistAll_zonaNombre",
        }
        //* Primera petición DATALIST ZONA
        body.append('data', JSON.stringify(form_request));
        res = await fetch('./../../../controllers/controllerLaborList.php', {
            method: "POST",
            body
        });
        body.delete('data');
        data = await res.json();
        data = data['sql'];
        state = await paintSelectEdit_laborZona_zonaNombre(data);
        
        //* Segunda Petición DATALIST LABOR
        form_request = {
        "accion": "getDatalistAll_ccosto",
        }
        body.append('data', JSON.stringify(form_request));
        res = await fetch('./../../../controllers/controllerLaborList.php', {
            method: "POST",
            body
        });
        body.delete('data');
        data = await res.json();
        data = data['sql'];
        state = await paintSelectEdit_labor_laborCCosto(data);
        //* Tercera Petición DATALIST PERFORISTA
        form_request = {
        "accion": "getDatalistAll_nombres_perforista",
        }
        body.append('data', JSON.stringify(form_request));
        res = await fetch('./../../../controllers/controllerColaboradorList.php', {
            method: "POST",
            body
        });
        body.delete('data');
        data = await res.json();
        data = data['sql'];
        state = await paintSelectEdit_perforista_colaborador(data);
        //* Cuarta Petición Seleccionar
        body.append('data', JSON.stringify(formRequest));
        res = await fetch('./../../../controllers/controllerValeExplosivoList.php', {
            method: "POST",
            body
        });
        body.delete('data');
        data = await res.json();
        data = data['sql']
        painFrom_edit(data);
        //paintSelectEdit_colaborador_nombres_perforista();
    }
    catch (e) {
        console.error(e);
    } finally {
        console.log('Nosotras hacemos limpieza aqui');
    }
   
}

btnInsert_explosivos.addEventListener("click", (e) => {
    mainEvents();
    let arrayError = [];
    let val_explosivo_codigo = ipt_explosivo_codigo.value;
    val_explosivo_codigo ? val_explosivo_codigo = val_explosivo_codigo : arrayError.push("CODIGO");
    let val_explosivo_nombre = ipt_explosivo_nombre.value;
    val_explosivo_nombre ? val_explosivo_nombre = val_explosivo_nombre : arrayError.push("NOMBRE");
    let val_explosivo_unidadMedida = ipt_explosivo_unidadMedida.value;
    val_explosivo_unidadMedida ? val_explosivo_unidadMedida = val_explosivo_unidadMedida : arrayError.push("UNIDAD MEDIDA");
    if(arrayError.length > 0){
        alerts(arrayError);
    }
    else{
        let listInsert = {
            "item1": val_explosivo_codigo,
            "item2": val_explosivo_nombre,
            "item3": val_explosivo_unidadMedida,
        };
    
        let form_insert = {
            "accion": "insert",
            "form": listInsert
        }
        // Preparando Datos
        requestInsert(form_insert);
    }
});

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerExplosivo.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    afterSendingInsert(result);
}

const afterSendingInsert = (data) => {
    rptSql = data['sql'];
    if(rptSql['estado'] == 1){
        $.niftyNoty({
            type: 'success',
            container: '#alerts-form-insert',
            html: '<strong>¡Bien hecho!</strong> ' + rptSql['mensaje'],
            focus: false,
            timer: 2000
        });
        resetForm();
    }else{
        console.log('nell');
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-insert',
            html: '<strong>!Error!</strong> ' + rptSql['messageUser'],
            focus: false,
            timer: 2000
        });
    }
};

const resetForm = () => {
    ipt_explosivo_codigo.value = '';
    ipt_explosivo_nombre.value = '';
    ipt_explosivo_unidadMedida.value = '';
}

// Alerta
const alerts = data => {    
    let notyFormt = '<strong>!Error!</strong> <h4 class="alert-title">Falta :</h4>\
    <!--Unordered List-->\
    <!--===================================================-->\
    <ul>';
    data.forEach(item => {
        notyFormt += '<li>' + item + '</li>';
    }) 
    notyFormt += '</ul>\
    <!--===================================================-->',
    $.niftyNoty({
        type: 'danger',
        container: '#alerts-form-insert',
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}