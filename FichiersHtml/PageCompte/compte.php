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
        if (isset($_COOKIE["email"])) {
            header("Location: accueilcompte.php");
            exit();
        }
        
    ?>
    <nav>

        <img class="logo" src="../../images/logoSportify.png" alt="Logo de Sportify">
        
        <div class="onglets">
            <div class="menu">
                <a href="../PageAccueil/index.php">ACCUEIL</a>
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
    
    <div class="compte" style = "height : 40rem; margin-top : 2rem ; margin-bottom : 2rem; justify-content: center;"> 
    <h1 style = "position : start ; margin-bottom: 3rem">Se connecter</h1>
    <form action="compte.php" method="POST">
        Email :
        <input type="text" id="userId" name="userId" placeholder = "Email" required> <br>
        Mot de passe :
        <input type="password" id="passwd" name="passwd" placeholder = "Mot de passe" required> <br>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the email and password from the form
            $email = $_POST["userId"];
            $mdp = $_POST["passwd"];
            // TODO: Implement your login verification logic here
            $servername = "localhost";
            $username= "root";
            $password= "";
            $dbname = "sportify";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM client WHERE email = '$email' AND mdp = '$mdp'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                setcookie("email", $email, time() + 3600, "/");
                $row = $result->fetch_assoc();
                $type = $row["typeCompte"];
                setcookie("id", $row["id"], time() + 3600, "/");
                echo $row["id"];
                setcookie("type", $type, time() + 3600, "/");
                setcookie("nom", $row["nom"], time() + 3600, "/");
                setcookie("prenom", $row["prenom"], time() + 3600, "/");
                setcookie("ville", $row["ville"], time() + 3600);
                setcookie("code_postal", $row["code_postal"], time() + 3600, "/");
                setcookie("telephone", $row["telephone"], time() + 3600, "/");
                setcookie("carte_etudiant", $row["carte_etudiant"], time() + 3600, "/");
                setcookie("photo", $row["photo"], time() + 3600, "/");
                header("Location: accueilcompte.php");
                exit();
            } else {
                echo "<p style=\"font-size: 0.9rem;font-weight: lighter; margin-right: 40px;text-align: center;color: red;\">Email ou mot de passe incorrect <p>";
            }
            $conn->close();
            }
        ?>
        <input type = "submit" value = "Se connecter">
    </form>
    <p>Pas de compte ? <a href = "creecompte.php"> Créer un compte </a></p>
    </div>
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
                <li><a href="../../PageAccueil/index.php">Accueil</a></li>
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