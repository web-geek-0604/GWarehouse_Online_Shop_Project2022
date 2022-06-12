
<?php  include('../config/konstante.php'); ?>

<html>
    <head>
        <title>Login- GWarehouse - prodaja grafičkih kartica</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-poruka']))
                {
                    echo $_SESSION['no-login-poruka'];
                    unset($_SESSION['no-login-poruka']);
                }

            ?>
            <br><br>

            <form action="" method="POST" class="text-center">
            Korisničko ime: <br>
            <input type="text" name="korisnicko_ime" placeholder="Unesite Vaše korisničko ime"><br><br>

            Lozinka: <br>
            <input type="password" name="lozinka" placeholder="Unesite Vašu lozinku"><br><br>

            <input type="submit" name="potvrdi" value="Uloguj se"  class="btn4">
            </form>
</div>
    </body>
</html>

<?php include('izdvojeno/footer.php'); ?>

<?php 
    if(isset($_POST['potvrdi']))
    {
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $lozinka = md5($_POST['lozinka']);


        $sql = "SELECT * FROM tabela_admin WHERE korisnicko_ime='$korisnicko_ime' AND lozinka='$lozinka'";

        $res = mysqli_query($conn, $sql);


        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='uspesno-msg'>Uspešno logovanje. </div>";
            $_SESSION['korisnik'] = $korisnicko_ime;

            header('location:'.SITEURL.'admin-panel/admin-index.php');

        }
        else
        {
            $_SESSION['login'] = "<div class='greska-msg text-center'>Neuspešno logovanje. </div>";
            header('location:'.SITEURL.'admin-panel/login-stranica.php');

        }
    }
    else
    {

    }


?>