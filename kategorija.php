<?php
include 'config.php';
define('UPLPATH', 'img/');
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>CATEGORY</title>
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

<?php
$kategorija = $_GET['category']; 

$query = "SELECT * FROM clanci WHERE kategorija ='$kategorija'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<article class='container2' style='width:70%'>";
        if (!empty($row["slika"])) {
            echo '<div class="im2">';
                    echo '<img class = "im" src="' . UPLPATH . $row['slika'] . '">';
                    echo '</div>';
        }
        echo "<div>";
        echo "<h2>" . $row["naslov"] . "</h2>";
        $originalDate = $row['datum_kreiranja'];
        $newDate = date("d.m.Y", strtotime($originalDate));

        echo "<i><p style='color:grey'>Objavljeno: " . $newDate . "</p></i>";
        echo "<p>" . $row["sadrzaj"]. "</p>";
        echo "</div>";
        echo "</article>";
    }
} else {
    echo '<p>Nije pronađen ni jedan članak u ovoj kategoriji.</p>';
}


$conn->close();
?>


<footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>

    </footer>

</body>
</html>
<?php

?>
