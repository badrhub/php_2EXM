<?php
include("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$action ="store";
$notice = "Nouvelle Ville";
if(isset($_GET["id"])){
  $ville =  find($_GET['id'],"ville");
  $action = "update";
  $notice ="Modification de la ville ".$ville['nom'];
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
     
    <body>
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info"><?= $notice ?></div>
        <form action="controller_ville.php?action=<?=$action?>" method="post">
        <?php   if(isset($ville)){  ?>
            <input type="hidden" name="id" value="<?=$ville['id']  ?> ">
       <?php } ?>
        
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= (isset($ville)? $ville['nom']:"")  ?>">
            </div>
            
            <button class="btn btn-primary">Enregistrer</button>

        </form>

    </div>

   
    </body>
</html>