<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "db_pakar_flu";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    // Pastikan database yang digunakan sudah ada
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if ($conn->query($sql) === TRUE) {
        echo "Database dibuat atau sudah ada.";
    } else {
        echo "Gagal membuat database: " . $conn->error;
    }
}
?>