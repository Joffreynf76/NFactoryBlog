<?php
if(!isset($_GET['cle'])|| !isset($_GET['email'])){
    echo "Accès non autorisé";
}
?>


<?php
if(isset($_GET['cle'])&& isset($_GET['email'])) {

echo ("<form method=\"post\" action=\"\">
    <div class='cle'>
        <label for=\"cle\"> Clé de sécurité :</label><input type=\"password\" name=\"clef\">
    </div>
    <div class='emailrecup'>
        <label for=\"email\">Adresse email :</label><input type=\"email\" name=\"email\">
    </div>
    <div class='newmdp'>
        <label for=\"mdp\">Nouveau mot de passe :</label><input type=\"password\" name=\"mdp\">
    </div>
    <div class='btn2'>
        <input type=\"submit\" value=\"Valider\" name=\"valider\">
    </div>
</form>
");
    if (isset($_POST['valider'])) {
        $mail = $_GET['email'];
        $cle = $_GET['cle'];
        $clef = $_POST['clef'];
        $clef = sha1($clef);
        $mdp = $_POST['mdp'];
        $mdp = sha1($mdp);
        $email = $_POST['email'];

        if ($clef != $cle) {
            echo "erreur";
        }
        if ($mail != $email) {
            echo "erreur";
        } else {
            $db = connectionPDO('localhost', 'NFactoryBlog', 'root', '');
            $requete = "UPDATE t_users SET USERPASSWORD='$mdp' WHERE USERMAIL='$email'";
            $result = $db->query($requete);
            echo "Mot de passe modifié";
            unset($db);
        }

    } else {
        echo "";
    }
}