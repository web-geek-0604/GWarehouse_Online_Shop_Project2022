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

        $id = $row['id'];
        $naziv = $row['naziv'];
        $cena = $row['cena'];
        $naziv_slike = $row['naziv_slike'];
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

    <section class="articles">
            <div class="izbor-text">
        <h4 style="background-color: #f5f6fa">Izabrali ste:</h4>
            </div>
            <?php 
                    
                    if($naziv_slike=="")
                    {
                        echo "<div class='greska-msg'>Slika nije dostupna.</div>";
                    }
                    else
                    {
                        ?>

                        <img id=featured src="<?php echo SITEURL; ?>slike/proizvodi/<?php echo $naziv_slike; ?>" class="img-responsive1 img-curve">

                        <?php
                    }

                ?>
            <div class="opis-kartice">
                <h4 style="background-color: #f5f6fa" class="o-kartici"><?php echo $naziv; ?></h4>
                <h4 style="background-color: #f5f6fa" class="kartica-cena"><?php echo number_format($cena,2,",","."); ?> RSD</h4>
                <br>
                <a href="<?php echo SITEURL; ?>/user-stranice/naruci.php?proizvod_id=<?php echo $id; ?>" class="btn2 btn-poruci2">Naruči</a>
            </div>    
            </div>
    </section>
    <section>
        <h4 class="specifikacije-text">Specifikacije</h4>   
        <table id="table1" style="width: 60%" class="table-position">
            <tr>
                <td class="td-border">Model</td>
                <td class="td-border"><?php echo $model; ?></td>
            </tr>
            <tr>
                <td class="td-border">Proizvođač</td>
                <td class="td-border"><?php echo $proizvodjac; ?></td>
            </tr>
            <tr>
                <td class="td-border">Grafički interfejs</td>
                <td class="td-border"><?php echo $graficki_interfejs; ?></td>
            </tr>
            <tr>
                <td class="td-border">Brzina grafičkog čipa</td>
                <td class="td-border"><?php echo $brzina_grafickog_cipa; ?></td>
            </tr>
            <tr>
                <td class="td-border">CUDA® jezgra/STREAM processors</td>
                <td class="td-border"><?php echo $cuda_jezgra; ?></td>
            </tr>
            <tr>
                <td class="td-border">DirectX</td>
                <td class="td-border"><?php echo $directx; ?></td>
            </tr>
            <tr>
                <td class="td-border">OpenGL</td>
                <td class="td-border"><?php echo $open_gl; ?></td>
            </tr>
            <tr>
                <td class="td-border">Brzina memorije</td>
                <td class="td-border"><?php echo $brzina_memorije; ?></td>
            </tr>
            <tr>
                <td class="td-border">Memorijska magistrala</td>
                <td class="td-border"><?php echo $memorijska_magistrala; ?></td>
            </tr>
            <tr>
                <td class="td-border">Naponski konektori</td>
                <td class="td-border"><?php echo $naponski_konektori; ?></td>
            </tr>
            <tr>
                <td class="td-border">Dimenzije</td>
                <td class="td-border"><?php echo $dimenzije; ?></td>
            </tr>
            <tr>
                <td class="td-border">HDMI</td>
                <td class="td-border"><?php echo $hdmi; ?></td>
            </tr>
            <tr>
                <td class="td-border">Display port</td>
                <td class="td-border"><?php echo $display_port; ?></td>
            </tr>
            <tr>
                <td class="td-border">Količina memorije</td>
                <td class="td-border"><?php echo $kolicina_memorije; ?></td>
            </tr>
            <tr>
                <td class="td-border">Tip memorije</td>
                <td class="td-border"><?php echo $tip_memorije; ?></td>
            </tr>
            <tr>
                <td class="td-border">Hlađenje</td>
                <td class="td-border"><?php echo $hladjenje; ?></td>
            </tr>
            <tr>
                <td>Ostalo</td>
                <td class="td-border"><?php echo $ostalo1; ?>
                    <br>
                    <?php echo $ostalo2; ?>
                    <br>
                    <?php echo $ostalo3; ?>
                    <br>
                    <?php echo $ostalo4; ?>
                    <br>
                    <?php echo $ostalo5; ?>
                    <br>
                    <?php echo $ostalo6; ?>
                    <br>
                    <?php echo $ostalo7; ?>
                    <br>
                    <?php echo $ostalo8; ?>
                    <br>
                    <?php echo $ostalo9; ?>
            </tr>
        </table>
    </section>
   <?php include('../izdvojeno-front/footer.php'); ?>