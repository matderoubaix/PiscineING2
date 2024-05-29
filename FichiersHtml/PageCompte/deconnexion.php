<?php
    setcookie("email", "", time() - 3600);
    setcookie("type", "", time() - 3600);
    setcookie("nom", "", time() - 3600);
    setcookie("prenom", "", time() - 3600);
    setcookie("ville", "", time() - 3600);
    setcookie("code_postal", "", time() - 3600);
    setcookie("telephone", "", time() - 3600);
    setcookie("carte_etudiant", "", time() - 3600);
    header("Location: compte.php");
    exit();
    ?>