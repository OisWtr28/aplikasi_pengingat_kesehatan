<?php
session_start();
include 'koneksi.php';

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$waktu = $_POST['waktu'];
$id_user = $_SESSION['user']['id'];

$nama_file = "";
if ($_FILES['gambar']['name'] != "") {
    $nama_file = date("YmdHis") . $_FILES['gambar']['name'];
    move_uploaded_file($_FILES['gambar']['tmp_name'], "folder_upload/" . $nama_file);
}

$koneksi->query("INSERT INTO reminders (user_id, judul, deskripsi, waktu, gambar) 
    VALUES ('$id_user', '$judul', '$deskripsi', '$waktu', '$nama_file')");

header("Location: dashboard.php");
?>
