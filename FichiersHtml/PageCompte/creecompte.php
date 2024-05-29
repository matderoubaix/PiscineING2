<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
</head>
<body>
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
    <form action="requete.php" method="POST" enctype="multipart/form-data">
        <h1>Créer un compte</h1>
        <label for="Type"> Type de Compte </label>
        <select name="type" id="type" required>
            <option value="sportif">Sportif</option>
            <option value="coach">Coach</option>
        </select><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="ville">Ville:</label>
        <input type="text" id="ville" name="ville" required><br>

        <label for="code_postal">Code Postal:</label>
        <input type="text" id="code_postal" name="code_postal" required><br>

        <label for="telephone">Téléphone:</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <label for="carte_etudiant">Carte d'étudiant:</label>
        <input type="text" id="carte_etudiant" name="carte_etudiant" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="photo">Photo de profil:</label>
        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg"><br>  
        <input type="submit" value="Submit">
    </form>
    <p>Vous avez déjà un compte ? <a href="compte.php"> Connectez-vous </a></p>
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
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="../PageRecherche/recherche.html">Rechercher</a></li>
                <li><a href="../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="compte.php">Votre compte</a></li>
            </ul>
        </div>
        <div class="liens">
            <p class="titreclasse">Contacts</p>
            <ul>
                <li><a href="mailto:sportify@edu.ece.fr">Contactez nous : sportify@edu.ece.fr</a></li>
                <li><a href="tel:+33776691561">Appelez nous : +33776691561</a></li>
                <li><a href="https://maps.app.goo.gl/p6xMkrBTmMQZojXu7">Écrivez nous ou venez nous rencontrer : <address>10 rue Sextius Michel, 75015 Paris, FRANCE</address<</a></li>
            </ul>

        </div>
    </footer>
</body>
</html>