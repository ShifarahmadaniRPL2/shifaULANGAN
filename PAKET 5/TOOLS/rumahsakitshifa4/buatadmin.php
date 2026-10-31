<?php
include __DIR__ . "/proses/koneksi.php";
$namauser = "abrisam athmar";
$username = "athmaradmin";
$password = "ammar0316";
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = mysqli_prepare(
    $koneksi,
    "INSERT INTO user (namauser, username, password)
     VALUES (?, ?, ?)"
);
mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $namauser,
    $username,
    $hash
);
if (mysqli_stmt_execute($stmt)) {
    echo "Akun admin berhasil dibuat!";
    echo "<br>Username: athmaradmin";
    echo "<br>Password: ammar0316";
} else {
    echo "Gagal membuat akun: " . mysqli_error($koneksi);
}
?>