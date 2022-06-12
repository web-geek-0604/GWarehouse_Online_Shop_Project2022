<?php include('../izdvojeno-front/menu.php'); ?>


    <?php  

        ob_start();

        if(isset($_GET['proizvod_id']))
        {
            $proizvod_id=$_GET['proizvod_id'];


            $sql = "SELECT * FROM tabela_proizvodi WHERE id=$proizvod_id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);

                $naziv = $row['naziv'];
                $cena = $row['cena'];
                $naziv_slike = $row['naziv_slike'];
            }
            else
            {
                header('location:'.SITEURL);
            }

        }
        else
        {
            header('location:'.SITEURL);
        }


    ?>


    <section class="pozadina-naruci">
        <div class="container-naruci">
            
            <h2 class="text-white">Popunite porudžbenicu radi kompletiranja <br>porudžbine</h2>

            <form action="" method="POST" class="order text-white">
                <fieldset>
                    <legend>Izabran proizvod</legend>

                    <div class="naruci-img">
                        <?php 
                    
                            if($naziv_slike=="")
                            {
                                echo "<div class='greska-msg'>Slika nije dostupna.</div>";
                            }
                            else
                            {
                                ?>

                                <img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" class="img-responsive1 img-curve">

                                <?php
                            }

                        ?>

                    </div>
    
                    <div class="item-desc text-white">
                        <h3><?php echo $naziv; ?></h3>
                        <input type="hidden" name="proizvod" value="<?php echo $naziv; ?>">
                        <p class="item-price"><?php echo number_format($cena,2,",","."); ?> RSD</p>
                        <input type="hidden" name="cena" value="<?php echo $cena; ?>">
                        <div class="order-label">Količina</div>
                        <input type="number" name="kolicina" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Podaci o dostavi</legend>
                    <div class="order-label">Ime i prezime:</div>
                    <input type="text" name="ime_i_prezime" class="input-responsive" required>

                    <div class="order-label">Broj telefona:</div>
                    <input type="tel" name="telefon" class="input-responsive" required>

                    <div class="order-label">E-mail:</div>
                    <input type="email" name="email" class="input-responsive" required>
                    
                    </select>
                    <div class="order-label">Izaberite kurira za dostavu:</div>
                    <div><select name="kurir" class="admin-margin admin-font">

                    <?php  
                        $sql2 = "SELECT * FROM tabela_kurir";

                        $res2 = mysqli_query($conn, $sql2);

                        $count2 = mysqli_num_rows($res2);

                        if($count2>0)
                        {
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                $id = $row2['id'];
                                $kurir_naziv = $row2['kurir_naziv'];
                                ?>

                                <option value="<?php echo $id; ?>"><?php echo $kurir_naziv; ?></option>
                                <?php
                            }

                        }
                        else
                        {
                            ?>
                            <option value="0">Kurir nije pronađen</option>
                            <?php
                        
                        }

                    ?>
                    </select>
                    </div>
                    <div class="order-label">Adresa za dostavu:</div>
                    <textarea name="adresa" rows="10" placeholder="Ulica, Mesto, Država" class="input-responsive" required></textarea>

                    <input type="submit" name="potvrdi" value="Potvrdi Porudžbinu" class="btn3 btn-primary">
                </fieldset>

            </form>

            <?php  
            
                if(isset($_POST['potvrdi']))
                {
                    $proizvod = $_POST['proizvod'];
                    $cena = $_POST['cena'];
                    $kolicina = $_POST['kolicina'];
                    $ukupno = $cena * $kolicina;

                    $datum_porudzbine = date("Y-m-d-G:i:s");

                    $status_porudzbine = "Naručeno";

                    $kupac_ime_prezime = $_POST['ime_i_prezime'];
                    $kupac_telefon = $_POST['telefon'];
                    $kupac_email = $_POST['email'];
                    $kurir = $_POST['kurir'];
                    $kupac_adresa = $_POST['adresa'];
                
                    $sql2 = "INSERT INTO tabela_poruci SET
                    
                        proizvod = '$proizvod',
                        cena = $cena,
                        kolicina = $kolicina,
                        ukupno = $ukupno,
                        datum_porudzbine = '$datum_porudzbine',
                        status_porudzbine = '$status_porudzbine',
                        kupac_ime_prezime = '$kupac_ime_prezime',
                        kupac_telefon = '$kupac_telefon',
                        kupac_email = '$kupac_email',
                        kupac_adresa = '$kupac_adresa',
                        kurir_id = $kurir
   
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['poruci'] = "<div class='uspesno-msg text-center'>Proizvod je uspešno naručen!<br>Izabrani administrator će Vas ubrzo kontaktirati.</div>";
                        header('location:'.SITEURL);
                        
                    }
                    else
                    {
                        $_SESSION['poruci'] = "<div class='greska-msg text-center'>Proizvod nije naručen.</div>";
                        header('location:'.SITEURL);

                    }


                }

            
            ?>


        </div>
    </section>

    <?php include('../izdvojeno-front/footer.php'); ?>