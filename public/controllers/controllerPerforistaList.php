<?php
//header('Content-type: application/json; charset=utf-8');
// Si no se ha enviado nada por el POST y se intenta acceder al archivo se retornará a la página de inicio
if($_POST){
    $table = 'Colaboradores';
    $rptSql='';
    $rptController = 'Se recibio datos';
    try {
        require_once '../models/perforista.php';
        $tableManager = new Perforista();
        $jsonpagination = json_decode($_POST['data'],true);
        // ACCION
        $accion = $jsonpagination['accion'];
        if($accion == 'mostrar'){
            if($jsonpagination['other']['accion'] == 'select'){


                $rptSelect = 'Select';
                //varuable para almacenar array
                $rptdata  = $tableManager->getPaginationAll();
                $data = $tableManager->getAll();
            }
            else{
                $rptSelect = 'No Select';
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
                //RETROCEDER PAGINAR
                //RETROCEDER PAGINAR
                if($pNumero == $iRecorrido){
                    if($iRecorrido == 1){

                    }else{
                        $iRecorrido--;
                        $fRecorrido--;
                    }            
                }
                
                // AVANZAR PAGINAR
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
                // var_dump($empezarDesde);
                $data  = array();
                
                // Variabñe para almacenar array
                $rptdata  = $tableManager->getPaginationAll();
                // Total Iconos Paginas
                $ptotal = ceil($rptdata['filasTotal'] / $filVisualizar);
                //

                //AGREGAGO AL ARRAY  PAGINAS A VISUALIZAR
                $rptdata['pagesView'] = $pVisualizar;
                //AGREGAGO AL ARRAY EL INICIO DE RECORRIDO
                $rptdata['indexTour'] = $iRecorrido;
                // FIN DE RECORRIDO
                $rptdata['endTour'] = $fRecorrido;
                // TOTAL DE PAGINACIOes
                $rptdata['pageAll'] = $ptotal;
            }
            //echo 'Busqueda por palabra';
            $rptSql = array(
                "paginacion" => $rptdata,
                "list" => $data,
                "xD" => $rptSelect,
            );
            
        }
        else{
            $termiCol = $jsonpagination['other']['columna'];
            $termino = $jsonpagination['other']['palabra'];
            //variable para almacenar array
            /*
            $paginacion  = $tableManager->getPaginationAll();
            */
            $rptSelect = 'Hola';
            $rptbusqueda = $tableManager->getSearch($table, $termiCol, $termino);
            $rptSql = array(
                "paginacion" => 'xD',
                "list" => $rptbusqueda ,
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
    "rptController" => $rptController,
    "xxxd" => $rptSelect,
);
echo json_encode($rptjsonControlller);
