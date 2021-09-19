<?php
    require("./includes/functions.php") ;
    if ( !isset($_SESSION['ide'] ) )
    {
        header("location: forgetten_password.php?nvc");
        exit ;
    }
    $ide = $_SESSION['ide'];
    if ( isset($_POST['submit'] ) )
    {
        $code = $_POST ['verif'];
        if ( $code == '-1' )
        {
            echo "<h1 style='text-align: center'>PAGE NOT FOUND</h1>";
            exit;
        }
        $query = "select * from etudiants where code = '$code' ";
        $result = mysqli_query ($connected, $query);
        $row = mysqli_fetch_array ($result);
        if ($row)
        {
            $_SESSION['ide']= $row['ide'];
            header("location: new-pass.php");
            exit ;
        }
        else
        {
            header("location: change-pass.php?wvc");
            exit ;
        }
    }
    if ( isset($_GET['msg']) && $_GET['msg'] = 'rt' )
    {
        $query = "update etudiants set code = '-1' where ide = $ide ";
        mysqli_query ($connected,$query);
        unset($_GET['msg']);
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
        <title>change pass</title>
    </head>
    <body class="body1">
        <div style="display: none;" id="wvc" class="alert alert-danger alert-dismissible fade show text-center">
            <strong>Error!</strong> wrong verification code!
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="container MW4 bg-white pb-5">
            <div class="row">
                <div class="col-sm-7 border-right">
                    <h2 class="text-center py-3 text-danger">code de verification</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="verif" placeholder="code de verification" required>
                        </div>
                        <div class="form-check text-right">
                            <a href="forgetten_password.php?msg=rt" class="btn btn-primary">retourner</a>
                            <button type="submit" name="submit" class="btn btn-primary">envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-5">
                    <h2 class="text-center pt-3 pb-5"></h2>
                    <p class="text-center">vous trouver le code dans votre boite mail</p>
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