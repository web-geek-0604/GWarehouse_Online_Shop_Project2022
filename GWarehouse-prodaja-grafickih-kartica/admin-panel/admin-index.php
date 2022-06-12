<?php include('izdvojeno/menu.php'); ?>

        <div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">KONTROLNI PANEL</h1>
                <br><br>
                <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
                <br><br>

                <div class="polje1 text-center">

                <?php   
                
                    $sql = "SELECT * FROM tabela_kategorije";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);



                ?>
                    <h1><?php echo $count; ?></h1>
                    <br>
                    Kategorije
                </div>
                <div class="polje1 text-center">

                <?php   
                
                $sql2 = "SELECT * FROM tabela_proizvodi";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                ?>
                    <h1><?php echo $count2; ?></h1>
                    <br>
                    Proizvodi
                </div>
                <div class="polje1 text-center">

                <?php   
                
                $sql3 = "SELECT * FROM tabela_poruci";

                $res3 = mysqli_query($conn, $sql3);

                $count3 = mysqli_num_rows($res3);

                ?>
                    <h1><?php echo $count3; ?></h1>
                    <br>
                    Porudžbine
                </div>
                <div class="polje2 text-center">

                    <?php  
                    
                        $sql4 = "SELECT SUM(ukupno) AS Ukupno FROM tabela_poruci WHERE status_porudzbine='Dostavljeno'";

                        $res4 = mysqli_query($conn, $sql4);

                        $row4 = mysqli_fetch_assoc($res4);

                        $ukupna_zarada = $row4['Ukupno'];


                    
                    ?>
                    <h1><?php echo number_format($ukupna_zarada,2,",","."); ?> RSD</h1>
                    <br>
                    Ukupna prodaja
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

<?php include('izdvojeno/footer.php'); ?>

