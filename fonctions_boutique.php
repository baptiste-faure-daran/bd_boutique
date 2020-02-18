<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique', 'baptiste556', 'lemollard556');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Fonction séléction liste des produits (1 table)

function select_list_of_products($bdd)
{
    $list_of_products = $bdd->query(
        'SELECT * FROM articles'
    );
    return $list_of_products;
}

// Fonction commandes listées des 10 derniers jours (1 table)

function orders_from_the_last_10_days($bdd)
{
    $last_10_days_orders=$bdd->query(
        'SELECT * FROM orders WHERE date>(NOW() - INTERVAL 10 day)'
    );
    return $last_10_days_orders;
}

// Fonction calcul prix total commandes (2 tables) (total | Orders_id)

function total_price_orders($bdd)
{
    $total_price=$bdd->query(
        '
    SELECT SUM(articles.price*articles_orders.quantity) as total, articles_orders.Orders_id 
    FROM articles_orders 
    INNER JOIN articles
    ON articles_orders.Articles_id=articles.id
    GROUP BY articles_orders.Orders_id
        '
    );
    return $total_price;
}

// Fonction calcul commandes entre 100 et 550 euros (2 tables) (total | Orders_id)

function orders_between_100_550($bdd)
{
    $order_100_550=$bdd->query(
        '
     SELECT SUM(articles.price*articles_orders.quantity) as total, articles_orders.Orders_id
     FROM articles_orders
     INNER JOIN articles
     ON articles_orders.Articles_id=articles.id
     GROUP BY articles_orders.Orders_id
     HAVING total BETWEEN 100 and 550
        '
    );
    return $order_100_550;
}

// Fonction ajout d'une commande à 3 articles (ajout/modification/suppression)

function new_order_3_articles($bdd)
{
    $new_order=$bdd->query(
        '
     INSERT INTO orders (numero,date,price,total_weight,Users_id) 
     VALUES (21ML,2020.02.18,500,3,4)
     INSERT INTO articles_orders (Articles_id, Orders_id,quantity)
     VALUES (),(),()
        '
    );

}

?>






