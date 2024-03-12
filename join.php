<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="src/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="index.php">
                <img src="src/img/logo.png" class="object-cover" width="50" alt="...">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="program.php">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang</a>
                    </li>
                    <li class="nav-item text-center d-inline-block d-lg-none">
                        <a class="nav-link" href="tentang.php">Gabung</a>
                    </li>
                </ul>
            </div>
            <button class="btn bg-primary-color d-none d-lg-block">Gabung</button>
        </div>
    </nav>
    <!-- End OF Navbar -->

    <div style="background-image: url('src/img/hero-bg.png');background-position: center;background-repeat: no-repeat;background-size: cover; padding: 160px 0px" class=" h-100 text-center d-flex flex-column justify-content-center align-items-center gap-4">
        <div style="font-size: 80px;" class="fw-bold col-6">Yayasan <span class="primary-color">Sayyidul Hasaniyah</span></div>
        <div class="fs-4 fw-normal col-6">
            Berperan menciptakan masa depan cerah bagi anak yatim melalui akses pendidikan, kesehatan, dan perlindungan.</div>
        <button class="btn bg-primary-color btn-lg mt-3">Pelajari lebih lanjut</button>
    </div>

    <!-- Footer -->
    <div class="bg-white">
        <div class="py-5 container d-flex gap-5">
            <div class="col-6 d-flex flex-column gap-2">
                <div class="fw-bold fs-1">Hubungi Kami</div>
                <div class="fs-6 fw-normal"><a target="_blank" class="link-underline primary-color link-underline-opacity-0 d-flex align-items-center gap-1" href="https://api.whatsapp.com/send?phone=6281212341305&text=Assalamualaikum%20Pak%20Hasan"><i class="fa-brands fa-whatsapp fs-3"></i>Whatsapp</a></div>
                <div class="fs-6 fw-normal">yayasansayyinulhasaniyah@gmail.com</div>
                <div class="fs-6 fw-normal col-10">Jl. Bintara VIII No.1b, RT.004/RW.003, Bintara, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17134</div>
                <div class="d-flex gap-3 fw-normal fs-3 align-items-center">
                    <div><a target="_blank" class="link-underline text-black link-underline-opacity-0 d-flex align-items-center gap-1" href="https://www.instagram.com/yayasan_sayyidul_hasaniyah/"><i class="fa-brands fa-instagram"></i></a></div>
                    <div><a target="_blank" class="link-underline text-black link-underline-opacity-0 d-flex align-items-center gap-1" href="https://youtube.com/@hasansumarji4686?si=lovHMNKlKu0QGscp"><i class="fa-brands fa-youtube"></i></a></div>
                    <div><a target="_blank" class="link-underline text-black link-underline-opacity-0 d-flex align-items-center gap-1" href="https://www.snackvideo.com/@HSN1972"><img src="src/img/snack-video.svg" width="32" alt=""></a></div>
                </div>
            </div>
            <div class="col-6 d-flex flex-column gap-3">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Pengirim</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea" class="form-label">Pesan</label>
                        <textarea class="form-control" placeholder="Masukan Pesan Disini" id="floatingTextarea"></textarea>
                    </div>
                    <button type="submit" class="btn bg-primary-color btn-lg col py-2">Lanjut</button>
                </form>
            </div>
        </div>
    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bb1fce9dd9.js" crossorigin="anonymous"></script>

</html>