<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopila los datos del formulario
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $tele = isset($_POST["tele"]) ? $_POST["tele"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $mail = new PHPMailer(true);
    $selectedServices = isset($_POST["servicios"]) ? implode(", ", $_POST["servicios"]) : ""; // Combina los servicios seleccionados en una cadena
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
        echo "OK";

    } catch (Exception $e) {
        echo "Error al enviar el correo: " . $mail->ErrorInfo;
    }
} else {
    // Si no es una solicitud POST, redirige al formulario (opcional)
    header("Location: tu_pagina_de_formulario.php");
    exit();
}
?>