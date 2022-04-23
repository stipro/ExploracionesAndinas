const ipt_colaboradorApePaterno = document.getElementById('insert-ipt-colaboradorApePaterno');
const ipt_colaboradorApeMaterno = document.getElementById('insert-ipt-colaboradorApeMaterno');
const ipt_colaboradoNombres = document.getElementById('insert-ipt-colaboradorNombres');
const select_colaborador_estadoCivil = document.getElementById('slt-insert-colaboradorEstadoCivil');
const select_colaborador_genero = document.getElementById('slt-insert-colaboradorSexo');
const date_colaborador_fechaNacimiento = document.getElementById('date-insert-colaborador-fechaNacimiento');
const select_colaborador_tipoDoc = document.getElementById('slt-insert-colaboradorTipoDoc');
const ipt_colaborador_dni_api = document.getElementById('insert-ipt-colaboradorDni');

const select_colaborador_unidadMinera = document.getElementById('slt-insert-colaborador-unidadMinera')
const select_colaborador_area = document.getElementById('slt-insert-colaborador-area')
const select_colaborador_cargo = document.getElementById('slt-insert-colaborador-cargo')

const btnInsertar = document.getElementById("mbtn-insert");
const btnAgregar = document.getElementById("btn-Agregar");

const template_colaborador_unidadMinera = document.getElementById('template-insert-colaborador-unidadMinera').content;
const template_colaborador_area = document.getElementById('template-insert-colaborador-area').content;
const template_colaborador_cargo = document.getElementById('template-insert-colaborador-cargo').content;
const fragment = document.createDocumentFragment();

// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    
});

btnAgregar.addEventListener("click", (e) => {
    let form_request1 = {
        "accion": "getSelect_unidadMinera",
    }
     fetchData_unidadMinera(form_request1);
    let form_request2 = {
        "accion": "getSelect_area",
    }
     fetchData_area(form_request2);
});
// Traer Unidad minera
const fetchData_unidadMinera = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const returned = await fetch("./../../../controllers/controllerUnidadMineraList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    pintar_unidadMinera(rptSQL);
}

// Pintar Unidad minera
const pintar_unidadMinera = data => {
    select_colaborador_unidadMinera.innerHTML = '';
    data.forEach(item => {
        template_colaborador_unidadMinera.querySelector('option').dataset.idUnidadMinera = item.id_unidadMinera;
        template_colaborador_unidadMinera.querySelector('option').textContent = item.nombre_unidadMinera;
        template_colaborador_unidadMinera.querySelector('option').value = item.nombre_unidadMinera;
        const clone = template_colaborador_unidadMinera.cloneNode(true);
        fragment.appendChild(clone);
    })
    select_colaborador_unidadMinera.appendChild(fragment);
}

// Traer Areas
const fetchData_area = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const returned = await fetch("./../../../controllers/controllerAreaList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    pintar_area(rptSQL);
}

// Pintar Areas
const pintar_area = data => {
    select_colaborador_area.innerHTML = '';
    template_colaborador_area.querySelector('option').textContent = '-';
    template_colaborador_area.querySelector('option').value = '-';
    const clone = template_colaborador_area.cloneNode(true);
    fragment.appendChild(clone);
    data.forEach(item => {
        template_colaborador_area.querySelector('option').dataset.idArea = item.id_area;
        template_colaborador_area.querySelector('option').textContent = item.area_nombre;
        template_colaborador_area.querySelector('option').value = item.area_nombre;
        const clone = template_colaborador_area.cloneNode(true);
        fragment.appendChild(clone);
    })
    select_colaborador_area.appendChild(fragment);
}

select_colaborador_area.addEventListener('change', function(e){
    let selectedOption = this.options[select_colaborador_area.selectedIndex];
    let val_id = selectedOption.dataset.idArea;
    let form_request1 = {
        "accion": "getSelect_cargo",
        "where": val_id,
    }
    fetchData_cargo(form_request1);
});

// Traer Cargos
const fetchData_cargo = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const returned = await fetch("./../../../controllers/controllerCargoList.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    pintar_cargo(rptSQL);
}

// Pintar Cargos
const pintar_cargo = data => {
    select_colaborador_cargo.innerHTML = '';
    data.forEach(item => {
        template_colaborador_cargo.querySelector('option').dataset.idCargo = item.id_cargo;
        template_colaborador_cargo.querySelector('option').textContent = item.cargo_nombre;
        template_colaborador_cargo.querySelector('option').value = item.cargo_nombre;
        const clone = template_colaborador_cargo.cloneNode(true);
        fragment.appendChild(clone);
    })
    select_colaborador_cargo.appendChild(fragment);
}

btnInsertar.addEventListener("click", (e) => {
    let arrayError = [];
    let val_apePaterno = ipt_colaboradorApePaterno.value;
    val_apePaterno ? val_apePaterno = val_apePaterno : arrayError.push("APELLIDO PATERNO");
    let val_apeMaterno = ipt_colaboradorApeMaterno.value;
    val_apeMaterno = val_apeMaterno ? val_apeMaterno : arrayError.push('APELLIDO MATERNO');
    let val_nombres = ipt_colaboradoNombres.value;
    val_nombres = val_nombres ? val_nombres : arrayError.push('NOMBRES');
    let val_estadoCivil = select_colaborador_estadoCivil.value;
    val_estadoCivil = val_estadoCivil ? val_estadoCivil : arrayError.push('ESTADO CIVIL');
    let val_genero = select_colaborador_genero.value;
    val_genero = val_genero ? val_genero : arrayError.push('GENERO');
    let val_fechaNacimiento = date_colaborador_fechaNacimiento.value;
    val_fechaNacimiento = val_fechaNacimiento ? val_fechaNacimiento : arrayError.push('F. NACIMIENTO');
    let val_tipoDoc = select_colaborador_tipoDoc.value;
    val_tipoDoc = val_tipoDoc ? val_tipoDoc : arrayError.push('TIPO DOCUMENTO');
    let val_dni = ipt_colaborador_dni_api.value;
    val_dni = val_dni ? val_dni : arrayError.push('DNI');
    var val_idCargo = select_colaborador_cargo.options[select_colaborador_cargo .selectedIndex].dataset.idCargo; /* Obtener el valor */
    val_idCargo = val_idCargo>0 ? val_idCargo : arrayError.push('CARGO');
    if(arrayError.length > 0){
        alerts(arrayError);
    }
    if(val_apePaterno && val_apeMaterno && val_nombres && val_estadoCivil && val_genero && val_fechaNacimiento && val_tipoDoc && val_dni && val_idCargo){
        var listInsert = {
            "item1": val_apePaterno,
            "item2": val_apeMaterno,
            "item3": val_nombres,
            "item4": val_estadoCivil,
            "item5": val_genero,
            "item6": val_fechaNacimiento,
            "item7": val_tipoDoc,
            "item8": val_dni,
            "item9": val_idCargo,
        };
    
        var form_insert = {
            "accion": "insert",
            "form": listInsert
        }
        console.log(form_insert);
        // Preparando Datos
        requestInsert(form_insert);
    }

});
// Alerta
const alerts = data => {    
    let notyFormt = '<strong>ERROR!</strong> <h4 class="alert-title">Falta :</h4>\
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
        container: '#alert-form-insert',
        html: notyFormt,
        focus: false,
        timer: 2000,
        closeBtn: true
    });
}

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerColaborador.php", {
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
            container: '#alert-form-insert',
            html: '<strong>¡Bien hecho!</strong> ' + rptSql['mensaje'],
            focus: false,
            timer: 2000
        });
    }
    else{
        $.niftyNoty({
            type: 'danger',
            container: '#alerts-form-insert',
            html: '<strong>Oh cielos!</strong> ' + rptSql['mensaje'],
            focus: false,
            timer: 2000
        });
    }
    
};

ipt_colaborador_dni_api.addEventListener("keyup", (event) => {
    let val_dniColaborador = ipt_colaborador_dni_api.value;
    if (event.key == "Enter" && val_dniColaborador.length == 8) {
        // Almacenamos valor en variable
        val_dniColaborador = ipt_colaborador_dni_api.value;
        // Ejecutamos funcion e enviamos variable
        let formApi = {
            "accion": "get_dniNombres",
            "data": val_dniColaborador
        }
        fetchData_apiDni(formApi);
    }
    if(event.key == "Enter"){
        if(val_dniColaborador.length != 8){
            $.niftyNoty({
                type: 'danger',
                container: '#alert-form-insert',
                html: '<strong>Oh cielos!</strong> Nro DNI debe contener 8 digitos.',
                focus: false,
                timer: 2000
            });
        }
    }
});
// Funcion DNI ()
const fetchData_apiDni = async (data) => {
    try {
        //beforeAccion()
        const body = new FormData();
        body.append("data", JSON.stringify(data));
        const res = await fetch("./../../../controllers/controllerApis.php", {
            method: "POST",
            body
        });
        const rpt = await res.json() //await JSON.parse(returned);
        afterAccion(rpt);
    } catch (e) {
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>Oh cielos!</strong> Ocurrio un problema con la API.',
            focus: false,
            timer: 2000
        });
        //console.error('Ocurrio un problema con la API : '+ e);
    }
}
const afterAccion = (data) => {
    if(data.error){
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>Oh cielos!</strong> ' + data.error,
            focus: false,
            timer: 2000
        });
    }
    else{
        ipt_colaboradorApePaterno.value = data.apellidoPaterno;
        ipt_colaboradorApeMaterno.value = data.apellidoMaterno;
        ipt_colaboradoNombres.value = data.nombres;
    }
}

ipt_colaboradoNombres.addEventListener("keydown", (event) => {
    // TAB detectado
    if (event.keyCode == 9) {
        // Código para la tecla TAB
        console.log("Oprimiste la tecla TAB");
    }
});