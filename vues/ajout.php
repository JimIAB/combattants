<h2>Creation d'un combattant</h2>
<div class="ajout">
    <form method="POST">
        <label for="nom">Nom du combattant</label>
        <input type="text" name="nom" required minlength="2">
        <label for="pouvoir">Son pouvoir : </label>
        <select id='pouvoir' name='pouvoir' required>
            <option value="">Choisissez un pouvoir</option>
            <?php
                genereOptionPouvoirs($bdd);
            ?>
        </select>
        <button class="bouton" type="submit" name="ajouter">Ajouter</button>
    </form>
</div>