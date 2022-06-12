<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">AŽURIRAJ ADMINISTRATORA</h1>

                <br><br>

                <?php 
                    $id=$_GET['id'];

                    $sql="SELECT * FROM tabela_admin WHERE id=$id";

                    $res=mysqli_query($conn, $sql);

                    if($res==true)
                    {
                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                            $row=mysqli_fetch_assoc($res);

                            $ime_i_prezime = $row['ime_i_prezime'];
                            $korisnicko_ime = $row['korisnicko_ime'];

                        }
                        else
                        {
                            header('location:'.SITEURL.'admin-panel/upravljaj.php');

                        }
                    }
                
                ?>

                <form action="" method="POST">
                    <table class="tbl-admin">
                        <tr>
                            <td>Ime i prezime:</td>
                            <td>
                                <input type="text" name="ime_i_prezime" value="<?php echo $ime_i_prezime; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Korisničko ime:</td>
                            <td>
                                <input type="text" name="korisnicko_ime" value="<?php echo $korisnicko_ime; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="azuriraj" value="Ažuriraj" class="btn2">
                            </td>
                        </tr>
                    
                        </tr>
                    </table>
                </form>
            </div>
</div>

<?php 


    if(isset($_POST['azuriraj']))
    {

        $id = $_POST['id'];
        $ime_i_prezime = $_POST['ime_i_prezime'];
        $korisnicko_ime = $_POST['korisnicko_ime'];

        $sql = "UPDATE tabela_admin SET
        ime_i_prezime = '$ime_i_prezime',
        korisnicko_ime = '$korisnicko_ime' 
        WHERE id='$id'
        "; 

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['azuriraj'] = "<div class='uspesno-msg'>Administrator je uspešno ažuriran.</div>";

            header('location:'.SITEURL.'admin-panel/upravljaj.php');
        }
        else
        {
            $_SESSION['azuriraj'] = "<div class='greska-msg'>Administrator nije ažuriran.</div>";

            header('location:'.SITEURL.'admin-panel/upravljaj.php');
        }
    }

?>

<?php include('izdvojeno/footer.php'); ?>


