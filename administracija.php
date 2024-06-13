<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>LOGIN</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>L'OBS</h1>
        </div>
        <div class="container">
            <nav>
                <ul>
                <li><a href="index.php">HOME</a></li>
                    <li><a href="kategorija.php?category=politika">POLITIQUE</a></li>
                    <li><a href="kategorija.php?category=nekretnine">IMMOBILIER</a></li>
                    <li><a href="unos.html">NEW NEWS</a></li>
                    <?php
                    session_start();
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

    <?php
    //session_start();
    //session_unset();
    //session_destroy();
    //session_start();
    include 'config.php';
    define('UPLPATH', 'img/');

    $uspjesnaPrijava = false; 
    $admin = false; 
    $poruka = ""; 

    // Prikazivanje forme za prijavu ako korisnik nije prijavljen
   // if (!isset($_SESSION['username'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prijava'])) {
            $uspjesnaPrijava = false;
            $prijavaImeKorisnika = $_POST['username'];
            $prijavaLozinkaKorisnika = $_POST['lozinka'];

            $sql = "SELECT korisnicko_ime, lozinka, razina FROM user WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                mysqli_stmt_fetch($stmt);

                if (mysqli_stmt_num_rows($stmt) > 0) {
                    if (password_verify($prijavaLozinkaKorisnika, $lozinkaKorisnika)) {
                        $_SESSION['username'] = $imeKorisnika;
                        $_SESSION['level'] = $levelKorisnika;
                        $uspjesnaPrijava = true;

                        if ($levelKorisnika == 1) {
                            header('Location: azuriranje.php');
                            //exit();
                        }
                     
                    } else {
                        echo "<p style='color: red;'>Pogrešna lozinka! Pokušajte ponovno.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Korisnik nije pronađen. Molimo registrirajte se.</p>";
                    header('Location: registracija.php');
                }
            }
        }

        // Prikazivanje forme za prijavu
        if (isset($_SESSION['username'])) {
            echo "<div class='container2'>
                  <p>Prijavljeni ste kao: " . htmlspecialchars($_SESSION['username']) . "</p>
                  </div>";
        } else {
            if (!$uspjesnaPrijava) {
                echo '
                <div class="container2">
                    <h2>Prijava Korisnika</h2>
                    <form action="" method="POST" name="signin">
                        <div class="container2">
                            <label for="username">Korisničko ime:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        <div class="container2">
                            <label for="lozinka">Lozinka:</label>
                            <input type="password" id="lozinka" name="lozinka" required>
                        </div>
                        <div class="container2">
                            <button type="submit" name="prijava">Prijavi se</button>
                        </div>
                    </form>
                </div>';
            }
        }
        ?>

    <footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>
    </footer>
</body>
</html>
