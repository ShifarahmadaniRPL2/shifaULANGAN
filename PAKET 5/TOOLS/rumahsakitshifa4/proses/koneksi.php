<?php
$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "rumahsakitshifa4"
);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
