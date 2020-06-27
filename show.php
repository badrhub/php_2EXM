<?php
include("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$id = (int) $_GET['id'];
$client = find($id ,"client");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $client['nom'] ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info">consultation de : <?= $client['nom'] ?></div>
        <ul>
            <li>Nom : <?= $client['nom'] ?></li>
            <li>Prenom : <?= $client['prenom'] ?></li>
            <li>Tel : <?= $client['tel'] ?></li>
            <li>Ville : <?= $client['ville_id'] ?></li>

        </ul>
        <a href="javascript:history.go(-1)" class="btn btn-success">retour</a>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>