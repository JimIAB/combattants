<?php
require 'combattants.php';
require 'pouvoirs.php';
// Connexion à la BDD

    $login = "root";
    $password = "Azerty01*";
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=combattants;charset=utf8mb4", $login);
    }
    catch (PDOException $error) {
        print("Erreur connexion " . $error -> getMessage());
    }

// Fonction Ajouter, Supprimer et Lister 
    function ajouter($bdd, $nom, $pouvoir) {
        $bdd -> query("INSERT INTO combattant (nom, pouvoir, pv, degatsPhysique, defense) VALUES ('$nom', '$pouvoir', '100', '0', '0');");
    }

    function supprimer($bdd, $nom) {
        $bdd -> query("DELETE FROM combattant WHERE nom = '$nom';");
    }

    function lister($bdd) {
        $res = $bdd -> query("SELECT * FROM combattant;");

        if (($res -> rowCount()) == 0) {
            print("<p>Il n'y a pas de combattants</p>");
        }
        else {
            while ($ligne = $res -> fetch(PDO::FETCH_ASSOC)) {
                print("<li>Nom : " . $ligne["nom"] . " - Son pouvoir : " . $ligne["pouvoir"] . " - - PVs : " . $ligne["pv"] . "</li>");
                }
        }
    }
   
// Génération des Combattants et des Pouvoirs
    function genereCombattants($bdd) {
        $lesCombattants = array();
        $res = $bdd -> query("SELECT * FROM combattant INNER JOIN pouvoirs ON pouvoir = intituler;");
        $ligne = $res -> fetchall(PDO::FETCH_ASSOC);
        foreach($ligne as $ligne) {
            $lesCombattants[$ligne['nom']] = new Combattants($ligne['nom'], new Pouvoir($ligne['pouvoir'], $ligne['faiblesse']) , $ligne['pv'], $ligne['degatsPhysique'], $ligne['defense']);
        }
        return $lesCombattants;
    }

    function generePouvoirs($bdd){
        $lesPouvoirs = array();
        $res = $bdd -> query("SELECT DISTINCT intituler, faiblesse FROM pouvoirs;");
        while ($ligne = $res -> fetch(PDO::FETCH_ASSOC)) {
            $lesPouvoirs[$ligne['intituler']] = new Pouvoir($ligne['intituler'], $ligne['faiblesse']);
        }
        return $lesPouvoirs;
    }

// Génération des options de Selects
    function genereOptionCombattant($bdd){
        $res = $bdd -> query("SELECT * FROM combattant;");
        while ($ligne = $res -> fetch(PDO::FETCH_ASSOC)) {
            print("<option value='" . $ligne["nom"] . "'>" . $ligne["nom"] . "</option>");
        }   
    }
    function genereOptionPouvoirs($bdd) {
        $res = $bdd -> query("SELECT DISTINCT intituler FROM pouvoirs;");
        while ($ligne = $res -> fetch(PDO::FETCH_ASSOC)) {
            print("<option value='" . $ligne["intituler"] . "'>" . $ligne["intituler"] . "</option>");
        }
    }

    function generationTableFaiblesse($bdd){
        $res = $bdd -> query("SELECT DISTINCT intituler, faiblesse FROM pouvoirs;");
        while ($ligne = $res -> fetch(PDO::FETCH_ASSOC)) {
            print('<tr><td>' . $ligne['intituler'] . '</td><td>' . $ligne['faiblesse'] . '</td></tr>');
        }
    }

// Fonctions du Combat

    function combat($lesCombattants){
        $_GET['mode']='new';
        
    }
    


    function attaqueAdverse($Combattant, $Adversaire){
        $Adversaire->attaquePhysique($Combattant);
    }

// Calculer les degats magiques

    function CalculeDegatsMagique($unCombattant, $unAdversaire){
        if ($unAdversaire->getPouvoir()->getFaiblesse() == $unCombattant->getPouvoir()->getIntituler()){
            $degatsMagique = 30;
        }
        elseif ($unAdversaire->getPouvoir() == $unCombattant->getPouvoir()){
            $degatsMagique = 10;
        }
        else{
            $degatsMagique = 20;
        }
        return $degatsMagique;
    }
    

// Génération de la Barre de vie

    function barreDeVie($unCombattant){
        print('<div class="barreDeVie"><div class="barreDeVieFond"><div id="vie" class="vie" style="width:' . $unCombattant->getPv() . '%"></div></div></div>');
    }
?>