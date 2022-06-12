<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">UPRAVLJAJ KURIRSKIM SLUŽBAMA</h1>


            <?php  
                
            if(isset($_SESSION['dodaj']))
            {
                echo $_SESSION['dodaj'];
                unset($_SESSION['dodaj']);
            }

            if(isset($_SESSION['obrisi']))
            {
                echo $_SESSION['obrisi'];
                unset($_SESSION['obrisi']);
            }

            if(isset($_SESSION['ukloni']))
            {
                echo $_SESSION['ukloni'];
                unset($_SESSION['ukloni']);
            }

            if(isset($_SESSION['kategorija-nije-pronadjena']))
            {
                echo $_SESSION['kategorija-nije-pronadjena'];
                unset($_SESSION['kategorija-nije-pronadjena']);
            }

            if(isset($_SESSION['azuriraj']))
            {
                echo $_SESSION['azuriraj'];
                unset($_SESSION['azuriraj']);
            }

            if(isset($_SESSION['otpremi']))
            {
                echo $_SESSION['otpremi'];
                unset($_SESSION['otpremi']);
            }

            if(isset($_SESSION['remove-failed']))
            {
                echo $_SESSION['remove-failed'];
                unset($_SESSION['remove-failed']);
            }
            
            ?>
            <br><br>
                  <a href="<?php echo SITEURL; ?>admin-panel/dodaj-kurira.php" class="btn1">Dodaj Kurira</a>

            <br> <br>
<table class="tbl-cela">
   <tr>
       <th>Broj</th>
       <th>Naziv</th>
       <th>Slika</th>
       <th>Telefon</th>
       <th>E-mail</th>
       <th>Adresa</th>
       <th>Funkcije</th>
   </tr>

   <?php  
        $sql = "SELECT * FROM tabela_kurir";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        $broj=1;

        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $kurir_naziv = $row['kurir_naziv'];
                $naziv_slike = $row['naziv_slike'];
                $kurir_telefon = $row['kurir_telefon'];
                $kurir_email = $row['kurir_email'];
                $kurir_adresa = $row['kurir_adresa'];

                ?>
                    <tr>
                        <td><?php echo $broj++; ?>.</td>
                        <td><?php echo $kurir_naziv ?></td>

                        <td>

                            <?php  
                                if($naziv_slike!="")
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>slike/kurir/<?php echo $naziv_slike; ?>" width="100px">

                                    <?php

                                }
                                else
                                {
                                    echo "<div class='greska-msg'>Slika nije dodata. </div>";
                                }
                            ?>

                        </td>
                        <td><?php echo $kurir_telefon; ?></td>
                        <td><?php echo $kurir_email; ?></td>
                        <td><?php echo $kurir_adresa; ?></td>

                        <td>
                        <a href="<?php echo SITEURL; ?>admin-panel/azuriraj-kurira.php?id=<?php echo $id; ?>" class="btn2">Ažuriraj</a>
                        <a href="<?php echo SITEURL; ?>admin-panel/obrisi-kurira.php?id=<?php echo $id; ?>&naziv_slike=<?php echo $naziv_slike; ?>" class="btn3">Obriši</a>
                        </td>
                    </tr>

                <?php
            }
        }
        else
        {
            ?>

            <tr>
                <td colspan="6"><div class="greska-msg">Kurirska služba nije dodata.</div></td>

            </tr>

            <?php

        }
   
   ?>

</table>
                <div class="clearfix"></div>
            </div>
        </div>

<?php include('izdvojeno/footer.php'); ?>