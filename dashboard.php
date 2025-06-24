<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengingat Kesehatan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>📋 <span style="color: #1e3a8a;">Daftar Pengingat Kesehatan</span></h1>

        <!-- Tombol Navigasi Tengah -->
        <div class="nav-center">
            <a href="tambah.php" class="button">➕ Tambah Pengingat</a>
            <a href="logout.php" class="button danger">🚪 Logout</a>
        </div>

        <?php
        session_start();
        include 'koneksi.php';

        if (!isset($_SESSION['user'])) {
            header("Location: index.php");
            exit;
        }

        $id_user = $_SESSION['user']['id'];
        $data = $koneksi->query("SELECT * FROM reminders WHERE user_id = $id_user ORDER BY waktu DESC");

        if ($data->num_rows === 0) {
            echo "<p style='text-align:center; margin-top: 30px; color: #555;'>Belum ada pengingat ditambahkan.</p>";
        }

        while ($row = $data->fetch_assoc()) {
        ?>
            <div class="card">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <div class="deskripsi"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></div>
                <div class="waktu">🕒 <strong>Waktu:</strong> <?= htmlspecialchars($row['waktu']) ?></div>

                <?php if (!empty($row['gambar'])): ?>
                    <img src="folder_upload/<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar Pengingat">
                <?php endif; ?>

                <div class="actions">
                    <a href="edit.php?id=<?= $row['id'] ?>" class="edit">✏️ Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Yakin ingin menghapus pengingat ini?')">🗑️ Hapus</a>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>
