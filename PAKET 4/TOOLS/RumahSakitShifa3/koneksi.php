<?php
$koneksi = mysqli_connect("localhost", "root", "", "rumahsakitshifa3");

if (!$koneksi) {
    die("koneksi gagal: ". mysqli_connect_error());
}
?>