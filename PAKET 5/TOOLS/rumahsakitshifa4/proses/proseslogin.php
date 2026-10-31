<?php
session_start();
include __DIR__ . "/koneksi.php";
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
if ($username == '' || $password == '') {
    header("Location: ../index.php?page=login&pesan=Gagal");
    exit;
}
$sql = "SELECT * FROM user WHERE username = ? LIMIT 1";
$stmt = mysqli_prepare($koneksi, $sql);
if (!$stmt) {
    die("Query gagal: " . mysqli_error($koneksi));
}
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['iduser'] = $user['iduser'];
    $_SESSION['namauser'] = $user['namauser'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['statuslogin'] = true;
    header("Location: ../index.php?page=home");
    exit;
} else {
    header("Location: ../index.php?page=login&pesan=Gagal");
    exit;
}
?>