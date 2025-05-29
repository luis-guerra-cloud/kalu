<?php
// 1. Obtener datos del formulario
$usuario = $_POST['user'];
$clave = $_POST['pass'];
$captcha = $_POST['g-recaptcha-response'];

// 2. Verifica que el CAPTCHA no esté vacío
if (!$captcha) {
    echo "Por favor verifica el captcha.";
    exit;
}

// 3. Validar reCAPTCHA con Google
$secretKey = "6Lfo_jMrAAAAAEcpuIONbHDFycnKFTEkOyR5TGUY"; // Clave secreta de reCAPTCHA
$ip = $_SERVER['REMOTE_ADDR'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip";

$response = file_get_contents($url);
$datos = json_decode($response);

// 4. Validar reCAPTCHA y credenciales
if ($datos->success && $usuario == "admin" && $clave == "1234") {
    echo "Acceso concedido. Mostrar formulario de productos...";
    // Aquí podrías redirigir o mostrar el formulario con session, etc.
} else {
    echo "Captcha inválido o credenciales incorrectas.";
}
?>