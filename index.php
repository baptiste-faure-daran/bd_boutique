<?php
require "fonctions_boutique.php";

//$liste = select_list_of_products($bdd);
//$commandes_last_10_days = orders_from_the_last_10_days($bdd);
//$price_total=total_price_orders($bdd);
//$order_between_two_price=orders_between_100_550($bdd);


// ---------------------------------> FONCTION QUI PERMET L'AJOUT D'UN ARTICLE <-----------------------------------
//  add_new_article($bdd);

// ---------------------------------> FONCTION QUI PERMET L'AJOUT D'UNE CATEGORIE <-----------------------------------
// add_new_category($bdd)
// ----------------------------------> FONCTION QUI PERMET L'AJOUT D'UN UTILISATEUR<---------------------------------

// $user=['baptiste','baptiste.delacroix@yoyo.fr','là','38000','Pekin']; // POUR RENTRER MANUELLEMENT UN UTILISATEUR
// add_user($bdd,$user);

//---------------------------------------------> PERMET D'AFFICHER LES DEMANDES<-----------------------------------
//var_dump($add_article);
//




?>
<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title> Article </title>
    <meta name="article.php" content="catalogue">
</head>
<body>
<header class="hero">
    <img src="img/header_laponie.jpg" alt="photo header"/>
    <h1>Lapland Safari</h1>
    <nav>
        <ul>
            <li><a href="addArticle.php">Ajoutez Votre Destination</a></li>
        </ul>
    </nav>
</header>

<form action="panier.php" method="post">
    <?php
    $liste = select_list_of_products($bdd);
    var_dump($liste);
    while ($d_liste=$liste->fetch()){
        ?>
        <div class="cadre article">
            <h2 class="nom"> Venez profitez du superbe <span><?=$d_liste['name']?></span> </h2>
            <p class="prix"> Pour la modique somme de <span><?=$d_liste['price']?></span> euros </p>
            <img src="<?=$d_liste['image']?>"/>
            <p>
                <input type="checkbox" name="articles[]" value=" ' . $i . ' " >
                <input type="number" name="quantite[]">
            </p>
        </div>
        <?php
    }
    ?>
    <input class="bouton" type="submit" value="Envoyer">
</form>

</body>
<footer>

</footer>
</html>


?>