<?php include('izdvojeno/menu.php'); ?>


<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">AŽURIRAJ PORUDŽBINU</h1>

                <br><br>


                <?php  

                    ob_start();
                
                   if(isset($_GET['id']))
                   {
                       $id=$_GET['id'];


                       $sql = "SELECT * FROM tabela_poruci WHERE id=$id";

                       $res = mysqli_query($conn, $sql);

                       $count = mysqli_num_rows($res);

                       if($count==1)
                       {
                           $row=mysqli_fetch_assoc($res);

                           $proizvod = $row['proizvod'];
                           $cena = $row['cena'];
                           $kolicina = $row['kolicina'];
                           $status_porudzbine = $row['status_porudzbine'];
                           $kupac_ime_prezime = $row['kupac_ime_prezime'];
                           $kupac_telefon = $row['kupac_telefon'];
                           $kupac_email = $row['kupac_email'];
                           $kupac_adresa = $row['kupac_adresa'];



                       }
                       else
                       {
                            header('location:'.SITEURL.'admin-panel/admin-porudzbine.php');
                       }

                   }
                   else
                   {
                       header('location:'.SITEURL.'admin-panel/admin-porudzbine.php');
                   }
                ?>

                <form action="" method="POST">

                    <table class="tbl-admin table2">
                        <tr>
                            <td>Naziv proizvoda:</td>
                            <td><b><?php echo $proizvod; ?></b></td>
                        </tr>
                        <tr>
                            <td>Cena proizvoda:</td>
                            <td>
                                <b><?php echo $cena; ?> RSD</b>
                            </td>
                        </tr>
                        <tr>
                            <td>Količina:</td>
                            <td>
                                <input type="number" name="kolicina" class="admin-font" value="<?php echo $kolicina; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Status porudžbine:</td>
                            <td>
                                <select name="status_porudzbine" class="admin-font">
                                    <option <?php if($status_porudzbine=="Naručeno"){echo "selected";}  ?> value="Naručeno">Naručeno</option>
                                    <option <?php if($status_porudzbine=="Na dostavi"){echo "selected";}  ?> value="Na dostavi">Na dostavi</option>
                                    <option <?php if($status_porudzbine=="Dostavljeno"){echo "selected";}  ?> value="Dostavljeno">Dostavljeno</option>
                                    <option <?php if($status_porudzbine=="Otkazano"){echo "selected";}  ?> value="Otkazano">Otkazano</option>
                            </td>
                        </tr>

                        <tr>
                            <td>Ime i prezime kupca:</td>
                            <td>
                                <input type ="text" size="20" name="kupac_ime_prezime" class="admin-font" value="<?php echo $kupac_ime_prezime; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Telefon kupca:</td>
                            <td>
                                <input type ="tel" name="kupac_telefon" class="admin-font" value="<?php echo $kupac_telefon; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail kupca:</td>
                            <td>
                                <input type ="email" name="kupac_email" class="admin-font" value="<?php echo $kupac_email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Adresa kupca:</td>
                            <td>
                                <textarea name="kupac_adresa" cols="30" rows="5"><?php echo $kupac_adresa; ?></textarea>
                            </td>
                        </tr>
                        <tr>

                        <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="cena" value="<?php echo $cena; ?>">
                            <input type="submit" name="potvrdi" value="Ažuriraj porudžbinu" class="btn6">
                        </td>            
                    </tr>



                    </table>


                </form>

                <?php   
                
                   if(isset($_POST['potvrdi']))
                   {
                       $id = $_POST['id'];
                       $cena = $_POST['cena'];
                       $kolicina = $_POST['kolicina'];
                       $ukupno = $cena * $kolicina;
                       $status_porudzbine = $_POST['status_porudzbine'];
                       $kupac_ime_prezime = $_POST['kupac_ime_prezime'];
                       $kupac_telefon = $_POST['kupac_telefon'];
                       $kupac_email = $_POST['kupac_email'];
                       $kupac_adresa = $_POST['kupac_adresa'];

                       $sql2 = "UPDATE tabela_poruci SET
                       
                       kolicina = $kolicina,
                       ukupno = $ukupno,
                       status_porudzbine = '$status_porudzbine',
                       kupac_ime_prezime = '$kupac_ime_prezime',
                       kupac_telefon = '$kupac_telefon',
                       kupac_email = '$kupac_email',
                       kupac_adresa = '$kupac_adresa'
                       WHERE id=$id
                       ";

                       $res2 = mysqli_query($conn, $sql2);

                       if($res2==true)
                       {
                           $_SESSION['azuriraj'] = "<div class='uspesno-msg'>Porudžbina je uspešno ažurirana!</div>";
                           header('location:'.SITEURL.'admin-panel/admin-porudzbine.php');

                       }
                       else
                       {
                        $_SESSION['azuriraj'] = "<div class='greska-msg'>Porudžbina nije ažurirana!</div>";
                        header('location:'.SITEURL.'admin-panel/admin-porudzbine.php');

                       }




                   }
                
                ?>

            </div>
</div>









<?php include('izdvojeno/footer.php'); ?>