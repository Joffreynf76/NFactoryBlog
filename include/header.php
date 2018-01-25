
<header>
    <ul>
        <li><a href="index.php?page=accueil"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a></li>

        <?php

        if (!isset($_SESSION['login'])) {
            echo("<li><a href=\"index.php?page=inscription\"><i class=\"fa fa-address-book\" aria-hidden=\"true\"></i> Inscription</a></li>");
            echo("<li><a href=\"index.php?page=authentification\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Login</a></li>");

        } else {
            echo("<li><a href=\"index.php?page=logout\"><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i> Logout</a></li>");

        }
        ?>

        <!--<li><a href="index.php?page=article"><i class="fa fa-file-text" aria-hidden="true"></i> Article</a></li>-->
        <?php
            if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
                echo("<li><a href=\"index.php?page=article\"><i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> Article</a></li>");
                echo("<li><a href=\"index.php?page=admin\"><i class=\"fa fa-cogs\" aria-hidden=\"true\"></i> Administration</a></li>");

            }
        if(isset($_SESSION['admin'])&& $_SESSION['admin']==2){
            echo("<li><a href=\"index.php?page=article\"><i class=\"fa fa-newspaper-o\" aria-hidden=\"true\"></i> Article</a></li>");
        }
        ?>

    </ul>

</header>