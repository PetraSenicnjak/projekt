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
            if(isset($_POST['delete'])){
                $id=$_POST['id'];
                $query = "DELETE FROM clanci WHERE id=$id ";
                $result = mysqli_query($conn, $query);
               }

               if(isset($_POST['update'])){
                $picture = $_FILES['pphoto']['name'];
                $title=$_POST['title'];
                $about=$_POST['about'];
                $content=$_POST['content'];
                $category=$_POST['category'];
                if(isset($_POST['archive'])){
                 $archive=1;
                }else{
                 $archive=0;
                }
                $target_dir = 'img/'.$picture;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                $id=$_POST['id'];
                $query = "UPDATE clanci SET naslov='$title', kratki_sadrzaj='$about', sadrzaj='$content',
                slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
                $result = mysqli_query($conn, $query);
                }

                $query = "SELECT * FROM clanci";
                $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="container2"><form enctype="multipart/form-data" action="" method="POST">
                    <div class="form-item">
                        <label for="title">Naslov vijesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" class="form-field-textual" value="' . htmlspecialchars($row['naslov']) . '">
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" cols="30" rows="10" class="form-field-textual">' . htmlspecialchars($row['kratki_sadrzaj']) . '</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" cols="30" rows="10" class="form-field-textual">' . htmlspecialchars($row['sadrzaj']) . '</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="pphoto">Slika:</label>
                        <div class="form-field">
                            <input type="file" class="input-text" id="pphoto" name="pphoto"/> <br>
                            <img src="' . UPLPATH . htmlspecialchars($row['slika']) . '" width=100px>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" class="form-field-textual">
                                <option value="politika" ' . ($row['kategorija'] == 'politika' ? 'selected' : '') . '>Politika</option>
                                <option value="nekretnine" ' . ($row['kategorija'] == 'nekretnine' ? 'selected' : '') . '>Nekretnine</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item">
                        <label>Spremiti u arhivu:
                        <div class="form-field">
                            <input type="checkbox" name="archive" ' . ($row['arhiva'] == 1 ? 'checked' : '') . '/> Arhiviraj?
                        </div>
                        </label>
                    </div>
                    <div class="form-item">
                        <input type="hidden" name="id" value="' . $row['id'] . '">
                        <button type="reset">Poništi</button>
                        <button type="submit" name="update">Izmijeni</button>
                        <button type="submit" name="delete">Izbriši</button>
                    </div>
                </form></div>';
            }

?>

<footer>
        <div class="container">
            <p id="footer">○ L'Obs - Les marques ou contenus du site nouvelobs.com sont soumis à la protection de la propriété intellectuelle</p>
        </div>
    </footer>
</body>
</html>