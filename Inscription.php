<?php
session_start();

$pagecour = "Inscription";
include "header.php";

    $nom = isset($_POST [ 'nom' ]) ? $_POST [ 'nom' ] : "";
	$prenom = isset($_POST [ 'prenom' ]) ? $_POST [ 'prenom' ] : "";
	$mail = isset($_POST [ 'mail' ]) ? $_POST [ 'mail' ] : "";
	$mdp = isset($_POST [ 'mdp' ]) ? $_POST [ 'mdp' ] : "";
	$ville = isset($_POST [ 'ville' ]) ? $_POST [ 'ville' ] : "";
	$adresse = isset($_POST [ 'adresse' ]) ? $_POST [ 'adresse' ] : "";
	$tel = isset($_POST [ 'telephone' ]) ? $_POST [ 'telephone' ] : 0;
	
	$error = "";
	
	


	

    if( $nom !="" && $prenom !="" && $mail!="" && $mdp !=""){
        global $db;
        if(checkmail($mail)){
        	$error= "Cet utilisateur existe deja";
        }else{


			$sql = "INSERT INTO clients(nom, prenom, email,motDePasse,ville,adresse,telephone) VALUES(?,?,?,?,?,?,?)";
			echo $sql;
	        $query = $db->prepare($sql);
		    $query->execute([$nom, $prenom, $mail, $mdp,$ville,$adresse,$tel]);
			
			$_SESSION['nom'] = $nom ;
			$_SESSION['prenom'] = $prenom ;
			$_SESSION['mail'] = $mail;
			
			header('Location: mon_espace.php');
			exit();
		}
    }
	else
    {
       if (isset($_POST['envoi'])	)
		$error = "Veuillez saisir tous les champs obligatoires merci ";
    }



  ?>


<div class="page-container container p-4">
	<div id="error" class="error"><?php echo $error ?></div>
	
	<form id="envoyer" name="log" method="Post">
		<p><label for="nom">Nom* :</label><input type="text" value="<?php echo $nom ?>" id="nom" name="nom" /></p>

		<p><label for="prenom">Prenom* :</label><input type="text" "<?php echo $prenom ?>" id="prenom" name="prenom" /></p>
	


		<p><label for="mail">Mail* :</label><input type="email" "<?php echo $mail ?>" id="mail" name="mail" /></p
			>
		<p><label for="mdp">Mot de passe* :</label><input type="text" value="" id="mdp" name="mdp" /></p>

		<p><label for="ville">Ville :</label><input type="text" value="" id="ville" name="ville" /></p>

		<p><label for="adresse">Adresse :</label><input type="text" value="" id="adresse" name="adresse" /></p>
		
		<p><label for="tel">telephone :</label><input type="int" value="" id="tel" name="tel" /></p>
		<input type="submit" value="Envoyer" name="envoi" />
		
  </form>
</div>




<?php include "footer.php" ?>