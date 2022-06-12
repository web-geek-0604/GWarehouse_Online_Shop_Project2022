<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">AŽURIRAJ KURIRSKU SLUŽBU</h1>

                <br><br>


                <?php 
                
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tabela_kurir WHERE id=$id";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                            $row = mysqli_fetch_assoc($res);
                            $kurir_naziv = $row['kurir_naziv'];
                            $trenutna_slika = $row['naziv_slike'];
                            $kurir_telefon = $row['kurir_telefon'];
                            $kurir_email = $row['kurir_email'];
                            $kurir_adresa = $row['kurir_adresa'];

                        }
                        else
                        {
                            $_SESSION['kurir-nije-pronadjen'] = "<div class='greska-msg'>Kurirska služba nije pronađena.</div>";
                            header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                        }

                    }
                    else
                    {
                        header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                    }

                ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-admin">
                    <tr>
                        <td>Naziv:</td>
                        <td>
                            <input type ="text" name="naziv" value="<?php echo $kurir_naziv; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Trenutna slika:</td>
                        <td>
                            <?php   
                                if($trenutna_slika !="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>slike/kurir/<?php echo $trenutna_slika; ?>" width="150px">
                                    <?php

                                }
                                else
                                {
                                    echo "<div class='greska-msg'>Slika nije dodata.</div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Nova slika:</td>
                        <td>
                            <input type ="file" name="slika" >
                        </td>
                    </tr>
                    <tr>
                            <td>Telefon:</td>
                            <td>
                                <input type ="tel" name="telefon" placeholder="Telefon kurirske službe" value="<?php echo $kurir_telefon; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>
                                <input type ="email" name="email" placeholder="E-mail kurirske službe" value="<?php echo $kurir_email; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Adresa:</td>
                            <td>
                                <input type ="text" name="adresa" placeholder="Adresa kurirske službe" value="<?php echo $kurir_adresa; ?>">
                            </td>
                        </tr>
                        <tr>
                        <td colspan="2">
                            <input type="hidden" name="trenutna_slika" value ="<?php echo $trenutna_slika; ?>">
                            <input type="hidden" name="id" value ="<?php echo $id; ?>">
                            <input type="submit" name="potvrdi" value="Ažuriraj kurirsku službu" class="btn5">
                        </td>            
                    </tr>

                </table>
            </form>

            <?php 
            
                if(isset($_POST['potvrdi']))
                {
                    $id = $_POST['id'];
                    $kurir_naziv = $_POST['naziv'];
                    $trenutna_slika = $_POST['trenutna_slika'];
                    $kurir_telefon = $_POST['telefon'];
                    $kurir_email = $_POST['email'];
                    $kurir_adresa = $_POST['adresa'];

                    if(isset($_FILES['slika']['name']))
                    {
                        $naziv_slike =  $_FILES['slika']['name'];

                        if($naziv_slike != "")
                        {
                            
                            $ekstenzija = end(explode('.', $naziv_slike));

                            $naziv_slike = "kurir_slika-".rand(000, 999).'.'.$ekstenzija;


                            $izvorna_putanja = $_FILES['slika']['tmp_name'];
                            $destinacija = "../slike/kurir/".$naziv_slike;

                            $otpremi = move_uploaded_file($izvorna_putanja, $destinacija);

                            if($otpremi==false)
                            {
                                $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije otpremljena. </div>";
                                header('location:'.SITEURL.'admin-panel/admin-kurir.php');

                                die();
                            }
                            if($trenutna_slika!="")
                            {
                                $ukloni_putanja = "../slike/kurir/".$trenutna_slika;

                                $ukloni = unlink($ukloni_putanja);
    
                                if($ukloni==false)
                                {
                                    $_SESSION['nije-uklonjeno'] = "<div class='greska-msg'>Slika nije uklonjena. </div>";
                                    header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                                    die();
                                }
                            }

                        }
                        else
                        {
                            $naziv_slike = $trenutna_slika;
                        }

                    }
                    else
                    {
                        $naziv_slike = $trenutna_slika;
                    }
 

                    $sql2 = "UPDATE tabela_kurir SET
                            kurir_naziv='$kurir_naziv',
                            naziv_slike='$naziv_slike',
                            kurir_telefon='$kurir_telefon',
                            kurir_email='$kurir_email',
                            kurir_adresa='$kurir_adresa'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['azuriraj'] = "<div class='uspesno-msg'>Kurirska služba je uspešno ažurirana!</div>";
                        header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                    }
                    else
                    {
                        $_SESSION['azuriraj'] = "<div class='greska-msg'>Kurirska služba nije ažurirana!</div>";
                        header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                    }

                }
            ?>                   

            </div>
</div>


<?php include('izdvojeno/footer.php'); ?>