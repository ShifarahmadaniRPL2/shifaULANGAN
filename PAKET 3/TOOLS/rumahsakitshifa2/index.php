<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'pasien';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit Shifa</title>
</head>

<body>
    <h2>Aplikasi Rumah sakit shifa</h2>
    <a href="index.php?page=pasien">Data pasien</a>
    <a href="index.php?page=kunjungan">Data Kunjungan</a>
    <hr>

    <?php
    switch ($page) {
        case 'pasien':
            include 'views/pasien/index.php';
            break;
        case 'createpasien':
            include 'views/pasien/create.php';
            break;
        case 'editpasien':
            include 'views/pasien/edit.php';
            break;
        case 'showpasien':
            include 'views/kunjungan/show.php';
            break;
        case 'kunjungan':
            include 'views/kunjungan/index.php';
            break;
        case 'createkunjungan':
            include 'views/kunjungan/create.php';
            break;
        case 'editkunjungan':
            include 'views/kunjungan/edit.php';
            break;
        case 'showkunjungan':
            include 'views/kunjungan/show.php';
            break;
        default:
            echo "Halaman tidak ditemukan.";
            break;
    }
    ?>
</body>
</html>