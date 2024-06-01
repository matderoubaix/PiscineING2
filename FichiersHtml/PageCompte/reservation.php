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
                <a href="../PageRendez-vous/rendez-vous.html">RENDEZ-VOUS</a>
            </div>
            <div class="menu">
                <a href="compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>
    
    <div class="compte" style = "height : 70rem; margin-top : 2rem ; margin-bottom : 2rem; justify-content: center;"> 
    <h1 style = "position : start ; margin-bottom: 3rem">Se connecter</h1>
        <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the email and password from the form
            if (isset($_POST['reserver'])) $_SESSION["id_cour"] = $_POST['reserver'];
            $id_cour = $_SESSION["id_cour"] ; 
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
            $sql = "SELECT * FROM cours WHERE id = '$id_cour'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "Vous vous apprêtez à réserver le cours suivant : <br>";
                echo "<table> <tr> <th>Nom</th> <th>Description</th> <th>Date</th> <th>Heure</th> <th>Durée</th> <th>Prix</th> </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr> <td>" . $row["nom"] . "</td> 
                    <td>" . $row["description"] . "</td> 
                    <td>" . $row["date"] . "</td> 
                    <td>" . $row["heure"] . "</td> 
                    <td>" . $row["duree"] . " heure(s) </td>
                    <td>" . $row["prix"] . " euro(s) </td> </tr>";
                }
                echo "</table>";
                $sql = "SELECT * FROM coordonnéebancaire WHERE client_id = ".$_COOKIE["id"];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<p> Votre carte bancaire : " . $row["numero_de_carte"] . "</p>";
                }
                else {
                echo "<h1> Entrée vos coordonnées bancaires pour réserver un cours </h1>";
                echo "<form action=\"coordonneBancaire.php\" method='POST'>
                <div style = \"display : block; margin-left : 7rem ; margin-right : auto ;   \">
                <select name = \"type\" >
                <option> visa </option>
                <option> carte bancaire </option>
                <option> mastercard </option>
                </select>               
                <br><label for='numero'>Numéro de carte bancaire</label>
                <input type='text' id='numero' name='numero' required>
                <br><label for='date'>Date d'expiration</label>
                <input type='date' id='date' name='date' required>
                <br><label for='crypto'>Cryptogramme</label>
                <input type='text' id='crypto' name='crypto' required>
                <input type='submit' value='Payer'>
                </div>
                </form>";
                }
            }
            $conn->close();
        }
        ?>
        <button onclick="validation()">Valider le Cours</button>
        <script>
            function validation() {
                alert("Votre réservation a bien été prise en compte");
                window.location.href = 'valider.php';
            }
        </script>
        <button onclick="window.location.href = 'compte.php';">Retour</button>
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