<?php
// Sertakan file koneksi database
include('../config/db.php');

// Periksa apakah permintaan POST memiliki data image_id
if (isset($_POST['image_id'])) {
    // Ambil nilai image_id dari permintaan POST
    $imageId = $_POST['image_id'];

    // Query untuk mengambil nama file gambar berdasarkan id
    $sql = "SELECT name FROM gallery WHERE id = $imageId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $imageName = $row['name'];

        // Hapus file dari folder
        $filePath = "../src/img/" . $imageName;
        if (unlink($filePath)) {
            // File berhasil dihapus dari folder
            // Lanjutkan untuk menghapus data gambar dari tabel gallery
            $deleteSql = "DELETE FROM gallery WHERE id = $imageId";
            if (mysqli_query($conn, $deleteSql)) {
                // Berhasil menghapus data gambar dari tabel gallery
                echo "Gambar berhasil dihapus";
            } else {
                // Gagal menghapus data gambar dari tabel gallery
                echo "Gagal menghapus data gambar dari tabel gallery: " . mysqli_error($conn);
            }
        } else {
            // Gagal menghapus file dari folder
            echo "Gagal menghapus file dari folder";
        }
    } else {
        // Tidak ada data gambar dengan id yang diberikan
        echo "Tidak ada data gambar dengan id $imageId";
    }
} else {
    // Jika tidak ada data image_id dalam permintaan POST
    echo "Tidak ada data image_id yang diterima";
}
?>
