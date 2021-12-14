<?php
$title = "Boutique";
$pagecour = "Liste_Produits";
include "header.php";
include "config/requete.php";

echo '<div class="page-container container">';
while ($Lproduits = $produits->fetch()) {
  echo '<div class="row">';
    echo '<div class="col">';
      echo '<img src="'.$Lproduits['photo'].'" class="imgproduits">';
    echo '</div>';
    echo '<div class="col-6">';
      echo '<p>'.$Lproduits['nom'].'</p>';
    echo '</div>';
    echo '<div class="col">';
      echo '<p>'.$Lproduits['prix'].'€</p>';
    echo '</div>';
  echo '</div>';
}
echo '</div>';
?>

<?php include "footer.php" ?>