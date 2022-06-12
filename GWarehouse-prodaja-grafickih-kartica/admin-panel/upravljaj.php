<?php include('izdvojeno/menu.php'); ?>

        <div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">UPRAVLJAJ ADMINISTRATORIMA</h1>

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

                    if(isset($_SESSION['azuriraj']))
                    {
                        echo $_SESSION['azuriraj'];
                        unset($_SESSION['azuriraj']);
                    }

                    if(isset($_SESSION['korisnik-nije-pronadjen']))
                    {
                        echo $_SESSION['korisnik-nije-pronadjen'];
                        unset($_SESSION['korisnik-nije-pronadjen']);
                    }
                    
                    if(isset($_SESSION['lozinke-nisu-iste']))
                    {
                        echo $_SESSION['lozinke-nisu-iste'];
                        unset($_SESSION['lozinke-nisu-iste']);
                    }

                    if(isset($_SESSION['promeni-lozinku']))
                    {
                        echo $_SESSION['promeni-lozinku'];
                        unset($_SESSION['promeni-lozinku']);
                    }
                
                
                ?>
                <br><br><br>

                <a href="dodaj-admina.php" class="btn1">Dodaj Administratora</a>

                 <br /> <br />
                <table class="tbl-cela">
                    <tr>
                        <th>Broj</th>
                        <th>Ime i prezime</th>
                        <th>Korisničko ime</th>
                        <th>Funkcije</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tabela_admin";
                        $res = mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            $broj=1;

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $ime_i_prezime=$rows['ime_i_prezime'];
                                    $korisnicko_ime=$rows['korisnicko_ime'];

                                    ?>
                                    <tr>
                                        <td><?php echo $broj++; ?></td>
                                        <td><?php echo $ime_i_prezime; ?></td>
                                        <td><?php echo $korisnicko_ime; ?></td>
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin-panel/promeni-lozinku.php?id=<?php echo $id; ?>" class="btn4">Promeni lozinku</a>
                                        <a href="<?php echo SITEURL; ?>admin-panel/azuriraj-admina.php?id=<?php echo $id; ?>" class="btn2">Ažuriraj</a>
                                        <a href="<?php echo SITEURL; ?>admin-panel/obrisi-admina.php?id=<?php echo $id; ?>" class="btn3">Obriši</a>
                                        </td>
                                     </tr>

                                    <?php


                                }

                            }
                            else
                            {

                            }

                        }
                    
                    ?>

                </table>

            </div>
        </div>

<?php include('izdvojeno/footer.php'); ?>
