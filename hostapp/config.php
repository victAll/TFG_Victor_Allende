<?php
define("urlsite", "http://localhost/tfg/hostapp/");

define("ROOT", __DIR__ ."/");
define("HTTP", ($_SERVER["SERVER_NAME"] == "localhost")
   ? "http://localhost/tfg/hostapp/"
   : "http://your_site_name.com/"
);

