<?php
include("fonctions.php");
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
    afficheArticle($cats);
    ?>
    <input class="bouton" type="submit" value="Envoyer">
</form>

</body>
<footer>

</footer>
</html>

