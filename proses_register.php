<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$cek = $koneksi->query("SELECT * FROM users WHERE username='$username'");
if ($cek->num_rows == 0) {
    $koneksi->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    echo "Registrasi berhasil! <a href='index.php'>Login di sini</a>";
} else {
    echo "Username sudah digunakan.";
}
?>
