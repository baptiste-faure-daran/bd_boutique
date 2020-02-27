<?php

// Fonction sélection liste des produits (1 table)

function select_list_of_products($bdd)
{
    $list_of_products = $bdd->query(
        'SELECT * FROM articles'
    );
    return $list_of_products;
}

// Fonction sélection des produits où l'Id est coché
function select_product_by_id($bdd, $id)
{
    $products_by_id = $bdd->query(
        "SELECT * FROM articles WHERE articles.id ='$id ' "
    );
    return $products_by_id;

}

// Fonction commandes listées des 10 derniers jours (1 table)

function orders_from_the_last_10_days($bdd)
{
    $last_10_days_orders = $bdd->query(
        'SELECT * FROM orders WHERE date>(NOW() - INTERVAL 10 day)'
    );
    return $last_10_days_orders;
}

// Fonction calcul prix total commandes (2 tables) (total | Orders_id)

function total_price_orders($bdd)
{
    $total_price = $bdd->query(
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
    $order_100_550 = $bdd->query(
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

// Fonction ajout d'un article (ajout/modification/suppression)

function add_new_article($bdd)
{
    $bdd->query(
        '
     INSERT INTO articles (name,description,price,weight,image,stock,for_sale,Categories_id) 
     VALUES ("testPHP","un sacré test PHP",1400,2,"",2,1,3);
        '
    );
}

//// Fonction ajout d'un utilisateur (ajout/modification/suppression)

function add_user($bdd, $user)
{
    $req = $bdd->prepare('INSERT INTO users(name,email,adress,postal_code,city)
                        VALUES(:name,:email,:adress,:postal_code,:city)');
    $req->execute(array(
        ':name' => $user[0],
        ':email' => $user[1],
        ':adress' => $user[2],
        ':postal_code' => $user[3],
        ':city' => $user[4]
    ));
}

// Fonction ajout d'une catégorie (ajout/modification/suppression))

function add_new_category($bdd)
{
    $bdd->query(
        '
     INSERT INTO categories (id,name) 
     VALUES (4,"orangina");
        '
    );
}

// Fonction suppression 1 stock d'article
function delete_one_stock($bdd)
{
    'UPDATE `articles` 
    SET `stock`=(`stock`-1) 
    WHERE articles.id=3';
}
