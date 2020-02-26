<?php
require "fonctions_boutique.php";
require "class.php";
include('head.php');
?>
    <form action="panier.php" method="post">
        <?php
        displayCat(new Catalogue(get_article_liste($bdd)));
        ?>
        <input class="bouton" type="submit" value="Envoyer">
    </form>
<?php
include('footer.php');
