<?php
require "fonctions_boutique.php";
require "class.php";
include('head.php');
?>
<?php
displayCli(new ListeClients(get_client_liste($bdd)));
?>
<?php
include 'footer.php';
