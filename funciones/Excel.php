<?php
//muestra los errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Librerias externas o clases creadas por mi
require("../vendor/autoload.php");
require("../modelo/Conexion.php");

//LIBRERIAS A USAR DE X PAQUETE
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel{
    public $con;

    public function __construct(){        
        $this->con = new Conexion();        
    }

    public function crearColumnas($tabla){
        $query = "SHOW COLUMNS FROM $tabla;";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
        }catch(PDOException $e){
            error_log("ERROR en crearColumnas: ".$e->getMessage());
        }finally{

        }
    }

    public function crearExcel($tabla){
        $query = "SELECT * FROM $tabla";        
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
            //instancia
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            
            // Encabezados de columna
            //cambiar los nombres dinamicamente por los nombres de las columnas de la bd
            $columnas = ["codigo","nombre","marca","precio","unidad","categoria","fechaVencimiento"];
            $col = 'A';
            //Se agregan las columnas al archivo .xls
            foreach($columnas as $columna){
                $sheet->setCellValue($col . '1', $columna);
                $col++;                
            }

            // Datos de MySQL
            $fila = 2;
            while($row = $ps->fetch(PDO::FETCH_ASSOC)){
                $col = 'A';
                foreach($columnas as $columna){
                    $sheet->setCellValue($col . $fila, $row[$columna]);
                    $col++;
                }
                $fila++;
            }
            // Guardar el archivo Excel
            $writer = new Xlsx($spreadsheet);
             // Especifica la ruta donde deseas guardar el archivo
            $archivo_excel = '/opt/lampp/htdocs/sistemaGestionVentas/archivo.xls';
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
$object->crearExcel("productos");


?>