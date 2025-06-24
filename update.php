<?php
session_start();
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];

$data = $koneksi->query("SELECT * FROM reminders WHERE id=$id AND user_id=" . $_SESSION['user']['id']);
if ($data->num_rows == 0) {
    echo "Data tidak ditemukan atau Anda tidak berhak mengedit.";
    exit;
}
$row = $data->fetch_assoc();

// Upload gambar baru jika ada
$nama_file = $row['gambar'];
if ($_FILES['gambar']['name'] != "") {
    $nama_file = date("YmdHis") . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "folder_upload/" . $nama_file);

    // Hapus gambar lama jika ada
    if ($row['gambar'] != "" && file_exists("folder_upload/" . $row['gambar'])) {
        unlink("folder_upload/" . $row['gambar']);
    }
}

// Update data
$koneksi->query("UPDATE reminders SET judul='$judul', deskripsi='$deskripsi', waktu='$waktu', gambar='$nama_file' WHERE id=$id");

header("Location: dashboard.php");
?>
