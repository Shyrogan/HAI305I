<?php
session_start();

$pagecour = "login";


//include "header.php";



?>


<div class="bloclogin">
  <form   id="envoyer" name="log" action="mon_espace.php" method="get">
    
    <p> <label for="nom">*Identifiant :</label>    <input type="text" value="" id="nom" name="nom" /></p>
    <p>   <label for="mail">*Mail :</label>   <input type="text" value="" id="mail" name="mail" /></p>
    <p><label for="age">*Age :</label>   <input type="int" value="" id="age" name="age" /></p>



    <div id="error" class="error"></div>
    <input type="submit" value="Envoyer" name="envoi" />
  </form>
</div>

<?php include "myfooter.php" ?>