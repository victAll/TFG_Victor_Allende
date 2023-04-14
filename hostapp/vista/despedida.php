<?php

session_unset();
session_destroy();
 

include("layouts/header.php");
?>

<div class="wraper_form">
<h1>Has cerrado sesión correctamente</h1>
<a id="submit_a" class="btn" href="index.php">Inicia sesión</a>
</div>
<?php 
    include("layouts/footer.php");
?>