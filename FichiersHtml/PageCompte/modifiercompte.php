<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre compte - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
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
                <a href="compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>
    
    <div class="compte" style = "height : min-content; margin-top : 2rem ; margin-bottom : 2rem; justify-content: center;"> 
        <?php
            session_start();
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
            // Retrieve the email and password from the form
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if (isset($_POST['modif'])) 
                {
                    $id_modif = $_SESSION["id_modif"];
                    $sql = "SELECT * FROM client WHERE id = '$id_modif'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if (empty($_POST['typeCompte'])) {
                        $typeCompte = $row["typeCompte"];
                    } else {
                        $typeCompte = $_POST['typeCompte'];
                    }
                    if (empty($_POST['nom'])) {
                        $nom = $row["nom"];
                    } else {
                        $nom = $_POST['nom'];
                    }
                    if (empty($_POST['prenom'])) {
                        $prenom = $row["prenom"];
                    } else {
                        $prenom = $_POST['prenom'];
                    }
                    if (empty($_POST['ville'])) {
                        $ville = $row["ville"];
                    } else {
                        $ville = $_POST['ville'];
                    }
                    if (empty($_POST['code_postal'])) {
                        $code_postal = $row["code_postal"];
                    } else {
                        $code_postal = $_POST['code_postal'];
                    }
                    if (empty($_POST['telephone'])) {
                        $telephone = $row["telephone"];
                    } else {
                        $telephone = $_POST['telephone'];
                    }
                    if (empty($_POST['carte_etudiant'])) {
                        $carte_etudiant = $row["carte_etudiant"];
                    } else {
                        $carte_etudiant = $_POST['carte_etudiant'];
                    }
                    $sql = "UPDATE client SET typeCompte = '$typeCompte', nom = '$nom', prenom = '$prenom', ville = '$ville', code_postal = '$code_postal', telephone = '$telephone', carte_etudiant = '$carte_etudiant' WHERE id = '$id_modif'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Modification effectuée avec succès');</script>";
                        session_destroy();
                        header("Location: compte.php");
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $conn->error;
                    }
                }
                elseif (isset($_POST['suppr'])) 
                {
                    $id_modif = $_SESSION["id_modif"];
                    $sql = "SELECT photo FROM client WHERE id = '$id_modif'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $photo = $row["photo"];
                    if ($photo != "photo.png") {
                        unlink("../../photo/".$photo);
                    }
                    $sql = "DELETE FROM salles WHERE id IN (SELECT id FROM cours WHERE prof_id = '$id_modif')";
                    $result = $conn->query($sql);
                    $sql = "DELETE FROM cours WHERE prof_id = '$id_modif'";
                    $result = $conn->query($sql);
                    $sql = "DELETE FROM sportclient WHERE client_id = '$id_modif'";
                    $result = $conn->query($sql);
                    $sql = "DELETE FROM coordonnéebancaire WHERE client_id = '$id_modif'";
                    $result = $conn->query($sql);
                    $sql = "DELETE FROM chat WHERE emetteur_id = '$id_modif' OR recepteur_id = '$id_modif'";
                    $result = $conn->query($sql);
                    $sql = "DELETE FROM reservation WHERE client_id = '$id_modif'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Suppression effectuée avec succès');</script>";
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $conn->error;
                    }
                    $sql = "DELETE FROM client WHERE id = '$id_modif'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Suppression effectuée avec succès');</script>";
                        session_destroy();
                        header("Location: compte.php");
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $conn->error;
                    }
                }
                elseif (isset($_POST['id_modif'])) $_SESSION["id_modif"] = $_POST['id_modif'];
               
                $id_modif = $_SESSION["id_modif"] ; 
                // TODO: Implement your login verification logic here
                $sql = "SELECT * FROM client WHERE id = '$id_modif'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "<h1 style='margin: 15px'> Modification <h1>
                <form action = \"modifiercompte.php\" method = \"POST\">
                <select name=\"typeCompte\" id=\"typeCompte\">
                    <option value=\"client\">Sportif</option>
                    <option value=\"prof\">Coach</option>
                    <option value=\"admin\">Admin</option>
                </select><br>
                <label for=\"nom\">Nom :</label>
                <input type=\"text\" id=\"nom\" name=\"nom\" value = \"".$row["nom"]."\" ><br>
                <label for=\"prenom\">Prénom :</label>
                <input type=\"text\" id=\"prenom\" name=\"prenom\" value = \"".$row["prenom"]."\" ><br>
                <label for=\"ville\">Ville :</label>
                <input type=\"text\" id=\"ville\" name=\"ville\" value = \"".$row["ville"]."\" ><br>
                <label for=\"code_postal\">Code Postal :</label>
                <input type=\"text\" id=\"code_postal\" name=\"code_postal\" value = \"".$row["code_postal"]."\"><br>
                <label for=\"telephone\">Téléphone :</label>
                <input type=\"text\" id=\"telephone\" name=\"telephone\" value = \"".$row["telephone"]."\" ><br>
                <label for=\"carte_etudiant\">Carte d'étudiant :</label>
                <input type=\"text\" id=\"carte_etudiant\" name=\"carte_etudiant\" value = \"".$row["carte_etudiant"]."\"><br>
                <button type=\"submit\" name=\"modif\" value=\"modif\">Modifier</button>
                <button type=\"submit\" name=\"suppr\" value=\"suppr\">Supprimer</button>
                </form>";
            }
        ?>
        <button onclick="window.location.href = 'panneladmin.php';">Retour</button>
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