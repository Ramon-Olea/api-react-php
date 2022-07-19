<?php
/*

------------------------------------------------------------------------------------------------
Creado por🆁🅼🅽 2022 07 01

------------------------------------------------------------------------------------------------
*/ ?>
<?php
$dominioPermitido = "https://laboratoriodefibraoptica.com";

/* $dominioPermitido = "http://localhost:3000"; */

header("Access-Control-Allow-Origin: $dominioPermitido");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");
