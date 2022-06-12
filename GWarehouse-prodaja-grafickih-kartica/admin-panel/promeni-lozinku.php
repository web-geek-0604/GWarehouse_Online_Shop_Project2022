<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">PROMENI LOZINKU</h1>
                <br> <br>


                <?php 
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                    }
                
                ?>

                <form action="" method="POST">

                    <table class="tbl-admin">
                        <tr>
                            <td>Trenutna lozinka:</td>
                            <td>
                                <input type="password" name="trenutna_lozinka" placeholder="Trenutna lozinka">
                            </td>
                        </tr>
                        <tr>
                            <td>Nova lozinka:</td>
                            <td>
                                <input type="password" name="nova_lozinka" placeholder="Nova lozinka">
                            </td>
                        </tr>
                        <tr>
                            <td>Potvrdi lozinku:</td>
                            <td>
                                <input type="password" name="potvrdi_lozinku" placeholder="Potvrdi lozinku">
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="promeni_lozinku" value="Promeni lozinku" class="btn5">
                            </td>
                        </tr>
                    </table>   
                </form>
            </div>
</div>  

<?php 

        if(isset($_POST['promeni_lozinku']))
        {
            $id=$_POST['id'];
            $trenutna_lozinka = md5($_POST['trenutna_lozinka']);
            $nova_lozinka = md5($_POST['nova_lozinka']);
            $potvrdi_lozinku = md5($_POST['potvrdi_lozinku']);

            $sql = "SELECT * FROM tabela_admin WHERE id=$id AND lozinka='$trenutna_lozinka'";

            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    if($nova_lozinka==$potvrdi_lozinku)
                    {
                        $sql2 = "UPDATE tabela_admin SET
                           lozinka='$nova_lozinka' 
                           WHERE id=$id 
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res==true)
                        {
                            $_SESSION['promeni-lozinku'] = "<div class='uspesno-msg'>Lozinka je uspešno promenjena. </div>";
                            header('location:'.SITEURL.'admin-panel/upravljaj.php');
                        }
                        else
                        {
                            $_SESSION['promeni-lozinku'] = "<div class='greska-msg'>Lozinka nije promenjena. </div>";
                            header('location:'.SITEURL.'admin-panel/upravljaj.php');      
                        }

                    }
                    else
                    {
                        $_SESSION['lozinke-nisu-iste'] = "<div class='greska-msg'>Lozinke se ne poklapaju. </div>";
                        header('location:'.SITEURL.'admin-panel/upravljaj.php');
                    }

                }
                else
                {
                    $_SESSION['korisnik-nije-pronadjen'] = "<div class='greska-msg'>Korisnik nije pronađen. </div>";
                    header('location:'.SITEURL.'admin-panel/upravljaj.php');
                }
            }

   

        }

?>
                    


<?php include('izdvojeno/footer.php'); ?>