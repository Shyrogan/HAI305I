<?php
session_start();
include "header.php";
if  (isset($_GET[ 'nom' ]))
{


$_SESSION['pseudo'] = isset($_GET [ 'nom' ]) ? $_GET [ 'nom' ] : "" ;
$_SESSION['age'] = isset($_GET [ 'age' ]) ? $_GET [ 'age' ] : "" ;
$_SESSION['email'] = isset($_GET [ 'mail' ]) ? $_GET [ 'mail' ] : "" ;
}
else
{
$_SESSION['pseudo'] = $_SESSION['pseudo'];
$_SESSION['age'] = $_SESSION['age'];
$_SESSION['email'] = $_SESSION['email'];
}

$pagecour = "Mon Espace";


include "myheader.php";

?>



    <p>
        Salut <?php echo $_SESSION['pseudo']; ?> !<br />
        Bienvenue sur ton Espace 
    </p>

<h2>Mes informations:</h2>
<ul>
                                    <p><li>Pseudo: <?php echo $_SESSION['pseudo']; ?></li></p>               
                                    <p><li>Age: <?php echo $_SESSION['age']; ?>ans </li></p>
                                    <p><li>Mail: <?php echo $_SESSION['email']; ?></li></p>
                                      </ul>
    


<p><a href="deconexion.php">Déconnexion</a></p>
    <?php include "footer.php" ?>