<?php
    require("./includes/functions.php") ;
    redirect_login();
    if ( isset ( $_POST [ 'submit' ] ) )
    {
        // get the data from mysql ( authentification )
        $query = "select * from etudiants where email = '".$_POST ['email']."'" ;
        // creating mysql query
        $result = mysqli_query ( $connected , $query ) ;
        // fetching result 
        $row = mysqli_fetch_array ( $result ) ;
        if ( $row && password_verify($_POST['password'], $row['password'] ) )
        {
            $_SESSION [ 'ide' ] = $row [ 'ide' ] ;
            $_SESSION ['nom']= $row [ 'nom' ] ;
            $_SESSION ['prenom'] = $row [ 'prenom' ] ;
            $_SESSION ['password'] = $row [ 'password' ] ;
            if ( $_SESSION['nom'] == 'N_ADE' )
            {
                header ( "location: Accueil_adm.php" ) ;
                exit ;
            }
            header ( "location: Accueil.php" ) ;
            exit ;
        }
        else
        {
            $query = "select * from etudiants where email = '".$_POST['email']."'";
            $result = mysqli_query ( $connected , $query ) ;
            $row = mysqli_fetch_array ( $result );
            $_SESSION [ 'ide' ] = $row [ 'ide' ] ;
            $_SESSION ['email'] = $_POST['email'];
            if ( $row && $row['password'] != NULL )
            {
                header("location: index.php?we&wp");
                exit ;
            }
            header ( "location: login.php" ) ;
            exit ;
        }
    }
?>
<!doctype html>
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
        <title>Reclamation</title>
    </head>
    <body class="body1">
        <div style="display: none;" id="we" class="alert alert-danger alert-dismissible fade show text-center">
            <strong>Error!</strong> A non-valid Email or Wrong Password 
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div style="display: none;" id="pcs" class="alert alert-success alert-dismissible fade show text-center">
            <strong>Congratulations!</strong> password changed successifly
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="container MW7 bg-white pb-5">
            <div class ="row">
                <div class="col-sm-5 border-right">
                    <h2 class="text-center py-3 text-danger">Sign Up</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group">
                            <label for="text">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="***@etu.uae.ac.ma" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Mot de passe:</label>
                            <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                        <div class="form-check text-right">
                            <button type="submit" name="submit" class="btn btn-primary">login</button>
                        </div>
                    </form>
                    <a href="forgetten_password.php">forget password ?</a>
                </div>
                <div class="col-sm-7">
                    <h2 class="text-center pt-3 pb-5">Platforme de reclamation</h2>
                    <p class="text-center">Cette platforme est dédié aux étudiants de l'ENSA de Tanger qui ont des problèmes scolaires <br>
                        pour benificier de ce service on vous invite à se connecter avec votre Email institutionnel</p>
                </div>
            </div>
        </div>
        <!--jQuery, Popper.js, and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="index.js" ></script>
    </body>
</html>