<?php

session_unset();
session_destroy();
 

include("layouts/header.php");
?>
<header>
<nav class="menuNav">
    <div class="icon">
        <a class="navbar-logo" href="#">
            <img src="<?php print HTTP; ?>vista/res/HostApp.png">
        </a>
    </div>
    <div class="opcionMenuDiv">
    </div>
</nav>
</header>
<div class="wraper_form">
<h1>Has cerrado sesión correctamente</h1>
<a id="submit_a" class="btn" href="index.php">Inicia sesión</a>
</div>
<?php 
    include("layouts/footer.php");
?>