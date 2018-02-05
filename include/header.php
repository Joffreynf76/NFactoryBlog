
<header>
    <ul>
        <li><a href="index.php?page=accueil" class="accueil1"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>

        <?php

        if (!isset($_SESSION['login'])) {
            echo("<li><a href=\"index.php?page=inscription\" class='inscription'><i class=\"fa fa-address-book\" aria-hidden=\"true\"></i> Inscription</a></li>");
            echo("<li><a href=\"index.php?page=authentification\" class='login'><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Login</a></li>");
            echo("<li><a href=\"index.php?page=contact\" class='contact'><i class=\"fa fa-comment\" aria-hidden=\"true\"></i> Contact</a></li>");


        } else {
            echo("<li><a href=\"index.php?page=monCompte\" class='inscription'><i class=\"fa fa-user\" aria-hidden=\"true\"></i> Mon compte</a></li>");
            echo("<li><a href=\"index.php?page=logout\" class='login'><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> Logout</a></li>");
            echo("<li><a href=\"index.php?page=contact\" class='contact'><i class=\"fa fa-comment\" aria-hidden=\"true\"></i> Contact</a></li>");

        }
        ?>

        <!--<li><a href="index.php?page=article"><i class="fa fa-file-text" aria-hidden="true"></i> Article</a></li>-->
        <?php
            if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
                echo("<li><a href=\"index.php?page=article\" class='article1'><i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> Article</a></li>");
                echo("<li><a href=\"index.php?page=admin\" class='admin'><i class=\"fa fa-cogs\" aria-hidden=\"true\"></i> Administration</a></li>");

            }
        if(isset($_SESSION['admin'])&& $_SESSION['admin']==2){
            echo("<li><a href=\"index.php?page=article\" class='article1'><i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> Article</a></li>");
        }
        ?>

    </ul>

</header>