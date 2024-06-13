<?php
    include 'config.php';
    define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>NEWS</title>
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

    <div class="container2">
        <?php
            if(isset($_GET['id'])) {


                $id = $_GET['id'];

                $sql = "SELECT * FROM clanci WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        if (!empty($row["slika"])) {
                            echo '<div class="im2"><img class="im" src="' .  UPLPATH . $row['slika'] . '" alt="Image"></div>';
                        }
                        echo "<h2>" . $row["naslov"]. "</h2>";
                        echo "<i><p style='color:grey'>Objavljeno: " . $row['datum_kreiranja']. "</p></i>";
                        echo "<p>" . $row["sadrzaj"]. "</p>";
                    }
                } else {
                    echo "Članak nije pronađen.";
                }

                $conn->close();
            } else {
                echo "Nije odabran članak za prikaz.";
            }
        ?>
    </div>

    
    <footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>

    </footer>
</body>
</html>