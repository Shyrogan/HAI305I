<?php
$title = "Panier";
session_start();
include "header.php";

if (!isset($_SESSION["mail"]) || $_SESSION["mail"] == ""){
    header("Location: /");
	exit();
} else {
    global $db;
    $email = $_SESSION['mail'];
    $resultatCommande = $db -> query("SELECT (idCommande) FROM Commandes WHERE emailclient = '".$email."' AND etat = 'panier'")
        -> fetch();
    $idCommande = $resultatCommande['idCommande'];

    $total = 0;
    echo '<div class="page-container container">';
    echo '<p class="p-4"><label class="pr-4">Recherche : </label><input type="text" value="" id="nom" name="nom" /></p>';
    $lignes = $db->query("SELECT * FROM LignesCommandes WHERE idCommande = ".$idCommande);
    while ($Lcommande = $lignes->fetch()) {
        $Lproduits = $db->query("SELECT * FROM Produits WHERE idProduit = ".$Lcommande['idProduit'])->fetch();
        echo '<div class="row" id="'.$Lproduits['nom'].' '.$Lproduits['marque'].' '.$Lproduits['prix'].' '.$Lproduits['descriptif'].' '.$Lproduits['categorie'].'">';
        echo '<div class="col">';
        echo '<img src="'.$Lproduits['photo'].'" class="imgproduits">';
        echo '</div>';
        echo '<div class="col-6">';
        echo '<p>'.$Lproduits['nom'].'</p>';
        echo '<p>Quantité: '.$Lcommande['quantite'].'</p>';
        echo '</div>';
        echo '<div class="col">';
        echo '<p>Prix: '.$Lproduits['prix'] * $Lcommande['quantite'].'€</p>';
        echo '</div>';
        echo '</div>';
        $total += $Lproduits['prix'] * $Lcommande['quantite'];
    }
    echo '<div class="py-4">';
    echo '<p>Total: '.$total.'€</p>';
    echo '<button onclick="location.href=`/valider_panier.php`" type="button">Valider</button>';
    echo '</div>';
    echo '</div>';
}
?>

<script>
  $("#nom").on('input', function(e) {
    const nom = $( this ).val().toLocaleLowerCase();

    $(".row").each(function(e) {
      const row = $( this );
      if(!row.attr('id').toLocaleLowerCase().includes(nom)) {
        row.hide(200)
      } else {
        row.show(200)
      }
    })
  });
</script>
