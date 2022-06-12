<?php include('../izdvojeno-front/menu.php'); ?>


<section class="ponuda">
        <div class="container-ponuda">
            <h2 class="text-center text-velicina">U ponudi imamo sledeće modele</h2>


            <?php   
            
                $sql2 = "SELECT * FROM tabela_proizvodi WHERE aktivno='Da'";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $naziv = $row['naziv'];
                        $cena = $row['cena'];
                        $naziv_slike = $row['naziv_slike'];

                        ?>


                        <div class="ponuda-box1">
                            <div class="ponuda-img">
                                <?php 
                                    if($naziv_slike=="")
                                    {
                                        echo "<div class='greska-msg'>Slika nije dodata.</div>";

                                    }
                                    else
                                    {
                                        ?>
                                        <a href="<?php echo SITEURL; ?>/user-stranice/proizvod_stranica.php?proizvod_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" alt="gigabyte asus 6900 xt" class="img-responsive">
                                        <?php
                                    }
                                
                                ?>
                                
                            </div>
                        <div class="ponuda-opis">
                            <a href="<?php echo SITEURL; ?>/user-stranice/proizvod_stranica.php?proizvod_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?><?php echo $naziv; ?>" alt="<?php echo $naziv; ?>" class="img-responsive">
                            <p class="ponuda-cena"><?php echo number_format($cena,2,",","."); ?> RSD</p>
                            <br>
                            <a href="<?php echo SITEURL; ?>naruci.php?proizvod_id=<?php echo $id; ?>" class="btn btn-poruci">Naruči</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='greska-msg'>Proizvod nije dodat.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
        <div class="clearfix"></div>
    </div>
    </section>
    <section class="kategorije">
        <div class="container-gpu">
            <div class="box-3 float-container">
                <img src="../slike/proizvodi logo/AMD-Logo.png" alt="AMD" class="img-responsive img-curve">
            </div>
            <div class="box-4 float-container">
                <img src="../slike/proizvodi logo/Nvidia-Logo-PNG-High-Quality-Image.png" alt="NVIDIA" class="img-responsive img-curve">
            </div>
            <div class="clearfix"></div>
        </div>    
    </section>
   <?php include('../izdvojeno-front/footer.php'); ?>