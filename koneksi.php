<?php
$servername = "localhost";
$username   = "root";
$password   = ""; // Sesuaikan jika MySQL Anda menggunakan password
$dbname     = "acara9_pgweb";

$koneksi = mysqli_connect($servername, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>