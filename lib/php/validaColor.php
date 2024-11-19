<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaColor(false|string $color)
{

 if ($color === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el color.",
   type: "/error/faltacolor.html",
   detail: "La solicitud no tiene el valor de color."
  );

 $trimColor = trim($color);

 if ($trimColor === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Color en blanco.",
   type: "/error/colorenblanco.html",
   detail: "Pon texto en el campo color.",
  );

 return $trimColor;
}
