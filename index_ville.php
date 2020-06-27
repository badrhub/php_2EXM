<?php
include_once("functions.php");
demarer_session();
verifier($_SESSION['login'] ,$_SESSION['passe'],"login.php?cn=no");
$villes = all("ville");

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
    <title>liste des villes</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body oncontextmenu="return false">
    <?php include("_menu.php"); ?>
    <div class="container">
    <div class="alert <?= $classe ?>"><?= $message ?></div>
        <div class="text-right">
            <a href="form.php" class="btn btn-sm btn-primary my-1">Nouveau</a>
        </div>
        <div class="alert alert-info">liste des Villes</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nom</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($villes as $p) { ?>
                    <tr>
                        <td><?php echo $p['id']; ?></td>
                        <td><?= $p['nom']; ?></td>
                        <th>
                            <div class="btn-group">
                                <a onclick="return confirm('voulez vous vraiment supprimer cet element?')" href="controller_ville.php?id=<?php echo $p['id']; ?>&action=delete" class="btn btn-sm btn-danger">S</a>
                                <a href="form.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-warning">M</a>
                                <a href="show_ville.php?id=<?php echo $p['id']; ?>" class="btn btn-sm btn-info ">C</a>
                        </th>

    </div>
    </tr>
<?php } ?>
</tbody>
</table>
</div>




</body>

</html>