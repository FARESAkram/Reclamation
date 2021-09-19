<?php
    $connected = mysqli_connect('localhost' , 'akram', 'FA8JUcXKW0SMfG3v' , 'reclamation') ;
    if ( !$connected )
    {
        echo 'Connection error ' . mysqli_connect_error();
        exit ;
    }
?>