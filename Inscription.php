<?php
session_start();

$pagecour = "Inscription";
include "header.php";

$nom = isset($_POST [ 'nom' ]) ? $_POST [ 'nom' ] : "";
$prenom = isset($_POST [ 'prenom' ]) ? $_POST [ 'prenom' ] : "";
$mail = isset($_POST [ 'mail' ]) ? $_POST [ 'mail' ] : "";
$mdp = isset($_POST [ 'password' ]) ? $_POST [ 'password' ] : "";
$ville = isset($_POST [ 'city' ]) ? $_POST [ 'city' ] : "";
$adresse = isset($_POST [ 'addresse' ]) ? $_POST [ 'addresse' ] : "";
$tel = isset($_POST [ 'phone' ]) ? $_POST [ 'phone' ] : 0;
	
$error = "";

if( $nom !="" && $prenom !="" && $mail!="" && $mdp !=""){
    global $db;
    if(checkmail($mail)){
        $error= "Cet utilisateur existe deja";
    } else {
		$sql = "INSERT INTO clients(nom, prenom, email,motDePasse,ville,adresse,telephone) VALUES(?,?,?,?,?,?,?)";
		$query = $db->prepare($sql);
		$query->execute([$nom, $prenom, $mail, $mdp,$ville,$adresse,$tel]);
			
		$_SESSION['nom'] = $nom ;
		$_SESSION['prenom'] = $prenom ;
		$_SESSION['mail'] = $mail;

		$sql = "INSERT INTO Commandes(dateCommande, emailclient, etat) VALUES(?,?,?)";
		$query = $db->prepare($sql);
		$query->execute([date("Y-m-d H:i:s"), $mail, 'panier']);
			
		header('Location: mon_espace.php');
		exit();
	}
} else {
   if (isset($_POST['envoi'])	)
	$error = "Veuillez saisir tous les champs obligatoires merci ";
}
?>


<div class="page-container container p-4">
	<div id="error" class="error"><p><?php echo $error ?></p></div>
	
	<form id="envoyer" name="log" method="Post">
		<p><label for="nom">Nom* :</label><input type="text" value="<?php echo $nom ?>" id="nom" name="nom" /></p>

		<p><label for="prenom">Prenom* :</label><input type="text" "<?php echo $prenom ?>" id="prenom" name="prenom" /></p>

		<p><label for="mail">Mail* :</label><input type="email" "<?php echo $mail ?>" id="mail" name="mail" /></p
			>
		<p><label for="password">Mot de passe* :</label><input type="text" value="" id="password" name="password" /></p>

		<p><label for="city">Ville :</label><input type="text" value="" id="city" name="city" /></p>

		<p><label for="addresse">Adresse :</label><input type="text" value="" id="addresse" name="addresse" /></p>
		
		<p><label for="phone">telephone :</label><input type="int" value="" id="phone" name="phone" /></p>
		<input type="submit" value="Envoyer" name="envoi" />
	</form>
</div>

<?php include "footer.php" ?>