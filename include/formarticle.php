<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<form method="post" action="#">
    <div class="titre">
        <label for="titre">Titre : </label><input type="text" name="titre">
    </div>
    <div class="chapo">
        <label for="chapo">Sous titre : </label><input type="text" name="chapo">
    </div>
    <div class="contenu">
        <label for="contenu">Contenu article :</label><textarea rows="4" cols="40" name="contenu"></textarea>
    </div>
    <div class="date">
        <label for="date">Date : </label><input type="date" name="date">
    </div>
    <div class="bouton">
        <input type="submit" value="Publier" name="formulaire3">
    </div>
</form>