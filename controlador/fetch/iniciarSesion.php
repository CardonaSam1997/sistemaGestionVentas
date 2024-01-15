<?php
header('content-type application/json');
require('../../modelo/Sesion.php');

$recuperar = new IniciarSesion();

$datos = [];
if(isset($_POST['recuperar'])){    
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        // El correo electrónico no es válido, maneja el error apropiadamente (puede ser un mensaje de error o redirección)
        echo json_encode(['error' => 'Correo electrónico no válido']);
        return;
    }
    $datos = $recuperar->recuperarPassw($email);
    echo json_encode($datos);
}



?>