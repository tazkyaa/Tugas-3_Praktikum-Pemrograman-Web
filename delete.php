<?php
require "./koneksi.php";

// pastikan ada ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // query hapus data
    $query = "DELETE FROM pendaftar WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // kalau berhasil balik ke halaman utama
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak ditemukan!";
}
?>