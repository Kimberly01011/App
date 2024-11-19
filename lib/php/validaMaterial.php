<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaMaterial(false|string $material)
{

 if ($material === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el material.",
   type: "/error/faltamaterial.html",
   detail: "La solicitud no tiene el valor de material."
  );

 $trimMaterial = trim($material);

 if ($trimMaterial === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Material en blanco.",
   type: "/error/materialenblanco.html",
   detail: "Pon texto en el campo material.",
  );

 return $trimMaterial;
}
