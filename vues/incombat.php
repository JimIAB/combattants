<?php
    print('<h2>' . $_SESSION['c']->getNom() . ' - V.S - ' . $_SESSION['a']->getNom() . '</h2>');
?>
<div class="incombat">
    <div id="incombat" class="zone_combat">
        <div class="adversaire">
            <?php
                print("<p>" . $_SESSION['a']->getNom() . " - " . $_SESSION['a']->getPv() . " PVs</p>");
                barreDeVie($_SESSION['a']);
            ?>
            <div class="carractere"></div>
        </div>
        <div class="combattant">
            <?php
                print("<p>" . $_SESSION['c']->getNom() . " - " . $_SESSION['c']->getPv() . " PVs</p>");
                barreDeVie($_SESSION['c']);
            ?>
            <div class="carractere"></div>
        </div>
    </div>
    <div class="attaques">
        <form action="index.php?s=incombat&mode=attaque" id="attaque" method="POST">
            <input id="attaqueMagique" type="submit" name="attaqueMagique" class="bouton" value="Attaque Magique"/>
        </form>
        <form method="POST">
            <input id="attaquePhysique" type="submit" name="attaquePhysique" class="bouton" value="Attaque Physique"/>
        </form>
    </div>
    <form method="POST">
        <input id="defense" type="submit" name="defense" class="bouton bouton_defense" value="Défense"/>
    </form>
</div>

       