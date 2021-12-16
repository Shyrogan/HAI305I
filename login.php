<?php
session_start();

$title = "Connexion";

include "header.php";

$mail = isset($_POST [ 'mail' ]) ? $_POST [ 'mail' ] : "";
$mdp = isset($_POST [ 'mdp' ]) ? $_POST [ 'mdp' ] : "";
	
$error = "";
	
if($mail != "" && $mdp != "" && !isset($_SESSION['mail'])){
    global $db;

	if(checkmdp($mdp, $mail) ){
			
		$_SESSION['mail'] = $mail;
		//$_SESSION["connected"] = 1; 
		header('Location: mon_espace.php');
		exit();
	} else {
		$error = "Mot de passe ou identifiant incorrect ";
	}
		
} else {
	if (isset($_POST['envoi']))
       $error = "Veuillez saisir tous les champs obligatoires merci ";
}
?>


<div class="page-container container p-4">
	<div id="error" class="error"><?php echo $error ?></div>
	
	<form id="envoyer" name="log" action="login.php" method="Post">
	

		<p><label for="mail">Mail* :</label><input type="email" "<?php echo $mail ?>" id="mail" name="mail" /></p>
		<p><label for="mdp">Mot de passe* :</label><input type="text" value="" id="mdp" name="mdp" /></p>

		
		<input type="submit" value="Envoyer" name="envoi" />
		
  </form>
</div>


<?php include "footer.php" ?>