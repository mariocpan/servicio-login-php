<?php
// Responde en formato json
header("Content-Type: application/json");
// Datos que envia el cliente
$datos = json_decode(file_get_contents("php://input"), true);
// 
$usuario = $datos["usuario"] ?? "";
$clave = $datos["clave"] ?? "";
// Validación: usuario y contraseña no pueden estar vacios 
if ($usuario == "" || $clave =="") {
echo json_encode(["mensaje" => "Faltan datos"]);
exit;
}
// Abrimos archivaodor donde se guardan los usuarios
$archivo = "usuarios.json";
// Si esta se lee si no, usamos lista vacia
$usuarios = file_exists($archivo) ? json_decode(file_get_contents($archivo), true):[]; 
//verificar que el usuario exista  y que la clave sea correcta
if (isset($usuarios[$usuario]) && $usuarios[$usuario] == $clave) {
echo json_encode(["mensaje" => "ingreso exitoso "]);
} else {
echo json_encode(["mensaje" => "Usuario o clave incorrectos"]);
}
?>