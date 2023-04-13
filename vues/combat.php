<div class='ring'>
    <div class='ring_liste'>
        <?php 
            include "vues/liste.php";
        ?>
    </div>
    <div class='ring_combat'>
        <h2>Choisisez les deux adversaires</h2>
        <div class="combat">
            <form action="index.php?s=incombat&mode=" class="choix" method="POST">
                <label for="premier">Votre Combatant : </label>
                <select id="select1" onchange="choix('1')" name="c" required>
                    <option value="">Choisissez un combatant</option>
                    <?php
                        genereOptionCombattant($bdd); 
                    ?>
                </select>
                <label for="deuxieme">Votre Adversaire : </label>
                <select id="select2" onchange="choix('2')" name="a" required>
                    <option value="">Choisissez un adversaire</option>
                    <?php
                        genereOptionCombattant($bdd);
                    ?>
                </select>
                <button class="bouton" type="submit" name="combat">Combattre</button>
            </form>
        </div>

    </div>
    <div class="combat_faiblesse">
        <h2>Table des Faiblesses</h2>
        <table>
            <tr><td>Pouvoir</td><td>Faiblesse</td></tr>
            <?php
                generationTableFaiblesse($bdd);
            ?>
        </table>
    </div>
</div>
