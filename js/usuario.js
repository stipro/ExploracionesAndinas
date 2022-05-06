// Declaramos BOTONES GENERALES
//* Botones Princiapl */
const btn_new_usuario = document.getElementById("btn-crearUsuario");

//* Botones Modal */
const mbtn_new_usuario = document.getElementById("mbtn-new-usuario");
const mbtn_search_usuario = document.getElementById("mbtn-search-usuario");
const mbtn_close_usuario = document.getElementById("mbtn-close-usuario");
const mbtn_insert_usuario = document.getElementById("mbtn-insert-usuario");

const iptInsert_usuario_colaboradorNombre = document.getElementById("ipt-insert-nombreColaborador-usuario");
const iptInsert_usuario_colaboradorDni = document.getElementById("ipt-insert-dniColaborador-usuario");
const iptInsert_usuario_nombre = document.getElementById("ipt-insert-nombre-usuario");
const iptInsert_usuario_clave = document.getElementById("ipt-insert-clave-usuario");
const iptInsert_usuario_correo = document.getElementById("ipt-insert-correo-usuario");
const iptInsert_usuario_estado = document.getElementById("ipt-insert-estado-usuario")
const iptInsert_usuario_tipo = document.getElementById("ipt-insert-tipo-usuario")

const dlt_usuario_colaboradorNombre = document.getElementById("insert-dtl-usuario-colaboradorNombre")
const dlt_usuario_colaboradorDni = document.getElementById("insert-dtl-usuario-colaboradorDni")

btn_new_usuario.addEventListener("click", () => {
    let form_request = {
        "accion": "getSelec_dni_fullname"
    }
    fetchData_dtl_colaborador(form_request);
});

const fetchData_dtl_colaborador = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintarDtl_Colaborador(data);
}

const pintarDtl_Colaborador = (rptRequest) => {
    dlt_usuario_colaboradorNombre.innerHTML = '';
    dlt_usuario_colaboradorDni.innerHTML = '';
    const template_Nombre = document.getElementById("template-opts-nombreColaborador-usuario").content;
    const fragment_Nombre = document.createDocumentFragment();
    const template_Dni = document.getElementById("template-opts-dniColaborador-usuario").content;
    const fragment_Dni = document.createDocumentFragment();
    rptColaboradores = rptRequest['sql'];
    rptColaboradores.forEach(item => {
        template_Nombre.querySelector('#opt-nombreColaborador-usuario').value = item.fullName;
        template_Nombre.querySelector('#opt-nombreColaborador-usuario').dataset.idColaborador = item.id_colaborador;
        template_Dni.querySelector('#opt-dniColaborador-usuario').value = item.col_dni;
        template_Dni.querySelector('#opt-dniColaborador-usuario').dataset.idColaborador = item.id_colaborador;
        
        const clone_Nombre = template_Nombre.cloneNode(true);
        const clone_Dni = template_Dni.cloneNode(true);
        fragment_Nombre.appendChild(clone_Nombre);
        fragment_Dni.appendChild(clone_Dni);
    });
    dlt_usuario_colaboradorNombre.appendChild(fragment_Nombre);
    dlt_usuario_colaboradorDni.appendChild(fragment_Dni);
};

mbtn_insert_usuario.addEventListener("click", () => {
    let array_noti_error = [];
    let val_colaboradorNombre = iptInsert_usuario_colaboradorNombre.value;
    let val_colaboradorDni = iptInsert_usuario_colaboradorDni.value;
    val_colaboradorDni ? val_colaboradorDni = val_colaboradorDni : array_noti_error.push("COLABORADOR");
    let val_usuarioNombre_colaboradorId;
    try {
        val_usuarioNombre_colaboradorId = document.querySelector("#insert-dtl-usuario-colaboradorDni"  + " option[value='" +  val_colaboradorDni + "']").dataset.idColaborador;
    } catch (error) {
        console.log(error);
        array_noti_error.push("COLABORADOR , ID");
    }
    let val_usuarioNombre = iptInsert_usuario_nombre.value;
    val_usuarioNombre ? val_usuarioNombre = val_usuarioNombre : array_noti_error.push("NOMBRE DE USUARIO");
    let val_usuarioClave = iptInsert_usuario_clave.value;
    val_usuarioClave ? val_usuarioClave = val_usuarioClave : array_noti_error.push("CLAVE");
    let val_usuarioCorreo = iptInsert_usuario_correo.value;
    val_usuarioCorreo ? val_usuarioCorreo = val_usuarioCorreo : array_noti_error.push("CORREO");

    
    let val_usuarioEstado = '';
    if (iptInsert_usuario_estado.checked) {
        val_usuarioEstado = true;
    } else {
        val_usuarioEstado = false;
    }
    var val_tipo = iptInsert_usuario_tipo.options[iptInsert_usuario_tipo.selectedIndex].text;
    if(array_noti_error.length == 1){
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-insert',
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
        if (validateEmail(val_usuarioCorreo)) {
            let listInsert = {
                "colaboradorNombre": val_colaboradorNombre,
                "colaboradorId": val_usuarioNombre_colaboradorId,
                "usuario": val_usuarioNombre,
                "clave": val_usuarioClave,
                "tipo": val_tipo,
                "correo": val_usuarioCorreo,
                "estado": val_usuarioEstado,
            }
            let form_insert = {
                "accion": "insert",
                "form": listInsert
            }
            requestInsert(form_insert);
            console.log(form_insert);
        } else {
            $.niftyNoty({
                type: 'danger',
                container: '#alerts-form-insert',
                html: '<strong>!Error!</strong> Correo No es válido :(',
                focus: false,
                timer: 2000
            });
        }
    }
});

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerUsuario.php", {
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

const validateEmail = (email) => {
    return email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
};

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
        container: '#alerts-form-insert',
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}



/* const btnBuscar;
const iptColaborador; */
iptInsert_usuario_colaboradorNombre.addEventListener("input", (e) => {
    let val_colaboradorName = iptInsert_usuario_colaboradorNombre.value;
    if (val_colaboradorName) {
        try {
            let val_id = document.querySelector("#insert-dtl-usuario-colaboradorNombre"  + " option[value='" +  (val_colaboradorName) + "']").dataset.idColaborador;
            let form_request = {
                "accion": "getDni_colaboradorNombre",
                "where": val_id
            }
            fetchData_dni_colaboradorNombre(form_request);
        }catch (error) {}
    }else{
        iptInsert_usuario_colaboradorDni.value = '';
    }
});

const fetchData_dni_colaboradorNombre = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    let rptSql = data['sql'];
    pintarDtl_colaboradorDni(rptSql);
}

const pintarDtl_colaboradorDni = (rptSql) => {
    iptInsert_usuario_colaboradorDni.value = rptSql[0].col_dni;
}

iptInsert_usuario_colaboradorDni.addEventListener("input", (e) => {
    let val_colaboradorDni = iptInsert_usuario_colaboradorDni.value;
    if (val_colaboradorDni) {
        try {
            let val_id = document.querySelector("#insert-dtl-usuario-colaboradorDni"  + " option[value='" +  (val_colaboradorDni) + "']").dataset.idColaborador;
            let form_request = {
                "accion": "getNombre_colaboradorDni",
                "where": val_id
            }
            fetchData_nombre_colaboradorDni(form_request);
        }   catch (error) {}
    }else{
        iptInsert_usuario_colaboradorNombre.value = '';
    }
});

const fetchData_nombre_colaboradorDni = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    let rptSql = data['sql'];
    pintarDtl_colaboradorNombre(rptSql);
}

const pintarDtl_colaboradorNombre = (rptSql) => {
    iptInsert_usuario_colaboradorNombre.value = rptSql[0].fullName;
}

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