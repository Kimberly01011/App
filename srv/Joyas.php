<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JOYA.php";

ejecutaServicio(function () {

    // Seleccionamos todos los registros de la tabla JOYA, ordenados por nombre
    $lista = select(
        pdo: Bd::pdo(),
        from: JOYA,
        orderBy: JOYA_NOMBRE
    );

    $render = "";
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[JOYA_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[JOYA_NOMBRE]);
        $color = htmlentities($modelo[JOYA_COLOR]);
        $material = htmlentities($modelo[JOYA_MATERIAL]);

        $render .=
            "<li>
                <p>
                    <a href='modifica.html?id=$id'>$nombre $color $material</a>
                </p>
            </li>";
    }

    // Devolvemos la lista renderizada en formato JSON
    devuelveJson(["lista" => ["innerHTML" => $render]]);
});
