<?php
$koneksi = new mysqli("localhost", "root", "", "aplikasi_kesehatan");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
