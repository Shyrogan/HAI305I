<?php
session_start();
session_destroy();
include "header.php";
?>

<div class = "page-container container">
    <h1>Déconnexion réussie.<h1>
    <h4><a href="index.php">Retour a l'acceuil</a><h4>
</div>

<?php include "footer.php" ?>