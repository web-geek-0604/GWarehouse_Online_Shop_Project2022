<?php include('../izdvojeno-front/menu.php'); ?>


<?php 

    if(isset($_GET['id_kategorije']))
    {
        $id_kategorije = $_GET['id_kategorije'];
        $sql = "SELECT naziv FROM tabela_kategorije WHERE id=$id_kategorije";

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $naziv_kategorije = $row['naziv'];

    }
    else
    {
        header('location:'.SITEURL);
    }

?>


    <section class="ponuda1">
        <div class="container-ponuda">
            <h2 class="text-center text-velicina"><?php echo $naziv_kategorije; ?></h2>

            <?php
            
                $sql2 = "SELECT * FROM tabela_proizvodi WHERE id_kategorije=$id_kategorije";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $naziv = $row2['naziv'];
                        $cena = $row2['cena'];
                        $naziv_slike = $row2['naziv_slike'];
                        ?>

                        <div class="ponuda-box1">
                            <div class="ponuda-img">

                            <?php

                                if($naziv_slike=="")
                                {
                                    echo "<div class='greska-msg'>Slika nije dostupna.</div>";

                                }
                                else
                                {
                                    ?>
                                    <a href="<?php echo SITEURL; ?>/user-stranice/proizvod_stranica.php?proizvod_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" alt="asus rog strix rtx 3080" class="img-responsive">
                                    <?php

                                }

                            ?>



                            </div>
                            <div class="ponuda-opis">
                            <a href="<?php echo SITEURL; ?>/user-stranice/proizvod_stranica.php?proizvod_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?><?php echo $naziv; ?>" alt="<?php echo $naziv; ?>" class="img-responsive">
                                <p class="ponuda-cena"><?php echo number_format($cena,2,",","."); ?> RSD</p>
                                <br>

                                <a href="<?php echo SITEURL; ?>/user-stranice/naruci.php?proizvod_id=<?php echo $id; ?>" class="btn btn-poruci">Naruči</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <?php
                    }


                }
                else
                {
                    echo "<div class='greska-msg'>Proizvod nije dostupan.</div>";

                }
     
            
            ?>

                <div class="clearfix"></div>
            </div>
    </section>
    <?php include('../izdvojeno-front/footer.php'); ?>