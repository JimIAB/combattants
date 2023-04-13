<h2>Suppression d'un combattant</h2>
<div class="supprimer">
        <form method="POST">
            <label for='nom'>Combattant à supprimer : </label>
            <select name='nom' required>
                <option value="">Choisissez un combattant</option>
                    <?php
                        genereOptionCombattant($bdd);
                    ?>
            </select>
            <button class='bouton bouton_supprimer' type='submit' name='supprimer'>Supprimer</button>
        </form>
</div>