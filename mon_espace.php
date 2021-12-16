<?php
session_start();
include "header.php";
$pagecour = "Mon Espace";



if (!isset($_SESSION["mail"]) || $_SESSION["mail"] ==""){
	header('Location: index.php');
	exit();
}
$getClient = getClient($_SESSION["mail"]);
$client = $getClient->fetch();
if ($client != null){
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
	echo " un probleme est survenu dans la base";
}

?>


<div class="page-container container">
    <p>Salut <?php echo $prenom; ?> !<br /> Bienvenue sur ton Espace</p>

    <h2>Mes informations:</h2>
    <ul>
    	<p><li>Nom: <?php echo $nom; ?></li></p> 
        <p><li>Prenom: <?php echo $prenom; ?></li></p>               
        <p><li>Adresse éléctronique: <?php echo $_SESSION['mail']; ?></li></p>
        <p><li>Telephone: <?php echo $tel; ?></li></p> 
        <p><li>Adresse: <?php echo $adresse; ?></li></p> 
        <p><li>Ville: <?php echo $ville; ?></li></p> 

    </ul>

    <p><a href="deconnexion.php">Déconnexion</a></p>
    <?php include "footer.php" ?>
</div>