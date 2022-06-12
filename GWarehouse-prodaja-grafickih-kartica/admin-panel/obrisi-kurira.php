<?php 

    include('../config/konstante.php');
    
    if(isset($_GET['id']) AND isset($_GET['naziv_slike']))
    {
        $id = $_GET['id'];
        $naziv_slike = $_GET['naziv_slike'];

        if($naziv_slike !="")
        {
            $putanja = "../slike/kurir/".$naziv_slike;

            $obrisi = unlink($putanja);

            if($obrisi==false)
            {
                $_SESSION['obrisi'] = "<div class='greska-msg'>Slika kurira nije obrisana. </div>";

                header('location: '.SITEURL.'admin-panel/admin-kurir.php');

                die();
            }

        }

        $sql = "DELETE FROM tabela_kurir WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['ukloni'] = "<div class='uspesno-msg'>Uspešno uklonjeno.</div>";
            header('location: '.SITEURL.'admin-panel/admin-kurir.php');
        }
        else
        {
            $_SESSION['ukloni'] = "<div class='greska-msg'>Kurirska služba nije uklonjena.</div>";
            header('location: '.SITEURL.'admin-panel/admin-kurir.php');
        }

    }
    else
    {
        header('location: '.SITEURL.'admin-panel/admin-kurir.php');

    }

?>