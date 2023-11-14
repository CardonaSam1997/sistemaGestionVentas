<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
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
</head>
<body>
    <main id="sesion">
        <div class="row">
            <div class="capa"></div>
            <div class="col-md-6">
                <fieldset>
                    <h1>INICIO SESION</h1>
                    <form action="iniciarSesion.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" placeholder="Ingresar usuario" name="user" class="form-control" id="floatingInput">
                            <label for="floatingInput">Usuario:</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" placeholder="*********" name="passw" class="form-control" id="floatingPassword" >
                            <label for="floatingPassword">Contraseña:</label>
                        </div>
                        <?php if(!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <div class="cont-btn"><!-- CENTRAR BUTTON-->
                            <input type="submit" value="Ingresar" name="ingresar" class="btn btn-dark">                    
                        </div>
                        <p class="passw">¿Olvidaste la contraseña?</p>
                    </form>
                </fieldset>
            </div>
            <div class="col-md-6">
                <fieldset>
                    <h1>RECUPERAR PASSW</h1>
                    <form action="iniciarSesion.php" method="GET">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com" name="email">
                            <label for="floatingInput">Correo:</label>
                        </div>
                        <?php if(!empty($errorP)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $errorP; ?>
                            </div>
                        <?php endif; ?>
                        <div class="cont-btn">
                            <input type="submit" value="recuperar" name="recuperar" class="btn btn-dark" id="recuperar">
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </main>
    <script src="../vista/js/app.js"></script>
</body>
</html>