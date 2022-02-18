const btnAgregar = document.getElementById("btn-Agregar");


const tbodyDetalleExtraccion = document.getElementById("detalleExtraccion-body");

const btnAdd_DetalleExtraccion = document.getElementById("insert-option-table-detalleExtraccion");
const iptinsertFechaExtraccion = document.getElementById("insert-extrMineral-fecha-extracion");
const iptinsertUniEmpresa = document.getElementById("insert-extrMineral-unidadEmpresa");
const iptinsertZona = document.getElementById("insert-extrMineral-zona");
const iptinsertDigitacion = document.getElementById("insert-extrMineral-fech-Digitacion");
const iptinsertLocomotora = document.getElementById("insert-extrMineral-locomotora");
const iptinsertMotorista = document.getElementById("insert-extrMineral-motorista");
const iptinsertNivel = document.getElementById("insert-extrMineral-nivel");
const iptinsertTolva = document.getElementById("insert-extrMineral-tolva");
const iptinsertAyudante = document.getElementById("insert-extrMineral-ayudante");

const iptinsertDescripcion = document.getElementById("insert-extrMineral-descripcion")

const datalistinsert_optionmotorista = document.getElementById("datalistOptions-motorista");
const datalistinsert_optionayudante = document.getElementById("datalistOptions-ayudante");


cont = 0;
// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {

});

btnAgregar.addEventListener("click", () => {
    var selectFoorm_colaborador = {
        "accion": "getcolumnAll",
        "column": "col_dni"
    }
    fetchData(selectFoorm_colaborador)
    $("#insert-extrMineral-codigo").change(function() {
        iptinsertDescripcion.value = $('select[id=insert-extrMineral-codigo]').val();
    });
});
btnAdd_DetalleExtraccion.addEventListener("click", () => {
    console.log('Agregando');
    valFechaExtraccion = iptinsertFechaExtraccion.value;
    valUniEmpresa = iptinsertUniEmpresa.value;
    valZona = iptinsertZona.value;
    valDigitacion = iptinsertDigitacion.value;
    valLocomotora = iptinsertLocomotora.value;
    valMotorista = iptinsertMotorista.value;
    valNivel = iptinsertNivel.value;
    valTolva = iptinsertTolva.value;
    valAyudante = iptinsertAyudante.value;
    if (valUniEmpresa && valTolva) {
        const templateTable_DetalleExtraccion = document.getElementById("template-detalleExtraccion").content;
        const fragmentDetalleExtraccin = document.createDocumentFragment();

        templateTable_DetalleExtraccion.querySelector('#template-tds-uni_empresa').textContent = valUniEmpresa;
        templateTable_DetalleExtraccion.querySelector('#template-tds-tolva').textContent = valTolva;

        const clonetds_DetalleExtraccion = templateTable_DetalleExtraccion.cloneNode(true);
        fragmentDetalleExtraccin.appendChild(clonetds_DetalleExtraccion);
        tbodyDetalleExtraccion.appendChild(fragmentDetalleExtraccin);
    }
    if (!valUniEmpresa) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Empresa.',
            focus: false,
            timer: 2000
        });
    }
    if (!valTolva) {
        $.niftyNoty({
            type: 'warning',
            container: '#alert-form-insert',
            html: '<strong>¡Advertencia!</strong> Seleccione Tolva.',
            focus: false,
            timer: 2000
        });
    }



});

iptinsertLocomotora.addEventListener('keyup', function(e) {
    valExtractor = iptinsertLocomotora.value;
    var request = {
        'accion': 'search',
        'term': valExtractor,
        'type': 'id_cargo'
    };
    fetchData(request);
});
iptinsertTolva.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertTolva.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});

iptinsertMotorista.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertMotorista.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});
iptinsertAyudante.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertAyudante.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : ' + cont);
    cont++;
});

// Traer cohicidencia
const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../../../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);
    pintarMotorista(data);
    pintarAyudante(data);
}
const pintarMotorista = (data) => {
    arraySelectColaboradores = data['sql'];
    datalistinsert_optionmotorista.innerHTML = ''
    const templateSelectMotorista = document.querySelector("#template-opt-motorista").content;
    const fragmentMotorista = document.createDocumentFragment();
    arraySelectColaboradores.forEach(item => {
        templateSelectMotorista.querySelector('#template-opts-motorista').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        const cloneMotorista = templateSelectMotorista.cloneNode(true);
        fragmentMotorista.appendChild(cloneMotorista);
    });
    datalistinsert_optionmotorista.appendChild(fragmentMotorista);
}
const pintarAyudante = (data) => {
    arraySelectColaboradores = data['sql'];
    datalistinsert_optionayudante.innerHTML = '';
    const templateSelectAyudante = document.querySelector("#template-opt-ayudante").content;
    const fragmentAyudante = document.createDocumentFragment();
    arraySelectColaboradores.forEach(item => {
        templateSelectAyudante.querySelector('#template-opts-ayudante').value = item.col_apePaterno + " " + item.col_apeMaterno + " " + item.col_nombres;
        const cloneAyudante = templateSelectAyudante.cloneNode(true);
        fragmentAyudante.appendChild(cloneAyudante);
    });
    datalistinsert_optionayudante.appendChild(fragmentAyudante);

}