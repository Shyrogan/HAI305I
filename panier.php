<?php
session_start();
include "header.php";

if (isset($_SESSION['email'])) {
    global $db;
    $email = $_SESSION['email'];
    $resultatCommande = $db -> query("SELECT FIRST(idCommande) FROM Commandes WHERE emailclient = '".$email."' AND etat = 'panier'")
        -> fetch();
    $idCommande = $resultatCommande['idCommande'];

    echo '<div class="page-container container">';
    echo '<p class="p-4"><label class="pr-4">Recherche : </label><input type="text" value="" id="nom" name="nom" /></p>';
    while ($Lcommande = $db->query("SELECT * FROM LignesCommandes WHERE idCommande = ".$idCommande)) {
        $Lproduits = $db->query("SELECT * FROM Produits WHERE idProduit = ".$Lcommande['idProduit']);
        echo '<div class="row" id="'.$Lproduits['nom'].' '.$Lproduits['marque'].' '.$Lproduits['prix'].' '.$Lproduits['descriptif'].' '.$Lproduits['categorie'].'">';
        echo '<div class="col">';
        echo '<img src="'.$Lproduits['photo'].'" class="imgproduits">';
        echo '</div>';
        echo '<div class="col-6">';
        echo '<p>'.$Lproduits['nom'].'</p>';
        echo '<p>'.$Lproduits['descriptif'].'</p>';
        echo '</div>';
        echo '<div class="col">';
        echo '<p>'.$Lproduits['prix'].'€</p>';
        echo '</div>';
    echo '</div>';
    }
    echo '</div>';
    echo $idCommande;
} else {
    header("Location: /");
}
?>