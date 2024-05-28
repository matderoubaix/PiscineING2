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
                <a href="compte.html">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        if (isset($_FILES['photo'])) {
            $image = $_FILES['photo']['name'];
            echo $image;
            $image_tmp = $_FILES['photo']['tmp_name'];
            $image_path = "../" . $image;
            move_uploaded_file($image_tmp, $image_path);
        }
        $type = $_POST["type"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $ville = $_POST["ville"];
        $code_postal = $_POST["code_postal"];
        $telephone = $_POST["telephone"];
        $carte_etudiant = $_POST["carte_etudiant"];
        $email = $_POST["email"];
        $mdp = $_POST["password"];
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
            echo "<h1>Erreur lors de la création du compte</h1>";
            echo "L'email existe déjà, veuillez utiliser un autre email.";
        } else {
            if ($type == "sportif") {
            $sql = "INSERT INTO client (nom, prenom, ville, code_postal, telephone, carte_etudiant, email, mdp)
            VALUES ('$nom', '$prenom', '$ville', '$code_postal', '$telephone', '$carte_etudiant', '$email', '$mdp')";
            } else {
            $sql = "INSERT INTO prof (nom, prenom, ville, code_postal, telephone, email, mdp)
            VALUES ('$nom', '$prenom', '$ville', '$code_postal', '$telephone', '$email', '$mdp')";
            }
            // Execute the SQL query
            $result = $conn->query($sql);
            if ($result) {
            echo "<h1>Compte créé avec succès</h1>";
            // Get the newly created user's ID
            $user_id = $conn->insert_id;
            // Display the user's ID
            echo "Votre identifiant utilisateur est : " . $user_id;
            } else {
            echo "<h1>Erreur lors de la création du compte</h1>";
            echo "Veuillez réessayer";
            }
        }
        $conn->close();
    }
    ?>

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
                <li><a href="compte.html">Votre compte</a></li>
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