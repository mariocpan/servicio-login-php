<?php
// Respuesta en formato json
header("Content-Type: application/json");
// Lee los datos que envia al cliente
$datos = json_decode(file_get_contents("php://input"), true);
// Saca usuario y contraseña si no vienen queda vacio 
$usuario = $datos["usuario"] ?? "";
$clave = $datos["clave"] ?? "";
// Validación: usuario y contraseña no pueden estar vacios 
if ($usuario =="" || $clave == "") {
echo json_encode(["mensaje" => "Faltan datos"]);
exit;
}
// Archivo donde se guardan los usuarios 
$archivo = "usuarios.json";
// Si el archivo existe lo abrimos, si no empezamos con uno nuevo
$usuarios = file_exists($archivo) ? json_decode(file_get_contents($archivo), true):[];
// valida quue el usuario no este duplicado 
 if (isset($usuarios[$usuario])) {
   echo json_encode(["mensaje" => "El usuario ya se encuentra registrado"]);
 exit;
   }
// Guardamos la ficha: usuario y clave 
$usuarios[$usuario] = $clave;
// El archivador se vuelve a guardar con la  nueva ficha 
file_put_contents($archivo, json_encode($usuarios));
// Si todo salio bien
echo json_encode(["mensaje" => "Registro exitoso"]);
?>