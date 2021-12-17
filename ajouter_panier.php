<?php
$title = "Ajouter au panier";
session_start();
include "header.php";

if ((!isset($_SESSION["mail"]) || $_SESSION["mail"] == "") || (!isset($_GET["idProduit"]) || $_GET["idProduit"] == "")){
    header("Location: /");
	exit();
} else {
    global $db;
    $email = $_SESSION['mail'];
    $idProduit = $_GET['idProduit'];
    $resultatCommande = $db -> query("SELECT (idCommande) FROM Commandes WHERE emailclient = '".$email."' AND etat = 'panier'")
        -> fetch();
    $idCommande = $resultatCommande['idCommande'];
    if(!isset($idCommande) || count($idCommande) == 0) {
        // Au cas où
        $sql = "INSERT INTO Commandes(dateCommande, emailclient, etat) VALUES(?,?,?)";
		$query = $db->prepare($sql);
		$query->execute([date("Y-m-d H:i:s"), $email, 'panier']);
    }
    $resultatCommande = $db -> query("SELECT (idCommande) FROM Commandes WHERE emailclient = '".$email."' AND etat = 'panier'")
        -> fetch();
    $idCommande = $resultatCommande['idCommande'];

    $lignes = $db->query("SELECT * FROM LignesCommandes WHERE idProduit = ".$idProduit." AND idCommande = ".$idCommande)
        -> fetch();
    
    if(!isset($lignes) || !$lignes) {
        $db->prepare("INSERT INTO LignesCommandes(idProduit,idCommande,quantite) VALUES (?, ?, ?)")
            ->execute([$idProduit, $idCommande, 1]);
    } else {
        $quantite = $lignes['quantite'];
        $db->prepare("UPDATE LignesCommandes SET quantite=? WHERE idProduit = ? AND idCommande = ?")
            ->execute([$quantite + 1, $idProduit, $idCommande]);
    }
    echo '<div class="page-container container"><p>Ajouté</p></div>';
    header("Location: /boutique.php");
	exit();
}
?>