<?php
// Respuesta en formato json
header('Content-Type: application/json');
// Mensaje de prueba
echo json_encode(["mensaje" => "Servicio funcionando"]);
?>