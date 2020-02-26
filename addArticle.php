<?php
require "fonctions_boutique.php";
require "class.php";

$error = false;
$messagePrice = '';
$messageImage = '';
$messageLocation = '';
$imageHero = "img/header_laponie.jpg";

if (!empty($_POST)) {   // CONDITION
    if (empty($_POST['Destination'])) {
        $messageLocation = 'MERCI D\'INDIQUER LA DESTINATION';
        $error = true;
    } elseif (empty($_POST['Prix'])) {
        $messagePrice = 'MERCI D\'INDIQUER LE PRIX ESTIME';
        $error = true;
    } elseif ($_POST['Prix'] < 0) {
        $messagePrice = 'LE PRIX NE PEUT ETRE INFERIEUR A ZERO';
        $error = true;
    }
}

// Tester si les fichier a bien été envoyé et s'il n'y a pas d'erreur
if (!empty($_FILES)) {
    if (isset($_FILES['Image']) AND $_FILES['Image']['error'] == 0) {
        // Tester si le fichier n'est pas trop gros
        if ($_FILES['Image']['size'] <= 1000000) {
            // Tester si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['Image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_upload, $extensions_autorisees)) {
                // Pour valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['Image']['tmp_name'], 'img/img_temp/' . basename($_FILES['Image']['name']));
            }
        }
    } else {
        $error = true;
        $messageImage = 'VEUILLEZ INSERER UNE IMAGE';
    }
}

if (($error == false) AND (!empty($_POST))) { ?>
    <header class="hero">
        <img src="<?php echo $imageHero ?>" alt="photo header"/>
        <h1>Lapland Safari</h1>
        <nav>
            <ul>
                <li><a href="index.php">Retourner à l'accueil</a></li>
            </ul>
        </nav>
    </header>
    <div class="cadre article">
        <h2 class="nom"> Vous souhaitez découvrir <?php echo $_POST['Destination']; ?></h2>
        <img src="img/img_temp/<?php echo basename($_FILES['Image']['name']); ?>"
             alt="Photo de <?php $_POST['Destination'] ?>">
        <p class="prix"> Pour la modique somme de <?php echo $_POST['Prix'] ?> euros</p>
    </div>
    <?php
} else { ?>
    <header class="hero">
        <img src="<?php echo $imageHero ?>" alt="photo header"/>
        <h1>Lapland Safari</h1>
        <nav>
            <ul>
                <li><a href="index.php">Retourner à l'accueil</a></li>
            </ul>
        </nav>
    </header>
    <form action="addArticle.php" method="POST" enctype="multipart/form-data">
        <label>
            <p><label>Destination : <input type="text" name="Destination" placeholder="Limité à la planète Terre"/></label></p>
            <?php if (!empty($messageLocation)) : ?>
                <p><?php echo $messageLocation; ?></p>
            <?php endif; ?>
            <p><label>Image : <input type="file" name="Image" required="required"/></label></p>
            <?php if (!empty($messageImage)) : ?>
                <p><?php echo $messageImage; ?></p>
            <?php endif; ?>
            <p><label>Prix : <input type="number" name="Prix" placeholder="Prix estimé"/></label></p>
            <?php if (!empty($messagePrice)) : ?>
                <p><?php echo $messagePrice; ?></p>
            <?php endif; ?>
            <p><input type="submit"/></p>
    </form>
    <?php
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Ajouter un article de vacation</title>
</head>

</html>
