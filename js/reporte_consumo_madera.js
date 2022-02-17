// ipt = input
// reg = registrar
// csm = consumo
// Boton para agregar o abrir model
const btnAgregar = document.getElementById("btn-add");
// boton para registrar o insertar registro
const btnInsertar = document.getElementById("mbtn-insert");
// boton para un nuevo formulario o limpiar formulario
const btnNuevo = document.getElementById("mbtn-new");
// Los inputs de formaulario
const iptreg_reportConsumoMadera_numero = document.getElementById('insert-reportConsumoMadera-numero');
const iptreg_reportConsumoMadera_fecha = document.getElementById('insert-reportConsumoMadera-fecha');
const iptreg_reportConsumoMadera_turno = document.getElementById('insert-reportConsumoMadera-turno');
const iptreg_reportConsumoMadera_nombre = document.getElementById('insert-reportConsumoMadera-nombre');
const iptreg_reportConsumoMadera_dni = document.getElementById('insert-reportConsumoMadera-dni');
const iptreg_reportConsumoMadera_labor = document.getElementById('insert-reportConsumoMadera-labor');
const iptreg_reportConsumoMadera_cantidad = document.getElementById('insert-reportConsumoMadera-cantidad');

const iptreg_oprtion_table = document.getElementById('insert-option-table');


let listInsert = {}
document.addEventListener('DOMContentLoaded', e => {

});

btnInsertar.addEventListener("click", (e) => {
    console.log('Se obtuvo la informacion siguiente');
    const valNumReporte = iptreg_reportConsumoMadera_numero.value;
    const valfecha = iptreg_reportConsumoMadera_fecha.value;
    const valturno = iptreg_reportConsumoMadera_turno.value;
    const valnombre = iptreg_reportConsumoMadera_nombre.value;
    const valdni = iptreg_reportConsumoMadera_dni.value;
    listInsert = {
        "numReporte": valNumReporte,
        "fecha": valfecha,
        "turno": valturno,
        "nombre": valnombre,
        "dni": valdni,
        "labor": vallabor,
        "cantidad": valcantidad,
    }
    const vallabor = iptreg_reportConsumoMadera_labor.value;
    const valcantidad = iptreg_reportConsumoMadera_cantidad.value;
    console.log(listInsert);
});