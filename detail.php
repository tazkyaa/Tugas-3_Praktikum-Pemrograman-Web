<?php
require "./koneksi.php";

// Ambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM pendaftar WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    // Kalau data ditemukan
    if ($data = mysqli_fetch_assoc($result)) {
        $nama       = $data['nama'];
        $email      = $data['email'];
        $no_hp      = $data['no_hp'];
        $password   = $data['password'];
        $jurusan    = $data['jurusan'];
        $minat_topik= $data['minat_topik'];
        $gender     = $data['gender'];
        $alasan     = $data['alasan'];
    } else {
        die("Data tidak ditemukan!");
    }
} else {
    die("ID tidak diberikan!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand ms-5">Kabar Kampus</a>
      <div>
        <a href="form.php" class="btn btn-success me-5">Form Registrasi</a>
      </div>
  </div>
</nav>


<div class="container my-5">
    <div class="card bg-light mx-auto w-75 p-4 shadow-sm">
        <h4 class="mb-3">Data Pendaftar</h4>

        <p>ID: <?= $id ?></p>
        <p>Nama: <?= htmlspecialchars($nama) ?></p>
        <p>Email: <?= htmlspecialchars($email) ?></p>
        <p>Nomor Telepon: <?= htmlspecialchars($no_hp) ?></p>
        <p>Password: <?= htmlspecialchars($password) ?></p>
        <p>Jurusan: <?= htmlspecialchars($jurusan) ?></p>
        <p>Minat Topik: <?= htmlspecialchars($minat_topik) ?></p>
        <p>Gender: <?= htmlspecialchars($gender) ?></p>
        <p>Alasan: <?= nl2br(htmlspecialchars($alasan)) ?></p>
    </div>
    <div class="mx-auto w-75 mt-3">
        <a href="index.php" class="btn btn-dark">Kembali ke Dashboard</a>
    </div>
</div>




</body>
</html>