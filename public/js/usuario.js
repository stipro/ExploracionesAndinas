$("#insert-usuario").on('keyup', function(e) {
    var keycode = (e.keyCode ? e.keyCode : e.which);
    if (keycode == '13') {
        $('#search-colaborador').modal('show');
    }
});