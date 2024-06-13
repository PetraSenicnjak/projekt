<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = ($_POST["title"]);
    $about = ($_POST["about"]);
    $content = ($_POST["content"]);
    $category = ($_POST["category"]);
    $date = date('Y-m-d');
    $archive= isset($_POST['arhiva']) ? 1 : 0;

    if (!empty($_FILES["pphoto"]["name"])) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["pphoto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png") {
            echo "Greška: Samo JPG, JPEG, PNG i GIF datoteke su dozvoljene.";
            exit;
        }

        if (move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file)) {
            $image = basename($_FILES["pphoto"]["name"]);
        } else {
            echo "Greška pri učitavanju datoteke.";
            exit;
        }
    }

    $sql = "INSERT INTO clanci (naslov, sadrzaj, kategorija, datum_kreiranja, arhiva, slika, kratki_sadrzaj)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssiss", $title, $content, $category, $date, $archive, $image, $about);
        
        if ($stmt->execute()) {
            echo "Vijest uspješno unesena!";
        } else {
            echo "Greška pri unosu vijesti: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Greška pri pripremi upita: " . $conn->error;
    }
    $conn->close();
}
?>
