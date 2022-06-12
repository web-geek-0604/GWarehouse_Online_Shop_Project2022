<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">DODAJ PROIZVOD</h1>

                <br><br>

                <?php  

                    ob_start();
                    if(isset($_SESSION['otpremi']))
                    {
                        echo $_SESSION['otpremi'];
                        unset($_SESSION['otpremi']);
                    }
                ?>


                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-admin">
                        <tr>
                            <td>Naziv:</td>
                            <td>
                                <input type ="text" name="naziv" placeholder="Naziv proizvoda">
                            </td>
                        </tr>

                        <tr>
                            <td>Cena:</td>
                            <td>
                                <input type="number" name="cena">
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
                                        $sql= "SELECT * FROM tabela_kategorije WHERE aktivno='Da'";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        if($count>0)
                                        {
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                $id = $row['id'];
                                                $naziv = $row['naziv'];
                                                ?>

                                                 <option value="<?php echo $id; ?>"><?php echo $naziv; ?></option>
                                                <?php
                                            }

                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Kategorija nije pronađena</option>
                                            <?php
                                        
                                        }
                                    
                                    ?>

                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Izdvojeno:</td>
                            <td>
                                <input type ="radio" name="izdvojeno" value="Da"> Da
                                <input type ="radio" name="izdvojeno" value="Ne"> Ne
                            </td>
                        </tr>
                        <tr>
                            <td>Aktivno:</td>
                            <td>
                                <input type ="radio" name="aktivno" value="Da"> Da
                                <input type ="radio" name="aktivno" value="Ne"> Ne
                            </td>
                        </tr>
                        <tr>
                        <td>Model:</td>
                            <td>
                                <input type ="text" name="model" placeholder="Model proizvoda">
                            </td>
                        </tr>
                        <tr>
                        <td>Proizvođač:</td>
                            <td>
                                <input type ="text" name="proizvodjac" placeholder="Proizvodjac">
                            </td>
                        </tr>
                        <tr>
                        <td>Grafički interfejs:</td>
                            <td>
                                <input type ="text" name="graficki_interfejs" placeholder="Grafički interfejs">
                            </td>
                        </tr>
                        <tr>
                        <td>Brzina grafičkog čipa:</td>
                            <td>
                                <input type ="text" name="brzina_grafickog_cipa" placeholder="Brzina grafičkog čipa">
                            </td>
                        </tr>
                        <tr>
                        <td>CUDA jezgra:</td>
                            <td>
                                <input type ="text" name="cuda_jezgra" placeholder="CUDA jezgra">
                            </td>
                        </tr>
                        <tr>
                        <td>DirectX:</td>
                            <td>
                                <input type ="text" name="directx" placeholder="DirectX verzija">
                            </td>
                        </tr>
                        <tr>
                        <td>OpenGL:</td>
                            <td>
                                <input type ="text" name="open_gl" placeholder="OpenGL verzija">
                            </td>
                        </tr>
                        <tr>
                        <td>Brzina memorije:</td>
                            <td>
                                <input type ="text" name="brzina_memorije" placeholder="Brzina memorije">
                            </td>
                        </tr>
                        <tr>
                        <td>Memorijska magistrala:</td>
                            <td>
                                <input type ="text" name="memorijska_magistrala" placeholder="Memorijska magistrala">
                            </td>
                        </tr>
                        <tr>
                        <td>Naponski konektori:</td>
                            <td>
                                <input type ="text" name="naponski_konektori" placeholder="Naponski konektori">
                            </td>
                        </tr>
                        <tr>
                        <td>Dimenzije:</td>
                            <td>
                                <input type ="text" name="dimenzije" placeholder="Dimenzije kartice">
                            </td>
                        </tr>
                        <tr>
                        <td>HDMI:</td>
                            <td>
                                <input type ="text" name="hdmi" placeholder="HDMI konektori">
                            </td>
                        </tr>
                        <tr>
                        <td>Display port:</td>
                            <td>
                                <input type ="text" name="display_port" placeholder="Display port konektori">
                            </td>
                        </tr>
                        <tr>
                        <td>Količina memorije:</td>
                            <td>
                                <input type ="text" name="kolicina_memorije" placeholder="Količina memorije">
                            </td>
                        </tr>
                        <tr>
                        <td>Tip memorije:</td>
                            <td>
                                <input type ="text" name="tip_memorije" placeholder="Tip memorije">
                            </td>
                        </tr>
                        <tr>
                        <td>Hlađenje:</td>
                            <td>
                                <input type ="text" name="hladjenje" placeholder="Hlađenje">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo1:</td>
                            <td>
                                <input type ="text" name="ostalo1" placeholder="Ostalo1">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo2:</td>
                            <td>
                                <input type ="text" name="ostalo2" placeholder="Ostalo2">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo3:</td>
                            <td>
                                <input type ="text" name="ostalo3" placeholder="Ostalo3">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo4:</td>
                            <td>
                                <input type ="text" name="ostalo4" placeholder="Ostalo4">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo5:</td>
                            <td>
                                <input type ="text" name="ostalo5" placeholder="Ostalo5">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo6:</td>
                            <td>
                                <input type ="text" name="ostalo6" placeholder="Ostalo6">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo7:</td>
                            <td>
                                <input type ="text" name="ostalo7" placeholder="Ostalo7">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo8:</td>
                            <td>
                                <input type ="text" name="ostalo8" placeholder="Ostalo8">
                            </td>
                        </tr>
                        <tr>
                        <td>Ostalo9:</td>
                            <td>
                                <input type ="text" name="ostalo9" placeholder="Ostalo9">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="potvrdi" value="Dodaj proizvod" class="btn5">
                            </td>            
                        </tr>
                        

                    </table>

                </form>

                <?php
                
                    if(isset($_POST['potvrdi']))
                    {
                        $naziv = $_POST['naziv'];
                        $cena = $_POST['cena'];
                        $kategorija = $_POST['kategorija'];
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

                        if(isset($_POST['izdvojeno']))
                        {
                            $izdvojeno = $_POST['izdvojeno'];
                        }
                        else
                        {
                            $izdvojeno = "Ne";
                        }

                        if(isset($_POST['aktivno']))
                        {
                            $aktivno = $_POST['aktivno'];
                        }
                        else
                        {
                            $aktivno = "Ne";
                        }

                        if(isset($_FILES['slika']['name']))
                        {
                            $naziv_slike = $_FILES['slika']['name'];

                            if($naziv_slike!="")
                            {
                                $tmp = explode('.', $naziv_slike);
                                $ext = end($tmp);

                                $naziv_slike = "kartice_proizvod_".rand(000, 999).'.'.$ext;

                                $izvorna_putanja = $_FILES['slika']['tmp_name'];
                                $destinacija = "../slike/proizvodi/".$naziv_slike;
    
                                $otpremi = move_uploaded_file($izvorna_putanja, $destinacija);

                                if($otpremi==false)
                                {
                                    $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije otpremljena. </div>";
                                    header('location:'.SITEURL.'admin-panel/dodaj-proizvod.php');
    
                                    die();
                            }

                        }
                        else
                        {
                            $naziv_slike = "";
                        }
 

                        $sql2 = "INSERT INTO tabela_proizvodi SET 
                            naziv = '$naziv',
                            cena = $cena,
                            naziv_slike = '$naziv_slike',
                            id_kategorije = $kategorija,
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
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==true)
                        {
                            $_SESSION['dodaj'] = "<div class='uspesno-msg'>Proizvod je uspešno dodat!</div>";
                            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
                        }
                        else
                        {
                            $_SESSION['dodaj'] = "<div class='uspesno-msg'>Proizvod nije dodat!</div>";
                            header('location:'.SITEURL.'admin-panel/admin-proizvodi.php');
                        }
                    }
                }


                ?>


            </div>
</div>               
<?php include('izdvojeno/footer.php'); ?>