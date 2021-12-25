<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if($_GET){
    // Obtenemos nombre Tabla
    $table = $_GET['table'];
    # Indica la posicion de la Fila
    $numeroDeFila = 2;
    # Indica la posicion de la Columna
    $numeroDeColumna = 1;
    
    # Trae Base Datos
    require_once './models/excelGenerator.php';

    # Se instancia Consulta
    $exportExcel = new ExportExcel();
    
    # Se envia Parametro
    $getTable = $exportExcel->getData($table);
    # Obtenemos el total de columna
    $totalColumns = $getTable->columnCount();

    # Obteniendo encabezado de la tabla
    for ($i = 0; $i < $totalColumns; $i++) {
        $col = $getTable->getColumnMeta($i);
        $columns[] = $col['name'];
    }

    # Se instancia Excel
    $archivoExcel = new Spreadsheet();
    # Se descrive su información
    $archivoExcel
    ->getProperties()
    ->setCreator("Prueba")
    ->setLastModifiedBy('Explore Mine')
    ->setTitle('Archivo generado desde MySQL')
    ->setDescription('Tareos exportados desde MySQL');

    # Activo la Hoja
    $sheet = $archivoExcel->getActiveSheet();
    # Nombre de la hoja
    $sheet->setTitle($table);

    # Creamos los encabezado en el Excel
    # El último argumento es por defecto A1
    $sheet->fromArray($columns, null, 'A1');
    
    # Otra forma 
    # $sheet->setCellValue('A2', 'Esto es una prueba !');
    # Recorremos los valores
    while ($fila = $getTable->fetch(PDO::FETCH_ASSOC)) {
        # Recorremos las columnas
        for($index = 0; $index <  $totalColumns; $index++){
            $sheet->setCellValueByColumnAndRow($numeroDeColumna, $numeroDeFila, $fila[$columns[$index]]);
            # Incremento
            $numeroDeColumna++;
        }
        # Incremento
        $numeroDeColumna = 1;
        $numeroDeFila++;
    }

    # Modificamos primer letra en mayuscula
    $tbMPrimer = ucfirst($table);
    $fileName = $tbMPrimer.date('Y-m-d').".xlsx";
    # Crear un "escritor"
    $writer = new Xlsx($archivoExcel);
    # Le pasamos la ruta de guardado
    $writer->save('./prueba.xlsx');

    //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    //header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
    //$writer->save('php://output');
}
else{
    echo 'No se obtuvo ningun Dato';
}

/*
require_once "./vendor/autoload.php";

# Nuestra base de datos
require_once './models/excelGenerator.php';

$exportExcel = new ExportExcel();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$documento = new Spreadsheet();
$documento
->getProperties()
->setCreator("Prueba")
->setLastModifiedBy('Explore Mine')
->setTitle('Archivo generado desde MySQL')
->setDescription('Tareos exportados desde MySQL');

$hojaDeProductos = $documento->getActiveSheet();
$hojaDeProductos->setTitle("Tareos");

# Encabezado de los productos
$encabezado = ["Código", "Apellidos y Nombres", "Cargo", "Dia", "Turno", "Ht", "Ht Sev_Ad", "**Ccostos", "Labor", "Nivel", "He", "He Ser Ad", "C. Costos He", "V.B", "Guardia", "Cod_Actividad", "Área"];
# El último argumento es por defecto A1
$hojaDeProductos->fromArray($encabezado, null, 'A1');
$sentencia = $exportExcel->getData();

# Comenzamos en la fila 2
$numeroDeFila = 2;

while ($table = $sentencia->fetchObject()) {
    #print_r($table);
    # Obtener registros de MySQL
    $dni = $table->col_dni;
    $nombres = $table->col_nombre;
    $cargoActual = $table->col_cargo_actual;
    $dia = $table->dia;
    $turno = $table->turno;
    $ht = $table->ht;
    $ht_serv_ad = $table->ht_serv_ad;
    $ccostos = $table->lab_ccostos;
    $labor = $table->lab_labor;
    $nivel = $table->lab_nivel;
    $he = $table->he;
    $he_ser_ad = $table->he_ser_ad;
    $c_costos_he = $table->c_costos_he;
    $v_b = $table->v_b;
    $guardia = $table->guardia;
    $cod_actividad = $table->cod_actividad;
    $area = $table->col_area;
    

    # Escribir registros en el documento
    $hojaDeProductos->setCellValueByColumnAndRow(1, $numeroDeFila, $dni);
    $hojaDeProductos->setCellValueByColumnAndRow(2, $numeroDeFila, $nombres);
    $hojaDeProductos->setCellValueByColumnAndRow(3, $numeroDeFila, $cargoActual);
    $hojaDeProductos->setCellValueByColumnAndRow(4, $numeroDeFila, $dia);
    $hojaDeProductos->setCellValueByColumnAndRow(5, $numeroDeFila, $turno);
    $hojaDeProductos->setCellValueByColumnAndRow(6, $numeroDeFila, $ht);
    $hojaDeProductos->setCellValueByColumnAndRow(7, $numeroDeFila, $ht_serv_ad);
    $hojaDeProductos->setCellValueByColumnAndRow(8, $numeroDeFila, $ccostos);
    $hojaDeProductos->setCellValueByColumnAndRow(9, $numeroDeFila, $labor);
    $hojaDeProductos->setCellValueByColumnAndRow(10, $numeroDeFila, $nivel);
    $hojaDeProductos->setCellValueByColumnAndRow(11, $numeroDeFila, $he);
    $hojaDeProductos->setCellValueByColumnAndRow(12, $numeroDeFila, $he_ser_ad);
    $hojaDeProductos->setCellValueByColumnAndRow(13, $numeroDeFila, $c_costos_he);
    $hojaDeProductos->setCellValueByColumnAndRow(14, $numeroDeFila, $v_b);
    $hojaDeProductos->setCellValueByColumnAndRow(15, $numeroDeFila, $guardia);
    $hojaDeProductos->setCellValueByColumnAndRow(16, $numeroDeFila, $cod_actividad);
    $hojaDeProductos->setCellValueByColumnAndRow(17, $numeroDeFila, $area);

    $numeroDeFila++;
}
$fileName="Descarga_excel.xlsx";
# Crear un "escritor"
$writer = new Xlsx($documento);
# Le pasamos la ruta de guardado

//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
//$writer->save('php://output');
*/
?>