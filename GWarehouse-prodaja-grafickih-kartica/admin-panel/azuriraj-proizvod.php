<?php  include('izdvojeno/menu.php'); ?>


<?php  
    ob_start();

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tabela_proizvodi WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
        $row = mysqli_fetch_assoc($res);
        $naziv = $row['naziv'];
        $cena = $row['cena'];
        $trenutna_slika = $row['naziv_slike'];
        $trenutna_kategorija = $row['id_kategorije'];
        $izdvojeno = $row['izdvojeno'];
        $aktivno = $row['aktivno'];
        $model = $row['model'];
        $proizvodjac = $row['proizvodjac'];
        $graficki_interfejs = $row['graficki_interfejs'];
        $brzina_grafickog_cipa = $row['brzina_grafickog_cipa'];
        $cuda_jezgra = $row['cuda_jezgra'];
        $directx = $row['directx'];
        $open_gl = $row['open_gl'];
        $brzina_memorije =  $row['brzina_memorije'];
        $memorijska_magistrala = $row['memorijska_magistrala'];
        $naponski_konektori = $row['naponski_konektori'];
        $dimenzije =$row['dimenzije'];
        $hdmi = $row['hdmi'];
        $display_port = $row['display_port'];
        $kolicina_memorije = $row['kolicina_memorije'];
        $tip_memorije = $row['tip_memorije'];
        $hladjenje = $row['hladjenje'];
        $ostalo1 = $row['ostalo1'];
        $ostalo2 = $row['ostalo2'];
        $ostalo3 = $row['ostalo3'];
        $ostalo4 = $row['ostalo4'];
        $ostalo5 = $row['ostalo5'];
        $ostalo6 = $row['ostalo6'];
        $ostalo7 = $row['ostalo7'];
        $ostalo8 = $row['ostalo8'];
        $ostalo9 = $row['ostalo9'];  

    }
}
    else
    {
        header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
    }
?>



<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">AŽURIRAJ PROIZVOD</h1>

                <br><br>

                <form action="" method="POST" enctype="multipart/form-data">
            
                <table class="tbl-admin">

                    <tr>
                        <td>Naziv:</td>
                        <td>
                            <input type="text" name="naziv" value="<?php echo $naziv; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Cena:</td>
                        <td>
                            <input type="number" name="cena" value="<?php echo $cena; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Trenutna slika:</td>
                        <td>
                            <?php  
                                if($trenutna_slika =="")
                                {
                                    echo "<div class='greska-msg'>Slika nije dostupna.</div>";

                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $trenutna_slika; ?>" width="150px">
                                    <?php

                                }
                            
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Izaberite novu sliku:</td>
                        <td>
                            <input type="file" name="slika">
                        </td>
                    </tr>
                    <tr>
                        <td>Kategorija:</td>
                        <td>
                            <select name="kategorija">


                                <?php 
                                    $sql = "SELECT * FROM tabela_kategorije WHERE aktivno='Da'";

                                    $res = mysqli_query($conn, $sql);

                                    $count = mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $kategorija_naziv = $row['naziv'];
                                            $kategorija_id = $row['id'];


                                            ?>
                                            <option <?php if($trenutna_kategorija==$kategorija_id){echo"selected";} ?> value="<?php echo $kategorija_id; ?>"><?php echo $kategorija_naziv; ?></option>
                                            <?php
                                        
                                        }

                                    }
                                    else
                                    {
                                        echo "<option value='0'>Kategorija nije dostupna. </option>";
                                    }
                                
                                ?>


                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Izdvojeno:</td>
                        <td>
                            <input <?php if($izdvojeno=="Da"){echo "checked";} ?> type="radio" name="izdvojeno" value="Da"> Da
                            <input <?php if($izdvojeno=="Ne"){echo "checked";} ?> type="radio" name="izdvojeno" value="Ne"> Ne
                        </td>
                    </tr>
                    <tr>
                        <td>Aktivno:</td>
                        <td>
                            <input <?php if($aktivno=="Da"){echo "checked";} ?> type="radio" name="aktivno" value="Da"> Da
                            <input <?php if($aktivno=="Ne"){echo "checked";} ?> type="radio" name="aktivno" value="Ne"> Ne
                        </td>
                    </tr>
                    <tr>
                        <td>Model:</td>
                        <td>
                            <input type="text" name="model" value="<?php echo $model; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Proizvođač:</td>
                        <td>
                            <input type="text" name="proizvodjac" value="<?php echo $proizvodjac; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Grafički interfejs:</td>
                        <td>
                            <input type="text" name="graficki_interfejs" value="<?php echo $graficki_interfejs; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Brzina grafičkog čipa:</td>
                        <td>
                            <input type="text" name="brzina_grafickog_cipa" value="<?php echo $brzina_grafickog_cipa; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Jezgra:</td>
                        <td>
                            <input type="text" name="cuda_jezgra" value="<?php echo $cuda_jezgra; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>DirectX:</td>
                        <td>
                            <input type="text" name="directx" value="<?php echo $directx; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>OpenGL:</td>
                        <td>
                            <input type="text" name="open_gl" value="<?php echo $open_gl; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Brzina memorije:</td>
                        <td>
                            <input type="text" name="brzina_memorije" value="<?php echo $brzina_memorije; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Memorijska magistrala:</td>
                        <td>
                            <input type="text" name="memorijska_magistrala" value="<?php echo $memorijska_magistrala; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Naponski konektori:</td>
                        <td>
                            <input type="text" name="naponski_konektori" value="<?php echo $naponski_konektori; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Dimenzije:</td>
                        <td>
                            <input type="text" name="dimenzije" value="<?php echo $dimenzije; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>HDMI:</td>
                        <td>
                            <input type="text" name="hdmi" value="<?php echo $hdmi; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Display port:</td>
                        <td>
                            <input type="text" name="display_port" value="<?php echo $display_port; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Količina memorije:</td>
                        <td>
                            <input type="text" name="kolicina_memorije" value="<?php echo $kolicina_memorije; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tip memorije:</td>
                        <td>
                            <input type="text" name="tip_memorije" value="<?php echo $tip_memorije; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Hlađenje:</td>
                        <td>
                            <input type="text" name="hladjenje" value="<?php echo $hladjenje; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo1:</td>
                        <td>
                            <input type="text" name="ostalo1" value="<?php echo $ostalo1; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo2:</td>
                        <td>
                            <input type="text" name="ostalo2" value="<?php echo $ostalo2; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo3:</td>
                        <td>
                            <input type="text" name="ostalo3" value="<?php echo $ostalo3; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo4:</td>
                        <td>
                            <input type="text" name="ostalo4" value="<?php echo $ostalo4; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo5:</td>
                        <td>
                            <input type="text" name="ostalo5" value="<?php echo $ostalo5; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo6:</td>
                        <td>
                            <input type="text" name="ostalo6" value="<?php echo $ostalo6; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo7:</td>
                        <td>
                            <input type="text" name="ostalo7" value="<?php echo $ostalo7; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo8:</td>
                        <td>
                            <input type="text" name="ostalo8" value="<?php echo $ostalo8; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Ostalo9:</td>
                        <td>
                            <input type="text" name="ostalo9" value="<?php echo $ostalo9; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="trenutna_slika" value="<?php echo $trenutna_slika; ?>">

                            <input type="submit" name="potvrdi" value="Ažuriraj proizvod" class="btn5">
                        </td>
                    </tr>


                </table>
            
                </form>
                
                <?php  
                
                    if(isset($_POST['potvrdi']))
                    {
                        $id = $_POST['id'];
                        $naziv = $_POST['naziv'];
                        $cena = $_POST['cena'];
                        $trenutna_slika = $_POST['trenutna_slika'];
                        $kategorija = $_POST['kategorija'];
                        $izdvojeno = $_POST['izdvojeno'];
                        $aktivno = $_POST['aktivno'];
                        $model = $_POST['model'];
                        $proizvodjac = $_POST['proizvodjac'];
                        $graficki_interfejs = $_POST['graficki_interfejs'];
                        $brzina_grafickog_cipa = $_POST['brzina_grafickog_cipa'];
                        $cuda_jezgra = $_POST['cuda_jezgra'];
                        $directx = $_POST['directx'];
                        $open_gl = $_POST['open_gl'];
                        $brzina_memorije = $_POST['brzina_memorije'];
                        $memorijska_magistrala = $_POST['memorijska_magistrala'];
                        $naponski_konektori = $_POST['naponski_konektori'];
                        $dimenzije = $_POST['dimenzije'];
                        $hdmi = $_POST['hdmi'];
                        $display_port = $_POST['display_port'];
                        $kolicina_memorije = $_POST['kolicina_memorije'];
                        $tip_memorije = $_POST['tip_memorije'];
                        $hladjenje = $_POST['hladjenje'];
                        $ostalo1 = $_POST['ostalo1'];
                        $ostalo2 = $_POST['ostalo2'];
                        $ostalo3 = $_POST['ostalo3'];
                        $ostalo4 = $_POST['ostalo4'];
                        $ostalo5 = $_POST['ostalo5'];
                        $ostalo6 = $_POST['ostalo6'];
                        $ostalo7 = $_POST['ostalo7'];
                        $ostalo8 = $_POST['ostalo8'];
                        $ostalo9 = $_POST['ostalo9'];  

                        if(isset($_FILES['slika']['name']))
                        {
                            $naziv_slike = $_FILES['slika']['name'];

                            if($naziv_slike!="")
                            {
                                $tmp = explode('.', $naziv_slike);
                                $ext = end($tmp);
                                

                                $naziv_slike = "kartica".rand(0000, 9999).'.'.$ext;

                                $src_path = $_FILES['slika']['tmp_name'];
                                $dest_path = "../slike/proizvodi/".$naziv_slike;

                                $otpremi = move_uploaded_file($src_path, $dest_path);

                                if($otpremi==false)
                                {
                                    $_SESSION['otpremi'] = "<div class='greska-msg'> Otpremanje nije uspelo. </div>";

                                    header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');

                                    die();
                                }

                                if($trenutna_slika!="")
                                {
                                    $remove_path = "../slike/proizvodi/".$trenutna_slika;

                                    $remove = unlink($remove_path);

                                    if($remove==false)
                                    {
                                        $_SESSION['remove-failed'] = "<div class='greska-msg'>Trenutna slika nije uklonjena. </div>";
                                        header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
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

                        $sql2 = "UPDATE tabela_proizvodi SET
                        naziv = '$naziv',
                        cena = $cena,
                        naziv_slike = '$naziv_slike',
                        id_kategorije = '$kategorija',
                        izdvojeno = '$izdvojeno',
                        aktivno = '$aktivno',
                        model = '$model',
                        proizvodjac = '$proizvodjac',
                        graficki_interfejs = '$graficki_interfejs',
                        brzina_grafickog_cipa = '$brzina_grafickog_cipa',
                        cuda_jezgra = '$cuda_jezgra',
                        directx = '$directx',
                        open_gl = '$open_gl',
                        brzina_memorije = '$brzina_memorije',
                        memorijska_magistrala = '$memorijska_magistrala',
                        naponski_konektori = '$naponski_konektori',
                        dimenzije = '$dimenzije',
                        hdmi = '$hdmi',
                        display_port = '$display_port',
                        kolicina_memorije = '$kolicina_memorije',
                        tip_memorije = '$tip_memorije',
                        hladjenje = '$hladjenje',
                        ostalo1 = '$ostalo1',
                        ostalo2 = '$ostalo2',
                        ostalo3 = '$ostalo3',
                        ostalo4 = '$ostalo4',
                        ostalo5 = '$ostalo5',
                        ostalo6 = '$ostalo6',
                        ostalo7 = '$ostalo7',
                        ostalo8 = '$ostalo8',
                        ostalo9 = '$ostalo9'
                        WHERE id=$id
                        ";

                        $res2= mysqli_query($conn, $sql2);

                        if($res2==true)
                        {
                            $_SESSION['azuriraj'] = "<div class='uspesno-msg'>Proizvod je uspešno ažuriran. </div>";
                            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');

                        }
                        else
                        {
                            $_SESSION['azuriraj'] = "<div class='greska-msg'>Proizvod nije ažuriran. </div>";
                            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');

                        }


                    }
                
                ?>


            </div>
</div>






<?php  include('izdvojeno/footer.php'); ?>