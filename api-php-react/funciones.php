<?php
/*

------------------------------------------------------------------------------------------------
Creado por🆁🅼🅽 2022 07 01

------------------------------------------------------------------------------------------------
*/ ?>
<?php

function eliminarVideojuego($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("DELETE FROM lab_RMA_OS WHERE id = ?");
    return $sentencia->execute([$id]);
}

function actualizarVideojuego($videojuego)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE lab_RMA_OS SET nombre = ?, precio = ?, calificacion = ? WHERE id = ?");
    return $sentencia->execute([$videojuego->nombre, $videojuego->precio, $videojuego->calificacion, 1]);
}
function actualizarVideojuego1($videojuego)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("UPDATE lab_RMA_OS SET status = ?, pre1 = ?, pre2 = ?, pre3 = ?, pre4 = ?, comen = ? WHERE ID_ticket = ?");
    return $sentencia->execute(["cerrado",$videojuego->pre1, $videojuego->pre2, $videojuego->pre3, $videojuego->pre4, $videojuego->comen ,$videojuego->id]);
}
function obtenerVideojuegoPorId($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT id, nombre, precio, calificacion FROM lab_RMA_OS WHERE id = ?");
    $sentencia->execute([$id]);
    return $sentencia->fetchObject();
}

function obtenerVideojuegos()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id  FROM lab_RMA_OS");
    return $sentencia->fetchAll();
}

function obtenerBanner()
{
    $bd = obtenerConexion();
    $sentencia = $bd->query("SELECT id, img  FROM lab_banner");
    return $sentencia->fetchAll();
}
function obtenerBannerPorId($id)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("SELECT * FROM lab_banner WHERE lang = ? ORDER BY prioridad desc");
    $sentencia->execute([$id]);
    return $sentencia->fetchAll();
}
function guardarVideojuego($videojuego)
{
    $bd = obtenerConexion();
    $sentencia = $bd->prepare("INSERT INTO lab_RMA_OS(nombre, precio, calificacion) VALUES (?, ?, ?)");
    return $sentencia->execute([$videojuego->nombre, $videojuego->precio, $videojuego->calificacion]);
}

function obtenerVariableDelEntorno($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}
function obtenerConexion()
{
    $password = obtenerVariableDelEntorno("MYSQL_PASSWORD");
    $user = obtenerVariableDelEntorno("MYSQL_USER");
    $dbName = obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
    $database = new PDO('mysql:host=localhost;dbname=' . $dbName, $user, $password);
/* $database = new PDO('mysql:host=170.247.226.26;dbname=' . $dbName, $user, $password); */
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}
