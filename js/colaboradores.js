const ipt_colaboradorApePaterno = document.getElementById('insert-ipt-colaboradorApePaterno');
const ipt_colaboradorApeMaterno = document.getElementById('insert-ipt-colaboradorApeMaterno');
const ipt_colaboradoNombres = document.getElementById('insert-ipt-colaboradorNombres');
const select_colaborador_estadoCivil = documento.getElementById('slt-insert-colaboradorEstadoCivil');
const select_colaborador_genero = documento.getElementById('slt-insert-colaboradorSexo');
const date_colaborador_fechaNacimiento = documento.getElementById('date-insert-colaborador-fechaNacimiento');
const select_colaborador_tipoDoc = documento.getElementById('slt-insert-colaboradorTipoDoc');
const ipt_colaborador_dni_api = document.getElementById('insert-ipt-colaboradorDni');

const btnInsertar = document.getElementById("mbtn-insert");

btnInsertar.addEventListener("click", (e) => {
    let val_apePaterno = ipt_colaboradorApePaterno.value;
    let val_apeMaterno = ipt_colaboradorApeMaterno.value;
    let val_nombres = ipt_colaboradoNombres.value;
    let val_estadoCivil = select_colaborador_estadoCivil.value;
    let val_genero = select_colaborador_genero.value;
    let val_fechaNacimiento = date_colaborador_fechaNacimiento.value;
    let val_tipoDoc = select_colaborador_tipoDoc.value;
    let val_dni = ipt_colaborador_dni_api.value;
    var listInsert = {
        "id_digitador": val_apePaterno,
        "fechRegistro": val_apeMaterno,
        "id_zona": val_nombres,
        "n_vale": val_estadoCivil,
        "turno": val_genero,
        "pre_impreso": val_fechaNacimiento,
        "id_labor": val_tipoDoc,
        "tip_disparo": val_dni,
    };

    var form_insert = {
        "accion": "insert",
        "form": listInsert
    }
    // Preparando Datos
    requestInsert(form_insert);
});

// Se envia Formulario
const requestInsert = async (form) => {
    const body = new FormData();
    body.append("data", JSON.stringify(form));
    const returned = await fetch("./../../../controllers/controllerColaborador.php", {
        method: "POST",
        body
    });
    const result = await returned.json(); //await JSON.parse(returned);
}

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