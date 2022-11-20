<?php
require '../config/connector.php';

$id = $_GET['id'];

$sql = "DELETE FROM showroom_fauzan_table WHERE id_mobil = $id";

if (mysqli_query($connector, $sql)) {
  header("location: ../pages/ListCar-fauzan.php");
} else {
  echo "Gagal";
}