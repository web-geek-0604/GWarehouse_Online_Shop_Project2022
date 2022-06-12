<?php  
    include('../config/konstante.php');

   echo $id = $_GET['id'];

   $sql = "DELETE FROM tabela_admin WHERE id=$id";

   $res = mysqli_query($conn, $sql);

   if($res==true)
   {
       $_SESSION['obrisi'] = "<div class='uspesno-msg'>Administrator je uspešno obrisan.</div>";
       header('location: '.SITEURL.'admin-panel/upravljaj.php');

   }
   else
   {
       $_SESSION['obrisi'] = "<div class='greska-msg'>Administrator nije obrisan. Pokušajte ponovo kasnije.</div>";
       header('location: '.SITEURL.'admin-panel/upravljaj.php');
   }

?>