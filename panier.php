<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title> Article </title>
    <meta name="panier.php" content="panier">
</head>
<?php
include("fonctions_boutique.php");
session_start();

if (isset($_POST['articles'])) {
    $_SESSION['panier'] = $_POST['articles'];
}
if (isset($_SESSION['panier'])) {
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
                    <p>
                        <input type="checkbox" name="enlever_article[]" value="<?= $d_list_choisie['id'] ?>">
                    </p>
                </div>
                <?php
            }
        }
        ?><input class="bouton" type="submit" value="Modifier panier">
    </form>
    <?php
} else  {
?>
<form action="panier.php" method="post">
    <?php
    afficheArticle($cats);
    ?>
    <input class="bouton" type="submit" value="Envoyer">
</form>
<?php

}
?>