<?php
    require("./includes/functions.php") ;
    redirect_login();
    if ( !isset($_SESSION['ide'] ) )
    {
        header("location: forgetten_password.php?nvc");
        exit ;
    }
    if ( isset($_POST['env'] ) )
    {
        $mpd1 = $_POST ['mdp1'];
        $mpd2 = $_POST ['mdp2'];
        $ide = $_SESSION['ide'];
        if ( $mpd1 == $mpd2 )
        {
            $query = "update etudiants set password ='".password_hash($mpd1,PASSWORD_BCRYPT)."' where ide = $ide";
            if ( $result = mysqli_query ($connected,$query) )
            {
                $query = "update etudiants set code = '-1' where ide = $ide ";
                mysqli_query ($connected,$query);
                header("location: index.php?pcs");
                exit ;
            }
        }
        else
        {
            header("location: new-pass.php?pdm");
            exit ;
        }
    }
?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- our meta tags -->
        <meta name="keyword" content="Reclamation 'ENSA de Tanger' ENSAT">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- our css -->
        <link rel="stylesheet" href="style.css">
        <title>new pass</title>
    </head>
    <body class="body1">
        <div style="display: none;" id="pdm" class="alert alert-danger alert-dismissible fade show text-center">
            <strong>Error!</strong> passwords dont match!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="container MW4 bg-white pb-5">
            <div class="row">
                <div class="col-sm-12 border-right">
                    <h2 class="text-center py-3 text-danger">nouveau mot de passe</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="mdp1" placeholder="nouveau mot de passe" pattern=".{8,}" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="mdp2" placeholder="confirmer le nouveau mot de passe" pattern=".{8,}" required>
                        </div>
                        <div class="form-check text-right">
                            <a href="change-pass.php" class="btn btn-primary">retourner</a>
                            <button type="submit" name="env" class="btn btn-primary">envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <!--jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="index.js" ></script>
</html>