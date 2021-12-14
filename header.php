<?php
include "config/db.php";
include "config/requete.php";
$title = isset($title) ? $title : "";
$son =  isset($_SESSION['pseudo']) ? "mon_espace.php" : "login.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="/css/style.css" />
        <script src="/js/style.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:ital@1&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <title>Selly - <?php echo $title?></title>
    </head>
    <body>
        <nav id="nav" class="navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="#">Selly</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if($title === "Accueil") echo "active"; else echo "";?>" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?php if($title === "Boutique") echo "active"; else echo "";?>" href="boutique.php">Boutique</a>
                </li>
            </ul>
            <a class="nav-item navbar-link navbar-text" href="<?php echo $son ; ?> ">Mon compte</a>
        </nav>