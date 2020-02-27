<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bd_boutique', 'baptiste556', 'marvin');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


function get_article_liste($bdd)
{
    return $bdd->query('
                        SELECT articles.*, chaussures.styleChaussures, vetements.styleVetement 
                        FROM articles 
                        LEFT JOIN chaussures ON articles.id=chaussures.idArticle 
                        LEFT JOIN vetements ON articles.id=vetements.idArticle
                        ')->fetchAll(PDO::FETCH_ASSOC);
}


function displayArticles(Article $objetArticle)
{
    ?>
    <div class="cadre article">
        <h2 class="nom"> Venez profitez du superbe tour <span><?= $objetArticle->getName() ?></span></h2>
        <p class="prix"> Pour la modique somme de <span><?= $objetArticle->getPrice() ?></span> euros </p>
        <img src="<?= $objetArticle->getImage() ?>"/>
        <?php
        if (is_a($objetArticle, 'Chaussures')) {
            ?>
            <h2 class="chaussure"> N'oubliez pas de prendre <span><?= $objetArticle->getStyleChaussures() ?></span></h2>
            <?php
        } elseif (is_a($objetArticle, 'Vetements')) {
            ?>
            <h2 class="vetement"> N'oubliez pas de prendre <span><?= $objetArticle->getStyleVetements() ?></span></h2>
            <?php
        }


        ?>
        <p>
            <input type="checkbox" name="articles[]" value="<?= $objetArticle->getId() ?>">

        </p>
    </div>

    <?php
}

function displayCat(Catalogue $catalogue)
{
    foreach ($catalogue->getCat() as $objetArticle) {
        displayArticles($objetArticle);
    }
}

function displayClients(Client $objetClient)
{
    ?>
    <div class="card " style="width: 18rem;">
        <div class="card-header">
            Client
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Client : <?= $objetClient->getId() ?></li>
            <li class="list-group-item">Email : <?= $objetClient->getName() ?></li>
            <li class="list-group-item">Adresse : <?= $objetClient->getEmail() ?></li>
            <li class="list-group-item">Code Postal : <?= $objetClient->getAdress() ?></li>
            <li class="list-group-item">Ville : <?= $objetClient->getPostalCode() ?></li>
            <li class="list-group-item">Ville : <?= $objetClient->getCity() ?></li>

        </ul>
    </div>
    <?php
}

function displayCli(ListeClients $listeClients)
{

    foreach ($listeClients->getCli() as $objetClient) {
        displayClients($objetClient);
    }
}

function get_client_liste($bdd)
{
    return $bdd->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC);
}






