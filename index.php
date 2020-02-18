<?php
require "fonctions_boutique.php";

$liste = select_list_of_products($bdd);
$commandes_last_10_days = orders_from_the_last_10_days($bdd);
$price_total=total_price_orders($bdd);
$order_between_two_price=orders_between_100_550($bdd);

var_dump($order_between_two_price);

while ($donnees=$order_between_two_price->fetch()) {
    echo '<p>' . $donnees['total'] .' '. $donnees['Orders_id'] . '</p>';
}

?>