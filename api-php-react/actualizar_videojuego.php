<?php
/*

------------------------------------------------------------------------------------------------
Creado por🆁🅼🅽 2022 07 01

------------------------------------------------------------------------------------------------
*/ ?>
<?php
include_once "cors.php";
$videojuego = json_decode(file_get_contents("php://input"));
include_once "funciones.php";
$resultado = actualizarVideojuego1($videojuego);
echo json_encode($resultado);

