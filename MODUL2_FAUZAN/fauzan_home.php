<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container d-flex justify-content-center">
      <ul class="navbar-nav">
        <li class=" nav-item">
          <a class="nav-link" href="fauzan_home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fauzan_booking.php">Booking</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">

    <br>
    <h4 align=" center">WELCOME TO EAD RENT</h4>
    <nav class="navbar navbar-expand-lg ">
      <div class="container d-flex justify-content-center">
        <ul class="navbar-nav">
          <li class=" nav-item">
            <p>Find your best deal, here!</p>
          </li>
        </ul>
      </div>
    </nav>
    <br>
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="sprinter.png"  alt="...">
          <div class="card-body">
            <h5 class="card-title">Mercy Sprinter</h5>
            <p class="card-text">Rp 4000000 / day</p>
            <ul class="list-group list-group-flush" style="text-align :center;">
              <li class="list-group-item text-primary">8 Kursi</li>
              <li class="list-group-item text-primary">2150cc</li>
              <li class="list-group-item text-primary">Auto Matic</li>
            </ul>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <form action="fauzan_booking.php" method="post">
              <button class="btn btn-primary" name="img" type="submit" value="sprinter.png">Booking Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="alphard.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Toyota Alphard</h5>
            <p class="card-text">Rp 2500000 / day</p>
            <ul class="list-group list-group-flush" style="text-align :center;">
              <li class="list-group-item text-primary">7 Kursi</li>
              <li class="list-group-item text-primary">3456cc</li>
              <li class="list-group-item text-primary">Auto Matic</li>
            </ul>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <form action="fauzan_booking.php" method="post">
              <button class="btn btn-primary" name="img" type="submit" value="alphard.png">Booking Now</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card" style="width: 18rem;">
          <img src="innova.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Toyota Innova</h5>
            <p class="card-text">Rp 850000 / day </p>
            <ul class="list-group list-group-flush" style="text-align :center;">
              <li class="list-group-item text-primary">7 Kursi</li>
              <li class="list-group-item text-primary">2000cc</li>
              <li class="list-group-item text-primary">Auto Matic</li>
            </ul>
          </div>
          <div class="card-footer d-flex justify-content-center">
            <form action="fauzan_booking.php" method="post">
              <button class="btn btn-primary" name="img" type="submit" value="innova.png">Booking Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <br><br>

  </div>
  <footer align="center" class="bg-light p-2">
    <p>Created by FAUZAN_1202204056</p>
  </footer>
</body>

</html>