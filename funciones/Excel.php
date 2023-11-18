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

    /* Obtiene la cantidad de columnas que tiene 
     * la tabla ingresada como parametro 
     * @Param tabla @Return cantidad columnas
     */
    public function numeroColumnas($tabla){;
        $query = "SELECT COUNT(*) as totalColumna FROM information_schema.columns
        WHERE table_schema = 'sistemaGestion' AND table_name = '$tabla'";
        try{
            $ps= $this->con->Conectar()->prepare($query);
            $ps->execute();
            $rs = $ps->fetch();
            $numColumnas = $rs[0];
            return $numColumnas;//7
        }catch(Exception $e){
            error_log("ERROR en numeroColumnas: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

    /* Guarda el nombre de las columnas de la tabla
     * en un array asociativo y lo retorna
     * @Param $tabla @Return $columnas = []
     */
    public function obtenerNombresColumnas($tabla){
        $query = "SHOW COLUMNS FROM $tabla";
        $columnas = [];        
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
            $rs = $ps->fetchAll(PDO::FETCH_ASSOC);
            for($i=0; $i<$this->numeroColumnas($tabla); $i++){
                $columnas[$i] = $rs[$i]['Field'];
            }
            return $columnas;//retornamos vector con las columnas de la tabla
        }catch(PDOException $e){
            error_log("ERROR en crearColumnas: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }   

    /* Crea un excel con las columnas
     * de la tabla ingresada como parametro
     * con toda la informacion de la BD
     * @Param $tabla 
     */
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
            //$columnas = ["codigo","nombre","marca","precio","unidad","categoria","fechaVencimiento"];
            $columnas = $this->obtenerNombresColumnas($tabla);
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
            $archivo_excel = "/opt/lampp/htdocs/sistemaGestionVentas/$tabla.xls";
            $writer->save($archivo_excel);            
            // Cerrar la conexión a la base de datos
            echo "Datos exportados correctamente a Excel en $archivo_excel";
            //-------
        }catch(Exception $e){
            error_log("ERROR EN crearExcel: ".$e->getMessage());
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }

}

$object = new Excel();
echo "estoy probando excel<br>----------------------<br>";
$object->crearExcel("empleados");
//$object->numeroColumnas();//devuelve el numero de columnas de la tabla
//$object->obtenerNombresColumnas("productos")


?>