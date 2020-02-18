<?php
require "fonctions_boutique.php";

$liste = select_list_of_products($bdd);
$commandes_last_10_days = orders_from_the_last_10_days($bdd);
$price_total=total_price_orders($bdd);
$order_between_two_price=orders_between_100_550($bdd);


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
//while ($donnees=$add_article->fetch()) {
//    echo '<p>' . $donnees['articles'] .'</p>';
//}


?>