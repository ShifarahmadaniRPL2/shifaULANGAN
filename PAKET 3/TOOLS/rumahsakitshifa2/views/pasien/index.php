<?php
include "koneksi.php";
$data = mysqli_query(
    $koneksi,
    "SELECT * FROM pasien ORDER BY idpasien DESC"
);
?>
<h2>Data Pasien</h2>
<p>
    <a href="index.php?page=createpasien">
        <button type="button">+ Tambah Pasien</button>
    </a>
</p>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;

        if ($data && mysqli_num_rows($data) > 0) {
            while ($pasien = mysqli_fetch_assoc($data)) {
        ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?= htmlspecialchars($pasien['namapasien'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($pasien['jeniskelamin'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($pasien['nohp'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
                    </td>
                    <td>
                        <a href="index.php?page=showpasien&id=<?= urlencode($pasien['idpasien']); ?>">
                            Detail
                        </a>
                        |
                        <a href="index.php?page=editpasien&id=<?= urlencode($pasien['idpasien']); ?>">
                            Edit
                        </a>
                        |
                        <form
                            action="proses/prosespasien.php?proses=hapus"
                            method="post"
                            style="display:inline;"
                            onsubmit="return confirm('Yakin ingin menghapus pasien ini?');">
                            <input
                                type="hidden"
                                name="idpasien"
                                value="<?= htmlspecialchars((string) $pasien['idpasien'], ENT_QUOTES, 'UTF-8'); ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5" align="center">
                    Belum ada data pasien.
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>