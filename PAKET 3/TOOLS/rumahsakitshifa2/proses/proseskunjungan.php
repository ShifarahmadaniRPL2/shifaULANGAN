<?php
include __DIR__ . "/../koneksi.php";
$proses = $_GET['proses'] ?? '';
if ($proses == 'insert') {
    $idpasien = (int)($_POST['idpasien'] ?? 0);
    $tanggal  = $_POST['tanggal'] ?? '';
    $keluhan  = trim($_POST['keluhan'] ?? '');
    $biaya    = $_POST['biaya'] ?? '';
    if (
        $idpasien <= 0 ||
        $tanggal == '' ||
        $keluhan == '' ||
        $biaya === '' ||
        !is_numeric($biaya) ||
        (float)$biaya < 0
    ) {
        die("Semua data kunjungan harus diisi dengan benar.");
    }
    $biaya = (int)$biaya;
    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO kunjungan
        (idpasien, tanggal, keluhan, biaya)
        VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param(
        $stmt,
        "issi",
        $idpasien,
        $tanggal,
        $keluhan,
        $biaya
    );
    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal menyimpan kunjungan: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
} elseif ($proses == 'update') {
    $id       = (int)($_POST['idkunjungan'] ?? 0);
    $idpasien = (int)($_POST['idpasien'] ?? 0);
    $tanggal  = $_POST['tanggal'] ?? '';
    $keluhan  = trim($_POST['keluhan'] ?? '');
    $biaya    = $_POST['biaya'] ?? '';
    if (
        $id <= 0 ||
        $idpasien <= 0 ||
        $tanggal == '' ||
        $keluhan == '' ||
        $biaya === '' ||
        !is_numeric($biaya) ||
        (float)$biaya < 0
    ) {
        die("Data kunjungan untuk diperbarui tidak lengkap.");
    }
    $biaya = (int)$biaya;
    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE kunjungan
         SET idpasien = ?, tanggal = ?, keluhan = ?, biaya = ?
         WHERE idkunjungan = ?"
    );
    mysqli_stmt_bind_param(
        $stmt,
        "issii",
        $idpasien,
        $tanggal,
        $keluhan,
        $biaya,
        $id
    );
    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal memperbarui kunjungan: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
} elseif ($proses == 'hapus') {
    $id = (int)($_POST['idkunjungan'] ?? 0);
    if ($id <= 0) {
        die("ID kunjungan tidak valid.");
    }
    $stmt = mysqli_prepare(
        $koneksi,
        "DELETE FROM kunjungan WHERE idkunjungan = ?"
    );
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (!mysqli_stmt_execute($stmt)) {
        die("Gagal menghapus kunjungan: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);
} else {
    die("Proses kunjungan tidak dikenal.");
}
header("Location: ../index.php?page=kunjungan");
exit;
