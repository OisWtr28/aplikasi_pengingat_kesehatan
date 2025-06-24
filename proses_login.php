<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$cek = $koneksi->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
if ($cek->num_rows > 0) {
    $_SESSION['user'] = $cek->fetch_assoc();
    header("Location: dashboard.php");
} else {
    echo "Login gagal. <a href='index.php'>Coba lagi</a>";
}
?>
