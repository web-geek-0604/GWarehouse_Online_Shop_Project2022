<?php include('izdvojeno/menu.php'); ?>


<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">DODAJ ADMINISTRATORA</h1>
                <br> <br>

                <?php
                    if(isset($_SESSION['dodaj']))
                    {
                        echo $_SESSION['dodaj'];
                        unset($_SESSION['dodaj']);
                    }


                ?>

                <form action="" method="POST">


                    <table class="tbl-admin">
                        <tr>
                            <td>Ime i prezime:</td>
                            <td>
                                <input type="text" name="ime_i_prezime" placeholder="Unesite Vaše ime i prezime">
                            </td>
                        </tr>
                        <tr>
                            <td>Korisničko ime:</td>
                            <td>
                                <input type="text" name="korisnicko_ime" placeholder="Unesite korisničko ime">
                            </td>
                        </tr>
                        <tr>
                            <td>Lozinka:</td>
                            <td>
                                <input type="password" name="lozinka" placeholder="Unesite lozinku">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Potvrdi" class="btn2">
                            </td>
                        </tr>
                    </table>               




                </form>
            </div>
</div>

<?php include('izdvojeno/footer.php'); ?>

<?php 
    if(isset($_POST['submit']))
    {

        $ime_i_prezime = $_POST['ime_i_prezime'];
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = md5($_POST['lozinka']);



        $sql = "INSERT INTO tabela_admin SET
            ime_i_prezime='$ime_i_prezime',
            korisnicko_ime='$korisnicko_ime',
            lozinka='$lozinka'
        ";


       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       if($res==TRUE)
       {
 
           $_SESSION ['dodaj'] = "<div class='uspesno-msg'>Administrator je uspešno dodat!</div>";
           
           header("location:".SITEURL.'admin-panel/upravljaj.php');
       }
       else
       {
            $_SESSION ['dodaj'] = "<div class='greska-msg'>Neuspešno dodat administrator!</div>";

            header("location:".SITEURL.'admin-panel/dodaj-admina.php');
       }


    }
    
?>