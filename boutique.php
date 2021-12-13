<?php
session_start();
$title = "Boutique";
$pagecour = "Liste_Produits";


include "header.php";
$marq = isset($_GET["marque"]) ?  $_GET["marque"] : "";

?>


<div class="shop-container container">
  <div class="row">
		<form>
			<select name="marque" id="marque">
			<?php
			$marques = getMarques();
			$option ="";
			while ($lm = $marques->fetch()){
				$option .= "<option value='".$lm["marque"]."'";
				if ($marq == $lm["marque"])
					$option .= "selected";
				$option .= ">".$lm["marque"]."</option>";
			}
			echo $option;
			?>
			</select>
			<input type="submit" value="Envoyer">
		</form> 
	</div>
	<div class="row">


<?php


$produits = getProduits($marq);

$result = "<table width='100%' class='listeproduit'><th width='25%'>Libellé</th><th width='25%'><Prix></th><th width='25%'>Désignation</th><th width='25%'></th><tr>";
 while ($Lproduits = $produits->fetch()){

  $result .= "<td>" . $Lproduits['nom'] . "</td><td>" . $Lproduits['prix']." €</td><td>" . $Lproduits['descriptif']."</td><td><img class='imgproduits' src=" . $Lproduits['photo'] . ">"."</td></tr>";
 }
 $result .= "</table>";
 echo $result;
?> 
 
  </div>
</div>

<?php include "footer.php" ?>