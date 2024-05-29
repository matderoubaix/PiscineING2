<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre compte - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
<body>
    <?php
        session_start();
        if (isset($_SESSION["email"])) {
            header("Location: accueilcompte.php");
            exit();
        }
        
    ?>
    <nav>

        <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
        
        <div class="onglets">
            <div class="menu">
                <a href="../PageAccueil/index.html">ACCUEIL</a>
            </div>
            <div class="menu">
                <a href="../PageParcourir/parcourir.html">PARCOURIR</a>
            </div>
            <div class="menu">
                <a href="../PageRecherche/recherche.html">RECHERCHER</a>
            </div>
            <div class="menu">
                <a href="../PageRendez-vous/rendez-vous.html">RENDEZ-VOUS</a>
            </div>
            <div class="menu">
                <a href="compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>


    <div class="section1">
    <form action="startsession.php" method="POST">
        Email :
        <input type="text" id="userId" name="userId" placeholder = "Email" required> <br>
        Mot de passe :
        <input type="password" id="passwd" name="passwd" placeholder = "Mot de passe" required> <br>
        <input type = "submit" value = "Se connecter">
    </form>
    <p>Pas de compte ? <a href = "creecompte.php"> Créer un compte </a></p>
    </div>


    <footer>
        <div class="brand">
            <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
            <hr>
            <p>© Copyrights. All rights reserved. 2024 Sportify.com</p>
        </div>
        <div class="liens">
            <p class="titreclasse">Liens rapides</p>
            <ul>
                <li><a href="../../PageAccueil/index.html">Accueil</a></li>
                <li><a href="../../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="../../PageRecherche/recherche.html">Rechercher</a></li>
                <li><a href="../../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="../../PageCompte/compte.php">Votre compte</a></li>
            </ul>
        </div>
        <div class="liens">
            <p class="titreclasse">Contacts</p>
            <ul>
                <li><a href="mailto:sportify@edu.ece.fr">Contactez nous : sportify@edu.ece.fr</a></li>
                <li><a href="tel:+33776691561">Appelez nous : +33776691561</a></li>
                <li><a href="https://maps.app.goo.gl/p6xMkrBTmMQZojXu7">Écrivez nous ou venez nous rencontrer : <address>10 rue Sextius Michel, 75015 Paris, FRANCE</address></a></li>
            </ul>
        </div>
    </footer>

</body>
</html>