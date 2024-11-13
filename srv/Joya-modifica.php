<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JOYA.php";

ejecutaServicio(function () {

    // Recuperar el ID y los datos enviados en la solicitud
    $id = recuperaIdEntero("id");
    $nombre = recuperaTexto("nombre");
    $color = recuperaTexto("color");
    $material = recuperaTexto("material");

    // Validar los datos recibidos
    $nombre = validaNombre($nombre);
    $color = validaNombre($color);
    $material = validaNombre($material);

    // Actualizar los datos en la tabla JOYA
    update(
        pdo: Bd::pdo(),
        table: JOYA,
        set: [
            JOYA_NOMBRE => $nombre,
            JOYA_COLOR => $color,
            JOYA_MATERIAL => $material
        ],
        where: [JOYA_ID => $id]
    );

    // Devolver los datos actualizados en formato JSON
    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "color" => ["value" => $color],
        "material" => ["value" => $material]
    ]);
});
