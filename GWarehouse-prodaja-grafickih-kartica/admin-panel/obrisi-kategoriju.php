<?php 

    include('../config/konstante.php');
    
    if(isset($_GET['id']) AND isset($_GET['naziv_slike']))
    {
        $id = $_GET['id'];
        $naziv_slike = $_GET['naziv_slike'];

        if($naziv_slike !="")
        {
            $putanja = "../slike/kategorije/".$naziv_slike;

            $obrisi = unlink($putanja);

            if($obrisi==false)
            {
                $_SESSION['obrisi'] = "<div class='greska-msg'>Slika kategorije nije obrisana. </div>";

                header('location: '.SITEURL.'admin-panel/admin-kategorije.php');

                die();
            }

        }

        $sql = "DELETE FROM tabela_kategorije WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['ukloni'] = "<div class='uspesno-msg'>Uspešno uklonjeno.</div>";
            header('location: '.SITEURL.'admin-panel/admin-kategorije.php');
        }
        else
        {
            $_SESSION['ukloni'] = "<div class='greska-msg'>Kategorija nije uklonjena.</div>";
            header('location: '.SITEURL.'admin-panel/admin-kategorije.php');
        }

    }
    else
    {
        header('location: '.SITEURL.'admin-panel/admin-kategorije.php');

    }

?>