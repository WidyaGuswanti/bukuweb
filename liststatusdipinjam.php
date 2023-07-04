<?php
include 'koneksi.php';
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type');
$connection = getConnection();

$query = "SELECT * FROM peminjaman_master WHERE status_peminjaman = 'DIPINJAM'";
$result = $connection->query($query);

if ($result !== false && $result->rowCount() > 0) {
    $peminjaman = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($peminjaman);
} else {
    echo "Tidak ada data peminjaman dengan status DIPINJAM.";
}

$connection = null;
?>