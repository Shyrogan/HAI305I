<?php
$title = "Mon Espace";
session_start();
include "header.php";

if (!isset($_SESSION["mail"]) || $_SESSION["mail"] == ""){
	header('Location: index.php');
	exit();
}
$getClient = getClient($_SESSION["mail"]);
$client = $getClient->fetch();
if ($client != null){

			$email = $_SESSION['mail'];

			$nom = $client['nom'];
			$prenom = $client['prenom'];
			$ville = $client['ville'];
			$adresse =$client['adresse'];
			$tel = $client['telephone'];
			
			$tel = "" ?  "non renseigné" : $tel ;
			$adresse = "" ?  "non renseigné" : $adresse ;
			$ville = "" ?  "non renseigné" : $ville ;
}
else {
	echo "Un probleme est survenu dans la base";
}

?>


<div class="page-container container">
    <p class="py-4">Salut <?php echo $prenom; ?> !<br /> Bienvenue sur ton Espace</p>

    <h2>Mes informations:</h2>
    <ul>
    	<li><p>Nom: <?php echo $nom; ?></p></li>
        <li><p>Prenom: <?php echo $prenom; ?></p></li>              
        <li><p>Adresse éléctronique: <?php echo $_SESSION['mail']; ?></li></p>
        <li><p>Telephone: <?php echo $tel; ?></p></li>
        <li><p>Adresse: <?php echo $adresse; ?></p></li>
        <li><p>Ville: <?php echo $ville; ?></p></li>

    </ul>

	<p class="py-4">
		<button onclick="location.href='/deconnexion.php'" type="button">Déconnexion</button>
	</p>

	<h2>Mes commandes:</h2>
	<?php
	$email = $_SESSION['mail'];
    $commandes = $db->query("SELECT * FROM Commandes WHERE emailclient = '".$email."' AND etat = 'commande'");
	while($commande = $commandes->fetch()) {
		echo '<h4>'.date('d-m-Y', strtotime($commande['dateCommande'])).'</h4>';
		$lignes = $db->query("SELECT * FROM LignesCommandes WHERE idCommande = ".$commande['idCommande']);
		echo '<div class="page-container container pb-4">';
		while ($ligne = $lignes->fetch()) {
			$produit = $db->query("SELECT * FROM Produits WHERE idProduit = ".$ligne['idProduit'])
				->fetch();
			echo '<div class="row">';
			echo '<div class="col">';
			echo '<img src="'.$produit['photo'].'" class="imgproduits">';
			echo '</div>';
			echo '<div class="col-6">';
			echo '<p>'.$produit['nom'].'</p>';
			echo '<p>'.$produit['descriptif'].'</p>';
			echo '</div>';
			echo '<div class="col">';
			echo '<p>Prix unitaire: '.$produit['prix'].'€</p>';
			echo '<p>Quantité: '.$ligne['quantite'].'€</p>';
			echo '<p>Total: '.$produit['prix']*$ligne['quantite'].'€</p>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
	}
	?>

    <?php include "footer.php" ?>
</div>
