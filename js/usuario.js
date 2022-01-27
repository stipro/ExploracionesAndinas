// Declaramos botones principales
const btnAgregar = document.getElementById("btn-Agregar");
const btnInsert = document.getElementById("mbtn-insert");

const btnBuscar;
const iptColaborador;

$("#ipt-search-colaborador").on('keyup', function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        $('#modal-search-colaborador').modal('show');
    }
});

$("#btn-search-colaborador").click(function() {
    $('#modal-search-colaborador').modal('show');

});