<?php
/*$rproduit = "SELECT * FROM produits ";
$rcommandes ="SELECT * FROM commandes ";
$rclients = "SELECT * FROM clients ";

$produits = $db->query($rproduit);
$commandes = $db->query($rcommandes);
$clients = $db->query($rclients);

*/

function getProduits(){
	global $db;
	return $db->query("SELECT * FROM produits");
}

function getMarques(){
	global $db;
	$query = "SELECT marque FROM produits GROUP BY marque";
	return $db->query($query);
}

function getCommandes(){
	global $db;
	$rcommandes ="SELECT * FROM Commandes WHERE idCommande = ?";
	return $db->query($rcommandes);
}

function getClients(){
	global $db;
	$rclients = "SELECT * FROM clients ";
	return $db->query($rclients);
}

function getLignesCommandes(){
	global $db;
	$rlignescommandes = "SELECT * FROM lignescommandes ";
	return $db->query($rlignescommandes);
}

function checkmail($mail){
		global $db;
	$query = "SELECT email FROM clients ";
	$where = "";
	if ($mail != "") {
		$where .= " WHERE email = '".$mail."'";
	}else
	{
		return false;
	}
	$query .= $where;
	$client = $db->query($query)->fetch();
	return $client["email"] == $mail;
}

function checkmdp($mdp, $mail){
	global $db;
	$sql = "SELECT motDePasse FROM clients ";
	$where = " WHERE motDePasse = '".$mdp."' AND email = '".$mail."'";
	$sql .= $where;
	$password = $db->query($sql)->fetch();
	return $password["motDePasse"] == $mdp;
}

function getClient($mail){
	global $db;
	$q = "SELECT * FROM clients WHERE email = '".$mail."' ";
	return $db->query($q);
}
	