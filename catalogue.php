<?php
require "fonctions_boutique.php";
require "class.php";
include('head.php');
?>

    <form action="panier.php" method="post">

        <?php
        $req_cat = get_article_liste($bdd);
        $cat = new Catalogue($req_cat);
        displayCat($cat);

        //      displayCat(new Catalogue(get_article_liste($bdd)));  // Version factorisée
        ?>
        <input class="bouton" type="submit" value="Envoyer">
    </form>
<?php
include('footer.php');
