<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">DODAJ KURIRSKU SLUŽBU</h1>

                <br><br>

                <?php  
                
                    if(isset($_SESSION['dodaj']))
                    {
                        echo $_SESSION['dodaj'];
                        unset($_SESSION['dodaj']);
                    }

                    if(isset($_SESSION['otpremi']))
                    {
                        echo $_SESSION['otpremi'];
                        unset($_SESSION['otpremi']);
                    }
                
                ?>

                <br><br>

                <form action="" method="POST" enctype="multipart/form-data">

                    <table class="tbl-admin">
                        <tr>
                            <td>Naziv:</td>
                            <td>
                                <input type ="text" name="naziv" placeholder="Naziv kurirske službe">
                            </td>
                        </tr>

                        <tr>
                            <td>Izaberi sliku:</td>
                            <td>
                                <input type="file" name="slika">
                            </td>
                        </tr>
                        <tr>
                            <td>Telefon:</td>
                            <td>
                                <input type ="tel" name="telefon" placeholder="Telefon kurirske službe">
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>
                                <input type ="email" name="email" placeholder="E-mail kurirske službe">
                            </td>
                        </tr>
                        <tr>
                            <td>Adresa:</td>
                            <td>
                                <input type ="text" name="adresa" placeholder="Adresa kurirske službe">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="potvrdi" value="Dodaj kurirsku službu" class="btn5">
                            </td>            
                        </tr>
                        

                    </table>

                </form>

                <?php 
                
                    if(isset($_POST['potvrdi']))
                    {
                        $kurir_naziv = $_POST['naziv'];
                        $kurir_telefon = $_POST['telefon'];
                        $kurir_email = $_POST['email'];
                        $kurir_adresa = $_POST['adresa'];
                        

                        if(isset($_FILES['slika']['name']))
                        {
                            $naziv_slike = $_FILES['slika']['name'];

                            if($naziv_slike != "")
                            {


                                $ekstenzija = end(explode('.', $naziv_slike));

                                $naziv_slike = "kurir_slika-".rand(000, 999).'.'.$ekstenzija;


                                $izvorna_putanja = $_FILES['slika']['tmp_name'];
                                $destinacija = "../slike/kurir/".$naziv_slike;

                                $otpremi = move_uploaded_file($izvorna_putanja, $destinacija);

                                if($otpremi==false)
                                {
                                    $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije otpremljena. </div>";
                                    header('location:'.SITEURL.'admin-panel/dodaj-kurira.php');

                                    die();
                                }

                            }

                        }
                        else
                        {
                            $naziv_slike="";

                        }


                        $sql = "INSERT INTO tabela_kurir SET
                            kurir_naziv='$kurir_naziv',
                            naziv_slike='$naziv_slike',
                            kurir_telefon='$kurir_telefon',
                            kurir_email='$kurir_email',
                            kurir_adresa='$kurir_adresa'
                        ";

                        $res = mysqli_query($conn, $sql);

                        if($res==true)
                        {
                            $_SESSION['dodaj'] ="<div class='uspesno-msg'>Kurirska služba je uspešno dodata. </div>";
                            header('location:'.SITEURL.'admin-panel/admin-kurir.php');
                        }
                        else
                        {
                            $_SESSION['dodaj'] ="<div class='greska-msg'>Kurirska služba nije dodata. </div>";
                            header('location:'.SITEURL.'admin-panel/dodaj-kurira.php');
                        }

                    }
                
                ?>




            </div>
</div>




<?php include('izdvojeno/footer.php'); ?>