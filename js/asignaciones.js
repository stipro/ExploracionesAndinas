// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => {
    tableMaster_modulos = $('#table-asignaciones-modulos').DataTable();
    tableMaster_menu = $('#table-asignaciones-menu').DataTable();
    tableMaster_submenu = $('#table-asignaciones-submenu').DataTable();
    mainEvents();
});
const mainEvents = () => {
    // Preparamos formulario
    let form_request1 = {
        // Se pone la accion
        "accion": "table-modulo",
    }
    // Enviamos formulario
    fetchData_tb_modulo(form_request1);
    // Preparamos formulario
    let form_request2 = {
        // Se pone la accion
        "accion": "table-menu",
    }
    // Enviamos formulario
    fetchData_tb_menu(form_request2);
    // Preparamos formulario
    let form_request3 = {
        // Se pone la accion
        "accion": "table-submenu",
    }
    // Enviamos formulario
    fetchData_tb_submenu(form_request3);
}

// Hacemos la Peticion
const fetchData_tb_modulo = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerModuloList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_asignacion_modulo(rptSQL);
}

// Se pinta la Tabla Principal
const paintTable_asignacion_modulo = async (rptSql) => {
    // Limpia tabla
    tableMaster_modulos.clear();
    // Agregada datos a Tabla
    tableMaster_modulos.rows.add(rptSql).draw();
}

// Hacemos la Peticion
const fetchData_tb_menu = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerMenuList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_asignacion_menu(rptSQL);
}

// Se pinta la Tabla Principal
const paintTable_asignacion_menu = async (rptSql) => {
    // Limpia tabla
    tableMaster_menu.clear();
    // Agregada datos a Tabla
    tableMaster_menu.rows.add(rptSql).draw();
}

// Hacemos la Peticion
const fetchData_tb_submenu = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerSubmenuList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTable_asignacion_submenu(rptSQL);
}

// Se pinta la Tabla Principal
const paintTable_asignacion_submenu = async (rptSql) => {
    // Limpia tabla
    tableMaster_submenu.clear();
    // Agregada datos a Tabla
    tableMaster_submenu.rows.add(rptSql).draw();
}