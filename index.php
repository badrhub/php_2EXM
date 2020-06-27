<?php
include_once("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");

$clients = all_client_ville();

$message = "";
$classe ="d-none";
if(isset($_GET['op'])){
    extract($_GET);
  switch($op){
     case "update":
        $message ="Modification effectue avec success ";
        $classe = "alert-warning";
        break;
      case "store":
        $message ="Ajout effectue avec success ";
        $classe = "alert-info";
        break;
      case "delete":
        $message ="Suppression effectue avec success ";
        $classe = "alert-danger";
        break;  
       default:
       $message ="erreur ";
       $classe = "alert-danger";     
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des clients</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body oncontextmenu="return false">
    <?php include("_menu.php"); ?>
    <div class="container">
    <div class="alert <?= $classe ?>"><?= $message ?></div>
        <div class="text-right">
            <a href="create.php" class="btn btn-sm btn-primary my-1">Nouveau</a>
        </div>
        <div class="alert alert-info">liste des clients</div>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>tel</th>
                    <th>ville</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $p) { ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?= $p['nom']; ?></td>
                        <td><?= $p['prenom']; ?></td>
                        <td><?= $p['tel']; ?></td>
                        <td><?= $p['vl']; ?></td>
                        <th>
                            <div class="btn-group">

                                <a onclick="return confirm('voulew vous vraiment supprimer cet element?')" href="controller.php?id=<?php echo $p['id']; ?>&action=delete" class="btn btn-sm btn-danger">S</a>
                                <a href="edit.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">M</a>
                                <a href="show.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-info ">C</a>
                        </th>

    </div>
    </tr>
<?php } ?>
</tbody>
</table>
</div>




</body>

</html>