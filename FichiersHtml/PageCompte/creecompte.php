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
    <div class="compte" style = "height : 80rem; margin-top : 2rem ; margin-bottom : 2rem; justify-content: center;"> 
    <h1 style = "position : start ; margin-bottom: 3rem">Créer un compte</h1>
    <form action="creecompte.php" method="POST" enctype="multipart/form-data">
        <label for="Type"> Type de Compte </label><br>
        <select name="type" id="type" required>
            <option value="client">Sportif</option>
            <option value="prof">Coach</option>
        </select><br>
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="ville">Ville:</label><br>
        <input type="text" id="ville" name="ville" required><br>

        <label for="code_postal">Code Postal:</label><br>
        <input type="text" id="code_postal" name="code_postal" required><br>

        <label for="telephone">Téléphone:</label><br>
        <input type="text" id="telephone" name="telephone" required><br>

        <label for="carte_etudiant">Carte d'étudiant:</label><br>
        <input type="text" id="carte_etudiant" name="carte_etudiant"><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $type = $_POST["type"];
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $ville = $_POST["ville"];
                $code_postal = $_POST["code_postal"];
                $telephone = $_POST["telephone"];
                $carte_etudiant = $_POST["carte_etudiant"];
                $email = $_POST["email"];
                $mdp = $_POST["password"];
                $image = $_FILES['photo']['name'];
                
                // Process the data and insert into the database
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
                // Check if email already exists in the database
                $emailExistsQuery = "SELECT * FROM client WHERE email = '$email'";
                $emailExistsResult = $conn->query($emailExistsQuery);
                if ($emailExistsResult->num_rows > 0) {
                    header("Location: creecompte.php");
                    exit;
                } else {
                    if (ISSET($_FILES['photo']['name']) AND !empty($_FILES['photo']['name'])) {
                        $image = $_FILES['photo']['name'];
                        $image = pathinfo($image, PATHINFO_EXTENSION);
                        $image_tmp = $_FILES['photo']['tmp_name'];
                        $image_path = $email.".".$image;
                        move_uploaded_file($image_tmp, "../../photo/" .$image_path);
                    } else {
                        $image_tmp2 = "photo.png";
                    }
                    $sql = "INSERT INTO client (nom, prenom, ville, code_postal, telephone, carte_etudiant, email, mdp ,photo , typeCompte)
                    VALUES ('$nom', '$prenom', '$ville', '$code_postal', '$telephone', '$carte_etudiant', '$email', '$mdp', '$image_path' , '$type')";
                    // Execute the SQL query
                    $result = $conn->query($sql);
                    if ($result) {
                    header("Location: compte.php");
                    exit;
                    } 
                    else {
                        echo "<p style=\"font-size: 0.9rem;font-weight: lighter; margin-right: 40px;text-align: center;color: red;\">Email déjà existant <p>";
                    }
                }
                $conn->close();
            }
            ?>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="photo">Photo de profil:</label><br>
        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg"><br>  
        <input type="submit" value="Submit">
    </form>
    <p>Vous avez déjà un compte ? <a href="compte.php"> Connectez-vous </a></p>
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