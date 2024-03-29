<?php 
    $titulo; 
    if(isset($_GET['pagina'])){
        $titulo = $_GET['pagina'];
    }else{
        $titulo = "Menu principal";
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../vista/css/estilos.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/902877b656.js" crossorigin="anonymous"></script>
    <!-- CHART (Graficos) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
</head>
<body>
    <header id="menu">
        <div class="row">
            <!-- APLICAR ESTOS VALORES DESDE EL CSS -->
            <div class="col-md-4" >
                <div class="menuDespl">                    
                    <ul id="lista">
                        <!-- a PELEAR NUEVAMENTE CON LOS PUNTOS :/ -->
                        <a href="menuPrincipal.php?pagina=Menú principal">
                            <li class="cont-lista">
                                <i class="fa-solid fa-shop fa-xl" ></i>
                                <p> Menu principal</p>
                            </li>
                        </a>
                        <a href="inventario.php?pagina=Inventario">
                            <li class="cont-lista">
                            <i class="fa-solid fa-boxes-stacked fa-xl"></i>
                                <p> Productos</p>
                            </li>                            
                        </a>
                        <a href="facturas.php?pagina=Facturas">
                            <li class="cont-lista">                                
                                <i class="fa-regular fa-credit-card fa-xl"></i>
                                <p> Facturas </p>
                            </li>
                        </a>
                        <a href="clientes.php?pagina=Clientes">
                            <li class="cont-lista">
                                <i class="fa-solid fa-user-plus fa-xl"></i>                                
                                <p> Clientes</p>
                            </li>                            
                        </a>
                        <a href="empleados.php?pagina=empleados">
                            <li class="cont-lista">
                                <i class="fa-solid fa-users fa-xl"></i>
                                <p> Empleados</p>
                            </li>
                        </a>
                        <a href="proveedores.php?pagina=Proveedores">
                            <li class="cont-lista">
                            <i class="fa-solid fa-truck-moving fa-xl"></i>
                                <p> Proveedores</p>
                            </li>
                        </a>
                        <a href="configuracion.php?pagina=Configuración">
                            <li class="cont-lista">
                                <i class="fa-solid fa-gear fa-xl"></i>
                               <p> Configuración</p>
                            </li>
                        </a>
                        <a href="">
                            <li class="cont-lista">                                
                                <i class="fa-solid fa-door-open fa-xl" style="color: #ffffff;"></i>
                                <p>Cerrar sesión </p>
                            </li>
                        </a>
                    </ul>
                </div>
                <div id="menuHamburg">                
                   <i class="fa-solid fa-bars fa-2xl " style="color: #deddda;"></i>
                </div>                
            </div>
            <div class="col-md-4">
                <!-- AQUI PENSABA PONER EL NOMBRE DEL AREA EN EL QUE ESTABA -->
            </div>
            <div class="col-md-4">
                <ul id="usuario">
                    <li>                        
                        <?php if($respuesta === false): ?>
                            <i class="fa-solid fa-bell fa-shake fa-xl" style="color: #e66100;"></i>
                        <?php else: ?>
                            <i class="fa-solid fa-bell fa-xl" style="color: #e66100;"></i>
                        <?php endif; ?>
                    </li>                    
                    <li>
                        <h6><?php if(isset($_SESSION['usuario'])) echo $_SESSION['usuario']; ?></h6>
                        <p><?php if(isset($_SESSION['rol'])) echo $_SESSION['rol']; ?></p>
                    </li>                   
                </ul>
            </div>
        </div>
    </header>