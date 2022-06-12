<?php  

    include('../config/konstante.php');

    session_destroy();

    header('location:'.SITEURL.'admin-panel/login-stranica.php');


?>