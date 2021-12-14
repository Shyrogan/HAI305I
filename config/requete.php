<?php

session_start();
include "DB.php";
global $db;

$rproduit = "SELECT * FROM produits ";
$rcommandes ="SELECT * FROM commandes ";
$rclients = "SELECT * FROM clients ";
$rlignescommandes = "SELECT * FROM lignescommandes ";

$produits = $db->query($rproduit);
$commandes = $db->query($rcommandes);
$clients = $db->query($rclients);
$lignescommandes = $db->query($rlignescommandes);