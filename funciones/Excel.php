<?php
//muestra los errores
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Resto de tu código

//EL ERROR QUE TENGO EN EL EXCEL ES DE PERMISOS. CAMBIARME A WINDOWS Y MEJOR PROBAR EN EL
//PAQUETES
require("../modelo/Conexion.php");
require  '../vendor/autoload.php';
//LIBRERIAS A USAR DE X PAQUETE
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel{
    public $con;

    public function __construct(){        
        $this->con = new Conexion();        
    }

    public function crearExcel(){
        $query = "SELECT * FROM productos";
        echo "entra en crearExcel";
        try{
            $ps = $this->con->Conectar()->prepare($query);            
            $ps->execute();
            
            
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Encabezados de columna
$columnas = ["codigo","nombre","marca","precio","unidad","categoria","fechaVencimiento"]; // Reemplaza con tus nombres de columna
$col = 'A';

foreach ($columnas as $columna) {
    $sheet->setCellValue($col . '1', $columna);
    $col++;
}

// Datos de MySQL
$fila = 2;
while ($row = $ps->fetchAll(PDO::FETCH_ASSOC)) {
    $col = 'A';
    foreach ($columnas as $columna) {
        $sheet->setCellValue($col . $fila, $row[$columna]);
        $col++;
    }
    $fila++;
}

// Guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
 // Especifica la ruta donde deseas guardar el archivo
$archivo_excel = '/home/bord/Música/archivo.xlsx';

$writer->save($archivo_excel);
echo "donde?";
// Cerrar la conexión a la base de datos

echo "Datos exportados correctamente a Excel en $archivo_excel";

//-------
        }catch(Exception $e){
            error_log("ERROR EN crearExcel: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

}

$object = new Excel();
echo "estoy probando <br>----------------------<br>";
$object->crearExcel();


?>