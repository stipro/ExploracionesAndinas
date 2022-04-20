const ipt_SearchDni_insert = document.getElementById('insert-ipt-colaboradorDni');
const ipt_colaboradorApePaterno = document.getElementById('insert-ipt-colaboradorApePaterno');
const ipt_colaboradorApeMaterno = document.getElementById('insert-ipt-colaboradorApeMaterno');
const ipt_colaboradoNombres = document.getElementById('insert-ipt-colaboradorNombres');

ipt_SearchDni_insert.addEventListener("keyup", (event) => {
    let val_dniColaborador = ipt_SearchDni_insert.value;
    if (event.key == "Enter" && val_dniColaborador.length == 8) {
        // Almacenamos valor en variable
        val_dniColaborador = ipt_SearchDni_insert.value;
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