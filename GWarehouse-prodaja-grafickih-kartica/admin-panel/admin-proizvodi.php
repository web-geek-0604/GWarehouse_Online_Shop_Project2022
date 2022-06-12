<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">UPRAVLJAJ PROIZVODIMA</h1>


                <a href="<?php echo SITEURL; ?>admin-panel/dodaj-proizvod.php" class="btn1">Dodaj Proizvod</a>

                <br /> <br />

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

                        if(isset($_SESSION['otpremi']))
                        {
                            echo $_SESSION['otpremi'];
                            unset($_SESSION['otpremi']);
                        }

                        
                        if(isset($_SESSION['pristup']))
                        {
                            echo $_SESSION['pristup'];
                            unset($_SESSION['pristup']);
                        }

                        if(isset($_SESSION['azuriraj']))
                        {
                            echo $_SESSION['azuriraj'];
                            unset($_SESSION['azuriraj']);
                        }

                ?>
                <table class="tbl-cela4 table4">
                <tr>
                    <th>Broj</th>
                    <th>Naziv</th>
                    <th>Cena</th>
                    <th>Slika</th>
                    <th>Izdvojeno</th>
                    <th>Aktivno</th>
                    <th style="display:none;">Model</th>
                    <th style="display:none;">Proizvođač</th>
                    <th style="display:none;">Grafički<br>interfejs</th>
                    <th style="display:none;">Brzina<br> grafičkog <br> čipa</th>
                    <th style="display:none;">CUDA<br> jezgra</th>
                    <th style="display:none;">DirectX</th>
                    <th style="display:none;">OpenGL</th>
                    <th style="display:none;">Brzina<br> memorije</th>
                    <th style="display:none;">Memorijska<br> magistrala</th>
                    <th style="display:none;">Naponski <br> konektori</th>
                    <th style="display:none;">Dimenzije</th>
                    <th style="display:none;">HDMI</th>
                    <th style="display:none;">Display<br> port</th>
                    <th style="display:none;">Količina <br> memorije</th>
                    <th style="display:none;">Tip <br> memorije</th>
                    <th style="display:none;">Hlađenje</th>
                    <th style="display:none;">Ostalo 1</th>
                    <th style="display:none;">Ostalo 2</th>
                    <th style="display:none;">Ostalo 3</th>
                    <th style="display:none;">Ostalo 4</th>
                    <th style="display:none;">Ostalo 5</th>
                    <th style="display:none;">Ostalo 6</th>
                    <th style="display:none;">Ostalo 7</th>
                    <th style="display:none;">Ostalo 8</th>
                    <th style="display:none;">Ostalo 9</th>
                    <th >Funkcije</th>
                </tr>

                <?php 
                
                        $sql = "SELECT * FROM tabela_proizvodi";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $broj=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $naziv = $row['naziv'];
                                $cena = $row['cena'];
                                $naziv_slike = $row['naziv_slike'];
                                $izdvojeno = $row['izdvojeno'];
                                $aktivno = $row['aktivno'];
                                $model = $row['model'];
                                $proizvodjac = $row['proizvodjac'];
                                $graficki_interfejs = $row['graficki_interfejs'];
                                $brzina_grafickog_cipa = $row['brzina_grafickog_cipa'];
                                $cuda_jezgra = $row['cuda_jezgra'];
                                $directx = $row['directx'];
                                $open_gl = $row['open_gl'];
                                $brzina_memorije = $row['brzina_memorije'];
                                $memorijska_magistrala = $row['memorijska_magistrala'];
                                $naponski_konektori = $row['naponski_konektori'];
                                $dimenzije = $row['dimenzije'];
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
                                ?>

                                <tr>
                                    <td><?php echo $broj++; ?></td>
                                    <td><?php echo $naziv; ?></td>
                                    <td><?php echo number_format($cena,2,",","."); ?> RSD</td>
                                    <td>
                                        <?php
                                            if($naziv_slike=="")
                                            {
                                                echo "<div class='greska-msg'>Slika nije dodata. </div>";

                                            }else
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" width="100px">
                                                <?php

                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $izdvojeno; ?></td>
                                    <td><?php echo $aktivno; ?></td>
                                    <td>
                                    <div class="tooltip">Detaljnije<span class="tooltiptext">
                                    Model: <?php echo $model; ?><br>
                                    Proizvođač: <?php echo $proizvodjac; ?> <br>
                                    Grafički interfejs: <?php echo $graficki_interfejs; ?><br>
                                    Brzina grafičkog čipa: <?php echo $brzina_grafickog_cipa; ?><br>
                                    Jezgra: <?php echo $cuda_jezgra; ?><br>
                                    DirectX: <?php echo $directx; ?><br>
                                    OpenGL: <?php echo $open_gl; ?><br>
                                    Brzina memorije: <?php echo $brzina_memorije; ?><br>
                                    Memorijska magistrala: <?php echo $memorijska_magistrala; ?><br>
                                    Naponski konektori: <?php echo $naponski_konektori; ?><br>
                                    Dimenzije: <?php echo $dimenzije; ?><br>
                                    HDMI: <?php echo $hdmi; ?><br>
                                    Display Port: <?php echo $display_port; ?><br>
                                    Količina memorije: <?php echo $kolicina_memorije; ?><br>
                                    Tip memorije: <?php echo $tip_memorije; ?><br>
                                    Hlađenje: <?php echo $hladjenje; ?><br>
                                    Ostalo 1: <?php echo $ostalo1; ?><br>
                                    Ostalo 2: <?php echo $ostalo2; ?><br>
                                    Ostalo 3: <?php echo $ostalo3; ?><br>
                                    Ostalo 4: <?php echo $ostalo4; ?><br>
                                    Ostalo 5: <?php echo $ostalo5; ?><br>
                                    Ostalo 6: <?php echo $ostalo6; ?><br>
                                    Ostalo 7: <?php echo $ostalo7; ?><br>
                                    Ostalo 8: <?php echo $ostalo8; ?><br>
                                    Ostalo 9: <?php echo $ostalo9; ?></span></div>   
                                    <a href="<?php echo SITEURL; ?>admin-panel/azuriraj-proizvod.php?id=<?php echo $id; ?>" class="btn2">Ažuriraj</a>
                                    <a href="<?php echo SITEURL; ?>admin-panel/obrisi-proizvod.php?id=<?php echo $id; ?>&naziv_slike=<?php echo $naziv_slike; ?>" class="btn3">Obriši</a>
                                </td>
                                </tr>


                                <?php

                            }

                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='greska-msg'> Proizvod ne postoji.</td></tr>";
                        }
                ?>

                </table>
                <div class="clearfix"></div>
            </div>
        </div>

<?php include('izdvojeno/footer.php'); ?>