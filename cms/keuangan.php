<?php
// Sertakan file koneksi ke database
include('../config/db.php');
session_start();

if (!isset($_SESSION['username'])) {
    echo '<script>window.location.href = "../login.php";</script>';
}

// Periksa apakah formulir dikirimkan
if (isset($_POST["pemasukanSubmit"])) {
    // Ambil nilai dari formulir
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $jenis = "pemasukan"; // Nilai jenis tetap "pemasukan"

    // Query SQL untuk menyimpan data ke dalam tabel keuangan
    $sql = "INSERT INTO keuangan (nominal, keterangan, type) VALUES ('$nominal', '$keterangan', '$jenis')";

    // Jalankan query dan periksa apakah berhasil
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect ke halaman lain atau tampilkan pesan sukses
        echo '<script>window.location.href = window.location.href;</script>';
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
if (isset($_POST["pengeluaranSubmit"])) {
    // Ambil nilai dari formulir
    $nominal = $_POST['nominal'];
    $keterangan = $_POST['keterangan'];
    $jenis = "pengeluaran"; // Nilai jenis tetap "pemasukan"

    // Query SQL untuk menyimpan data ke dalam tabel keuangan
    $sql = "INSERT INTO keuangan (nominal, keterangan, type) VALUES ('$nominal', '$keterangan', '$jenis')";

    // Jalankan query dan periksa apakah berhasil
    if (mysqli_query($conn, $sql)) {
        // Jika berhasil, redirect ke halaman lain atau tampilkan pesan sukses
        echo '<script>window.location.href = window.location.href;</script>';
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yayasan Sayyidul Hasaniyah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../src/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="text-center bg-dark text-white fw-bolder fs-4 py-2">Sayyidul <span class="primary-color">Hasaniyah</span> CMS</div>

    <div class="mt-3 col-11 mx-auto">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <div>Selamat Datang</div>
                <div class="fw-semibold"><?= $_SESSION['username']; ?></div>
            </div>
            <div>
                <a class="nav-link link-hover" href="../logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-column flex-lg-row justify-content-between">
            <div>
                <a class="text-decoration-none text-white btn btn-secondary" href="../cms/"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="d-flex gap-2 mt-3 justify-content-end">
                <button data-bs-toggle="modal" data-bs-target="#pengeluaranModal" class="btn btn-danger text-decoration-none"><i class="fa-solid fa-minus"></i> Pengeluaran</button>
                <button data-bs-toggle="modal" data-bs-target="#pemasukanModal" class="btn btn-success bg-primary-color text-decoration-none"><i class="fa-solid fa-plus"></i> Pemasukan</button>
            </div>
        </div>
        <div class="my-3">
            <div class="text-center fw-medium">Saldo</div>
            <?php
            // Query untuk mengambil total pemasukan
            $queryPemasukan = "SELECT SUM(nominal) AS total_pemasukan FROM keuangan WHERE type = 'pemasukan'";
            $resultPemasukan = mysqli_query($conn, $queryPemasukan);
            $rowPemasukan = mysqli_fetch_assoc($resultPemasukan);
            $totalPemasukan = $rowPemasukan['total_pemasukan'];

            // Query untuk mengambil total pengeluaran
            $queryPengeluaran = "SELECT SUM(nominal) AS total_pengeluaran FROM keuangan WHERE type = 'pengeluaran'";
            $resultPengeluaran = mysqli_query($conn, $queryPengeluaran);
            $rowPengeluaran = mysqli_fetch_assoc($resultPengeluaran);
            $totalPengeluaran = $rowPengeluaran['total_pengeluaran'];

            // Menghitung saldo
            $saldo = $totalPemasukan - $totalPengeluaran;

            // Mencetak saldo
            echo '<div style="font-size: 48px;" class="text-center fw-semibold">Rp ' . number_format($saldo, 0, ',', '.') . '</div>';
            ?>
            <hr>
        </div>
        <?php
        // Query untuk mengambil data keuangan yang telah diurutkan berdasarkan created_at dan type
        $query = "SELECT *, DATE_FORMAT(created_at, '%d %M %Y %H:%i:%s') AS formatted_created_at FROM keuangan ORDER BY created_at DESC";
        $result = mysqli_query($conn, $query);

        // Periksa apakah query berhasil
        if ($result && mysqli_num_rows($result) > 0) {
            // Loop untuk menampilkan gambar dari tabel gallery
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <?php if ($row['type'] == "pemasukan") {
                    echo '<div class="bg-white rounded border p-3 mb-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column fw-medium">
                        <div class="primary-color">Pemasukan</div>
                        <div>' . $row['created_at'] . '</div>
                        <div><i>' . $row['keterangan'] . '</i></div>
                    </div>
                    <div class="fw-bold primary-color">Rp ' . number_format($row['nominal'], 0, ',', '.') . '</div>
                </div>
            </div>';
                } ?>
                <?php if ($row['type'] == "pengeluaran") {
                    echo '<div class="bg-white rounded border p-3 mb-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column fw-medium">
                        <div class="text-danger">Pengeluaran</div>
                        <div>' . $row['created_at'] . '</div>
                        <div><i>' . $row['keterangan'] . '</i></div>
                    </div>
                    <div class="fw-bold text-danger">Rp ' . number_format($row['nominal'], 0, ',', '.') . '</div>
                </div>
            </div>';
                } ?>
        <?php
            }
        }
        ?>



    </div>
</body>

<!-- Pemasukan Modal -->
<div class="modal fade" id="pemasukanModal" tabindex="-1" aria-labelledby="pemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="nominal" placeholder="Masukan nominal pemasukan" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" placeholder="Masukan Keterangan" name="keterangan" class="form-control" id="exampleInputPassword1">
                        <sub>Contoh : Donasi dari pak abdul</sub>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-succes bg-primary-color" name="pemasukanSubmit">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pengeluaran Modal -->
<div class="modal fade" id="pengeluaranModal" tabindex="-1" aria-labelledby="pengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="nominal" placeholder="Masukan nominal pengeluaran" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" placeholder="Masukan Keterangan" class="form-control" name="keterangan" id="exampleInputPassword1">
                        <sub>Contoh : Keperluan konsumsi</sub>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-succes bg-primary-color " name="pengeluaranSubmit">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bb1fce9dd9.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>