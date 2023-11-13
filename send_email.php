<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Función para evitar enviar correos si no es una solicitud POST válida
function redirectIfNotPost()
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: tu_pagina_de_formulario.php");
        exit();
    }
}

redirectIfNotPost(); // Llama a la función para verificar si es una solicitud POST

// Recopila los datos del formulario
$name = isset($_POST["name"]) ? $_POST["name"] : "";
$tele = isset($_POST["tele"]) ? $_POST["tele"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$selectedServices = isset($_POST["servicios"]) ? implode(", ", $_POST["servicios"]) : ""; // Combina los servicios seleccionados en una cadena

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'santiagodhenares@gmail.com'; // Reemplaza con tu dirección de correo
    $mail->Password = 'ughg fzbn fxyb jiec'; // Reemplaza con tu contraseña de correo
    $mail->SMTPSecure = 'tls'; // Usa 'ssl' si es necesario
    $mail->Port = 587; // Puerto SMTP, ajusta según tu configuración

    // Configuración del remitente
    $mail->setFrom($email, $name);
    $mail->addAddress('santiagodhenares@gmail.com'); // Dirección del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Solicitud Presupuesto';
    $mail->Body = '<html><body><p>Contacto: ' . $name . ' - Celular: ' . $tele . '</p><p>Solitud de Presupuesto de: ' . $selectedServices . '</p><p>Correo: ' . $email . '</p></body></html>';

    $mail->send();

    // Redirige al usuario a tu página principal
    header("Location: https://sofiamagnetica.com");
    exit();

} catch (Exception $e) {
    // Devuelve una respuesta JSON para manejarla con JavaScript
    echo json_encode(array("status" => "error", "message" => "Error al enviar el correo: " . $mail->ErrorInfo));
}
?>