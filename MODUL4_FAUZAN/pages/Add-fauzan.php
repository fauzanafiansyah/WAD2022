<?php 
require '../config/connector.php';
session_start();

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
$email = $_SESSION["email"];

$dataProf = mysqli_query($connector, "SELECT * FROM users WHERE email = '$email'"); 
$fetching = mysqli_fetch_assoc($dataProf);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car | Fauzan_1202204056</title>
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
    <style>
    <?php include "../asset/style/index.css";
    ?>
    </style>
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

    <section id="form">
        <div class="container">
            <div class="tambah">
                <h1>Tambah Mobil</h1>
                <p>Tambah Mobil baru anda ke list show room</p>
            </div>
            <form action="../config/insert.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label" style="margin-top: 30px;"><b>Nama Mobil</b></label>
                    <input name="nama" type="text" class="form-control" id="nama" aria-describedby="nama"
                        placeholder="Masukkan Nama Mobil anda">
                </div>
                <div class="mb-3">
                    <label for="pemilik" class="form-label"><b>Nama Pemilik</b></label>
                    <input name="pemilik" type="text" class="form-control" id="pemilik" aria-describedby="pemilik"
                        placeholder="Masukkan Nama Pemilik Mobil">
                </div>
                <div class="mb-3">
                    <label for="merk" class="form-label"><b>Merk</b></label>
                    <input name="merk" type="text" class="form-control" id="Merk" aria-describedby="Merk"
                        placeholder="Masukkan Merk Mobil Anda">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label"><b>Tanggal Beli</b></label>
                    <input name="tanggalbeli" type="date" class="form-control" id="date" aria-describedby="date">
                </div>
                <div class="mb-3" style="display: block;">
                    <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
                    <textarea name="desc" id="deskripsi" name="deskripsi" class="form-control"
                        placeholder="Masukkan Deskripsi Mobil Anda"
                        style="width: 1000px; height: 147px; border: 1px solid #757575; border-radius: 8px;">
                    </textarea>
                </div>
                <div class="mt-3">
                    <label for="formFile" class="form-label"><b>Foto</b></label>
                    <input type="file" class="form-control" id="foto" name='gambar' accept="image/* "
                        style="height: 37px;">
                </div>
                <label for="pembayaran" style="margin-top: 30px;"><b>Status Pembayaran</b></label>
                <div class="mt-3 d-flex" style="color: #757575; font-size: 15px;">
                    <input name="status" class="form-check-input" type="radio" name="inlineRadioOptions"
                        id="inlineRadio1" value="option1" style="width: 17px; height: 17px;">
                    <label class="form-check-label" for="inlineRadio1" style="margin-left: 10px;">Lunas</label>
                    <input name="status" class="form-check-input" type="radio" name="inlineRadioOptions"
                        id="inlineRadio2" value="option2" style="width: 17px; height: 17px; margin-left: 20px">
                    <label class="form-check-label" for="inlineRadio2" style="margin-left: 10px;">Belum Lunas</label>
                </div>
                <div style="margin-top:60px; padding-bottom:60px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>