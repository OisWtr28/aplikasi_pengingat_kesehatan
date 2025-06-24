<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengingat</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>✏️ Edit Pengingat</h1>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <label for="judul">Judul Pengingat</label>
            <input type="text" name="judul" id="judul" value="<?= $row['judul'] ?>" required>

            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" required><?= $row['deskripsi'] ?></textarea>

            <label for="waktu">Waktu Pengingat</label>
            <input type="datetime-local" name="waktu" id="waktu" value="<?= date('Y-m-d\TH:i', strtotime($row['waktu'])) ?>" required>

            <?php if ($row['gambar']): ?>
                <label>Gambar Saat Ini:</label>
                <img src="folder_upload/<?= $row['gambar'] ?>" width="150"><br>
            <?php endif; ?>

            <label for="gambar">Gambar Baru (Opsional)</label>
            <input type="file" name="gambar" id="gambar" accept="image/*">

            <button type="submit">Simpan Perubahan</button>
        </form>
        <p><a href="dashboard.php">← Kembali ke Dashboard</a></p>
    </div>
</body>
</html>
