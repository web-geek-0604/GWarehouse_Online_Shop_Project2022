<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil1">
                <h1 class="text-size">UPRAVLJAJ PORUDŽBINAMA</h1>



    <?php
            if(isset($_SESSION['azuriraj']))
                {
                    echo $_SESSION['azuriraj'];
                    unset($_SESSION['azuriraj']);
                }

    ?>
    <br><br>
<table class="tbl-cela1 table1">
   <tr>
       <th>Broj</th>
       <th>Proizvod</th>
       <th>Cena</th>
       <th>Količina</th>
       <th>Ukupno</th>
       <th>Datum porudžbine</th>
       <th>Status porudžbine</th>
       <th>Ime i prezime kupca</th>
       <th>Telefon kupca</th>
       <th>E-mail kupca</th>
       <th>Adresa kupca</th>
       <th>ID kurira</th>
       <th>Funkcije</th>
   </tr>


        <?php 
        
            $sql= "SELECT * FROM tabela_poruci";  
            
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $broj = 1;

            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $proizvod = $row['proizvod'];
                    $cena = $row['cena'];
                    $kolicina = $row['kolicina'];
                    $ukupno = $row['ukupno'];
                    $datum_porudzbine = $row['datum_porudzbine'];
                    $status_porudzbine = $row['status_porudzbine'];
                    $kupac_ime_prezime = $row['kupac_ime_prezime'];
                    $kupac_telefon = $row['kupac_telefon'];
                    $kupac_email = $row['kupac_email'];
                    $kupac_adresa = $row['kupac_adresa'];
                    $kurir_id = $row['kurir_id'];

                    ?>

                        <tr>
                            <td><?php echo $broj++; ?></td>
                            <td><?php echo $proizvod; ?></td>
                            <td><?php echo $cena; ?> </td>
                            <td><?php echo $kolicina; ?></td>
                            <td><?php echo $ukupno; ?></td>
                            <td><?php echo $datum_porudzbine; ?></td>

                            <td>
                                <?php   
                                    if($status_porudzbine=="Naručeno")
                                    {
                                        echo "<label>$status_porudzbine</label>";
                                    }
                                    elseif($status_porudzbine=="Na dostavi")
                                    {
                                        echo "<label style='color: orange;'>$status_porudzbine</label>";
                                    }
                                    elseif($status_porudzbine=="Dostavljeno")
                                    {
                                        echo "<label style='color: green;'>$status_porudzbine</label>";
                                    }
                                    elseif($status_porudzbine=="Otkazano")
                                    {
                                        echo "<label style='color: red;'>$status_porudzbine</label>";
                                    }
                                ?>
                            </td>

                            <td><?php echo $kupac_ime_prezime; ?></td>
                            <td><?php echo $kupac_telefon; ?></td>
                            <td><?php echo $kupac_email; ?></td>
                            <td><?php echo $kupac_adresa; ?></td> 
                            <td><?php echo $kurir_id; ?></td>
                            <td>
                            <a href="<?php echo SITEURL; ?>admin-panel/azuriraj-porudzbinu.php?id=<?php echo $id; ?>" class="btn2">Ažuriraj</a>
                            </td>
                        </tr>

                    <?php
                }
            }
            else
            {
                echo "<div class='greska-msg'>Porudžbina nije dostupna.</div>";
            }
            
        ?>
</table>
            </div>
        </div>
        <div class="white-bcg">
        </div>

<?php include('izdvojeno/footer.php'); ?>