    <h1 class="header">Form User</h1>
    <div class="tabel_utama">
        <form action="index.php?hal=user_save" method="POST">
            <label for="">NIM</label>
            <input type="text" name="nim" required><br>
            <label for="">Nama</label>
            <input type="text" name="nama" required><br>
            <label for="">Password</label>
            <input type="text" name="password" required><br>
            <label for="">Level</label>
            <select name="status" id="">
                <option>-Pilih-</option>
                <option>Aktif</option>
                <option>Pasif</option>
            </select>
            <button type="submit">Simpan</button>
        </form>
    </div>

