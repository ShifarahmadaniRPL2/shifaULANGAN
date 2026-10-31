<?php
$koneksi = mysqli_connect("localhost", "root", "", "rumahsakitshifa");

if (!$koneksi) {
    die("koneksi gagal: " . mysqli_connect_error() );
}
?>