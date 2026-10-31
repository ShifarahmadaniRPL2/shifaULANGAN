<?php
$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "rumahsakitshifa2"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>