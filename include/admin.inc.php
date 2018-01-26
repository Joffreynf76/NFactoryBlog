<?php
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']==1) {
        $db=connectionPDO('localhost' , 'NFactoryBlog' , 'root' , '');
        $requete = "SELECT * FROM t_users";
        $result = $db ->query($requete);
        echo "<table>";
        while ($donnees = $result ->fetch()) {
            echo("<tr><td>" . $donnees['ID_USER'] . "</td>" . "<td>" . $donnees['USERNAME'] . "</td>" . "<td>" . $donnees['USERFNAME'] . "</td>" . "<td>" . $donnees['USERMAIL']
                . "</td>" . "<td>" . $donnees['T_ROLES_ID_ROLE'] . "</td>" . "<td>" . "<form method='post' action='#'>" . "<select name='select'><option value='0'>Role</option><option value='1'>Super Admin</option>
                <option value='2'>Admin</option><option value='3'>Modérateur</option><option value='4'>Rédacteur</option><option value='5'>Utilisateur</option>
                </select> " . "</td>" . "<td>" . "<input type='text' name='id'>" . "<input type='submit' value='Mettre a jour' name='formulaire'>" . "</form>" . "</td>" . "</tr>");

        }
        echo("</table>");
        if (isset($_POST['formulaire'])) {
            $id = $_POST['id'];
            $choix = $_POST['select'];
            $requete2 = "UPDATE t_users SET T_ROLES_ID_ROLE='$choix' WHERE ID_USER='$id'";
            $db ->query($requete2);
        }
        unset($db);
    }
} else {
    echo "erreur";
}