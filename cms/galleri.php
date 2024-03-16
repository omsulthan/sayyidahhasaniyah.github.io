<?php
include('../config/db.php');

function updateImage($file, $targetDir = '../src/img/')
{
    // Mendapatkan informasi file
    $fileName = basename($file['name']);
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Menambahkan timestamp ke nama file
    $imageName = 'image_' . time() . '.' . $fileExtension;

    // Membuat path tujuan
    $targetPath = $targetDir . $imageName;

    // Cek apakah file adalah gambar
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        echo "<script>alert('File bukan gambar.');</script>";
        return false;
    }

    // Cek ukuran file (opsional)
    if ($file['size'] > 5000000) {
        echo "<script>alert('Ukuran file terlalu besar.');</script>";
        return false;
    }

    // Pindahkan file ke direktori tujuan
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $imageName;
    } else {
        echo "<script>alert('Gagal mengunggah file.');</script>";
        return false;
    }
}

// Memeriksa apakah formulir telah dikirim
if (isset($_POST["submit"])) {

    // Mendapatkan nilai dari formulir
    $gambar = $_FILES['formFile'];
    $imageName = $gambar['name'];

    // Upload gambar
    $uploadedImageName = updateImage($gambar);

    // Cek apakah upload berhasil
    if (!$uploadedImageName) {
        echo "Gambar Gagal diunggah ke: ";
        die;
    }

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO gallery (name) VALUES ('$uploadedImageName')";


    if (mysqli_query($conn, $sql)) {
        header("Location: " . $base_url . "galleri.php");
        exit(); // Penting untuk menghentikan eksekusi lebih lanjut setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
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
        <div>Selamat Datang</div>
        <div class="fw-semibold">Admin</div>
        <hr>
        <div class="d-flex justify-content-between">
            <div>
                <a class="text-decoration-none text-white btn btn-secondary" href="../cms/"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="d-flex gap-2">
                <button data-bs-toggle="modal" data-bs-target="#uploadModal" class="btn btn-success bg-primary-color"><i class="fa-solid fa-plus"></i> Upload Foto</button>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 mt-3 gy-3 g-lg-5 mt-0 justify-content-center justify-content-lg-start align-items-center text-center pb-5">
            <?php
            // Query untuk mendapatkan data gambar dari tabel gallery
            $sql = "SELECT * FROM gallery";
            $result = mysqli_query($conn, $sql);

            // Periksa apakah query berhasil
            if ($result && mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan gambar dari tabel gallery
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = "../src/img/" . $row['name'];
            ?>
                    <div class="col">
                        <div class="col d-flex align-items-center justify-content-center position-relative">
                            <img style="height: 200px; width: 200px;" src="<?php echo $imagePath; ?>" class="rounded img-fluid object-cover shadow" alt="<?php echo $row['name']; ?>">
                            <button class="close-btn btn btn-danger p-2 rounded-circle border shadow-sm" onclick="deleteImage(<?php echo $row['id']; ?>)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No images found!";
            }
            ?>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload dan Tampilkan Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="formFile" class="form-label">Upload Gambar</label>
                        <input class="form-control" type="file" id="formFile" name="formFile" accept="image/*">
                        <div id="previewContainer" class="mt-3"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="cancelUpload()">BAtal</button>
                        <button type="submit" class="btn btn-primary" id="uploadButton" name="submit">Buat</button>
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
    <script>
        document.getElementById('formFile').addEventListener('change', function() {
            uploadImage();
        });

        function uploadImage() {
            let fileInput = document.getElementById('formFile');
            let previewContainer = document.getElementById('previewContainer');

            let file = fileInput.files[0];
            let reader = new FileReader();

            reader.onload = function() {
                let imgElement = document.createElement('img');
                imgElement.src = reader.result;
                imgElement.classList.add('img-fluid');
                previewContainer.innerHTML = '';
                previewContainer.appendChild(imgElement);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
            console.log(file.name, 'ads');
        }

        function cancelUpload() {
            let fileInput = document.getElementById('formFile');
            fileInput.value = ''; // Menghapus nilai input file
            let previewContainer = document.getElementById('previewContainer');
            previewContainer.innerHTML = ''; // Menghapus tampilan preview gambar
        }

        function deleteImage(imageId) {
            // Kirim permintaan AJAX untuk menghapus gambar dari tabel gallery
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_image.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Refresh halaman setelah gambar dihapus
                    window.location.reload();
                }
            };
            xhr.send("image_id=" + imageId);
        }
    </script>
</body>

</html>