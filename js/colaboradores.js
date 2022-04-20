const iptSearchDni_insert = document.getElementById('insert-ipt-colaboradorDni');
const ipt_colaboradorApePaterno = document.getElementById('insert-ipt-colaboradorApePaterno');
const ipt_colaboradorApeMaterno = document.getElementById('insert-ipt-colaboradorApeMaterno');
const ipt_colaboradoNombres = document.getElementById('insert-ipt-colaboradorNombres');

iptSearchDni_insert.addEventListener("keydown", function (event) {
    console.log('Presiono cualquier tecla');
    if (event.key == "Enter") {
        // Almacenamos valor en variable
        val_dniColaborador = iptSearchDni_insert.value;
        // Ejecutamos funcion e enviamos variable
        fetchData(val_dniColaborador)
    }
});
// Funcion DNI ()
const fetchData = async (data) => {
    try {
        //beforeAccion()
        const body = new FormData();
        body.append("data", JSON.stringify(data));
        const res = await fetch("./../../../controllers/controllerApis.php", {
            method: "POST",
            body
        });
        const rpt = await res.json() //await JSON.parse(returned);
        
        console.log(typeof rpt)
        console.log(rpt);
        /* if(res){
            afterAccion(rpt);
        }
        else{
            console.log('Vacio');
        } */
    } catch (e) {
        console.error('Ocurrio un problema con la API : '+ e);
    }
}

const afterAccion = (data) => {
    data
    if(data.error){
        console.log('Hubo un error');
        $.niftyNoty({
            type: 'danger',
            container: '#alert-form-insert',
            html: '<strong>Oh cielos!</strong> ' + data.error,
            focus: false,
        });
    }
    else{
        ipt_colaboradorApePaterno.value = data.apellidoPaterno;
        ipt_colaboradorApeMaterno.value = data.apellidoMaterno;
        ipt_colaboradoNombres.value = data.nombres;
    }
}