
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
        <div class="container">
        <div class="alert alert-info">Authentification</div>
        

        <div class="row">
            <div class="col-md-6 mx-auto shadow p-2">
            <?php 
        if(isset($_GET['cn']) && $_GET['cn'] == 'no'){
        ?>
       <div class="alert alert-danger">Login ou mot de passe incorrecte</div>

        <?php }?>
            <form action="verify.php" method="post">
            <div class="form-group">
            <label for="l" class="control-label">Login</label>
            <input type="text" name="login" autocomplete="off" class="form-control" id="l">
            </div> 
            <div class="form-group">
            <label for="p" class="control-label">Mot de passe</label>
            <input type="password" name="passe" class="form-control" id="p">
            </div> 
            <button class="btn btn-primary">Connexion</button>
            </form>
            </div>
        </div>
        
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>