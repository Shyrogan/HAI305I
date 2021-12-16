<?php
session_start();
include "header.php";

if (!isset($_SESSION["mail"]) || $_SESSION["mail"] == ""){
    header("Location: /");
	exit();
} else {
    global $db;
    $email = $_SESSION['mail'];
    $resultatCommande = $db -> query("SELECT (idCommande) FROM Commandes WHERE emailclient = '".$email."' AND etat = 'panier'")
        -> fetch();
    $idCommande = $resultatCommande['idCommande'];
    $taille = $db->query("SELECT COUNT(*) FROM LignesCommandes WHERE idCommande = ".$idCommande)->fetch();
    if(isset($taille) && $taille[0] > 0) {
        $db->query("UPDATE Commandes SET etat = 'commande' WHERE idCommande = ".$idCommande)->fetch();

		$sql = "INSERT INTO Commandes(dateCommande, emailclient, etat) VALUES(?,?,?)";
		$query = $db->prepare($sql);
		$query->execute([date("Y-m-d H:i:s"), $email, 'panier']);

		header('Location: mon_espace.php');
		exit();
    } else {
        echo '<div class="page-container container">Vide</div>';
    }
}
?>