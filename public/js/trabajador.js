//VARIABLE PAGINA ACTUAL
var pageActual=1;
//NUMERO DE CELDAS A MOSTRAR
var pagesView=3;
//INDICA INICIO DE RECORRIDO
var indexTour=1;
//INDICA FIN DE RECORRIDO
var endTour=3;
// FILAS A VISUALIZAR
var rowstoDisplay=5;
// TOTAL DE PAGINACION
var pageAll=0
// Eventos
// El evento DOMContentLoaded es disparado cuando el documento HTML ha sido completamente cargado y parseado
document.addEventListener('DOMContentLoaded', e => { fetchData() });
// Traer JSON para Tabla
const fetchData = async (json) => {
    if(json){
        console.log('se hara una busqueda');
        var accionSelect = json['accion'];
      }
      else{
        accionSelect = 'mostrar';
      }
    var jsonRequests = {
        "accion" : accionSelect,
        "other" : json,
        "paginaActual" : pageActual,
        "indiceRecorrido" : indexTour,
        "paginasaVisualizar" : pagesView,
        "finRecorrido" : endTour,
        "filasVisualizar" : rowstoDisplay
    }
    const body = new FormData();
    body.append("data", JSON.stringify(jsonRequests));
    const rpt = await fetch('./../controllers/controllerTrabajadorList.php', { method: "POST", body });
    const rptJson = await rpt.json();//await JSON.parse(returned);
    console.log(rptJson);
    paintTable(rptJson)
}
// CREANDO HTML
const paintTable = (data) => {
    // LISTA DATOS
    arrayTable = data['sql']['list'];
    //RECIBIENDO INICIO RECORRIDO
    indexTour = data['sql']['paginacion']['indexTour'];
    //RECIBIENDO FIN DE RECORRIDO
    endTour = data['sql']['paginacion']['endTour'];
    // TOTAL DE PAGINACION
    pageAll = data['sql']['paginacion']['pageAll'];
    console.log('INICIO DE RECORRIDO : ' + indexTour);
    console.log('FIN DE RECORRIDO : ' + endTour);
    jlistLabor = data['sql']['list'];
    pagesNumber = data['sql']['paginacion']['filasTotal'];
    console.log('cantidad de paginas a visualizar : ' + pagesView);
    
    createPagination();
  
  /**BOTON PAGINACION
   * ACCION PAGINACION
   */
   var btnPage = document.getElementsByClassName("page-item");
   for (var i=0; i< btnPage.length; i++) {
          
    //Añades un evento a cada elemento
    btnPage[i].addEventListener("click",function(e) {
      console.log(e.target.textContent);
      pageActual = e.target.textContent;
      fetchData();
    });
  }
  creandoTabla(arrayTable)
  /**
   * FIN ACCION PAGINACION
   */
  
    //var el = document.getElementById("t");
  var btnEditdos = document.getElementById("btn-edit");
  //console.log(btnEditdos);
  console.log({btnEditdos})
  if(btnEditdos){
    console.log('lel');
    for(let i=0;i<btnEditdos.length;i++)
    {
    
      // cada vez que se haga clic sobre cualquier de los btnEditdos,
      // ejecutamos la función obtenerValores()
      btnEditdos[i].addEventListener("click",obtenerValores);
    }
  }
  else{
    fetchData();
  }

  
  // funcion que se ejecuta cada vez que se hace clic
  function obtenerValores(e) {
      var valores="";
   
      // vamos al elemento padre (<tr>) y buscamos todos los elementos <td>
      // que contenga el elemento padre
      var elementosTD=e.srcElement.parentElement.getElementsByTagName("td");
   
      // recorremos cada uno de los elementos del array de elementos <td>
      for(let i=0;i<elementosTD.length;i++)
      {
      // obtenemos cada uno de los valores y los ponemos en la variable "valores"
        valores+=elementosTD[i].innerHTML+"\n";
      }
      console.log(valores);
  }
  var btnEditdos = document.getElementsByClassName("btn-edit");
  var btnDeletFil = document.getElementsByClassName("btn-delete");
  //Recorres la lista de elementos seleccionados
  for (var i=0; i< btnEditdos.length; i++) {
    //Añades un evento a cada elemento
    btnEditdos[i].addEventListener("click",function() {
    console.log(jlistLabor);
    var id = this.getAttribute('data-id');
    arrayTable.forEach( function(valor, indice, array) {
      //console.log('Array');
      console.log("En el índice " + indice + " hay este valor: ");
      console.log(valor);
      console.log(valor['id_colaborador']);
      if(valor['id_colaborador'] === id){
        console.log('es igual');
        idLabor =  valor['id_colaborador']
        document.getElementById("formIptTextCCostoEdit").value = valor['col_ccostos'];
        document.getElementById("formIptNumbDniEdit").value = valor['col_dni'];
        document.getElementById("formIptTextApelNombresEdit").value = valor['col_nombre'];
        document.getElementById("formIptTextCargoEdit").value = valor['col_cargo_actual'];
        document.getElementById("formIptTextAreaEdit").value = valor['col_area'];
        document.getElementById("formIptTextGuardiaEdit").value = valor['col_guardia'];
        document.getElementById("formIptTextSituacionEdit").value = valor['col_situacion'];
      }
    });

    //Aquí la función que se ejecutará cuando se dispare el evento
    //alert(this.getAttribute('data-id')); //En este caso alertaremos el texto del cliqueado
    });
  }
  // INICIO DE BOTON ELIMINAR
  //Recorres la lista de elementos seleccionados
  for (var i=0; i< btnDeletFil.length; i++) {
    //Añades un evento a cada elemento
    btnDeletFil[i].addEventListener("click",function() {
    console.log(jlistLabor);
    var id = this.getAttribute('data-id');
    arrayTable.forEach( function(valor, indice, array) {
      //console.log('Array');
      console.log("En el índice " + indice + " hay este valor: ");
      console.log(valor);
      console.log(valor['id_colaborador']);
      if(valor['id_colaborador'] === id){
        console.log('es igual');
        idLaborDelet =  valor['id_colaborador']
      }
    });
  
    requestDelet(idLaborDelet);
    });
  }
  //FIN BOTON ELIMINAR

  //FIN ENVIO DATO EDITAR
  //INICIO ENVIO DATO ELIMINAR
  const requestDelet = async (doc) => {
    const body = new FormData();
    var data = {
      "accion" : 'eliminar',
      "list" : doc
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../controllers/controllerTrabajador.php", { method: "POST", body });
    const result = await returned.json();//await JSON.parse(returned);
    afterRequestDelet(result);
  };
  /* ACCION DESPUES DE ELIMINAR */
  function afterRequestDelet(data) {
    rptSql=data['sql'];
    fetchData();
    $.niftyNoty({
      type: 'success',
      container : '#alerts-general',
      html : '<strong>¡Bien hecho!</strong>' + rptSql,
      focus: false,
      timer : 2000
    });
  }
  //FIN ENVIO DATO ELIMINAR
    //CLICK ELEMENTOS
    listLabor.addEventListener('click', function(e) {
        //console.log(e.target.tagName);
        //console.log(e);
        const padreuno = e.target.parentElement;
        var element = '';
        var indice = e.target;
        //CONTIENE EL ID
        var dataId = '';
        if(e.target && e.target.tagName === 'BUTTON'){
          console.log('es un buttom');
          console.log(e.target.getAttribute('id'));
        }
        if(e.target && e.target.tagName === 'I'){
          element = padreuno.parentElement;
          indice = e.target.parentElement.getAttribute('data-id');
          console.log('es un i')
        }
        else{
          indice = e.target.getAttribute('data-id');
          element = padreuno;
          console.log('No es I');
        }
        var valores="";
        dataId =  indice;
        var elementosTD = element.parentElement.getElementsByTagName("td");
        //console.log(elementosTD);
        var filaLabores = [];
        const arrayRowTitle = ['ccostos', 'ccostos', 'labor', 'nivel', 'tipo', 'zona', 'ccostos2'];
        filaLabores.push(
          {
              nombreEstudiante: 'Andrea',
              testScore: 100
          },
          {
              nombreEstudiante: 'Timmy',
              testScore: 71
          });
        // recorremos cada uno de los elementos del array de elementos <td>
        for(let i=1;i<elementosTD.length;i++)
        {
          // obtenemos cada uno de los valores y los ponemos en la variable "valores"
          //console.log(arrayRowTitle [i]);
          var itemRowTitle = arrayRowTitle [i];
          filaLabores.push(
          {
              itemRowTitle: elementosTD[i].innerHTML
          });
          //console.log(elementosTD[i].innerHTML);
          valores+=elementosTD[i].innerHTML+"\n";
        }
    });
  };
  /**
   * CREANDO DATOS
   * 
   */
  //creadno tabla
  function creandoTabla(data) {
    var jsonList = data;
    console.log(data)
    listLabor = document.getElementById("tbody-tareo");
    listLabor.innerHTML = '';
    const templateLabor = document.querySelector("#template-td-tareo").content;
    const fragment = document.createDocumentFragment();
    //const trLabor = templateLabor.querySelector("#registro-tareo");
    jsonList.forEach( function(valor, indice, array) {
      /*
      //console.log('Array');
      console.log("En el índice " + indice + " hay este valor: ");
      console.log(valor);
      console.log(valor['ccostos']);
      */
      sqlId = valor['id_colaborador'];
      sqlItem1 = valor['col_ccostos'];
      sqlItem2 = valor['col_dni'];
      sqlItem3 = valor['col_nombre'];
      sqlItem4 = valor['col_cargo_actual'];
      sqlItem5 = valor['col_area'];
      sqlItem6 = valor['col_guardia'];
      sqlItem7 = valor['col_situacion'];
      //console.log(sqlId);
      const trLabor = templateLabor.querySelector("#registro-tareo");
      trLabor.setAttribute("data-id", sqlId);
      const btnId = templateLabor.querySelector("#registro-tareo #btn-edit");
      btnId.setAttribute("data-id", sqlId);
      const btnDeletTable = templateLabor.querySelector("#registro-tareo #btn-delete");
      btnDeletTable.setAttribute("data-id", sqlId);
      templateLabor.querySelector("#registro-tareo #ccosto").textContent =  sqlItem1;
      templateLabor.querySelector("#registro-tareo #dni").textContent =  sqlItem2;
      templateLabor.querySelector("#registro-tareo #nombre").textContent =  sqlItem3;
      templateLabor.querySelector("#registro-tareo #cargo-actual").textContent =  sqlItem4;
      templateLabor.querySelector("#registro-tareo #area").textContent =  sqlItem5;
      templateLabor.querySelector("#registro-tareo #guardia").textContent =  sqlItem6;
      templateLabor.querySelector("#registro-tareo #situacion").textContent =  sqlItem7;

      
      const clone = templateLabor.cloneNode(true);
      fragment.appendChild(clone)
    });
    listLabor.appendChild(fragment);
  }
  //CREANDO PAGINACION
function createPagination() {
    // INICIO PAGINACION //
  
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';

    const templatePagination = document.getElementById('template-pagination').content;
    
    const fragmentPagination = document.createDocumentFragment();
  
    templatePagination.querySelector("#itemPage a").textContent = '<';
    const clonePagination = templatePagination.cloneNode(true);
    fragmentPagination.appendChild(clonePagination);
    //CREAMOS LA PAGINACION
    for (var i = indexTour; i <= endTour; i++){
      console.log('Estas en la pagina : ' + pageActual);
      console.log('El numero de recorrido es  : ' + i);
      if(i == pageActual){
        console.log('es un : ' + pageActual);
        templatePagination.querySelector("#itemPage").className += ' active';
      }
      else{
        console.log('No es igual');
        templatePagination.querySelector("#itemPage").className = 'page-item';
      }
      templatePagination.querySelector("#itemPage a").textContent = i;
      const clonePagination = templatePagination.cloneNode(true);
      fragmentPagination.appendChild(clonePagination);
      console.log(i);
    }
    templatePagination.querySelector("#itemPage a").textContent = '>';
    const clonePaginationNext = templatePagination.cloneNode(true);
  
    if(pagesView >= 3){
      console.log('Es mayor');
      templatePagination.querySelector("#itemPage a").textContent = pageAll;
      const clonePaginationNumber = templatePagination.cloneNode(true);
      templatePagination.querySelector("#itemPage").className = 'disabled';
      templatePagination.querySelector("#itemPage").innerHTML = '<span>...</span>';
      const clonePaginationSpan = templatePagination.cloneNode(true);
      fragmentPagination.appendChild(clonePaginationSpan);
      //console.log(templatePagination);
      
  
      fragmentPagination.appendChild(clonePaginationNumber);
      
    }
    else{
      console.log('No es mayor');
    }
    templatePagination.querySelector("#itemPage").innerHTML = '<a class="page-link" href="#">2</a></li>';
    templatePagination.querySelector("#itemPage a").textContent = '';
    templatePagination.querySelector("#itemPage").className = 'page-item';
    //console.log(templatePagination);
    fragmentPagination.appendChild(clonePaginationNext);
    
    pagination.appendChild(fragmentPagination);
  
}
// FIN PAGINACION //
//EDITAR DATO
const mbtnEditar = document.getElementById("mbtn-edit");
mbtnEditar.addEventListener("click", () => {
  var item1 = document.getElementById("formIptTextCCostoEdit").value;
  var item2 = document.getElementById("formIptNumbDniEdit").value;
  var item3 = document.getElementById("formIptTextApelNombresEdit").value;
  var item4 = document.getElementById("formIptTextCargoEdit").value;
  var item5 = document.getElementById("formIptTextAreaEdit").value;
  var item6 = document.getElementById("formIptTextGuardiaEdit").value;
  var item7 = document.getElementById("formIptTextSituacionEdit").value;
  var listFormEdit = {
    "id" : idLabor,
    "item1" : item1,
    "item2" : item2,
    "item3" : item3,
    "item4" : item4,
    "item5" : item5,
    "item6" : item6,
    "item7" : item7,
  };
  console.log("diste click");
  requestEdit(listFormEdit);
});
  //INICIO ENVIO DATO EDITAR
  const requestEdit = async (doc) => {
    const body = new FormData();
    var data = {
      "accion" : 'editar',
      "list" : doc
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../controllers/controllerTrabajador.php", { method: "POST", body });
    const result = await returned.json();//await JSON.parse(returned);
    afterrequestEdit(result);
  };
  function afterrequestEdit(data) {
    fetchData();
    rptSql=data['sql'];
    $.niftyNoty({
      type: 'success',
      container : '#alerts-Edit',
      html : '<strong>¡Bien hecho!</strong> ' + rptSql,
      focus: false,
      timer : 2000
    });
  }
/**
 * 
 * NUEVO REGISTRO
 * 
 */
const mbtnInsert = document.getElementById("mbtn-insert");
mbtnInsert.addEventListener("click", () => {
    var item1 = document.getElementById("formIptTextCCosto").value;
    if(!item1){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato CCostos.',
        focus: false,
        timer : 2000
      });
    }
    /*
    let dni='';
    while(!(/^\d{8}[a-zA-Z]$/.test(dni))){
      dni = prompt("Introduzca un número de DNI: 8 números y una letra");
    }
    
    //Se separan los números de la letra
    var letraDNI = dni.substring(8, 9).toUpperCase();
    var numDNI = parseInt(dni.substring(0, 8));
    
    //Se calcula la letra correspondiente al número
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var letraCorrecta = letras[numDNI % 23];
    
    if(letraDNI!= letraCorrecta){
      console.log("Has introducido una letra incorrecta\nTu letra debería ser: " + letraCorrecta);
    } else {
      console.log("Enhorabuena hemos podido validar tu DNI");
    
    }*/

    var item3 = document.getElementById("formIptTextNombre").value;
    if(!item3){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Nombres y Apellidos.',
        focus: false,
        timer : 2000
      });
    }

    var item4 = document.getElementById("formIptTextCargo").value;
    if(!item4){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Cargo.',
        focus: false,
        timer : 2000
      });
    }

    var item5 = document.getElementById("formIptTextArea").value;
    if(!item5){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Área.',
        focus: false,
        timer : 2000
      });
    }

    var item6 = document.getElementById("formIptTextGuardia").value;
    if(!item6){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Guardia.',
        focus: false,
        timer : 2000
      });
    }

    var item7 = document.getElementById("formIptTextSituacion").value;
    if(!item7){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Situación.',
        focus: false,
        timer : 2000
      });
    }

    var item2 = document.getElementById("formIptTextDni").value;
    if(!item2){
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong> Nose ingreso Dato Dni.',
        focus: false,
        timer : 2000
      });
    }
    if(item6.length == '1'){
      console.log(item6.length);
      console.log('loco');
      var listInsert = {
        "id" : '',
        "item1" : item1,
        "item2" : item2,
        "item3" : item3,
        "item4" : item4,
        "item5" : item5,
        "item6" : item6,
        "item7" : item7,
      };
      requestInsert(listInsert);
    }
    else{
      console.log(item6.length);
      $.niftyNoty({
        type: 'warning',
        container : '#alerts-Insert',
        html : '<strong>¡Advertencia!</strong>Ingrese una Letra en Guardía',
        focus: false,
        timer : 2000
      });
    }
});
  const requestInsert = async (listInsert) => {
    const body = new FormData();
    var data = {
      "accion" : 'insertar',
      "list" : listInsert
    };
    console.log(data);
    body.append("data", JSON.stringify(data));
    const returned = await fetch("./../controllers/controllerTrabajador.php", { method: "POST", body });
    const result = await returned.json();//await JSON.parse(returned);
    afterSendingInsert(result);
  };
  //Si necesitas hacer algo despues de que terminen las
//consultas, hacelas aqui.
const afterSendingInsert = (data) => {
    rptSql=data['sql'];
    fetchData();
    $.niftyNoty({
      type: 'success',
      container : '#alerts-Insert',
      html : '<strong>...</strong> '+ rptSql,
      focus: false,
      timer : 2000
    });
    document.getElementById("formIptTextZona").value = '';
    document.getElementById("formIptTextCCosto").value = '';
    document.getElementById("formIptNumNivel").value = '';
    document.getElementById("formIptTextLabor").value = '';
  };
  /**
 * 
BUSQUEDA POR COLUMNA
 * 
 */
const btnBuscar = document.getElementById("btn-Buscar");
btnBuscar.addEventListener("click", () => {
  var datoBuqueda = document.getElementById("ipt-Buscar").value;
  var valColBusqueda = document.querySelector(".chosen-single span").textContent;
  console.log('Se buscara por la columna : ' + valColBusqueda);
  if(datoBuqueda){
    $.niftyNoty({
      type: 'success',
      container : '#alerts-general',
      html : '<strong>¡Bien hecho!</strong> Se procede con la busqueda, un momento.',
      focus: false,
      timer : 2000
    });
    var busquedaColumna = {
      "accion" : "busqueda",
      "palabra" : datoBuqueda,
      "columna" : "col_"+valColBusqueda
    };
    fetchData(busquedaColumna);
  }
  else{
    $.niftyNoty({
      type: 'danger',
      container : '#alerts-general',
      html : '<strong>¡Oh cielos!</strong> No se ingreso nada para buscar',
      focus: false,
      timer : 2000
    });
  }
});

//FIN BUSQUEDA POR COLUMNA