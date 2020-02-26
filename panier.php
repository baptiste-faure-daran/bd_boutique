<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title> Article </title>
    <meta name="panier.php" content="panier">
</head>
<?php
require "fonctions_boutique.php";
require "class.php";
session_start();

if (isset($_POST['articles'])) {
    $_SESSION['panier'] = $_POST['articles'];
}
if (isset($_SESSION['panier']) and (!isset($_POST['enlever_article']))) {
    ?>
    <form action="panier.php" method="post">
        <?php
        foreach ($_SESSION['panier'] as $articleSel) {
            $list = $bdd->query(
                "SELECT * FROM articles WHERE articles.id ='$articleSel ' "
            );
            while ($d_list_choisie = $list->fetch()) {
                ?>
                <div class="cadre article">
                    <h2 class="nom"> Venez profitez du superbe tour <span><?= $d_list_choisie['name'] ?></span></h2>
                    <p class="prix"> Pour la modique somme de <span><?= $d_list_choisie['price'] ?></span> euros </p>
                    <img src="<?= $d_list_choisie['image'] ?>"/>
                    <br>
                    <p class="quantitee"> Pour combien de personnes souhaitez-vous réserver? </p>
                    <input type="number" class="bouton" name="Nombre_personnes">
                    <p>
                        si vous souhaitez annuler cette commande, cochez la croix
                        <input type="checkbox" name="enlever_article[]" value="<?= $d_list_choisie['id'] ?>">
                    </p>
                </div>
                <?php
            }
        }
        ?><input class="bouton" type="submit" value="Valider panier">
    </form>
    <?php
} else if (isset($_SESSION['panier']) and (isset($_POST['enlever_article']))) {
?>
<form action="panier.php" method="post">
    <?php
    var_dump($_SESSION['panier']);
    var_dump($_POST['enlever_article']);

  //  $garder_articles = array_diff($_POST['enlever_article'],$_SESSION['panier']); // METTRE UN REVERSE IN ARRAY POUR AFFICHER TOUT CE QUI N'EST PAS SELECTIONNE
    //    var_dump($garder_articles);
    foreach ($_SESSION['panier'] as $id) {
        if (!in_array($id, $_POST['enlever_article']))
            $list = $bdd->query(
                "SELECT * FROM articles WHERE articles.id = '$id'"
            )->fetchAll();

        foreach ($list as $produit)   // RESTE A SUPPRIMER LES PLACES DES ARTICLES SUPPRIMES POUR NE PAS DUPPLIQUER LES RESTANTS
//            while ($nouveau_panier = $list->fetch()) {
                ?>
                <div class="cadre article">
                    <h2 class="nom"> Venez profitez du superbe tour <span><?= $produit['name'] ?></span></h2>
                    <p class="prix"> Pour la modique somme de <span><?= $produit['price'] ?></span> euros </p>
                    <img src="<?= $produit['image'] ?>"/>
                    <p>
                        <input type="checkbox" name="enlever_article[]" value="<?= $produit['id'] ?>">
                    </p>
                </div>
                <?php
//            }
    }


    ?>
    ?><input class="bouton" type="submit" value="Valider panier">

<?php

}
?>