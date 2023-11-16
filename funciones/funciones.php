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
    $tiempo1 = new DateTime("2023-11-16");//"2023-11-16"
    $tiempo2 = new DateTime($fecha);//$r[1]['fechaVencimiento']
    $tiempo = $tiempo1->diff($tiempo2);    
    return $tiempo->format('%a');
}

?>