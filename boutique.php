<?php
$title = "Boutique";

include "header.php";
$marq = isset($_GET["marque"]) ?  $_GET["marque"] : "";

echo '<div class="page-container container">';
  echo '<p class="p-4"><label class="pr-4">Recherche : </label><input type="text" value="" id="nom" name="nom" /></p>';
while ($Lproduits = $produits->fetch()) {
  echo '<div class="row" id="'.$Lproduits['nom'].'">';
    echo '<div class="col">';
      echo '<img src="'.$Lproduits['photo'].'" class="imgproduits">';
    echo '</div>';
    echo '<div class="col-6">';
      echo '<p>'.$Lproduits['nom'].'</p>';
      echo '<p>'.$Lproduits['descriptif'].'</p>';
    echo '</div>';
    echo '<div class="col">';
      echo '<p>'.$Lproduits['prix'].'€</p>';
    echo '</div>';
  echo '</div>';
}
echo '</div>';
?>

<script>
  $("#nom").on('input', function(e) {
    const nom = $( this ).val().toLocaleLowerCase();

    $(".row").each(function(e) {
      const row = $( this );
      if(!row.attr('id').toLocaleLowerCase().includes(nom)) {
        row.hide(200)
      } else {
        row.show(200)
      }
    })
  });
</script>

<?php include "footer.php" ?>