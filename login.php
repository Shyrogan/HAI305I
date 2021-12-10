<?php
// TODO: La connexion lorsque la personne se connecte, sinon
// s'il est connecté, renvoyer vers le panier.

$title = "Accueil";
include "header.php";
?>

<div class="shop-container container">
    <div class="align-items-center">
        <div class="col-6 mx-auto">
          <div class="container">
            <h1 class="text-center text-white">Connexion</h1>
            <footer class="blockquote-footer text-center">Veuillez entrer votre e-mail et mot de passe afin de vous connecter.</footer>
          </div>
            
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Adresse mail" aria-label="Adresse e-mail" aria-describedby="basic-addon2">
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="basic-addon2">
          </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>