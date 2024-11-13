<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JOYA.php";

ejecutaServicio(function () {
    ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
    // Recuperar los datos enviados en la solicitud
    $nombre = recuperaTexto("nombre");
    $color = recuperaTexto("color");
    $material = recuperaTexto("material");

    // Validar los datos
    $nombre = validaNombre($nombre);
    $color = validaNombre($color);
    $material = validaNombre($material);

    // Obtener la conexión a la base de datos
    $pdo = Bd::pdo();

    // Insertar el registro en la tabla JOYA
    insert(
        pdo: $pdo,
        into: "JOYA",
        values: [
            "JOYA_NOMBRE" => $nombre,
            "JOYA_COLOR" => $color,
            "JOYA_MATERIAL" => $material
        ]
    );

    // Obtener el último ID insertado
    $id = $pdo->lastInsertId();

    // Preparar la respuesta
    $encodeId = urlencode($id);
    devuelveCreated("/srv/Joya.php?id=$encodeId", [
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "color" => ["value" => $color],
        "material" => ["value" => $material],
    ]);
});
