<?php
    require("./includes/functions.php") ;
    check_login();
    redirect_login();
    if( isset($_POST['new']) )
    {
        $ide = $_SESSION['ide'] ;
        $query = "update etudiants set password ='".password_hash($_POST['new_pass'],PASSWORD_BCRYPT)."' where ide = $ide";
        $result = mysqli_query ($connected,$query);
        if ( $result )
        {
            $_SESSION ['nom']= $row [ 'nom' ] ;
            $_SESSION ['prenom'] = $row [ 'prenom' ] ;
            header("location: index.php");
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
        <title>sign in</title>
    </head>
    <body class="body1">
        <div class="container MW7 bg-white pb-5">
            <div class ="row">
                <div class="col border-right">
                    <h2 class="text-center py-3 text-danger">Sign in</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group">
                            <label for="text">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="***@etu.uae.ac.ma" value="<?= $_SESSION['email'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Mot de passe:</label>
                            <input type="password" class="form-control" name="new_pass" placeholder="entrer votre nouveau mdp" required>
                        </div>
                        <div class="form-check text-right">
                            <button type="submit" name="new" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>