<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyBooking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <?php
  $name = $_POST['Name'];
  $date = $_POST['Date'];
  $start = $_POST['Start'];
  $duration = $_POST['Duration'];
  $type = $_POST['Type'];
  $phone = $_POST['Phone'];
  ?>

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
    <h4 align="center">Thank you <?php echo $name . " " ?> for Reserving</h4>
    <p align="center">Please double check your reservation details</p>
    <table class="table">
      <tr>
        <td>
          <b>Booking Number</b>
        </td>
        <td>
          <b>Nama</b>
        </td>
        <td>
          <b>Check-In</b>
        </td>
        <td>
          <b>Check-Out</b>
        </td>
        <td>
          <b>Car Type</b>
        </td>
        <td>
          <b>Phone Number</b>
        </td>
        <td>
          <b>Service</b>
        </td>
        <td>
          <b>Total Price</b>
        </td>
      </tr>

      <tr class="bg-light">
        <td>
          <?php
          echo rand();
          ?>
        </td>
        <td>
          <?php echo $name ?> <br>
        </td>
        <td>
          <?php
          $date = $date . " " . $start;
          $datestart = date("d-m-Y H:i:s", strtotime($date));
          echo $datestart
          ?>
        </td>
        <td>
          <?php
          echo date("d-m-Y H:i:s", (strtotime($date) + 60 * 60 * 24 * $duration)) ?>
        </td>
        <td>
          <?php echo $type ?> <br>
        </td>
        <td>
          <?php echo $phone ?> <br>
        </td>
        <td>
          <?php
          if (isset($_POST["checkbox"])) {
            foreach ($_POST["checkbox"] as $checkbox) {
              echo "<li>$checkbox</li>";
            }
          } else {
            echo "no service";
          }
          ?>
        </td>
        <td>
          <?php
          $price = 0;
          if ($type == "Mercy Sprinter") {
            $price = 4000000;
          } else if ($type = "Toyota Alphard") {
            $price = 2500000;
          } else   {
            $price = 850000;
          }

          $price = $price * $duration;
          if (isset($_POST['checkbox'])) {
            foreach ($_POST['checkbox'] as $checkbox) {
              if ($checkbox == "Health Protocol") {
                $price += 25000;
              } else if ($checkbox == "Driver") {
                $price += 100000;
              } else if ($checkbox == "Fuel Filled") {
                $price += 250000;
              }
            }
          }
          echo "Rp. " . $price;
          ?>
        </td>
      </tr>
    </table>


  </div>
  <footer align="center" class="fixed-bottom bg-light p-2">
    <p>Created by FAUZAN_1202204056</p>
  </footer>

</body>

</html>