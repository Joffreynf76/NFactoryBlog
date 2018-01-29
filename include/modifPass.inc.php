<form method="post" action="">
    <div>
        <label for="cle"> Clé de sécurité :</label><input type="password" name="clef">
    </div>
    <div>
        <label for="email">Adresse email :</label><input type="email" name="email">
    </div>
    <div>
        <label for="mdp">Nouveau mot de passe :</label><input type="password" name="mdp">
    </div>
    <div>
        <input type="submit" value="Valider" name="valider">
    </div>
</form>

<?php
if(isset($_POST['valider'])){
    $mail=$_GET['email'];
    $cle=$_GET['cle'];
    $clef=$_POST['clef'];
    $clef=sha1($clef);
    $mdp=$_POST['mdp'];
    $mdp=sha1($mdp);
    $email=$_POST['email'];

    if($clef != $cle){
        echo "erreur";
    }
    if($mail!=$email){
        echo "erreur";
    }
    else {
        $db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
        $requete="UPDATE t_users SET USERPASSWORD='$mdp' WHERE USERMAIL='$email'";
        $result = $db->query($requete);
        echo "Mot de passe modifié";
        unset($db);
    }

}else {
    echo "";
}