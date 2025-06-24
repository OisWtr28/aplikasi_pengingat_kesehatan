<?php
include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM reminders WHERE id=$id");
header("Location: dashboard.php");
?>
