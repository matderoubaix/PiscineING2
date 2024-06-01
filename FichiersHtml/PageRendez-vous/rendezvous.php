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

    <div class="pageRendezVous">










    <?php

        $database = "sportify";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);



        $utilisateur_id = $_COOKIE['id'];
        $nom_utilisateur = $_COOKIE['nom'];
        $prenom_utilisateur = $_COOKIE['prenom'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['prof_id'])){
                $prof_id = $_POST['prof_id'];
                $sql_professeur = "SELECT * FROM client WHERE id = $prof_id";
                $result_professeur = mysqli_query($db_handle, $sql_professeur);
                $data_professeur = mysqli_fetch_assoc($result_professeur);
                $nom_professeur = $data_professeur['nom'];
                $prenom_professeur = $data_professeur['prenom'];

            }
            else {
                echo "No professor selected.";
                exit();
            }

            if (isset($_POST['heure']) && isset($_POST['jour']) && isset($_POST['prof_id'])){
                $heure = $_POST['heure'];
                $jour = $_POST['jour'];
                $prof_id = $_POST['prof_id'];
                $dayOfWeek = date('N', strtotime("Sunday +{$jour} days"));
                $sql_insert = "INSERT INTO cours (nom, description, prof_id, duree, date, heure, sport_id, prix) VALUES ('Cours Particulier','Cours particulier avec $nom_utilisateur', '$prof_id', 1 , CURRENT_DATE + INTERVAL $dayOfWeek DAY, '$heure:00:00', 1, 20)";
                mysqli_query($db_handle, $sql_insert);


                $to = $_COOKIE['email'];
                $subject = "Confirmation de rendez-vous";
                $message = "Merci d'avoir pris rendez-vous chez Sportify, ".$prenom_utilisateur." ".$nom_utilisateur." !<br><br>Voici les détails de votre rendez-vous :<br><br>Professeur : ".$prenom_professeur." ".$nom_professeur." <br>Date : ".date('Y-m-d', strtotime("Sunday +{$jour} days"))."<br>Heure : $heure:00<br><br>Vous pouvez annuler votre rendez-vous en vous connectant à votre compte Sportify.<br><br>À bientôt chez Sportify !<br><br>L'équipe Sportify.";
                $headers = "From: matderoubaix@live.fr\r\n";
                $headers .= "Reply-To: matderoubaix@live.fr\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                if(mail($to, $subject, $message, $headers)) {
                    echo '<div id="notification" style="position: fixed; bottom: 90px; right: 10px; background-color: #ffffff; padding: 20px; font-size:20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">&check; Email envoyé !</div>';

                } else {
                    echo '<div id="notification" style="position: fixed; bottom: 90px; right: 10px; background-color: #ffffff; padding: 20px; font-size:20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">&#10060; Impossible d\'envoyer l\'email.</div>';
                }

                echo '<div id="notification" style="position: fixed; bottom: 10px; right: 10px; background-color: #ffffff; padding: 20px; font-size:20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">&check; Rendez-vous réservé avec succès !</div>';
                echo      '<script>
                    setTimeout(function(){
                        document.getElementById("notification").remove();
                        document.getElementById("notification").remove();
                    }, 3000);
                </script>';


                $trouver_rendezvous = "SELECT * FROM cours ORDER BY id DESC LIMIT 1";
                $resultatrdv = mysqli_query($db_handle, $trouver_rendezvous);
                $donneesrdv = mysqli_fetch_assoc($resultatrdv);
                $cours_id = $donneesrdv['id'];
                $sql_insert2 = "INSERT INTO reservation (client_id, cours_id) VALUES ('$utilisateur_id', '$cours_id')";
                mysqli_query($db_handle, $sql_insert2);
            }



        } else {
            echo "Invalid request method.";
            exit();
        }

        // Retrieve professor information
        $sql = "SELECT * FROM client WHERE id = $prof_id";
        $result = mysqli_query($db_handle, $sql);
        $data = mysqli_fetch_assoc($result);
        $prof_nom = $data['nom'];
        $prof_prenom = $data['prenom'];
        $prof_photo = $data['photo'];

        echo '<div class="hautDePage">';
        echo '<div><a style="text-decoration: none; color:black; font-size: 0.7 rem;" href="../PageCompte/accueilcompte.php">Retour</a></div>';
        echo '<div style="display :flex; flex-direction: row; margin-bottom: 10px;">';
        echo '<img style="width: 50px ; height:50px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); border-radius:50%;" src="../../photo/'.$prof_photo.'" alt="Photo coach">';
        echo '<h1 style="margin: 2%;">'.$prof_prenom.' '.$prof_nom.'</h1>';
        echo '</div>';
        echo '</div>';

        echo '<div class="emploiDuTemps">';
        echo '<div class="tableau">
                <div class="joursSemaine">
                    <div class="jour">Lundi</div>
                    <div class="jour">Mardi</div>
                    <div class="jour">Mercredi</div>
                    <div class="jour">Jeudi</div>
                    <div class="jour">Vendredi</div>
                    <div class="jour">Samedi</div>
                </div>
        ';

        if ($db_found) {
            $heure = 0;
            for ($heure = 10; $heure < 20; $heure++) {
                if ($heure == 20) {
                    break;
                }
                echo '<div class="ligneHoraires">';
                for ($jour = 2; $jour < 8; $jour++) {
                    $chercher_jour = "SELECT * FROM cours WHERE prof_id = $prof_id AND HOUR(heure) = $heure AND DAYOFWEEK(date) = $jour";
                    $resultat = mysqli_query($db_handle, $chercher_jour);
                    $donnees = mysqli_fetch_assoc($resultat);

                    if (isset($donnees)) {
                        echo '<div style="background-color: white;" class="caseHoraire">';
                        echo '<p>'.$donnees["nom"].'</p>';
                    } else {
                        echo '<div style="background-color: rgb(0, 122, 255);" class="caseHoraire">';
                        echo '<form method="POST" action="rendezvous.php">
                                <input type="hidden" name="prof_id" value="'.$prof_id.'">
                                <input type="hidden" name="heure" value="'.$heure.'">
                                <input type="hidden" name="jour" value="'.$jour.'">
                                <a href="reserver.php" onclick="this.parentNode.submit(); return false;">
                                    <p style="color: white;">'.$heure.'h</p>
                                </a>
                            </form>';
                    }

                    echo '</div>';
                }
                echo '</div>';
            }
        } else {
            echo "Database not found";
        }

        echo '</div>';

        echo '</div>';
        

        // Close the database connection
        mysqli_close($db_handle);
    ?>











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
                <li><a href="index.php">Accueil</a></li>
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
                <li><a href="https://maps.app.goo.gl/p6xMkrBTmMQZojXu7">Écrivez nous ou venez nous rencontrer : <address>10 rue Sextius Michel, 75015 Paris, FRANCE</address<</a></li>
            </ul>

        </div>
    </footer>






    </body>
</html>