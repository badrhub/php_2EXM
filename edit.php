<?php 
require("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$id =(int) $_GET['id'];
$client = find($id);
$villes = all("ville");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition de  <?= $etudiant['id'] ?> </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
</head>

<body>
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info">Modidication du client</div>

        <form action="controller.php?action=update" method="post">
        <input type="hidden" name="id" value="<?= $client['id']?> ">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom"  value="<?= $client['nom']?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $client['prenom']?>">
            </div>
            <div class="form-group">
                <label for="d">Tel</label>
                <input type="text" class="form-control" name="tel" id="d" value="<?= $client['tel']?>">
            </div>
            <div class="form-group">
                <label for="d">Ville</label>
            <select name="ville_id" id="d" class="form-control">
                <?php  foreach($villes as $v) {?>
                <option value="<?=$v['id'] ?>" <?php if($v['id'] == $client['ville_id']) echo 'selected';?> ><?= $v['nom']?></option>
                <?php }?>
            </select>
            </div>
            <button class="btn btn-primary">Valider</button>

        </form>

    </div>




    </body>

</html>