<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Tambah Pasien</h5>
    </div>
    <div class="card-body">
        <form action="proses/prosespasien.php?proses=insert" method="POST">
            <div class="mb-3">
                <label class="form-label">Nama pasien</label>
                <input type="text"
                    name="namapasien"
                    class="form-control"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis kelamin</label>
                <select name="jeniskelamin" class="form-select" required>
                    <option value="">Pilih jenis kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat"
                    class="form-control"
                    rows="3"
                    required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text"
                    name="nohp"
                    class="form-control"
                    required>
            </div>
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
            <a href="index.php?page=pasien" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>