<?php include('izdvojeno/menu.php'); ?>

<div class="sadrzaj">
            <div class="menu-stil">
                <h1 class="text-size">DODAJ KATEGORIJU</h1>

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
                                <input type ="text" name="naziv" placeholder="Naziv kategorije">
                            </td>
                        </tr>

                        <tr>
                            <td>Izaberi sliku:</td>
                            <td>
                                <input type="file" name="slika">
                            </td>
                        </tr>
                            <td>Aktivno:</td>
                            <td>
                                <input type ="radio" name="aktivno" value="Da"> Da
                                <input type ="radio" name="aktivno" value="Ne"> Ne
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="potvrdi" value="Dodaj kategoriju" class="btn5">
                            </td>            
                        </tr>
                        

                    </table>

                </form>

                <?php 
                
                    if(isset($_POST['potvrdi']))
                    {
                        $naziv = $_POST['naziv'];


                        if(isset($_POST['aktivno']))
                        {
                            $aktivno = $_POST['aktivno'];
                        }
                        else
                        {
                            $aktivno = "Ne";

                        }
                        

                        if(isset($_FILES['slika']['name']))
                        {
                            $naziv_slike = $_FILES['slika']['name'];

                            if($naziv_slike != "")
                            {


                                $ekstenzija = end(explode('.', $naziv_slike));

                                $naziv_slike = "kartice_kategorije_".rand(000, 999).'.'.$ekstenzija;


                                $izvorna_putanja = $_FILES['slika']['tmp_name'];
                                $destinacija = "../slike/kategorije/".$naziv_slike;

                                $otpremi = move_uploaded_file($izvorna_putanja, $destinacija);

                                if($otpremi==false)
                                {
                                    $_SESSION['otpremi'] = "<div class='greska-msg'>Slika nije otpremljena. </div>";
                                    header('location:'.SITEURL.'admin-panel/dodaj-kategoriju.php');

                                    die();
                                }

                            }

                        }
                        else
                        {
                            $naziv_slike="";

                        }


                        $sql = "INSERT INTO tabela_kategorije SET
                            naziv='$naziv',
                            naziv_slike='$naziv_slike',
                            aktivno='$aktivno'
                        ";

                        $res = mysqli_query($conn, $sql);

                        if($res==true)
                        {
                            $_SESSION['dodaj'] ="<div class='uspesno-msg'>Kategorija je uspešno dodata. </div>";
                            header('location:'.SITEURL.'admin-panel/admin-kategorije.php');
                        }
                        else
                        {
                            $_SESSION['dodaj'] ="<div class='greska-msg'>Kategorija nije dodata. </div>";
                            header('location:'.SITEURL.'admin-panel/dodaj-kategoriju.php');
                        }

                    }
                
                ?>




            </div>
</div>




<?php include('izdvojeno/footer.php'); ?>