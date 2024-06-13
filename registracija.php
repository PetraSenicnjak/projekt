<?php
session_start();
include 'config.php';
define('UPLPATH', 'img/');

$registriranKorisnik = false; 
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $lozinka = $_POST['pass'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $razina = 0;

    $sql = "SELECT korisnicko_ime FROM user WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if (mysqli_stmt_num_rows($stmt) > 0) {
        $msg = 'Korisničko ime već postoji!';
    } else {
        $sql = "INSERT INTO user (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
            mysqli_stmt_execute($stmt);
            $registriranKorisnik = true;
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
    <link rel="stylesheet" href="style.css">
</head>

<header>
        <div class="container"><h1>L'OBS</h1></div>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="kategorija.php?category=politika">POLITIQUE</a></li>
                    <li><a href="kategorija.php?category=nekretnine">IMMOBILIER</a></li>
                    <li><a href="unos.html">NEW NEWS</a></li>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li><a href="logout.php">LOGOUT</a></li>';
                    } else {
                        echo '<li><a href="administracija.php">LOGIN</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>

<body>

    <?php
    if ($registriranKorisnik == true) {
        echo '<p class = "container2" >Korisnik je uspješno registriran!</p>';
    }
    else {
        echo '<p class = "container2" style="color: grey;">Korisnik nije pronađen. Molimo registrirajte se.</p>';
    }
    ?>

    <section role="main">
        <form enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
                <span id="porukaIme" class="bojaPoruke"></span>
                <label for="title">Ime: </label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="form-fieldtextual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPrezime" class="bojaPoruke"></span>
                <label for="about">Prezime: </label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaUsername" class="bojaPoruke"></span>

                <label for="content">Korisničko ime:</label>
                <?php echo '<br><span class="bojaPoruke">' . $msg . '</span>'; ?>
                <div class="form-field">
                    <input type="text" name="username" id="username" class="formfield-textual">
                </div>
            </div>
            <div class="form-item">
                <span id="porukaPass" class="bojaPoruke"></span>
                <label for="pphoto">Lozinka: </label>
                <div class="form-field"></div>
                <input type="password" name="pass" id="pass" class="formfield-textual">
            </div>
            </div>
            <div class="form-item">
                <span id="porukaPassRep" class="bojaPoruke"></span>
                <label for="pphoto">Ponovite lozinku: </label>
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep" class="form-field-textual">
                </div>
            </div>

            <div class="form-item">
                <button type="submit" value="Prijava" id="slanje">Prijava</button>
            </div>
        </form>

    </section>
    <script type="text/javascript">
        document.getElementById("slanje").onclick = function (event) {

            var slanjeForme = true;

          
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            if (ime.length == 0) {
                slanjeForme = false;
                poljeIme.style.border = "1px dashed red";
                document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!<br>";
            } else {
                poljeIme.style.border = "1px solid green";
                document.getElementById("porukaIme").innerHTML = "";
            }
           
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            if (prezime.length == 0) {
                slanjeForme = false;
                poljePrezime.style.border = "1px dashed red";

                document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!<br>";
            } else {
                poljePrezime.style.border = "1px solid green";
                document.getElementById("porukaPrezime").innerHTML = "";
            }

          
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border = "1px dashed red";

                document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!<br>";
            } else {
                poljeUsername.style.border = "1px solid green";
                document.getElementById("porukaUsername").innerHTML = "";
            }

            
            var poljePass = document.getElementById("pass");
            var pass = document.getElementById("pass").value;
            var poljePassRep = document.getElementById("passRep");
            var passRep = document.getElementById("passRep").value;
            if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                slanjeForme = false;
                poljePass.style.border = "1px dashed red";
                poljePassRep.style.border = "1px dashed red";
                document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!<br>";

                document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!<br>";
            } else {
                poljePass.style.border = "1px solid green";
                poljePassRep.style.border = "1px solid green";
                document.getElementById("porukaPass").innerHTML = "";
                document.getElementById("porukaPassRep").innerHTML = "";
            }

            if (slanjeForme != true) {
                event.preventDefault();
            }

        };
    </script>

<footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>

    </footer>
</body>
</html>