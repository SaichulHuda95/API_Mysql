<?php
$hostname = "localhost";
$database = "epotensi";
$username = "root";
$password = "root";
$connect = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi   
if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
