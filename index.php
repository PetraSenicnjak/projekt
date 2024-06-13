<?php
include 'config.php';
define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HOME</title>
</head>

<body>
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

    <h2>POLITIQUE</h2>
    <section class="container">
        <?php
            $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='politika' LIMIT 4";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo '<p>Error executing query: ' . mysqli_error($conn) . '</p>';
            } else {
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<article class= "element">';
                    echo '<div class="im">';
                    echo '<img class="im" src="' . UPLPATH . $row['slika'] . '">';
                    echo '</div>';
                    echo '<div class="container">';
                    echo '<h4 class="title">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</div>';
                    echo '</article>';
                    $i++;
                }

                if ($i == 0) {
                    echo '<p>Nije pronađen ni jedan članak u ovoj kategoriji.</p>';
                }
            }
        ?>
    </section>

    <h2>IMMOBILIER</h2>
    <section class="container">
        <?php
            $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='nekretnine' LIMIT 4";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo '<p>Error executing query: ' . mysqli_error($conn) . '</p>';
            } else {
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<article class="element">';
                    echo '<div class="im">';
                    echo '<img class = "im" src="' . UPLPATH . $row['slika'] . '">';
                    echo '</div>';
                    echo '<div class="container">';
                    echo '<h4 class="title">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo $row['naslov'];
                    echo '</a></h4>';
                    echo '</div>';
                    echo '</article>';
                    $i++;
                }

                if ($i == 0) {
                    echo '<p>Nije pronađen ni jedan članak u ovoj kategoriji.</p>';
                }
            }
        ?>
    </section>

    <footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>

    </footer>
</body>

</html>