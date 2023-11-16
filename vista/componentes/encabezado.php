<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                            <li>
                                <i class="fa-solid fa-shop fa-xl" style="color: #ffffff;"></i>
                                Menu principal
                            </li>
                        </a>
                        <a href="inventario.php?pagina=Inventario">
                            <li>
                                <i class="fa-solid fa-bag-shopping fa-xl" style="color: #ffffff;"></i>
                                Productos
                            </li>                            
                        </a>
                        <a href="empleados.php?pagina=Empleados">
                            <li>
                                <i class="fa-solid fa-users fa-xl"></i>
                                Empleados
                            </li>
                        </a>
                        <a href="configuracion.php?pagina=Configuración">
                            <li>
                                <i class="fa-solid fa-gear fa-xl" style="color: #ffffff;"></i>
                                Configuración
                            </li>
                        </a>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET"><!-- AGREGAR input para enviar cerrar sesion por url -->
                            <li>
                                <button type="submit" name="cerrar" style="background-color: red;border:none;color:white;" value="cerrar">
                                    <i class="fa-solid fa-door-open fa-xl" style="color: #ffffff;"></i>
                                    Cerrar sesión
                                </button>                                
                            </li>
                        </form>
                    </ul>
                </div>
                <div id="menuHamburg">                
                   <i class="fa-solid fa-bars fa-2xl " style="color: #deddda;"></i>
                </div>
                <!-- <div style="position: absolute;right:-30px;">
                    <h2 style="text-align:right;padding-top:30px;right:-10px;">hola php</h2>
                </div> -->
            </div>
            <div class="col-md-4">
                <h2><?php echo "nombre area"; ?></h2>
            </div>
            <div class="col-md-4">
                <ul id="usuario">
                    <li>
                        <!-- AGREGAR UN CONDICIONAL -->
                        <!-- si en notificacion hay un nuevo registro y no se ha visto 
                        se muestra la campana que se mueve(shake)-->
                        <i class="fa-solid fa-bell fa-shake fa-xl" style="color: #e66100;"></i>
                        <!-- De lo contrario, se muestra la campana que esta quieta-->
                        <i class="fa-solid fa-bell fa-xl" style="color: #e66100;"></i>
                    </li>                    
                    <li> <!-- cambiar icono por imagen-->                        
                        <h6><?php echo $_SESSION['usuario']; ?></h6>
                        <p><?php echo $_SESSION['rol']; ?></p>                        
                    </li>
                    <li>
                        <i class="fa-solid fa-user fa-2xl" style="color: #a51d2d;"></i>                        
                    </li>
                </ul>
            </div>
        </div>
    </header>