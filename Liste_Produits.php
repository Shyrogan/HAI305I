<?php
session_start();

$title = "Liste_Produits";

$nomvisi = isset($_SESSION["pseudo"]) ? $_SESSION["pseudo"] : "bel inconnu(e)";
include "header.php";
include "config/requete.php";
?>
<h1>Le Meilleur de Selly</h1>

<?php

 while ($Lproduits = $produits->fetch()){

 	echo $Lproduits['nom']."<br/>"."    ".$Lproduits['prix']."€"."<br/>".$Lproduits['descriptif']."<img src='".$Lproduits['photo']."'class='imgproduits'>"."<br/>"."<br/>";
 

 ;

 }
?> 

<?php include "footer.php"; ?>
