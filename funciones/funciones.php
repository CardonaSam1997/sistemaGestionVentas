<?php

function errorInicioSesion($verificar){
    
}

function paginacion(){

}


function fechaHoy(){
    $fechaHoy = new DateTime();
    $hoy = $fechaHoy->format("Y-m-d");
    return $hoy;
}

function traerPagina(){    //este no se esta usando
    if(isset($_GET['pagina'])){        
        switch ($_GET['pagina']) {
            case "configuracion":
                header("Location: ../controlador/configuracion.php");
                break;
            case "inventario":
                header("Location: ../controlador/inventario.php");
                break;
            case "usuarios":
                header("Location: ../controlador/usuarios.php");
                break;
            default:
                header("Location: ../controlador/menuPrincipal.php");
                break;            
        }
    }
}

//devulve la diferencia de dias entre ambas fechas
function compararFechas($fecha){
    //comparo dias de diferencia
    $tiempo1 =  new DateTime('now', new DateTimeZone('America/Bogota'));//hoy
    //un array con diferentes fechas las cuales
    //van a ser recorridas para anotar los diferentes 
    //dias que hay entre la fecha actual 
    //y la fecha de vencimiento del producto
    $tiempo2 = new DateTime($fecha);
    $tiempo = $tiempo1->diff($tiempo2);//diferencia de dias
    return $tiempo->format('%a');
    //->format('%a');    
}
echo compararFechas("2023-12-04");


$sesionP = [
    "permisos" => 
    ["uno","dos","tres","cuatro",
    ["r","d"]]
];
?>