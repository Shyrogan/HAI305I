<?php
session_start();
$title = "Boutique";
$pagecour = "Liste_Produits";
include "header.php";
include "config/requete.php";

?>

<div class="shop-container container">
  <div class="row">
    <div class="col">
      <p>Texte</p>
    </div>
    <div class="col-6">
      <p>Texte</p>
    </div>
    <div class="col">
      <p>Texte</p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>Texte</p>
    </div>
    <div class="col-6">
      <p>Texte</p>
    </div>
    <div class="col">
      <p>Texte</p>
    </div>
  </div>
</div>


<?php

 while ($Lproduits = $produits->fetch()){

  echo $Lproduits['nom']."<br/>"."    ".$Lproduits['prix']."€"."<br/>".$Lproduits['descriptif']."<img src='".$Lproduits['photo']."'class='imgproduits'>"."<br/>"."<br/>";
 

 }
?> 

<?php include "footer.php" ?>