const mbtn_agregarDetalle = document.getElementById('mbtn-agregarDetalle');
// Jefe de Guardia
const iptAdd_jefeGuardia = document.getElementById('insert-ipt-consumoMadera-jefeGuardia');
const dtl_consumoMadera_jefeGuardia = document.getElementById('insert-dtl-consumoMadera-jefeGuardia');
const tpe_consumoMadera_jefeGuardia = document.getElementById('template-consumoMadera-jefeGuardia').content

//Centro de Costos
const iptAdd_cCostos = document.getElementById('insert-ipt-consumoMadera-centroCostos');
const dtl_consumoMadera_cCostos = document.getElementById('insert-dtl-consumoMadera-centroCostos');
const tpe_consumoMadera_cCostos = document.getElementById('template-consumoMadera-centroCostos').content

const fragment = document.createDocumentFragment();
var tableMaster_colaboradores;
document.addEventListener('DOMContentLoaded', e => {
    mainEvents_consumoMadera();
    var tableMaster_colaboradores = $('#list-insert-consumoMadera-detalle').DataTable({});
});

/** Eventos */
mbtn_agregarDetalle.addEventListener("click", (e) => {
    val_jefeGuardia = iptAdd_jefeGuardia.value;
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
    console.log(data);
    dtl_consumoMadera_cCostos.innerHTML = '';
    data.forEach(item => {
        tpe_consumoMadera_cCostos.querySelector('option').textContent = item.lab_ccostos;
        const clone = tpe_consumoMadera_cCostos.cloneNode(true);
        fragment.appendChild(clone)
    });
    dtl_consumoMadera_cCostos.appendChild(fragment);
};