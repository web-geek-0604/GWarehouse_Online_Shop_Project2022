<?php 

    include('../config/konstante.php');

    if(isset($_GET['id']) && isset($_GET['naziv_slike']))
    {
        $id = $_GET['id'];
        $naziv_slike = $_GET['naziv_slike'];


        if($naziv_slike != "")
        {
            $putanja = "../slike/proizvodi/".$naziv_slike;

            $ukloni = unlink($putanja);

            if($ukloni==false)
            {
                $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije obrisana! </div>";
                header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
                die();
            }
        }

        $sql = "DELETE FROM tabela_proizvodi WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['obrisi'] = "<div class='uspesno-msg'>Proizvod je uspešno obrisan! </div>";
            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
        }
        else
        {
            $_SESSION['obrisi'] = "<div class='greska-msg'>Proizvod nije obrisan! </div>";
            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
        }

    }
    else
    {
        $_SESSION['pristup'] = "<div class='greska-msg'>Neovlašćen pristup! </div>";
        header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
    }

?>