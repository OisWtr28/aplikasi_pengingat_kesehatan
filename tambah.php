<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengingat</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Pengingat Kesehatan</h1>
        <form action="simpan.php" method="post" enctype="multipart/form-data">
            <label for="judul">Judul Pengingat</label>
            <input type="text" name="judul" id="judul" placeholder="Contoh: Minum Obat Pagi" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" placeholder="Tulis deskripsi singkat..." rows="4" required></textarea>

            <label for="waktu">Waktu Pengingat</label>
            <input type="datetime-local" name="waktu" id="waktu" required>

            <label for="gambar">Gambar (Opsional)</label>
            <input type="file" name="gambar" id="gambar" accept="image/*">

            <button type="submit">Simpan</button>
        </form>
        <p><a href="dashboard.php">← Kembali ke Dashboard</a></p>
    </div>
</body>
</html>
