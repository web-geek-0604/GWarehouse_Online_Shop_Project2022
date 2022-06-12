<?php include('../izdvojeno-front/menu.php');  ?>

        <?php  
            if(isset($_SESSION['poruci']))
                {
                    echo $_SESSION['poruci'];
                    unset($_SESSION['poruci']);
                }
        ?>
        
    <section class="pozadina-index">
        <div class="container"></div>
    </section>
    <section class="kategorije">
        <div class="container-kategorije">
            <h2 class="text-center text-velicina">Kategorije</h2>
            <?php       
                $sql = "SELECT * FROM tabela_kategorije WHERE aktivno='Da'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $naziv = $row['naziv'];
                        $naziv_slike = $row['naziv_slike'];
                        ?>
                        <a href="<?php echo SITEURL; ?>/user-stranice/kategorije_kartice.php?id_kategorije=<?php echo $id; ?>">
                            <div class="box-2 float-container">
                                <?php     
                                    if($naziv_slike=="")
                                    {
                                        echo "<div class='greska-msg'>Slika nije dostupna</div>";

                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>./slike/kategorije/<?php echo $naziv_slike; ?>" alt="Asus" class="img-responsive img-curve">
                                        <?php

                                    }
                                
                                ?>
                                <h3 class="float-text"><?php echo $naziv; ?></h3>
                            </div>
                        </a>

                        <?php
                    }

                }
                else
                {
                    echo "<div class='greska-msg'>Kategorija nije dodata.</div>";
                }
            ?>
        </div>    
    </section>
    <div class="slider">
        <div class="slides">
          <input type="radio" name="radio-btn" id="radio1">
          <input type="radio" name="radio-btn" id="radio2">
          <input type="radio" name="radio-btn" id="radio3">
          <input type="radio" name="radio-btn" id="radio4">
          <input type="radio" name="radio-btn" id="radio5">
          <input type="radio" name="radio-btn" id="radio6">
          <input type="radio" name="radio-btn" id="radio7">
          <input type="radio" name="radio-btn" id="radio8">
          <input type="radio" name="radio-btn" id="radio9">
          <input type="radio" name="radio-btn" id="radio10">
          <div class="slide first">
            <img src="../slike/slider slike/Nvidia.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/cod rtx.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/AMD-Radeon-RX-Graphics-_1-Custom.png" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/rsr.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/rtx 3090 8k.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/adrenalin edition.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/msi rtx.png" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/cyberpunk rtx.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/AMD-Radeon-RX-6800XT-RX-6800-Features.jpg" alt="">
          </div>
          <div class="slide">
            <img src="../slike/slider slike/amd-adrenalin-edition-1-carte-graphique-overclocking.jpg" alt="">
          </div>
          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
            <div class="auto-btn5"></div>
            <div class="auto-btn6"></div>
            <div class="auto-btn7"></div>
            <div class="auto-btn8"></div>
            <div class="auto-btn9"></div>
            <div class="auto-btn10"></div>
          </div>
        </div>
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
          <label for="radio5" class="manual-btn"></label>
          <label for="radio6" class="manual-btn"></label>
          <label for="radio7" class="manual-btn"></label>
          <label for="radio8" class="manual-btn"></label>
          <label for="radio9" class="manual-btn"></label>
          <label for="radio10" class="manual-btn"></label>
        </div>
      </div>
  
      <script type="text/javascript">
      var counter = 1;
      setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 10){
          counter = 1;
        }
      }, 4000);
      </script> 
    <section class="ponuda">
        <div class="container1">
            <h2 class="text-center1 text-velicina1">Iz ponude izdvajamo</h2>

            <?php   
            
                $sql2 = "SELECT * FROM tabela_proizvodi WHERE izdvojeno='Da' LIMIT 4";

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
                                        <a href="<?php echo SITEURL; ?>/user-stranice/proizvod_stranica.php?proizvod_id=<?php echo $id; ?>"><img src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" alt="gigabyte asus 6900 xt" class="img-responsive"></a>
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
                    echo "<div class='greska-msg'>Proizvod nije dodat.</div>";
                }  
            ?>
             <div class="clearfix"></div>
        </div>
    </section>

    <?php include('../izdvojeno-front/footer.php'); ?>