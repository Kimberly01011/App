<?php

require_once __DIR__ . "/INTERNAL_SERVER_ERROR.php";
require_once __DIR__ . "/devuelveProblemDetails.php";
require_once __DIR__ . "/devuelveProblemDetails.php";

function devuelveErrorInterno(Throwable $error)
{
    //print_r($error);die();
 devuelveProblemDetails(new ProblemDetails(
  status: INTERNAL_SERVER_ERROR,
  title: $error->getMessage(),
  type: "/error/errorinterno.html"
 ));
}
