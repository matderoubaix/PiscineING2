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
    <div class="compteComtainer">
        <div class="compte" style = "height : min-content; width: min-content; margin-top : 2rem ; margin-bottom : 2rem; justify-content: center;"> 
            <?php
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
                $sql = "SELECT * FROM client WHERE typeCompte != \"admin\"";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<h1 style = 'position : start ; margin: 2rem'>Liste des clients</h1>";
                    echo "<div style = \"overflow: scroll; max-height: 60vh;\">";
                    echo "<table> <tr style='position: sticky'> <th>Nom</th> <th>Prénom</th> <th>Ville</th> <th>Code Postal</th> <th>Téléphone</th> <th>Email</th> <th>Carte d'étudiant</th> <th> Type </th> <th> </th> </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<form action= \"modifiercompte.php\" method = \"POST\"><tr> <td>" . $row["nom"] . "</td> 
                        <td>" . $row["prenom"] . "</td> 
                        <td>" . $row["ville"] . "</td> 
                        <td>" . $row["code_postal"] . "</td> 
                        <td>" . $row["telephone"] . "</td> 
                        <td>" . $row["email"] . "</td> 
                        <td>" . $row["carte_etudiant"] . "</td>
                        <td>".$row["typeCompte"]."</td>
                        <td><button type=\"submit\" name=\"id_modif\" value=\"".$row["id"]."\">Modifier</button></td>
                        </form>";
                    }
                    echo "</table>";
                    echo "</div> 
                    <button type=\"submit\" onclick=\"window.location.href = 'creecompte.php';\" name=\"ajout\" value=\"ajout\">Ajouter un nouveau compte</button> ";

                } else {
                    echo "0 results";
                }
            ?>
            <button type="submit" onclick="window.location.href = 'deconnexion.php';" name="retour" value="retour">Déconnexion</button>
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