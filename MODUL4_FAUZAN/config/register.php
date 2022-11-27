<?php 
require "connector.php";
function registrasi ($data){
    global $connector;

    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $nohp = strtolower(stripslashes($data["nohp"]));
    $password = mysqli_real_escape_string($connector,$data["password"]);  
    $cPassword = mysqli_real_escape_string($connector,$data["cPassword"]); 

    $result = mysqli_query($connector, "SELECT email FROM users WHERE email = '$email' ");
    
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('email sudah tersedia') </script>";
        return false;
    }

    if( $password !== $cPassword){
        echo "<script> alert('password salah') </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT); 

    mysqli_query($connector, "INSERT INTO users VALUES (
        '','$nama', '$email', '$password','$nohp'
    )");

    return mysqli_affected_rows($connector);
    header("Location: ./Login-fauzan.php");

}
?>