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

	<h2>Mes commandes:</h2>
	
    <p class="py-4">
		<button onclick="location.href='/panier.php'" type="button">Mon panier</button>
		<button onclick="location.href='/deconnexion.php'" type="button">Déconnexion</button>
	</p>
    <?php include "footer.php" ?>
</div>