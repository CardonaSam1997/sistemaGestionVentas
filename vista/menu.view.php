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
            <div class="col-md-4">
                <div class="menuDespl">                    
                    <ul>
                        <li>uno</li>
                        <li>dos</li>
                        <li>tres</li>
                        <li>cuatro</li>                        
                        <li>
                            <i class="fa-solid fa-users fa-xl"></i>
                            cinco
                        </li>
                    </ul>
                </div>
                <div id="menuHamburg">                
                   <i class="fa-solid fa-bars fa-2xl " style="color: #deddda;"></i>
                </div>
            </div>
            <div class="col-md-4">BIENVENIDO</div>
            <div class="col-md-4">
                <ul>
                    <li>
                        <i class="fa-solid fa-envelope" style="color: #a51d2d;"></i>
                    </li>
                    <li>
                        <i class="fa-solid fa-user" style="color: #c01c28;"></i>
                    </li>
                    <li id="datos"> <!-- cambiar icono por imagen-->                        
                        <h6><?php echo $_SESSION['usuario']; ?></h6>
                        <p><?php echo $_SESSION['rol']; ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main id="menuPrincipal">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
        </div>
    </main>
    <a href="<?php ?>">cerrar sesion</a>

    <div class="subir">
        <a href="#menu">
            <i class="fa-solid fa-arrow-up fa-2xl" style="color: #c0bfbc;"></i>
        </a>
    </div>
    <script src="../vista/js/app.js"></script>
</body>
</html>