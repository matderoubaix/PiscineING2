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
                <a href="../PageCompte/compte.php">VOTRE COMPTE</a>
            </div>
        </div>
    </nav>



    <div class="pic-ctn">
        <div class="messageBienvenue">
            <img class="LogoGrand" src="../../images/logoSportify.png">
            <h1>Bienvenue sur Sportify</h1>
            <p>Démarrez votre voyage sportif aujourd'hui</p>
        </div>
        <img class="pic" src="../../images/imagesAccueil/accueil1.jpg" alt="Image de sport">
        <img class="pic" src="../../images/imagesAccueil/accueil2.jpg" alt="Image de sport">
        <img class="pic" src="../../images/imagesAccueil/accueil3.jpg" alt="Image de sport">
        <img class="pic" src="../../images/imagesAccueil/accueil4.jpg" alt="Image de sport">
        <img class="pic" src="../../images/imagesAccueil/accueil5.jpg" alt="Image de sport">
    </div>

    <div class="section1">
        <h2>Discutez avec un de nos coachs professionnels</h2>
        <div class="coachCardContainer">
            <div class="coachCard" style='background-image : url("../../photo/photo.png")'>
                <div class="coachDescription">
                    <h3>Jean-Pierre Segado</h3>
                    <p>Informatique</p>
                    <div class="boutonsCoach">
                        <form method="POST" action="../PageCompte/chat.php">
                            <input type="hidden" name="prof_id" value="<?php echo $prof_id; ?>">
                            <button type="submit">Discuter</button>
                        </form>
                        <button>Prendre rendez-vous</button>
                    </div>  
                </div>
            </div>
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
                $sql = "SELECT * FROM client WHERE typeCompte = 'prof'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        if ($count >= 5) {
                            break;
                        }
                        // Rest of the code for printing the coach card

                        echo "<div style=\"background-image : url('../../photo/". $row['photo'] ."')\" class=\"coachCard\">";
                        echo "<div class=\"coachDescription\">";
                        echo "<h3>".$row["prenom"]." ".$row["nom"]."</h3>";


                        // Get sport_ids for the current coach
                        $coach_id = $row["id"];
                        $sql_sportclient = "SELECT sport_id FROM sportclient WHERE client_id = $coach_id";
                        $result_sportclient = $conn->query($sql_sportclient);

                        if ($result_sportclient->num_rows > 0) {
                            while($row_sportclient = $result_sportclient->fetch_assoc()) {
                                $sport_id = $row_sportclient["sport_id"];

                                // Get the sport name for the current sport_id
                                $sql_sport = "SELECT nom FROM sport WHERE id = $sport_id";
                                $result_sport = $conn->query($sql_sport);

                                if ($result_sport->num_rows > 0) {
                                    while($row_sport = $result_sport->fetch_assoc()) {
                                        $sport_name = $row_sport["nom"];
                                        // Output the sport name
                                        echo "<p>".$sport_name."</p>";
                                    }
                                } else {
                                    echo " ";
                                }
                            }
                        } else {
                            echo " ";
                        }

                        if (isset($_COOKIE)){

                        echo "<div class=\"boutonsCoach\">";


                        echo "<form method=\"POST\" action=\"../PageCompte/chat.php\">
                                <input type=\"hidden\" name=\"prof_id\" value=\"".$row["id"]."\">
                                <button type='submit' method=\"POST\" action=\"../PageCompte/chat.php\">
                                    Discuter
                                </button>
                            </form>";
                        echo "<button type='submit'>Prendre rendez-vous</button>";
                        echo "<div style='font-size: 5px'>".$_COOKIE["id"]."</div>";
                        echo "</div>";
                    }  
                        echo "</div>";
                        echo "</div>";
                        

                        $count++;
                    }
                    
                }
                else {
                    echo "0 results";
                }
                $conn->close();
            
            
            
            
            
            
            
            ?>

        </div>
        

    </div>

    <div class="section2">
        <div class="boxEvenements">
            <h1>
                Événements à venir
            </h1>
            <hr>
            <div class="evenement">
                <div class="evenementDescription">
                    
                    <h2>Match Universitaire</h2>
                    <p>Le 12/12/2024 à 14h</p>
                    <p>10 rue Sextius Michel, 75015 Paris, FRANCE</p>
                    
                </div>
            </div>
        </div>
        <div class="boxLocalisation">
            <h1>
                Localisation
            </h1>
            <hr>
            <div class="mapouter">
                <div class="gmap_canvas">
                    <iframe  width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=10%20rue%20Sextius%20Michel%2C%2075015%20Paris%2C%20FRANCE&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
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
                <li><a href="../PageAccueil/index.php">Accueil</a></li>
                <li><a href="../PageParcourir/parcourir.html">Parcourir</a></li>
                <li><a href="../PageRecherche/recherche.html">Rechercher</a></li>
                <li><a href="../PageRendez-vous/rendez-vous.html">Rendez-vous</a></li>
                <li><a href="../PageCompte/compte.php">Votre compte</a></li>
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