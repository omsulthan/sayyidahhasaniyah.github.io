<?php
session_start(); // Pastikan untuk memulai session sebelum menggunakan $_SESSION

// Hapus semua session
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
echo '<script>window.location.href = "login.php";</script>';
exit();
