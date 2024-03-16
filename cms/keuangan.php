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
                <button data-bs-toggle="modal" data-bs-target="#pengeluaranModal" class="btn btn-danger text-decoration-none"><i class="fa-solid fa-minus"></i> Pengeluaran</button>
                <button data-bs-toggle="modal" data-bs-target="#pemasukanModal" class="btn btn-success bg-primary-color text-decoration-none"><i class="fa-solid fa-plus"></i> Pemasukan</button>
            </div>
        </div>
        <div class="my-3">
            <div class="text-center fw-medium">Saldo</div>
            <div style="font-size: 48px;" class="text-center fw-semibold">Rp 1.802.032</div>
            <hr>
        </div>
        <div class="bg-white rounded border p-3 mb-3 shadow">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column fw-medium">
                    <div class="primary-color">Pemasukan</div>
                    <div>18 Maret 2023</div>
                    <div><i>Dari pak sulthan</i></div>
                </div>
                <div class="fw-bold primary-color">Rp 1.000.000</div>
            </div>
        </div>
        <div class="bg-white rounded border p-3 shadow">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-column fw-medium">
                    <div class="text-danger">Pengeluaran</div>
                    <div>18 Maret 2023</div>
                    <div><i>Keperluan Konsumsi</i></div>
                </div>
                <div class="fw-bold text-danger">Rp 1.000.000</div>
            </div>
        </div>
    </div>
</body>

<!-- Pemasukan Modal -->
<div class="modal fade" id="pemasukanModal" tabindex="-1" aria-labelledby="pemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan nominal pemasukan" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" placeholder="Masukan Keterangan" class="form-control" id="exampleInputPassword1">
                        <sub>Contoh : Donasi dari pak abdul</sub>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-succes bg-primary-color ">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pengeluaran Modal -->
<div class="modal fade" id="pengeluaranModal" tabindex="-1" aria-labelledby="pengeluaranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nominal</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan nominal pengeluaran" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                        <input type="text" placeholder="Masukan Keterangan" class="form-control" id="exampleInputPassword1">
                        <sub>Contoh : Keperluan konsumsi</sub>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-succes bg-primary-color ">Buat</button>
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