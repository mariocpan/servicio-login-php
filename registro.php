<?php
header("Content-Type: application/json");
$datos = json_decode(file_get_contents("php://input"), true);
$usuario = $datos["usuario"] ?? "";
$clave = $datos["clave"] ?? "";
if ($usuario =="" || $clave == "") {
echo json_encode(["mensaje" => "Faltan datos"]);
exit;
}
echo json_encode(["mensaje" => "Datos recibidos"]);
?>