<?php
// If you are using Composer
require 'vendor/autoload.php';

// If you are not using Composer (recommended)
// require("path/to/sendgrid-php/sendgrid-php.php");

$destino=$_POST['correo'];
$mensaje=$_POST['mensaje'];
$from = new SendGrid\Email(null, "omarCasasolasMerida@gmail.com");
$subject = "Aqui le pasamos su password del sitio ";
$to = new SendGrid\Email(null, $destino);
$content = new SendGrid\Content("text/plain", $mensaje);
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();
    
//header("Location:index.php");
?>
