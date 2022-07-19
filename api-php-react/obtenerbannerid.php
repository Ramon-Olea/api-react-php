<?php
/*

------------------------------------------------------------------------------------------------
Creado por🆁🅼🅽 2022 07 01

------------------------------------------------------------------------------------------------
*/ ?>
<?php
include_once "cors.php";
include_once "funciones.php";
if (!isset($_GET["id"])) {
    echo json_encode(null);
    exit;
}
$id = $_GET["id"];
$videojuegos = obtenerBannerPorId($id);
echo json_encode($videojuegos);
