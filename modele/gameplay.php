<?php
switch ($_GET['mode']){
    default;
        session_start();
        $_SESSION['c'] = $lesCombattants[$_POST['c']];
        $_SESSION['a'] = $lesCombattants[$_POST['a']];
        $_SESSION['c']->setDegats($_SESSION['a']);
        $_SESSION['a']->setDegats($_SESSION['c']);
        $json = [];
        include 'vues/incombat.php';
    break;

    case 'attaque';
        if($_SESSION['c']->getPv() <= 0 || $_SESSION['a']->getPv() <= 0){
            header("Location: index.php?s=home");
            session_destroy();
        }   
        if (($_SERVER['REQUEST_METHOD'] == 'POST')){ 
            if (isset($_POST['attaquePhysique'])){
                $_SESSION['c']->attaquePhysique($_SESSION['a']);
            }
            elseif (isset($_POST['attaqueMagique'])){
                $_SESSION['c']->attaqueMagique($_SESSION['a']);
            }
            elseif (isset($_POST['defense'])){
                $_SESSION['c']->defense($_SESSION['a']);
            }
        }
        else{
            $_SESSION['a']->attaquePhysique($_SESSION['c']);
        }
        $json['pvC'] = $_SESSION['c']->getPv();
        $json['pvA'] = $_SESSION['a']->getPv();
        header('Content-Type: application/json');
        print json_encode($json);
    break;
    
}
?>