<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gejala = isset($_POST['gejala']) ? $_POST['gejala'] : array();

    // Menggabungkan gejala untuk klausa IN
    $gejalaList = implode("','", $gejala);

    $sql = "SELECT tb_penyakit.nama_diagnosa, tb_obat.nama_obat, tb_penanganan.cara_penanganan
            FROM tb_aturan
            JOIN tb_penyakit ON tb_aturan.kode_diagnosa = tb_penyakit.kode_diagnosa
            JOIN tb_obat ON tb_aturan.kode_obat = tb_obat.kode_obat
            JOIN tb_penanganan ON tb_aturan.kode_penanganan = tb_penanganan.kode_penanganan
            WHERE tb_aturan.kode_gejala IN ('$gejalaList')
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Diagnosa: " . $row["nama_diagnosa"] . "</h2>";
        echo "<h3>Obat:</h3>";
        echo "<pre>" . $row["nama_obat"] . "</pre>";
        echo "<h3>Penanganan:</h3>";
        echo "<pre>" . $row["cara_penanganan"] . "</pre>";
    } else {
        echo "Tidak ada diagnosa yang sesuai dengan gejala yang dipilih.";
    }
}

$conn->close();
?>
