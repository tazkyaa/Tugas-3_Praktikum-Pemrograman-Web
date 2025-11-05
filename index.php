<?php
require "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand ms-5">Kabar Kampus</a>
      <div>
        <a href="form.php" class="btn btn-success me-5">Form Registrasi</a>
      </div>  
    </div>
</nav>

<div class="container my-4">
  <h2>Dashboard Pendaftaran</h2>
  
  <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Gender</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM pendaftar";
            $result = mysqli_query($koneksi, $query);

            if (!$result) {
                die("Query error: " . mysqli_error($koneksi));
            }


            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <tr>
                        <th scope="row">' . htmlspecialchars($row['id']) . '</th>
                        <td>' . htmlspecialchars($row['nama']) . '</td>
                        <td>' . htmlspecialchars($row['jurusan']) . '</td>
                        <td>' . htmlspecialchars($row['gender']) . '</td>
                        <td>
                            <a href="detail.php?id=' . $row['id'] . '" class="btn btn-primary btn-sm"> <i class="bi bi-eye"></i> </a>
                            <a href="update.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm"> <i class="bi bi-pencil"></i> </a>
                            <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau hapus data ini?\')"> <i class="bi bi-trash"></i> </a>
                        </td>
                    </tr>
                    ';
                }
            } else {
                echo '
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data.</td>
                </tr>
                ';
            }
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
 


</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>