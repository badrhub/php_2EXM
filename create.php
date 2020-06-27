<?php 
include_once("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$villes = all("ville");
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
        <div class="alert alert-info">Nouveau Client</div>
        <form action="controller.php?action=store" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
            <div class="form-group">
                <label for="d">Tel</label>
                <input type="text" class="form-control" name="tel" id="d">
            </div>
            <div class="form-group">
                <label for="d">Ville</label>
            <select name="ville_id" id="d" class="form-control">
                <option value="" selected></option>
                <?php  foreach($villes as $v) {?>
                <option value="<?=$v['id'] ?>"><?= $v['nom']?></option>
                <?php }?>
            </select>
            </div>
            <button class="btn btn-primary">Enregistrer</button>

        </form>

    </div>

   
    </body>
</html>