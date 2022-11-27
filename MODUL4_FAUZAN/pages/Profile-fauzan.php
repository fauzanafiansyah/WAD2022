<?php
if(!isset($_SESSION)){
    session_start();
}
require '../config/connector.php';

$query = "SELECT * FROM showroom_fauzan_table";
$result = mysqli_query($connector, $query);

function onClick($result)
{
  if (mysqli_num_rows($result) > 0) {
    echo "ListCar-fauzan.php";
  } else {
    echo"Add-fauzan.php";
  }
}

if(!isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}

$email = $_SESSION["email"];

$dataProf = mysqli_query($connector, "SELECT * FROM users WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);


if(isset($_POST["update"])) {
    $email = $_SESSION["email"]; 
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];

    if($_POST["password"] ==="" && $_POST["cPassword"] ===""){
        $password = $fetching["password"];
        $konfirmasi_password  = $fetching["password"];
        $query = "UPDATE users SET
                    nama = '$nama',
                    no_hp = '$nohp'
                WHERE email = '$email'";

    }else {
        $password = mysqli_real_escape_string($connector, $_POST["password"]);
        $konfirmasi_password = mysqli_real_escape_string($connector, $_POST["cPassword"]);
        
        if($password == $konfirmasi_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET
                    nama = '$nama',
                    no_hp = '$nohp',
                    password = '$password'
                WHERE email = '$email'";
          
        } else {
            echo "<script> alert('password salah') </script>";
        }
    }
    mysqli_query($connector, $query);
    echo "<meta http-equiv='refresh' content='0'>"; 
    echo "<script> alert('Data yang anda masukkan berhasil di rubah') </script>";
    setcookie("warnaNavbar", $_POST["warnaNavbar"], time() + 3600, "/");

    
  }

$pilihan_warna = [
    "primary" => "Blue",
    "dark" => "Black",
    "secondary" => "Gray",
    "danger" => "Merah"
  ];

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../asset/style/index.css" />

</head>

<body>
    <nav class="navbar navbar-expand-lg shadow
        bg-<?=isset($_COOKIE["warnaNavbar"]) ? $_COOKIE["warnaNavbar"] : "primary";?> text-white py-3">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="Home-fauzan.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href=<?php onClick($result); ?>>MyCar</a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="Add-fauzan.php"><button
                                class="btn btn-light text-primary px-3 py-1"> Add
                                Car</button></a>
                    </li>
                    <div class="dropdown">
                        <button class="btn btn-light text-primary dropdown-toggle px-3 py-1" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $fetching["nama"]; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="Profile-fauzan.php">Profile</a></li>
                            <li><a class="dropdown-item" href="../config/logout.php">Log out</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <section id="profilee">
        <div class="form text-center mt-5">
            <h1 class="mb-4">Profile</h1>
            <div class="form2 justify-content-center">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-4"><label for="email">Email</label></div>
                        <div class="col-7"><input type="email" name="email" id="email" class="w-100"
                                value="<?= $_SESSION["email"] ?>" disabled></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="nama">Nama</label></div>
                        <div class="col-7"><input type="nama" name="nama" id="nama" class="w-100"
                                value="<?= $fetching["nama"] ?>"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="nohp" class="form-label">Nomor Handphone</label></div>
                        <div class="col-7"><input type="text" name="nohp" id="nohp" class="w-100"
                                value="<?= $fetching["no_hp"] ?>"></div>
                    </div>

                    <hr class="w-75 mx-auto" />

                    <div class="row mb-3">
                        <div class="col-4"><label for="Password" class="form-label">Password</label></div>
                        <div class="col-7"><input type="password" name="Password" id="Password"
                                class="form-control w-100"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="cPassword" class="form-label">Konfirmasi Password</label></div>
                        <div class="col-7"><input type="password" name="cPassword" id="cPassword"
                                class="form-control w-100"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label for="warnaNavbar" class="form-label">Warna Navbar</label></div>
                        <div class="col-7">
                            <select class="form-select text-muted" aria-label="Warna Navbar" id="warnaNavbar"
                                name="warnaNavbar">
                                <?php foreach($pilihan_warna as $warna => $value) : ?>
                                <?php $selected = $warna == $_COOKIE["warnaNavbar"] ? "selected" : "" ?>
                                <option value="<?= $warna; ?>" <?= $selected; ?>><?= $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </section>


    <footer class="text-center" style="margin:0 0 0 150px;">
        <div class="container">
            <div class="logo_nim d-flex">
                <img src="../asset/images/logo-ead 1.png" class="me-4" alt="logo">
                <p class="d-inline">Fauzan_1202204056</p>
            </div>
        </div>
    </footer>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>