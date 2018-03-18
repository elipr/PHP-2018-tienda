<?php
require_once './autoload.php';
require_once './vendor/autoload.php';

$productos = ProductoRepository::listar();
//var_dump($productos);

// https://phpspreadsheet.readthedocs.io/en/develop/topics/architecture/
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Creando un objeto excel
$spreadsheet = new Spreadsheet();

// Definiendo las propiedades del documento
$spreadsheet->getProperties()->setCreator('Elizabeth Parodi')
    ->setLastModifiedBy('Elizabeth Parodi')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

// Seleccionamos la hoja activa (la primera que se crea)
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle('Data');


// Insertando data modo directo
$sheet->setCellValue('A5', 'Lista de Productos en Tienda');
$sheet->setCellValue('A6', 'ID');
$sheet->setCellValue('B6', 'CATEGORÍA');
$sheet->setCellValue('C6', 'MODELO');
$sheet->setCellValue('D6', 'PRECIO');
$sheet->setCellValue('E6', 'ESTADO');

$x= 7;
foreach($productos as $producto){
// Insertando data modo iterativo
$sheet->setCellValueByColumnAndRow(1, $x, $producto->id); // setCellValueByColumnAndRow($columnIndex, $row, $value)
$sheet->setCellValueByColumnAndRow(2, $x, $producto->categorias_id);
$sheet->setCellValueByColumnAndRow(3, $x, $producto->nombre);
$sheet->setCellValueByColumnAndRow(4, $x, $producto->precio);
$sheet->setCellValueByColumnAndRow(5, $x, $producto->estado );

$x++;
 }

// Definiendo anchos de columnas
$sheet->getColumnDimension('A')->setWidth(10);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(40);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setAutoSize(true);

// Definiendo altos de filas
$sheet->getRowDimension(1)->setRowHeight(40);
$sheet->getRowDimension(5)->setRowHeight(30);

// Combinando celdas
$sheet->mergeCells('A1:E1');
$sheet->mergeCells('A5:E5');

// Formatos
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

$sheet->getStyle('A5:E5')->getFont()->setSize(20)->setBold(true)->setUnderline(Font::UNDERLINE_SINGLE);

$sheet->getStyle('A6:E6')->getFont()->setBold(true)->getColor()->setARGB(Color::COLOR_WHITE);
$sheet->getStyle('A6:E6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A6:E6')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
$sheet->getStyle('A6:E6')->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
$sheet->getStyle('A6:E6')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB("FFCCCCCC");

//$sheet->getStyle('D7:D9')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
$sheet->getStyle('D7:D9')->getNumberFormat()->setFormatCode('"S/"#,##0.00_-');

// Crear una nueva hoja
$newsheet = $spreadsheet->createSheet();
$newsheet->setTitle('Productos');
$newsheet->setCellValue('A1', 'Datos en la nueva hota');

// Grabar en disco del servidor
/*use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');*/

// Forzar descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="lista-productos.xlsx"');
header('Cache-Control: max-age=0');

use PhpOffice\PhpSpreadsheet\IOFactory;
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

// Más ejemplos: https://github.com/PHPOffice/PhpSpreadsheet/tree/develop/samples

