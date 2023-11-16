<?php


function errorInicioSesion($verificar){    
    
}

function paginacion(){

}

function fechaHoy(){
    $r = getdate(); 
    $fecha = $r['year'] . '-' . sprintf("%02d", $r['mon']) . '-' . sprintf("%02d", $r['mday']);    
    return $fecha;
}

function traerPagina(){    
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




//no esta vinculado
function prueba(){
    if(isset($_GET['pagina'])){
        $vinculo = $_GET['pagina'];
    }
    return $vinculo;
}

?>