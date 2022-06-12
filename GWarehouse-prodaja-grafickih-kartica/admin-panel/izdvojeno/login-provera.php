<?php  
    if(!isset($_SESSION['korisnik']))
    {
        $_SESSION['no-login-poruka'] ="<div class='greska-msg text-center'>Molimo Vas ulogujte se radi pristupa.</div>";
        header('location:'.SITEURL.'admin-panel/login-stranica.php');
    }


?>