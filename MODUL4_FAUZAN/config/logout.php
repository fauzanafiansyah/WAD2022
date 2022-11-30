<?php
    session_starrt(); 
    session_unset();

    session_destroy();

    setcookie("id", "", time() - 3600);
    setcookie("key", "", time() - 3600);


    header("Location:../pages/Login-Fauzan.php");
    exit;

?>