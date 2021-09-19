<?php
    require("./includes/functions.php") ;
    check_login();
    session_destroy();
    header ( "location: http://localhost/MYPROJECTS/Reclamation/index.php" ) ;
    exit ;
?>