// Ejecuta despues de carga de la pagina
document.addEventListener('DOMContentLoaded', e => {
    mainEvents_instalacionesGenerales();
    table_instalacionesGenerales = $('#table-master-instalacionesGenerales').DataTable
    ({
        // Ordena desc Columna 1
        order: [[ 1, "desc" ]],
        columns: [
            {
                data: "id_instalacionesGenerales",
            },
            {
                data: "instalacionesGenerales_fecha",
            },
            {
                data: "instalacionesGenerales_nVale",
            },
            {
                defaultContent: '<button type="button" class="btn-view btn btn-success btn-tbM-consumoMadera-detalle"><i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Detalle<span></button> <button type="button" class="name btn btn-primary btn-tbM-consumoMadera-edit"><i class="fa fa-edit"></i> <span class="hidden-xs hidden-sm">Editar</span></button> <button type="button" class="position btn btn-danger btn-tbM-consumoMadera-delet"><i class="fa fa-trash-o"></i> <span class="hidden-xs hidden-sm">Eliminar<span></button>'
            }
        ],
    });    
});

const mainEvents_instalacionesGenerales = () => {
    let formList = {
        "accion": "table_master",
    }
    fetchTable_instalacionesGenerales(formList);   
}

// Hacemos la Peticion
const fetchTable_instalacionesGenerales = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerInstalacionGeneralesList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_instalacionesGenerales(rptSQL);
}

// Se pinta DataList
const paintTable_instalacionesGenerales = data => {
    table_instalacionesGenerales.clear();
    table_instalacionesGenerales.rows.add(data).draw();
};