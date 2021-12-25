<?php
header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'tareos';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/'.$table.'.php';
        $tableManager = new Tareos();
        $jsonpagination = json_decode($_POST['data'],true);
        // ACCION
        $accion = $jsonpagination['accion'];
        if($accion == 'mostrar'){
            // PAGINA ACTUAL
            $pNumero = $jsonpagination['paginaActual'];
            // PAGINAS A VISUALIZAR
            $pVisualizar = $jsonpagination['paginasaVisualizar'];
            // INICIO DE RECORRIDO
            $iRecorrido = $jsonpagination['indiceRecorrido'];
            // FIN DE RECORRIDO
            $fRecorrido = $jsonpagination['finRecorrido'];
            // FILAS A VISUALIZAR
            $filVisualizar = $jsonpagination['filasVisualizar'];
            //RETROCEDER PAGINACION
            //RETROCEDER PAGINACION
            if($pNumero == $iRecorrido){
                if($iRecorrido == 1){

                }else{
                    $iRecorrido--;
                    $fRecorrido--;
                }
                
            }

            // AVANZAR PAGINACION
            if($pNumero == $fRecorrido){
                //echo "FIN DE RECORRIDO ES : ".$fRecorrido;
                if(4 > $fRecorrido){
                    //echo ' es menor 4 ';
                    $iRecorrido = $pVisualizar - 1;
                }
                else{
                    //echo ' es nayor 4 ';
                    $iRecorrido++;
                };
                
                $fRecorrido++;
            }
            $filasPage = '5';
            $empezarDesde = ($pNumero - 1)* $filasPage;
            //var_dump($empezarDesde);
            $data  = array();

            //varuable para almacenar array
            $paginacion  = $tableManager->getPaginationAll();
            //TOTAL ICONOS PAGES
            $ptotal = ceil($paginacion['filasTotal'] / $filVisualizar);
            //
            $data = $tableManager->getAll($empezarDesde, $filasPage);
            //AGREGAGO AL ARRAY  PAGINAS A VISUALIZAR
            $paginacion['pagesView'] = $pVisualizar;
            //AGREGAGO AL ARRAY EL INICIO DE RECORRIDO
            $paginacion['indexTour'] = $iRecorrido;
            // FIN DE RECORRIDO
            $paginacion['endTour'] = $fRecorrido;
            // TOTAL DE PAGINACION
            $paginacion['pageAll'] = $ptotal;
            $rptSql = array(
                "paginacion" => $paginacion,
                "list" => $data
            );
        }
        else{
            if($jsonpagination['other']['accion'] == 'completarCol'){
                $termino = $jsonpagination['other']['palabra'];
                $termiCol = $jsonpagination['other']['columna'];
                $table = $jsonpagination['other']['table'];
                $rptController = 'Busqueda para completar tareo';
                //varuable para almacenar array
                /*
                $paginacion  = $tableManager->getPaginationAll();
                */
                $rptbusqueda = $tableManager->getSelectNormal($termino, $termiCol, $table);
            }
            else{
                $termiCol = $jsonpagination['other']['columna'];
                $termino = $jsonpagination['other']['palabra'];
                //varuable para almacenar array
                /*
                $paginacion  = $tableManager->getPaginationAll();
                */
                $rptbusqueda = $tableManager->getSearch($table, $termiCol, $termino);
            }
            $rptSql = array(
                "paginacion" => 'xD',
                "list" => $rptbusqueda,
            );
        }


    } catch (Exception $e) {
        //throw $th;
    }
}
else{
    $rptController = 'no Se recibio datos';
}
$rptjsonControlller = array(
    "sql" => $rptSql,
    "rptController" => $rptController
);
echo json_encode($rptjsonControlller);