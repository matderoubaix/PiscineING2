<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - Sportify</title>
    <link rel="stylesheet" href="../../FichiersCss/style.css">
    <link rel="icon" href="../../images/iconLogo.png"/>
    <script>
        function allowMessage() {
            document.getElementById("newcate").disabled = false;
        }
        function disallowMessage() {
            document.getElementById("newcate").disabled = true;
        }
    </script>
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
                <a href="compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>
    <div class="compteComtainer">
    <div class="compteEvenement">
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
            if ($_COOKIE["type"] == "prof") {
                echo "
                <form action=\"ajoutcour.php\" method=\"POST\" enctype=\"multipart/form-data\">
                    <h1 style = \"position : start ; margin-bottom: 3rem\">Créer un Cour</h1>
                    <label for=\"Type\"> Type de Cour </label><br>
                    <select name=\"sport\" id=\"sport\" required>";
                    echo "<option value=\"Autre\" onclick = allowMessage() >Autre</option>";
                $sql = "SELECT * FROM `Sport`";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=\"".$row["id"]."\"onclick = disallowMessage()>".$row["nom"]."</option>";
                    }
                }
                echo"
                    </select><br>
                    <label for=\"newcate\">Nouveau sport:</label><br>
                    <input type=\"text\" id=\"newcate\" name=\"newcate\"><br>";
                echo "<label for=\"nomCour\">Nom du Cour:</label><br>
                    <input type=\"text\" id=\"nomCour\" name=\"nomCour\" ><br>

                    <label for=\"description\">Description:</label><br>
                    <input type=\"text\" id=\"description\" name=\"description\" ><br>

                    <label for=\"date\">Date:</label><br>
                    <input type=\"date\" id=\"date\" name=\"date\" ><br>

                    <label for=\"heure\">Heure:</label><br>
                    <input type=\"time\" id=\"heure\" name=\"heure\" ><br>

                    <label for=\"duree\">Durée:</label><br>
                    <input type=\"number\" id=\"duree\" name=\"duree\" ><br>

                    <label for=\"prix\">Prix:</label><br>
                    <input type=\"number\" id=\"prix\" name=\"prix\" ><br>

                    <input type=\"submit\" value=\"Créer\">
                </form>";
            }
            else if ($_COOKIE["type"] == "client")
            {
               // $sql = "SELECT * FROM `Cours` WHERE id NOT IN (SELECT cours_id FROM Reservation WHERE client_id = ".$_COOKIE["id"].")";
                if ($_COOKIE["type"] == "client") {
                    $sql = "SELECT * FROM cours WHERE id NOT IN (SELECT cours_id FROM Reservation WHERE client_id = ".$_COOKIE["id"].")AND date >= CURDATE()";
                    $result = $conn->query($sql);
                }
                echo "<h1 style = \" position: sticky; background-color : white\" >Les cours disponibles</h1>";
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '
                        <div class="compteboxcour">
                            <form method="POST" action="reservation.php">
                            <div class="compteboxCoursection">
                                    <h3>'.$row['nom'].'</h3>
                                    <h3>'.$row['description'].'</h3>
                                    
                                    <input type="hidden" name="reserver" value="'.$row['id'].'">
                                    <input type="submit" value="Réserver">
                            </div>
                            </form>
                        </div>';
                    }
                }
            }
            elseif ($_COOKIE["type"] == "admin")
            {
                header("location: panneladmin.php");
            }

    
    ?>
    </div>
    <div class="compte">
    <?php
    if ($_COOKIE["type"] == "client") {
        $sql = "SELECT * FROM cours WHERE id IN (SELECT cours_id FROM Reservation WHERE client_id = ".$_COOKIE["id"].") AND date >= CURDATE() ORDER BY date";
    }
    else {
        $sql = "SELECT * FROM cours WHERE prof_id =" .$_COOKIE["id"];
    }
        $result = $conn->query($sql);
        if (isset($_COOKIE["email"])) {
            echo "<img src=\"../../images/logoSportify.png\" alt=\"Logo de Sportify\" style = \"height: 10rem;\"><br>";
            echo "<div class=\"sectionCompte\">";
            echo "<div class=\"infoCompte\">";
            echo "<img src=\"../../photo/".$_COOKIE["photo"]."\"alt=\"Photo de profil\" style = \"width: 10rem; height: 10rem; border-radius: 50%;\"><br>";
            echo "<h1>".$_COOKIE["nom"]." ".$_COOKIE["prenom"]."<br></h1>";
            echo "</div>";
            echo "<div class=\"infoCompte\">";
            echo "<h3> téléphone : <h3>";
            echo "<h2>".$_COOKIE["telephone"]."</h2>";
            echo "<h3> email : <h3>";
            echo "<h2>".$_COOKIE["email"]."</h2>";
            echo "<h3> type : <h3>";
            echo "<h2>".$_COOKIE["type"]."</h2>";
            echo "<h3> ville : <h3>";
            echo "<h2>".$_COOKIE["ville"]."</h2>";
            echo "</div>";
            echo " </div>";
            
        } else {
            header("Location: compte.php");
        }
    ?>
    <?php
        echo "<section class=\"today-box\" id=\"today-box\">
                <span class=\"breadcrumb\">Aujourd'hui</span>
                <h3 class=\"date-title\">".date("Y-m-d")."</h3>
                <div class=\"plus-icon\">
                <i class=\"ion ion-ios-add\"></i>
                </div>
            </section>
            <section class=\"upcoming-events\">
                <div class=\"container\">
                    <h3>
                        Prochain événement
                    </h3>
                    <div class=\"events-wrapper\">";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"event\">
                <form method=\"POST\" action=\"annuler.php\">
                        <h4 class=\"event__point\">".$row["heure"]."</h4>
                        <span class=\"event__duration\">".$row["date"]."</span>
                        <p class=\"event__description\">
                            ".$row["description"]."
                        </p>
                        <input type=\"hidden\" name=\"annuler\" value=\"".$row["id"]."\">
                        <input class=\"event__delete\" type=\"submit\" value=\"𐌢\">
                        
                </form>
                    </div>";
            }
            
        } else {
            echo "<div class=\"event\">
                        <h4 class=\"event__point\">Aucun cours réservé</h4>
                        <span class=\"event__duration\"></span>
                        <p class=\"event__description\">
                            Aucun cours réservé
                        </p>
                    </div>";
        }
        echo "</div>
                </div>
            </section>";
    ?>
  

   <!--======= Upcoming Events =======-->

   
         <button onclick="window.location.href = 'rendez-vous.php';">Vos rendez-vous</button>
         <button onclick="window.location.href = 'deconnexion.php';">Déconnexions</button>
   
    </div>
    <div class="conversations">
        <h1 class="vosMessages">Vos messages</h1>
        <?php
        $sql = "SELECT DISTINCT `Client`.*
        FROM `Client`
        JOIN `Chat` ON `Client`.`id` = `Chat`.`emetteur_id`
        WHERE `Chat`.`recepteur_id` = ".$_COOKIE["id"]."
        
        UNION
        
        SELECT DISTINCT `Client`.*
        FROM `Client`
        JOIN `Chat` ON `Client`.`id` = `Chat`.`recepteur_id`
        WHERE `Chat`.`emetteur_id` = ". $_COOKIE["id"];
        $result = $conn->query($sql);
        while ($data = mysqli_fetch_assoc($result)) {
            echo '<form method="POST" action="../PageCompte/chat.php">
                    <input type="hidden" name="prof_id" value="'.$data['id'].'">
                    <div class="dm" onclick="this.parentNode.submit();">
                        <img src="../../photo/'.$data['photo'].'" alt="Photo coach">
                        <p>'.$data['prenom'].' '.$data['nom'].' '.$data['typeCompte'].'</p>
                    </div>
                  </form>';
        }
        ?>
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