<?php
include_once("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$id = (int) $_GET['id'];
$ville = find($id ,"ville");
$clients = all("client" ,"ville_id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ville['nom'] ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include("_menu.php"); ?>
    <div class="container">
        <div class="alert alert-info">consultation de : <?= $ville['nom'] ?></div>
        <ul>
        <li>ID : <?= $ville['id'] ?></li>
            <li>Nom : <?= $ville['nom'] ?></li>
            </ul>
        <a href="javascript:history.go(-1)" class="btn btn-success">retour</a>

        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>tel</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $p) { ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?= $p['nom']; ?></td>
                        <td><?= $p['prenom']; ?></td>
                        <td><?= $p['tel']; ?></td>
                    </tr>
                <?php } ?>               
             </tbody>  
             </table> 
        
    </div>