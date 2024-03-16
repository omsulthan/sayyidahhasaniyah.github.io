<?php
include('config/db.php');
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT id, username, password FROM user WHERE username = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if ($password == $hashedPassword) {
            // Login berhasil, atur session dan arahkan ke halaman yang sesuai
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

                echo '<script>window.location.href = "cms/index.php";</script>';
                exit();
        } else {
            $loginMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Username atau password Anda salah.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
    } else {
        $loginMessage = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Username atau password Anda salah.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
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
    <link href="src/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div data-aos="fade-up" data-aos-duration="1000" class="vh-100 d-flex bg-card justify-content-center align-items-center">
        <div class="my-auto bg-white mx-auto col-11 col-md-5 col-lg-4 col-xl-3 rounded shadow border p-3 py-4">
            <div class="text-center fw-bolder fs-2 pb-2">Sayyidul <span class="primary-color">Hasaniyah</span></div>
            <?php if (isset($loginMessage)) echo $loginMessage; ?>
            <form method="POST" action="">
                <div class="mt-4 mb-3">
                    <label for="email" class="form-label fw-normal">Username</label>
                    <input type="text" class="form-control" name="username" id="email">
                </div>
                <div class=" mb-3">
                    <label for="password" class="form-label fw-normal">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button class="btn bg-primary-color text-white w-100" type="submit" name="login">Masuk</button>
            </form>
        </div>
</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/bb1fce9dd9.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>