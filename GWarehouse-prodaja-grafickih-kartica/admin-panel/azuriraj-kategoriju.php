<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">AŽURIRAJ KATEGORIJU</h1>

                <br><br>


                <?php 
                
                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM tabela_kategorije WHERE id=$id";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                            $row = mysqli_fetch_assoc($res);
                            $naziv = $row['naziv'];
                            $trenutna_slika = $row['naziv_slike'];
                            $aktivno = $row['aktivno'];

                        }
                        else
                        {
                            $_SESSION['kategorija-nije-pronadjena'] = "<div class='greska-msg'>Kategorija nije pronađena.</div>";
                            header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
                        }

                    }
                    else
                    {
                        header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
                    }

                ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-admin">
                    <tr>
                        <td>Naziv:</td>
                        <td>
                            <input type ="text" name="naziv" value="<?php echo $naziv; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Trenutna slika:</td>
                        <td>
                            <?php   
                                if($trenutna_slika !="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>slike/kategorije/<?php echo $trenutna_slika; ?>" width="150px">
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
                        <td>Aktivno:</td>
                        <td>
                            <input <?php if($aktivno=="Da"){echo "checked";} ?> type ="radio" name="aktivno" value="Da"> Da
                            <input <?php if($aktivno=="Ne"){echo "checked";} ?> type ="radio" name="aktivno" value="Ne"> Ne
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="trenutna_slika" value ="<?php echo $trenutna_slika; ?>">
                            <input type="hidden" name="id" value ="<?php echo $id; ?>">
                            <input type="submit" name="potvrdi" value="Ažuriraj kategoriju" class="btn5">
                        </td>            
                    </tr>
    

                </table>
            </form>

            <?php 
            
                if(isset($_POST['potvrdi']))
                {
                    $id = $_POST['id'];
                    $naziv = $_POST['naziv'];
                    $trenutna_slika = $_POST['trenutna_slika'];
                    $aktivno = $_POST['aktivno'];

                    if(isset($_FILES['slika']['name']))
                    {
                        $naziv_slike =  $_FILES['slika']['name'];

                        if($naziv_slike != "")
                        {
                            
                            $ekstenzija = end(explode('.', $naziv_slike));

                            $naziv_slike = "kartice_kategorije_".rand(000, 999).'.'.$ekstenzija;


                            $izvorna_putanja = $_FILES['slika']['tmp_name'];
                            $destinacija = "../slike/kategorije/".$naziv_slike;

                            $otpremi = move_uploaded_file($izvorna_putanja, $destinacija);

                            if($otpremi==false)
                            {
                                $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije otpremljena. </div>";
                                header('location:'.SITEURL.'admin-panel/admin-kategorije.php');

                                die();
                            }
                            if($trenutna_slika!="")
                            {
                                $ukloni_putanja = "../slike/kategorije/".$trenutna_slika;

                                $ukloni = unlink($ukloni_putanja);
    
                                if($ukloni==false)
                                {
                                    $_SESSION['nije-uklonjeno'] = "<div class='greska-msg'>Slika nije uklonjena. </div>";
                                    header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
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
 

                    $sql2 = "UPDATE tabela_kategorije SET
                        naziv = '$naziv',
                        naziv_slike = '$naziv_slike',
                        aktivno = '$aktivno'
                        WHERE id=$id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['azuriraj'] = "<div class='uspesno-msg'>Kategorija je uspešno ažurirana!</div>";
                        header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
                    }
                    else
                    {
                        $_SESSION['azuriraj'] = "<div class='greska-msg'>Kategorija nije ažurirana!</div>";
                        header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
                    }

                }
            ?>                   

            </div>
</div>


<?php include('izdvojeno/footer.php'); ?>