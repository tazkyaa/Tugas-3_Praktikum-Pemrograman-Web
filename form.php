<?php
require "./koneksi.php";

// Proses simpan data
if (isset($_POST['submit'])) {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $no_hp  = $_POST['no_hp'];
    $password = $_POST['password'];
    $jurusan  = $_POST['jurusan'];
    $gender   = $_POST['gender'];
    $alasan   = $_POST['alasan'];

    // Gabungkan checkbox minat topik
    if (isset($_POST['minat'])) {
        $minat_topik = implode(", ", $_POST['minat']);
    } else {
        $minat_topik = "-";
    }

    $query = "INSERT INTO pendaftar (nama, email, no_hp, password, jurusan, minat_topik, gender, alasan)
              VALUES ('$nama', '$email', '$no_hp', '$password', '$jurusan', '$minat_topik', '$gender', '$alasan')";
    
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<pre>Gagal menambahkan data: " . mysqli_error($koneksi) . "</pre>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand ms-5">Kabar Kampus</a>
      <div>
        <a href="index.php" class="btn btn-danger me-5">Kembali</a>
      </div>  
    </div>
</nav> 
<!-- Forum Registrasi -->
<div class="d-flex justify-content-center my-4">
  <form action="" method="POST" class="w-50 bg-light p-4">
    <div class="container">
      <h2 class="text-center mb-4">Formulir Pendaftaran Akun</h2>
    </div>
    <hr>

    <!-- Nama & Email -->
    <div class="d-flex gap-2">
      <div class="form-group w-50">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Anda" required>
      </div>
      <div class="form-group w-50">
        <label>Alamat Email</label>
        <input type="email" class="form-control" name="email" placeholder="contoh@email.com" required>
      </div>
    </div>
    <br>

    <!-- Telepon & Password -->
    <div class="d-flex gap-2">
      <div class="form-group w-50">
        <label>Nomor Telepon</label>
        <input type="tel" class="form-control" name="no_hp" placeholder="08xxxxxxxxxx" required>
      </div>
      <div class="form-group w-50">
        <label>Password Akun</label>
        <input type="password" class="form-control" name="password" required>
      </div>
    </div>

    <!-- Jurusan -->
    <label class="mt-4">Jurusan</label>
    <select class="form-select" name="jurusan" required>
      <option value="" selected disabled>Pilih Jurusan....</option>
      <option value="D3 Teknik Kimia">D3 Teknik Kimia</option>
      <option value="S1 Sistem Informasi">S1 Sistem Informasi</option>
      <option value="S1 Teknik Informatika">S1 Teknik Informatika</option>
      <option value="S1 Teknik Kimia">S1 Teknik Kimia</option>
      <option value="S1 Teknik Industri">S1 Teknik Industri</option>
    </select>

    <!-- Minat Topik -->
    <label class="mt-4">Minat Topik (Bisa Lebih Dari Satu)</label>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="minat[]" value="Event Kampus"><label class="form-check-label">Event Kampus</label></div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="minat[]" value="Teknologi"><label class="form-check-label">Teknologi</label></div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="minat[]" value="Politik"><label class="form-check-label">Politik</label></div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="minat[]" value="Musik"><label class="form-check-label">Musik</label></div>

    <!-- Gender -->
    <label class="mt-4">Gender</label>
    <div class="form-check"><input class="form-check-input" type="radio" name="gender" value="Laki-laki" required><label class="form-check-label">Laki-laki</label></div>
    <div class="form-check"><input class="form-check-input" type="radio" name="gender" value="Perempuan" required><label class="form-check-label">Perempuan</label></div>
    <div class="form-check"><input class="form-check-input" type="radio" name="gender" value="Lainnya" required><label class="form-check-label">Lainnya</label></div>

    <!-- Alasan -->
    <div class="mt-4">
      <label>Alasan Bergabung</label>
      <textarea class="form-control" name="alasan" rows="3"></textarea>
    </div>

    <!-- Tombol -->
    <div class="d-flex gap-2">
      <button type="submit" name="submit" class="btn btn-primary mt-4 w-100">Daftar Sekarang</button>
      <button type="reset" class="btn btn-danger mt-4 w-25">Reset</button>
    </div>
  </form> 
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>