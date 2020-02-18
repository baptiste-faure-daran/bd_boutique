<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title> Article </title>
    <meta name="panier.php" content="panier">
</head>
<?php
include("fonctions.php");

if (isset($_POST["articles"])) {
    foreach ($_POST["articles"] as $articleSel) {
            echo('
            <div class="cadre article">
            <h2 class="nom"> Vous avez choisit le <span>' . $cats[intval($articleSel)][0] . '</span> </h2>
            <p class="prix"> Pour la somme de <span>' . $cats[intval($articleSel)][1] . '</span> euros </p><br>
            <img src="' . $cats[intval($articleSel)][2] . '"/><br><br><br>
        </div> 
        ');

        var_dump($_POST);
    }
} else {
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