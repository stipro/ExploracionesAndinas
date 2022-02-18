// Declaramos botones principales
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsert = document.getElementById("mbtn-insert");


const iptInsert_nombrecolaborador_Usuario = document.getElementById("ipt-insert-nombreColaborador-usuario");
const iptInsert_dnicolaborador_Usuario = document.getElementById("ipt-insert-dniColaborador-usuario");
const iptInsert_nombre_Usuario = document.getElementById("ipt-insert-nombre-usuario");
const iptInsert_clave_Usuario = document.getElementById("ipt-insert-clave-usuario");
const iptInsert_correo_Usuario = document.getElementById("ipt-insert-correo-usuario");
const iptInsert_estado_Usuario = document.getElementById("ipt-insert-estado-usuario")

btnAgregar.addEventListener("click", () => {
    var selectFoorm_colaborador = {
        "accion": "getcolumnAll",
        "column": "col_dni"
    }
    fetchData(selectFoorm_colaborador);
});
btnInsert.addEventListener("click", () => {
    var valInsert_estado_Usuario = '';
    var valInsert_nombrecolaborador_Usuario = iptInsert_nombrecolaborador_Usuario.value();
    var valInsert_dnicolaborador_Usuario = iptInsert_dnicolaborador_Usuario.value();
    var valInsert_nombre_Usuario = iptInsert_nombre_Usuario.value();
    var valInsert_clave_Usuario = iptInsert_clave_Usuario.value();
    var valInsert_correo_Usuario = iptInsert_correo_Usuario.value();
    if (iptInsert_estado_Usuario.checked) {
        valInsert_estado_Usuario = true;
    } else {
        valInsert_estado_Usuario = false;
    }

});


const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
}


/* const btnBuscar;
const iptColaborador; */

$("#ipt-search-colaborador").on('keyup', function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        $('#modal-search-colaborador').modal('show');
    }
});

$("#btn-search-colaborador").click(function() {
    $('#modal-search-colaborador').modal('show');

});

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