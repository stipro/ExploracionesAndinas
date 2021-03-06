const ipt_explosivosKardex_explosivo = document.getElementById('ipt-explosivosKardex-explosivoCodigo');
const dtl_explosivosKardex_explosivo = document.getElementById('dtl-explosivosKardex-explosivoCodigo');
const tpt_explosivosKardex_explosivo = document.getElementById('tpt-explosivosKardex-explosivoCodigo').content;

const fragment = document.createDocumentFragment()

const ipt_explosivosKardex_unidadMedida = document.getElementById('ipt-explosivosKardex-unidaMedida');
const ipt_explosivosKardex_nombreExplosivo = document.getElementById('ipt-explosivosKardex-nombre');
const cst_ipt_explosivosKardex_periodo = document.getElementById('cst-ipt-explosivosKardex-Periodo');

var startDate;
var endDate;

document.addEventListener('DOMContentLoaded', e => {
    mainEvents_kardexExplosivos();
    $('#cst-ipt-explosivosKardex-Periodo').daterangepicker({

        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        "startDate": "05/05/2022",
        "endDate": "05/15/2022",
        "opens": "left"
    }, function(start, end, label) {
        try {
            let val_explosivo = ipt_explosivosKardex_explosivo.value;
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label);
            //Set the initial state of the picker label
            $('#cst-ipt-explosivosKardex-Periodo span').html(moment().subtract('days', 29).format('D MMMM YYYY') + ' - ' + moment().format('D MMMM YYYY'));
            
            let val_id = dtl_explosivosKardex_explosivo.querySelector("option[value='" +  val_explosivo + "']").dataset.idExplosivo;
            startDate = start.format('YYYY-MM-DD');
            endDate = end.format('YYYY-MM-DD');   
            if (val_id) {
                let formList = {
                    "accion": "tbeM_kardexExplosivos",
                    "paramentsWhere": val_id,
                    "date":{
                        "start": startDate,
                        "end": endDate
                    }
                }
                fetchTable_kardexExplosivos(formList); 
            }
        }
        catch (error) {

        }
    });
    tbeM_kardexExplosivo = $('#table-master-kardexExplosivo').DataTable({
        columns: [
            {
                data: "kardex_nvale",
                responsivePriority: 1,
            },
            {
                data: "kardex_fechaRegistro",
            },
            {
                data: "explosivo_descripcion",
            },
            {
                data: "Entrada",
            },
            {
                data: 'Salida',
            },
            {
                data: 'saldo',
            }
        ],
    });
    let form_request = {
        "accion": "getColumn_codigo",
    }
    getCodigo_explosivo(form_request);

});

const mainEvents_kardexExplosivos = () => {
      
}
// Hacemos la Peticion
const fetchTable_kardexExplosivos = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerKardexList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintTbeM_kardexExplosivos(rptSQL);
}

// Se pinta DataList
const paintTbeM_kardexExplosivos = data => {
    tbeM_kardexExplosivo.clear();
    tbeM_kardexExplosivo.rows.add(data).draw();
};

// Hacemos la Peticion
const getCodigo_explosivo = async (request) => {
    // Se instancia el FORMDATA
    const body = new FormData();
    // Se agrega formulario en el FORMDATA
    body.append("data", JSON.stringify(request));
    //Se envia formulario al controllador y su previa configuracion
    const returned = await fetch("./../../../controllers/controllerExplosivoList.php", {
        method: "POST",
        body
    });
    // Se convierte respuesta en json
    const result = await returned.json(); //await JSON.parse(returned);
    const rptSQL = result['sql'];
    // Envia dato a pintar
    paintDtl_explosivo(rptSQL);
}

// Se pinta DataList
const paintDtl_explosivo = data => {
    dtl_explosivosKardex_explosivo.innerHTML = '';
    data.forEach(item => {
        tpt_explosivosKardex_explosivo.querySelector('option').textContent = item.explosivo_codigo;
        tpt_explosivosKardex_explosivo.querySelector('option').value = item.explosivo_codigo;
        tpt_explosivosKardex_explosivo.querySelector('option').dataset.idExplosivo = item.id_explosivo;
        const clone = tpt_explosivosKardex_explosivo.cloneNode(true);
        fragment.appendChild(clone);
    });
    dtl_explosivosKardex_explosivo.appendChild(fragment);
};

ipt_explosivosKardex_explosivo.addEventListener("input", (e) => {
    try {
        let val_explosivo = ipt_explosivosKardex_explosivo.value;
        console.log(val_explosivo);
        let val_id = dtl_explosivosKardex_explosivo.querySelector("option[value='" +  val_explosivo + "']").dataset.idExplosivo;
        console.log(val_id);
        if (val_id) {
                
            let selectForm1 = {
                "accion": "getColumns_codigo",
                "paramentWhere": val_id,
            }
            getColumns_explosivoCodigo(selectForm1);

            let formList = {
                "accion": "tbeM_kardexExplosivos",
                "paramentsWhere": val_id,
                "date":{
                    "start": startDate,
                    "end": endDate
                }
            }
            
            fetchTable_kardexExplosivos(formList); 
        } else {
            ipt_explosivosKardex_unidadMedida.value = '';
            ipt_explosivosKardex_nombreExplosivo.value = '';
            tbeM_kardexExplosivo.clear().draw();
        }
    } catch (error) {
        ipt_explosivosKardex_unidadMedida.value = '';
        ipt_explosivosKardex_nombreExplosivo.value = '';
        tbeM_kardexExplosivo.clear().draw();
    }
});

const getColumns_explosivoCodigo = async (rptSql) => {
    const body = new FormData();
    body.append("data", JSON.stringify(rptSql));
    const res = await fetch('./../../../controllers/controllerExplosivoList.php', {
        method: "POST",
        body
    });
    const data = await res.json()
    rptSql = data['sql'];
    paintColumns_explosivoCodigo(rptSql);
}

const paintColumns_explosivoCodigo = (rptSql) => {
    ipt_explosivosKardex_unidadMedida.value = rptSql[0].explosivo_unidadMedida;
    ipt_explosivosKardex_nombreExplosivo.value = rptSql[0].explosivo_descripcion;
}
