<?php
define("urlsite", "http://localhost/tfg/hostapp/");

define("ROOT", __DIR__ ."/");
//definicion de ruta base para todo el proyecto
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost/tfg/hostapp/"
   : "http://hostapp.com/"
);

