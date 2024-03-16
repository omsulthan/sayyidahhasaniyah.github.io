<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_sayyidul";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// var_dump($conn);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
