<?php
// Incluye el archivo autoload.php de PHPMailer
require 'vendor/autoload.php';

// Crea una instancia de PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();

// Configuración del servidor SMTP
$mail->isSMTP();
$mail->Host = 'localhost'; // Cambia esto por tu servidor SMTP
$mail->SMTPAuth = true;
$mail->Username = 'tu_usuario_smtp'; // Cambia esto por tu nombre de usuario SMTP
$mail->Password = 'tu_clave_smtp'; // Cambia esto por tu contraseña SMTP
$mail->SMTPSecure = 'tls'; // Puedes cambiar a 'ssl' si es necesario
$mail->Port = 1025; // Cambia esto por el puerto SMTP de tu servidor

// Configuración del remitente y destinatario
$mail->setFrom('dagas.airedala@gmail.com', 'Dagas');
$mail->addAddress('scardona0297@gmail.com', 'Samuel');

// Contenido del correo
$mail->isHTML(true);
$mail->Subject = 'Asunto del correo';
$mail->Body = 'Cuerpo del mensaje';

// Intenta enviar el correo
if ($mail->send()) {
    echo 'El correo se envió correctamente';
} else {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
echo "enviado";


?>