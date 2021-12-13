<?php






function getProduits($marq){
	global $db;
	$query = "SELECT * FROM produits ";
	$where = "";
	if ($marq != "") {
		$where .= " WHERE marque = '".$marq."'";
	}
	$query .= $where;
	$produit = $db->query($query);
	return $produit;
}

function getMarques(){
	global $db;
	$query = "SELECT marque FROM produits GROUP BY marque";
	return $db->query($query);
}

function getCommandes(){
	global $db;
	$rcommandes ="SELECT * FROM commandes ";
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





