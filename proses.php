<?php
$conn = new mysqli("localhost", "root", "root", "db_edukasi_fauna");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_fauna";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Gambar</th>
        </tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["nama"] . "</td>
            <td>" . $row["deskripsi"] . "</td>
            <td>" . $row["status"] . "</td>
            <td><img src='" . $row["gambar"] . "' width='200' height='200'></td>
        </tr>";
}
echo "</table>";

// Tutup koneksi
$conn->close();
?>