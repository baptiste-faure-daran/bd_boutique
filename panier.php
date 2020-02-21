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
} else if (isset($_SESSION['panier']) and (isset($_POST['enlever_article']))) {
?>
<form action="panier.php" method="post">
    <?php
    var_dump($_SESSION['panier']);
    var_dump($_POST['enlever_article']);

  //  $garder_articles = array_diff($_POST['enlever_article'],$_SESSION['panier']); // METTRE UN REVERSE IN ARRAY POUR AFFICHER TOUT CE QUI N'EST PAS SELECTIONNE
 //    var_dump($garder_articles);
    foreach ($_SESSION['panier'] as $id) {
        if (!in_array($id,$_POST['enlever_article']))
        $list = $bdd->query(
            "SELECT * FROM articles WHERE articles.id = '$id'"
        )->fetchAll();
        foreach ($list as $key)
        while ($nouveau_panier = $list->fetch()) {
            ?>
            <div class="cadre article">
                <h2 class="nom"> Venez profitez du superbe tour <span><?= $nouveau_panier['name'] ?></span></h2>
                <p class="prix"> Pour la modique somme de <span><?= $nouveau_panier['price'] ?></span> euros </p>
                <img src="<?= $nouveau_panier['image'] ?>"/>
                <p>
                    <input type="checkbox" name="enlever_article[]" value="<?= $nouveau_panier['id'] ?>">
                </p>
            </div>
            <?php
        }
    }


    ?>
    ?><input class="bouton" type="submit" value="Modifier panier">

<?php

}
?>