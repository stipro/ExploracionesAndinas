const btnAgregar = document.getElementById("mbtn-insert");
const iptinsertExtractor = document.getElementById("insert-extrMineral-extractor");
const iptinsertTolva = document.getElementById("insert-extrMineral-tolva");
const iptinsertContrata = document.getElementById("insert-extrMineral-contrata");
const iptinsertMotorista = document.getElementById("insert-extrMineral-motorista");
const iptinsertAyudante = document.getElementById("insert-extrMineral-ayudante");
const iptinsertZona = document.getElementById("insert-extrMineral-zona");
const iptinsertNivel = document.getElementById("insert-extrMineral-nivel");
cont = 0;
/*
$(document).ready(function() {
    $("#val_explosivo-input-form-barra").keyup(function(event) {
        valinputFormBarra = inputFormBarra.value;
        console.log();
        calPies_Perf_Real();
    });
});*/
iptinsertExtractor.addEventListener('keyup', function(e) {
    valExtractor = iptinsertExtractor.value;
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
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : '+cont);
    cont++;
});
iptinsertContrata.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertContrata.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : '+cont);
    cont++;
});
iptinsertMotorista.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertMotorista.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : '+cont);
    cont++;
});
iptinsertAyudante.addEventListener('keyup', function(e) {
    var cont;
    valExtractor = iptinsertAyudante.value;
    console.log(valExtractor + ' Pulsaste teclado la cantidad de veces : '+cont);
    cont++;
});

// Traer cohicidencia
const fetchData = async (request) => {
    const body = new FormData();
    body.append("data", JSON.stringify(request));
    const res = await fetch("./../controllers/controllerColaboradorList.php", {
        method: "POST",
        body
    });
    const data = await res.json() //await JSON.parse(returned);

    //
    pintardatalist(data)
}
// Pintar datalist
const pintardatalist = data => {
    console.log(data);
}