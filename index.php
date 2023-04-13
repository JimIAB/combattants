<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Combattants</title>
        <link rel="stylesheet" href="vues/styles/style.css">
        <link rel="icon" type="image/x-icon" href="/vues/assets/favicon.ico">
    </head>
    <body>
        <header>
            <h1>Combattants</h1>
        </header>
        <main>
            <?php

                require 'modele/fonctions.php';

                $lesCombattants = genereCombattants($bdd);
                $lesPouvoirs = generePouvoirs($bdd);

                // Affichage du Menu

                switch($_GET['s']){
                    case "home";
                        include "vues/home.php";
                    break;

                    case "liste";
                        include "vues/liste.php";
                    break;

                    case "combat";
                        include 'vues/combat.php';
                        if (($_SERVER['REQUEST_METHOD'] == 'POST')){
                            if (isset($_POST['combat'])){
                                $_GET['s']='incombat';
                            }
                        }
                    break;

                    case 'incombat';
                        include 'modele/gameplay.php';
                    break;

                    case "supprimer";
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $nom = $_POST['nom'];
                            if (isset($_POST['supprimer'])){
                                supprimer($bdd, $nom);
                            }
                        }
                        include "vues/supprimer.php";
                    break;

                    case "ajout";
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $nom = $_POST['nom'];
                            $pouvoir = $_POST['pouvoir'];
                            if (isset($_POST['ajouter'])) {
                                ajouter($bdd, $nom, $pouvoir);
                            }  
                        }
                        include "vues/ajout.php";
                    break;
                }

                if($_GET['s'] != "home"){
                    print("<a class='bouton bouton_menu' href='?s=home'>Menu</a>");
                }
            ?>
        </main>
    </body>
    <script type="text/javascript" src="modele/scripts.js"></script>
</html>