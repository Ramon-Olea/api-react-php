<?php
/*

------------------------------------------------------------------------------------------------
Creado por🆁🅼🅽 2022 07 01

------------------------------------------------------------------------------------------------
*/ ?>
<?php
include_once "cors.php";
include_once "funciones.php";
$videojuegos = obtenerBanner();
echo json_encode($videojuegos);
