// Declarando variables
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsert = document.getElementById("mbtn-insert");
const iptinsertRegistro = document.getElementById("insert-operacionMina-registro");
const iptinsertTurno = document.getElementById("insert-operacionaMina-turno");
const iptinsertGuardia = document.getElementById("insert-operacionMina-guardia");
const iptinsertNVale = document.getElementById("insert-operacionMina-nvale");

const iptinsertCZona = document.getElementById("insert-operacionMina-cod_zona");
const iptinsertLabor = document.getElementById("insert-operacionMina-labor");
const iptinsertZona = document.getElementById("insert-operacionMina-zona");
const iptinsertCodLabor = document.getElementById("insert-operacionMina-codLabor");
const iptinsertNivel = document.getElementById("insert-operacionMina-nivel");

const iptinsertl = document.getElementById("insert-operacionMina-l");
const iptinsertlpv = document.getElementById("insert-operacionMina-lpv");
const iptinsertstto = document.getElementById("insert-operacionMina-stto");
const iptinsertserv = document.getElementById("insert-operacionMina-Serv");
const iptinsertcomentario = document.getElementById("insert-operacionMina-comentario");

const iptinserttipAvance = document.getElementById("insert-operacionMina-tipAvance");
const iptinsertmt = document.getElementById("insert-operacionMina-mt");
const iptinsertmt3 = document.getElementById("insert-operacionMina-mt3");
const iptinsertintDisparo = document.getElementById("insert-operacionMina-intDisparo");
const iptinsertresuelto = document.getElementById("insert-operacionMina-resuelto");

const iptinsertmanual = document.getElementById("insert-operacionMina-Manual");
const iptinsertpala = document.getElementById("insert-operacionMina-pala");
const iptinsertcantidadPala = document.getElementById("insert-operMina-cantidadPala");
const iptinsertmineral = document.getElementById("insert-operMina-mineral");
const iptinsertWinche = document.getElementById("insert-operacionMina-winche");
const iptinsertcantidadWinche = document.getElementById("insert-operacionMina-cantidadWinche");
const iptinsertdesmont = document.getElementById("insert-operacionMina-Desmon");


// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {

});


btnAgregar.addEventListener("click", () => {
    iptinsertRegistro.value;
    iptinsertTurno.value;
    iptinsertGuardia.value;
    iptinsertNVale.value;
    iptinsertCZona.value;
    iptinsertLabor.value;
    iptinsertZona.value;
    iptinsertCodLabor.value;
    iptinsertNivel.value;
    console.log('Estas en el modal');
    fetchCodzona()
});

btnInsert.addEventListener("click", () => {
    valRegistro = iptinsertRegistro.value;
    valTurno = iptinsertTurno.value;
    valGuardia = iptinsertGuardia.value;
    valNVale = iptinsertNVale.value;
    // Tipo de Disparo
    valradioTipo_dis = document.querySelector('input[name="radio-tipo_disparo"]:checked').value
    valCZona = iptinsertCZona.value;
    valLabor = iptinsertLabor.value;
    valZona = iptinsertZona.value;
    valCodLabor = iptinsertCodLabor.value;
    valNivel = iptinsertNivel.value;

    vall = iptinsertl.value;
    vallpv = iptinsertlpv.value;
    valstto = iptinsertstto.value;
    valserv = iptinsertserv.value;
    valcomentario = iptinsertcomentario.value;

    valtipavance = iptinserttipAvance.value;
    valmt = iptinsertmt.value;
    valmt3 = iptinsertmt3.value;
    valintDisparo = iptinsertintDisparo.value;
    valresuelto = iptinsertresuelto.value;

    valmanual = iptinsertmanual.value;
    valpala = iptinsertpala.value;
    valcantidadpala = iptinsertcantidadPala.value;
    valmineral = iptinsertmineral.value;
    valwinche = iptinsertWinche.value;
    valcantidadwinche = iptinsertcantidadWinche.value;
    valdesmont = iptinsertdesmont.value;

    console.log("diste click");
    valInsert = {
        "registro": valRegistro,
        "turno": valTurno,
        "guardia": valGuardia,
        "nvale": valNVale,
        "tip_ disparo": valradioTipo_dis,
        "codZona": valCZona,
        "labor": valLabor,
        "zona": valZona,
        "codLabor": valCodLabor,
        "nivel": valNivel,
        "l": vall,
        "lpv": vallpv,
        "stto": valstto,
        "serv": valserv,
        "comentario": valcomentario,
        "tip_avanace": valtipavance,
        "mt": valmt,
        "mt3": valmt3,
        "int_disparo": valintDisparo,
        "resuelto": valresuelto,
        "manual": valmanual,
        "pala": valpala,
        "cantidad_pala": valcantidadpala,
        "mineral": valmineral,
        "winche": valwinche,
        "cantidad_winche": valcantidadwinche,
        "desmont": valdesmont,
    }
    console.log(valInsert);
});

iptinsertCZona.addEventListener('keyup', function(e) {
    valCZona = iptinsertCZona.value;
    if (valCZona.length == 3) {
        console.log('Ya es mayor de 3');
    } else {
        console.log('es menor a 3');
    }
    console.log(valCZona);
    /*
    var request = {
        'accion': 'search',
        'term': valExtractor,
        'type': 'id_cargo'
    };
    fetchData(request);
    */
});

//Traer codigo zona (CCOSTOS)
const fetchCodzona = async (request) => {
    if (request) {
        console.log("Solicitud es");
        console.log(request);
    } else {
        console.log("No hay solicitud");
        accion = "default";
    }
    var jsonRequests = {
        "accion": accion,
    }
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const res = await fetch('./../controllers/controllerLaborMinaList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    // console.log(data)
    //pintarCards(data)
}
//Traer codigo zona (CCOSTOS)
const fetchColaborador = async (request) => {
    const res = await fetch('./../controllers/controllerTareoList.php');
    const data = await res.json()
    // console.log(data)
    //pintarCards(data)
}