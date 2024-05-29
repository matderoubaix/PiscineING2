<?php
    setcookie("email", "", time() - 3600);
    setcookie("type", "", time() - 3600);
    header("Location: compte.php");
    exit();
    ?>