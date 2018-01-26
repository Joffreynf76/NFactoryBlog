<?php require('captcha.php'); ?>
<form method="post" action="#">
    <div class="nom">
        <label for="nom">Nom : </label><input type="text" name="nom">
    </div>
    <div class="prenom">
        <label for="prenom">Prénom : </label><input type="text" name="prenom">
    </div>
    <div class="email">
        <label for="email">Email : </label><input type="email" name="email">
    </div>
    <div class="password">
        <label for="password">Mot de passe : </label><input type="password" name="password">
    </div>
    <div class="captcha">
        <label for="captcha">Recopiez le mot : "<?php echo captcha(); ?>"</label>
        <input type="text" name="captcha" id="captcha" />
    </div>
    <div class="bouton">
        <input type="submit" value="S'inscrire" name="formulaire">
    </div>
</form>