<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JOYA.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");

 $modelo =
  selectFirst(pdo: Bd::pdo(),  from: JOYA,  where: [JOYA_ID => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Joya no encontrada.",
   type: "/error/Joya.html",
   detail: "No se encontró ninguna Joya con el id $idHtml.",
  );
 }

 devuelveJson( [
  "id" => ["value" => $id],
  "nombre" => ["value" => $modelo[JOYA_NOMBRE]],
  "color" => ["value" => $modelo[JOYA_COLOR]],
   "material" => ["value" => $modelo[JOYA_MATERIAL]]
 ]);
});
